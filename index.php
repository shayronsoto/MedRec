<?php 

require('inc/conexion.php');
	#crear automaticamente el codigo del medico
	$consulta="SELECT count(cod_medico), max(cod_medico) FROM usuario";
	$resultado=$mysqli->query($consulta);
	while ($resul=mysqli_fetch_array($resultado))
	{
		
		$count=$resul['0'];
		$max=$resul['1'];

		if ($count=='0') {
			$var='27811';
			
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
	<title>MedRec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/dataTables.min.css" rel="stylesheet">	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="text col-sm-6 hidden-xs">
					<img class="hidden-xs" class="img-responsive" src="img/logo.png" alt="">
					<h3 class="texto">MedRec</h3>
					<h5 class="texto">Medical Record</h5>
				</div>
				<div class="text col-xs-8 col-xs-offset-2 hidden-ms">
					<h3 class="texto">MedRec</h3>
					<h5 class="texto">Medical Record</h5>
				</div>
				
			</div>
		</div>
	</header>


	
		<div class="container login">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<h2 class="texto">Usuario</h2>
					<form class="form" action="inc/login.php" method="POST">
						<input name="usuario" class="form-control" type="text" placeholder="Correo Electronico o Telefono">
						<input name="contrasena" class="form-control" type="password" placeholder="Contraseña">
						<button class="btn btn-default">Ingresar</button>
						<h5><a type="submit" name="reg"data-toggle="modal" href="#registrar">Registrate</a></h5>

					</form>
					
				</div>
			</div>
		</div>

	<hr>


	<div class="modal" id="registrar">
		<div class="modal-dialog">
			<div class="modal-content contenido">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Registrate</h3>
				</div>
				<div class="modal-body">
					<form action="inc/guardar.php" method="POST" role="form">
						<label for="">Codigo</label>
						<input type="text" class="form-control " name="codigo" maxlength="5" value="<?php echo $var;?>">
						<label for="">Nombre</label>
						<input type="text" class="form-control" name="nombre" maxlength="30">
						<label for="">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="" maxlength="30">
						<label for="">Correo Electronico</label>
						<input type="email" class="form-control" name="correo" id="">
						<label for="">Telefono</label>
						<input type="number" class="form-control" name="telefono" id="" maxlength="8">
						<label for="">Especialidad</label>
						<select class="form-control" name="especialidad" id="">
							<option value=""></option>
							<option value="">Ginecologia</option>
							<option value="">Pediatria</option>
							<option value="">Cardiologia</option>
							<option value="">Neurologia</option>
						</select>
						<label for="">Contraseña</label>
						<input type="password" class="form-control" name="contrasena" id="">
						<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
					</form>
				</div>
			
			</div>
			
		</div>
	</div>



	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<h5> © MedRec Company S.A</h5>
					 
				</div>
			</div>
		</div>
	</footer>

	

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
</body>
</html>