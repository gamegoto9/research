<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <title>Clean Zone</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
        <link href="<?PHP echo base_url('assets/lib/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?PHP echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/alertify.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/jquery.datatables/plugins/bootstrap/2/dataTables.bootstrap.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/jquery.upload/css/jquery.fileupload.css'); ?>">3
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.min.css'); ?>">


        





        <!--AngularJS-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/UI/angular-1.4.4/angular.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/UI/angular-1.4.4/angular-route.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/UI/angular-1.4.4/angular-animate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controller/controllers.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/app3.js'); ?>"></script>


        
        <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
        -->
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/jquery.nanoscroller/css/nanoscroller.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/bootstrap.switch/css/bootstrap3/bootstrap-switch.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/jquery.select2/select2.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/bootstrap.slider/css/bootstrap-slider.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/bootstrap.daterangepicker/daterangepicker-bs3.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/lib/jquery.icheck/skins/square/blue.css"'); ?>">
        <link href="<?PHP echo base_url('assets/css/style.css" rel="stylesheet'); ?>">
        




    </head>
    <?php
    $link = base_url('main/logIn');
    $username = $this->session->userdata('user');
    if ($username == "") {
        header("Refresh : 1;url = ".$link);
        echo "<center><h3>Please Login Wait 3 seconds </h3></center>";
        echo "</body></html>";
        exit;
    }
    ?>
    <body ng-app="myApp">