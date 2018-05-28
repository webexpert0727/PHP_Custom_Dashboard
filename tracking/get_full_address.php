<?php
//Send request and receive json data by address
$address = "not found";
$geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($_GET['lat']) . ',' . trim($_GET['lon']) . '&sensor=false');
$output = json_decode($geocodeFromLatLong);
$status = $output->status;
//Get address from json data
$address = ($status == "OK") ? $output->results[1]->formatted_address : '';
//Return address of the given latitude and longitude
echo $address;