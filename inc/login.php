<?php 
session_start();
require('conexion.php');
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

$consulta="SELECT * FROM usuario";
$resultado=$mysqli->query($consulta);

while($fila=$resultado->fetch_assoc())
{
	$cod=$fila['cod_medico'];
	$nom=$fila['nombre'];
	$correo=$fila['correo'];
	$tel=$fila['telefono'];
	$pass=$fila['contrasena'];
	
	if($usuario==$correo & $contrasena==$pass)
	{
		$_SESSION['nombre']=$nom;
		$_SESSION['codigo']=$cod;
		header("Location: ../expediente.php");
		exit();
	}
	else
	{
		if ($usuario==$tel & $contrasena==$pass) 
		{
			$_SESSION['nombre']=$nom;
			$_SESSION['codigo']=$cod;
			header("Location: ../expediente.php");
			exit();
		}
	}

}
?>