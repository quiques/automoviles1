<?php
include("../conexion/conexion.php");
//falta agregar campos a la base de datos tbl marcas para 
//y por consecuente ver como unirlas por variables con la de submarca 
$idmarcas = $_GET['id'];

$busqueda = new conexion; 

$query = "select * from tblsubm where idmarcas like  '".$idmarcas."%'" ;
//$query = "select * from tblsubm where idmarcas in (  
//	select idmarcas from tblmarca where nmarca =  ".$idmarcas.")";

$consulta = mysql_query($query,$busqueda->conexion);
	 while ($row = mysql_fetch_array($consulta)) {
 		echo '<option value"'.$row['idsubm '].'">'.$row["nsubm"].'</option>';
 	 }
?>