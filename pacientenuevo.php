<?php 
	session_start();
	$codigo= $_SESSION['codigo'];
	require('inc/conexion.php');
	$consulta="SELECT count(no_expediente), max(no_expediente) FROM expediente";
	$resultado=$mysqli->query($consulta);
	while ($resul=mysqli_fetch_array($resultado))
	{
		
		$count=$resul['0'];
		$max=$resul['1'];

		if ($count=='0') {
			$var='12872';
			
		}
		else
		{
			$var=$max+'00001';
		}
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Medrec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/dataTables.min.css" rel="stylesheet">
</head>
<body>
<header>
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


<div class="col-sm-12">
	<div class="panel-warning">
		<div class="panel-heading">Nuevo Paciente</div>
		<br>
		<div class="panel-body">

			<form class="form" action="inc/guardarpaciente.php" method="POST">
				


				<div class="col-sm-6 col-sm-offset-3">
					<div class="btn-group btn-group-justified" >
						<div class="btn-group">
							<button type="submit" class="btn btn-warning" name="guardar">Guardar</button>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-warning" name="nuevo" disabled="disabled">Nuevo</button>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-warning" href="" name="ver" disabled="disabled">Expediente</button>
						</div>
		
   					</div>
   					<br>
					
				</div>

	

				<div class="container">
					<div class="col-md-5 col-md-offset-1">
						<div class="input-group">
							<div class="input-group-addon">Expediente</div>
							<input class="form-control" type="text" value="<?php echo "$var"; ?>" id="expediente" name="no_expediente" maxlength="9" readonly="readonly">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Fecha de Registro</div>
							<input id="fecha" name="fecha" class="form-control" type="text" value="<?php echo gmdate("d/m/Y")?>" readonly="readonly">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">N° Cedula</div>
							<input id="cedula" name="cedula" class="form-control" type="text" value="" maxlength="14" >
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Nombre</div>
							<input class="form-control" id="nombre" name="nombre" type="text" maxlength="30" required="required">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Primer Apellido</div>
							<input class="form-control" id="apellido1" name="apellido1" type="text" maxlength="20" required="required">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Segundo Apellido</div>
							<input class="form-control" type="text" id="apellido2" name="apellido2"  maxlength="20">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Fecha de Nacimiento</div>
							<input class="form-control" type="date" id="fecha_nac" name="fecha_nac" required="required">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Telefono</div>
							<input class="form-control" type="number" name="telefono" id="telefono" maxlength="8" required="required">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Correo Electronico</div>
							<input class="form-control" name="email" id="email" type="email">
						</div>
						<br>
					</div>



					<div class="col-md-5 col-md-offset-1">
						<div class="input-group">
							<div class="input-group-addon">Lugar de Nacimiento</div>
							<input class="form-control" type="text" value="">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Tipo de Sangre</div>
							<select class="form-control" name="sangre" id="sangre">
									<option class="form-control" value=""></option>
									<option class="form-control" value="AB+">AB+</option>
									<option class="form-control" value="AB-">AB-</option>
									<option class="form-control" value="A+">A+</option>
									<option class="form-control" value="A-">A-</option>
									<option class="form-control" value="B+">B+</option>
									<option class="form-control" value="B-">B-</option>
									<option class="form-control" value="O+">O+</option>
									<option class="form-control" value="O-">O-</option>
								</select>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Sexo</div>
							<select class="form-control" type="text" name="sexo" id="sexo">
								<option class="form-control" value=""></option>
								<option class="form-control" value="Maculino">Masculino</option>
								<option class="form-control" value="Femenino">Femenino</option>
								<option class="form-control" value="Indefinido">Indefinido</option>
							</select>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Estado Civil</div>
							<select class="form-control" name="estado" id="estado">
								<option class="" value=""></option>
								<option class="form-control" value="Solter@">Solter@</option>
								<option class="form-control" value="Casad@">Casad@</option>
								<option class="form-control" value="Union libre">Union libre</option>
								<option class="form-control" value="Viud@">Viud@</option>
								<option class="form-control" value="otro">Otro</option>
							</select>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Ocupación</div>
							<input class="form-control" type="text" name="ocupacion" id="ocupacion" maxlength="50">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Religion</div>
							<input class="form-control" type="text" name="religion" id="religion" maxlength="30">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Dirección</div>
							<textarea class="form-control" name="direccion" id="direccion" cols="30" rows="3" maxlength="200"></textarea>						
						</div>
						
						<input class="form-control hidden" name="cod" id="cod"  value="<?php echo "$codigo"; ?> " maxlength="5">
						
						<br>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>				




<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/dataTables.min.js"></script>	
</body>
</html>