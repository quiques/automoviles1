<?php


	session_start(); 


	if($_SESSION['validacion'] == 1){
?>


<html>
<head>
	<title>Sistema de registro vehicular</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/gam.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dist/sweetalert.css">
	
</head>
<body>
	<script src="./js/jquery-3.0.0.min.js"></script>
	<script src="./dist/sweetalert.min.js"></script>

	<script></script>

	<div class="container">
	<header class="row">
        <?php require ("./header.php");?> </header>
	
	<div class="row">
		<div class="col-md-2"><!--para poner el menu como deseas nececitas ponerle 12 -->
		<aside><?php require ("./menu.php");?></aside>
		</div>
		<div class="col-md-10">				
		<section = id="seccion">
         
         </section>
		</div>	
	</div>
</div>
	<!--<footer class="row">
		<?php //require ("./piePagina.php");?>
	</footer>-->
	<div>
</body>
</html>
<?php 
}else{

	header("Location: index.php");
}


?>