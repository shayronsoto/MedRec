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
		<a class="btn btn-warning active" href="datosgenerales.php?exp=<?php echo $exp; ?>">Datos Generales</a>
		<a class="btn btn-warning " href="antecedentes.php?exp=<?php echo $exp; ?>">Antecedentes</a>
		<a class="btn btn-warning " href="consulta.php?exp=<?php echo $exp; ?>">Consultas</a>
		<a class="btn btn-warning " href="#">Estudios</a>
		<a class="btn btn-warning " href="cita.php?exp=<?php echo $exp; ?>" >Citas</a>
	</form>
</nav>
<br>

</div>

<?php
$sql="SELECT * FROM expediente WHERE no_expediente=$exp";
$resultado=$mysqli->query($sql);
while ($fila=$resultado->fetch_assoc()) {
	$f_registro=$fila['fecha_registro'];
	$cedula=$fila['cedula'];
	$nombre=$fila['nombre'];
	$apellido1=$fila['primer_apellido'];
	$apellido2=$fila['segundo_apellido'];
	$fecha_nac=$fila['fecha_nacimiento'];
	$lugar_nac=$fila['lugar_nacimiento'];
	$sangre=$fila['sangre'];
	$sexo=$fila['sexo'];
	$estado=$fila['estado_civil'];
	$ocupacion=$fila['ocupacion'];
	$edad=$fila['edad'];
	$religion=$fila['religion'];
	$telefono=$fila['telefono'];
	$correo=$fila['correo'];
	$direccion=$fila['direccion'];

	$f=explode("-", $f_registro);
	$r_dia=$f[2];
	$r_mes=$f[1];
	$r_ano=$f[0];
	$fecha_r=$r_dia."/".$r_mes."/".$r_ano;
	


	$nac=explode("-",$fecha_nac);
	$n_dia=$f[2];
	$n_mes=$f[1];
	$n_ano=$f[0];
	$fecha_n=$n_dia."/".$n_mes."/".$n_ano;
	


}

?>

<div class="col-sm-12 col-xs-12">
<div class="panel panel-warning">
	<div class="panel-heading">Expediente: <?php echo "$exp"; ?></div>
	<div class="panel-body">	
		
		<div class="col-sm-4 col-xs-12">
			<div class="panel panel-warning">
				<div class="panel-heading">Datos Generales</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table-hover">
						<tbody>
							<tr class="warning">
								<td  width="180px">Fecha de Registro: </td>
								<td><strong><?php echo $fecha_r ?></strong></td>
							</tr>
							<tr  class="warning">
								<td width="180px">Cedula: </td>
								<td> <strong> <?php echo $cedula; ?></strong> </td>
							</tr>
							<tr class="warning">
								<td  width="180px">Nombre: </td>
								<td><strong><?php echo $nombre; ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Primer Apellido: </td>
								<td><strong><?php echo $apellido1; ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Segundo Apellido: </td>
								<td><strong><?php echo $apellido2; ?></strong>	</td>
							</tr>
							<tr class="warning" >
								<td width="180px">Fecha de Nacimiento: </td>
								<td><strong><?php echo $fecha_n; ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td width="180px">Nacionalidad: </td>
								<td></td>
							</tr>
							<tr class="warning">
								<td width="180px">Lugar de Nacimiento: </td>
								<td><strong><?php echo $lugar_nac; ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Direccion: </td>
								<td><strong><?php echo $direccion; ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Edad: </td>
								<td><strong><?php echo $edad ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Tipo de Sangre: </td>
								<td><strong><?php echo $sangre ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Sexo: </td>
								<td><strong><?php echo $sexo; ?></strong>	</td>
							</tr>
							
							<tr class="warning">
								<td  width="180px">Estado Civil: </td>
								<td><strong><?php echo $estado ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Ocupación: </td>
								<td><strong><?php echo $ocupacion ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Religion: </td>
								<td><strong><?php echo $religion ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Telefono: </td>
								<td><strong><?php echo $telefono ?></strong>	</td>
							</tr>
							<tr class="warning">
								<td  width="180px">Correo Electronico: </td>
								<td ><strong><?php echo $correo ?></strong> </td>
							</tr>
							

						</tbody>
					</table>
				</div>
					
				</div>
			</div>
		</div>
		<div class="col-sm-8 col-xs-12">
			<div class="panel panel-warning">
				<div class="panel-heading">Historia Clinica de la enfermedad actual</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class=" table table-hover">
						<thead>
							<th>Id</th>
							<th>Fecha</th>
							<th>Motivo</th>
							<th>Diagnostico</th>
							<th>Tratamiento</th>
							<th>Reporte</th>
						</thead>

						<tbody>
						<?php 
							$pa="SELECT * FROM hc_enf_actual WHERE expediente_no_expediente='$exp'";
							$cn=$mysqli->query($pa);
							while ($file=$cn->fetch_assoc()) {
							?>
								<tr>
									<td><?php echo $file['id_hc']; ?></td>
									<td><?php echo $file['fecha']; ?></td>
									<td><?php echo $file['motivo']; ?></td>
									<td><?php echo $file['diagnostico']; ?></td>
									<td><?php echo $file['tratamiento']; ?></td>
									<td><a class="btn btn-warning" href="report_trat.php?exp=<?php echo $exp;?>&id=<?php echo $file['id_hc'];?>" title="Tratamiento"><span class="glyphicon glyphicon-file"></span></a> <button class="btn btn-warning" title="Historia Clinica"><span class="glyphicon glyphicon-list-alt"></span></button></td>
								</tr>
							<?php }


						?>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>

	</div>
</div>	
</div>
		
	



<div class="container">
	<div class="row">
		
	</div>
</div>







<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/dataTables.min.js"></script>	
</body>
</html>