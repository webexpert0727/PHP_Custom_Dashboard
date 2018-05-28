
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>

<style type="text/css">
.font_dk{
    font-size: 28px;
}
h3.font_dk1 {
    border: 1px solid;
    display: inline-block;
    padding: 6px;
}
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
div.dt-buttons {
    margin-left: 15px;
}
</style>
      
             
        <div class="content-wrap">
           <!-- Form Start -->
            <?php echo message_box('success'); ?>
            <?php echo message_box('error'); ?>
           <div class="row" style="background-color: rgba(171, 121, 149, 0.16); padding: 15px;">
                <div class="col-md-12"  style="margin-bottom: 20px;">
                    <center>
                        <h3><b>Route Operation</b> </h3>
                    </center>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="col-md-2 ">
                        <center>
                        <span class="font_dk">Yesterday's</span><br>
                        <span class="font_dk">Performance</span></center>
                    </div>
                    <div class="col-md-1" style="margin-left: 42px; margin-top: 5px;">
                        <center><span class="font_dk1" style="font-size: 50px;"><?php echo round($ty_persantage) ?>%</span></center>
                    </div>

                    <div class="col-md-2" style="margin-left: 270px;">
                            <center>
                                <span class="font_dk">Today's</span><br>
                                <span class="font_dk">Performance</span>
                            </center>
                    </div>
                    <div class="col-md-1" style="margin-left: 42px; margin-top: 5px;">
                        <center><span class="font_dk1" style="font-size: 50px;"><?php echo round($tt_persantage) ?>%</span></center>
                    </div>
                </div>
            </div>
            <br>
            
            <div class="row" style="background-color: white; padding: 15px; border: 1px solid;">
                <div class="col-md-12"  style="margin-bottom: 20px;">
                    <center>
                        <h3><b>Choose Route Operation</b> </h3>
                    </center>
                </div>
                <form method="post" action="<?php echo base_url() ?>performance/route_operation/" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"> Route </label>
                                    <select id="route_id" required name="route_name" class="form-control ">
                                        <option value="">Select a Route</option>
                                        <?php
                                        if($routes && count($routes) > 0) {
                                            foreach ($routes as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->route; ?>" <?php echo (!empty($route_name))?(($route_name == $value->route)?('selected'):('')):('') ?>><?php echo $value->route; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  
                    <div class="col-md-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit" value="submitRoute"  name="submitRoute">Submit</button>
                    </div>
                </form>
           
                <div class="col-md-10 col-md-offset-1" style="margin-top: 35px;">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <center><strong class="font_dk">YESTERDAY</strong></center>
                            <center><h3 class="font_dk1">TRIPS COMPLETED</h3></center>
                            <br>
                            <center>
                                <h2 class="font_dk2">
                                    <strong ><?php echo $y_count ?>/<?php echo $y_totalCount ?> | <?php echo round($y_persantage) ?>% </strong>
                                </h2>
                            </center><br>
                            <center>
                                <h3 class="font_dk1">Fleet</h3>
                            </center>
                            <?php if(!empty($y_busCount)){ 
                                    foreach ($y_busCount as $key => $value) {
                                        
                                        if(!empty($y_busValueCount)){ 
                                            foreach ($y_busValueCount as $bkey => $bvalue) {
                                                if($key == $bkey){
                                    ?>
                                                <center style="margin-left: 60px">
                                                    <h3>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="50px;"><?php echo $key ; ?></td>
                                                                    <td width="20px;">:</td>
                                                                    <td width="100px;"><?php echo $bvalue ; ?>/<?php echo $value *2 ; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </h3>
                                                </center>
                               <?php } } } } } ?>
                            
                         
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <center><strong class="font_dk">TODAY</strong></center>
                            <center><h3 class="font_dk1">TRIPS COMPLETED</h3></center>
                            <br>
                            <center>
                                <h2 class="font_dk2">
                                    <strong ><?php echo $t_count ?>/<?php echo $t_totalCount ?> | <?php echo round($t_persantage) ?>% </strong>
                                </h2>
                            </center>
                            <center>
                                <h3 class="font_dk1">Fleet</h3>
                            </center>
                            <?php if(!empty($t_busCount)){ 
                                    foreach ($t_busCount as $key => $value) {
                                        
                                        if(!empty($t_busValueCount)){ 
                                            foreach ($t_busValueCount as $bkey => $bvalue) {
                                                if($key == $bkey){
                                    ?>
                                                <center style="margin-left: 60px">
                                                    <h3>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td width="50px;"><?php echo $key ; ?></td>
                                                                    <td width="20px;">:</td>
                                                                    <td width="100px;"><?php echo $bvalue ; ?>/<?php echo $value *2 ; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </h3>
                                                </center>
                               <?php } } } } } ?>
                        </div>
                    </div>
                </div>
            </div>
          
            <br>
            <div class="row" style="background-color: white; padding: 15px;">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <center>
                        <h3><b>REPORTS</b> <small> Excel OR PDF</small> </h3>
                    </center>
                </div>
                <form method="post" action="<?php echo base_url() ?>performance/route_operation/" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"> Route </label>
                                    <select id="route_id" required name="route" class="form-control ">
                                        <option value="">Select a Route</option>
                                        <?php
                                        if($routes && count($routes) > 0) {
                                            foreach ($routes as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->route; ?>" <?php echo (!empty($routesName))?(($routesName == $value->route)?('selected'):('')):('') ?>><?php echo $value->route; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="single" class=" control-label">Day </label>
                                <select id="date_of_week" name="date_of_week" class="form-control ">
                                    <option value="ALL" <?php echo (!empty($day_of_week))?(($day_of_week == 'ALL')?('selected'):('')):('') ?>>ALL</option>
                                    <option value="WD" <?php echo (!empty($day_of_week))?(($day_of_week == 'WD')?('selected'):('')):('') ?>>WD</option>
                                    <option value="7" <?php echo (!empty($day_of_week))?(($day_of_week == '7')?('selected'):('')):('') ?>>SAT</option>
                                    <option value="1" <?php echo (!empty($day_of_week))?(($day_of_week == '1')?('selected'):('')):('') ?>>SUN</option>
                                </select>
                            </div>

                            
                        </div>
                    </div>
                  
                    <div class="col-md-11 col-md-offset-1">
                        <button class="btn btn-success" type="submit" value="submitFilter" name="submitFilter">Submit</button>
                    </div>
                </form>
            
                <div class="col-sm-12" style="margin-top: 35px;">
                    <table class="table table-bordered table-striped cf dt-responsive nowrap" id="dataTables-example" >
                    <thead class="cf">
                    <tr>
                    <th>Sr</th>
                    <th>Route</th>
                    <th>Bus Name</th>
                    <th>Date</th>
                    <th>Start Lat, Long</th>
                    <th>Expected Time</th>
                    <th>Actual time</th>
                    <th>HalfWay Lat, Long</th>
                    <th>HalfWay Expected Time</th>
                    <th>HalfWay Actual time</th>
                    <th>End Lat, Long</th>
                    <th >Expected Time</th>
                    <th>Actual time</th>
                    <th>Day</th>
                    <th>Points</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php if( isset($result) && count($result) > 0 ) { ?>
                        <?php
                        $counter = 1;
                        foreach ($result as $key => $value) { ?>
                        <tr>
                            <?php
                                if($value['day_of_week'] == 1){
                                    $day_of_week = 'SUN';
                                }else if($value['day_of_week'] == 7){
                                    $day_of_week = 'SAT';
                                }else{
                                     $day_of_week = 'WD';
                                }
                             ?>

                            <td><?php echo $counter; ?> </td>
                            <td><?php echo $value['route']; ?></td>
                            <td><?php echo $value['bus_name']; ?></td>
                            <td ><?php echo $value['schedule_date']; ?></td>
                            <?php $f_diff = timeDiff($value['f_exp_time'],$value['f_time'],$value['schedule_date'] ); ?>
                            <?php $t_diff = timeDiff($value['t_exp_time'],$value['t_time'],$value['schedule_date'] ); ?>
                            <?php $m_diff = timeDiff($value['m_exp_time'],$value['m_time'],$value['schedule_date'] ); ?>
                            <td ><?php echo $value['f_source_lat'].', '.$value['f_source_lng']; ?></td>
                            <td ><?php echo $value['f_exp_time']; ?></td>
                            <td  style="<?php if($f_diff < 0 ) { ?> color: red; <?php } ?>"><?php echo $value['f_time']; ?></td>

                            <td ><?php echo (!empty($value['m_source_lat']))?($value['m_source_lat'].', '.$value['m_source_lng']):('')   ; ?></td>
                            <td ><?php echo $value['m_exp_time']; ?></td>
                            <td  style="<?php if($m_diff < 0 ) { ?> color: red; <?php } ?>"><?php echo $value['m_time']; ?></td>

                            <td ><?php echo (!empty($value['t_source_lat']))?($value['t_source_lat'].', '.$value['t_source_lng']):('')  ; ?></td>
                            <td ><?php echo $value['t_exp_time']; ?></td>
                            <td style="<?php if($t_diff < 0 ) { ?> color: red; <?php } ?>"><?php echo $value['t_time']; ?></td>
                            <td ><?php echo $day_of_week; ?></td>
                            <td style="<?php if($f_diff + $t_diff < 0 ) { ?> color: red; <?php } ?>"><?php echo $f_diff + $t_diff; ?></td>

                        </tr>
                        <?php
                        $counter++;

                        }
                    } ?>


                    </tbody>
                    </table>
                </div>
            </div>
        </div>

   

<script type="text/javascript">
    $(document).ready(function(){
         $.fn.dataTable.ext.errMode = 'none';
    // DataTable
        if ($('#dataTables-example').length > 0) {
            $('#dataTables-example').DataTable({
                "scrollX": true,
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                       
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }
                   
                ]
                /* Disable initial sort */
                /* columnDefs: [ { orderable: false, targets: -1 } ],*/
               // "aaSorting": []
            });
        }
    });
</script>


<script type="text/javascript">

   setTimeout(function () {
    $(".alert").fadeOut("slow", function () {
        $(".alert").remove();
    });

}, 3000);

    </script>

<?php

    function timeDiff($exp, $act, $date) {
        $exp = strtotime($date .' '.$exp);
        $act = strtotime($date.' '. $act);
        return round(($exp - $act) / 60,2);
    }

?>
