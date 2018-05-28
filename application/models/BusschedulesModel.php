<?php

class BusschedulesModel extends CI_Model {

    function __construct() {

        parent::__construct();

        $this->load->database("idealconectivida_bus");
    }

    public function getSchedulByBusNo($busno, $fordate) {
        $fortime = date("H:i", strtotime($fordate));
        $weekday = date("w", strtotime($fordate));
        $day = "Weekday";
        if ($weekday == 6) {
            $day = "Saturday";
        } else if ($weekday == 0) {
            $day = "Sunday";
        }

        $queryString = 'SELECT * FROM `busschedules` WHERE '
                . '(expected_departure_time_from_station <= ' . "'$fortime'" . " ) AND "
                . "`day`='" . $day ."'"
                . " AND bus_no='$busno'"
                . " ORDER BY expected_departure_time_from_station ASC";

//        echo $queryString;die;
        $query = $this->db->query($queryString);

        return $query->result_array();
    }

    public function get_bus_schedule($fordate) {
        $fordate = date("H:i:s", strtotime($fordate));
        $weekday = date("w", strtotime($fordate));
        $day = "Weekday";
        if ($weekday == 6) {
            $day = "Saturday";
        } else if ($weekday == 0) {
            $day = "Sunday";
        }

//        $queryString = 'SELECT * FROM `busschedules` WHERE (expected_arrival_time_to_station < ' . "'$fordate'" . " ) AND `day`='" . $day . "' GROUP by bus_no ORDER BY expected_arrival_time_to_station ASC";
        $queryString = 'SELECT * FROM `busschedules` WHERE ' . "`day`='" . $day . "' GROUP by bus_no ORDER BY expected_arrival_time_to_station ASC";
        echo $queryString;
        $query = $this->db->query($queryString);

        return $query->result_array();
    }

}

?>