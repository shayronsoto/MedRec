
<?php 
session_start();
$codigo= $_SESSION['codigo']; 
require('fpdf/fpdf.php');
require('inc/conexion.php');
$exp=$_GET['exp'];
$id=$_GET['id'];

$pdf = new FPDF ();
$pdf-> AddPage ();
//Line(punto de inicio, alturo del p, punto de fin, altura del p)
$pdf->Line(20, 50, 185, 50);
$pdf->Line(20, 150, 185, 150);
$pdf->Line(150,140,180,140);

$pdf->Ln(18);
$pdf-> SetFont('Arial','',12);
//consulta a la base de datos
$medico= $mysqli->query("SELECT * FROM usuario WHERE cod_medico=$codigo");

$pdf->Image('img/logo.png',10,30,18,16,'PNG');
$pdf->Cell(20,24,'',0);
$pdf->Cell(7,10,'Dr.',0);
while ($fila=$medico->fetch_assoc()) {
	//Datos del Medico
	$pdf->Cell(31,10,utf8_decode($fila['nombre']),0);
	$pdf->Cell(31,10,utf8_decode($fila['apellido']),0);
	//linea de especialidad
	$pdf->Ln(6);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,7,'',0);
	$pdf->Cell(20,7,'Especialidad:',0);
	$pdf->Cell(28,7, utf8_decode($fila['especialidad']),0);
}
//Linea 
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,10,'',0);
$pdf->Cell(130,10,'',0);
$pdf->Cell(50,15,'Fecha: '.date('d-m-Y').'',0);
//Datos de Paciente
$pdf->Ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,10,'',0);
$pdf->Cell(20,10,'Paciente: ',0);
//busca el nombre del paciente
$paciente=$mysqli->query("SELECT * FROM expediente WHERE no_expediente=$exp");
while($pct=$paciente->fetch_assoc()){
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(24,10,utf8_decode($pct['primer_apellido']),0);
	$pdf->Cell(24,10,utf8_decode($pct['segundo_apellido']),0);
	$pdf->Cell(40,10,utf8_decode($pct['nombre']),0);
}
$pdf->Ln(8);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,10,'',0);
$pdf->Cell(18,10,'Tratamiento: ',0);
$trat=$mysqli->query("SELECT * FROM hc_enf_actual WHERE id_hc=$id");
while ($t=$trat->fetch_assoc()) {
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(20,10,'',0);
	$pdf->Cell(150,40,utf8_decode($t['tratamiento']),0);
}
$pdf->Ln(66);
$pdf->Cell(128,8,'',0);
$pdf->Cell(11,8,'Firma',0);


$correo=$mysqli->query("SELECT * FROM usuario WHERE cod_medico=$codigo");
while ($ce=$correo->fetch_assoc()) {
	$pdf->Ln(15);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(122,8,'',0);
	$pdf->Cell(12,8,'Correo: ',0);
	$pdf->Cell(18,8,utf8_decode($ce['correo']));
	$pdf->Ln(5);
	$pdf->Cell(122,8,'',0);
	$pdf->Cell(14,8,utf8_decode('Teléfono: '),0);
	$pdf->Cell(18,8,utf8_decode($ce['telefono']));
}
$pdf->Output();
?>