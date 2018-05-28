
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
"> -->
<link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.css">
 <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url() ?>assets/bootstrap-datetimepicker.min.css">


<!--  <link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.css">
 -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

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
div.dt-buttons {
    margin-left: 15px;
}
</style>
           

             
        <div class="content-wrap">
            <!-- Form Start -->
            <div class="row" style="background-color: white; padding: 15px;">
                <form method="post" action="<?php echo base_url() ?>performance/save_csv_import" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"> CSV Import </label>
                            <input type="file" class="form-control" required name="csv_file" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <br>

            <!-- Form Start -->
            <div class="row" style="background-color: white; padding: 15px;">
            <?php echo message_box('success'); ?>
            <?php echo message_box('error'); ?>
            <div style="font-size: 20px;"> Schedule Data </div><br>
                <form method="post" action="<?php echo base_url() ?>performance/save_parfomance/<?php echo (!empty($busInfo))?($busInfo->id):('') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Route </label>
                                    <select id="date_of_week" required name="route" class="form-control ">
                                        <?php
                                        if($routes && count($routes) > 0) {
                                            foreach ($routes as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value->id; ?>" <?php echo (!empty($busInfo))?(($busInfo->route == $value->id)?('selected'):('')):('') ?>><?php echo $value->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Bus Name </label>

                                    <select id="bus" required name="bus_name" class="form-control ">
                                        <?php
                                        if($buses && count($buses) > 0) {
                                            foreach ($buses as $key => $buses) {
                                                ?>
                                                <option value="<?php echo $buses; ?>" <?php echo (!empty($busInfo))?(($busInfo->bus == $buses)?('selected'):('')):('') ?>><?php echo $buses; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="single" class=" control-label">Day </label>
                                <select id="date_of_week" name="date_of_week" class="form-control ">
                                    <option value="WD" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'WD')?('selected'):('')):('') ?>>WD</option>
                                    <option value="SAT" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'SAT')?('selected'):('')):('') ?>>SAT</option>
                                    <option value="SUN" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'SUN')?('selected'):('')):('') ?>>SUN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Start Lat </label>
                                    <input class="form-control" required name="start_lat" value="<?php echo (!empty($busInfo->start_lat))?($busInfo->start_lat):('') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Start Long </label>
                                    <input class="form-control" required name="start_lng" value="<?php echo (!empty($busInfo->start_lng))?($busInfo->start_lng):('') ?>"/>
                                </div>
                            </div>

                             <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected Start Time </label>

                                    <div id="timepicker1" class="input-append">
                                        <input  class="form-control" required name="start_time" type="text" value="<?php echo (!empty($busInfo->expected_start_time))?($busInfo->expected_start_time):('') ?>"></input>
                                        <span class="input-group-addon add-on entypo-clock">
                                         </span>
                                    </div>

                                </div>
                            </div> -->
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected Start Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker1" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_start_time))?($busInfo->expected_start_time):('') ?>" required name="start_time" data-date-useseconds="true" data-date-pickDate="false">
                                        <span class="input-group-addon add-on entypo-clock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Halfway Lat </label>
                                    <input class="form-control" name="middle_lat" value="<?php echo (!empty($busInfo->middle_lat))?($busInfo->middle_lat):('') ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Halfway Long </label>
                                    <input class="form-control" name="middle_lng" value="<?php echo (!empty($busInfo->middle_lng))?($busInfo->middle_lng):('') ?>"/>
                                </div>
                            </div>

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected Halfway Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker3" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_middle_time))?($busInfo->expected_middle_time):('') ?>" name="middle_time" data-date-useseconds="true" data-date-pickDate="false">
                                        <span class="input-group-addon add-on entypo-clock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> End Lat </label>
                                    <input class="form-control" required name="end_lat" value="<?php echo (!empty($busInfo->end_lat))?($busInfo->end_lat):('') ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> End Long </label>
                                    <input class="form-control" required  name="end_lng" value="<?php echo (!empty($busInfo->end_lng))?($busInfo->end_lng):('') ?>" />
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected End Time </label>
                                    <input class="form-control" required name="end_time" />
                                </div>
                            </div> -->
                             <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected End Time </label>

                                    <div id="timepicker2" class="input-append">
                                        <input data-format="MM/dd/yyyy HH:mm:ss PP" class="form-control" required name="end_time" type="text" value="<?php echo (!empty($busInfo->expected_end_time))?($busInfo->expected_end_time):('') ?>"></input>
                                         <span class="input-group-addon add-on entypo-clock">
                                         </span>
                                    </div>

                                </div>
                            </div> -->
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Expected End Time </label>
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker2" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_end_time))?($busInfo->expected_end_time):('') ?>" required name="end_time">
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

                    <table class="table table-bordered table-striped cf" id="dataTables-example" style="color: #000;">
                        <thead class="cf">
                            <tr>
                                <th>Sr</th>
                                <th>Route</th>
                                <th>Bus</th>
                                <th>Start Lat, Long</th>
                                <th>Expected Start Time</th>
                                <th>Halfway Lat, Long</th>
                                <th>Halfway Expected Time</th>
                                <th>End Lat, Long</th>
                                <th>Expected End Time</th>
                                <th>Day </th>
                                <th>Created On </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                                <?php if( isset($result) && count($result) > 0 ) { ?>
                                    <?php
                                    $counter = 1;
                                    foreach ($result as $value) { ?>
                                    <tr>
                                        <td><?php echo $counter; ?> </td>
                                        <td><?php echo $value->route; ?></td>
                                        <td><?php echo $value->bus; ?></td>
                                        <td><?php echo $value->start_lat .','. $value->start_lng; ?></td>
                                        <td><?php echo $value->expected_start_time; ?></td>

                                        <td><?php echo (!empty($value->middle_lat))?( $value->middle_lat .','. $value->middle_lng):(''); ?></td>
                                        <td><?php echo $value->expected_middle_time; ?></td>

                                        <td><?php echo $value->end_lat .','. $value->end_lng; ?></td>
                                        <td><?php echo $value->expected_end_time; ?></td>
                                        <td><?php echo $value->day_of_week; ?></td>
                                        <td><?php echo date('d-m-Y h:i a' , strtotime($value->created_at)); ?></td>
                                        <!-- <td><a href="<?php echo base_url() ?>/performance/csv_import/<?php echo $value->id ?>" class="btn btn-success"> Edit </a></td> -->
                                        <td><a href="<?php echo base_url().'performance/view_edit/'.$value->id;?>" data-toggle="modal" title="Edit" data-placement="top" data-target="#myModalTest">Edit</a></td>
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

                dom: 'lBfrtip',
                buttons: [
                    {extend: 'pdf', className: 'btn default',
                        text:      '<i class="fa fa-file-pdf-o"> PDF</i>',
                        titleAttr: 'PDF',
                        exportOptions: {
                             modifier: {
                                search: 'applied',
                                order: 'applied',
                            },
                             columns: ':visible:not(:eq(-1))' 
                        }
                    },
                    {extend: 'excel', className: 'btn default',
                        text:      '<i class="fa fa-file-excel-o"> Excel</i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                            },
                             columns: ':visible:not(:eq(-1))' 
                        }
                    },
                ]

                /* Disable initial sort */
                /* columnDefs: [ { orderable: false, targets: -1 } ],*/
               // "aaSorting": []
            });
        }
    });
</script>

<!--  <script type="text/javascript"
     src="<?php echo base_url() ?>assets/bootstrap-datetimepicker.min.js">
    </script> -->
      <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.js">
    </script>
    <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/bootstrap-datetimepicker.js">
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
     $('#timepicker2').timepicker({
         pickDate: false,
         use24hours: true,
         showMeridian : false,
        format: 'H:m',
    });  
     $('#timepicker3').timepicker({
         pickDate: false,
         use24hours: true,
         showMeridian : false,
        format: 'H:m',
    });

    </script>

