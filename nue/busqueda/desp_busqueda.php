<script>
$("#buscar").click( function(e){
    var tipoPeticion = "./busqueda/variable_busque.php"   
    var datosForm= $("#search_form").serialize();//genera parametros para pasarlos al post
    e.preventDefault();
    $.post(tipoPeticion,datosForm,function(respuesta,estado,objetoAjax){
    $('#resultado').html(respuesta); 
    });
    return false; });

$("#limpiar").click( function(){
       $('#resultado').html("");  });





</script>

<div class = "busqueda">
<form name="search_form" id="search_form" class="navbar-form navbar-left" role="search"><!--Esto es un bootstrap for navbar-->
  <div class="form-group" >
    <input type="text" class="form-control"  maxlength="6" placeholder="Número de Placa" 
      name = "placas" required >
    <input type="text" class="form-control"  maxlength="17" placeholder="Num. Serie" 
        name = "serie" required >
  </div>
   <p> 
			<input type = "button" class="btn btn-default" value = "Buscar" id="buscar">
			<input type = "reset"  class="btn btn-default" value ="Limpiar" id="limpiar">
     
			</p>
   <div id="resultado"></div>   
</form>
</div>
