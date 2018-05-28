
<link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.css">
 <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url() ?>assets/bootstrap-datetimepicker.min.css">


 <link rel="stylesheet" type="text/css" media="screen"
     href="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.css">

<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Schedule Data</h4>
        </div>
        <div class="modal-body">
         <div class="row" style="background-color: white; padding: 15px;">
                <form method="post" action="<?php echo base_url() ?>performance/save_parfomance/<?php echo (!empty($busInfo))?($busInfo->id):('') ?>" id="formSubmit" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bus Name </label>

                                        <select id="bus" required name="bus_name" class="form-control ">
                                            <?php
                                            if($buses && count($buses) > 0) {
                                                foreach ($buses as $key => $buses) {
                                                    ?>
                                                    <option value="<?php echo $buses; ?>"  <?php echo (!empty($busInfo))?(($busInfo->bus == $buses)?('selected'):('')):('') ?>><?php echo $buses; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="single" class=" control-label">Day </label>
                                    <select id="date_of_week" name="date_of_week" class="form-control ">
                                        <option value="WD" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'WD')?('selected'):('')):('') ?>>WD</option>
                                        <option value="SAT" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'SAT')?('selected'):('')):('') ?>>SAT</option>
                                        <option value="SUN" <?php echo (!empty($busInfo))?(($busInfo->day_of_week == 'SUN')?('selected'):('')):('') ?>>SUN</option>
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Start Lat </label>
                                        <input class="form-control" required name="start_lat" value="<?php echo (!empty($busInfo->start_lat))?($busInfo->start_lat):('') ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Start Long </label>
                                        <input class="form-control" required name="start_lng" value="<?php echo (!empty($busInfo->start_lng))?($busInfo->start_lng):('') ?>"/>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"> Expected Start Time </label>
                                        <input class="form-control" required name="start_time" id="datetimepicker2" />
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Expected Start Time </label>

                                        <div id="datetimepicker2" class="input-append">
                                            <input data-format="MM/dd/yyyy HH:mm:ss PP" class="form-control" required name="start_time" type="text" value="<?php echo (!empty($busInfo->expected_start_time))?($busInfo->expected_start_time):('') ?>"></input>
                                            <span class="add-on">fd
                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                              </i>
                                            </span>
                                        </div>

                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Expected Start Time </label>
                                        <div class="input-group bootstrap-timepicker">
                                            <input id="timepicker3" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_start_time))?($busInfo->expected_start_time):('') ?>" required name="start_time" data-date-useseconds="true" data-date-pickDate="false">
                                            <span class="input-group-addon add-on entypo-clock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Halfway Lat </label>
                                        <input class="form-control"  name="middle_lat" value="<?php echo (!empty($busInfo->middle_lat))?($busInfo->middle_lat):('') ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Halfway Long </label>
                                        <input class="form-control"  name="middle_lng" value="<?php echo (!empty($busInfo->middle_lng))?($busInfo->middle_lng):('') ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Expected Halfway Time </label>
                                        <div class="input-group bootstrap-timepicker">
                                            <input id="timepicker5" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_middle_time))?($busInfo->expected_middle_time):('') ?>" name="middle_time" data-date-useseconds="true" data-date-pickDate="false">
                                            <span class="input-group-addon add-on entypo-clock"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> End Lat </label>
                                        <input class="form-control" required name="end_lat" value="<?php echo (!empty($busInfo->end_lat))?($busInfo->end_lat):('') ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> End Long </label>
                                        <input class="form-control" required  name="end_lng" value="<?php echo (!empty($busInfo->end_lng))?($busInfo->end_lng):('') ?>" />
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Expected End Time </label>
                                        <div class="input-group bootstrap-timepicker">
                                            <input id="timepicker4" type="text" class="form-control" value="<?php echo (!empty($busInfo->expected_end_time))?($busInfo->expected_end_time):('') ?>" required name="end_time">
                                            <span class="input-group-addon add-on entypo-clock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                     <div class="modal-footer col-md-12">
                        <button class="btn btn-success" type="submit" id="submit">Submit</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>



  <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/timepicker/bootstrap-timepicker.js">
    </script>
    <script type="text/javascript"
     src="http://ndesaintheme.com/themes/apricot/assets/js/datepicker/bootstrap-datetimepicker.js">
    </script>
<script type="text/javascript">
    if ($("#formSubmit").length > 0) {
        $("#formSubmit").validate({
            rules: {
                route: {
                    required: true,

                },

            },
            messages: {

                route: {
                    required: "Please enter name .",

                },

            },

            submitHandler: function (form) {
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    dataType: 'json'
                }).done(function (response) {
                    if (response.success == 'success') {
                        $.notify({message: response.message}, {type: response.success, z_index: 2147483647});
                        window.setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 1000);

                    } else {
                        $.notify({message: response.message}, {type: response.success, z_index: 2147483647});
                         window.setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 1000);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    }
</script>
<script type="text/javascript">
   /* $('#datetimepicker1').datetimepicker({
        language: 'pt-BR'
    });*/

    $('#timepicker3').timepicker({
        pickDate: false,
        showMeridian : false,
        use24hours: true,
        format: 'H:i',
    });
     $('#timepicker4').timepicker({
        pickDate: false,
        showMeridian : false,
        use24hours: true,
        format: 'H:i',
    });
     $('#timepicker5').timepicker({
        pickDate: false,
        showMeridian : false,
        use24hours: true,
        format: 'H:i',
    });
    /*$('#t1').clockface();
    $('#t2').clockface({
        format: 'HH:mm',
        trigger: 'manual'
    });*/

   /* $('#toggle-btn').click(function(e) {
        e.stopPropagation();
        $('#t2').clockface('toggle');
    });*/
    </script>
