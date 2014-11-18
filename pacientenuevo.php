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
			$var='14879';
			
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
	<h4 class="visible-xs">Visualización celulares</h4>
    <h4 class="visible-sm">Visualización tablets</h4>
    <h4 class="visible-md">Visualización laptop</h4>
    <h4 class="visible-lg">Visualización monitores grandes</h4>
	<div class="col-sm-6 col-sm-offset-3">
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
		<div class="col-sm-12 well">
			 <h1 class="text-center" > <small> Datos Generales </small></h1>
			 
			 <hr color="black" size="1" >
			<form class="form" action="" method="">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">Expediente</label>
									<input class="form-control" type="text" value="<?php echo "$var"; ?>" id="expediente" name?"expediente">
						        </div>
						    </div>
						    <div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">Fecha de registro</label>
									<input id="fecha" name="fecha" class="form-control" type="text" value="<?php echo gmdate("d/m/Y")?>">
						        </div>
						    </div>
						    <div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">N° Cedula</label>
									<input id="cedula" name="cedula" class="form-control" type="text" value="">
						        </div>
						    </div>
							<div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
									<label for="">Nombre</label>
									<input class="form-control" name="nombre" type="text">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Primer Apellido</label>
									<input class="form-control" name="apellido1" type="text">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Segundo Apellido</label>
									<input class="form-control" type="text" name="apellido2" id="">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Fecha de Nacimiento</label>
									<input class="form-control" type="date" name="fecha">
								</div>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="input-group">
									<label for="">Lugar de Nacimiento</label>
									<select class="form-control" name="lugar" id="lugar">
										<option class="form-control" value=""></option>
										<option class="form-control" value="nicaragua">Nicaragua</option>
										<option class="form-control" value="Costa Rica">Costa Rica</option>
										<option class="form-control" value="El salvador">El salvador</option>
										<option class="form-control" value="Hoduras">Honduras</option>
										<option class="form-control" value="Panama">Panama</option>
										<option class="form-control" value="Belice">Belice</option>
										<option class="form-control" value="Guatemala">Guatemala</option>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Tipo de Sangre</label>
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
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
										<label for="">Sexo</label>
										<select class="form-control" type="text" name="sexo" id="sexo">
										<option class="form-control" value=""></option>
										<option class="form-control" value="Maculino">Masculino</option>
										<option class="form-control" value="Femenino">Femenino</option>
										<option class="form-control" value="Indefinido">Indefinido</option>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Estado Civil</label>
									<select class="form-control" name="estado" id="estado">
										<option class="" value=""></option>
										<option class="form-control" value="Solter@">Solter@</option>
										<option class="form-control" value="Casad@">Casad@</option>
										<option class="form-control" value="Union libre">Union libre</option>
										<option class="form-control" value="Viud@">Viud@</option>
										<option class="form-control" value="oOro">Otro</option>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Ocupación</label>
									<input class="form-control" type="text" name="ocupacion" id="" maxlength="50">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Religión</label>
									<input class="form-control" type="text" name="religion" id="" maxlength="30">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Telefono</label>
									<input class="form-control" type="number" name="telefono" id="" maxlength="8">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Celular</label>
									<input class="form-control" type="number" name="celular" id="" maxlength="8">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Correo Electronico</label>
									<input class="form-control" name="email" type="email">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-2">
								<div class="input-group">
									<label for="">Departamento</label>
									<input class="form-control" type="text" name="departamento" maxlength="40">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-2">
								<div class="input-group">
									<label for="">Municipio</label>
									<input class="form-control" type="text" name="municipio" maxlength="50">
								</div>	
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Dirección</label>
									<textarea class="form-control" name="direccion" id="" cols="30" rows="3"></textarea>
								</div>	
							</div>
							<br>
							<br>
							<br>
						</div><!--Fin col-12-->
						

					</div><!--Fin row-->
				</div><!--Fin container-->
				
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