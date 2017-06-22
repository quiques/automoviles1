
<?php
if (isset($_GET["numSerie"]))
	$numSerie=$_GET["numSerie"];
else
	$numSerie=$_GET["numSerie"];


define("IMG_ANCHO","380");
define("IMG_ALTO","400");
$imagenesLinea = 3; 


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
   
   if (substr_count($file,".pdf")!==0	and strcmp ($numSerie,$nombreArchivo)==0)
    {
    if ($x%$imagenesLinea!=0) 
    { printf("<tr>");   }	
    printf ("<td>");
	//printf ("<a href='visor_jpg.php?numSerie=".$file."'>");
	//echo  $nuevo_direc.$file."<br>";
  printf ("<embed src=".$nuevo_direc.$file."  "); 
	printf (" width=".IMG_ANCHO ." height=". IMG_ALTO." >");
	//printf ("</a>");
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