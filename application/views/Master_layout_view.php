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
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/js/jquery-countdown/jquery.countdown.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/custom/css/main.css'); ?>" />

        <!--JS html5shiv and respond for IE9-->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/js/html5shiv/html5shiv.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/respond/respond.min.js'); ?>"></script>
        <![endif]-->
	</head>

	<body>
		<noscript>
			<p class="noscript">Javascript pada browser Anda tidak diaktifkan. Silakan mengaktifkan Javascript.</p>
		</noscript>
		<div class="container">
			<div class="panel panel-default">
				<!--Header-->
				<div class="panel-heading">
					<header>
						<h1><?php echo $header; ?></h1>
						<p><?php echo $mini_header; ?></p>
					</header>
				</div>

				<!--Menu Navigasi-->
				<?php $this->load->view('Part_nav_view'); ?>

				<!--Dynamic Content-->
				<div class="panel-body">
					<?php $this->load->view($content_view_location); ?>
				</div>

				<!--Footer-->
				<div class="panel-footer">
					<footer>
						<?php echo $footer; ?>
					</footer>
				</div>
			</div>
		</div>

		<!-- REQUIRED JS SCRIPTS -->
        <script src="<?php echo base_url('assets/js/jquery/jQuery-2.2.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/css/bootstrap-3.3.2/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/css/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-countdown/jquery.plugin.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-countdown/jquery.countdown.js'); ?>"></script>        
        <script src="<?php echo base_url('assets/js/custom/simblcc.js'); ?>"></script>
	</body>
</html>