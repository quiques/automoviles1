<?php
	require("conexion/conexion.php");
	$busqueda = new conexion;
	//$con = new Conexion();
	//$con->ConectarMysql();
	$query="select * from aseguramiento";//columna que ordena  
	$consulta=mysql_query($query,$busqueda->conexion);
    

	//=$con->Consultar($consulta);
	require('./fpdf/fpdf.php');//ruta del fpdf
	header("Content-type: application/PDF");//para que lo abra denpdf
	$fuente="Arial";
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont($fuente,'',14);
	$pdf->Write(10,'Delgacion Gustavo A. Madero');
	$pdf->Ln();
	$pdf->SetFont($fuente,'B',16);
	$pdf->Write(10,'Sistema de registro vehicular');
	$pdf->Ln();
	$pdf->SetFont($fuente,'',10);
	$pdf->Write(2,str_repeat("-",160)); $pdf->Ln();
	//$pdf->Write(5,"Clave   Nombre    Dirección               Ciudad      Estado");
	$pdf->Ln();
	$pdf->Write(2,str_repeat("-",160)); $pdf->Ln();
	while($renglon=mysql_fetch_array($consulta))
   	{     
         $linea=$renglon["No."]." ".$renglon["Marca"]." ".$renglon["Submarca"];
         $linea.=" ".$renglon["Transmision"];
         $linea.=" ".$renglon["NumPlaca"]." ".$renglon["NumMotor"];
         $linea.=" ".$renglon["NumSerie"]." ".$renglon["Funcion"];
         $linea.=" ".$renglon["NumEconomico"]." ".$renglon["EquipoEspecial"];
		 $linea.=" ".$renglon["ValorEquipoEspecial"]." ".$renglon["CFACT"];
		 $linea.=" ".$renglon["CTIC"]." ".$renglon["Otros"];
		 $linea.=" ".$renglon["Observaciones"];
                        
         $pdf->Write(5,$linea);//espacio entre linea y el salto es el ln
  	    $pdf->Ln();
 		} 
 	$pdf->SetFont($fuente,'',8);	
	$pdf->Write(10,date('l jS \of F Y h:i:s A'));//fecha Formato de fecha busccar en español
  	$pdf->Output(""); 		
	$con->Cerrar();

?>