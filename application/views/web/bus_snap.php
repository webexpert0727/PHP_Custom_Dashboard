

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
"> -->
<link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.css">
 <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url() ?>assets/bootstrap-datetimepicker.min.css">



<style type="text/css">
    input[type=search]:focus {
     width: 219px;
     background-color: #fff;
     margin-right: 0px;
}
input[type="search"] {
    width: 219px;
    }

.input-append .add-on, .input-prepend .add-on {
    height: 31px !important;
    padding: 7px 5px !important;
}
.row{
    color: #000;
}
option {
    color: #000;
}
input[type=text] {
    color: #000;
}
.bootstrap-datetimepicker-widget {

    width: 298px;

}

</style>
           

             
        <div class="content-wrap">
           
            <div class="row" style="background-color: white; padding: 15px;">
            <?php echo message_box('success'); ?>
            <?php echo message_box('error'); ?>
            <div style="font-size: 20px;"> </div><br>
                <form method="post" action="<?php echo base_url() ?>performance/drawMap/" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Bus Name </label>

                                    <select id="bus" required name="bus_name" class="form-control ">
                                        <?php
                                        if($buses && count($buses) > 0) {
                                            foreach ($buses as $key => $buses) {
                                                ?>
                                                <option value="<?php echo $buses; ?>" <?php echo (!empty($bus_name))?(($bus_name == $buses)?('selected'):('')):('') ?>><?php echo $buses; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="datepicker" type="text" class="form-control" value="<?php echo !empty($date)?($date):('') ?>" required="" name="start_date" data-date-useseconds="true" data-date-pickdate="false">
                                        <span class="input-group-addon add-on entypo-calendar "></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker1" type="text" class="form-control" value="<?php echo (!empty($time))?($time):('') ?>" required name="start_time" data-date-useseconds="true" data-date-pickDate="false">
                                        <span class="input-group-addon add-on entypo-clock"></span>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>
                 
                    <div class="col-md-11 col-md-offset-1">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="row">

                <div class="col-sm-12">
                   <!--  <?php if(!empty($result)){ ?>
                             <div id="map" style="width:100%; height: 500px; display:block;"></div>
                     <?php  }else { ?>
                           <div><h3>No Result Found</h3> </div>
                    <?php  } ?>
                      -->
              <!--  <img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x400&path=color:0xff0000ff|weight:5|40.737102,-73.990318|40.749825,-73.987963|40.752946,-73.987384|40.755823,-73.986397&maptype=roadmap&markers=color:red%7Clabel:C%7C40.-8.804245,-63.88524" width="100%">  -->
                  
                   

                    <?php if(!empty($result)){ ?>
                              <img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x400&path=color:0xff0000ff|weight:5|<?php echo $result ?>&markers=color%3ablue|label%3aB|<?php echo $latitude ?>,<?php echo $longitude ?>|<?php echo $latitude ?>,<?php echo $longitude ?>&sensor=false&key=AIzaSyAFmyXwSPB7iwGQy2fdWLwX45Gj88d_CdE" width="100%"> 
                     <?php  }else if(!empty($bus_name)) { ?>
                           <div><h3>No Result Found</h3> </div>
                    <?php  } ?>

                </div>
            </div>

        </div>

 

<!--  <script type="text/javascript"
     src="<?php echo base_url() ?>assets/bootstrap-datetimepicker.min.js">
    </script> -->
      <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.js">
    </script>
    <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/bootstrap-datetimepicker.js">
    </script>
     <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/bootstrap-datepicker.js">
    </script>

<script type="text/javascript">

   setTimeout(function () {
    $(".alert").fadeOut("slow", function () {
        $(".alert").remove();
    });

}, 3000);

    $('#timepicker1').timepicker({
        pickDate: false,
        showMeridian : false,
        use24hours: true,
        format: 'H:i',
    });
   
       $('#datepicker').datepicker({
        pickDate: true,
      
    });
    </script>

    <!-- <script>

      // This example creates a 2-pixel-wide red polyline showing the path of
      // the first trans-Pacific flight between Oakland, CA, and Brisbane,
      // Australia which was made by Charles Kingsford Smith.
     
      function initMap() {
         var myLatLng = {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: myLatLng,
          mapTypeId: 'terrain'
        });
       
        var flightPlanCoordinates = JSON.parse('<?php print_r($result) ?>');
       
        
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });

        flightPath.setMap(map);
      }
    </script> -->
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDu6vM_KAUl1LD5dIURnZa9RIMtsMbn30E&callback=initMap"></script> -->
   <!--   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWMFm74la_EzNcloo7zrJcuAyzmrwNUbA&callback=initMap" 
  type="text/javascript"></script>

 -->

 
   