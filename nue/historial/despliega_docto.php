
<?php
if (isset($_GET["numSerie"]))
	$numSerie=$_GET["numSerie"];
else
	$numSerie=$_GET["numSerie"];


define("IMG_ANCHO","250");
define("IMG_ALTO","300");
$imagenesLinea = 5; 

$nuevo_direc = "../archivos/";
chdir($nuevo_direc);
$dir_actual=getcwd();
$dir = opendir($dir_actual);
//printf ($dir_actual); Muestra el directorio esmos perdidos
$nuevo_direc = "/automoviles/nue/archivos/";
printf("<table>");
$x=1;
 while (($file=readdir($dir))!==false)
    { 
    $nombreArchivo=substr($file,0,strlen($numSerie));
   if (substr_count($file,".jpg")!==0
   		and strcmp ($numSerie,$nombreArchivo)==0)
    {
    if ($x%$imagenesLinea==1) 
    { printf("<tr>");   }	
    printf ("<td>");
	printf ("<a href='visor_jpg.php?numSerie=".$file."'>");
	printf ("<img src=".$nuevo_direc.$file."  "); 
	printf (" width=".IMG_ANCHO ." height=". IMG_ALTO." >");
	printf ("</a>");
	//printf($file);el archivo seleccionado
  //print($nuevo_direc);Ruta del archivo nuevamente 
	printf ("</td>");

    if ($x%$imagenesLinea==0) 
    { printf("</tr>");   }	
    $x++;
  } // IF
} // while
  printf("</table>");

//else
//{printf ("<p>Parametro incorrecto</p>"); } // else
closedir($dir);

?>