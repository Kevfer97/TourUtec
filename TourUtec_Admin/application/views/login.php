<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>TourUtec|Admin</title>
	 <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('TourUtec_Admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('TourUtec_Admin/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- AdminLTE App -->
<script src="<?php echo base_url('TourUtec_Admin/assets/dist/js/adminlte.min.js'); ?>"></script>
<style>
	.MainCont{
		height:auto;	
		width:90%;
		max-width:300px;
		margin-top: 50px;
	}
	body{
		background-color: #5D0A28;	
	}
	.Titulo{
		color:#fff;
		margin-bottom: 20px;
		transform: scale(1.5);
		font-weight:bold;	
	}
	.Titulo:hover{
		transform: scale(1.6);
		cursor: pointer;	

	}
	.onH:hover{
		transform: scale(1.1);
		cursor: pointer;
	}
</style>
</head>
<body>
<center>
<div class="MainCont">
	<h1 class="Titulo">Tour Utec</h1>
	<div class="panel panel-primary">

		<div class="panel-header">
			<h4 class="onH">Iniciar Sesion</h4>		
		</div>
		<div class="panel-body">
		<input type="text" placeholder="Usuario" class="form-control"></input><br>	
		<input type="password" placeholder="Contraseña" class="form-control"></input>	
		</div>
		<div class="panel-footer">
			<input type="submit" class="btn" value="Ingresar" name="Logu" />
		</div>
	</div>
</div>	
</center>


<!-- jQuery 3 -->
<script src="<?php echo base_url('TourUtec_Admin/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('TourUtec_Admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>