<?php
include("conexion.php");

$user = $_POST['usuario'];
$pass = $_POST['password']; 


$autos = new conexion; 
$autos->login($user, $pass);
$autos->cerrar(); 




?>