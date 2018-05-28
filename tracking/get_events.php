<?php



$curl = curl_init();

$post = [

    'user_api_hash' => '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W',
    //'user_api_hash' => '$2y$10$GOszN9Sk8xXONE2iX9CHj.0N876QGlB9jP7LyvEPCEC9q7ZM5G7nm',
  //  'user_api_hash' => '$2y$10$e4BohIdMyomQ5Pi6fnQaEe6qKR13Cz3gj0/bNtDDgrbTgSJiclJ7C',

    'lang' => 'en'

];

curl_setopt_array($curl, array(

  CURLOPT_URL => "http://track.idealconectividade.com.br/api/get_events",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

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



/*if ($err) {

  echo "cURL Error #:" . $err;

} else {

  echo $response;

}*/



echo '<div style="display: none;">                                </div>';

