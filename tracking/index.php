<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sim</title>

    <base href="http://track.idealconectividade.com.br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" GPS Tracking System for Personal Use or Business ">
    <link rel="shortcut icon" href="https://www.papekphotography.com/images/200/Thegoodlifemaster-3.jpg" type="image/x-icon">

    <link rel="stylesheet" href="http://track.idealconectividade.com.br/assets/css/light-blue.css?v=3.1.0.13">


    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>


<div id="loading">
    <div class="middle">
        <div class="inner">
            <i class="loader large"></i>
        </div>
    </div>
</div>
<script type="text/javascript">
    setTimeout(function(){
        $('#loading').hide();
    }, 10000);
</script><div id="header" class="folded">
    <nav class="navbar navbar-main navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header" style="display: none !important;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-header-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                                <a class="navbar-brand" href="/" title="Ideal Conectividade"><img src="https://www.papekphotography.com/images/200/Thegoodlifemaster-3.jpg"></a>
                            </div>

            <div class="collapse navbar-collapse" id="bs-header-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                                            <li style="display: none;" id="admin_li">
                            <a href="http://track.idealconectividade.com.br/admin" role="button" rel="tooltip" data-placement="bottom" title="ADMIN">
                                <span class="icon admin"></span>
                                <span class="text">ADMIN</span>
                            </a>
                        </li>

                    <li class="dropdown">
                        <a href="javascript:" class="dropdown-toggle" role="button" data-toggle="dropdown" id="dropTools" rel="tooltip" data-placement="bottom" title="Tools">
                            <span class="icon tools"></span>
                            <span class="text">Tools</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left" id="tools_dropdown" role="menu" aria-labelledby="dropTools">
                            <li>
                                <a href="javascript:" onclick="app.openTab('alerts_tab');">
                                    <span class="icon alerts"></span>
                                    <span class="text">Alerts</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:" onclick="app.openTab('geofencing_tab');">
                                    <span class="icon geofences"></span>
                                    <span class="text">Geofencing</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:" onclick="app.openTab('routes_tab');">
                                    <span class="icon routes"></span>
                                    <span class="text">Routes</span>
                                </a>
                            </li>
                                                        <li>
                                <a href="javascript:" data-url="http://track.idealconectividade.com.br/reports/create" data-modal="reports_create" role="button">
                                    <span class="icon reports"></span>
                                    <span class="text">Reports</span>
                                </a>
                            </li>
                                                        <li>
                                <a  href="#objects_tab" data-toggle="tab" onclick="app.ruler();">
                                    <span class="icon ruler"></span>
                                    <span class="text">Ruler</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:" onClick="app.openTab('map_icons_tab');">
                                    <span class="icon poi"></span>
                                    <span class="text">POI</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="modal" data-target="#showPoint">
                                    <span class="icon point"></span>
                                    <span class="text">Show point</span>

                                </a>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="modal" data-target="#showAddress">
                                    <span class="icon address"></span>
                                    <span class="text">Show address</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:" data-url="http://track.idealconectividade.com.br/send_command/create" data-modal="send_command">
                                    <span class="icon send-command"></span>
                                    <span class="text">Send command</span>
                                </a>
                            </li>
                                                                                    <li>
                                <a href="http://track.idealconectividade.com.br/maintenance" target="_blank" role="button">
                                    <span class="icon services"></span>
                                    <span class="text">Maintenance</span>
                                </a>
                            </li>
                                                    </ul>
                    </li>
                    <li style="display: none;" id="lang_li">
                        <a href="javascript:" data-url="http://track.idealconectividade.com.br/my_account_settings/%7Bmy_account_settings%7D/edit" data-modal="my_account_settings_edit" role="button" rel="tooltip" data-placement="bottom" title="Setup">
                            <span class="icon setup"></span>
                            <span class="text">Setup</span>
                        </a>
                    </li>
                    <li class="dropdown" style="display: none;">
                        <a href="javascript:" class="dropdown-toggle" role="button" id="dropMyAccount" data-toggle="dropdown" rel="tooltip" data-placement="bottom" title="My account">
                            <span class="icon account"></span>
                            <span class="text">My account</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropMyAccount">
                            <li>
                                <a href="javascript:" data-url="http://track.idealconectividade.com.br/membership" data-modal="subscriptions_edit">
                                    <span class="icon membership"></span>
                                    <span class="text">Membership</span>
                                </a>
                            </li>
                            <li>
                                                                <a href="javascript:" data-url="http://track.idealconectividade.com.br/my_account/%7Bmy_account%7D/edit" data-modal="subscriptions_edit">
                                    <span class="icon password"></span>
                                    <span class="text">Change password</span>
                                </a>
                                                            </li>
                            <li>
                                <a href="http://track.idealconectividade.com.br/logout">
                                    <span class="icon logout"></span>
                                    <span class="text">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="language-selection" style="display: none;">
                        <a href="javascript:" data-url="http://track.idealconectividade.com.br/membership/languages" data-modal="language-selection">
                            <img src="http://track.idealconectividade.com.br/assets/images/header/uk.png" alt="Language" class="img-thumbnail">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="sidebar">

    <a class="btn-collapse" onclick="app.changeSetting('toggleSidebar');"><i></i></a>

    <div class="sidebar-content">
        <ul class="nav nav-tabs nav-default">
            <li role="presentation" class="active">
                <a href="#objects_tab" type="button" data-toggle="tab">Objects</a>
            </li>
            <li role="presentation">
                <a href="#events_tab" type="button" data-toggle="tab">Events</a>
            </li>
            <li role="presentation">
                <a href="#history_tab" type="button" data-toggle="tab">History</a>
            </li>
                        <li role="presentation" class="hidden"><a href="#alerts_tab" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#geofencing_tab" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#geofencing_create" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#geofencing_edit" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#routes_tab" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#routes_create" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#routes_edit" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#map_icons_tab" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#map_icons_create" data-toggle="tab"></a></li>
            <li role="presentation" class="hidden"><a href="#map_icons_edit" data-toggle="tab"></a></li>
        </ul>

        <div class="tab-content">
    <div class="tab-pane active" id="objects_tab">
        <div class="tab-pane-header">
    <div class="form">
        <div class="input-group">
            <div class="form-group search">
                <input class="form-control" placeholder="Search" autocomplete="off" name="search" type="text">
            </div>
            <span class="input-group-btn">
                                                            </span>
        </div>
    </div>
</div>

<div class="tab-pane-body">
    <div id="ajax-items"></div>
</div>    </div>
    <div class="tab-pane" id="events_tab">
        <div class="tab-pane-header">
    <div class="form">
        <div class="input-group">
            <div class="form-group search">
                <input class="form-control" id="events_search_field" placeholder="Search" autocomplete="off" name="search" type="text">
            </div>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-url="http://track.idealconectividade.com.br/events/do_destroy" data-modal="events_do_destroy">
                    <i class="icon remove-all"></i>
                </button>
            </span>
        </div>
    </div>
</div>

<div class="tab-pane-body">
    <table class="table table-list">
        <thead>
            <tr>
                <th>Time</th>
                <th>Object</th>
                <th>Event</th>
            </tr>
        </thead>

        <tbody id="ajax-events"></tbody>
    </table>
</div>    </div>
    <div class="tab-pane" id="history_tab">
        <div class="tab-pane-header">
    <div id="history-form" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Device:</label>
            <div class="col-xs-9">
                <select class="form-control devices_list" data-live-search="1" name="devices"><option value="11">CUA-6476</option><option value="12">CUE-2032</option><option value="4">CUE-2152</option><option value="5">CUE-2177</option><option value="24">CUE-2182</option><option value="30">EPU-9159</option><option value="13">KWB-4031</option><option value="2">LPM-7574</option><option value="27">LPM-7582</option><option value="23">LUH-4000</option><option value="28">NCT-0342</option><option value="20">NCT-0372</option><option value="22">NCT-0382</option><option value="25">NCT-0472</option><option value="15">NCT-0512</option><option value="26">NCT-0522</option><option value="21">NCT-0652</option><option value="8">NDJ-9944</option><option value="17">NEM-3932</option><option value="18">NEM-8378</option><option value="9">NEO-3521</option><option value="3">NEO-5726</option><option value="1">NEO-5736</option><option value="6">NEO-5746</option><option value="14">NEO-5776</option><option value="16">NEO-5786</option><option value="29">NEQ-9919</option><option value="10">NEQ-9925</option><option value="19">NEQ-9929</option></select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">From:</label>
            <div class="col-xs-9">
                <div class="input-group">
                    <input class="datepicker form-control" name="from_date" type="text" value="2018-02-16">
                    <span class="input-group-btn">
                        <select class="form-control timeselect" name="from_time"><option value="00:00">00:00</option><option value="00:15">00:15</option><option value="00:30">00:30</option><option value="00:45">00:45</option><option value="01:00">01:00</option><option value="01:15">01:15</option><option value="01:30">01:30</option><option value="01:45">01:45</option><option value="02:00">02:00</option><option value="02:15">02:15</option><option value="02:30">02:30</option><option value="02:45">02:45</option><option value="03:00">03:00</option><option value="03:15">03:15</option><option value="03:30">03:30</option><option value="03:45">03:45</option><option value="04:00">04:00</option><option value="04:15">04:15</option><option value="04:30">04:30</option><option value="04:45">04:45</option><option value="05:00">05:00</option><option value="05:15">05:15</option><option value="05:30">05:30</option><option value="05:45">05:45</option><option value="06:00">06:00</option><option value="06:15">06:15</option><option value="06:30">06:30</option><option value="06:45">06:45</option><option value="07:00">07:00</option><option value="07:15">07:15</option><option value="07:30">07:30</option><option value="07:45">07:45</option><option value="08:00">08:00</option><option value="08:15">08:15</option><option value="08:30">08:30</option><option value="08:45">08:45</option><option value="09:00">09:00</option><option value="09:15">09:15</option><option value="09:30">09:30</option><option value="09:45">09:45</option><option value="10:00">10:00</option><option value="10:15">10:15</option><option value="10:30">10:30</option><option value="10:45">10:45</option><option value="11:00">11:00</option><option value="11:15">11:15</option><option value="11:30">11:30</option><option value="11:45">11:45</option><option value="12:00">12:00</option><option value="12:15">12:15</option><option value="12:30">12:30</option><option value="12:45">12:45</option><option value="13:00">13:00</option><option value="13:15">13:15</option><option value="13:30">13:30</option><option value="13:45">13:45</option><option value="14:00">14:00</option><option value="14:15">14:15</option><option value="14:30">14:30</option><option value="14:45">14:45</option><option value="15:00">15:00</option><option value="15:15">15:15</option><option value="15:30">15:30</option><option value="15:45">15:45</option><option value="16:00">16:00</option><option value="16:15">16:15</option><option value="16:30">16:30</option><option value="16:45">16:45</option><option value="17:00">17:00</option><option value="17:15">17:15</option><option value="17:30">17:30</option><option value="17:45">17:45</option><option value="18:00">18:00</option><option value="18:15">18:15</option><option value="18:30">18:30</option><option value="18:45">18:45</option><option value="19:00">19:00</option><option value="19:15">19:15</option><option value="19:30">19:30</option><option value="19:45">19:45</option><option value="20:00">20:00</option><option value="20:15">20:15</option><option value="20:30">20:30</option><option value="20:45">20:45</option><option value="21:00">21:00</option><option value="21:15">21:15</option><option value="21:30">21:30</option><option value="21:45">21:45</option><option value="22:00">22:00</option><option value="22:15">22:15</option><option value="22:30">22:30</option><option value="22:45">22:45</option><option value="23:00">23:00</option><option value="23:15">23:15</option><option value="23:30">23:30</option><option value="23:45">23:45</option></select>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">To:</label>
            <div class="col-xs-9">
                <div class="input-group">
                    <input class="datepicker form-control" name="to_date" type="text" value="2018-02-16">
                    <span class="input-group-btn">
                        <select class="form-control timeselect" name="to_time"><option value="00:00">00:00</option><option value="00:15">00:15</option><option value="00:30">00:30</option><option value="00:45">00:45</option><option value="01:00">01:00</option><option value="01:15">01:15</option><option value="01:30">01:30</option><option value="01:45">01:45</option><option value="02:00">02:00</option><option value="02:15">02:15</option><option value="02:30">02:30</option><option value="02:45">02:45</option><option value="03:00">03:00</option><option value="03:15">03:15</option><option value="03:30">03:30</option><option value="03:45">03:45</option><option value="04:00">04:00</option><option value="04:15">04:15</option><option value="04:30">04:30</option><option value="04:45">04:45</option><option value="05:00">05:00</option><option value="05:15">05:15</option><option value="05:30">05:30</option><option value="05:45">05:45</option><option value="06:00">06:00</option><option value="06:15">06:15</option><option value="06:30">06:30</option><option value="06:45">06:45</option><option value="07:00">07:00</option><option value="07:15">07:15</option><option value="07:30">07:30</option><option value="07:45">07:45</option><option value="08:00">08:00</option><option value="08:15">08:15</option><option value="08:30">08:30</option><option value="08:45">08:45</option><option value="09:00">09:00</option><option value="09:15">09:15</option><option value="09:30">09:30</option><option value="09:45">09:45</option><option value="10:00">10:00</option><option value="10:15">10:15</option><option value="10:30">10:30</option><option value="10:45">10:45</option><option value="11:00">11:00</option><option value="11:15">11:15</option><option value="11:30">11:30</option><option value="11:45">11:45</option><option value="12:00">12:00</option><option value="12:15">12:15</option><option value="12:30">12:30</option><option value="12:45">12:45</option><option value="13:00">13:00</option><option value="13:15">13:15</option><option value="13:30">13:30</option><option value="13:45">13:45</option><option value="14:00">14:00</option><option value="14:15">14:15</option><option value="14:30">14:30</option><option value="14:45">14:45</option><option value="15:00">15:00</option><option value="15:15">15:15</option><option value="15:30">15:30</option><option value="15:45">15:45</option><option value="16:00">16:00</option><option value="16:15">16:15</option><option value="16:30">16:30</option><option value="16:45">16:45</option><option value="17:00">17:00</option><option value="17:15">17:15</option><option value="17:30">17:30</option><option value="17:45">17:45</option><option value="18:00">18:00</option><option value="18:15">18:15</option><option value="18:30">18:30</option><option value="18:45">18:45</option><option value="19:00">19:00</option><option value="19:15">19:15</option><option value="19:30">19:30</option><option value="19:45">19:45</option><option value="20:00">20:00</option><option value="20:15">20:15</option><option value="20:30">20:30</option><option value="20:45">20:45</option><option value="21:00">21:00</option><option value="21:15">21:15</option><option value="21:30">21:30</option><option value="21:45">21:45</option><option value="22:00">22:00</option><option value="22:15">22:15</option><option value="22:30">22:30</option><option value="22:45">22:45</option><option value="23:00">23:00</option><option value="23:15">23:15</option><option value="23:30">23:30</option><option value="23:45" selected="selected">23:45</option></select>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label"></label>
            <div class="col-xs-9">
                <div class="checkbox">
                    <input id="snap_to_road" name="snap_to_road" type="checkbox" value="true">
                    <label>Snap to road</label>
                </div>
            </div>
        </div>

        <div class="input-group">
            <button class="btn btn-primary btn-block" type="button" onclick="app.history.get()">Show history</button>
            <span class="input-group-btn">
                <div class="btn-group dropdown">
                    <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon history-export"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:" onclick="app.history.export( 'gsr' )">Export to GSR</a></li>
                        <li><a href="javascript:" onclick="app.history.export( 'kml' )">Export to KML</a></li>
                        <li><a href="javascript:" onclick="app.history.export( 'gpx' )">Export to GPX</a></li>
                        <li><a href="javascript:" onclick="app.history.export( 'csv' )">Export to CSV</a></li>
                    </ul>
                </div>
                <button class="btn btn-default" type="button" onclick="app.history.clear()">
                    <i class="icon history-clean"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<div class="tab-pane-body">
    <div id="ajax-history"></div>
</div>    </div>
    <div class="tab-pane" id="alerts_tab">
        <div class="tab-pane-header">
    <div class="form">
        <div class="input-group">
            <div class="form-group search">
                <input class="form-control" id="alerts_search_field" placeholder="Search" autocomplete="off" name="search" type="text">
            </div>
            <span class="input-group-btn">
                            </span>
        </div>
    </div>
</div>

<div class="tab-pane-body" id="ajax-alerts"></div>    </div>

    <div class="tab-pane" id="geofencing_tab">
    <div class="tab-pane-header">
        <div class="form">
            <div class="input-group">
                <div class="form-group search">
                    <input class="form-control" placeholder="Search" autocomplete="off" name="search" type="text">
                </div>
                            </div>
        </div>
    </div>

    <div class="tab-pane-body">
        <div id="ajax-geofences"></div>
    </div>
</div>

<div class="tab-pane" id="geofencing_create">
    <div class="tab-pane-header">
        <div class="alert alert-info">
            Please draw a polygon on the map.
        </div>
    </div>

    <input name="polygon" type="hidden">
    <form method="POST" action="http://track.idealconectividade.com.br/geofences" accept-charset="UTF-8" class="form" id="geofence_create"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-body">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="group_id">Group:</label>
            <div class="input-group">
                <div class="geofence_groups_select_ajax">

                </div>
                <select class="form-control geofence_groups_select" id="group_id" name="group_id"><option value="0">Ungrouped</option></select>
                <span class="input-group-btn">
                    <a href="javascript:" class="btn btn-primary" data-url="http://track.idealconectividade.com.br/geofences_groups" data-modal="geofence_groups" title="Add group">
                        <i class="icon add"></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="polygon_color">Background color:</label>
            <input class="form-control colorpicker" name="polygon_color" type="text" value="#D000DF" id="polygon_color">
        </div>

        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.geofences.store();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('geofencing_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div>

<div class="tab-pane" id="geofencing_edit">
    <input name="polygon" type="hidden">
    <form method="POST" action="http://track.idealconectividade.com.br/geofences/%7Bgeofences%7D" accept-charset="UTF-8" id="geofence_update"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-body">

        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="group_id">Group:</label>
            <div class="input-group">
                <div class="geofence_groups_select_ajax">

                </div>
                <select class="form-control geofence_groups_select" id="group_id" name="group_id"><option value="0">Ungrouped</option></select>
                <span class="input-group-btn">
                    <a href="javascript:" class="btn btn-primary" data-url="http://track.idealconectividade.com.br/geofences_groups" data-modal="geofence_groups" title="Add group">
                        <i class="icon add"></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="polygon_color">Background color:</label>
            <input class="form-control colorpicker" name="polygon_color" type="text" value="#D000DF" id="polygon_color">
        </div>

        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.geofences.update();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('geofencing_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div>    <div class="tab-pane" id="routes_tab">
    <div class="tab-pane-header">
        <div class="form">
            <div class="input-group">
                <div class="form-group search">
                    <input class="form-control" placeholder="Search" autocomplete="off" name="search" type="text">
                </div><span class="input-group-btn">
                        <a href="javascript:" class="btn btn-primary" type="button" onClick="app.routes.create();">
                            <i class="icon add"></i>
                        </a>
                    </span>
                            </div>
        </div>
    </div>

    <div class="tab-pane-body">
        <div id="ajax-routes"></div>
    </div>
</div>

<div class="tab-pane" id="routes_create">
    <input name="polyline" type="hidden">
    <form method="POST" action="http://bus.idealconectividade.com.br/tracking/route_crud.php" accept-charset="UTF-8" id="route_create"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-body">

        <div class="alert alert-info">
            Please draw a route on the map.
        </div>

        <input name="id" type="hidden">

        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input class="form-control colorpicker" name="color" type="text" value="#1938FF" id="color">
        </div>

        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.routes.store();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('routes_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div>

<div class="tab-pane" id="routes_edit">
    <input name="polyline" type="hidden">
    <form method="POST" action="http://emdurdev.idealconectividade.com.br/tracking/route_crud.php" accept-charset="UTF-8" id="route_update"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-body">

        <div class="alert alert-info">
            Please draw a route on the map.
        </div>
        <input name="id" type="hidden">

        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input class="form-control colorpicker" name="color" type="text" value="#1938FF" id="color">
        </div>

        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.routes.update();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('routes_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div>    <div class="tab-pane" id="map_icons_tab">
    <div class="tab-pane-header">
        <div class="form">
            <div class="input-group">
                <div class="form-group search">
                    <input class="form-control" placeholder="Search" autocomplete="off" name="search" type="text">
                </div>
                            </div>
        </div>
    </div>

    <div class="tab-pane-body">
        <div id="ajax-map-icons"></div>
    </div>
</div>

<div class="tab-pane" id="map_icons_create">
    <form method="POST" action="http://track.idealconectividade.com.br/map_icons" accept-charset="UTF-8" id="map_icon_create"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-header">
        <div class="alert alert-info">
            Please click on the map to place the marker.
        </div>
        <input name="id" type="hidden">
        <input name="coordinates" type="hidden">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="3" name="description" cols="50" id="description"></textarea>
        </div>

        <label for="map_icon_idd">Marker icon:</label>
        <input name="map_icon_id" type="hidden">
    </div>
    <div class="tab-pane-body">
        <div class="icon-list">
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="1">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_155.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="2">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_137.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="3">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_31.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="4">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_135.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="5">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_48.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="6">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_205.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="7">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_139.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="8">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_198.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="9">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_159.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="10">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_72.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="11">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_197.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="12">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_121.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="13">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_30.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="14">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_33.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="15">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_44.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="16">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_100.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="17">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_136.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="18">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_47.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="19">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_221.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="20">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_120.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="21">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_218.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="22">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_217.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="23">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_143.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="24">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_141.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="25">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_87.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="26">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_158.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="27">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_43.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="28">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_46.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="29">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_203.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="30">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_68.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="31">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_86.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="32">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_114.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="33">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_65.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="34">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_178.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="35">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_73.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="36">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_201.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="37">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_163.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="38">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_90.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="39">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_134.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="40">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_142.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="41">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_74.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="42">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_180.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="43">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_03.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="44">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_182.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="45">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_13.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="46">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_200.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="47">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_07.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="48">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_53.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="49">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_96.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="50">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_113.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="51">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_206.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="52">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_94.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="53">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_140.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="54">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_223.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="55">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_183.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="56">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_196.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="57">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_122.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="58">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_91.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="59">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_115.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="60">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_199.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="61">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_112.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="62">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_49.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="63">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_11.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="64">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_99.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="65">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_67.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="66">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_32.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="67">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_185.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="68">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_42.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="69">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_204.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="70">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_92.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="71">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_09.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="72">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_176.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="73">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_70.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="74">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_219.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="75">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_17.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="76">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_34.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="77">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_181.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="78">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_179.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="79">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_28.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="80">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_15.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="81">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_156.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="82">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_154.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="83">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_138.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="84">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_224.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="85">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_160.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="86">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_75.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="87">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_161.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="88">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_157.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="89">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_184.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="90">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_162.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="91">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_51.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="92">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_117.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="93">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_116.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="94">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_101.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="95">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_174.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="96">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_45.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="97">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_93.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="98">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_69.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="99">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_98.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="100">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_119.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="101">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_220.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="102">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_71.png" alt="ICON"></label>
            </div>
                    <div class="checkbox-inline">
                <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="103">
                <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_05.png" alt="ICON"></label>
            </div>
                </div>
    </div>
    <div class="tab-pane-footer">
        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.mapIcons.store();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('map_icons_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div>

<div class="tab-pane" id="map_icons_edit">
    <form method="POST" action="http://track.idealconectividade.com.br/map_icons/%7Bmap_icons%7D" accept-charset="UTF-8" id="map_icon_update"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
    <div class="tab-pane-header">
        <input name="id" type="hidden">
        <input name="coordinates" type="hidden">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="3" name="description" cols="50" id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="map_icon_idd">Marker icon:</label>
            <input name="map_icon_id" type="hidden">
        </div>
    </div>

    <div class="tab-pane-body">
        <div class="icon-list">
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="1">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_155.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="2">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_137.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="3">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_31.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="4">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_135.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="5">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_48.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="6">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_205.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="7">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_139.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="8">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_198.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="9">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_159.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="10">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_72.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="11">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_197.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="12">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_121.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="13">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_30.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="14">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_33.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="15">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_44.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="16">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_100.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="17">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_136.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="18">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_47.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="19">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_221.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="20">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_120.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="21">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_218.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="22">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_217.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="23">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_143.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="24">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_141.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="25">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_87.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="26">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_158.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="27">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_43.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="28">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_46.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="29">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_203.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="30">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_68.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="31">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_86.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="32">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_114.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="33">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_65.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="34">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_178.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="35">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_73.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="36">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_201.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="37">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_163.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="38">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_90.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="39">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_134.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="40">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_142.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="41">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_74.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="42">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_180.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="43">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_03.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="44">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_182.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="45">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_13.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="46">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_200.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="47">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_07.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="48">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_53.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="49">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_96.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="50">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_113.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="51">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_206.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="52">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_94.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="53">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_140.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="54">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_223.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="55">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_183.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="56">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_196.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="57">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_122.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="58">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_91.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="59">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_115.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="60">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_199.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="61">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_112.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="62">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_49.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="63">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_11.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="64">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_99.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="65">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_67.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="66">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_32.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="67">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_185.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="68">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_42.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="69">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_204.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="70">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_92.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="71">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_09.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="72">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_176.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="73">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_70.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="74">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_219.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="75">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_17.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="76">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_34.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="77">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_181.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="78">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_179.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="79">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_28.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="80">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_15.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="81">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_156.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="82">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_154.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="83">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_138.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="84">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_224.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="85">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_160.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="86">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_75.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="87">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_161.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="88">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_157.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="89">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_184.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="90">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_162.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="91">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_51.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="92">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_117.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="93">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_116.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="94">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_101.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="95">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_174.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="96">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_45.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="97">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_93.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="98">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_69.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="99">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_98.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="100">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_119.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="101">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_220.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="102">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_71.png" alt="ICON"></label>
                </div>
                            <div class="checkbox-inline">
                    <input data-width="32" data-height="32" name="map_icon_id" type="radio" value="103">
                    <label><img src="http://track.idealconectividade.com.br/images/map_icons/POI_05.png" alt="ICON"></label>
                </div>
                    </div>
    </div>
    <div class="tab-pane-footer">
        <div class="buttons text-center">
            <a type="button" class="btn btn-action" href="javascript:" onClick="app.mapIcons.update();">Save</a>
            <a type="button" class="btn btn-default" href="javascript:" onClick="app.openTab('map_icons_tab');">Cancel</a>
        </div>
    </div>
    </form>
</div></div>
<div class="modal fade" id="checkObjectsFailed">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Failed to update devices data.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="app.check();" data-dismiss="modal">Try again</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
</div><div class="modal fade" id="deleteObject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p class="modal-title">Delete</p>
            </div>
            <div class="modal-body">
                Do you really want to delete this device?<br>All associated data with this device will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="deleteGeofence">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p class="modal-title">Delete</p>
            </div>
            <div class="modal-body">
                Do you really want to delete this geofence?<br>All associated data with this geofence will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="deleteRoute">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p class="modal-title">Delete</p>
            </div>
            <div class="modal-body">
                Do you really want to delete this route?<br>All associated data with this route will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="deleteAlert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p class="modal-title">Delete</p>
            </div>
            <div class="modal-body">
                Do you really want to delete this alert?<br>All associated data with this alert will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="deleteMapIcon">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p class="modal-title">Delete</p>
            </div>
            <div class="modal-body">
                Do you really want to delete this marker?<br>All associated data with this marker will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" onclick="" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="warning_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Warning</h4>
            </div>
            <div class="modal-body">
                <div class="content alert alert-warning"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-action" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="showPoint">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>×</span></button>
                <h4 class="modal-title"><i class="icon point"></i> Show point</h4>
            </div>

            <div class="modal-body">
            <form method="POST" action="http://track.idealconectividade.com.br/objects" accept-charset="UTF-8"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
                <div class="form-group">
                    <div class="radio">
                        <input checked="checked" name="cor_type" type="radio" value="1">
                        <label for="">Degrees, minutes, and seconds</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="radio">
                        <input name="cor_type" type="radio" value="2">
                        <label for="">Decimal degrees</label>
                    </div>
                </div>

                <div class="cor_type_1 row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input class="form-control" placeholder="Ex: 38:42:4.98" name="latitude" type="text" id="latitude">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input class="form-control" placeholder="Ex: -9:9:48.30" name="longitude" type="text" id="longitude">
                        </div>
                    </div>
                </div>
                <div class="cor_type_2 row" style="display: none;">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input class="form-control" placeholder="Ex: 38.701383" name="latitude" type="text" id="latitude">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input class="form-control" placeholder="Ex: -9.163417" name="longitude" type="text" id="longitude">
                        </div>
                    </div>
                </div>
            </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-action" data-dismiss="modal">Show</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

</script><div class="modal fade" id="showAddress">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>×</span></button>
                <h4 class="modal-title"><i class="icon address"></i> Show address</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger error" role="alert" style="display: none;"></div>

                <form method="POST" action="http://track.idealconectividade.com.br/objects/show_address" accept-charset="UTF-8"><input name="_token" type="hidden" value="rUT4VhBMLNnQylRtg00LfLyOZORhZsoAvk9IOItw">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input class="form-control" name="address" type="text" id="address">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="buttons">
                                            <button type="button" class="btn btn-action" onclick="app.showAddress();">Show</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<div id="mapWrap">
    <div id="map"></div>
    <div id="map-controls">
        <div>
            <div class="btn-group-vertical" role="group">
                <button type="button" class="btn" onclick="app.mapFull();">
                    <span class="icon map-expand"></span>
                </button>
            </div>
        </div>

        <div>
            <div class="btn-group-vertical" data-position="fixed" role="group">
                <button type="button" class="btn" onClick="$('.leaflet-control-layers').toggleClass('leaflet-control-layers-expanded');">
                    <span class="icon map-change"></span>
                </button>
            </div>
        </div>

        <div>
            <div class="btn-group-vertical" role="group">
                <button type="button" class="btn" onclick="app.zoomIn();"><span class="icon zoomIn"></span></button>
                <button type="button" class="btn" onclick="app.zoomOut();"><span class="icon zoomOut"></span></button>
            </div>
        </div>

        <div id="map-controls-layers">
            <div class="btn-group-vertical" role="group" data-toggle="buttons">
                <label class="btn">
                    <input id="clusterDevice" type="checkbox" autocomplete="off" onchange="app.changeSetting('clusterDevice', this.checked);">
                    <span class="icon group-devices"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Fit objects">
                    <input id="fitBounds" type="checkbox" autocomplete="off" onchange="app.devices.toggleFitBounds(this.checked);">
                    <span class="icon fitBounds"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Objects">
                    <input id="showDevice" type="checkbox" autocomplete="off" onchange="app.changeSetting('showDevice', this.checked);">
                    <span class="icon devices"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Geofences">
                    <input id="showGeofences" type="checkbox" autocomplete="off" onchange="app.changeSetting('showGeofences', this.checked);">
                    <span class="icon geofences"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Routes">
                    <input id="showRoutes" type="checkbox" autocomplete="off" onchange="app.changeSetting('showRoutes', this.checked);">
                    <span class="icon routes"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="POI">
                    <input id="showPoi" type="checkbox" autocomplete="off" onchange="app.changeSetting('showPoi', this.checked);">
                    <span class="icon poi"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Show names">
                    <input id="showNames" type="checkbox" autocomplete="off" onchange="app.changeSetting('showNames', this.checked);">
                    <span class="icon show-name"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Show tails">
                    <input id="showTail" type="checkbox" autocomplete="off" onchange="app.changeSetting('showTail', this.checked);">
                    <span class="icon show-tail"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Live traffic">
                    <input id="showTraffic" type="checkbox" autocomplete="off" onchange="app.changeSetting('showTraffic', this.checked);">
                    <span class="icon traffic"></span>
                </label>
            </div>
        </div>

        <div id="history-control-layers" style="display: none;">
            <div class="btn-group-vertical" role="group" data-toggle="buttons">
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Route">
                    <input id="showHistoryRoute" type="checkbox" autocomplete="off" onchange="app.changeSetting('showHistoryRoute', this.checked);">
                    <span class="icon routes"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Arrows">
                    <input id="showHistoryArrow" type="checkbox" autocomplete="off" onchange="app.changeSetting('showHistoryArrow', this.checked);">
                    <span class="icon device"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Stops">
                    <input id="showHistoryStop" type="checkbox" autocomplete="off" onchange="app.changeSetting('showHistoryStop', this.checked);">
                    <span class="icon parking"></span>
                </label>
                <label class="btn" data-toggle="tooltip" data-placement="left" title="Events">
                    <input id="showHistoryEvent" type="checkbox" autocomplete="off" onchange="app.changeSetting('showHistoryEvent', this.checked);">
                    <span class="icon event"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="small-custom-modal modal modal-sm fade" id="gps-device-modal" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="minimize-modal-container">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="small-modal-header">
                        <ul class="nav nav-tabs small-modal-nav" role="tablist">
                            <li role="presentation" class="title"></li>
                            <li data-toggle="tooltip" data-placement="top" title="Close"><a href="javascript:" data-dismiss="modal"><i class="fa fa-times fa-1"></i></a></li>
                            <li data-toggle="tooltip" data-placement="top" title="Parameters" role="presentation" class="active"><a href="#gps-device-parameters" aria-controls="gps-device-parameters" role="tab" data-toggle="tab"><i class="fa fa-bars fa-1"></i></a></li>
                            <li data-toggle="tooltip" data-placement="top" title="Google Street View" role="presentation"><a href="#gps-device-street-view" aria-controls="gps-device-street-view" role="tab" data-toggle="tab"><i class="fa fa-road fa-1"></i></a></li>
                                                    </ul>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="collapse-control">
                            <a href="#"></a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="gps-device-take-photo">
                            <div class="main-img-container">
                                <img class="small-img" alt="Street view" src="">
                            </div>
                            <div class="buttons">
                                <button class="btn btn-left btn-narrow" type="button" class="btn btn-narrow">Take photo</button>
                                <button class="btn btn-right btn-narrow" type="button" class="btn btn-narrow">Show galery</button>
                            </div>
                            <div class="checkbox checkbox-primary modal-input-group">
                                <input id="auto-take-photo" type="checkbox" checked>
                                <label class="checkbox-label" for="auto-take-photo">Take photo every <span class="auto-take-photo-time">1 hour</span></label>
                                <div class="dropdown custom-dropdown auto-take-photo-dropdown">
                              <span id="autoTakePhotoDropdownMenu" class="dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-cog"></i>
                              </span>
                                    <ul class="dropdown-menu" aria-labelledby="autoTakePhotoDropdownMenu">
                                        <div class="arrow-outer"></div>
                                        <div class="arrow-inner"></div>
                                        <li><a href="#">5 min</a></li>
                                        <li><a href="#">30 min</a></li>
                                        <li><a href="#">1 hour</a></li>
                                        <li><a href="#">24 hours</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="gps-device-street-view">
                            <div class="main-img-container">
                                <img class="small-img" alt="Street view" src="">
                            </div>
                            <div class="buttons buttons-right">
                                <button class="btn-enlarge btn btn-narrow" type="button" class="btn btn-narrow">Enlarge <i class="fa fa-expand fa-1"></i></button>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane active" id="gps-device-parameters">
                            <table class="info-table">
                                <tr class="main-params">
                                    <th>Address:</th>
                                    <td class="device_popup_address"><div class="spinner loading_xsmall"></div></td>
                                </tr>
                                <tr class="main-params">
                                    <th>Time:</th>
                                    <td class="position_time"></td>
                                </tr>
                                <tr class="main-params">
                                    <th>Stop duration:</th>
                                    <td class="device_popup_stoptime"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Position:</th>
                                    <td class="position"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Speed:</th>
                                    <td class="speed"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Altitude:</th>
                                    <td class="altitude"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Angle:</th>
                                    <td class="angle"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Driver:</th>
                                    <td class="driver"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Model:</th>
                                    <td class="model"></td>
                                </tr>
                                                                <tr class="side-params">
                                    <th>Plate:</th>
                                    <td class="plate"></td>
                                </tr>
                                <tr class="side-params">
                                    <th>Protocol:</th>
                                    <td class="protocol"></td>
                                </tr>
                                                                <tr>
                                    <td colspan="2" class="bottom-button">
                                        <button class="toggle-side-params btn btn-narrow" type="button" class="btn btn-narrow">Show more</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="enlarge-modal-container" style="display: none">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Google Street View</p>
                    <button class="btn-minimize btn btn-narrow" type="button" class="btn btn-narrow">Minimize <i class="fa fa-compress fa-1"></i></button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="main-img-container">
                            <img class="small-img" alt="Street view" src="">
                        </div>
                    </div>
                    <div class="info-text">
                        <p><strong>Object:</strong> <span class="title"></span></p>
                    </div>
                    <div class="info-text">
                        <p><strong>Address:</strong> <span class="device_popup_address"></span></p>
                    </div>
                    <div class="info-text">
                        <p><strong>Street view:</strong> <span class="device_popup_street_view"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><a class="ajax-popup-link hidden"></a>
<input id="upload_file" type="file" style="display: none;" onchange=""/>

<script>
    window.lang = {
        lang: 'en',
        select_all: 'Select all',
        deselect_all: 'Deselect All',
        close: 'Close',
        device: 'Device',
        address: 'Address',
        position: 'Position',
        altitude: 'Altitude',
        speed: 'Speed',
        angle: 'Angle',
        time: 'Time',
        h: 'h',
        m: 'm',
        model: 'Model',
        plate: 'Plate',
        protocol: 'Protocol',
        alerts_maximum_date_range: 'Maximum date range is 90 days.',
        successfully_created_alert: 'Successfully created alert',
        successfully_updated_alert: 'Successfully updated alert',
        geofence: 'Geofence',
        event: 'Event',
        successfully_created_geofence: 'Successfully created geofence',
        successfully_updated_geofence: 'Successfully updated geofence',
        came: 'Came',
        left: 'Left',
        duration: 'Duration',
        route_length: 'Route length',
        move_duration: 'Move duration',
        stop_duration: 'Stop duration',
        top_speed: 'Top speed',
        fuel_cons: 'Fuel cons.',
        parameters: 'Parameters',
        driver: 'Driver',
        street_view: 'Street view',
        preview: 'Preview',
        route_start: 'Route start',
        route_end: 'Route end',
        sensors: 'Sensors',
        successfully_created_route: 'Successfully created route',
        successfully_updated_route: 'Successfully updated route',
        gps: 'GPS',
        lat: 'Latitude',
        lng: 'Longitude',
        all_parameters: 'Show more',
        hide_parameters: 'Show less',
        nothing_selected: 'Nothing selected',
        color: 'Color',
        from: 'From',
        to: 'To',
        add: 'Add',
        follow: 'Follow',
        on: 'On ',
        off: 'Off',
        streetview: 'Google StreetView',
        successfully_created_marker: 'Successfully created marker',
        successfully_updated_marker: 'Successfully updated marker',
    };
</script>
<script src="http://bus.idealconectividade.com.br/tracking/core.js?v=3.1.0.13&<?php echo rand(); ?>" type="text/javascript"></script>
<script src="http://bus.idealconectividade.com.br/tracking/app.js?v=3.1.0.13asdf" type="text/javascript"></script>

<div id="bottombar">
    <div class="footer-table" id="bottom-history">
    <div class="bottom-history-header">
        <ul class="nav nav-tabs pull-right" role="tablist">
            <li role="presentation" class="active">
                <a href="#graph" class="btn btn-default btn-xs" aria-controls="graph" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-line-chart"></i> Graph
                </a>
            </li>
            <li role="presentation">
                <a href="#datalog" class="btn btn-default btn-xs" aria-controls="datalog" role="tab" data-toggle="tab" aria-expanded="true">
                    <i class="fa fa-reorder"></i> Data log
                </a>
            </li>
            <li role="presentation">
                <a href="javascript:" class="btn-close" onClick="app.history.graph.clear();"><i class="fa fa-times"></i></a>
            </li>
        </ul>

        <ul class="nav nav-tabs nav-default" id="graph_sensors"></ul>
    </div>


    <div class="collapse-control">
        <a href="javascript:"></a>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="graph">

            <div class="graph-controls">
                <ul class="nav nav-pills pull-left">
                    <li><a href="javascript:" class="btn btn-xs" onclick="app.history.player.play();"><i class="icon play"></i></a></li>
                    <li><a href="javascript:" class="btn btn-xs" onclick="app.history.player.pause();"><i class="icon pause"></i></a></li>
                    <li><a href="javascript:" class="btn btn-xs" onclick="app.history.player.stop();"><i class="icon stop"></i></a></li>
                    <li><select id="historySpeed" class="form-control" onchange="app.history.player.setSpeed( this.value );">
                            <option value="2000">x1</option>
                            <option value="1000">x2</option>
                            <option value="500">x3</option>
                            <option value="250">x4</option>
                            <option value="125">x5</option>
                            <option value="65">x6</option>
                        </select></li>
                </ul>

                <ul class="nav nav-pills pull-right">
                    <li id="hoverdata"></li>
                    <li id="hoverdata-date"></li>
                    <li>
                        <a href="javascript:" class="btn btn-xs" onClick="app.history.graph.zoomIn();"><i class="fa fa-search-plus"></i></a>
                    </li>
                    <li>
                        <a href="javascript:" class="btn btn-xs" onClick="app.history.graph.zoomOut();"><i class="fa fa-search-minus"></i></a>
                    </li>
                </ul>
            </div>

            <div class="graph-1-wrap">
                <div id="placeholder" class="graph-1"></div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="datalog">
            <div id="messages_tab">
                <div data-table></div>
            </div>
        </div>
    </div>
</div>

<script>
    tables.set_config('messages_tab', {
        url:'http://track.idealconectividade.com.br/history/positions',
        delete_url:'http://track.idealconectividade.com.br/history/delete_positions'
    });
</script>    <div id="widgets" style="display: none;">
    <a class="btn-collapse" onclick="app.changeSetting('toggleWidgets');"><i></i></a>

    <div class="widgets-content">
                    <div class="widget widget-device">
    <div class="widget-heading">
        <div class="widget-title">
            <div class="pull-right">
                <span data-device="status"></span> <span data-device="status-text"></span>
            </div>
            <i class="icon device"></i>
            <span data-device="name"></span>
        </div>
    </div>
    <div class="widget-body">
        <table class="table">
            <tbody>
            <tr>
                <td>Address:</td>
                <td>
                    <span class="pull-right p-relative"><span data-device="preview"></span></span>
                    <span data-device="address"></span>
                </td>
            </tr>
            <tr>
                <td>Time:</td>
                <td><span data-device="time"></span></td>
            </tr>
            <tr>
                <td>Stop duration:</td>
                <td><span data-device="stop_duration"></span></td>
            </tr>
            <tr>
                <td>Driver:</td>
                <td><span data-device="driver"></span></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>                    <div class="widget widget-sensors">
    <div class="widget-heading">
        <div class="widget-title"><i class="icon sensors"></i> Sensors</div>
    </div>
    <div class="widget-body">
        <table class="table" data-device="sensors"></table>

        <div class="widget-empty">
            <a href="javascript:" class="btn btn-default" data-url="" data-modal="sonsors_create" type="button">
                <i class="icon add"></i> Add sensor
            </a>
        </div>
    </div>
</div>                    <div class="widget widget-services">
    <div class="widget-heading">
        <div class="widget-title">
            <i class="icon tools"></i> Services
        </div>
    </div>
    <div class="widget-body">
        <table class="table" data-device="services"></table>

        <div class="widget-empty">
            <a href="javascript:" class="btn btn-default" data-url="" data-modal="services_create" type="button">
                <i class="icon add"></i> Add service
            </a>
        </div>
    </div>
</div>            </div>
</div>
</div>

<script type="text/javascript">
    var handlers = L.drawLocal.draw.handlers;
    handlers.polygon.tooltip.start = 'Click to start drawing shape';
    handlers.polygon.tooltip.cont = 'Click to continue drawing shape';
    handlers.polygon.tooltip.end = 'Click first point to close this shape';
    handlers.polyline.error = 'Shape edges cannot cross';
    handlers.polyline.tooltip.start = 'Click to start drawing line';
    handlers.polyline.tooltip.cont = 'Click to continue drawing line';
    handlers.polyline.tooltip.end = 'Click last point to finish line';
</script>

<script type="text/javascript">
    app.debug = false;
    app.version = '3.1.0.13';
    app.offlineTimeout = 300;
    app.checkFrequency = 5;
    app.show_object_info_after = 0;
    app.object_listview = 0;

    app.urls = {
        asset:                  'http://track.idealconectividade.com.br/',
        //check:                  'http://track.idealconectividade.com.br/objects/items_json',
        check:                  custom_url+'get_devices.php',
        streetView:             'http://track.idealconectividade.com.br/streetview.jpg',
        //geoAddress:             'http://track.idealconectividade.com.br/api/geo_address',
        geoAddress:             custom_url+'get_full_address.php',

        //events:                 'http://track.idealconectividade.com.br/events',
        events:                 custom_url+'get_events.php',

        history:                'http://track.idealconectividade.com.br/history',
        historyExport:          'http://track.idealconectividade.com.br/history/export',
        historyPositions:       'http://track.idealconectividade.com.br/history/positions',
        historyPositionsDelete: 'http://track.idealconectividade.com.br/history/delete_positions',

        //devices:                'http://track.idealconectividade.com.br/objects/items',
        devices:                custom_url+'get_check_list_device.php',
        deviceDelete:           'http://track.idealconectividade.com.br/objects/destroy/%7Bobjects%7D',
        deviceChangeActive:     'http://track.idealconectividade.com.br/devices/change_active',
        deviceToggleGroup:      'http://track.idealconectividade.com.br/objects/change_group_status',
        deviceStopTime:         custom_url+'stop_time.json',
        deviceFollow:           'http://track.idealconectividade.com.br/devices/follow_map/',
        devicesSensorCreate:    'http://track.idealconectividade.com.br/sensors/create/',
        devicesServiceCreate:   'http://track.idealconectividade.com.br/services/create/',
        devicesCommands:        'http://track.idealconectividade.com.br/devices/commands/',
        deviceImages:           'http://track.idealconectividade.com.br/devices/getImages/',
        deviceImage:            'http://track.idealconectividade.com.br/devices/getImage/',
        deleteImage:            'http://track.idealconectividade.com.br/devices/deleteImage/',

        //geofences:              'http://track.idealconectividade.com.br/geofences',
        geofences:              custom_url+'geofences.html',

        geofenceChangeActive:   'http://track.idealconectividade.com.br/geofences/change_active',
        geofenceDelete:         'http://track.idealconectividade.com.br/geofences/%7Bgeofences%7D',
        geofencesExportType:    'http://track.idealconectividade.com.br/geofences/export_type',
        geofencesImport:        'http://track.idealconectividade.com.br/geofences/import',
        geofenceToggleGroup:    'http://track.idealconectividade.com.br/geofences_groups/change_status',

        //routes:                 'http://track.idealconectividade.com.br/routes',
        routes:                  custom_url+'routes.php',

        routeChangeActive:      'http://track.idealconectividade.com.br/routes/change_active',
        routeDelete:            custom_url+'route_delete.php',

        //alerts:                 'http://track.idealconectividade.com.br/alerts',
        alerts:                  custom_url+'alert.html',
        alertChangeActive:      'http://track.idealconectividade.com.br/alerts/change_active',
        alertDelete:            'http://track.idealconectividade.com.br/alerts/%7Balerts%7D',
        alertGetEvents:         'http://track.idealconectividade.com.br/custom_events/get_events',
        alertGetProtocols:      'http://track.idealconectividade.com.br/custom_events/get_protocols',

        //mapIcons:               'http://track.idealconectividade.com.br/map_icons',
        mapIcons:               custom_url+'map_icon.html',

        mapIconsDelete:         'http://track.idealconectividade.com.br/map_icons/%7Bmap_icons%7D',
        mapIconsChangeActive:   'http://track.idealconectividade.com.br/map_icons/change_active',
        mapIconsList:           'http://track.idealconectividade.com.br/map_icons/list',

        changeMap:              'http://track.idealconectividade.com.br/my_account/change_map',
        changeMapSettings:      'http://track.idealconectividade.com.br/my_account_settings/change_map_settings',

        clearQueue:             'http://track.idealconectividade.com.br/sms_gateway/clear_queue',

        listView:               'http://track.idealconectividade.com.br/objects/list',
        listViewItems:          'http://track.idealconectividade.com.br/objects/list/items'
    };

    window.distance_unit_hour = 'kph';
    app.settings.weekStart = '1';
    app.settings.mapCenter = [parseFloat('-8.761160'), parseFloat('-63.900430')];
    app.settings.mapZoom = 19;
    app.settings.user_id = '7';
    app.settings.map_id = '2';
    app.settings.availableMaps = {"3":"3","1":"1","4":"4","2":"2"};
    app.settings.toggleSidebar  = false;
    app.settings.showDevice     = true;
    app.settings.showGeofences  = true;
    app.settings.showRoutes     = true;
    app.settings.showPoi        = true;
    app.settings.showTail       = true;
    app.settings.showNames      = true;
    app.settings.showTraffic    = false;
    app.settings.showHistoryRoute = false;
    app.settings.showHistoryArrow = true;
    app.settings.showHistoryStop  = true;
    app.settings.showHistoryEvent = true;
    app.settings.keys.google = 'AIzaSyDG5ZheVmnPJbn5t0hsEF8e8ZRG-k_X0Xc';
    app.settings.keys.here_map_id = '';
    app.settings.keys.here_map_code = '';
    </script>
<script type="text/javascript">
    $(window).on("load", function() {
        app.init();
    });
</script>
<style type="text/css"> #widgets { display: none !important;  }
#tools_dropdown { right: -155px !important;     left: -100px !important; }
#admin_li { display: none !important; }
#lang_li { display: none !important; }

 </style>
</body>
</html>

<script>
    function my_account_settings_edit_modal_callback(res) {
        if (res.status == 1)
            window.location.reload();
    }

    function devices_create_modal_callback(res) {
        if (res.status == 1) {
            app.notice.success('Successfully added device');
            app.devices.list();
        }
    }

    function devices_edit_modal_callback(res) {
        if (res.status == 1) {
            app.notice.success('Successfully updated device');

            if (typeof res.deleted != 'undefined') {
                app.devices.remove(res.id);

                $('.history-tab-form .devices_list option[value="' + res.id + '"]');
            }

            app.devices.list();
        }
    }

    function email_confirmation_edit_modal_callback(res) {
        if (res.status == 1) {
            app.notice.success('Successfully confirmed email');
            $('#email_confirmation').hide();
        }
    }

    function my_account_edit_modal_callback(res) {
    if (res.status == 1) {
        app.notice.success('Successfully updated profile');
            if (res.email_changed == 1) {
                 $('#email_confirmation').show();
                 $('#email_confirmation a').trigger('click');
            }
        }
    }

    function email_resend_code_modal_callback(res) {
        if (res.status == 1) {
            app.notice.success('Activation email sent');
        }
    }

    function events_do_destroy_modal_callback(res) {
        if (res.status == 1) {
            app.events.list();
        }
    }
</script>


<script>
    var custom_url = "http://bus.idealconectividade.com.br/tracking/";
    //window.objects_url = 'http://track.idealconectividade.com.br/objects/items';
    //custom_url+'get_check_list_device.php'
    window.objects_url = custom_url+'get_check_list_device.php',

    window.objects_stop_time = custom_url+'stop_time.json';

    //window.check_objects_url = 'http://track.idealconectividade.com.br/objects/items_json';
    window.check_objects_url = custom_url+'get_devices.php';

    window.delete_objects_url = 'http://track.idealconectividade.com.br/objects/destroy/%7Bobjects%7D';
    window.device_change_active = 'http://track.idealconectividade.com.br/devices/change_active';
    window.device_group_status_change_url = 'http://track.idealconectividade.com.br/objects/change_group_status';

    window.listview_url = 'http://track.idealconectividade.com.br/objects/list';
    window.listview_items_url = 'http://track.idealconectividade.com.br/objects/list/items';

    //window.geofences_url = 'http://track.idealconectividade.com.br/geofences';
    window.geofences_url = custom_url+'geofences.json';

    window.geofence_change_active = 'http://track.idealconectividade.com.br/geofences/change_active';
    window.geofence_delete_url = 'http://track.idealconectividade.com.br/geofences/%7Bgeofences%7D';

    //window.routes_url = 'http://track.idealconectividade.com.br/routes';
    window.routes_url = custom_url+'routes.php';

    window.route_change_active = 'http://track.idealconectividade.com.br/routes/change_active';
    window.route_delete_url = custom_url+'route_delete.php';

    //window.alerts_url = 'http://track.idealconectividade.com.br/alerts';
    window.alerts_url = custom_url+'alerts.json';

    window.alert_change_active = 'http://track.idealconectividade.com.br/alerts/change_active';
    window.alert_delete_url = 'http://track.idealconectividade.com.br/alerts/%7Balerts%7D';
    window.alert_get_events = 'http://track.idealconectividade.com.br/custom_events/get_events';
    window.alert_get_protocols = 'http://track.idealconectividade.com.br/custom_events/get_protocols';

    window.history_url = 'http://track.idealconectividade.com.br/history';
    window.history_positions_url = 'http://track.idealconectividade.com.br/history/positions';
    window.history_positions_delete_url = 'http://track.idealconectividade.com.br/history/delete_positions';
    window.history_export_url = 'http://track.idealconectividade.com.br/history/export';

    //window.events_url = 'http://track.idealconectividade.com.br/events';
    window.events_url = custom_url+'events.json';

    window.assets_url = 'http://track.idealconectividade.com.br/'

    //window.map_icons_url = 'http://track.idealconectividade.com.br/map_icons';
    window.map_icons_url = custom_url+'map_icons.html';

    window.map_icons_change_active = 'http://track.idealconectividade.com.br/map_icons/change_active';
    window.map_icons_delete_url = 'http://track.idealconectividade.com.br/map_icons/%7Bmap_icons%7D';
    window.map_icons_list = 'http://track.idealconectividade.com.br/map_icons/list';

    window.change_map_url = 'http://track.idealconectividade.com.br/my_account/change_map';
    window.change_map_settings_url = 'http://track.idealconectividade.com.br/my_account_settings/change_map_settings';

    //window.geo_address_url = 'http://track.idealconectividade.com.br/api/geo_address';
   window.geo_address_url = custom_url+'get_full_address.php',

    window.geofence_group_status_change_url = 'http://track.idealconectividade.com.br/geofences_groups/change_status';
    window.geofences_export_type_url = 'http://track.idealconectividade.com.br/geofences/export_type';
    window.geofences_import_url = 'http://track.idealconectividade.com.br/geofences/import';
    window.change_toolbar_top_status_url = 'http://track.idealconectividade.com.br/my_account_settings/change_top_toolbar';
    window.change_map_settings_url = 'http://track.idealconectividade.com.br/my_account_settings/change_map_settings';
</script>
