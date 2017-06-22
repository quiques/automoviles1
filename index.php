<?php			
	session_start();
	session_destroy();
?>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Inicio</title>
	<link href = "./css/login.css" rel = "stylesheet" type = "text/css">
	<script src="./js/jquery.js"></script>
    <script src="operaciones.js"></script>
</head>
<body>
<section id= "formulario">
	<center>
			<h1>Sistema de control vehicular<h1>
			<br><br>
			<div class = "login">
			<form action = "datos.php" method = "POST">
			<fieldset>
				<legend>Inicia sesion</legend>
				<p>
						<input type = "text"  class="usuario"  placeholder = "Usuario" title = "Se nesecita un usuario" required>
				</p>
				<p>
						<input type = "password" class="password" placeholder = "Contraseña" title = "Se nesecita una contraseña" required>
				</p>
				<p>
						<button type="button" id="envia">Entrar</button>
						<input type = "reset" value ="Limpiar">
				</p>
				<p id="mensaje" style="color: red;"></p>
				<p>				
				</a>
				</p>				
				</p>
			</fieldset>
			</form>
			</div>
	</center>
</section>
</body>
</html>