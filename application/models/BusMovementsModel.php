<?php

class BusMovementsModel extends CI_Model {

    public $id;
    public $scheduled_id;
    public $bus_no;
    public $route;
    public $actual_departure_time;
    public $actual_arrival_time;
    public $total_time_taken;
    public $delayed_time;
    public $delay_flag;
    public $reason;
    public $date_completed;

    function __construct() {

        parent::__construct();

        $this->load->database("idealconectivida_bus");
    }

    public function updateData() {
        if (empty($this->id)) {
            $query = "INSERT INTO `bus_movements` "
                    . "(`id`, `schedule_id`, `bus_no`, `route`, `actual_departure_time`, `actual_arrival_time`, `total_time_taken`, `delayed_time`, `delay_flag`) "
                    . "VALUES "
                    . "(NULL, '$this->scheduled_id', '$this->bus_no', '$this->route', "
                    . "'$this->actual_arrival_time', '$this->actual_departure_time', '$this->total_time_taken', "
                    . "'$this->delayed_time', '$this->delay_flag'"
                    . ")";

            $this->db->query($query);
        } else {
            $query = "UPDATE `bus_movements` SET "
                    . "`schedule_id` = '$this->scheduled_id'"
                    . ", `bus_no` =  '$this->bus_no'"
                    . ", `route` = '$this->route'"
                    . ", `actual_departure_time` = '$this->actual_departure_time'"
                    . ", `actual_arrival_time` = '$this->actual_arrival_time'"
                    . ", `total_time_taken` = '$this->total_time_taken'"
                    . ", `delayed_time` = '$this->delayed_time'"
                    . ", `delay_flag` = '$this->delay_flag'"
                    . " WHERE `id` = $this->id";

            $this->db->query($query);
        }
    }

    public function getRunningBus($bus_no, $route_no) {
        $queryString = "SELECT * FROM `bus_movements` WHERE `actual_departure_time`IS NOT NULL AND ('actual_arrival_time'='0000-00-00 00:00:00' OR 'actual_arrival_time' IS NULL) AND bus_no=$bus_no AND route = '$route_no'";
        $query = $this->db->query($queryString);
        return $query->result_array();
    }

    public function getDelayedBusses() {
        $todays_busFromTime = date("Y-m-d 00:00:00");
        $todays_busToTime = date("Y-m-d 23:59:59");
        $queryString = "SELECT * FROM `bus_movements` WHERE delay_flag=1 AND actual_departure_time > '$todays_busFromTime' AND actual_departure_time < '$todays_busToTime'";
//        echo $queryString ;die;
        $query = $this->db->query($queryString);
        return $query->result_array();
    }

}

?>