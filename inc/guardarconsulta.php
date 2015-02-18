<?php 
require('conexion.php');

$exp=$_GET['id'];
$consulta="SELECT count(id_hc), max(id_hc) FROM hc_enf_actual";
$resultado=$mysqli->query($consulta);
	while ($resul=mysqli_fetch_array($resultado))
	{
		
		$count=$resul['0'];
		$max=$resul['1'];

		if ($count=='0') {
			$var='10001';
			
		}
		else
		{
			$var=$max+'00001';
		}
	}


if (isset($_POST['g_consulta'])) {
	$fecha=gmdate("Y/m/d");
	$hora=date("H:i:s");
	$mot=$_POST['motivo'];
	$diagnostico=$_POST['padecimiento'];
	$tratamiento=$_POST['tratamiento'];
	$nota=$_POST['notas'];

	$temperatura=$_POST['temp'];
	$ntemperatura=$_POST['temp_nota'];
	$fre_cardiaca=$_POST['fc'];
	$nfre_cardiaca=$_POST['fc_nota'];
	$presion=$_POST['pa'];
	$npresion=$_POST['pa_nota'];
	$respiracion=$_POST['resp'];
	$nrespiracion=$_POST['resp_nota'];
	$peso=$_POST['peso'];
	$npeso=$_POST['peso'];
	$cabeza=$_POST['cabeza'];
	$abdomen=$_POST['abdomen'];
	$oido=$_POST['oido'];
	$ojos=$_POST['ojos'];
	$m_inferio=$_POST['minferior'];
	$m_superior=$_POST['msuperior'];

	$e_temperatura= $temperatura.", ".$ntemperatura;
	$e_fcardiaca=$fre_cardiaca.", ".$nfre_cardiaca;
	$e_presion=$presion.", ".$npresion;
	$e_peso=$peso.", ".$npeso;
	$e_respiracion=$respiracion.", ".$nrespiracion;



	$consulta2="INSERT INTO hc_enf_actual(id_hc,fecha,hora,motivo,diagnostico,tratamiento,notas,expediente_no_expediente) VALUES ('$var','$fecha','$hora','$mot','$diagnostico','$tratamiento','notas','$exp')";
	$resultado2=$mysqli->query($consulta2);

	$consulta3="INSERT INTO examen_fisico(temperatura,f_cardiaca,p_arterial,peso,respiracion,cabeza,abdomen,oidos,ojos,miembros_superios,miembros_inferiores,hc_enf_actual_id_hc )VALUES('$e_temperatura','$e_fcardiaca','$e_presion','$e_peso','$e_respiracion','$cabeza','$abdomen','$oido','$ojos','$m_superior','$m_inferio','$var')";
	$resultado3=$mysqli->query($consulta3);

	header("Location: ../consulta.php?exp=$exp");

	exit();
}

 ?>