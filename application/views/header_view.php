<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- jquery 3.1.1 -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
	<!-- plugin shjs [highlighter de código] -->
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/shjs/sh_main.min.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/shjs/sh_style.css')?>">
	<!-- Bootstrap 3 [tema] -->
	<?php 
	echo '<link rel="stylesheet" type="text/css" href="'.base_url('assets/bootstrap/'.$this->session->userdata('tema').'/bootstrap.css').'"  id="tema">';
	 ?>
	
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/bootstrap.min.js')?>"></script>
	<!-- Font awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fa/css/font-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/custom.css')?>">
	<title>Debugger</title>
</head>

	