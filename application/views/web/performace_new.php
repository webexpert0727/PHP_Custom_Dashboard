
<link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style type="text/css">
    input[type=search]:focus {
     width: 219px;
     background-color: #fff;
     margin-right: 0px;
}
input[type="search"] {
    width: 219px;
    }
</style>
        <div class="content-wrap">

            <div class="row" style="background-color: white; padding: 15px;">
             <div style="font-size: 20px;"> Schedule Data </div><br>
                <form method="post" action="<?php echo base_url() ?>performance" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                             <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label"> Expected Start Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker1" type="text" class="form-control" value="<?php echo !empty($start_date)?($start_date):('') ?>" required="" name="start_date" data-date-useseconds="true" data-date-pickdate="false">
                                        <span class="input-group-addon add-on entypo-calendar "></span>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label"> Expected End Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker2" type="text" class="form-control" value="<?php echo !empty($end_date)?($end_date):('') ?>" required="" name="end_date">
                                        <span class="input-group-addon add-on entypo-calendar "></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 22px;">
                                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>

            <br>
            <div class="row">

                <div class="col-sm-12">


                   <table class="table table-bordered table-striped cf" id="dataTables-example" >
                    <thead class="cf">
                    <tr>
                    <th>Sr</th>
                    <th>Bus Name</th>
                    <th>Date</th>
                    <th>Start Lat, Long</th>
                    <th>Expected Time</th>
                    <th>Actual time</th>
                    <th>End Lat, Long</th>
                    <th>Expected Time</th>
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
                            <td><?php echo $value['bus_name']; ?></td>
                            <td ><?php echo $value['schedule_date']; ?></td>
                            <td ><?php echo $value['f_source_lat'].', '.$value['f_source_lng']; ?></td>

                            <td ><?php echo $value['f_exp_time']; ?></td>
                            <?php $f_diff = timeDiff($value['f_exp_time'],$value['f_time'],$value['schedule_date'] ); ?>
                            <?php $t_diff = timeDiff($value['t_exp_time'],$value['t_time'],$value['schedule_date'] ); ?>

                            <td  style="<?php if($f_diff < 0 ) { ?> color: red; <?php } ?>" ><?php echo $value['f_time']; ?></td>
                            <td ><?php echo $value['t_source_lat'].', '.$value['t_source_lng']; ?></td>
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

 <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/bootstrap-datepicker.js">
    </script>

<script type="text/javascript">
    $(document).ready(function(){
         $.fn.dataTable.ext.errMode = 'none';
    // DataTable
        if ($('#dataTables-example').length > 0) {
            $('#dataTables-example').DataTable({
                /* Disable initial sort */
                /* columnDefs: [ { orderable: false, targets: -1 } ],*/
               // "aaSorting": []
            });
        }
    });
</script>
<script type="text/javascript">

    $('#timepicker1').datepicker({
        pickDate: true,
      
    });
     $('#timepicker2').datepicker({
         pickDate: true,
        
    });

    </script>


<?php

    function timeDiff($exp, $act, $date) {
        $exp = strtotime($date .' '.$exp);
        $act = strtotime($date.' '. $act);
        return round(($exp - $act) / 60,2);
    }

?>