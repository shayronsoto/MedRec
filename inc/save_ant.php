<?php 
require('conexion.php');

$exp=$_POST['exp'];



$no_ta=$_POST['nota_antf'];

$ant_pat=$_POST['anpp'];

if (isset($_POST['btn'])) {

	$pdm=$_REQUEST['pdm'];
$mdm=$_REQUEST['mdm'];
$adm=$_REQUEST['adm'];
$hdm=$_REQUEST['hdm'];

$phas =$_REQUEST['phas'];
$mhas =$_REQUEST['mhas'];
$ahas =$_REQUEST['ahas'];
$hhas =$_REQUEST['hhas'];

$po =$_REQUEST['po'];
$mo =$_REQUEST['mo'];
$ao =$_REQUEST['ao'];
$ho =$_REQUEST['ho'];

$pn=$_REQUEST['pn'];
$mn=$_REQUEST['mn'];
$an=$_REQUEST['an'];
$hn=$_REQUEST['hn'];

$pc=$_REQUEST['pc'];
$mc=$_REQUEST['mc'];
$ac=$_REQUEST['ac'];
$hc=$_REQUEST['hc'];

$pa=$_REQUEST['pa'];
$ma=$_REQUEST['ma'];
$aa=$_REQUEST['aa'];
$ha=$_REQUEST['ha'];

$pep=$_REQUEST['pep'];
$mep=$_REQUEST['mep'];
$aep=$_REQUEST['aep'];
$hep=$_REQUEST['hep'];

$pen=$_REQUEST['pen'];
$men=$_REQUEST['men'];
$aen=$_REQUEST['aen'];
$hen=$_REQUEST['hen'];

$pec=$_REQUEST['pec'];
$mec=$_REQUEST['mec'];
$aec=$_REQUEST['aec'];
$hec=$_REQUEST['hec'];

$peb=$_REQUEST['peb'];
$meb=$_REQUEST['meb'];
$aeb=$_REQUEST['aeb'];
$heb=$_REQUEST['heb'];

$pet=$_REQUEST['pet'];
$met=$_REQUEST['met'];
$aet=$_REQUEST['aet'];
$het=$_REQUEST['het'];

$per=$_REQUEST['per'];
$mer=$_REQUEST['mer'];
$aer=$_REQUEST['aer'];
$her=$_REQUEST['her'];

$peo=$_REQUEST['peo'];
$meo=$_REQUEST['meo'];
$aeo=$_REQUEST['aeo'];
$heo=$_REQUEST['heo'];

$pei=$_REQUEST['pei'];
$mei=$_REQUEST['mei'];
$aei=$_REQUEST['aei'];
$hei=$_REQUEST['hei'];



$p_resumen=$pdm."".$phas."".$po."".$pn."".$pc."".$pa."".$pep."".$pen."".$pec."".$peb."".$pet."".$per."".$peo."".$pei;
$m_resumen=$mdm."".$mhas."".$mo."".$mn."".$mc."".$ma."".$mep."".$men."".$mec."".$meb."".$met."".$mer."".$meo."".$mei;
$a_resumen=$adm."".$ahas."".$ao."".$an."".$ac."".$aa."".$aep."".$aen."".$aec."".$aeb."".$aet."".$aer."".$aeo."".$aei;
$h_resumen=$hdm."".$hhas."".$ho."".$hn."".$hc."".$ha."".$hep."".$hen."".$hec."".$heb."".$het."".$her."".$heo."".$hei;

	$sql="INSERT INTO ant_fam(padre,madre,abuelos_maternos,hermanos,expediente_no_expediente) VALUES ('$p_resumen','$m_resumen','$a_resumen','$h_resumen','$exp')";
	$resultado=$mysqli->query($sql);
	

}
header("Location: ../antecedentes.php");
exit();

 ?>