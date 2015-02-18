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
		<a class="btn btn-warning " href="datosgenerales.php?exp=<?php echo $exp; ?>">Datos Generales</a>
		<a class="btn btn-warning active" href="antecedentes.php?exp=<?php echo $exp; ?>">Antecedentes</a>
		<a class="btn btn-warning " href="consulta.php?exp=<?php echo $exp; ?>">Consultas</a>
		<a class="btn btn-warning " href="#">Estudios</a>
		<a class="btn btn-warning " href="cita.php?exp=<?php echo $exp; ?>" >Citas</a>
	</form>
</nav>
<br>

</div>


<div class="col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading">Expediente: <?php echo $exp; ?></div>
		<div class="panel-body">
			<form action="inc/save_ant.php" method="POST">

			<input type="text" name="exp" class="hidden" value="<?php echo $exp; ?>">
			<div class="col-md-10 col-md-offset-1 col-xs-12">
			<ul class="nav nav-tabs" id="menu">
  						<li role="presentation"><a href="#" data-page="page1">Antecedentes Personales</a></li>
  						<li role="presentation"><a href="#" data-page="page2">Antecedentes No Patologicos</a></li>
  						<li role="presentation"><a href="#" data-page="page3">Antecedentes Familiares</a></li>
  						
					</ul>
			</div>

			<div class="col-md-10 col-md-offset-1 col-xs-12">		
				<div class="main">
				<div  id="page1" class="content">
					<div class="panel-warning">
						<div class="panel-heading">Antecedentes Personal del Paciente</div>
							<div class="panel-body">
							<div class="col-md-10 col-md-offset-1 col-xs-12">
							<div class="table-responsive">
								<table class="table table-hover" >
                					<thead>
                    					<tr>
                        					<th class="info" width="250px">Patologías</th>
											<th class="info"></th>
                        					<th class="info" width="500px">Descripción</th>
											<th class="info"></th>
                        					<th class="info" width="22"></th>
                    					</tr>
                					</thead>
                					<tbody>
                    					<tr>
                       					<td><select class="form-control">
												<option name="generales" value="Generales">Generales</option>
												<option name="exan" value="Exantemáticas">Exantemáticas</option>
												<option name="inf" value="Infectocontagiosa">Infectocontagiosa</option>
												<option name="deg" value="Crónico-Degeneraticas">Crónico-Degeneraticas</option>
											</select></td>
										<td></td>
                       					<td><input class="form-control" type="text" class="clsAnchoTotal" style="width:500px"></td>
										<td></td>
										<td><button type="button" class="btn btn-danger" name="btn" title="Eliminar Fila" id="clsEliminarFila"><span class="glyphicon glyphicon-remove" ></span></button></td>
                    					</tr>
                					</tbody>
									<br>
                					<tfoot>
									<tr>
										<td></td>
										<td></td>
										<td><input class="btn btn-warning"  type="button" value="Agregar fila" id="clsAgregarFila"></td>	
                   				 	</tr>
                					</tfoot>
            					</table>
								<br>
								<button type="submit" name="btn" class="btn btn-warning">Guardar</button>
							</div>
							</div>
							</div>
						
					  </div>
				</div>

				<div  id="page2" class="content">
					<div class="panel-warning">
						<div class="panel-heading">Antecedentes No Patologicos del Paciente</div>
						<div class="panel-body">
							<div class="col-md-10 col-md-offset-1 col-xs-12">
								<textarea class="form-control" name="anpp" id="" cols="30" rows="10" value="N/A"></textarea>
								<br>
								<button type="submit" name="btn" class="btn btn-warning">Guardar</button>
							</div>
						</div>
					</div>
				</div>

				<div  id="page3" class="content">
					<div class="panel-warning">
						<div class="panel-heading">Antecedentes Familiares</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table>
								<!--
									<tr>
										<td></td>
										<td width="100px">Padre</td>
										<td width="100px">Madre</td>
										<td width="100px">Abuelos</td>
										<td width="100px">Hermanos</td>
									</tr>
									<tr>
										<td width="350px">Diabetes Melitus</td>
										<td width="80px"><input class="form-control" name="pdm" type="checkbox" style="width:20px; height:20px"  value="Diabetes Melitus, "></td>
										<td width="80px"><input class="form-control" name="mdm" type="checkbox" style="width:20px; height:20px"  value="Diabetes Melitus, "></td>
										<td width="80px"><input class="form-control" name="adm" type="checkbox" style="width:20px; height:20px"  value="Diabetes Melitus, "></td>
										<td width="80px"><input class="form-control" name="hdm" type="checkbox" style="width:20px; height:20px"  value="Diabetes Melitus, "></td>
									</tr>
									<tr>
										<td width="350px">Hipertensión Arterial Sistémica</td>
										<td width="80px"><input class="form-control" name="phas" type="checkbox" style="width:20px; height:20px"  value="Hipertensión Arterial Sistémica, "></td>
										<td width="80px"><input class="form-control" name="mhas" type="checkbox" style="width:20px; height:20px"  value="Hipertensión Arterial Sistémica, "></td>
										<td width="80px"><input class="form-control" name="ahas" type="checkbox" style="width:20px; height:20px"  value="Hipertensión Arterial Sistémica, "></td>
										<td width="80px"><input class="form-control" name="hhas" type="checkbox" style="width:20px; height:20px"  value="Hipertensión Arterial Sistémica, "></td>
									</tr>
									<tr>
										<td width="350px">Obecidad</td>
										<td width="80px"><input class="form-control" name="po" type="checkbox" style="width:20px; height:20px"  value="Obesidad, "></td>
										<td width="80px"><input class="form-control" name="mo" type="checkbox" style="width:20px; height:20px"  value="Obesidad, "></td>
										<td width="80px"><input class="form-control" name="ao" type="checkbox" style="width:20px; height:20px"  value="Obesidad, "></td>
										<td width="80px"><input class="form-control" name="ho" type="checkbox" style="width:20px; height:20px"  value="Obesidad, "></td>
									</tr>
									<tr>
										<td width="350px">Neoplasias</td>
										<td width="80px"><input class="form-control" name="pn" type="checkbox" style="width:20px; height:20px"  value="Neoplasias, "></td>
										<td width="80px"><input class="form-control" name="mn" type="checkbox" style="width:20px; height:20px"  value="Neoplasias, "></td>
										<td width="80px"><input class="form-control" name="an" type="checkbox" style="width:20px; height:20px"  value="Neoplasias, "></td>
										<td width="80px"><input class="form-control" name="hn" type="checkbox" style="width:20px; height:20px"  value="Neoplasias, "></td>
									</tr>
									<tr>
										<td width="350px">Cáncer</td>
										<td width="80px"><input class="form-control" name="pc" type="checkbox" style="width:20px; height:20px"  value="Cáncer, "></td>
										<td width="80px"><input class="form-control" name="mc" type="checkbox" style="width:20px; height:20px"  value="Cáncer, "></td>
										<td width="80px"><input class="form-control" name="ac" type="checkbox" style="width:20px; height:20px"  value="Cáncer, "></td>
										<td width="80px"><input class="form-control" name="hc" type="checkbox" style="width:20px; height:20px"  value="Cáncer, "></td>
									</tr>
									<tr>
										<td width="350px">Alergias</td>
										<td width="80px"><input class="form-control" name="pa" type="checkbox" style="width:20px; height:20px"  value="Alergias, "></td>
										<td width="80px"><input class="form-control" name="ma" type="checkbox" style="width:20px; height:20px"  value="Alergias, "></td>
										<td width="80px"><input class="form-control" name="aa" type="checkbox" style="width:20px; height:20px"  value="Alergias, "></td>
										<td width="80px"><input class="form-control" name="ha" type="checkbox" style="width:20px; height:20px"  value="Alergias, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Psiquiatricas</td>
										<td width="80px"><input class="form-control" name="pep" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Psiquiatricas, "></td>
										<td width="80px"><input class="form-control" name="mep" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Psiquiatricas, "></td>
										<td width="80px"><input class="form-control" name="aep" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Psiquiatricas, "></td>
										<td width="80px"><input class="form-control" name="hep" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Psiquiatricas, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Neurológicas</td>
										<td width="80px"><input class="form-control" name="pen" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Neurológicas, "></td>
										<td width="80px"><input class="form-control" name="men" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Neurológicas, "></td>
										<td width="80px"><input class="form-control" name="aen" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Neurológicas, "></td>
										<td width="80px"><input class="form-control" name="hen" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Neurológicas, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Cardiovasculares</td>
										<td width="80px"><input class="form-control" name="pec" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Cardiovasculares, "></td>
										<td width="80px"><input class="form-control" name="mec" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Cardiovasculares, "></td>
										<td width="80px"><input class="form-control" name="aec" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Cardiovasculares, "></td>
										<td width="80px"><input class="form-control" name="hec" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Cardiovasculares, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Broncopulmonares</td>
										<td width="80px"><input class="form-control" name="peb" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Broncopulmonares, "></td>
										<td width="80px"><input class="form-control" name="meb" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Broncopulmonares, "></td>
										<td width="80px"><input class="form-control" name="aeb" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Broncopulmonares, "></td>
										<td width="80px"><input class="form-control" name="heb" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Broncopulmonares, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Tiroideas</td>
										<td width="80px"><input class="form-control" name="pet" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Tiroideas, "></td>
										<td width="80px"><input class="form-control" name="met" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Tiroideas, "></td>
										<td width="80px"><input class="form-control" name="aet" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Tiroideas, "></td>
										<td width="80px"><input class="form-control" name="het" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Tiroideas, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Renales</td>
										<td width="80px"><input class="form-control" name="per" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Renales, "></td>
										<td width="80px"><input class="form-control" name="mer" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Renales, "></td>
										<td width="80px"><input class="form-control" name="aer" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Renales, "></td>
										<td width="80px"><input class="form-control" name="her" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Renales, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Osteoarticulares</td>
										<td width="80px"><input class="form-control" name="peo" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Osteoarticulares, "></td>
										<td width="80px"><input class="form-control" name="meo" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Osteoarticulares, "></td>
										<td width="80px"><input class="form-control" name="aeo" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Osteoarticulares, "></td>
										<td width="80px"><input class="form-control" name="heo" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Osteoarticulares, "></td>
									</tr>
									<tr>
										<td width="350px">Enfermedades Infectocontagiosa</td>
										<td width="80px"><input class="form-control" name="pei" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Infectocontagiosa, "></td>
										<td width="80px"><input class="form-control" name="mei" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Infectocontagiosa, "></td>
										<td width="80px"><input class="form-control" name="aei" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Infectocontagiosa, "></td>
										<td width="80px"><input class="form-control" name="hei" type="checkbox" style="width:20px; height:20px"  value="Enfermedades Infectocontagiosa, "></td>
									</tr>
									-->



									<tr>
										<td width="150px" valign="top">Padre</td>
										<td><textarea class="form-control" name="p_resumen" id="" cols="90" rows="4" >N/A</textarea></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td width="150px" valign="top">Madre</td>
										<td><textarea class="form-control" name="m_resumen" id="" cols="90" rows="4" >N/A</textarea></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td width="150px" valign="top">Abuelos Paternos</td>
										<td><textarea class="form-control" name="ap_resumen" id="" cols="90" rows="4" >N/A</textarea></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td width="150px" valign="top">Abuelos Maternos</td>
										<td><textarea class="form-control" name="am_resumen" id="" cols="90" rows="4" >N/A</textarea></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td width="150px" valign="top">Hermanos</td>
										<td><textarea class="form-control" name="h_resumen" id="" cols="90" rows="4" >N/A</textarea></td>
									</tr>
								</table>
								<br>
								<button type="submit" name="btn" class="btn btn-warning">Guardar</button>
							</div>
						</div>
					</div>
					
				</div>	

			
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

<script>
$(function() {
    var curPage="";
    $('#menu a').click(function() {
        if (curPage.length) { 
            $("#"+curPage).hide();
        }
        curPage=$(this).data('page');
        $("#"+curPage).show();
        $('#i').hide();
    });
});
</script>


<script>
	$(document).ready(function(){
    //
    $(document).on('click','caption',function(){

        var objTabla=$(this).parent();
            if(objTabla.find('tbody').is(':visible')){
                $(this).removeClass('clsContraer');
                $(this).addClass('clsExpandir');
            }else{
                $(this).removeClass('clsExpandir');
                $(this).addClass('clsContraer');
            }
            objTabla.find('tbody').toggle();
    });
         
    $(document).on('click','#clsAgregarFila',function(){
        var strNueva_Fila='<tr>'+
            '<td><select class="form-control" name="" id=""> <option name="generales" value="Generales">Generales</option> <option name="exan" value="Exantemáticas">Exantemáticas</option> <option name="inf" value="Infectocontagiosas">Infectocontagiosas</option> <option name="deg" value="Crónico-Degeneraativas">Crónico-Degeneraativas</option></select></td>'+
			'<td></td>'+
            '<td><input class="form-control" type="text" class="clsAnchoTotal" style="width=500"></td>'+
			'<td></td>'+
            '<td align="right"><button type="buton" class="btn btn-danger" title="Eliminar Fila" id="clsEliminarFila"><span class="glyphicon glyphicon-remove"></span></button></td>'+
        '</tr>';
        
        var objTabla=$(this).parents().get(3);
        $(objTabla).find('tbody').append(strNueva_Fila);

        if(!$(objTabla).find('tbody').is(':visible')){
            $(objTabla).find('caption').click();
        }
    });
     
    $(document).on('click','#clsEliminarFila',function(){
        var objCuerpo=$(this).parents().get(2);
            if($(objCuerpo).find('tr').length==1){
                if(!confirm('Esta es el única fila de la lista ¿Desea eliminarla?')){
                    return;
                }
            }
                     
       
        var objFila=$(this).parents().get(1);
            $(objFila).remove();
    });
             
});
</script>




</body>
</html>