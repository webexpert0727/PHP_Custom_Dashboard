<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="utf-8">

    <title>BUS CONTROL</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Le styles -->

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>



   <!--  <link rel="stylesheet" href="assets/css/style.css"> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/loader-style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/signin.css">



    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if lt IE 9]>

        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <![endif]-->

    <!-- Fav and touch icons -->

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/minus.png">

</head>



<body>

    <!-- Preloader -->

    <div id="preloader">

        <div id="status">&nbsp;</div>

    </div>

    <div class="container">







        <div class="" id="login-wrapper">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div id="logo-login">

                        <img src="http://bus.idealconectividade.com.br/sim_logo_login.png" width="120px;">

                    </div>

                </div>



            </div>



            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div class="account-box">

                        <?php if(!empty($this->session->flashdata('error'))): ?>
                            <div class="alert alert-danger">  
                                <?php echo $this->session->flashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            </div>
                        <?php  endif; ?>



                        <form role="form" action="" method="post">

                            <div class="form-group">

                                <!-- <a href="#" class="pull-right label-forgot">Forgot email?</a> -->

                                <label for="inputUsernameEmail"><?php echo $this->lang->line('USER_NAME_AND_EMAIL');?></label>

                                <input type="text" id="inputUsernameEmail" name="user_name" class="form-control" placeholder="<?php echo $this->lang->line('USER_NAME_AND_EMAIL');?>" value="<?php echo set_value('user_name'); ?>">
                                <?php echo form_error('user_name'); ?>

                            </div>

                            <div class="form-group">

                                <!-- <a href="#" class="pull-right label-forgot">Forgot password?</a> -->

                                <label for="inputPassword"><?php echo $this->lang->line('PASSWORD');?></label>

                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="<?php echo $this->lang->line('PASSWORD');?>">
                                <?php echo form_error('password'); ?>

                            </div>

                            <div class="checkbox pull-left">

                                <!-- <label>

                                    <input type="checkbox">Remember me</label> -->

                            </div>

                            <button class="btn btn btn-primary pull-right1" type="submit">

                                <?php echo $this->lang->line('LOGIN');?>

                            </button>

                        </form>

                        <!-- <a class="forgotLnk" href="index.html"></a>

                        <div class="or-box">



                            <center><span class="text-center login-with">Login or <b>Sign Up</b></span></center>

                            <div class="row">

                                <div class="col-md-6 row-block">

                                    <a href="index.html" class="btn btn-facebook btn-block">

                                        <span class="entypo-facebook space-icon"></span>Facebook</a>

                                </div>

                                <div class="col-md-6 row-block">

                                    <a href="index.html" class="btn btn-twitter btn-block">

                                        <span class="entypo-twitter space-icon"></span>Twitter</a>



                                </div>



                            </div>

                            <div style="margin-top:25px" class="row">

                                <div class="col-md-6 row-block">

                                    <a href="index.html" class="btn btn-google btn-block"><span class="entypo-gplus space-icon"></span>Google +</a>

                                </div>

                                <div class="col-md-6 row-block">

                                    <a href="index.html" class="btn btn-instagram btn-block"><span class="entypo-instagrem space-icon"></span>Instagram</a>

                                </div>



                            </div>

                        </div>

                        <hr>

                        <div class="row-block">

                            <div class="row">

                                <div class="col-md-12 row-block">

                                    <a href="index.html" class="btn btn-primary btn-block">Create New Account</a>

                                </div>

                            </div>

                        </div> -->

                    </div>

                </div>

            </div>

        </div>











        <div style="text-align:center;margin:0 auto;">

          <!--   <h6 style="color:#fff;">Release Candidate 1.0 Powered by © Themesmiles 2014</h6> -->

        </div>



    </div>

    <div id="test1" class="gmap3"></div>







    <!--  END OF PAPER WRAP -->









    <!-- MAIN EFFECT -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/preloader.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/load.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>



    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyByKHVXfgEC0rhm7yvUyysVyDWF4up1Ds8" type="text/javascript"></script>

    <script type="text/javascript" src="assets/js/map/gmap3.js"></script>

    <script type="text/javascript">

    $(function() {



        $("#test1").gmap3({

            marker: {

                latLng: [-8.76194,-63.90389],

                options: {

                    draggable: true

                },

                events: {

                    dragend: function(marker) {

                        $(this).gmap3({

                            getaddress: {

                                latLng: marker.getPosition(),

                                callback: function(results) {

                                    var map = $(this).gmap3("get"),

                                        infowindow = $(this).gmap3({

                                            get: "infowindow"

                                        }),

                                        content = results && results[1] ? results && results[1].formatted_address : "no address";

                                    if (infowindow) {

                                        infowindow.open(map, marker);

                                        infowindow.setContent(content);

                                    } else {

                                        $(this).gmap3({

                                            infowindow: {

                                                anchor: marker,

                                                options: {

                                                    content: content

                                                }

                                            }

                                        });

                                    }

                                }

                            }

                        });

                    }

                }

            },

            map: {

                options: {

                    zoom: 15

                }

            }

        });



    });

    </script>









</body>



</html>

