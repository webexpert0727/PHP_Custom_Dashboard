<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {

        parent::__construct();
        $this->load->model('BusschedulesModel');
        $this->load->model('RoutesModel');
        $this->load->model('BusMovementsModel');

//commneted by Roshan

        /* if(!$this->session->userdata('user_id')){
          redirect('auth');
          } */
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $day = "Today's Report";
        $today =  date('Y-m-d');
        $today =  date('Y-m-d',strtotime("-1 days"));

        $data['device_status'] = $this->get_devices();

        if($this->input->get('last_date') != ''){

            $day = 'Last Day Report';
            $today = $this->input->get('last_date');
        }

        $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) = '".$today."' " );

        if($this->input->get('last_fiften_day') != ''){
            $day = 'Last 15 Day Report';
            $today = $this->input->get('last_fiften_day');
            $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) >= '".$today."' " );
        }

        $result = $query->result_array();
        $totalBusYesterday = 0;
        if($result){

            foreach ($result as$value) {
                $f_diff = $this->timeDiff($value['f_exp_time'],$value['f_time'],$value['schedule_date'] ); 
                $t_diff = $this->timeDiff($value['t_exp_time'],$value['t_time'],$value['schedule_date'] ); 

                if($f_diff + $t_diff < 0 ){

                    $totalBusYesterday++;
                }

               
            }
        }


        $heading    = 'DASHBOARD';
        $title      = 'Dashboard';
        //print_r($totalBusYesterday);
        $this->load->view('web/layout/layout', ['subview' => ['web/home'], 'device_status' => $data['device_status'], 'result' => $result,'day' => $day,'totalBusYesterday' => $totalBusYesterday, 'heading' => $heading, 'title' => $title]);
    }

    public function timeDiff($exp, $act, $date) {
        $exp = strtotime($date .' '.$exp);
        $act = strtotime($date.' '. $act);
        return round(($exp - $act) / 60,2);
    }

   public function report() {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $day = "Today's Report";
        $today =  date('Y-m-d');
        $data['device_status'] = $this->get_devices();

        if($this->input->get('last_date') != ''){
            $day = 'Last Day Report';
            $today = $this->input->get('last_date');
        }

        $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) = '".$today."' " );

        if( $this->input->get('this_month') == 1 ) {
             $current_month =  date('m');
        $day = 'This Month';
        $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where month(`schedule_date`) = '$current_month'" );
       // $result = $query->result_array();
        }else {

        if($this->input->get('last_fiften_day') != ''){
            $day = 'Last 15 Day Report';
            $today = $this->input->get('last_fiften_day');
            $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) >= '".$today."' " );
        }
    }


        $result = $query->result_array();
        $heading    = 'Report';
        $title      = 'Report';
        $this->load->view('web/layout/layout', ['subview' => ['web/report'], 'device_status' => $data['device_status'], 'result' => $result,'day' => $day, 'heading' => $heading, 'title' => $title]);
    }

    function live_map() {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $heading    = 'Live Map';
        $title      = 'Live Map';
        $this->load->view('web/layout/main_layout', ['subview' => ['web/live_map'], 'heading' => $heading, 'title' => $title]);
    }

    function updateRoutesInDB() {
        $routes = $this->get_routes();
//        echo "<pre>";

        foreach ($routes->routes as $route) {
            $xplode = explode(" ", $route->name);

            $rtnum = $xplode[0];
            $way = ($xplode[sizeof($xplode) - 1]) == "IDA" ? "trip" : "return";
//            echo "<pre>";
//            print_r($way);die;
//            die;
            $i = 0;
            foreach ($route->coordinates as $stop) {
                $i++;
                $routeObj = new RoutesModel();
                $routeObj->route_name = $route->name;
                $routeObj->route_no = $rtnum;
                $routeObj->stop_name = "";
                $routeObj->stop_lat = $stop->lat;
                $routeObj->stop_long = $stop->lng;
                $routeObj->stop_no = $i;
                $routeObj->way = $way;
//                print_r($routeObj);die;
//                $routeObj->updateRouts();
            }
        }
    }

    function get_routes() {
        $ch = curl_init();
        $user_api_hash = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
        $curlConfig = array(
            CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_routes",
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => array('lang' => 'en',
                'user_api_hash' => $user_api_hash,
            )
        );
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            return false;
        } else {
            $res = json_decode($response);
            return $res;
        }

//        echo "<pre>";
//        print_r($res);
//        $this->load->view('web/layout/layout', ['subview' => ['web/busperformance']], $res);
//		$this->load->view('web/busperformance',$res);
    }

    function get_latest_bus_movements() {
        $ch = curl_init();
        $user_api_hash = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
        $curlConfig = array(
            CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_devices_latest",
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => array('lang' => 'en',
                'user_api_hash' => $user_api_hash,
            )
        );
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            return false;
        } else {
            $res = json_decode($response);
            //return $res;
        }

        return $res;
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Haversine formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     */
    function haversineGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    function busperformanceUpdater() {
        error_reporting(E_ALL);
        ini_set('display_errors', "on");
        date_default_timezone_set("America/Manaus");

        //get updated bus information
        $movingBusInfo = $this->get_latest_bus_movements();
//        echo "<pre>";
//        print_r($movingBusInfo->items);die;

        //for each moving bus get the schedule for that bus from schedule table.
        foreach ($movingBusInfo->items as $busInfo) {
            $trackInfo = $busInfo->device_data->traccar;
            print_r($busInfo->device_data->traccar);
            $busno = $trackInfo->id;
            $lastLat = $trackInfo->lastValidLatitude;
            $lastLong = $trackInfo->lastValidLongitude;

            //findout the buses starting from 1st Stop
            $schedule = new BusschedulesModel;
            $buses_data = $schedule->getSchedulByBusNo($busno, date("Y-m-d H:i:s"));
//            $buses_data = $schedule->getSchedulByBusNo(34, date("Y-m-d H:i:s", strtotime("4 april 2018 5:30:20")));
            foreach ($buses_data as $bus) {
                //get route for the bus
                $routeNo = $bus["route_id"];
                if ($routeNo < 100) {
                    $routeNo = "0" . $routeNo;
                }
                //get start coordinate for the route
                $routesObj = new RoutesModel();
                $routInfo = $routesObj->getRouteStop($routeNo);
//                echo '<pre>';
                if ($routInfo) {
                    echo "<br>--------------ROUTE INFO--------<br>";
                    print_r($routInfo);
                    foreach ($routInfo as $route) {
                        //get the coordinates
                        $stop_lat = $route["stop_lat"];
                        $stop_long = $route["stop_long"];

                        //compare the distance between to lats using havershine formula
                        $distance = $this->haversineGreatCircleDistance($lastLat, $lastLong, $stop_lat, $stop_long);
                        if ($distance < 100) { //bus is less than 100 meters so bus is just moved from the location or reached to location
                            //bus is at the start position
                            //get the bus which is started moving.
                            $busmovementsObj = new BusMovementsModel();
                            $runningBuses = $busmovementsObj->getRunningBus($busno, $routeNo);
                            echo "<br>-------------Running Busses--------<br>";

                            print_r($runningBuses);
                            if ($runningBuses) {
                                foreach ($runningBuses as $runningBus) {
                                    //bus is started
                                    //checking if difference is atleast 20 minutes then
                                    $datetime1 = new DateTime($runningBus['actual_departure_time']);
                                    $datetime2 = new DateTime("now");
                                    $interval = $datetime1->diff($datetime2);
                                    $timeDiff = $interval->format('%r%i');

                                    if ($timeDiff > 20) {

                                        //calculating delay time
                                        $datetime3 = new DateTime($bus['expected_arrival_time_to_station']);
                                        $datetime4 = new DateTime("now");
                                        $interval2 = $datetime3->diff($datetime4);
                                        $timeDiff2 = $interval2->format('%r%i');
                                        //end of calculation
                                        //bus reached to destination
                                        $updateBusMovementsObj = new BusMovementsModel();
                                        $updateBusMovementsObj->id = $runningBus['id'];
                                        $updateBusMovementsObj->schedule_id = $runningBus['schedule_id'];
                                        $updateBusMovementsObj->bus_no = $runningBus['bus_no'];
                                        $updateBusMovementsObj->route = $runningBus['route'];
                                        $updateBusMovementsObj->actual_departure_time = $runningBus['actual_departure_time'];
                                        $updateBusMovementsObj->actual_arrival_time = date("Y-m-d H:i:s");
                                        $updateBusMovementsObj->total_time_taken = $timeDiff;

                                        if ($timeDiff2 > 0) {
                                            $updateBusMovementsObj->delayed_time = $timeDiff2;
                                            $updateBusMovementsObj->delay_flag = 1;
                                        } else {
                                            $updateBusMovementsObj->delayed_time = $timeDiff2;
                                            $updateBusMovementsObj->delay_flag = 0;
                                        }

                                        $updateBusMovementsObj->updateData();
                                    } else {
                                        //do nothing as bus is at same starting position
                                    }
                                }
                            } else {
                                //since no bus is added in db for the same route then we are adding it to system
                                //its starting at location so updating info
                                $updateBusMovementsObj = new BusMovementsModel();
                                $updateBusMovementsObj->schedule_id = $bus['schedule_id'];
                                $updateBusMovementsObj->bus_no = $busno;
                                $updateBusMovementsObj->route = $routeNo;
                                $updateBusMovementsObj->actual_departure_time = date("Y-m-d H:i:s");
                                $updateBusMovementsObj->actual_arrival_time = null;
                                $updateBusMovementsObj->total_time_taken = 0;
                                $updateBusMovementsObj->delayed_time = 0;
                                $updateBusMovementsObj->delay_flag = 0;
                                $updateBusMovementsObj->updateData();
                            }
                        }
                    }
                }
            }
        }
    }

    function getHistory() {
        $ch = curl_init();
        date_default_timezone_set("America/Manaus");
        $fromDate = date("Y-m-d");
        $toDate = date("Y-m-d");
        $fromTime = date("H:i", strtotime($fromDate . $bus["expected_departure_time_from_station"]));
        $toTime = date("H:i", strtotime($fromDate . $bus["expected_departure_time_from_station"] . " +2 hours"));

        $date = new DateTime($fromDate . $fromTime, new DateTimeZone('America/Manaus'));
        $date2 = new DateTime($toDate . $toTime, new DateTimeZone('America/Manaus'));
//        echo "<br>" . $date->format('Y-m-d H:i:sP') . "<br>";

        $date->setTimezone(new DateTimeZone('UTC'));
        $date2->setTimezone(new DateTimeZone('UTC'));
//        echo "<br>" . $date->format('Y-m-d H:i:sP') . "<br>";
        $fromDate = $date->format('Y-m-d');
        $fromTime = $date->format('H:i');
        $toDate = $date2->format('Y-m-d');
        $toTime = $date2->format('H:i');
//            $user_api_hash = '$2y$10$jOlCp0l4YyEZ.uJ1BVpl4O3HrobC6v.nK3LZRN0Tg8trSLZIfPYm2';
        $user_api_hash = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
        $curlConfig = array(
            CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_history",
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => array('lang' => 'en',
                'user_api_hash' => $user_api_hash,
                'device_id' => 40,
                'from_date' => "$fromDate",
                'from_time' => "$fromTime",
                'to_date' => "$toDate",
                'to_time' => "$toTime")
        );
        echo "<pre>";
//            print_r($curlConfig);
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
//                return false;
        } else {
            $res['data'][] = json_decode($response);
            //return $res;
        }
        print_r($res);
        die;
    }

    function busperformance() {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $busMovementsObj = new BusMovementsModel();
        $delayed_buses = $busMovementsObj->getDelayedBusses();

//        print_r($delayed_buses);die;
        $heading         = 'Bus Performance';
        $title           = 'Bus Performance';
        $this->load->view('web/layout/layout', ['subview' => ['web/busperformance'], 'heading' => $heading, 'title' => $title], $delayed_buses);
//		$this->load->view('web/busperformance',$res);
    }

    function logout() {

        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_image');

        redirect('auth');
    }

    function myprofile() {

        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }

        $data['profile'] = $this->custom_model->where(['id' => $this->session->userdata('user_id')])
                ->first('users', 'email,name,profile_picture');

        if (count($data['profile']) <= 0) {

            redirect('web/logout');
        }



        $this->form_validation->set_rules('name', 'name', 'required');

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        if ($this->form_validation->run() == true) {



            $profile_picture = $data['profile']->profile_picture;



            // Uplaoding profile image

            if (isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])) {



                $config['upload_path'] = './assets/profile/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['file_name'] = rand(1000, 9999) . time();



                $this->load->library('upload', $config);





                if (!$this->upload->do_upload('profile_picture')) {

                    $data['file_error'] = array('error' => $this->upload->display_errors());

                    echo "<PrE>";

                    print_r($data['file_error']);
                    die;
                } else {

                    if (!empty($profile_picture)) {

                        if (file_exists($config['upload_path'] . $profile_picture)) {

                            unlink($config['upload_path'] . $profile_picture);
                        }
                    }

                    $data = $this->upload->data();

                    $profile_picture = $data['file_name'];
                }
            }

            // end uploading profile iamge



            $this->session->set_userdata('user_name', ucfirst($this->input->post('name')));

            $this->session->set_userdata('user_image', $profile_picture);





            $this->custom_model->where(['id' => $this->session->userdata('user_id')])->update('users', [
                "name" => trim($this->input->post('name')),
                "email" => trim($this->input->post('email')),
                "profile_picture" => $profile_picture
            ]);

            $this->session->set_flashdata('error', 'Profile has been updated successfully');

            redirect('myprofile');
        }

        $heading   = 'My Profile';
        $title     = 'My Profile';


        $this->load->view('web/layout/layout', ['subview' => ['web/myprofile'], 'data' => $data, 'heading' => $heading, 'title' => $title]);
    }

    public function get_devices($cron = 0) {

        /* echo date_default_timezone_get();

          echo date('Y-m-d h:i:s A'); */



        if ($cron == 1) {

            $current_hour = date('H');

            $current_minute = date('i');


            //$this->db->query("UPDATE bus_details SET odometer_per_day = '".$current_hour."', total_distance_per_day = '".$current_minute."', updated_at = '".date('Y-m-d H:i:s')."' WHERE device_id = '80' LIMIT 1");

            if ($current_hour == 23 && ( $current_minute >= 54 || $current_minute <= 59 )) {
//				mail('neeraj@kavyasoftech.com', 'asdfsa', 'Oceansdf Hello');
//xit;
            } else {

                exit;
            }
        }



        $curl = curl_init();

        //For operator user

        $user_api_hash = TRACK_TOKEN;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_devices",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user_api_hash\"\r\n\r\n" . $user_api_hash . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 361bbc63-1604-427e-f642-e620549b169a"
            ),
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            return false;
        } else {

            // echo $response;

            $res = json_decode($response);

            //  var_dump($res);

            $return = array();

            $return['online_counter'] = 0;

            $return['offline_counter'] = 0;

            $return['total_distance'] = 0;

            $return['fuel_consumption'] = 0;

            $return['over_speeding'] = 0;

            $return['stopped'] = 0;

            $over_speeding_limit = 66;

            // echo $cron;

            if (count($res) && isset($res[0]) && isset($res[0]->items)) {

                foreach ($res as $groupKey => $itemGroups) {

                    if (count($itemGroups->items) > 0) {

                        foreach ($itemGroups->items as $itemKey => $items) {

                            if ($cron == 2) {

                                var_dump($items);
                            } elseif ($cron == 0 || $cron == 3) {



                                if ($items->online == "online") {

                                    $return['online_counter'] = $return['online_counter'] + 1;
                                } else {

                                    $return['offline_counter'] = $return['offline_counter'] + 1;
                                }

                                if( isset($items->stop_duration) && $items->stop_duration != "" ) {
                                   /* echo $items->stop_duration;
                                    echo "<br>";*/
                                    $stop_time_array = explode(" ", $items->stop_duration);
                                    if( count($stop_time_array) > 0   ) {
                                        $stope_time_flag = false;
                                        foreach ($stop_time_array as $stopped_item) {
                                            if( !$stope_time_flag &&  strpos($stopped_item, 'min') !==  false ) {
                                                $stope_minutes = str_replace("min", "", $stopped_item);
                                                if( $stope_minutes >= 20 ) {
                                                    $stope_time_flag = true;
                                                    $return['stopped'] = $return['stopped'] + 1;
                                                }
                                            }

                                            if( !$stope_time_flag && strpos($stopped_item, 'h') !==  false ) {
                                                $stope_minutes = str_replace("h", "", $stopped_item);
                                                if( $stope_minutes > 0 ) {
                                                    $stope_time_flag = true;
                                                    $return['stopped'] = $return['stopped'] + 1;
                                                }
                                            }


                                        }

                                        /*echo  'Time conter '.$return['stopped'];
                                        echo "<br><br>";*/
                                    }
                                }


                                if (isset($items->device_data) && isset($items->device_data->traccar) && isset($items->device_data->traccar->other) && $items->device_data->traccar->other != "") {



                                    //Over speeding count

                                    if ($items->device_data->traccar->speed >= $over_speeding_limit) {

                                        $return['over_speeding'] = $return['over_speeding'] + 1;
                                    }



                                    $todaysEntry = $this->db->query("SELECT total_distance_per_day FROM bus_details WHERE device_id = '" . $items->id . "' LIMIT 1 ");

                                    if ($todaysEntry->num_rows() > 0) {

                                        $parameters = $items->device_data->traccar->other;

                                        preg_match_all('/<totaldistance>(.*?)<\/totaldistance>/s', $parameters, $matches2);



                                        $totaldistance = 0;

                                        if (isset($matches2[1]) && isset($matches2[1][0]) && $matches2[1][0] != "") {

                                            $totaldistance = $matches2[1][0];
                                        }

                                        $distance_covered = $totaldistance - $todaysEntry->row()->total_distance_per_day;



                                       // $return['fuel_consumption'] = $return['fuel_consumption'] + ( .76923076923076 * ($distance_covered / 1000));
                                        $return['fuel_consumption'] = $return['fuel_consumption'] + ( ($distance_covered / (3.5 *1000)));



                                        $return['total_distance'] = $return['total_distance'] + $distance_covered;
                                    }
                                }
                            } else {

                                //For cron use

                                /* var_dump($items);

                                  exit; */





                                if (isset($items->device_data) && isset($items->device_data->traccar) && isset($items->device_data->traccar->other) && $items->device_data->traccar->other != "") {



                                    $parameters = $items->device_data->traccar->other;



                                    preg_match_all('/<odometer>(.*?)<\/odometer>/s', $parameters, $matches);

                                    preg_match_all('/<totaldistance>(.*?)<\/totaldistance>/s', $parameters, $matches2);

                                    if (isset($matches[1]) && isset($matches[1][0]) && $matches[1][0] != "") {



                                        $checkExists = $this->db->query("SELECT id FROM bus_details WHERE device_id = '" . $items->id . "' LIMIT 1 ");



                                        $totaldistance = 0;

                                        if (isset($matches2[1]) && isset($matches2[1][0]) && $matches2[1][0] != "") {

                                            $totaldistance = $matches2[1][0];
                                        }

                                        if ($checkExists->num_rows() > 0) {

                                            $this->db->query("UPDATE bus_details SET odometer_per_day = '" . $matches[1][0] . "', total_distance_per_day = '" . $totaldistance . "', updated_at = '" . date('Y-m-d H:i:s') . "' WHERE device_id = '" . $items->id . "' LIMIT 1");
                                        } else {

                                            $this->db->query("INSERT INTO  bus_details ( device_id, odometer_per_day, total_distance_per_day,  updated_at ) VALUES ( '" . $items->id . "', '" . $matches[1][0] . "', '" . $totaldistance . "', '" . date('Y-m-d H:i:s') . "' ) ");
                                        }
                                    } //end of check for match of odoemeter
                                }
                            }
                        }
                    }
                }
            }



            if ($cron == 3) {

                if (count($return) > 0) {

                    $return['total_distance'] = round($return['total_distance'] / 1000, 2) . ' <dd style="font-size:12px; display: inline-block;">/Km</dd>';

                    $return['bus_status'] = '<div style="color: darkgreen; display: block;">' . $return['online_counter'] . ' ON</div>

                                    <div style="color: red; display: block;">' . $return['offline_counter'] . ' OFF</div>';



                    $return['fuel_consumption'] = round($return['fuel_consumption'], 2);

                    echo json_encode($return);

                    exit;
                } else {

                    echo json_encode($return);

                    exit;
                }
            }



            return $return;
        }
    }

}
