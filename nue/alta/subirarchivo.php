<?php
	//foreach ($_Files["fact"] as $clave => $valor) {

	//	echo "propiedad: $clave---Valor:$valor<br/>";
	
	//}
	$archivo = $_Files["fact"]["tmp_name"];//accede al archivo
	$destino = ".alta/archivo".$_Files["fact"]["name"];//donde los vamos a guardar

	move_uploaded_file($archivo, $destino);//el archivo temp+laruta que es el destino 
	echo "Se han subido los archivos";
?>