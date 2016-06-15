<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>
        <!--Meta Web-->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
        <title><?php echo $title; ?></title>
        
        <!--Link All CSS-->
        <link type="image/ico" rel="icon" href="<?php echo base_url('assets/images/favicon.jpg'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.3.2/css/bootstrap.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker/css/datepicker.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome-4.3.0/css/font-awesome.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/ionicons-2.0.1/css/ionicons.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/adminLTE/css/AdminLTE.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/adminLTE/skins/skin-blue.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/custom/css/main.css'); ?>" />

        <!--JS html5shiv and respond for IE9-->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/js/html5shiv/html5shiv.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/respond/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
  
    <body class="hold-transition skin-blue sidebar-mini">
        <noscript>
            <p class="noscript">Javascript pada browser Anda tidak diaktifkan. Silakan mengaktifkan Javascript.</p>
        </noscript>
        <div class="wrapper">
            <!--HEADER-->
            <?php $this->load->view('admin/master/Part_header_view'); ?>
            
            <!--SIDE MENU-->
            <?php $this->load->view('admin/master/Part_side_menu_view'); ?>

            <!--CONTENT DYNAMIC-->
            <?php $this->load->view('admin/modul/'.$content_view_location); ?>

            <!--FOOTER-->
            <?php $this->load->view('admin/master/Part_footer_view'); ?>
        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->
        <script src="<?php echo base_url('assets/js/jquery/jQuery-2.2.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/css/bootstrap-3.3.2/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/css/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/adminLTE/app.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/custom/simblcc.js'); ?>"></script>
    </body>
</html>