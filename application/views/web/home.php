 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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


            <!-- END OF BREADCRUMB -->



            <!--  DEVICE MANAGER -->
            <div class="content-wrap" >
                <div class="row">
                    <div class="col-sm-3">
                        <div class="profit dash-boxes" style="min-height: 139px;">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="maki-bus"></i>&#160;&#160;Bus Status</span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#profitClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="value">
                                <i class="maki-bus pull-left" title="" data-original-title="bus"></i>

                                <span class="pull-right" style="width: 80%; top:20px" id="device_status"><?php if($device_status && count($device_status) > 0 ){ ?>
                                    <div style="color: darkgreen; display: block;"><?php echo $device_status['online_counter']; ?> ON</div>
                                    <div style="color: red; display: block;"><?php echo $device_status['offline_counter']; ?> OFF</div>

                                <?php } ?></span>


                            </div>

                            <div class="progress-tinny">
                                <div style="width: 50%" class="bar"></div>
                            </div>
                            <!-- <div class="profit-line">
                                <i class="fa fa-caret-up fa-lg"></i>&#160;&#160; 50% &#160;From Last Hour </div>-->
                        </div>
                    </div>
                    <div class="col-sm-3"  >
                        <div class="revenue dash-boxes"   style="min-height: 139px;">
                            <div class="headline ">

                                <h3>
                                    <span>
                                        <i class="maki-aboveground-rail"></i>&#160;&#160;Total Distance</span>
                                </h3>

                                <div class="titleClose">
                                    <a href="#revenueClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value">
                              <i class="entypo-gauge gauge-position pull-left"></i>

                               <span class="pull-right" style="width: 78%;" id="total_distance"> <?php if($device_status && count($device_status) > 0 ){ ?>
                                    <?php echo round($device_status['total_distance']/1000, 2). ' <dd style="font-size:12px; display: inline-block;">/Km</dd>'; ?>
                                    <?php } ?>
                            </span>

                            </div>

                            <div class="progress-tinny">
                                <div style="width: 25%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <!-- <i class="fa fa-caret-down fa-lg"></i>&#160;&#160;Rate : 20 km/Hour --></div>
                        </div>
                    </div>
                    <div class="col-sm-3" >
                        <div class="order dash-boxes"   style="min-height: 139px;">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="maki-fuel"></i>&#160;&#160; Fuel Consumption</span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#orderClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value"><i  class="maki-fuel pull-left"></i>
                                <span class="pull-right" id="fuel_consumption" style="width: 80%;">

                                 <?php if($device_status && count($device_status) > 0 ){ ?> <?php echo round($device_status['fuel_consumption'], 2);  } ?>


                            </div>
                        
                            <div class="progress-tinny">
                                <div style="width: 10%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <!-- <i class="fa fa-caret-down fa-lg"></i>&#160;&#160;Rate : 20 Plane/Hour -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" >
                        <div class=" member dash-boxes"   style="min-height: 139px;">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="icon icon-graph-line"></i>
                                        &#160;&#160;OVER SPEEDING
                                    </span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#memberClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value">
                                <i class="icon icon-graph-line pull-left"></i>

                                <span class="pull-right" id="over_speeding" style="width: 80%;"> <?php if($device_status && count($device_status) > 0 ){ ?> <?php echo $device_status['over_speeding'];  } ?></span>

                            </div>
                            <div class="progress-tinny">
                                <div style="width: 50%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <span class="entypo-down-circled"></span>&#160;Total vehicle above 66 speed</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3" >
                        <div class=" member dash-boxes"   style="min-height: 139px;">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="icon icon-graph-line"></i>
                                        &#160;&#160;Stopped
                                    </span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#memberClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value">
                                <i class="icon icon-graph-line pull-left"></i>

                                <span class="pull-right" id="stopped_bus" style="width: 80%;"> 7 </span>

                            </div>
                            <div class="progress-tinny">
                                <div style="width: 50%" class="bar"></div>
                            </div>
                            <!-- <div class="profit-line">
                                <span class="entypo-down-circled"></span>&#160;Total vehicle above 66 speed</div> -->
                        </div>
                    </div>
                    <div class="col-sm-3" >
                        <div class="member dash-boxes"   style="min-height: 139px;">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="entypo-clock"></i>&#160;&#160; Late Buses</span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#orderClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value"><i  class="entypo-clock"></i>
                                <span class="pull-right" id="fuel_consumption" style="width: 80%;">

                                 <?php  echo $totalBusYesterday; ?>


                            </div>
                        
                            <div class="progress-tinny">
                                <div style="width: 10%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <span class="fontawesome-ok-sign"></span>&#160;<a href="<?php echo base_url() ?>report?last_date=<?php echo date('Y-m-d',strtotime("-1 days")) ?>">Detail </a>
                            </div>
                            
                        </div>
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
</style>
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
                $('#stopped_bus').html(data.stopped);

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
