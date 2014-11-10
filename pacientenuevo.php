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
	<div class="col-sm-3">
		<h5> Fecha: <?php echo gmdate( "d/m/Y" ); ?></h5>
	</div>
	<div class="col-sm-6">
		<div class="btn-group btn-group-justified" >
			<div class="btn-group">
				<button type="submit" class="btn btn-success">Guardar</button>
			</div>
			<div class="btn-group">
				<button type="submit" class="btn btn-success">Nuevo</button>
			</div>
			<div class="btn-group">
				<button type="submit" class="btn btn-success">Expediente</button>
			</div>
	
   		</div>
	</div>
	
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			 <h5>Datos Generales</h5>
			 <hr color="green" size="3" >
			<form class="form" action="" method="">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-3">
						        <div class="input-group">
									<label for="">Nombre</label>
									<input class="form-control" name="nombre" type="text">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<label for="">Primer Apellido</label>
									<input class="form-control" name="apellido1" type="text">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<label for="">Segundo Apellido</label>
									<input class="form-control" type="text" name="apellido2" id="">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<label for="">Fecha de Nacimiento</label>
									<input class="form-control" type="date" name="fecha">
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="container">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-1">
							<div class="input-group">
								
								<label for="">Tipo de Sangre</label>
								<select class="form-control" name="sangre" id="">
									<option class="form-control" value=""></option>
									<option class="form-control" value="ab+">AB+</option>
									<option class="form-control" value="ab-">AB-</option>
									<option class="form-control" value="a+">A+</option>
									<option class="form-control" value="a-">A-</option>
									<option class="form-control" value="b+">B+</option>
									<option class="form-control" value="b-">B-</option>
									<option class="form-control" value="o+">O+</option>
									<option class="form-control" value="o-">O-</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="input-group">
								<label for="">Estado Civil</label>
								<select class="form-control" name="estado" id="">
									<option class="" value=""></option>
									<option class="form-control" value="solter@">Solter@</option>
									<option class="form-control" value="casad@">Casad@</option>
									<option class="form-control" value="union libre">Union libre</option>
									<option class="form-control" value="viud@">Viud@</option>
									<option class="form-control" value="otro">Otro</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="input-group">
								<label for="">Nacionalidad</label>
								<select class="form-control" name="lugar" id="">
									<option class="form-control" value=""></option>
									<option class="form-control" value="nicaragua">Nicaragua</option>
									<option class="form-control" value="costa rica">Costa Rica</option>
									<option class="form-control" value="el salvador">El salvador</option>
									<option class="form-control" value="hoduras">Honduras</option>
									<option class="form-control" value="panama">Panama</option>
									<option class="form-control" value="belice">Belice</option>
									<option class="form-control" value="guatemala">Guatemala</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="input-group">
									<label for="">Sexo</label>
									<select class="form-control" type="text" name="sexo" id="">
									<option class="form-control" value=""></option>
									<option class="form-control" value="maculino">Masculino</option>
									<option class="form-control" value="femenino">Femenino</option>
									<option class="form-control" value="indefinido">Indefinido</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="input-group">
								<label for="">Telefono</label>
								<input class="form-control" type="number" name="telefono" id="" maxlength="8">
							</div>
						</div>
						<div class="col-sm-2">
							
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="container">
					<div class="col-sm-3">
						<div class="input-group">
							<label for="">Correo Electronico</label>
							<input class="form-control" name="email" type="email">
						</div>
					</div>
					<div class="col-sm-3">
						<label for="">Nombre de madre o padre</label>
						<input class="form-control" name="tutor" type="text" maxlength="50">
					</div>
					<div class="col-sm-3">
						<label for="">Telefono del tutor</label>
						<input class="form-control" type="text" name="telftut" id="" maxlength="8">
					</div>
				</div>
				<br>
				<br>
				<h5>Dirección</h5>
				<hr>
				<div class="container">
					<div class="col-sm-3">
						<div class="input-group">
								<label for="">Departamento</label>
								<input class="form-control" type="text" name="departemento" maxlength="40">
							</div>
					</div>
					<div class="col-sm-3">
						<label for="">Municipio</label>
						<input class="form-control" type="text" name="municipio" maxlength="50">
					</div>
					<div class="col-sm-3">
						<label for="">Barrio</label>
						<input class="form-control" type="text" name="telefono" id="" maxlength="8">
					</div>
				</div>
				<br>
				<br>


				
				
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