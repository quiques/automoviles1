<?php
include("../conexion/conexion.php");

$plac = $_POST['placas'];
$serie = $_POST['serie'];

$busqueda = new conexion; 

	if ($plac=="" and $serie=="")
	{echo "<b>Introduzca un valor de busqueda</b>";
	return;
	}	
	$condicion=" where ";
	$paso=0;
	if ($plac!="")
		{$condicion.=" NumPlaca='".$plac."'"; $paso=1; } 
 	if ($serie!="")
   	  {  if ($paso==1)
			{$condicion.=" and ";  }  
		$condicion.="  NumSerie ='".$serie."'";
	}

	$query = "select * from aseguramiento ".$condicion;
	//$query = "select * from aseguramiento where NumPlaca ='".$plac."' and NumSerie ='".$serie."'";
	 

		$consulta = mysql_query($query,$busqueda->conexion);
	//	echo count($consulta);
		
//como saber si el row ws vacio mande msj query mysqlarray esta vacio
		//validacion con jquery o jscript
		if($row = mysql_fetch_array($consulta)){
			

			echo "<h1>Tu busqueda es: </h1> "; 
			echo "<br>";
			 echo "<table class= 'table table-striped'cellspacing='10' cellpadding='20' >";
			 echo "<tr><td><label for='marca' class='col-lg-2 control-label'>Marca:</label>".$row['Marca'];
			 	 "</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>Submarca:</label>".$row["Submarca"];
			 				"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>Transmision:</label>".$row['Transmision'];
			 			"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>No. Placa:</label>".$row['NumPlaca'];
			 			 "</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>No. Motor:</label>".$row['NumMotor'];
			 			"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>No. Serie:</label>".$row['NumSerie'];
			 			 "</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>Funcion A Desemeñar:</label>".$row['Funcion'];
			 			"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>No. Economico:</label>".$row['NumEconomico'];
			 			"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>Equipo especial:</label>".$row['EquipoEspecial'];
			 			 "</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>Valor Equipo Especial:</label>".$row['ValorEquipoEspecial'];
			 			 "</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>C.FACT:</label>".$row['CFACT'];
			  			"</td></tr>";
			 echo "<tr><td><label  class='col-lg-2 control-label'>C.TIC:</label>".$row['CTIC'];
			  			"</td></tr>";
			 echo "<tr><td> <label  class='col-lg-2 control-label'>Otros:</label>".$row['Otros'];
			  			"</td></tr>";
			 echo "<tr><td> <label  class='col-lg-2 control-label'>Observaciones:</label>".$row['Observaciones'];
			  			"</td></tr>";
			  "</table>";



		}else {

			//echo "no se encontro ".$query; 
			echo'<script>sweetAlert("Los datos no son correctos", "Vuelve a Ingresarlos", "error");</script>';
		}

mysql_close($busqueda->conexion);
//$busqueda->cerrar(); 

?>