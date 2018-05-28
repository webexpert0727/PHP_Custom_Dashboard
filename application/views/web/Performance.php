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

          
            $select = array('id','bus as bus_name','start_lat as from_lat','start_lng as from_lng','end_lat as to_lat','end_lng as to_lng', 'day_of_week as day','expected_start_time as from_time','expected_end_time as to_time','created_at');
            $this->db->select($select)->limit(20);
            $query = $this->db->get('bus_schedules');
            $schedules = $query->result_array();
         

        }
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


        $data['subview'] = "web/performace_new";
        $data['result'] = $result;
       // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/performace_new'], 'result' => $result]);

    }
    //End of index function....



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

                            $this->db->query("INSERT INTO  bus_moves ( bus_id, bus_name, lat, lng, stop_duration, speed, online, api_timestamp, api_user_id, fuel_quantity, fuel_price, fuel_per_km, last_valid_latitude, last_valid_longitude, odometer, total_distance, tail, latest_positions, added_timestamp, added_datetime) VALUES ( '" . $bus_id . "', '" . $bus_name . "', '" . $lat . "', '" . $lng . "', '" . $stop_duration . "', '" . $speed . "', '" . $online . "', '" . $api_timestamp . "', '" . $api_user_id . "', '" . $fuel_quantity . "', '" . $fuel_price . "', '" . $fuel_per_km . "', '" . $last_valid_latitude . "', '" . $last_valid_longitude . "', '" . $odometer . "', '" . $total_distance . "', '" . $tail . "', '" . $latest_positions . "', '" . time() . "', '" . date('Y-m-d H:i:s') . "' ) ");

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
         $this->load->view('web/layout/layout', ['subview' => ['web/csv_import'], 'result' => $result, 'routes' =>$routes, 'buses' =>$buses, 'busInfo' =>$busInfo]);
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


                    if( $i > 1 ) {

                        if( $data[4] != "" ) {
                              $counter++;

                              $csvData[$counter]['s_no']               = $data[0];
                              $csvData[$counter]['route']              = $data[1];
                              $csvData[$counter]['bus_name']           = $data[2];
                              $csvData[$counter]['date']               = $data[3];
                              $csvData[$counter]['start_latlong']      = $data[4];
                              $csvData[$counter]['s_expected_time']    = $data[5];
                              $csvData[$counter]['s_actual_time']      = $data[6];
                              $csvData[$counter]['end_time']           = $data[7];
                              $csvData[$counter]['e_expected_time']    = $data[8];
                              $csvData[$counter]['e_actual_time']      = $data[9];

                                $start_latlong = str_replace('"', '' , $csvData[$counter]['start_latlong']) ;
                                $s_lat_long = explode(',', $start_latlong);

                                $end_latlong = str_replace('"', '' , $csvData[$counter]['end_time']) ;
                                $e_lat_long = explode(',', $end_latlong);
                                

                              $dataInsert['route']                  = $csvData[$counter]['route'];
                              $dataInsert['bus']                    = $csvData[$counter]['bus_name'];
                              $dataInsert['start_lat']              = $s_lat_long[0];
                              $dataInsert['start_lng']              = $s_lat_long[1];
                              $dataInsert['expected_start_time']    = $csvData[$counter]['s_expected_time'];
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
       
       $data = array(
                   'route' => $this->input->post('route'), 
                   'bus' => $this->input->post('bus_name'), 
                   'start_lat' => $this->input->post('start_lat'), 
                   'start_lng' => $this->input->post('start_lng'), 
                   'expected_start_time' => $this->input->post('start_time'), 
                   'end_lat' => $this->input->post('end_lat'), 
                   'end_lng' => $this->input->post('end_lng'), 
                   'expected_end_time' => $this->input->post('end_time'), 
                   'day_of_week' => $this->input->post('date_of_week'), 
                   
                );



                $where = array('bus' => $this->input->post('bus_name'), 'start_lat' =>$this->input->post('start_lat') , 'start_lng' => $this->input->post('start_lng') , 'expected_start_time' => $this->input->post('start_time'), 'end_lat' => $this->input->post('end_lat'), 'end_lng' => $this->input->post('end_lng'),  'expected_end_time' => $this->input->post('end_time'),'day_of_week' => $this->input->post('date_of_week'));

                $query = $this->db->get_where('bus_schedules',$where, 1);
                
                $result = $query->row();

                if(empty($result) && empty($id)){
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $this->db->insert('bus_schedules', $data);   
                }else if(empty($result) && !empty($id)){
                    $this->db->where(array('id' => $id));
                    $this->db->update('bus_schedules', $data);   
                }
                
        redirect('performance/csv_import');        
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
        
        $data['title'] = 'ServerSide';
        $data['url'] = base_url() . 'performance/parfomanceData';
        
        $data['pagination'] = table_pagination($data['url'], $total, $data['limit'], $data['page']);
         
       // $this->load->view('web/layout/layout', $data);
        $this->load->view('web/layout/layout', ['subview' => ['web/performace_new_data'], 'result' => $result,'url' =>$data['url'],'pagination' =>$data['pagination'],'limit' =>$data['limit'],'url' =>$data['page']]);

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


}
