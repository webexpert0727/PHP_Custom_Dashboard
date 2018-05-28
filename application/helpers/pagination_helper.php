<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('pagination')) {

    function table_pagination($url, $total, $limit, $page, $links = 5) {
        $ps = (strpos($url, '?') !== FALSE) ? ('&') : ('?');
        $last = ceil($total / $limit);
        $class = "paginate_button";
        $start = ( ( $page - $links ) > 0 ) ? $page - $links : 1;
        $end = ( ( $page + $links ) < $last ) ? $page + $links : $last;

        $html = '<ul class="pagination">';

        $class = ( $page == 1 ) ? "disabled" : "";
        $link = ($page == 1) ? ('javascript:void(0)') : ($url . $ps . 'limit=' . $limit . '&page=' . ( $page - 1 ));
        $html .= '<li class="paginate_button ' . $class . '"><a  href="' . $link . '">&laquo;</a></li>';

        if ($start > 1) {
            $html .= '<li><a href="' . $url . $ps . 'limit=' . $limit . '&page=1">1</a></li>';
            $html .= '<li class="disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            $class = ( $page == $i ) ? "active" : "";
            if($page == $i){
                $html .= '<li class="paginate_button active"><a href="javascript:void(0)">' . $i . '</a></li>';
            }else{
            $html .= '<li class="paginate_button ' . $class . '"><a href="' . $url . $ps . 'limit=' . $limit . '&page=' . $i . '">' . $i . '</a></li>';
            }
        }

        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="' . $url . $ps . 'limit=' . $limit . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class = ( $page == $last ) ? "disabled" : "";
        $linkLast = ($page == $last) ? ('javascript:void(0)') : ( $url . $ps . 'limit=' . $limit . '&page=' . ( $page + 1 ) );
        $html .= '<li class="paginate_button ' . $class . '"><a  href="' . $linkLast . '">&raquo;</a></li>';

        $html .= '</ul>';
        return $html;
    }

}

if (!function_exists('message_box')) {

    function message_box($message_type, $close_button = TRUE) {
        $CI = & get_instance();
        $message = $CI->session->flashdata($message_type);
        $retval = '';

       if ($message) {
            switch ($message_type) {
                case 'success':
                    $retval .= '<div class="alert custom alert-success">';
                    break;
                case 'error':
                    $retval .= '<div class="alert custom alert-danger">';
                    break;
                case 'info':
                    $retval .= '<div class="alert custom alert-info">';
                    break;
                case 'warning':
                    $retval .= '<div class="alert custom alert-warning">';
                    break;
            }

            if ($close_button)
                $retval .= '<a class="close" data-dismiss="alert" href="#">&times;</a>';

            $retval .= '<strong>' . $message;
            $retval .= '</strong></div>';
            return $retval;
        }
    }

}

if (!function_exists('set_message')) {

    function set_message($type, $message) {
        $CI = & get_instance();
        $CI->session->set_flashdata($type, $message);
    }

}



if (!function_exists('set_url')) {

    function set_url($url) {
        return (strpos($url, '?') !== FALSE) ? ($url . '&') : ($url . '?');
    }

}

?>