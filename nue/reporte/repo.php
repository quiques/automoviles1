<?php
include_once('PDF.php');
include_once('myDBC.php');
$seleccion = new myDBC();
$datosReporte = $seleccion->seleccionar_datos();
$pdf = new PDF('L','mm',array(420,690));
 
$pdf->AddPage();
 
$miCabecera = array('No.','Marca','Sub Marca','Transmision','No.Placa','No.Motor','No.Serie','Funcion','No.Economico','EquipoEspecial','ValorEquipoE','Fecha','CFACT','CTIC','Otros','Observaciones');

 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
 
$pdf->Output(); //Salida al navegador
?>