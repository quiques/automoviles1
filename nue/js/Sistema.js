function Sistema() { 

this.cargaMenu = cargaMenu;

} // sistema

function cargaMenu (xDestino)
{ //alert("Bienvenido a "+xDestino); 
//xRuta="./";
//xDestino=xDestino+".html";
//
alert(xRuta+xDestino);
xRuta="/formularios/catalogos/";
xDestino="catalogoAlmacenes.php";
window.open(xRuta+xDestino,"_self");
	//"test", "toolbar=no,menubar=no,width=200,height=200,resizable=yes")


}