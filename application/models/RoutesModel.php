<?php

class RoutesModel extends CI_Model {

    public $id;
    public $route_no;
    public $route_name;
    public $stop_name;
    public $way;
    public $stop_no;
    public $stop_lat;
    public $stop_long;

    function __construct() {

        parent::__construct();

        $this->load->database("idealconectivida_bus");
    }

    public function updateRouts() {
        set_time_limit(0);
        if (empty($this->id)) {
            $query = "INSERT INTO `route_stops` "
                    . "(`id`, `route_no`, `route_name`, `stop_name`, `way`, `stop_no`, `stop_lat`, `stop_long`) "
                    . "VALUES "
                    . "(NULL, '$this->route_no', '$this->route_name', '', '$this->way', $this->stop_no, $this->stop_lat, $this->stop_long)";
//            echo $query;die;
            $this->db->query($query);
        }
    }
    
    public function getRouteStop($route_no){
        $query = "SELECT * FROM `route_stops` WHERE route_no='".$route_no."'";
        $q = $this->db->query($query);
        return $q->result_array();
    }
}

?>