 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <!--  PAPER WRAP -->
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
 
             <div class="content-wrap" >
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <h3 class="report-btn today"><i class="fontawesome-time"></i> <a href="<?php echo base_url() ?>report" >Today</a></h3>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="report-btn yesterday"> <i class="fontawesome-time"></i> <a href="<?php echo base_url() ?>report?last_date=<?php echo date('Y-m-d',strtotime("-1 days")) ?>" >Last Day</a></h3>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="report-btn last-15"> <i class="fontawesome-time"></i> <a href="<?php echo base_url() ?>report?last_fiften_day=<?php echo date('Y-m-d',strtotime("-15 days")) ?>" >Last 15 Day</a></h3>
                        </div>

                        <div class="col-sm-3">
                            <h3 class="report-btn this-month"> <i class="fontawesome-time"></i> <a href="<?php echo base_url() ?>report?this_month=1" >This Month</a></h3>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3><?php echo $day ?></h3>


                   <table class="table table-bordered table-striped cf" id="dataTables-example" >
                    <thead class="cf">
                    <tr>
                    <th>Sr</th>
                    <th>Bus Name</th>
                    <th>Date</th>
                    <th>Start Lat, Long</th>
                    <th>Expected Time</th>
                    <th>Actual time</th>
                    <th>HalfWay Lat, Long</th>
                    <th>HalfWay Expected Time</th>
                    <th>HalfWay Actual time</th>
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



<style type="text/css">
    .dash-boxes .value {
        margin: 0 auto;
        position: relative;
        text-align: center;
    }
    .dash-boxes .value span {
        font-size: 36px !important;
        line-height: 45px !important;
        letter-spacing: .1px !important;
        top: 45px;
    }

    .dash-boxes .value i {
            font-size: 27px;
            font-style: normal;
            letter-spacing: -1px;
            margin: 40px 20px 0 0;
            text-transform: uppercase;
            top: 10px!important;
            position: relative;
            right: -20px;
    }

    .member .profit-line {
        text-align: center;
        font-size: 12px;
        bottom: 2px;
        position: absolute;
        width: 95%;
    }
    .dash-boxes{
        padding: 15px 5px !important;
    }
    .revenue .value span{
        margin-right: 3px !important;
    }

    .member .value span{
        margin-right: 2px !important;
    }

    h3.report-btn {
        display: inline-block;
        padding: 6px 18px;
        background-color: red;
        border-radius: 20px;
        color: white !important;
    }
    h3.report-btn a {
        color: white !important;
    }
    h3.report-btn.today {
        background-color: orange;
    }
    h3.report-btn.yesterday {
        background-color: #e05d5d;
    }
    h3.report-btn.yesterday {
        background-color: #e05d5d;
    }h3.report-btn.this-month {
        background-color: green;
    }
    div.dt-buttons {
   
    margin-left: 15px;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
         $.fn.dataTable.ext.errMode = 'none';
    // DataTable
        if ($('#dataTables-example').length > 0) {
            $('#dataTables-example').DataTable({

                dom: 'lBfrtip',
                buttons: [
                    'excelHtml5',
                    'pdfHtml5'
                ]
                /* Disable initial sort */
                /* columnDefs: [ { orderable: false, targets: -1 } ],*/
               // "aaSorting": []
            });
        }
    });
</script>
<script type="text/javascript">

    window.setInterval(
        function(){
        $.ajax({
            type: "GET",
            url: "http://bus.idealconectividade.com.br/web/get_devices/3",
            success: function(data){

                $('#over_speeding').html(data.over_speeding);
                $('#device_status').html('<div style="color: darkgreen; display: block;">'+data.online_counter+' ON</div>                                    <div style="color: red; display: block;">'+data.offline_counter+' OFF</div>');
                $('#total_distance').html(data.total_distance);
                $('#fuel_consumption').html(data.fuel_consumption);

            },
                dataType: "json",
            })
    }
    , 10000);

</script><?php

    function timeDiff($exp, $act, $date) {
        $exp = strtotime($date .' '.$exp);
        $act = strtotime($date.' '. $act);
        return round(($exp - $act) / 60,2);
    }

?>
