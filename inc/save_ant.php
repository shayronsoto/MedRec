<?php 
require('conexion.php');

$exp=$_POST['exp'];





if (isset($_POST['btn'])) {
	
$ant_noper=$_POST['anpp'];

$p=$_POST['p_resumen'];
$m=$_POST['m_resumen'];
$ap=$_POST['ap_resumen'];
$am=$_POST['am_resumen'];
$h=$_POST['h_resumen'];

$sql="INSERT INTO ant_fam(padre,madre,abuelos_paternos,abuelos_maternos,hermanos,expediente_no_expediente) VALUES ('$p','$m','$ap','$am','$h','$exp')";
$resultado=$mysqli->query($sql);

$antnoper="INSERT INTO  ant_nopat(descripcion,expediente_no_expediente) VALUES ('$ant_noper','$exp')";
$resultado2=$mysqli->query($antnoper);


header("Location: ../antecedentes.php?exp=$exp");
exit();


}

 ?>