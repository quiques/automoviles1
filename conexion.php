<?php

class conexion{

	private $conexion; 
	private $server = "localhost"; 
	private $usuario = "root"; 
	private $pass = "";
	private $db = "autos"; 
	private $user ; 
	private $password;


	public function __construct(){

		$this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);

		if($this->conexion->connect_errno){

			die("Fallo al trratar de conectar con MySQL: (". $this->conexion->connect_errno.")");


		}
	}

	public function cerrar(){

		$this->conexion->close();

	}


	public function login($usuario, $pass){

		$this->user = $usuario;
		$this->password = $pass;

		$query = "select nombre, apellido, usuario, password, perfiles from logueo where usuario = '".$this->user."' and password = '".$this->password."'";
		$consulta = $this->conexion->query($query);

		$row = mysqli_fetch_array($consulta);


		if($row['perfiles'] == 1 ){ 

			session_start(); 

			$_SESSION['validacion'] = 1 ; 

			echo "./nue/principal.php"; 


		}else if($row['perfiles'] == 2) {

			session_start(); 

			$_SESSION['validacion'] = 1 ; 
			echo "operario.php"; 

		}else{

			session_start(); 

			$_SESSION['validacion'] = 0 ; 
			echo "1";
		}

		









	}

















}









?>