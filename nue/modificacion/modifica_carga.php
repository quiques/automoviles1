<?php

include("../conexion/conexion.php");
$busqueda = new conexion; 
$archivo = $_FILES["filefact"]["tmp_name"];//accede al archivo

if ($_FILES["filefact"]["size"] > 50000000) {
    echo "El tamaño de archivo excede lo permitido.";
    return;
}

/*
if (file_exists($destino)) {
    echo "El archivo ya existe.";
    return; } 


if($_FILES["filefact"].type != 'image/png' &&
   $_FILES["filefact"].type != 'image/jpg' && 
   $_FILES["filefact"].type != 'image/gif' && 
   $_FILES["filefact"].type != 'image/jpeg' ) {
        echo "alert('El archivo no es de imagen')"; return; } */

//$destino = "/archivos/".$_FILES["filefact"]["name"];//donde los vamos a guardar
//$destino = "./".$_FILES["filefact"]["name"];
$newname = $_POST["nserie"];
$id= obtener_consecutivo($newname );
$destino = "../archivos/".$newname."-".$id.".pdf";
if (move_uploaded_file($archivo, $destino))
	{ echo "El archivo fue copiado en:".$destino;  
    
    	$query="UPDATE tbl_aseguramiento set CFACT='Si' WHERE  NumSerie ='".$newname."'";
		$consulta = mysql_query($query,$busqueda->conexion);
		if ($consulta==1 )
			{ echo "<br>Se han modificado los datos  " ;}
		else
			{ echo "Fallaron los datos ";} 
    
    }
else
	{ echo "Error no identificado";}
    mysql_close($busqueda->conexion);
return; 

function obtener_consecutivo($Arc_Buscado) {
$directorio_actual = "../archivos/";
$arrArchivos = scandir($directorio_actual);
$total_archivos=count($arrArchivos);
$Arc_Buscado=strtoupper($Arc_Buscado);
$valorMaximo=0;
printf($Arc_Buscado);
for ($x=0;$x<$total_archivos;$x++)
 { $arrArchivos[$x]=strtoupper ($arrArchivos[$x]);
  
  $nombreArchivo=substr($arrArchivos[$x],0,strlen($Arc_Buscado));
  
  if ( strcmp ($Arc_Buscado,$nombreArchivo)==0)
  {  printf("</br>".$arrArchivos[$x]);
    $longitud= strlen($arrArchivos[$x]);
      $consecutivo = substr($arrArchivos[$x],$longitud-7,$longitud-4);
      $consecutivo+=0;
      
      if ($valorMaximo<$consecutivo)
          $valorMaximo=$consecutivo; }
  }
$valorMaximo++;
return str_pad($valorMaximo,3,"0",STR_PAD_LEFT);


}

?>