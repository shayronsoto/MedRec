<?php 
require('conexion.php');
$codigo=$_POST['codigo'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$especialidad=$_POST['especialidad'];
$contrasena=$_POST['contrasena'];

$consulta="INSERT INTO usuario(cod_medico,nombre,apellido,correo,telefono,especialidad,contrasena) VALUES('$codigo','$nombre','$apellido','$correo','$telefono','$especialidad','$contrasena')";
$resultado=$mysqli->query($consulta);

header("Location: ../index.php");
exit();

 ?>