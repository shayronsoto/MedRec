<?php 
require('conexion.php');
$no_expediente=$_POST['no_expediente'];
//$fecha=$_POST['fecha'];
$fecha=explode("/", $_POST['fecha']);
$fecha_dia=$fecha[0];
$fecha_mes=$fecha[1];
$fecha_ano=$fecha[2];
$fecha_r=$fecha_ano."-".$fecha_mes."-".$fecha_dia;
$date=date("Y-m-d", strtotime($fecha_r));
//$fecha2=date('Y-m-d',strtotime('$fecha'));
$cedula=$_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
//$fecha_nac=explode("-", $_POST['fecha_nac']);
//$dia_nac=$fecha_nac[2];
//$mes_nac=$fecha_nac[1];
//$ano_nac=$fecha_nac[0];
//$fecha_nacimiento=$ano_nac."-".$mes_nac."-".$dia_nac;

$fecha_nac=$_POST['fecha_nac'];

$edad_nac=explode("-", $_POST['fecha_nac']);
$dia_nac=$edad_nac[2];
$mes_nac=$edad_nac[1];
$ano_nac=$edad_nac[0];
$edad_nacimiento=$ano_nac."-".$mes_nac."-".$dia_nac;

$fecha_nac2=date('Y-m-d',strtotime('$fecha_nac'));

$lugar_nac=$_POST['lugar'];
$sangre=$_POST['sangre'];
$sexo=$_POST['sexo'];
$estado=$_POST['estado'];
$ocupacion=$_POST['ocupacion'];
$religion=$_POST['religion'];
$telefono=$_POST['telefono'];

$correo=$_POST['email'];
$direccion=$_POST['direccion'];
$cod_medico=$_POST['cod'];


if (($mes_nac==$fecha_mes) && ($dia_nac>$fecha_dia)) {
	$fecha_ano=($fecha_ano-1);
}

if ($mes_nac>$fecha_mes){
	$fecha_ano=($fecha_ano-1);
}

$edad=($fecha_ano-$ano_nac);



//$consulta="INSERT INTO expediente(no_expediente,fecha_registro,cedula,nombre,primer_apellido,segundo_apellido,fecha_nacimiento,lugar_nacimiento,sangre,sexo,estado_civil,ocupacion,edad,religion,telefono,celular) VALUES('$no_expediente','$date','$cedula','$nombre','$apellido1','$apellido2','$fecha_nac','$lugar_nac','$sangre','$sexo','$estado','$ocupacion','$edad','$religion','$telefono','$celular')";
if (isset($_POST['guardar'])) {

$consulta="INSERT INTO expediente(no_expediente,fecha_registro,cedula,nombre,primer_apellido,segundo_apellido,fecha_nacimiento,lugar_nacimiento,sangre,sexo,estado_civil,ocupacion,edad,religion,telefono,correo,direccion,usuario_cod_medico) VALUES('$no_expediente','$date','$cedula','$nombre','$apellido1','$apellido2','$fecha_nac','$lugar_nac','$sangre','$sexo','$estado','$ocupacion','$edad','$religion','$telefono','$correo','$direccion','$cod_medico')";
$resultado=$mysqli->query($consulta);
header("Location: ../pacientedatos.php?no=$no_expediente");
exit();
}
else
{
	if (isset($_POST['nuevo'])) {
		header("Location: ../pacientenuevo.php");
		exit();
	}
	else
	{
		if (isset($_POST['ver'])){
			header("Location: ../consulta.php?no=$no_expediente");
			exit();
		}
	}

}


//	$consulta="INSERT INTO expediente (no_expediente,fecha_registro,cedula,nombre,primer_apellido,segundo_apellido,fecha_nacimiento,lugar_nacimiento,sangre,sexo,estado_civil,ocupacion,edad,religion,telefono,celular,correo,direccion,usuario_cod_medico) VALUES (19024,'2014-01-21','1890909930001z','Marvin','Matamorros','Bravo','1993-09-30','Nicaragua','B+','Masculino','Casado','Estudiante',21,'Catolico',2512000,89890000,'marvin@yahoo.es','en su casa',27812)";
//echo "$no_expediente $cedula $nombre $apellido1 $apellido2 $sangre $sexo $estado $ocupacion $religion $telefono ";
//echo "$fecha_r";
//echo "<br/>$edad_nacimiento";
?>