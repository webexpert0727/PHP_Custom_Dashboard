
<head>
    <meta charset="utf-8">
    <title>Transportation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->

    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>assets/css/loader-style.css">
     <link rel="stylesheet" href="<?php echo ASSET_URL; ?>assets/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?php echo ASSET_URL; ?>assets/js/progress-bar/number-pb.css">

    

    <style type="text/css">
    canvas#canvas4 {
        position: relative;
        top: 20px;
    }
    </style>




    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo ASSET_URL; ?>assets/ico/minus.png">
    <script type="text/javascript">
        var ASSET_URL = '<?php echo ASSET_URL; ?>';
    </script>


    <!-- Below is the js for live map -->
    <?php if(in_array($this->uri->segment(2), ['live_map']) || in_array($this->uri->segment(1), ['live_map'])){ ?>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/preloader.js"></script>-->
    <!-- <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/bootstrap.js"></script> -->
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/load.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/main1.js"></script>


    <link rel="stylesheet" href="http://track.idealconectividade.com.br/assets/css/light-blue.css?v=3.1.0.13">
    <?php } else {
        ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

        <?php
    } ?>
 
</head>

