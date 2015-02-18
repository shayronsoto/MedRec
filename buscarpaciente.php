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

<div class="col-sm-8 col-sm-offset-2">
<div class="panel panel-warning">
	<div class="panel-heading">Buscar paciente</div>
	<div class="panel-body">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel-warning">
				<div class="panel-heading">Buscar por nombre y primer apellido</div>
				<form method="POST">
					<div class="col-md-8 col-sm-10 col-xs-12">
					<br>
						<div class="input-group">
							<div class="input-group-addon">Nombre</div>
							<input class="form-control" name="nombre" id="nombre" type="text">
								
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-addon">Apellido</div>
							<input class="form-control" name="apellido" id="apellido" type="text">
						</div>
					</div>
					<br>
					<div class="col-sm-2">
						<button class="btn btn-warning"  type="submit"  name="btn1" value="bnombre">Buscar</button>
					</div>
				</form>
			</div>
			<br>
			
		</div>
		
		<div class="col-sm-6 col-sm-offset-3">
		<br>
			<div class="panel-warning">
				<div class="panel-heading">Buscar por numero de cedula</div>
				<br>
				<form method="POST">
					<div class="col-md-8 col-sm-10 col-xs-12">
						<div class="input-group">
							<div class="input-group-addon">Cedula</div>
							<input class="form-control" name="cedula" id="cedula" type="text" maxlength="14">
						</div>
					</div>
					<div class="col-sm-2 ">
						<button class="btn btn-warning"  type="submit" name="btn1" value="bcedula">Buscar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
</div>

<?php 
if(isset($_POST["btn1"]))
	{
		$bt=$_POST["btn1"];
		if($bt=="bnombre")
		{
			$bt=$_POST["btn1"];
			$nom=$_POST['nombre'];
			$ape=$_POST['apellido'];

	
			$consulta="SELECT no_expediente, cedula, nombre, primer_apellido, segundo_apellido FROM expediente where nombre='$nom' and primer_apellido='$ape' and usuario_cod_medico='$codigo' " ;
			$resultado=$mysqli->query($consulta); 
			echo"
			<div class='container'>
			<div class='col-sm-10 col-sm-offset-1'>
				<div class='panel panel-primary'>
					<div class='panel-heading'>Expediente</div>
						<div class='panel-body'>
							<div class='table-responsive'>
								<table class='table table-hover'>
									<thead>
    									<tr>
    										<th class='info'>Expediente</th>
        									<th class='info'>Cedula</th>
        									<th class='info'>Nombre</th>
        									<th class='info'>Primer Apellido</th>
        									<th class='info'>Segundo Apellido</th>
        									<th class='info'></th>
        								</tr>
     			
    								</thead>
				";
				while ($fila=$resultado->fetch_assoc())
				{
				$var=$fila['no_expediente'];
				$var1=$fila['cedula'];
				$var2=$fila['nombre'];
				$var3=$fila['primer_apellido'];
				$var4=$fila['segundo_apellido'];
		
				echo "
		
				<tbody>
    				<td>$var</td>
        			<td>$var1</td>
        			<td>$var2</td>
        			<td>$var3</td>
        			<td>$var4</td>
        			<td><a class='btn btn-warning' href='consulta.php?exp=$var ' title='Expediente'><span class='glyphicon glyphicon-folder-open'></span></a></td>
    
    			</tbody>
				";
				}  
	
			echo"			</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
							
			";
		}
		
		
		
		
		
		
		if($bt=="bcedula")
		{
			$bt=$_POST["btn1"];
			$ced=$_POST['cedula'];
			$consulta="SELECT no_expediente, cedula, nombre, primer_apellido, segundo_apellido FROM expediente where cedula='$ced' and usuario_cod_medico='$codigo' " ;
			$resultado=$mysqli->query($consulta); 
			echo"
			<div class='container'>
			<div class='col-sm-10 col-sm-offset-1'>
				<div class='panel panel-primary'>
					<div class='panel-heading'>Expediente</div>
						<div class='panel-body'>
							<div class='table-responsive'>
								<table class='table table-hover'>
									<thead>
    									<tr>
    										<th class='info'>Expediente</th>
        									<th class='info'>Cedula</th>
        									<th class='info'>Nombre</th>
        									<th class='info'>Primer Apellido</th>
        									<th class='info'>Segundo Apellido</th>
        									<th class='info'></th>
        								</tr>
     			
    								</thead>
				";
				while ($fila=$resultado->fetch_assoc())
				{
				$var=$fila['no_expediente'];
				$var1=$fila['cedula'];
				$var2=$fila['nombre'];
				$var3=$fila['primer_apellido'];
				$var4=$fila['segundo_apellido'];
		
				echo "
		
				<tbody>
					<tr>
    					<td>$var</td>
        				<td>$var1</td>
        				<td>$var2</td>
        				<td>$var3</td>
        				<td>$var4</td>
        				<td><a class='btn btn-warning ' href='datosgenerales.php?exp=$var' title='Expediente'><span class='glyphicon glyphicon-folder-open'></span></a></td>
   				 	</tr>
    			</tbody>
				";
				}
	
			echo"			</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
							
			";
		}
	}
 ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/dataTables.min.js"></script>	
</body>
</html>