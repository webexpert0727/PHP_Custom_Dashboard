<!--  PAPER WRAP -->
<div class="wrap-fluid" style="width: auto; margin-left: 250px;">
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- CONTENT -->
        <!--TITLE -->
        <div class="row">
            <div id="paper-top">
                <div class="col-sm-3">
                    <h2 class="tittle-content-header">
                        <i class="icon-location"></i>
                        <span>Bus Performance & Realtime Delay Information</span>
                    </h2>
                </div>

                <div class="col-sm-7">
                    <div class="devider-vertical visible-lg"></div>
                    <div class="tittle-middle-header">

                        <div class="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <span class="tittle-alert entypo-info-circled"></span>
                            Welcome back,&nbsp;
                            <strong>Dave mattew!</strong>&nbsp;&nbsp;Your last sig in at Yesterday, 16:54 PM
                        </div>


                    </div>

                </div>
                <div class="col-sm-2" style="display: none;">
                    <div class="devider-vertical visible-lg"></div>
                    <div class="btn-group btn-wigdet pull-right visible-lg">
                        <div class="btn">
                            Widget</div>
                        <button data-toggle="dropdown" class="btn dropdown-toggle" type="button">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <span class="entypo-plus-circled margin-iconic"></span>Add New</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-heart margin-iconic"></span>Favorite</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="entypo-cog margin-iconic"></span>Setting</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <!--/ TITLE -->

        <!-- BREADCRUMB -->
        <ul id="breadcrumb">
            <li>
                <span class="entypo-home"></span>
            </li>
            <li><i class="fa fa-lg fa-angle-right"></i>
            </li>
            <li><a href="#" title="Sample page 1">Home</a>
            </li>
            <li><i class="fa fa-lg fa-angle-right"></i>
            </li>
            <li><a href="#" title="Sample page 1">Live Performance</a>
            </li>
            <li class="pull-right">
                <div class="input-group input-widget">

                    <input style="border-radius:15px" type="text" placeholder="Search..." class="form-control">
                </div>
            </li>
        </ul>

        <!-- END OF BREADCRUMB -->

        <div class="content-wrap">
            <div class="row">

                <div class="col-sm-12">


                    <table width="100%" border="1" cellpadding="5">

                        <tr>

                            <th scope="col">Sr No</th>

                            <th scope="col">Bus No</th>

                            <th scope="col">Route Number</th>

                            <th scope="col">Start Time</th>

                            <th scope="col">Completed Time</th>

                            <th scope="col">Total Time Taken</th>

                            <th scope="col">Delayed Time</th>
                        </tr>



                        <?php
                        //echo '<pre>'; print_r($data); die;
                        if (isset($delayed_buses) && !empty($delayed_buses)) {
                            $i = 0;
                            foreach ($delayed_buses as $bus) {
                                $i++;
                                ?>

                                <tr>

                                    <td><?php echo $i; ?></td>

                                    <td><?php echo $bus->bus_no; ?></td>

                                    <td><?php echo $bus->route; ?></td>

                                    <td><?php echo $bus->actual_departure_time; ?></td>

                                    <td><?php echo $bus->actual_arrival_time; ?></td>

                                    <td><?php echo $bus->total_time_taken; ?> (Mins)</td>

                                    <td><?php echo $bus->delayed_time; ?> (Mins)</td>

                                </tr>

                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7">All bus running on time.</td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>


                </div>
            </div>
        </div>


        <!-- /END OF CONTENT -->