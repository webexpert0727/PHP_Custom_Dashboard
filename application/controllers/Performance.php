<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Performance extends CI_Controller {

    public function __construct() {

        parent::__construct();

        /* if(!$this->session->userdata('user_id')){
            redirect('auth');
          } */
    }

    public function index() {

    $start_date = '';
    $end_date = '';
        //Schedules
        $result =  array();
        $where = array(); 
        if(!empty($this->input->post())){
           $start_date =  date('Y-m-d', strtotime($this->input->post('start_date')));
           $end_date =  date('Y-m-d ', strtotime($this->input->post('end_date')));
            $where = array('schedule_date >=' => $start_date, 'schedule_date <=' => $end_date);
        }
           
            $select = array('bus_performance.*');
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get('bus_performance');
            $result = $query->result_array();
        
  

        $data['subview'] = "web/performace_new";
        $data['result']  = $result;
        $heading         = 'Bus Performance & Realtime Delay Information';
        $title           = 'Live Performance';
       // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/performace_new'], 'result' => $result,'start_date' => $start_date,'end_date' => $end_date, 'heading' => $heading, 'title' => $title]);
   

    }
    //End of index function....

    public function bus_operator() {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $day = "Today's Report";
        $today =  date('Y-m-d');
        $data['device_status'] = $this->get_devices();

        $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) = '".$today."' " );

        $result = $query->result_array();

        $heading         = 'Bus Operator';
        $title           = 'Bus Operator';
        $this->load->view('web/layout/layout', ['subview' => ['web/bus_operator'], 'device_status' => $data['device_status'], 'result' => $result,'day' => $day, 'heading' => $heading, 'title' => $title]);
    }

    public function save_bus_moves() {

        $curl = curl_init();

        //For operator user
        $user_api_hash = TRACK_TOKEN;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_devices",
            CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user_api_hash\"\r\n\r\n" . $user_api_hash . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return false;
        } else {
            $res = json_decode($response);
            if (count($res) && isset($res[0]) && isset($res[0]->items)) {
                foreach ($res as $groupKey => $itemGroups) {
                    if (count($itemGroups->items) > 0) {
                        foreach ($itemGroups->items as $itemKey => $items) {

                            //initialize variables...
                            $bus_id                 = "";
                            $bus_name               = "";
                            $lat                    = "";
                            $lng                    = "";
                            $stop_duration          = "";
                            $speed                  = "";
                            $online                 = "";
                            $api_timestamp          = "";
                            $api_user_id            = "";
                            $fuel_quantity          = "";
                            $fuel_price             = "";
                            $fuel_per_km            = "";
                            $last_valid_latitude    = "";
                            $last_valid_longitude   = "";
                            $odometer               = "";
                            $total_distance         = "";
                            $tail                   = "";
                            $latest_positions       = "";
                            $added_timestamp        = "";
                            $added_datetime         = "";

                            //Feed values into variables...
                            $bus_id         = $items->id;
                            $bus_name       = $items->name;
                            $lat            = $items->lat;
                            $lng            = $items->lng;
                            $stop_duration  = $items->stop_duration;
                            $speed          = $items->speed;
                            $online         = $items->online;
                            $api_timestamp  = $items->timestamp;

                            if (isset($items->device_data)){
                                if (isset($items->device_data->user_id) && $items->device_data->user_id != "") {
                                    $api_user_id    = $items->device_data->user_id;
                                }
                                if (isset($items->device_data->fuel_quantity) && $items->device_data->fuel_quantity != "") {
                                    $fuel_quantity    = $items->device_data->fuel_quantity;
                                }
                                if (isset($items->device_data->fuel_price) && $items->device_data->fuel_price != "") {
                                    $fuel_price    = $items->device_data->fuel_price;
                                }
                                if (isset($items->device_data->fuel_per_km) && $items->device_data->fuel_per_km != "") {
                                    $fuel_per_km    = $items->device_data->fuel_per_km;
                                }

                                if (isset($items->device_data->traccar) ) {

                                    if(isset($items->device_data->traccar->lastValidLatitude) && $items->device_data->traccar->lastValidLatitude != "") {
                                        $last_valid_latitude    = $items->device_data->traccar->lastValidLatitude;

                                    }
                                    if(isset($items->device_data->traccar->lastValidLongitude) && $items->device_data->traccar->lastValidLongitude != "") {
                                        $last_valid_longitude   = $items->device_data->traccar->lastValidLongitude;
                                    }

                                    if(isset($items->device_data->traccar->latest_positions) && $items->device_data->traccar->latest_positions != "") {
                                        $latest_positions  = $items->device_data->traccar->latest_positions;
                                    }

                                    if(isset($items->device_data->traccar->other) && $items->device_data->traccar->other != "") {
                                        $parameters = $items->device_data->traccar->other;
                                        preg_match_all('/<odometer>(.*?)<\/odometer>/s', $parameters, $matches);
                                        preg_match_all('/<totaldistance>(.*?)<\/totaldistance>/s', $parameters, $matches2);
                                        if (isset($matches2[1]) && isset($matches2[1][0]) && $matches2[1][0] != "") {
                                            $total_distance = $matches2[1][0];
                                        }
                                        if (isset($matches[1]) && isset($matches[1][0]) && $matches[1][0] != "") {
                                            $odometer = $matches[1][0];
                                        }

                                    }
                                }
                                //End of traccer data... (if condition for that)

                                $tail  = json_encode( $items->tail );

                            }

                            $duplicate_check_query = $this->db->query('SELECT lat, lng, online  FROM bus_moves WHERE bus_id = "' . $bus_id . '" AND bus_name = "' . $bus_name . '" ORDER BY id DESC LIMIT 1 '  );
                            $duplicate =  false;
                            if( $duplicate_check_query->num_rows()  > 0 ){

                                foreach( $duplicate_check_query->result() as $duplicate_row ) {

                                    if( $duplicate_row->lat == $lat && $duplicate_row->lng == $lng && $duplicate_row->online == $online ) {
                                        $duplicate = true;
                                    }

                                }

                            }

                            /*if( $bus_id == 72 ) {

                            }*/

                            if(!$duplicate){

                               $this->db->query("INSERT INTO  bus_moves ( bus_id, bus_name, lat, lng, stop_duration, speed, online, api_timestamp, api_user_id, fuel_quantity, fuel_price, fuel_per_km, odometer, total_distance, tail, added_timestamp, added_datetime) VALUES ( '" . $bus_id . "', '" . $bus_name . "', '" . $lat . "', '" . $lng . "', '" . $stop_duration . "', '" . $speed . "', '" . $online . "', '" . $api_timestamp . "', '" . $api_user_id . "', '" . $fuel_quantity . "', '" . $fuel_price . "', '" . $fuel_per_km . "', '" . $odometer . "', '" . $total_distance . "', '" . $tail . "', '" . time() . "', '" . date('Y-m-d H:i:s') . "' ) ");
                            }

                        }
                        //End of foreach loop for each item
                    }
                }
            }
        }
    }


     public function csv_import($id = null){

        $data['subview'] = "web/csv_import";
        $title = 'CSV Import';
        $heading = 'CSV Import';
        $csv_page = 1;
                $this->db->order_by('id','desc'); 
        $query = $this->db->get('bus_schedules');
        $result = $query->result();

        $routes = $this->get_routes();
        $buses = $this->get_devices();
        $busInfo = array();
        if($id){

            $query = $this->db->get_where('bus_schedules', array('id' => $id));

            $busInfo = $query->row();
        }

        if( $routes ) {
            $routes = $routes->routes;
        } else {
            $routes = array();
        }


       // $this->load->view('web/layout/layout', $data);
         $this->load->view('web/layout/layout', ['subview' => ['web/csv_import'], 'result' => $result, 'routes' =>$routes, 'buses' =>$buses, 'busInfo' =>$busInfo, 'heading' => $heading, 'title' => $title, 'csv_page' => $csv_page]);
    }



      public function save_csv_import(){
            $file = $_FILES['csv_file']['tmp_name'];


            //$file = fopen($_FILES['csv_file']['tmp_name'],'r') or die("can't open file");
           // $file = FCPATH . 'assets/Route_10.csv';

            $row = 1;
            if (($handle = fopen($file, "r")) !== FALSE) {

                $counter = -1;
                $i = 0;
                $csvData = array();
                while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
                 
                    if( $i >= 1 ) {


                        if( $data[4] != "" ) {

                              $counter++;

                              $csvData[$counter]['s_no']               = $data[0];
                              $csvData[$counter]['route']              = $data[1];
                              $csvData[$counter]['bus_name']           = $data[2];
                              $csvData[$counter]['date']               = $data[3];
                              $csvData[$counter]['start_latlong']      = $data[4];
                              $csvData[$counter]['s_expected_time']    = $data[5];
                              $csvData[$counter]['middle_latlong']     = $data[6];
                              $csvData[$counter]['m_expected_time']    = $data[7];
                              $csvData[$counter]['end_time']           = $data[8];
                              $csvData[$counter]['e_expected_time']    = $data[9];
                             
                             

                                $start_latlong = str_replace('"', '' , $csvData[$counter]['start_latlong']) ;
                                $s_lat_long = explode(',', $start_latlong);

                                $middle_latlong = str_replace('"', '' , $csvData[$counter]['middle_latlong']) ;
                                $m_lat_long = explode(',', $middle_latlong);

                                $end_latlong = str_replace('"', '' , $csvData[$counter]['end_time']) ;
                                $e_lat_long = explode(',', $end_latlong);


                              $dataInsert['route']                  = $csvData[$counter]['route'];
                              $dataInsert['bus']                    = $csvData[$counter]['bus_name'];
                              $dataInsert['start_lat']              = $s_lat_long[0];
                              $dataInsert['start_lng']              = $s_lat_long[1];
                              $dataInsert['expected_start_time']    = $csvData[$counter]['s_expected_time'];
                              $dataInsert['middle_lat']             = (!empty($m_lat_long[0]))?($m_lat_long[0]):('');
                              $dataInsert['middle_lng']             = (!empty($m_lat_long[1]))?($m_lat_long[1]):('');
                              $dataInsert['expected_middle_time']   = (!empty($csvData[$counter]['m_expected_time']))?($csvData[$counter]['m_expected_time']):('');
                              $dataInsert['end_lat']                = $e_lat_long[0];
                              $dataInsert['end_lng ']               = $e_lat_long[1];
                              $dataInsert['expected_end_time ']     = $csvData[$counter]['e_expected_time'];
                              $dataInsert['day_of_week ']           = $csvData[$counter]['date'];
                              $dataInsert['created_at']             = date('Y-m-d H:i:s');
                           
                            $where = array('bus' => $csvData[$counter]['bus_name'], 'start_lat' =>$s_lat_long[0] , 'start_lng' => $s_lat_long[1] , 'expected_start_time' => $csvData[$counter]['s_expected_time'], 'end_lat' => $e_lat_long[0], 'end_lng' => $e_lat_long[1],  'expected_end_time' => $csvData[$counter]['e_expected_time'],'day_of_week' => $csvData[$counter]['date']);

                            $query = $this->db->get_where('bus_schedules',$where, 1);
                            $result = $query->row();
                          
                            if(empty($result)){

                             $this->db->insert('bus_schedules', $dataInsert);
                            }

                          }
                    }
                       $i++;

                }
               
                fclose($handle);

            }

             redirect('performance');


    }

    public function save_parfomance($id = null ){
        $this->load->helper('pagination');
       $data = array(
                   'route'              => $this->input->post('route'),
                   'bus'                => $this->input->post('bus_name'),
                   'start_lat'          => $this->input->post('start_lat'),
                   'start_lng'          => $this->input->post('start_lng'),
                   'expected_start_time'=> $this->input->post('start_time'),
                   'middle_lat'         => $this->input->post('middle_lat'),
                   'middle_lng'         => $this->input->post('middle_lng'),
                   'expected_middle_time'=> $this->input->post('middle_time'),
                   'end_lat'            => $this->input->post('end_lat'),
                   'end_lng'            => $this->input->post('end_lng'),
                   'expected_end_time'  => $this->input->post('end_time'),
                   'day_of_week'        => $this->input->post('date_of_week'),

                );

                $where = array('bus' => $this->input->post('bus_name'), 'start_lat' =>$this->input->post('start_lat') , 'start_lng' => $this->input->post('start_lng') , 'expected_start_time' => $this->input->post('start_time'),  'end_lat' => $this->input->post('end_lat'), 'end_lng' => $this->input->post('end_lng'),  'expected_end_time' => $this->input->post('end_time'),'day_of_week' => $this->input->post('date_of_week'));
                if(empty($id)){

                $query = $this->db->get_where('bus_schedules',$where, 1);

                $result = $query->row();
                if(empty( $result)){
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $this->db->insert('bus_schedules', $data);
                }
                    $type = 'success';
                    $message = 'Great! Info has been added';
                    set_message($type, $message);
                    redirect('performance/csv_import');

                }else{

                    $where['id !='] = $id;
                    $query = $this->db->get_where('bus_schedules',$where, 1);

                    $result = $query->row();
                if(empty($result)){

                    $this->db->where('id' , $id);
                    $this->db->update('bus_schedules', $data);
                  //  echo $this->db->last_query(); die;
                    $type = 'success';
                    $message = 'Great! Info has been update';
                    //redirect users to view page
                    echo json_encode(array('success' => $type, 'message' => $message));
                }

                }


    }

    public function view_edit($id){
        $routes = $this->get_routes();
        $buses = $this->get_devices();
        $busInfo = array();
        if($id){

            $query = $this->db->get_where('bus_schedules', array('id' => $id));
            $busInfo = $query->row();
        }

        if( $routes ) {
            $routes = $routes->routes;
        } else {
            $routes = array();
        }

       // $this->load->view('web/layout/layout', $data);


        $title = 'Edit';
        $heading = 'Edit';
        $this->load->view('web/edit_model',['routes' =>$routes, 'buses' =>$buses, 'busInfo' =>$busInfo, 'heading' => $heading, 'title' => $title],false);

    }


     public function parfomanceData() {

        $this->load->helper('pagination');

       /* if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
*/

        /*
            coordinates {"lat":-8.807126227221952,"lng":-63.877569437026985}
description
id
map_icon_id 9
name    Ocean+test+3AA
        */
        //Schedules
        $schedules =  array();
        $schedules[0]['id']             = 1;
        $schedules[0]['schedule_name']  = 'test';
        //8.778916
        //63.898144
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $schedules[0]['from_lat']       = $_POST['from_lat'];
            $schedules[0]['from_lng']       = $_POST['from_lng'];
            $schedules[0]['from_time']      = $_POST['from_time'];
            $schedules[0]['to_lat']         = $_POST['to_lat'];
            $schedules[0]['to_lng']         = $_POST['to_lng'];
            $schedules[0]['to_time']        = $_POST['to_time'];
            $schedules[0]['day']            = 'weekday';


            $schedules[0]['bus_name']         = 226;
        } else {




            $data['limit'] = (isset($_GET['limit'])) ? ($_GET['limit']) : (10);
            $data['page'] = (isset($_GET['page'])) ? ($_GET['page']) : (1);
            $limit['length'] = $data['limit'];
            $page = intval($data['page']);
            $limit['start'] = ($page - 1) * $limit['length'];

            $select = array('id','bus as bus_name','start_lat as from_lat','start_lng as from_lng','end_lat as to_lat','end_lng as to_lng', 'day_of_week as day','expected_start_time as from_time','expected_end_time as to_time','created_at');

            $queryCount = $this->db->get('bus_schedules');
            $total = count($queryCount->result_array());

            $this->db->select($select)->limit($limit['length'], $limit['start']);
            $query = $this->db->get('bus_schedules');
            $schedules = $query->result_array();





        }
      //  print_r($schedules);
        // print_r($schedules);die;s

        //For last seven days....

        $result = array();
        $counter = 0;
        for($i = 0; $i < count($schedules); $i++) {

            $from_where = "";
            //Get bus detail for the day
            if( $schedules[$i]['day'] == 'WD' ) {
                $from_where = " ( DAYOFWEEK(added_datetime) >= 2 OR DAYOFWEEK(added_datetime) <= 6 )";
            } else {
                $from_where = " ( DAYOFWEEK(added_datetime) = 1 OR DAYOFWEEK(added_datetime) = 7 )";
            }
            $query = 'SELECT id,bus_id, bus_name,  lat , lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 *     DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['from_lat'].'))          * COS(RADIANS(lat))         * COS(RADIANS('.$schedules[$i]['from_lng'].' - lng))         + SIN(RADIANS('.$schedules[$i]['from_lat'].'))         * SIN(RADIANS(lat))))  as distance_in_km FROM bus_moves WHERE  bus_name = "'.$schedules[$i]['bus_name'].'" AND '.$from_where.' AND date(added_datetime) > "2018-04-12"  ORDER BY  ABS(TIMEDIFF(added_datetime, "2018-04-13 '.$schedules[$i]['from_time'].'")) ASC, distance_in_km ASC limit 1' ;
            //, 4500

           /* echo '$query1 '. $query;
            echo "<br>";*/


            $bus_detail = $this->db->query($query);

            if( $bus_detail->num_rows() > 0 ) {
                $from_id = 0;
                foreach( $bus_detail->result() as $row ) {

                    $result[$counter]['f_id']             = $row->id;
                    $from_id = $row->id;
                    $result[$counter]['f_bus_id']         = $row->bus_id;
                    $result[$counter]['f_bus_name']       = $row->bus_name;
                    $result[$counter]['f_lat']            = $row->lat;
                    $result[$counter]['f_lng']            = $row->lng;
                    $result[$counter]['f_source_lat']     = $schedules[$i]['from_lat'];
                    $result[$counter]['f_source_lng']     = $schedules[$i]['from_lng'];
                    $result[$counter]['f_distance_in_km'] = $row->distance_in_km;
                    $result[$counter]['f_not_reached'] = false;
                    $result[$counter]['f_exp_tim'] = $schedules[$i]['from_time'];

                    $date_array = explode(" ", $row->added_datetime);

                    $result[$counter]['f_time']     = $date_array[1];
                    $result[$counter]['f_date']     = $date_array[0];

                    if( $row->distance_in_km > 0.035  ) {
                        $result[$counter]['f_not_reached'] = true;
                    }

                }

                $query_to = 'SELECT id,bus_id, bus_name,  lat , lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 *     DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['to_lat'].'))          * COS(RADIANS(lat))         * COS(RADIANS('.$schedules[$i]['to_lng'].' - lng))         + SIN(RADIANS('.$schedules[$i]['to_lat'].'))         * SIN(RADIANS(lat))))  as distance_in_km FROM bus_moves WHERE  bus_name = "'.$schedules[$i]['bus_name'].'" AND '.$from_where.'  AND id > '.$from_id.' AND date(added_datetime) > "2018-04-12" ORDER BY   ABS(TIMEDIFF(added_datetime, "2018-04-13 '.$schedules[$i]['to_time'].'")) ASC, distance_in_km ASC  limit 1' ;

               /* echo '$query2 '. $query_to;
                echo "<br>";*/

                //AND date(added_datetime) = "2018-04-12"

                $bus_detail_to = $this->db->query($query_to);

                if( $bus_detail_to->num_rows() > 0 ) {
                    $to_id = 0;
                    foreach( $bus_detail_to->result() as $row_to ) {

                        $result[$counter]['t_id']             = $row_to->id;
                        $to_id = $row_to->id;
                        $result[$counter]['t_bus_id']         = $row_to->bus_id;
                        $result[$counter]['t_bus_name']       = $row_to->bus_name;
                        $result[$counter]['t_lat']            = $row_to->lat;
                        $result[$counter]['t_lng']            = $row_to->lng;
                        $result[$counter]['t_source_lat']     = $schedules[$i]['to_lat'];
                        $result[$counter]['t_source_lng']     = $schedules[$i]['to_lng'];
                        $result[$counter]['t_distance_in_km'] = $row_to->distance_in_km;
                        $result[$counter]['t_not_reached'] = false;
                        $result[$counter]['t_exp_tim'] = $schedules[$i]['to_time'];


                        $date_array = explode(" ", $row_to->added_datetime);

                        $result[$counter]['t_time']     = $date_array[1];
                        $result[$counter]['t_date']     = $date_array[0];

                        if( $row_to->distance_in_km > 0.035  ) {
                            $result[$counter]['t_not_reached'] = true;
                        }

                    }
                }

                $counter++;
            }


        }

        //print_r($result);

//111.111 * DEGREES(ACOS(COS(RADIANS(a.Latitude)) * COS(RADIANS(b.Latitude)) * COS(RADIANS(a.Longitude - b.Longitude)) + SIN(RADIANS(a.Latitude)) * SIN(RADIANS(b.Latitude)))) AS distance_in_km
        //ROUND(20924640 * acos(sin(’.$latA.’) * sin(’.$latB.’) + cos(’.$latA.’) * cos(’.$latB.’) * cos(’.$lngA.’ - ’.$lngB.’)))


        $data['subview'] = "web/performace_new_data";
        $data['result'] = $result;

        $heading = 'ServerSide';
        $title  = 'ServerSide';
        $data['url'] = base_url() . 'performance/parfomanceData';

        $data['pagination'] = table_pagination($data['url'], $total, $data['limit'], $data['page']);

       // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/performace_new_data'], 'result' => $result,'url' =>$data['url'],'pagination' =>$data['pagination'],'limit' =>$data['limit'],'url' =>$data['page'], 'heading' => $heading, 'title' => $title]);

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
//      $this->load->view('web/busperformance',$res);
    }


    public function get_devices($cron = 0) {

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
            $return_array = array();
            if (count($res) && isset($res[0]) && isset($res[0]->items)) {

                foreach ($res as $groupKey => $itemGroups) {

                    if (count($itemGroups->items) > 0) {

                        foreach ($itemGroups->items as $itemKey => $items) {
                            $return_array[] = $items->name;
                        }
                    }
                }
            }

            return $return_array;
        }
    }


    public function performance_month_schedule() {

        //Schedules
        $result =  array();
        $current_month =  date('m');
      
        $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where month(`schedule_date`) = '$current_month'" );
        $result = $query->result_array();
        $data['subview'] = "web/parfomance_schedule";
        $data['result'] = $result;
        $heading         = 'Monthly Performance';
        $title           = 'Monthly Performance';
       // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/parfomance_schedule'], 'result' => $result, 'heading' => $heading, 'title' => $title]);

    }


    public function drawMap($id = null) {
        if (!$this->session->userdata('user_id')) {

            redirect('auth');
        }
        $title = 'Bus Snap';
        $heading = 'Bus Snap';
        $mapdata = '';
        $where = array(); 
        $latitude = '';
        $longitude = '';
        $date = '';
        $bus_name = '';
        $time  = '';
        if(!empty($this->input->post())){
            $bus_name =$this->input->post('bus_name');
            $time  = $this->input->post('start_time');
            $date = $this->input->post('start_date');
            $date =  date('Y-m-d', strtotime($this->input->post('start_date')));

           $exact_time =  date('H:i:s', strtotime($this->input->post('start_time')));
           $start_privious_time =  date('H:i:s', strtotime("-10 minutes",strtotime($this->input->post('start_time'))));
           $start_next_time =  date('H:i:s', strtotime("+10 minutes",strtotime($this->input->post('start_time'))));

           $start_date  = $date .' '. $start_privious_time;
           $end_date  = $date .' '. $start_next_time;
            
            $exact_date = $date .' '. $exact_time;
            $where = array('bus_name' => $this->input->post('bus_name'), 'added_datetime >=' => $start_date, 'added_datetime <=' => $end_date);

            $exact_time =  date('H:i:s', strtotime($this->input->post('start_time')));
            $exact_date = $date .' '. $exact_time;
            $whereExact = array('bus_name' => $this->input->post('bus_name'), 'added_datetime =' => $exact_date);


            $this->db->select(array('lat','lng'));
            $this->db->where($where);
            $query = $this->db->get('bus_moves');
            $result = $query->result();
           // echo $this->db->last_query();
            $resultCount = count($query->result());
            $resultc = $resultCount /2;

           if(!empty($result)){
            /*$result = array_reduce($result, function ($hold, $value) {
                $value->lat = (float) $value->lat;
                $value->lng = (float) $value->lng;
                array_push($hold, $value);
                return $hold;
            }, []);
           
           $mapdata = json_encode($result);*/
           $path = '';
           foreach ($result as $p) {
                $lat = (float) $p->lat;
                $lng = (float) $p->lng;

                $path .= $lat .',' .$lng .'|';
           }
          
          $mapdata  =  rtrim($path,'|');
          $i = 1;
           foreach ($result as $lats) {

            if(!empty($lats->lat) && !empty($lats->lng) && $i > $resultc){
                 $latitude = $lats->lat;
              $longitude = $lats->lng;
               break;
            }
             if(!empty($latitude) && !empty($longitude)){
               
               break;
            }

            $i++;
           }

            $this->db->select(array('lat','lng'));
            $this->db->where($whereExact);
            $oneRecord = $this->db->get('bus_moves');
            $oneRecordData = $oneRecord->row();

           if(!empty($oneRecordData)){
                $latitude = $lats->lat;
                $longitude = $lats->lng;
           }
        }
      
    }        
        $buses = $this->get_devices();
        
       // $this->load->view('web/layout/layout', $data);
         $this->load->view('web/layout/layout', ['subview' => ['web/bus_snap'], 'result' => $mapdata, 'buses' =>$buses, 'heading' => $heading, 'title' => $title, 'latitude' => $latitude, 'longitude' => $longitude,'bus_name' => $bus_name, 'date' => $date ,'time' => $time]);
    }



    public function route_operation(){
        $y_all = 0;
        $y_two = 0;
        $y_one = 0;
        $y_count  = 0;
        $y_totalCount = 0;
        $y_persantage = 0;
        $t_all = 0;
        $t_two = 0;
        $t_one = 0;
        $t_count  = 0;
        $t_totalCount = 0;
        $t_persantage = 0;
        $routesName = '';
        $day_of_week = '';
        $dataRaw  = array();
        $dd = array(); // bus count array today wise
        $ddk = array(); // bus count value array today wise
        $d = array(); // bus count array yesterday wise
        $dk = array(); // bus count value array yesterday wise

        $routes = array();
        $title = 'Route Operation';
        $heading = 'Route Operation';
        $route_name = '';
        $result = array();
                $this->db->select('route');
                $this->db->order_by('id','desc');
                $this->db->group_by('route'); 
        $query = $this->db->get('bus_performance');
        $routes = $query->result();
       
        if($this->input->post("submitRoute") == 'submitRoute'){
             
            $route_name =$this->input->post('route_name');
            $to_date        = date('Y-m-d');
            $yesterday_date = date('Y-m-d',strtotime("-1 days"));
            $whereToday     = array('route' => $route_name , 'schedule_date' => $to_date );
            $whereYesterday = array('route' => $route_name , 'schedule_date' => $yesterday_date);

            $this->db->select(array('f_time','m_time', 't_time','bus_name'));
            $this->db->where($whereToday);
            $todayQuery  = $this->db->get('bus_performance');
            $todayRecord = $todayQuery->result();
            $t_totalCount= count($todayQuery->result()) *2;

            $dd = array_count_values(array_column($todayRecord, 'bus_name'));
            $ddk = array();

            if(!empty($todayRecord)){
                foreach ($todayRecord as $value) {

               /* $this->db->select('bus_name');
                $this->db->order_by('id','desc');
                $queryBus = $this->db->get_where('bus_performance' , array('id' => $value->id));
                $busData  = $queryBus->row();*/
                        
                    if($value->f_time && $value->m_time && $value->t_time){
                        $t_all = $t_all + 2;
                        $ddk[$value->bus_name] = (array_key_exists($value->bus_name,$ddk))?($ddk[$value->bus_name]+2):(2);
                    }else if($value->f_time && $value->m_time){
                        $t_two = $t_two + 1;
                        $ddk[$value->bus_name] = (array_key_exists($value->bus_name,$ddk))?($ddk[$value->bus_name]+1):(1);
                    }
                    else if($value->f_time && $value->t_time){
                        $t_two = $t_two + 1;
                        $ddk[$value->bus_name] = (array_key_exists($value->bus_name,$ddk))?($ddk[$value->bus_name]+1):(1);
                    }
                    else if($value->m_time && $value->t_time){
                        $t_two = $t_two + 1;
                        $ddk[$value->bus_name] = (array_key_exists($value->bus_name,$ddk))?($ddk[$value->bus_name]+1):(1);
                    }else{
                        $t_one = 0;
                        $ddk[$value->bus_name] = (array_key_exists($value->bus_name,$ddk))?($ddk[$value->bus_name]+0):(0);
                    }



                }

                $t_count =  $t_all + $t_two + $t_one ;
                $t_persantage = ($t_count * 100)/$t_totalCount;
            }
            
           // print_r($todayRecord) ; die;

            $this->db->select(array('f_time','m_time', 't_time','bus_name'));
            $this->db->where($whereYesterday);
            $yesterdayQuery = $this->db->get('bus_performance');
            $yesterdayRecord = $yesterdayQuery->result();
            $y_totalCount = count($yesterdayQuery->result()) *2;
           // print_r($yesterdayRecord);die;
            $d = array_count_values(array_column($yesterdayRecord, 'bus_name'));
            $dk = array();
           
            if(!empty($yesterdayRecord)){
                foreach ($yesterdayRecord as $value) {
                        
                    if($value->f_time && $value->m_time && $value->t_time){
                        $y_all = $y_all + 2;
                        $dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+2):(2);
                    }else if($value->f_time && $value->m_time){
                        $y_two = $y_two + 1;
                        $dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+1):(1);
                    }
                    else if($value->f_time && $value->t_time){
                        $y_two = $y_two + 1;
                        $dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+1):(1);
                    }
                    else if($value->m_time && $value->t_time){
                        $y_two = $y_two + 1;
                        $dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+1):(1);
                    }else{
                        $y_one = 0;
                        $dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+0):(0);
                    }

                }

               
                $y_count =  $y_all + $y_two + $y_one ;
                $y_persantage = ($y_count * 100)/$y_totalCount;
            }
        }

        if($this->input->post("submitFilter") == 'submitFilter'){
         
            $routesName  = $this->input->post('route');
            $day_of_week = $this->input->post('date_of_week');
            if($day_of_week == 'ALL'){
                $whereRaw = array('route' => $routesName);
            }else if($day_of_week == 'WD'){
                $whereRaw = array('route' => $routesName);
                $dayArray = array('1', '2');
                $this->db->where_not_in('day_of_week', $dayArray);
            }else{
               $whereRaw = array('route' => $routesName , 'day_of_week' => $day_of_week ); 
            }
            $this->db->where($whereRaw);
            $dataQuery = $this->db->get('bus_performance');
            $dataRaw = $dataQuery->result_array();

        }

        //// $query = $this->db->query("SELECT `bus_performance`.* FROM `bus_performance` where date(`schedule_date`) >= '".$today."' " );
//$result = $query->result_array();

        /*  $routes = $this->get_routes();
        if( $routes ) {
            $routes = $routes->routes;
        } else {
            $routes = array();
        }
        */


            $tt_date        = date('Y-m-d');
            $ty_date = date('Y-m-d',strtotime("-1 days"));
            $whereTotal = array('schedule_date >=' => $ty_date ,'schedule_date <=' => $tt_date  );

            $this->db->select(array('f_time','m_time', 't_time','schedule_date','route'));
            $this->db->where($whereTotal);
            $query  = $this->db->get('bus_performance');
            $totalRecord = $query->result();
            
            $tyCount = 0;
            $ttCount = 0;
            $ty_all  = 0;
            $ty_two  = 0;
            $ty_one  = 0;
            $tt_all  = 0;
            $tt_two  = 0;
            $tt_one  = 0;
            $i_count = 0;
            $j_count = 0;
            $tt_persantage = 0;
            $ty_persantage = 0;
            if(!empty($totalRecord)){
                foreach ($totalRecord as $value) {

                    // Totot today count without route
                    if($value->schedule_date == $tt_date ){

                        if($value->f_time && $value->m_time && $value->t_time){
                            $tt_all = $tt_all + 2;
                        }else if($value->f_time && $value->m_time){
                            $tt_two = $tt_two + 1;
                        }
                        else if($value->f_time && $value->t_time){
                            $tt_two = $tt_two + 1;
                        }
                        else if($value->m_time && $value->t_time){
                            $tt_two = $tt_two + 1;
                        }else{
                            $tt_one = 0;
                        }

                      $i_count++; 
      
                    }

                    // Totot Yesterday count without route
                    if($value->schedule_date == $ty_date ){

                        if($value->f_time && $value->m_time && $value->t_time){
                            $ty_all = $ty_all + 2;
                        }else if($value->f_time && $value->m_time){
                            $ty_two = $ty_two + 1;
                        }
                        else if($value->f_time && $value->t_time){
                            $ty_two = $ty_two + 1;
                        }
                        else if($value->m_time && $value->t_time){
                            $ty_two = $ty_two + 1;
                        }else{
                            $ty_one = 0;
                        }

                      $j_count++; 
      
                    }
                            
                   
                }

                $ttCount =  $tt_all + $tt_two + $tt_one ;
                if($ttCount != 0){
                    $tt_persantage = ($ttCount * 100)/($i_count *2);
                }
                $tyCount =  $ty_all + $ty_two + $ty_one ;
                if($tyCount != 0){
                    $ty_persantage = ($tyCount * 100)/($j_count *2);
                }
            }



   
       // $this->load->view('web/layout/layout', $data);
         $this->load->view('web/layout/layout', ['subview' => ['web/route_operation'], 't_count' => $t_count, 't_totalCount' => $t_totalCount,  't_persantage' => $t_persantage,'y_count' => $y_count, 'y_totalCount' => $y_totalCount,  'y_persantage' => $y_persantage, 'routes' =>$routes,  'heading' => $heading, 'title' => $title, 'route_name' => $route_name,'result' => $dataRaw, 'routesName' => $routesName,'day_of_week' => $day_of_week ,'tt_persantage' => $tt_persantage,'ty_persantage' => $ty_persantage,'y_busCount' => $d,'y_busValueCount' => $dk ,'t_busCount' => $dd,'t_busValueCount' => $ddk]);

    }


    public function bus_operation(){
       /* $this->db->select(array('bus_name','route','f_exp_time','f_time','t_exp_time','t_time','schedule_date'));
        $query  = $this->db->get('bus_performance');
        $all_record =  $query->result();*/
      //  $d = array_count_values(array_column($all_record, array('bus_name','route')));

        
        /*$dk = array();
        if(!empty($all_record)){
            foreach ($all_record as $value) {
                    
                $f_diff = $this->timeDiff($value->f_exp_time,$value->f_time,$value->schedule_date ); 
                $t_diff = $this->timeDiff($value->t_exp_time,$value->t_time,$value->schedule_date ); 

                if($f_diff + $t_diff < 0 ){

                    foreach ($value as $key2 => $value2){
                        $index = $key2.'-'.$value2;
                        if (array_key_exists($index, $dk)){
                            $dk[$index]++;
                        } else {
                            $dk[$index] = 1;
                        }
                    }
                   
                  //$dk[$value->bus_name] = (array_key_exists($value->bus_name,$dk))?($dk[$value->bus_name]+1):(1);
                }
                
            }
            print_r($dk); die;
        }*/

        $totalRouteRecord = array();
        $total_record_filter  = array();
        $routesName = '';
        $day_of_week = '';
        $cycle  = '';
        $routes = array();
        $title = 'Bus Operation';
        $heading = 'Bus Operation';
        $route_name = '';
        $result = array();
                $this->db->select('route');
                $this->db->order_by('id','desc');
                $this->db->group_by('route'); 
        $query = $this->db->get('bus_performance');
        $routes = $query->result();

        if($this->input->post("submitRoute") == 'submitRoute'){
             
            $route_name  = $this->input->post('route_name');
            $whereRoute  = array('route' => $route_name);

            $this->db->where($whereRoute);
            $query  = $this->db->get('bus_performance');
            $totalRouteRecord = $query->result_array();
           // print_r($totalRouteRecord); die;
            
        }

        if($this->input->post("submitFilter") == 'submitFilter'){
         
            $routesName  = $this->input->post('route');
            $day_of_week = $this->input->post('date_of_week');
            $cycle = $this->input->post('cycle');
            $whereRaw = array();
            if($day_of_week == 'ALL'){
                $whereRaw = array('route' => $routesName);
            }else if($day_of_week == 'WD'){
                $whereRaw = array('route' => $routesName);
                $dayArray = array('1', '2');
                $this->db->where_not_in('day_of_week', $dayArray);
            }else{
               $whereRaw = array('route' => $routesName , 'day_of_week' => $day_of_week ); 
            }
            

            if($cycle == 'TODAY'){
                $whereRaw['schedule_date'] = date('Y-m-d');
            }else if($cycle == 'YESTERDAY'){
                $whereRaw['schedule_date'] = date('Y-m-d',strtotime("-1 days"));
            }else if($cycle == '15_DAYS'){
               $whereRaw['schedule_date >='] = date('Y-m-d',strtotime("-15 days"));
            }else if($cycle == '30_DAYS'){
               $whereRaw['schedule_date >='] = date('Y-m-d',strtotime("-30 days"));
            }

            $this->db->where($whereRaw);

            $dataQuery = $this->db->get('bus_performance');
            $total_record_filter = $dataQuery->result_array();
            //echo $this->db->last_query(); die;
        }

       
          // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/bus_operation'], 'routes' =>$routes,  'heading' => $heading, 'title' => $title, 'route_name' => $route_name,'totalRouteRecord' => $totalRouteRecord,'total_record_filter' => $total_record_filter,'routesName' => $routesName,'day_of_week' => $day_of_week,'cycle' => $cycle]);

    }

   public function timeDiff($exp, $act, $date) {
        $exp = strtotime($date .' '.$exp);
        $act = strtotime($date.' '. $act);
        return round(($exp - $act) / 60,2);
    }

}
