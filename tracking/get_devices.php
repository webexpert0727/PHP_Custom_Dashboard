<?php



$curl = curl_init();

$user_api_hash =  '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
//$user_api_hash =  '$2y$10$GOszN9Sk8xXONE2iX9CHj.0N876QGlB9jP7LyvEPCEC9q7ZM5G7nm';
//$user_api_hash =  '$2y$10$e4BohIdMyomQ5Pi6fnQaEe6qKR13Cz3gj0/bNtDDgrbTgSJiclJ7C';

curl_setopt_array($curl, array(

  CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_devices",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user_api_hash\"\r\n\r\n".$user_api_hash."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",

  CURLOPT_HTTPHEADER => array(

    "cache-control: no-cache",

    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",

    "postman-token: 361bbc63-1604-427e-f642-e620549b169a"

  ),

));



$response = curl_exec($curl);

$err = curl_error($curl);



curl_close($curl);

//header("Content-type: application/json; charset=utf-8");

if ($err) {

 // echo "cURL Error #:" . $err;

} else {

 // echo $response;



    $res = json_decode($response);

    $items = array();

    if( count($res) && isset($res[0]) && isset($res[0]->items) ) {

      $items['items'] = $res[0]->items;

      echo json_encode($items);

    }



}