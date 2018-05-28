<?php

$action = "create";
$url = "http://track.idealconectividade.com.br/api/add_route";
//$token = '$2y$10$GOszN9Sk8xXONE2iX9CHj.0N876QGlB9jP7LyvEPCEC9q7ZM5G7nm';
//$token = '$2y$10$e4BohIdMyomQ5Pi6fnQaEe6qKR13Cz3gj0/bNtDDgrbTgSJiclJ7C';
//$token = '$2y$10$155X9l92ElVY7ZSDPNJLRegwrKlO5tiW8UC8EtZwV1t2X2RZR74p2';
$token = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
$lang = "en";
$query_string = [ 'user_api_hash' => $token];
if( isset($_POST['polyline']) && $_POST['polyline'] != "" && isset($_POST['color']) && $_POST['color'] != "" &&  isset($_POST['name']) && $_POST['name'] != ""  &&  isset($_POST['id']) && $_POST['id'] != ""  ){

  $action = "edit";
  $url = "http://track.idealconectividade.com.br/api/edit_route";
  $post = [

      'user_api_hash' => $token,
      'id' => $_POST['id'],
      'name' => $_POST['name'],
      'polyline' => $_POST['polyline'],
      'color' => $_POST['color'],
     // 'lang' => $lang

  ];

}elseif( isset($_POST['polyline']) && $_POST['polyline'] != "" && isset($_POST['color']) && $_POST['color'] != "" &&  isset($_POST['name']) && $_POST['name'] != ""  ){

  $action = "create";
  $url = "http://track.idealconectividade.com.br/api/add_route";
  $post = [

      'user_api_hash' => '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W',
      'name' => $_POST['name'],
      'polyline' => $_POST['polyline'],
      'color' => $_POST['color'],

  ];

}
/*echo $url;
print_r($post);
echo http_build_query($$query_string);
exit;*/

$curl = curl_init();

curl_setopt_array($curl, array(

  CURLOPT_URL => $url.'?'.http_build_query($post),

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,


  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POST => 1,

  CURLOPT_POSTFIELDS => http_build_query($post),

  CURLOPT_HTTPHEADER => array(

    "cache-control: no-cache",

    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",

    "postman-token: 3095a9ff-80ad-0fcc-37d7-e5f252912e80"

  ),

));



$response = curl_exec($curl);

$err = curl_error($curl);



curl_close($curl);



if ($err) {

  echo "cURL Error #:" . $err;

} else {
 //header("Content-type: application/json; charset=utf-8");
 print_r($response);
/*header("Content-type: application/json; charset=utf-8");
echo json_encode($response);*/

}