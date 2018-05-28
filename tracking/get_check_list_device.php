<?php



$curl = curl_init();

/* $user_api_hash =  '$2y$10$155X9l92ElVY7ZSDPNJLRegwrKlO5tiW8UC8EtZwV1t2X2RZR74p2'; */

//For operator user
$user_api_hash = '$2y$10$kAByy95yYcS./vm1rw5MqeVjvhHYdylitYTCVNdYMrn8iCCIbUd8W';
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



if ($err) {

 // echo "cURL Error #:" . $err;

} else {

 // echo $response;



    $res = json_decode($response);



    if( isset($_GET['id']) ) {



     // $res = json_decode($response);

      $items = array();

      $resArray = array();

      if( count($res) && isset($res[0]) && isset($res[0]->items) ) {

        $items['items'] = $res[0]->items;

        header("Content-type: application/json; charset=utf-8");

        $counter = 0;

        foreach ($items['items'] as $key => $value) {

          $resArray[$counter]['id'] = $value->id;

          $resArray[$counter]['user_id'] = $value->driver_data->id;

          $resArray[$counter]['current_driver_id'] = $value->device_data->current_driver_id;

          $resArray[$counter]['timezone_id'] = $value->device_data->timezone_id;

          $resArray[$counter]['traccar_device_id'] = $value->device_data->traccar_device_id;

          $resArray[$counter]['icon_id'] = $value->device_data->icon_id;

          $resArray[$counter]['icon_colors'] = $value->device_data->icon_colors;

          $resArray[$counter]['active'] = $value->device_data->active;



          $resArray[$counter]['name'] = $value->name;

          $resArray[$counter]['fuel_measurement_id'] = $value->device_data->fuel_measurement_id;

          $resArray[$counter]['fuel_quantity'] = $value->device_data->fuel_quantity;

          $resArray[$counter]['fuel_price'] = $value->device_data->fuel_price;

          $resArray[$counter]['fuel_per_km'] = $value->device_data->fuel_per_km;

          $resArray[$counter]['sim_number'] = $value->device_data->sim_number;

          $resArray[$counter]['device_model'] = $value->device_data->device_model;

          $resArray[$counter]['plate_number'] = $value->device_data->plate_number;

          $resArray[$counter]['vin'] = $value->device_data->vin;

          $resArray[$counter]['registration_number'] = $value->device_data->registration_number;

          $resArray[$counter]['object_owner'] = $value->device_data->object_owner;

          $resArray[$counter]['additional_notes'] = $value->device_data->additional_notes;

          $resArray[$counter]['expiration_date'] = $value->device_data->expiration_date;

          $resArray[$counter]['tail_color'] = $value->device_data->tail_color;

          $resArray[$counter]['tail_length'] = $value->device_data->tail_length;

          $resArray[$counter]['engine_hours'] = $value->device_data->engine_hours;

          $resArray[$counter]['detect_engine'] = $value->device_data->detect_engine;

          $resArray[$counter]['min_moving_speed'] = $value->device_data->min_moving_speed;

          $resArray[$counter]['min_fuel_fillings'] = $value->device_data->min_fuel_fillings;

          $resArray[$counter]['min_fuel_thefts'] = $value->device_data->min_fuel_thefts;

          $resArray[$counter]['snap_to_road'] = $value->device_data->snap_to_road;

          $resArray[$counter]['gprs_templates_only'] = $value->device_data->gprs_templates_only;

          $resArray[$counter]['parameters'] = $value->device_data->parameters;

          $resArray[$counter]['currents'] = $value->device_data->currents;

          $resArray[$counter]['created_at'] = $value->device_data->created_at;

          $resArray[$counter]['updated_at'] = $value->device_data->updated_at;

          $resArray[$counter]['speed'] = $value->speed;

          $resArray[$counter]['online'] = $value->online;

          $resArray[$counter]['icon_color'] = $value->icon_color;

          $resArray[$counter]['engine_status'] = $value->engine_status;

          $resArray[$counter]['lat'] = $value->lat;

          $resArray[$counter]['lng'] = $value->lng;

          $resArray[$counter]['course'] = $value->course;

          $resArray[$counter]['altitude'] = $value->altitude;

          $resArray[$counter]['protocol'] = $value->protocol;

          $resArray[$counter]['time'] = $value->time;

          $resArray[$counter]['timestamp'] = $value->timestamp;

          $resArray[$counter]['acktimestamp'] = $value->acktimestamp;

          $resArray[$counter]['formatSensors'] = array();

          $resArray[$counter]['formatServices'] = array();

          $resArray[$counter]['tail'] = $value->tail;

          $resArray[$counter]['distance_unit_hour'] = $value->distance_unit_hour;

          $resArray[$counter]['moved_timestamp'] = $value->moved_timestamp;

          $resArray[$counter]['group_id'] = $value->device_data->pivot->group_id;

          $resArray[$counter]['driver'] = $value->driver;

          $resArray[$counter]['stop_duration'] = $value->stop_duration;

          $resArray[$counter]['traccar'] = $value->device_data->traccar;

          $resArray[$counter]['icon'] = $value->device_data->icon;

          $resArray[$counter]['sensors'] = $value->device_data->sensors;

          $counter++;

        }



        echo json_encode($resArray);

      }



    } else {

    $html = "";

    if( count($res) && isset($res[0]) && isset($res[0]->items) ) {

      $html .='<div class="group" data-toggle="multiCheckbox">';



      $groupCounter = 0;

      foreach ($res as $groupKey => $itemGroups) {



          $html .= '<div class="group-heading">';



          $html .= '<div class="checkbox"> <input type="checkbox" data-toggle="checkbox"> <label></label> </div>';



          $html .= '<div class="group-title " data-toggle="collapse" data-target="#device-group-'.$groupCounter.'" data-parent="#objects_tab" aria-expanded="false" aria-controls="device-group-'.$groupCounter.'"> '.$itemGroups->title.' <span class="count">'.count($itemGroups->items).'</span> </div>';



          $html .= '<div class="btn-group"> <i class="btn icon options" data-url="#" data-modal="devices_groups_edit"></i></div>';

          $html .= '</div>';



          if( count($itemGroups->items) > 0 ) {



            $html .= '<div id="device-group-1" class="group-collapse collapse in" data-id="1" role="tabpanel"><div class="group-body"><ul class="group-list">';



            foreach ($itemGroups->items as $itemKey => $items) {



              //var_dump($items);



              $html .= '<li data-device-id="'.$items->id.'">';



              $html .= '<div class="checkbox"> <input type="checkbox" name="items['.$items->id.']" value="'.$items->id.'" checked=&quot;checked&quot; onChange="app.devices.active(\''.$items->id.'\', this.checked);"/> <label></label></div>';



              $html .= '<div class="name" onClick="app.devices.select('.$items->id.');"><span data-device="name">'.$items->name.'</span><span data-device="time">'.$items->time.'</span> </div>';



              $html .= '<div class="details"> <span data-device="speed">'.$items->speed.' km/h</span>';



              $status_color = "green";



              if( $items->online ==  "ack" ) { $status_color = "yellow"; }

              if( $items->online ==  "offline" ) { $status_color = "red"; }



              $html .= '<span data-device="status" style="background-color: '.$status_color.'" title="'.$items->online.'">'.$items->online.'</span>';



              $html .= ' <!-- <div class="btn-group dropleft droparrow"  data-position="fixed">

                                        <i class="btn icon options" data-toggle="dropdown" data-position="fixed" aria-haspopup="true" aria-expanded="false"></i>  <ul class="dropdown-menu" ><li><a href="javascript:" class="object_show_history" onClick="app.history.device(\''.$items->id.'\', \'last_hour\');"> <span class="icon last-hour"></span> <span class="text">Mostrar hist&oacute;rico (&uacute;ltima hora)</span> </a></li><li> <a href="javascript:" class="object_show_history" onClick="app.history.device(\''.$items->id.'\', \'today\');"><span class="icon today"></span> <span class="text">Mostrar hist&oacute;rico (hoje)</span>   </a> </li><li><a href="javascript:" class="object_show_history" onClick="app.history.device(\''.$items->id.'\', \'yesterday\');"> <span class="icon yesterday"></span>  <span class="text">Mostrar hist&oacute;rico (ontem)</span> </a>     </li> <li> <a href="javascript:" data-url="http://track.idealconectividade.com.br/devices/follow_map/'.$items->id.'" data-id="'.$items->id.'" onClick="app.devices.follow('.$items->id.');" data-name="Segue (CUA-6476)"><span class="icon follow"></span>  <span class="text">Segue</span></a>   </li><li><a href="javascript:" data-url="http://track.idealconectividade.com.br/send_command/create" data-modal="send_command" data-id="'.$items->id.'"> <span class="icon send-command"></span><span class="text">Enviar comando</span> </a>  </li><li>  <a href="javascript:" data-url="http://track.idealconectividade.com.br/devices/edit/'.$items->id.'/0" data-modal="devices_edit"><span class="icon edit"></span>   <span class="text">Editar</span></a></li></ul> </div></div> -->';



              $html .='</li>';



            }



            $html .= '</ul></div></div>';

          }





          $groupCounter++;

      }

      $html .='</div>';

    }



    echo $html;

  }



}