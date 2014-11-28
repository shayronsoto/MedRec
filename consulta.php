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
				<li ><a class="btn btn-warning navbar-btn" href="datosgenerales.php?exp=<?php echo $exp; ?>">Datos Generales</a></li>
				<li ><a class="btn btn-warning navbar-btn" href="antecedentes.php?exp=<?php echo $exp; ?>">Antecedentes</a></li>
				<li ><a class="btn btn-warning navbar-btn active" href="consulta.php?exp=<?php echo $exp; ?>">Consultas</a></li>
				<li ><a class="btn btn-warning navbar-btn " href="#">Estudios</a></li>
				<li ><a class="btn btn-warning navbar-btn " href="cita.php?exp=<?php echo $exp; ?>" >Citas</a></li>
			</ul>					
	</div>
</div>
<br>
<br>
<div class="col-lg-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading">Expediente: <strong><?php echo "$exp"; ?></strong> Fecha: <strong><?php echo gmdate("d/m/Y") ?></strong> </div>
		<div class="panel-body">
		<div class="container-fluid">
		<form class="form" action="" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-warning">
						<div class="panel-heading">Datos</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table >
									<tr>
										<td width="160px">Paciente</td>
										<td></td>
									</tr>
									<tr>
										<td width="160px">Fecha</td>
										<td></td>
									</tr>
									<tr>
										<td width="160px">Hora</td>
										<td></td>
									</tr>
									<tr>
										<td width="160px" valign="top">Motivo de la Consulta</td>
										<td width="400px"><textarea class="form-control" name="motivo" id="" cols="100" rows="5"></textarea></td>
									</tr>
										<td> <br></td>
									<tr>
										<td width="160px" valign="top">Padecimiento Actual</td>
										<td width="400px"><textarea class="form-control" name="padecimiento" id="" cols="100" rows="5"></textarea></td>
									</tr>
									</tr>
										<td> <br></td>
									<tr>
									<tr>
										<td width="160px" valign="top">Tratamiento</td>
										<td width="400px"><textarea class="form-control" name="tratamiento" id="" cols="100" rows="8"></textarea></td>
									</tr>
									</tr>
										<td> <br></td>
									<tr>
									<tr>
										<td width="160px" valign="top">Notas</td>
										<td width="400px"><textarea class="form-control" name="notas" id="" cols="100" rows="5"></textarea></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xm-12">
					<div class="panel panel-warning">
						<div class="panel-heading">Signos Vitales</div>
						<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
									<thead>
										<tr class="active">
											<th width="150px" align="center" style="text-align: center">Signo</th>
											<th width="200px" align="center" style="text-align: center">Valor</th>
											
											<th width="200px" align="center" style="text-align: center">Nota</th>
										</tr>
									</thead>
									<tr>
										<td width="150px" >Temperatura</td>
										<td width="200px" align="center"><input class="form-control" name="temp" type="text" style="width:150px; height:30px"></td>
										<td width="200px" align="center"><input class="form-control" name="temp_nota" type="text" style="width:150px; height:30px"></td>
									</tr>
									
									<tr>
										<td width="150px" >Frecuencia Cardiaca</td>
										<td width="200px" align="center"><input class="form-control" name="fc"  type="text" style="width:150px; height:30px"></td>
										<td width="200px" align="center"><input class="form-control" name="fc_nota" type="text" style="width:150px; height:30px"></td>
									</tr>
									
									<tr>
										<td width="150px" >Presion Arterial</td>
										<td width="200px" align="center"><input class="form-control" name="pa" type="text" style="width:150px; height:30px"></td>
										<td width="200px" align="center"><input class="form-control" name="pa_nota" type="text" style="width:150px; height:30px"></td>
									</tr>
									
									<tr>
										<td width="150px">Respiración</td>
										<td width="200px" align="center"><input class="form-control" name="resp" type="text" style="width:150px; height:30px"></td>
										<td width="200px" align="center"><input class="form-control" name="resp_nota" type="text" style="width:150px; height:30px"></td>
									</tr>
									
									<tr>
										<td width="150px">Peso</td>
										<td width="200px" align="center"><input class="form-control" name="peso" type="text" style="width:150px; height:30px"></td>
										<td width="200px" align="center"><input class="form-control" name="peso_nota" type="text" style="width:150px; height:30px"></td>
									</tr>

								</table>
						</div>
						</div>
					</div>
				</div>


				<div class="col-lg-6 col-xm-12">
					<div class="panel panel-warning">
						<div class="panel-heading">Examen Fisico</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr class="active">
											<th width="150px" align="center" style="text-align: center">Parte del Cuerpo</th>
											<th width="200px" align="center" style="text-align: center">Observación</th>
										</tr>
									</thead>
									<tr>
										<td width="150px" >Cabeza</td>
										<td width="200px" align="center"><input class="form-control" name="cabeza" type="text" style="width:350px; height:30px"></td>
										
									</tr>
									
									<tr>
										<td width="150px" >Cuello y Garganta</td>
										<td width="200px" align="center"><input class="form-control" name="cuello" type="text" style="width:350px; height:30px"></td>
									
									<tr>

									<tr>
										<td width="150px" >Abdomen</td>
										<td width="200px" align="center"><input class="form-control" name="abdomen" type="text" style="width:350px; height:30px"></td>
									
									<tr>
										<td width="150px" >Oido</td>
										<td width="200px" align="center"><input class="form-control" name="oido" type="text" style="width:350px; height:30px"></td>
										
									</tr>
									
									<tr>
										<td width="150px">Ojos</td>
										<td width="200px" align="center"><input class="form-control" name="ojos" type="text" style="width:350px; height:30px"></td>
										
									</tr>
									
									<tr>
										<td width="150px">Miembros Superiores</td>
										<td width="200px" align="center"><input class="form-control" name="msuperior" type="text" style="width:350px; height:30px"></td>
										
									</tr>

									<tr>
										<td width="150px">Miembros Inferiores</td>
										<td width="200px" align="center"><input class="form-control" name="minferior" type="text" style="width:350px; height:30px"></td>
										
									</tr>

								</table>
							</div>

						</div>
					</div>
				</div>


				
			</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-2 col-sm-offset-5">
				<button type="submit" class="btn btn-warning">Guardar</button>
			</div>
		</div>
			
		
			
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