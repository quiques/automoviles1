<script>
    $("document").ready(function(){
        $("#marcas").load("./alta/marcas.php");
       
        $("#marcas").change(function(){//cuando marca cambia ejecuta lo siguiente
          var id =$("#marcas").val();//Creamos una variable u toma los valores de marcas 
          //alert(id);
          $.get("./alta/submarcas.php?id="+id,{param_id:id})//Ejecutamos el metodo getla pagina donde ira ,envia el arreglo id y que se lleve valor id con param        .done(function(data){
                  .done(function(data){
                     $("#submarcas").html(data);//extrame llos datos en el select
                  })                     
        })
    })



    $("#cargar").click( function(e){
    var tipoPeticion = "./modificacion/modifica_carga.php"   
    e.preventDefault();
    //var datosForm= $("#search_form").serialize();//genera parametros para pasarlos al post
    $.ajax({
    type: 'POST',
    url: tipoPeticion,
		data: new FormData($("#formregis")[0]),
                 processData: false, 
                 contentType: false, 
                 success: function(returnval){
                           //alert(returnval);
                           swal("Exelente", "Todo listo el vehiculo tiene factura", "success")
                           $("#formulario").html(""); // borra contenido
                          }  
            });
	
      return false; });
</script>
<!--Este es para enviar los archivos que son ctic y cfac-->




<!--En este haremos que envie todos los datos del formulario preguntar si se fuciona con el anterior -->
<script>
$("#enviar").click( function(e){
    if ($("#nserie").val().length < 1)
        { swal({
  title: "Ingresa el N°Serie",
  text: "Este dato es necesario",
  timer: 1500,
  showConfirmButton: false
});
            return false;}  // validar vacios -- cambiar por alert

    $("#filefact")

    var tipoPeticion = "./alta/variable_alta.php"   
    var datosForm= $("#formregis").serialize();//genera parametros para pasarlos al post
    e.preventDefault();
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){


        //swal("Se inserto el automovil correctamente, cargue ahora el archivo");
        swal("Excelente", "Se inserto el automovil correctamente, cargue ahora el arhivo", "success")
        //$('#resultado').html(respuesta);$('#formulario').html("");//ver la funcion desdeel $ formulario 
    });
    return false; });
     //$('#resultado').html("");  //});
</script>

<!--Breves estilos de css-->
<style type="text/css">
#formulario #formregis .form-group .col-lg-10 p {
    text-align: right;
}
#formulario #formregis p {
    text-align: right;
}
</style>
<!---->

<div id="formulario">
<h2>Alta de Vehículo</h2>
  <form class="form-horizontal" role="form" name="formregis" id="formregis"  >

   <div class="form-group">
         <label for="marca" class="col-lg-2 control-label">Marca:</label>
         <div class="col-lg-10">
            <select class="form-control" name="marcas" id="marcas">
             </select>
         </div>
    </div>
    <div class="form-group">
         <label for="marca" class="col-lg-2 control-label">Submarca:</label>
         <div class="col-lg-10">
        <select class="form-control" name="submarcas" id="submarcas">
            <option></option>         
                </select>

         </div>
    </div> 

     <div class="form-group">
         <label  class="col-lg-2 control-label">Transmision:</label>
         <div class="col-lg-10">
             <select class="form-control" name="transmision" >
                   <option>Manual</option>
                   <option>Automatico </option>
                </select>
         </div>
 </div>
    <div class="form-group">
         <label  class="col-lg-2 control-label">No. Placa:</label>
         <div class="col-lg-10">
        <input type="text" class="form-control"  name="nplaca" maxlength="6" size="30">
          </div>
 </div>
     <div class="form-group">
         <label  class="col-lg-2 control-label">No. Motor:</label>
         <div class="col-lg-10">
            <input type="text" class="form-control" name="nmotor" maxlength="15" size="30">
       </div>
 </div>
    <div class="form-group">
         <label  class="col-lg-2 control-label">No. Serie:</label>
         <div class="col-lg-10">
             <input type="text" class="form-control" id="nserie" name="nserie" maxlength="17" size="30">
        </div>
    </div>
    <div class="form-group">
         <label  class="col-lg-2 control-label">Tipo de funcion:</label>
         <div class="col-lg-10">
            <select class="form-control" name="fad" >
                   <option>Operativo</option>
                   <option>Administrativo </option>
                </select>
        </div>
    </div>
     <div class="form-group">
         <label  class="col-lg-2 control-label">No. Economico:</label>
         <div class="col-lg-10">
            <input type="text" class="form-control" name="neconomico" maxlength="6" size="30">
        </div>
    </div>
     <div class="form-group">
         <label  class="col-lg-2 control-label">Equipo especial:</label>
         <div class="col-lg-10">
             <input type="text" class="form-control" name="ee" maxlength="10" size="30">
         </div>
    </div>
    <div class="form-group">
         <label  class="col-lg-2 control-label">Valor Equipo Especial:</label>
         <div class="col-lg-10">
            <input type="text"  class="form-control"name="vee" maxlength="15" size="30">
        </div>
    </div>

    <div class="form-group ">
         <label  class="col-lg-2 control-label"> C.TC.:</label>
         <div class="col-lg-10">
        <input type="text" name="tc" class="form-control" size="30">
        </div>
    </div>
    <div class="form-group">
         <label  class="col-lg-2 control-label">Otros:</label>
         <div class="col-lg-10">
        <input type="text"  class="form-control" name="otros" maxlength="10" size="30">
     </div>
    </div>
     <div class="form-group">
         <label  class="col-lg-2 control-label">Observaciones:</label>
         <div class="col-lg-10">

            <p>
            <textarea class="form-control" rows="5" maxlength="30" name="observaciones"></textarea>
            </p>
        <p>
         <input  type="submit" class="btn btn-default" id="enviar" value="Enviar" size="30">
        </p>
        <p>&nbsp;</p>
         </div>
    </div>
    <h2>Documentación</h2> 
   <div class="form-group" enctype="multipart/form-data" id="subir" method="post">
         <label  class="col-lg-2 control-label">Factura:</label>
          <span class="col-lg-10">
            <input type="file" class="form-control" id="filefact" name="filefact" size="30">
        </span></span></h2>
    </div>
    <div class="radio">
    <p>
    
        <input type = "button" class="btn btn-default" value ="Cargar" id="cargar">
    </p>
</form>
</div>
 <div id="resultado"></div> 
