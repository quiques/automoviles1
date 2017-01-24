
<script>
$("#enviar").click( function(e){
    var tipoPeticion = "./modificacion/btnmodifica.php"   
    var datosForm= $("#search_form").serialize();//genera parametros para pasarlos al post
    e.preventDefault();
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){
    	//$('#search_form').html(""); 
		swal("Excelente", "Ahora carga tu Archivo", "success")
    });
    return false; });


$("#cargar").click( function(e){
    var tipoPeticion = "./modificacion/modifica_carga.php"   
    e.preventDefault();
    //var datosForm= $("#search_form").serialize();//genera parametros para pasarlos al post
    //var file = $('#filefact').val();
    //alert (file);
	//swal("dimeloñengo");
	$.ajax({
    type: 'POST',
    url: tipoPeticion,
	    //data: $('#filefact').attr('files'),
		data: new FormData($("#search_form")[0]),
                 processData: false, 
                 contentType: false, 
                 success: function(returnval){
                           // $("#show1").html(returnval);
                           // $('#show1').show();
                           //alert(returnval);
						   $('#search_form').html(""); 
						   swal({
  						   title: "Bien hecho",
  						   text: "Se han modificado tus datos",
  						   timer: 1500,
 						   showConfirmButton: false
								});
                          }  
            });
	
   /* $.post(tipoPeticion, { "file": file }, function(respuesta,estado) {
    	alert(respuesta);
    	$('#resultado').html(respuesta); 
    });*/
    return false; });

</script>


<?php
include("../conexion/conexion.php");
$serie = $_POST['serie'];

$busqueda = new conexion; 

	$query = "select * from aseguramiento where NumSerie ='".$serie."'";
	$consulta = mysql_query($query,$busqueda->conexion);

//    if (isset($_POST['Marca'])&&($_POST['Submarca'])&&($_POST['Transmision'])&&($_POST['NumPlaca'])&&
//				($_POST['NumMotor'])&&($_POST['NumSerie'])&&($_POST['Funcion'])&&($_POST['NumEconomico'])&&
//						($_POST['EquipoEspecial'])&&($_POST['ValorEquipoEspecial'])&&($_POST['CFACT'])&&($_POST['CTIC'])&&
//						($_POST['Otros'])&&($_POST['Observaciones']))
//		{
					//$row = mysql_fetch_array($consulta)

					if (	$row = mysql_fetch_array($consulta)) {
		
						 
						 echo "<br><form id='search_form'>";
						 echo "<h1>El vehículo a Modificar: </h1> "; 
						 echo "<table class='table'>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Marca:</label>';
						 echo '<input type="text" class="form-control" name="marca" size="30" readonly="readonly"';
						 echo  "value=".$row['Marca'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Submarca:</label>';
			             echo '<input type="text" name="smarca" class="form-control" size="30" readonly="readonly"';
			             echo "value=".$row["Submarca"].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Transmision:</label>';
						 echo '<input type="text" name="transmicion" class="form-control" size="30" readonly="readonly"';
						 echo "value=".$row['Transmision'].">";
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
						 echo '<input type="text" name="fad" class="form-control" size="30"';
						 echo "value=".$row['Funcion'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Numero Economico:</label>';
						 echo '<input type="text" name="neconomico" class="form-control" size="30" readonly="readonly"';
						 echo "value=".$row['NumEconomico'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Equipo especial:</label>';
						 echo '<input type="text" name="ee" class="form-control" size="30"';
						 echo "value=".$row['EquipoEspecial'].">";
						 echo "</td></tr>";
						 echo '<tr><td><label  class="col-lg-2 control-label">Valor equipo especial:</label>';
						 echo '<input type="text" name="vee" class="form-control" size="30"';
						 echo "value=".$row['ValorEquipoEspecial'].">";
						 echo "</td></tr>";
						 

						 echo '<tr><td><label  class="col-lg-2 control-label">C.TC:</label>';
						 echo '<input type="text" name="tc" class="form-control" size="30"';
						 echo "value=".$row['CTIC'].">";
						 echo "</td></tr>";
						 echo '<tr><td> <label  class="col-lg-2 control-label">Otros:</label>';
						 echo '<input type="text" name="otros" class="form-control" size="30"';
						 echo "value=".$row['Otros'].">";
						 echo "</td></tr>";
						 echo '<tr><td> <label  class="col-lg-2 control-label">Observacion:</label>';
						 echo '<textarea class="form-control" rows="2" maxlength="100" name="observaciones" ';
						 echo "value=".$row['Observaciones'].">";
						 echo "</textarea>";
						 echo '<br>';
						 echo'<input type = "button" class="btn btn-default" value ="Modifica" id="enviar">';
						 
						 echo '<tr><td><label  class="col-lg-2 control-label">C.FACT:</label>';
						 echo '<input type="text" name="fact" class="form-control"  size="30" readonly="readonly"';
						 echo "value=".$row['CFACT'].">";
						 echo '<input type="file" id="filefact" class="form-control" name="filefact">';
						 echo'<input type = "button" class="btn btn-default" value ="Cargar" id="cargar">';
						 echo "</td></tr>";
						 echo "</tr></td>";
						 echo "</table>";
						 
						 
						 echo '</form>';
						 //required	
						 //poner los campocon required para que no los brinque 
						 //	if $fact=="si"; modificacion
						//			archivo.checked=true; // html
						//			jquery colocar tirubtos   $("#campo").atrr("checked",true)

						 
						
		} //if

		else {

			//echo "no se encontro ".$query;
			echo'<script>sweetAlert("Los datos no son correctos", "Vuelve a Ingresarlos", "error");</script>'; 

		}
			

				
mysql_close($busqueda->conexion);
//$busqueda->cerrar();
//revisasr los errores al cerrar conexiones 

?>
