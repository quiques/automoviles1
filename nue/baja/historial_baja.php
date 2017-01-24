<script>
function Baja(clave)
{ 
	swal({
  title: "Esta seguro que dese borrar?",
  text: "Si borra el automovil no lo podra recuperar!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "si, borrar!",
  cancelButtonText: "No, cancelar!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Borrado!", "La informacion sobre este vehiculo a sido borrada.", "success");
	$("#serie").val(clave);
  $("#placas").val("");
  var tipoPeticion = "/automoviles/nue/baja/btn_baja.php"   
  var datosForm= $("#borra").serialize();//genera parametros para pasarlos al post
   //e.preventDefault();
	//$('#resultado2').html("selecciono:"+clave);
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){
	//alert(respuesta);	
   $('#resultado2').html("");

	return false; 

    });
  } else {
    swal("Cancelar", "La informacion sobre este vehiculo sigue intacta", "error");
	
  }
});
	
	//	$('#resultado3').html("");
	//alert ("selecciono:"+clave);
    //$('#resultado').html("");  });
}

</script>

<?php
include("../conexion/conexion.php");
$serie = $_POST['serie'];

$busqueda = new conexion; 

	$query = "select * from aseguramiento where NumSerie ='".$serie."'";
	// 23-11-16-echo $query;
	$consulta = mysql_query($query,$busqueda->conexion);



					if (	$row = mysql_fetch_array($consulta)) {
		
						echo "<form id='borra' name='btnbaja'>";
						$claveRow = "'".$row["NumSerie"]."'";
						echo "<input type='hidden' name='placas' id='placas'>";
						echo "<input type='hidden' name='serie' id='serie'>";
						 echo "<table class='table'>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Marca:</label>';
						 echo '<input type="text" class="form-control" name="marca" size="30" readonly="readonly"';
						 echo  "value=".$row['Marca'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Submarca:</label>';
			             echo '<input type="text" name="smarca" class="form-control" size="30" readonly="readonly"';
			             echo "value=".$row["Submarca"].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Numero Placa:</label>';
						 echo '<input type="text" name="nplaca" class="form-control"size="30"readonly="readonly"';
						 echo "value=".$row['NumPlaca'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Numero Motor:</label>';
						 echo '<input type="text" name="nmotor" class="form-control" size="30" readonly="readonly"';
						 echo "value=".$row['NumMotor'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Numero Serie:</label>';
						 echo '<input type="text" name="nserie" class="form-control" size="30" readonly="readonly"';
						 echo "value=".$row['NumSerie'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Funcion a desempeñar:</label>';
						 echo '<input type="text" name="fad" class="form-control" size="30" readonly="readonly" ';
						 echo "value=".$row['Funcion'].">";
						 echo "</td></tr>";
						 echo "</textarea>";
						 echo "</tr></td>";
						 echo "</table>";

						 //echo'<input type = "button"  class="btn btn-default" value ="baja" id="baja">';
						 echo '<button type = "button" class="btn btn-default"';
							 echo ' onclick="Baja('.$claveRow.')" ';
							 echo ' id="fuera">Baja</button>';
						echo '</form>';
						  
						
		} //if

		else {

			echo "no se encontro ".$query; 

		}
			

				
mysql_close($busqueda->conexion);
//$busqueda->cerrar();
//revisasr los errores al cerrar conexiones 

?>
