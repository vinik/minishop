<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Event Horizon</title>
		
		<!-- CSS -->
		<link href="<?php echo base_url(); ?>css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/ie6.css" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/ie7.css" /><![endif]-->
		<link href="<?php echo base_url(); ?>css/custom-theme/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet" type="text/css" media="screen" />
		
		<!-- JavaScripts-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jNice.js"></script>
		
		<?php
		if (isset($src_script)) {
			if (is_array($src_script)) {
				foreach ($src_script as $src_item) {
					echo '<script type="text/javascript" src="' . base_url() . 'js/' . $src_item . '.js"></script>';
				}
			} else {
				echo '<script type="text/javascript" src="' . base_url() . 'js/' . $src_script . '.js"></script>';
			}
		}
		?>
		
		<?php
		if (isset($external_src_script)) {
			if (is_array($external_src_script)) {
				foreach ($external_src_script as $src_item) {
					echo '<script type="text/javascript" src="' . $src_item . '"></script>';
				}
			} else {
				echo '<script type="text/javascript" src="' . $external_src_script . '"></script>';
			}
		}
		?>
		
		<script type="text/javascript">

		var baseUrl = "<?php echo base_url(); ?>";
		var siteUrl = "<?php echo site_url(); ?>";

		$(document).ready(function(){
			<?php
			if (isset($js_script)) {
				if (is_array($js_script)) {
					foreach ($js_script as $js_item) {
						echo $js_item;
					}
				} else {
					echo $js_script;
				}
			}
			?>
		});

		</script>
		
	</head>