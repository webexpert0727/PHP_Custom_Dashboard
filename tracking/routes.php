<?php

$action = "create";
$url = "http://track.idealconectividade.com.br/api/get_routes";
//$token = '$2y$10$155X9l92ElVY7ZSDPNJLRegwrKlO5tiW8UC8EtZwV1t2X2RZR74p2';
//$token = '$2y$10$e4BohIdMyomQ5Pi6fnQaEe6qKR13Cz3gj0/bNtDDgrbTgSJiclJ7C';
$token = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
$lang = "en";

$post = [

    'user_api_hash' => $token,

];

/*echo $url;
print_r($post);
echo http_build_query($$query_string);
exit;*/
//echo $url.'?'.http_build_query($post);

$curl = curl_init();

curl_setopt_array($curl, array(

  CURLOPT_URL => $url.'?'.http_build_query($post),

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,


  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,/*

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_POSTFIELDS => http_build_query($post),*/

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
//echo $response;
if( $_POST['for_mobile'] && $_POST['for_mobile'] =="yes") {
  echo $response;
  exit;
}

  $res = json_decode($response);
/*header("Content-type: application/json; charset=utf-8");
echo json_encode($response);*/
//var_dump($res);
  if( isset($res->routes) && count($res->routes) > 0 ) {

    echo '<ul class="group-list">';
      foreach ($res->routes as $rKey => $rValue) {
       echo '<li data-route-id="'.$rValue->id.'">';
       echo '<div class="checkbox"><input type="checkbox" name="route['.$rValue->id.']" value="'.$rValue->id.'" checked=&quot;checked&quot; onChange="app.routes.active(\''.$rValue->id.'\', this.checked);"/><label></label></div>';
       echo '<div class="name">    <span data-mapicon="name">'.$rValue->name.'</span></div>';
       echo '<div class="details"><div class="btn-group dropleft droparrow"  data-position="fixed">';
       echo '<i class="btn icon options" data-toggle="dropdown" data-position="fixed" aria-haspopup="true" aria-expanded="false"></i>';
       echo '<ul class="dropdown-menu" ><li><a href=\'javascript:;\' onclick="app.routes.edit('.$rValue->id.');"><span class="icon edit"></span> <span class="text">Edit</span> </a></li>';
       echo '<li><a href=\'javascript:;\' data-target=\'#deleteRoute\' onclick="app.routes.delete('.$rValue->id.');" data-toggle=\'modal\'><span class="icon delete"></span><span class="text">Delete</span></a> </li></ul></div></div>';
       echo '<script>app.routes.add(jQuery.parseJSON(\'{"id":'.$rValue->id.',"user_id":'.$rValue->user_id.',"active":1,"name":"'.$rValue->name.'","coordinates":';
       /*[{"lat":"-8.760606","lng":"-63.900722"},{"lat":"-8.761321","lng":"-63.900695"}]*/
       echo '[';
       $counter = 1;
       foreach($rValue->coordinates as $cKey => $cValue) {

        echo '{"lat":"'.$cValue->lat.'","lng":"'.$cValue->lng.'"}';

        if($counter < count($rValue->coordinates)){
                echo ',';
        }
        $counter++;
       }
       echo ']';
       echo ',"color":"#1938ff","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00"}\'));</script></li>';

      }
    echo '</ul>';

  } else {
    echo '<p class="no-results">No routes.</p>';
  }

}