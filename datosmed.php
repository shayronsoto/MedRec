<?php
session_start();
$codigo= $_SESSION['codigo']; 
require('inc/conexion.php');




 ?>




<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>MedRec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header >
<!--Menu-->
<nav class="navbar navbar-inverse" role="navigation">
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
					<li><a href="datosmed.php">Mi Información</a></li>
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
</header>
<div class="col-md-12 col-xs-12">
	<div class="panel-warning">
		<div class="panel-heading">Informacion del medico</div>
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-sm-6">
					<div class="panel panel-warning">
						<div class="panel-heading">Datos</div>
						<div class="panel-body">
							<div class="table-responsive">
								<form action="">
								<table>
									<tr>
										<td>Codigo Medico</td>
										<td></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td>Nombre</td>
										<td></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td>Apellido</td>
										<td></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td width="160px">Correo Electronico</td>
										<td><input class="form-control" type="text"></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td>Telefono</td>
										<td><input class="form-control" type="text"></td>
									</tr>
								</table>
								<br>
								<button class="btn btn-warning"  id="guardar_datos">Guardar</button>
								</form>
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
				<div class="panel panel-warning" id="modal-edicion">
					<div class="panel-heading">Contraseña</div>
					<div class="panel-body">
						<div class="col-md-8 col-md-offset-2 col-xs-12">
						<form action="">
							<div class="input-group">
								<div class="input-group-addon">Contraseña Actual</div>
								<input class="form-control" type="password">
							</div>
							<br>
							<div class="input-group">
								<div class="input-group-addon">Nueva Contraseña</div>
								<input class="form-control" type="password">
							</div>
							<br>
							<div class="input-group">
								<div class="input-group-addon">Repite Contraseña</div>
								<input class="form-control" type="password">
							</div>
							<br>
							<button class="btn btn-warning" name="save_pass">Guardar</button>
						</form>
						</div>
						
					</div>
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
