<?php
$file ='/automoviles/nue/archivos/'.$_GET[$file];
 
$filename = $_GET[$file];
 
header('Content-type: application/pdf');// esta linea fue mi dolor de cabeza
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
 
@readfile($file);
?>