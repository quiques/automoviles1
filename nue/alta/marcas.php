<?php
include("../conexion/conexion.php");
//falta agregar campos a la base de datos tbl marcas para 
//y por consecuente ver como unirlas por variables con la de submarca 

$busqueda = new conexion; 


$query = "select * from tblmarca";

$consulta = mysql_query($query,$busqueda->conexion);


	 while ($row = mysql_fetch_array($consulta)) {

 		echo '<option valor="'.$row['idmarcas'].'">'.$row["nmarca"].'</option>';
 	 }
?>