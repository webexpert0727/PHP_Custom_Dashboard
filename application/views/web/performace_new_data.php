<div class="wrap-fluid" style="width: auto; margin-left: 250px;">
    <div class="container-fluid paper-wrap bevel tlbr">

      
        <div class="content-wrap">
            <!-- Form Start -->
            <div class="row">
                <form method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"> Bus Name </label>
                            <input class="form-control" required name="bus_name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"> Date </label>
                            <input class="form-control" required name="date" placeholder="1999-04-01" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> From Lat </label>
                            <input class="form-control" required name="from_lat" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> From Long </label>
                            <input class="form-control" required name="from_lng" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> From Time </label>
                            <input class="form-control" required name="from_time" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> To Lat </label>
                            <input class="form-control" required name="to_lat" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> To Long </label>
                            <input class="form-control" required name="to_lng" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"> To Time </label>
                            <input class="form-control" required name="to_time" />
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Form End -->
            <div class="row">
                <!-- <div class="col-xs-4 pull-right form-inline text-right">
                    <label for="exampleInputName2">Limit : </label>
                    <div class="form-group drp1">
                        <select name="limit" class="form-control select2" id="limitselect">
                            <option value="<?php echo $url; ?>?limit=10&page=1" <?php echo ($limit == 10) ? ('selected') : (''); ?>>10</option>
                            <option value="<?php echo $url; ?>?limit=25&page=1" <?php echo ($limit == 25) ? ('selected') : (''); ?>>25</option>
                            <option value="<?php echo $url; ?>?limit=100&page=1" <?php echo ($limit == 100) ? ('selected') : (''); ?>>100</option>
                        </select>
                    </div>
                </div> -->

                <div class="col-sm-12">

                   <table class="table table-bordered table-striped cf">
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
                    </tr>
                    </thead>
                    <tbody>
                    
                        <?php if( isset($result) && count($result) > 0 ) { ?>
                        <?php
                        $counter = 1;
                        foreach ($result as $key => $value) { ?>
                        <tr>

                            <td><?php echo $counter; ?> </td>
                            <td><?php echo $value['t_bus_name']; ?></td>
                            <td ><?php echo $value['t_date']; ?></td>
                            <td ><?php echo $value['f_source_lat'].', '.$value['f_source_lng']; ?></td>
                            <td ><?php echo $value['f_exp_tim']; ?></td>
                            <td ><?php echo $value['f_time']; ?></td>
                            <td ><?php echo $value['t_source_lat'].', '.$value['t_source_lng']; ?></td>
                            <td ><?php echo $value['t_exp_tim']; ?></td>
                            <td ><?php echo $value['t_time']; ?></td>
                        </tr>
                        <?php
                        $counter++;

                        }
                    } ?>
                    

                    </tbody>
                    </table>


                </div>
            </div>
            <div class="row">               
                <div class="col-sm-12 text-center">
                    <div class="paging_simple_numbers" id="example1_paginate">
                        <?php echo $pagination; ?>                        
                    </div>
                </div>
            </div>
        </div>


        <!-- /END OF CONTENT