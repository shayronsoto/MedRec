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
<header style="heigth=150px">
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
	<nav class="navbar navbar-default" role="navigation" >
		<div class="container-fluid">

			<div class="navbar-header">
				
				<a href="" class="navbar-brand" class="dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user"></span>
					<?php 
						echo " "." ".$_SESSION['nombre'];
					?>
					<span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="menu">
					<li><a href="">Mi Informacion</a></li>
					<li><a href="inc/logout.php">Cerrar Sesión</a></li>
				</ul>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Expediente</a></li>
					<li><a href="#">Consulta</a></li>
					<li><a href="#">Cita</a></li>
				</ul>
			</div>
			
		</div>
	</nav>
</header>
<br>
<br>

<div class="container">
	<div class="row">
		<button class="btn btn-primary">Ingresar Nuevo</button>
	</div>
</div>


<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>N° Expediente</th>
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
				<td><a class="btn btn-primary" title="Modificar" href=""><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn btn-primary" title="Eliminar" href=""><span class="glyphicon glyphicon-remove"></span></a> <a class="btn btn-primary" title="Ver" href=""><span class="glyphicon glyphicon-search"></span></a></td>
			</tr>
		<?php }?>
			

		</tbody>
		
	</table>
</div>





  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/dataTables.min.js"></script>
</body>
</html>