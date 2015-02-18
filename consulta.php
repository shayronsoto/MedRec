<?php
session_start();
$codigo= $_SESSION['codigo']; 
require('inc/conexion.php');
$exp=$_GET['exp'];

$consulta1="SELECT * FROM ant_fam WHERE expediente_no_expediente ='$exp'";
$resultado1=$mysqli->query($consulta1);
while ($fila1=$resultado1->fetch_assoc()) {
	$mama=$fila1['madre'];
	$papa=$fila1['padre'];
	$abmama=$fila1['abuelos_maternos'];
	$abpapa=$fila1['abuelos_paternos'];
	$her=$fila1['hermanos'];
}


$consulta2="SELECT * FROM ant_nopat WHERE expediente_no_expediente ='$exp'";
$resultado2=$mysqli->query($consulta2);
while ($fila2=$resultado2->fetch_assoc()) {
	$nopat=$fila2['descripcion'];
}

$consulta3="SELECT * FROM expediente WHERE no_expediente='$exp'";
$resultado3=$mysqli->query($consulta3);
while ($fila3=$resultado3->fetch_assoc()) {
	$name=$fila3['nombre'];
	$ape=$fila3['primer_apellido'];
}

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
					<li ><a href="#" ><span class="glyphicon glyphicon-calendar"> </span> Agenda</a></li>
					<!--Fin de agenda-->
					
					<li role="presentation" class="divider"></li>
					
					<!--Dropdown de pacientes-->
					<li class="dropdown" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Paciente <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="pacientenuevo.php">Nuevo paciente</a></li>
							<li class="divider" role="presentation"></li>
							<li><a href="buscarpaciente.php">Buscar Paciente</a></li>
						</ul>
					</li>
					<!--Fin de Dropown paciente-->
					<li role="presentation" class="divider"></li>
					<li><a href="cita_pacientes.php"><span class="glyphicon glyphicon-edit"></span> Cita</a></li>
					<li role="presentation" class="divider"></li>

					<li class="dropdown">
					<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><span class="glyphicon glyphicon-list"> </span> Reportes <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Pacientes</a></li>
						<li class="divider" role="presentation"></li>
						<li><a href="#">Consultas</a></li>
						<li class="divider" role="presentation"></li>
						<li><a href="#">Citas</a></li>


					</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="inc/logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>
</nav>	
</header>
<div class="col-md-12 col-sm-12  col-xs-12">
<nav class="nav navbar-default">
	<form class="navbar-form">
		<a class="btn btn-warning " href="datosgenerales.php?exp=<?php echo $exp; ?>">Datos Generales</a>
		<a class="btn btn-warning " href="antecedentes.php?exp=<?php echo $exp; ?>">Antecedentes</a>
		<a class="btn btn-warning active" href="consulta.php?exp=<?php echo $exp; ?>">Consultas</a>
		<a class="btn btn-warning " href="#">Estudios</a>
		<a class="btn btn-warning " href="cita.php?exp=<?php echo $exp; ?>" >Citas</a>
	</form>
</nav>
<br>

</div>

<div class="col-md-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading">Expediente: <strong><?php echo "$exp"; ?></strong> Fecha: <strong><?php echo gmdate("d/m/Y") ?></strong> </div>
		<div class="panel-body">
		<div class="container-fluid">
		<form class="form" action="inc/guardarconsulta.php?id=<?php echo $exp; ?>" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-warning">
						<div class="panel-heading">Datos</div>
						<div class="panel-body">
							<div class="table-responsive">
								<p><strong>Antecedentes</strong></p>
								<p><strong>Padre (<?php echo $papa;?>). Madre(<?php echo $mama;?>). Abuelos paternos(<?php echo $abpapa;?>). Abuelos maternos(<?php echo $abmama;?>). Hermanos(<?php echo $her;?>). No patólogico(<?php echo $nopat ;?>). </strong></p>
								<table >
									<tr>
										<td width="160px">Paciente</td>
										<td><p><strong><?php echo $name;?></strong> <strong><?php echo $ape;?></strong></p></td>
									</tr>
									<tr>
										<td width="160px">Fecha</td>
										<td><p><strong><?php echo gmdate("d/m/Y"); ?></strong></p></td>
									</tr>
									<tr>
										<td width="160px">Hora</td>
										<td><p><strong><?php echo date("H:i:s"); ?></strong></p></td>
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
										<td width="150px" >Presión Arterial</td>
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
				<button type="submit" name="g_consulta" class="btn btn-warning">Guardar</button>
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