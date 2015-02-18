<?php 
require('../fpdf/fpdf.php');
require('../inc/conexion.php');

class PDF extends FPDF { var $widths; var $aligns; function SetWidths($w) {$this->widths=$w;}
 
function SetAligns($a)
{
$this->aligns=$a;
}
 
}
?>