
<?php
include("../conexion/conexion.php");

$busqueda = new conexion;
//revisar los codigos para actualizar una base de datos y despues saber como 
//actuali 

$numserie =$_POST['nserie'];


				

				$query="UPDATE tbl_aseguramiento set  Activo ='N'  where NumSerie ='".$numserie."'"; 

				$consulta = mysql_query($query,$busqueda->conexion);
	
				

 			
mysql_close($busqueda->conexion);


?>