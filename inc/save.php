<?php 
require('conexion.php');
$no_expediente=$_POST['expediente'];
$fecha=explode("/", $_POST['fecha']);
$fecha_dia=$fecha[0];
$fecha_mes=$fecha[1];
$fecha_ano=$fecha[2];
$fecha_r=$fecha_ano."-".$fecha_mes."-".$fecha_dia;
$date=date("Y-m-d", strtotime($fecha_r));
$cedula=$_POST['cedula'];
$nombre=$_POST[''];
$apellido1=$_POST[''];
$apellido2=$_POST['']:

 ?>