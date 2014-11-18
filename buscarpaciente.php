<?php 
	session_start();
	$codigo= $_SESSION['codigo'];
	require('inc/conexion.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Medrec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/dataTables.min.css" rel="stylesheet">
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="text col-sm-6 ">
				<img class="hidden-xs" class="img-responsive" src="img/logo.png" alt="">
					<h3 class="texto">MedRec</h3>
					<h5 class="texto">Medical Record</h5>
				</div>
			</div>
		</div>
	</div>
</header>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
			<!--Menu deplegable-->
			<div class="navbar-header">
				<!--Nombre del usuario-->
				<a href="" class="navbar-brand" class="dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user"></span>
					<?php 
						echo " "." ".$_SESSION['nombre'];
					?>
					<span class="caret"></span>
				</a>
				<!--Menu desplegable para el icono del usuario-->
				<ul class="dropdown-menu" role="menu">
					<li><a href="">Mi Información</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="inc/logout.php">Cerrar Sesión</a></li>
				</ul>
				<!--Fin del menu deplegable-->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!--Fin del menu-->
			<!--menu bar-->
			<div class="collapse navbar-collapse" id="menu" >
				<ul class="nav navbar-nav" >
					<!--agenda-->
					<li ><a href="#" >Agenda </a></li>
					<!--Fin de agenda-->
					
					<li role="presentation" class="divider"></li>
					
					<!--Dropdown de pacientes-->
					<li class="dropdown" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Paciente <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="pacientenuevo.php">Nuevo paciente</a></li>
							<li class="divider" role="presentation"></li>
							<li><a href="buscarpaciente.php">Buscar Paciente</a></li>
						</ul>
					</li>
					<!--Fin de Dropown paciente-->

					<li role="presentation" class="divider"></li>

					<li class="dropdown">
					<a href="#" class="dropdown-toggle"  data-toggle="dropdown">Reportes <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Pacientes</a></li>
						<li class="divider" role="presentation"></li>
						<li><a href="#">Consultas</a></li>
						<li class="divider" role="presentation"></li>
						<li><a href="#">Citas</a></li>


					</ul>
					</li>
				</ul>
			</div>
		</div>
	
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 well">
			<h4 class="text-center">Buscar paciente registrados</h4>
			<hr>
			<p>Buscar por el Nombre y el Primer Apellido del paciente </p>
			<br>


			<div class="container">
			<div class="row">
					<div class="col-sm-10 col-sm-offset-3">
						<div class="col-md-4 col-sm-6">
							<div class="input-group">
								<div class="input-group-addon">Nombre</div>
								<input class="form-control" name="nombre" type="text">
								
							</div>
							<br>
							<div class="input-group">
								<div class="input-group-addon">Apellido</div>
								<input class="form-control" name="apellido" type="text">
							</div>
						</div>
						
						<div class="col-sm-2">
							<button class="btn btn-primary"  name="bnombre">Buscar</button>
						</div>
					</div>
					</div>
			</dv>

			<divi class="container">
			<hr>
				<p>Buscar al paciente por el numero de Cedula</p>
				<div class="col-sm-10 col-sm-offset-3">
					<div class="col-md-4 col-sm-6">
						<div class="input-group">
						<div class="input-group-addon">Cedula</div>
						<input class="form-control" name="expediente" type="number">
						</div>
					</div>
					<div class="col-sm-2 ">
						<button class="btn btn-primary" name="bexp">Buscar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/dataTables.min.js"></script>	
</body>
</html>