	<script>
		$("document").ready(function(){
			//var page=$(this);
			
			$("#btnformulario").click( function(){
				$("#seccion").load("./alta/desp_alta.php");
					return false;});

			$("#btnbusqueda").click( function(){
				$("#seccion").load("./busqueda/desp_busqueda.php");
					return false;});
				
				$("#btnmodifi").click( function(){
				$("#seccion").load("./modificacion/desp_modificacion.php");
					return false;});
		
				$("#btnhistorial").click( function(){
				$("#seccion").load("./historial/desp_historial.php");
					return false;});


				$("#btnreportes").click( function(){
					window.open('./reporte/repo.php');
					return false;});

				$("#btnsalir").click( function(){
					//window.closedir('.../index.php');
					//window.location('.../index.php');
					window.location.href="../index.php";
					session_destroy();
					return false;});
			
		});

	</script>
				

<form class="menu">
<h3>
<input type="button" class="btn btn-primary menuPrincipal" value="Alta Vehículo" id="btnformulario" ><br>
	
<input type="button" class="btn btn-primary menuPrincipal" value="Busquedas" id="btnbusqueda" ><br>

<input type="button" class="btn btn-primary menuPrincipal" value="Modificacion" 
	id="btnmodifi" ><br>
<input type="button" class="btn btn-primary menuPrincipal" value="Historial"
 id="btnhistorial" ><br>
<input type="button" class="btn btn-primary menuPrincipal" value="Reportes"
	id="btnreportes" ><br>	
<input type="button" class="btn btn-primary menuPrincipal" value="Salir"
id="btnsalir">
</h3>
</form> 

