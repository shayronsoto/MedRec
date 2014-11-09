<?php 
	session_start();
	$codigo= $_SESSION['codigo'];
	require('inc/conexion.php');
	

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MedRec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/dataTables.min.css" rel="stylesheet">	
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>-->
</head>
<body>
<header style="heigth=100px">
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

<!-- menu-->
<nav class="navbar navbar-default" role="navigation" >
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
							<li><a href="#">Buscar Paciente</a></li>
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
	<!--Fin del Menu-->

<div class="container">
	<div class="col-sm-4">
		<div class="row">
			<button class="btn btn-primary">Ingresar Nuevo</button>
		</div>
	</div>

	<!--Tabla reponsiva para listar expedientes-->
	<div class="col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading">Expedientes</div>

				<div class="panel-body">
					<div class="table-responsive">
						
						<!--inicio de tabla-->
						<table class="table table-bordered ">
							<thead>
								<tr>
								<th>N°</th>
								<th>1er Apellido</th>
								<th>2do Apellido</th>
								<th>1er Nombre</th>
								<th>2do Nombre</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$consulta="SELECT * FROM expediente WHERE cod_medico='$codigo'";
						$resultado=$mysqli->query($consulta); 
						while ($fila=$resultado->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $fila['no_expediente']; ?></td>
								<td><?php echo $fila['primer_apellido']; ?></td>
								<td><?php echo $fila['segundo_apellido']; ?></td>
								<td><?php echo $fila['primer_nombre']; ?></td>
								<td><?php echo $fila['segundo_nombre']; ?></td>
								<td><a class="btn btn-primary" title="Modificar" href="#modal-ex" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn btn-primary" title="Eliminar" href=""><span class="glyphicon glyphicon-remove"></span></a> <a class="btn btn-primary" title="Ver" href=""><span class="glyphicon glyphicon-search"></span></a></td>
							</tr>

							<!--Ventana emergente o ventana modal para modificar los datos-->
							<div class="modal"id="modal-ex" >
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">Modificar el expediente</div>
										<div class="modal-body">
											<form action="">
											<div class="col-sm-12">
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">Expediente</div>
														<input class="form-control"  type="text" name="expediente" id="">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">Cedula</div>
														<input class="form-control" type="text" name="cedula">
													</div>
												</div>
											</div>
											<br>
											<br>
											<div class="col-sm-12">
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">1er Nombre</div>
														<input class="form-control" type="text" name="nombre1">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">2do Nombre</div>
														<input class="form-control" type="text" name="nombre2">
													</div>
												</div>
											</div>
											<br>
											<br>
											<div class="col-sm-12">
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">1er Apellido</div>
														<input class="form-control" type="text" name="apelldio1">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">2do Apellido</div>
														<input class="form-control" type="text" name="apellido2">
													</div>
												</div>
											</div>	
											<br>
											<br>
											<div class="col-sm-12">
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">Fecha Nac</div>
														<input class="form-control" type="text" name="fecha">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">edad</div>
														<input class="form-control" type="text" name="edad">
													</div>
												</div>
											</div>
											<br>
											<br>
											<div class="col-sm-12">
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">Sexo</div>
														<input class="form-control" type="text" name="sexo">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-addon">Teléfono</div>
														<input class="form-control" type="text" name="telefono">
													</div>
												</div>
											</div>
											<br>
											<br>


											</form>
										</div>
										
									</div>
								</div>
							</div>
							<!--Fin de ventana emergente de modificar-->
						
						<?php }?>
						</tbody>
					</table>
					<!--Fin de tablas-->
				
				</div>
			</div>
		</div>
	</div>
	<!--Fin de la tabla reponsiva para listar los expedientes-->

</div>









  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/dataTables.min.js"></script>
</body>
</html>