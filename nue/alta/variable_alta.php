<?php
include("../conexion/conexion.php");
 $busqueda = new conexion; 

				$marca=$_POST["marcas"];
				$smarca=$_POST["submarcas"];
				$transmicion=$_POST["transmision"];
				$nplaca=$_POST["nplaca"];
				$nmotor=$_POST["nmotor"];
				$nserie=$_POST["nserie"];
				$fad=$_POST["fad"];
				$neconomico=$_POST["neconomico"];
				$ee=$_POST["ee"];
				$vee=$_POST["vee"];

				//$archivo = $_FILES["fact"]["tmp_name"];//accede al archivo
				//$destino = "./alta/archivo/".$_FILES["fact"]["name"];//donde los vamos a guardar

				//move_uploaded_file($archivo, $destino);
				$ruta = "../archivos/";
					opendir($ruta);
					$destino = $ruta.$_FILES['foto']['name'];
					//$datos=form.serialize(); // POST
					// POSTEAR $_FILES JQUERY
					copy($_FILES['foto']['tmp_name'],$destino);
					$nombre =$_FILES['foto']['name'];

				if ($_Files["fact"] == null )//ver si el archivo esta vacio
					
					{
					$fact="no";
							
					}

				else
					$fact="si";

				//$fact=$_POST["fact"];
				//$tc=$_POST["tc"];
				$otros=$_POST["otros"];
				$observaciones=$_POST["observaciones"];
				$fecha = date('y-m-d');
				
   	

				//print_r ($_FILES); return;
				/*$archivo = $_FILES["fact"]["tmp_name"];//accede al archivo
				$destino = "./alta/archivo/".$_FILES["fact"]["name"];//donde los vamos a guardar

				move_uploaded_file($archivo, $destino);//el archivo temp+laruta que es el destino

				//echo "Se han subido los archivos";
				if ($_Files["fact"] == null)//ver si el archivo esta vacio
					{
					$fact="no";
						
					}

				else
					$fact="si";*/

	$query = "INSERT INTO aseguramiento ";

	$query .= "(Marca,Submarca,Transmision,NumPlaca,NumMotor,NumSerie,Funcion,NumEconomico,";
	$query .= "EquipoEspecial,ValorEquipoEspecial,CFACT,CTIC,Otros,Observaciones,Fecha)";
	$query .= "  VALUES  ('".$marca."','".$smarca."','".$transmicion."',";
	$query .= "'".$nplaca."','".$nmotor."','".$nserie."','".$fad."','".$neconomico."',";
	$query .= "'".$ee."','".$vee."','".$fact."','".$tc."','".$otros."','".$observaciones."','".$fecha."');";
	echo $query;

		$consulta = mysql_query($query,$busqueda->conexion);
	  
		//if($row = mysql_fetch_array($consulta)){
		//}else {

		//	echo "La consulta no se reaizo ".$query; 

		//}
		echo "<br>".$consulta;

mysql_close($busqueda->conexion);
//$busqueda->cerrar(); 

?>
