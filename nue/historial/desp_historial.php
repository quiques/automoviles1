<div id="resultado2"></div>
<script>
function Modifica(clave)
{ 
  $("#serie").val(clave);
  $("#placas").val("");
  var tipoPeticion = "./modificacion/variable_modifica.php"   
  var datosForm= $("#botones").serialize();//genera parametros para pasarlos al post
   //e.preventDefault();
	//$('#resultado2').html("selecciono:"+clave);
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){
	//alert(respuesta);	
    $('#resultado2').html(respuesta);
	return false; 
    });
		$('#resultado3').html("");
	//alert ("selecciono:"+clave);
    //$('#resultado').html("");  });
    }

function Borra(clave)
{ 
	$("#serie").val(clave);
  $("#placas").val("");
  var tipoPeticion = "./baja/historial_baja.php"   
  var datosForm= $("#botones").serialize();//genera parametros para pasarlos al post
   //e.preventDefault();
	//$('#resultado2').html("selecciono:"+clave);
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){
	//alert(respuesta);	
    $('#resultado2').html(respuesta);

	return false; 

    });
		$('#resultado3').html("");
	//alert ("selecciono:"+clave);
    //$('#resultado').html("");  });
}

 </script> 

<?php
include("../conexion/conexion.php");


$busqueda = new conexion; 
	
	$query2 ="select count(*) as cuantos 
			from aseguramiento where  activo!='N'";
	$consulta2 = mysql_query($query2,$busqueda->conexion);
	$row2 = mysql_fetch_array($consulta2);	
	$cuantos = $row2["cuantos"];

 	$query ="select * 
 	 		from aseguramiento 
 	 		where  activo!='N'
 	 		ORDER BY Fecha desc limit 50";
	
	$consulta = mysql_query($query,$busqueda->conexion);
		echo '<div id="resultado3">';
		//echo "<h1>Historial listado de las ultimas altas : </h1> "; 
		echo "Registros encontrados:".$cuantos."";
			echo "<br>";
			echo '<td>';
			echo "<form id='botones' name='botones'>";
			echo "<input type='hidden' name='placas' id='placas'>";
			echo "<input type='hidden' name='serie' id='serie'>";
			echo '<table class= "table table-striped">';
					echo "<thead>";
					    echo" <tr>";
						  echo "<th>N° serie</th>";      
						  echo " <th>Marca </th>";     
						  echo "<th>Submarca</th>";
						  echo "<th>Factura</th>";
						        
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
		
		while ($row = mysql_fetch_array($consulta, MYSQL_ASSOC))
			{ echo "<tr>";
					$claveRow = "'".$row["NumSerie"]."'";
							 echo '<td>'.$row["NumSerie"];'</td>';
							 echo '<td>'.$row["Marca"];'</td>';
							 echo '<td>'.$row["Submarca"];'</td>';
							 echo '<td>';
							 if ($row["CFACT"]=="Si")
							 	{//echo "<a href='"."../nue/archivos/".$row["NumSerie"].".jpg' target='_blank'>";
							 //despliega_docto.php?numSerie=0000000002

							   echo "<a href='./historial/despliega_docto.php/?numSerie=".$row["NumSerie"]."' target='_blank'>";
							 	echo $row["CFACT"];
							 	echo "</a>";}

							 else {echo $row["CFACT"];}	
							 echo  '</td>'; 
							 echo '<td><button type="button" class="btn btn-default" ';
							 echo ' onclick="Modifica('.$claveRow.')" ';
							 echo '	id="Modificar">Modificar</button></td>';
							 echo '<td><button type = "button" class="btn btn-default"';
							 echo ' onclick="Borra('.$claveRow.')" ';
							 echo ' id="Baja">Baja</button></td>';
			 	echo "</tr>";
				
			 	 }
				
			echo "</tbody>";
  			
  		echo "</table>";	

	echo '</form>';

echo '</td>';

		echo '</div>';			

mysql_close($busqueda->conexion);
//$busqueda->cerrar(); 

?>
