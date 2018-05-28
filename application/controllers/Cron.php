<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //Schedules
        $schedules =  array();
        $today =  date('Y-m-d');
        $dayOfWeek =  date ( 'w' );
        $where_day = 'WD';
        $time_difference = 3800;
        if( $dayOfWeek == 0 ){ $where_day = 'SUN'; }
        if( $dayOfWeek == 6 ){ $where_day = 'SAT'; }
        $dayOfWeek = $dayOfWeek +1;

        $query_sch = $this->db->query('SELECT id, bus as bus_name, start_lat as from_lat, start_lng as from_lng, middle_lat, middle_lng, expected_middle_time, end_lat as to_lat, end_lng as to_lng,  day_of_week as day, expected_start_time as from_time, expected_end_time as to_time, created_at, route FROM bus_schedules WHERE day_of_week = "'.$where_day.'" ');

        if( $query_sch->num_rows() > 0 ){
            $schedules = $query_sch->result_array();
/*print_r($schedules);*/

            $middle_id             = 0;
            $middle_id = 0;
            $middle_bus_id         = "";
            $middle_bus_name       = "";
            $middle_lat            = "";
            $middle_lng            = "";
            $middle_source_lat     = "";
            $middle_source_lng     = "";
            $middle_distance_in_km = "";
            $middle_not_reached = 0;
            $middle_time     = "";
            $middle_date     = "";

            for($i = 0; $i < count($schedules); $i++) {

                $to_time = $schedules[$i]['to_time'];

                $to_time_array = explode(":", $to_time);

                $hour_in_schedule = $to_time;

                if( is_array($to_time_array) && count($to_time_array) > 0 ) {
                    $hour_in_schedule = $to_time_array[0];
                }
//var_dump(date('H') < $hour_in_schedule );
                if( date('H') < $hour_in_schedule ) { continue; }

                $from_where = "";
                //Get bus detail for the day
               /* if( $schedules[$i]['day'] == 'WD' ) {
                    $from_where = " ( DAYOFWEEK(added_datetime) >= 2 OR DAYOFWEEK(added_datetime) <= 6 )";
                } else {
                    $from_where = " ( DAYOFWEEK(added_datetime) = 1 OR DAYOFWEEK(added_datetime) = 7 )";
                }*/
                $query = 'SELECT id,bus_id, bus_name, lat, lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 * DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['from_lat'].')) * COS(RADIANS(lat))         * COS(RADIANS('.$schedules[$i]['from_lng'].' - lng)) + SIN(RADIANS('.$schedules[$i]['from_lat'].')) * SIN(RADIANS(lat)))) as distance_in_km FROM bus_moves WHERE bus_name = "'.$schedules[$i]['bus_name'].'" AND date(added_datetime) = "'.$today.'"  AND ABS(TIMEDIFF(added_datetime, "'.$today.' '.$schedules[$i]['from_time'].'")) <= '.$time_difference.'  ORDER BY  distance_in_km ASC limit 1';
             /*   print_r($schedules[$i]);
echo $query;*/

                $bus_detail = $this->db->query($query);
//var_dump($bus_detail->result());
                if( $bus_detail->num_rows() > 0 ) {
                    $from_id = 0;
                    foreach( $bus_detail->result() as $row ) {

                        $f_id             = $row->id;
                        $from_id          = $row->id;
                        $f_bus_id         = $row->bus_id;
                        $f_bus_name       = $row->bus_name;
                        $f_lat            = $row->lat;
                        $f_lng            = $row->lng;
                        $f_source_lat     = $schedules[$i]['from_lat'];
                        $f_source_lng     = $schedules[$i]['from_lng'];
                        $f_distance_in_km = $row->distance_in_km;
                        $f_not_reached = 0;
                        $f_exp_tim = $schedules[$i]['from_time'];

                        $date_array = explode(" ", $row->added_datetime);

                        $f_time     = $date_array[1];
                        $f_date     = $date_array[0];

                        if( $row->distance_in_km > 0.035  ) {
                            $f_not_reached = 1;
                        }

                    }


                    //Added by Ocean to get middle (halfway details)
                    if( $schedules[$i]['middle_lat'] != "" && $schedules[$i]['middle_lng'] != "" && $schedules[$i]['expected_middle_time'] != ""  ) {
                        $query_middle = 'SELECT id,bus_id, bus_name, lat, lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 * DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['middle_lat'].')) * COS(RADIANS(lat)) * COS(RADIANS('.$schedules[$i]['middle_lng'].' - lng)) + SIN(RADIANS('.$schedules[$i]['middle_lat'].')) * SIN(RADIANS(lat))))  as distance_in_km FROM bus_moves WHERE  bus_name = "'.$schedules[$i]['bus_name'].'" AND id > '.$from_id.' AND date(added_datetime) = "'.$today.'" AND ABS(TIMEDIFF(added_datetime, "'.$today.' '.$schedules[$i]['expected_middle_time'].'")) <= '.$time_difference.' ORDER BY  distance_in_km ASC limit 1' ;

                        $bus_detail_middle = $this->db->query($query_middle);

                        if( $bus_detail_middle->num_rows() > 0 ) {
                            $middle_id = 0;
                            foreach( $bus_detail_middle->result() as $row_middle ) {

                                $middle_id             = $row_middle->id;
                                $middle_id = $row_to->id;
                                $middle_bus_id         = $row_middle->bus_id;
                                $middle_bus_name       = $row_middle->bus_name;
                                $middle_lat            = $row_middle->lat;
                                $middle_lng            = $row_middle->lng;
                                $middle_source_lat     = $schedules[$i]['middle_lat'];
                                $middle_source_lng     = $schedules[$i]['middle_lat'];
                                $middle_distance_in_km = $row_middle->distance_in_km;
                                $middle_not_reached = 0;
                                $middle_exp_time = $schedules[$i]['expected_middle_time'];
                                $date_array = explode(" ", $row_middle->added_datetime);
                                $middle_time     = $date_array[1];
                                $middle_date     = $date_array[0];
                                if( $row_middle->distance_in_km > 0.035  ) {
                                    $middle_not_reached = 1;
                                }
                            }
                        }
                    }
                    //End of middle (halfway) logic

                    $query_to = 'SELECT id,bus_id, bus_name, lat, lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 * DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['to_lat'].')) * COS(RADIANS(lat)) * COS(RADIANS('.$schedules[$i]['to_lng'].' - lng)) + SIN(RADIANS('.$schedules[$i]['to_lat'].')) * SIN(RADIANS(lat))))  as distance_in_km FROM bus_moves WHERE  bus_name = "'.$schedules[$i]['bus_name'].'" AND id > '.$from_id.' AND date(added_datetime) = "'.$today.'" AND ABS(TIMEDIFF(added_datetime, "'.$today.' '.$schedules[$i]['to_time'].'")) <= '.$time_difference.' ORDER BY  distance_in_km ASC limit 1' ;

                    $bus_detail_to = $this->db->query($query_to);

                    if( $bus_detail_to->num_rows() > 0 ) {
                        $to_id = 0;
                        foreach( $bus_detail_to->result() as $row_to ) {

                            $t_id             = $row_to->id;
                            $to_id = $row_to->id;
                            $t_bus_id         = $row_to->bus_id;
                            $t_bus_name       = $row_to->bus_name;
                            $t_lat            = $row_to->lat;
                            $t_lng            = $row_to->lng;
                            $t_source_lat     = $schedules[$i]['to_lat'];
                            $t_source_lng     = $schedules[$i]['to_lng'];
                            $t_distance_in_km = $row_to->distance_in_km;
                            $t_not_reached = 0;
                            $t_exp_time = $schedules[$i]['to_time'];
                            $date_array = explode(" ", $row_to->added_datetime);
                            $t_time     = $date_array[1];
                            $t_date     = $date_array[0];
                            if( $row_to->distance_in_km > 0.035  ) {
                                $t_not_reached = 1;
                            }
                        }
                    }

                    $duplicate_check_query = $this->db->query('SELECT id  FROM bus_performance WHERE bus_name = "' . $schedules[$i]['bus_name'] . '" AND  f_source_lat = "' . $schedules[$i]['from_lat'] . '" AND  f_source_lng = "' . $schedules[$i]['from_lng'] . '" AND  t_source_lat  = "' . $schedules[$i]['to_lat'] . '" AND  t_source_lng = "' . $schedules[$i]['to_lng'] . '" AND  f_exp_time = "' . $schedules[$i]['from_time'] . '" AND  t_exp_time = "' . $schedules[$i]['to_time'] . '" AND  schedule_date = "' . $today . '"  ORDER BY id DESC LIMIT 1 ' );

                    if( $duplicate_check_query->num_rows()  > 0 ){
                        foreach( $duplicate_check_query->result() as $dup_row ) {
                            $this->db->query("UPDATE bus_performance SET  bus_id = '" . $f_bus_id . "', bus_name = '" . $schedules[$i]['bus_name'] . "', route ='" . $schedules[$i]['route'] . "', f_lat = '" . $f_lat . "',  f_lng = '" . $f_lng . "', f_source_lat = '" . $f_source_lat . "', f_source_lng = '" . $f_source_lng . "', f_distance_in_km = '" . $f_distance_in_km . "', f_not_reached = '" . $f_not_reached . "', f_exp_time = '" . $f_exp_tim . "', f_time = '" . $f_time . "', m_lat = '" . $middle_lat . "',  m_lng = '" . $middle_lng . "', m_source_lat = '" . $middle_source_lat . "', m_source_lng = '" . $middle_source_lng . "', m_distance_in_km = '" . $middle_distance_in_km . "', m_not_reached = '" . $middle_not_reached . "', m_exp_time = '" . $middle_exp_time . "', m_time = '" . $middle_time . "', t_lat = '" . $t_lat . "', t_lng = '" . $t_lng . "', t_source_lat = '" . $t_source_lat . "', t_source_lng = '" . $t_source_lng . "', t_distance_in_km = '" . $t_distance_in_km . "',   t_not_reached = '" . $t_not_reached . "',  t_exp_time = '" . $t_exp_time . "',  t_time = '" . $t_time . "', schedule_date = '" . date('Y-m-d') . "', day_of_week = '" . $dayOfWeek . "', created_at ='" . date('Y-m-d H:i:s') . "' WHERE id = ".$dup_row->id. " LIMIT 1");
                        }

                    } else {
                        $this->db->query("INSERT INTO  bus_performance ( bus_id, bus_name, route, f_lat,  f_lng, f_source_lat, f_source_lng, f_distance_in_km, f_not_reached, f_exp_time, f_time, m_lat,  m_lng, m_source_lat, m_source_lng, m_distance_in_km, m_not_reached, m_exp_time, m_time, t_lat, t_lng, t_source_lat, t_source_lng, t_distance_in_km,   t_not_reached,  t_exp_time,  t_time, schedule_date, day_of_week, created_at) VALUES ( '" . $f_bus_id . "', '" . $schedules[$i]['bus_name'] . "', '" . $schedules[$i]['route'] . "', '" . $f_lat . "', '" . $f_lng . "', '" . $f_source_lat . "', '" . $f_source_lng . "', '" . $f_distance_in_km . "', '" . $f_not_reached . "', '" . $f_exp_tim . "', '" . $f_time . "', '" . $middle_lat . "', '" . $middle_lng . "', '" . $middle_source_lat . "', '" . $middle_source_lng . "', '" . $middle_distance_in_km . "', '" . $middle_not_reached . "', '" . $middle_exp_time . "', '" . $middle_time . "', '" . $t_lat . "', '" . $t_lng . "', '" . $t_source_lat . "', '" . $t_source_lng . "', '" . $t_distance_in_km . "', '" . $t_not_reached . "', '" . $t_exp_time . "', '" . $t_time . "', '" . date('Y-m-d') . "', '" . $dayOfWeek . "', '" . date('Y-m-d H:i:s') . "' ) ");
                    }
                }
            }
        }
}
    //End of index function....



public function insertplease() {
        //Schedules
        $schedules =  array();
      //  $today =  date('Y-m-d');
        $today =  '2018-04-23';
       // $dayOfWeek =  date ( 'w' );
        $dayOfWeek = 2;
        $where_day = 'WD';
        $time_difference = 3800;
       /* if( $dayOfWeek == 0 ){ $where_day = 'SUN'; }
        if( $dayOfWeek == 6 ){ $where_day = 'SAT'; }*/

        $query_sch = $this->db->query('SELECT id, bus as bus_name, start_lat as from_lat, start_lng as from_lng, middle_lat, middle_lng, expected_middle_time, end_lat as to_lat, end_lng as to_lng,  day_of_week as day, expected_start_time as from_time, expected_end_time as to_time, created_at, route FROM bus_schedules WHERE day_of_week = "'.$where_day.'" ');

        if( $query_sch->num_rows() > 0 ){
            $schedules = $query_sch->result_array();

            for($i = 0; $i < count($schedules); $i++) {
                print_r($schedules);
                $to_time = $schedules[$i]['to_time'];

                $to_time_array = explode(":", $to_time);
                $hour_in_schedule = $to_time;
                if( is_array($to_time_array) && count($to_time_array) > 0 ) {
                    $hour_in_schedule = $to_time_array[0];
                }

                if( date('H') > $hour_in_schedule ) { continue; }

                $from_where = "";
                //Get bus detail for the day
               /* if( $schedules[$i]['day'] == 'WD' ) {
                    $from_where = " ( DAYOFWEEK(added_datetime) >= 2 OR DAYOFWEEK(added_datetime) <= 6 )";
                } else {
                    $from_where = " ( DAYOFWEEK(added_datetime) = 1 OR DAYOFWEEK(added_datetime) = 7 )";
                }*/
                $query = 'SELECT id,bus_id, bus_name, lat, lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 * DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['from_lat'].')) * COS(RADIANS(lat))         * COS(RADIANS('.$schedules[$i]['from_lng'].' - lng)) + SIN(RADIANS('.$schedules[$i]['from_lat'].')) * SIN(RADIANS(lat)))) as distance_in_km FROM bus_moves WHERE bus_name = "'.$schedules[$i]['bus_name'].'" AND date(added_datetime) = "'.$today.'"  AND ABS(TIMEDIFF(added_datetime, "'.$today.' '.$schedules[$i]['from_time'].'")) <= '.$time_difference.'  ORDER BY  distance_in_km ASC limit 1';
                /*echo $query;
                exit;*/

                $bus_detail = $this->db->query($query);

                if( $bus_detail->num_rows() > 0 ) {
                    $from_id = 0;
                    foreach( $bus_detail->result() as $row ) {

                        $f_id             = $row->id;
                        $from_id          = $row->id;
                        $f_bus_id         = $row->bus_id;
                        $f_bus_name       = $row->bus_name;
                        $f_lat            = $row->lat;
                        $f_lng            = $row->lng;
                        $f_source_lat     = $schedules[$i]['from_lat'];
                        $f_source_lng     = $schedules[$i]['from_lng'];
                        $f_distance_in_km = $row->distance_in_km;
                        $f_not_reached = 0;
                        $f_exp_tim = $schedules[$i]['from_time'];

                        $date_array = explode(" ", $row->added_datetime);

                        $f_time     = $date_array[1];
                        $f_date     = $date_array[0];

                        if( $row->distance_in_km > 0.035  ) {
                            $f_not_reached = 1;
                        }

                    }

                    $query_to = 'SELECT id,bus_id, bus_name, lat, lng, stop_duration, speed, online, api_user_id, odometer, total_distance, tail, added_timestamp, added_datetime, 111.111 * DEGREES(ACOS(COS(RADIANS('.$schedules[$i]['to_lat'].')) * COS(RADIANS(lat)) * COS(RADIANS('.$schedules[$i]['to_lng'].' - lng)) + SIN(RADIANS('.$schedules[$i]['to_lat'].')) * SIN(RADIANS(lat))))  as distance_in_km FROM bus_moves WHERE  bus_name = "'.$schedules[$i]['bus_name'].'" AND id > '.$from_id.' AND date(added_datetime) = "'.$today.'" AND ABS(TIMEDIFF(added_datetime, "'.$today.' '.$schedules[$i]['to_time'].'")) <= '.$time_difference.' ORDER BY  distance_in_km ASC limit 1' ;

                    $bus_detail_to = $this->db->query($query_to);

                    if( $bus_detail_to->num_rows() > 0 ) {
                        $to_id = 0;
                        foreach( $bus_detail_to->result() as $row_to ) {

                            $t_id             = $row_to->id;
                            $to_id = $row_to->id;
                            $t_bus_id         = $row_to->bus_id;
                            $t_bus_name       = $row_to->bus_name;
                            $t_lat            = $row_to->lat;
                            $t_lng            = $row_to->lng;
                            $t_source_lat     = $schedules[$i]['to_lat'];
                            $t_source_lng     = $schedules[$i]['to_lng'];
                            $t_distance_in_km = $row_to->distance_in_km;
                            $t_not_reached = 0;
                            $t_exp_time = $schedules[$i]['to_time'];
                            $date_array = explode(" ", $row_to->added_datetime);
                            $t_time     = $date_array[1];
                            $t_date     = $date_array[0];
                            if( $row_to->distance_in_km > 0.035  ) {
                                $t_not_reached = 1;
                            }
                        }
                    }

                    $duplicate_check_query = $this->db->query('SELECT id  FROM bus_performance WHERE bus_name = "' . $schedules[$i]['bus_name'] . '" AND  f_source_lat = "' . $schedules[$i]['from_lat'] . '" AND  f_source_lng = "' . $schedules[$i]['from_lng'] . '" AND  t_source_lat  = "' . $schedules[$i]['to_lat'] . '" AND t_source_lng = "' . $schedules[$i]['to_lng'] . '" AND  f_exp_time = "' . $schedules[$i]['from_time'] . '" AND  t_exp_time = "' . $schedules[$i]['to_time'] . '" AND  schedule_date = "' . $today . '" ORDER BY id DESC LIMIT 1 ' );

                    if( $duplicate_check_query->num_rows()  > 0 ){
                        foreach( $duplicate_check_query->result() as $dup_row ) {
                            $this->db->query("UPDATE bus_performance SET  bus_id = '" . $f_bus_id . "', bus_name = '" . $schedules[$i]['bus_name'] . "', route ='" . $schedules[$i]['route'] . "', f_lat = '" . $f_lat . "',  f_lng = '" . $f_lng . "', f_source_lat = '" . $f_source_lat . "', f_source_lng = '" . $f_source_lng . "', f_distance_in_km = '" . $f_distance_in_km . "', f_not_reached = '" . $f_not_reached . "', f_exp_time = '" . $f_exp_tim . "', f_time = '" . $f_time . "', t_lat = '" . $t_lat . "', t_lng = '" . $t_lng . "', t_source_lat = '" . $t_source_lat . "', t_source_lng = '" . $t_source_lng . "', t_distance_in_km = '" . $t_distance_in_km . "',   t_not_reached = '" . $t_not_reached . "',  t_exp_time = '" . $t_exp_time . "',  t_time = '" . $t_time . "', schedule_date = '" . $today . "', day_of_week = '" . $dayOfWeek . "', created_at ='" . date('Y-m-d H:i:s') . "' WHERE id = ".$dup_row->id. " LIMIT 1");
                        }

                    } else {
                        $this->db->query("INSERT INTO  bus_performance ( bus_id, bus_name, route, f_lat,  f_lng, f_source_lat, f_source_lng, f_distance_in_km, f_not_reached, f_exp_time, f_time, t_lat, t_lng, t_source_lat, t_source_lng, t_distance_in_km,   t_not_reached,  t_exp_time,  t_time, schedule_date, day_of_week, created_at) VALUES ( '" . $f_bus_id . "', '" . $schedules[$i]['bus_name'] . "', '" . $schedules[$i]['route'] . "', '" . $f_lat . "', '" . $f_lng . "', '" . $f_source_lat . "', '" . $f_source_lng . "', '" . $f_distance_in_km . "', '" . $f_not_reached . "', '" . $f_exp_tim . "', '" . $f_time . "', '" . $t_lat . "', '" . $t_lng . "', '" . $t_source_lat . "', '" . $t_source_lng . "', '" . $t_distance_in_km . "', '" . $t_not_reached . "', '" . $t_exp_time . "', '" . $t_time . "', '" . $today . "', '" . $dayOfWeek . "', '" . date('Y-m-d H:i:s') . "' ) ");
                    }
                }
            }
        }
}
}