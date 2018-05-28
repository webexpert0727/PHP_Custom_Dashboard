    <div class="container">

        <div class="" id="login-wrapper">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div id="logo-login">

                        <img src="http://bus.idealconectividade.com.br/sim_logo_login.png" width="110px;">

                    </div>

                </div>



            </div>



            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div class="account-box">

                        <?php

                            if( isset($error) && $error == 1  ) {

                            echo "<b style='color:red'>Given login details are wrong!</b>";

                        }

                        ?>



                        <form role="form" action="" method="post">

                            <div class="form-group">

                                <!-- <a href="#" class="pull-right label-forgot">Forgot email?</a> -->

                                <label for="inputUsernameEmail">Username or email</label>

                                <input type="text" id="inputUsernameEmail" name="user_name" class="form-control" placeholder="Username or email" value="<?php echo set_value('user_name'); ?>">
                                <?php echo form_error('user_name'); ?>

                            </div>

                            <div class="form-group">

                                <!-- <a href="#" class="pull-right label-forgot">Forgot password?</a> -->

                                <label for="inputPassword">Password</label>

                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                                <?php echo form_error('password'); ?>

                            </div>

                            <div class="checkbox pull-left">

                                <!-- <label>

                                    <input type="checkbox">Remember me</label> -->

                            </div>

                            <button class="btn btn btn-primary pull-right1" type="submit">

                                Log In

                            </button>

                        </form>
                    </div>

                </div>

            </div>

        </div>


        <div style="text-align:center;margin:0 auto;">

          <!--   <h6 style="color:#fff;">Release Candidate 1.0 Powered by © Themesmiles 2014</h6> -->

        </div>



    </div>

    <div id="test1" class="gmap3"></div>