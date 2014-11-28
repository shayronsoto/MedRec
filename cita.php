<?php
session_start();
$codigo= $_SESSION['codigo']; 
require('inc/conexion.php');
$exp=$_GET['exp'];



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
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
			<ul id="na" class="nav nav-pills nav-justified">
				<li ><a class="btn btn-warning navbar-btn active" href="datosgenerales.php?exp=<?php echo $exp; ?>">Datos Generales</a></li>
				<li ><a class="btn btn-warning navbar-btn" href="antecedentes.php?exp=<?php echo $exp; ?>">Antecedentes</a></li>
				<li ><a class="btn btn-warning navbar-btn" href="consulta.php?exp=<?php echo $exp; ?>">Consultas</a></li>
				<li ><a class="btn btn-warning navbar-btn " href="#">Estudios</a></li>
				<li ><a class="btn btn-warning navbar-btn " href="cita.php?exp=<?php echo $exp; ?>" >Citas</a></li>
			</ul>					
	</div>
</div>
<br>
<div class="col-sm-8 col-sm-offset-2">
<div class="panel panel-warning">
	<div class="panel-heading">Nueva Cita</div>
	<div class="panel-body">
		<div class="col-sm-12">
			<form action="">
				<table>
					<tr>
						<td>Paciente</td>
						<td></td>
					</tr>
					<tr>
						<td>Fecha</td>
						<td><input class="form-control" type="date" style="width:150px"></td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td>Hora</td>
						<td><input  class="form-control" type="time" style="width:120px"></td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td valign="top" width="120px">Motivo</td>
						<td width="200px"><textarea class="form-control" name="" id="" cols="70" rows="3" style="width:520px"></textarea></td>
					</tr>

				</table>
				<br>
				<button class="btn btn-warning" type="submit" name="gboton">Guardar</button>
			</form>
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
