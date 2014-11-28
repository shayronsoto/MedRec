<?php 
	session_start();
	$codigo= $_SESSION['codigo'];
	require('inc/conexion.php');
	$exp=$_GET['exp'];

	$consulta="SELECT * FROM expediente WHERE no_expediente=$exp";
	$resultado=$mysqli->query($consulta);

	while ($fila=$resultado->fetch_assoc()) {
		$d_exp=$fila['no_expediente'];
		$d_fecha=$fila['fecha_registro'];
		$d_cedula=$fila['cedula'];
		$d_nombre=$fila['nombre'];
		$d_apellido1=$fila['primer_apellido'];
		$d_apellido2=$fila['segundo_apellido'];
		$fechanac=$fila['fecha_nacimiento'];

		$d=explode("-", $fechanac);
		$d_fechanac_dia=$d[2];
		$d_fechanac_mes=$d[1];
		$d_fechanac_ano=$d[0];
		$d_fechanac=$d_fechanac_dia."/".$d_fechanac_mes."/".$d_fechanac_ano;

		$d_lugar=$fila['lugar_nacimiento'];
		$d_sangre=$fila['sangre'];
		$d_sexo=$fila['sexo'];
		$d_estado=$fila['estado_civil'];
		$d_ocupacion=$fila['ocupacion'];
		$d_religion=$fila['religion'];
		$d_telefono=$fila['telefono'];
		$d_correo=$fila['correo'];
		$d_direccion=$fila['direccion'];

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


<div class="container">
	<h4 class="visible-xs">Visualización celulares</h4>
    <h4 class="visible-sm">Visualización tablets</h4>
    <h4 class="visible-md">Visualización laptop</h4>
    <h4 class="visible-lg">Visualización monitores grandes</h4>
<?php 
if ($d_nombre != ' ' and $d_apellido1 !=' ') {
	echo "<div class='alert alert-success' role='alert'> <strong> Bien hecho! </strong> los datos se han almacedao correctamente </div>" ;
}


?>
	
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 well">

			 <h1 class="text-center" > <small> Datos Generales </small></h1>
			 
			 <hr color="black" size="1" >
			<form class="form" action="inc/guardarpaciente.php" method="POST">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="btn-group btn-group-justified" >
						<div class="btn-group">
							<button type="submit" class="btn btn-success" name="guardar" disabled="disabled">Guardar</button>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-success" name="nuevo">Nuevo</button>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-success" href="" name="ver">Expediente</button>
						</div>

   					</div>
   					<hr>
					<br>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">Expediente</label>
									<input class="form-control" type="text" value="<?php echo $exp ?>" id="expediente" name="no_expediente" maxlength="9" readonly="readonly">
						        </div>
						    </div>
						    <div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">Fecha de registro</label>
									<input id="fecha" name="fecha" class="form-control" type="text" value="<?php echo gmdate("d/m/Y")?>" readonly="readonly">
						        </div>
						    </div>
						    <div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
						        	<label for="">N° Cedula</label>
									<input id="cedula" name="cedula" class="form-control" type="text" value="<?php echo $d_cedula;?>" maxlength="14" readonly="readonly">
						        </div>
						    </div>
							<div class="col-xs-12 col-sm-4 col-md-3">
						        <div class="input-group">
									<label for="">Nombre</label>
									<input class="form-control" id="nombre" name="nombre" type="text" maxlength="30" required="required" value="<?php echo $d_nombre;?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Primer Apellido</label>
									<input class="form-control" id="apellido1" name="apellido1" type="text" maxlength="20" value="<?php echo $d_apellido1?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Segundo Apellido</label>
									<input class="form-control" type="text" id="apellido2" name="apellido2" id="" maxlength="20" value="<?php echo $d_apellido2; ?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Fecha de Nacimiento</label>
									<input class="form-control" type="text" id="fecha_nac" name="fecha_nac" value="<?php echo $d_fechanac; ?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="input-group">
									<label for="">Lugar de Nacimiento</label>
									<input class="form-control" name="lugar" id="lugar" value="<?php echo $d_lugar;  ?>" readonly="readonly" >
										
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Tipo de Sangre</label>
									<input class="form-control" name="sangre" id="sangre" value="<?php echo $d_sangre; ?>" readonly="readonly">
										
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
										<label for="">Sexo</label>
										<input class="form-control" type="text" name="sexo" id="sexo" value="<?php echo $d_sexo; ?>" readonly="readonly">
										
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Estado Civil</label>
									<input class="form-control" name="estado" id="estado" value="<?php echo $d_estado; ?>" readonly="readonly">
										
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Ocupación</label>
									<input class="form-control" type="text" name="ocupacion" id="ocupacion" maxlength="50" value="<?php echo $d_ocupacion; ?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Religión</label>
									<input class="form-control" type="text" name="religion" id="religion" maxlength="30" value="<?php echo $d_religion; ?>" readonly="readonly">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div class="input-group">
									<label for="">Telefono</label>
									<input class="form-control" type="number" name="telefono" id="telefono" maxlength="8" value="<?php echo $d_telefono; ?>" readonly="readonly">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Correo Electronico</label>
									<input class="form-control" name="email" id="email" type="email" value="<?php echo $d_correo; ?>" readonly="readonly">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<label for="">Dirección</label>
									<textarea class="form-control" name="direccion" id="direccion" cols="30" rows="3" maxlength="200" readonly="readonly"><?php echo $d_direccion; ?></textarea>
								</div>	
							</div>

							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="input-group">
									<input class="form-control hidden" name="cod" id="cod"  value="<?php echo "$codigo"; ?> " maxlength="5">
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