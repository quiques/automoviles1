<?php

class conexion{

	public $conexion; 
	private $server = "localhost"; 
	private $usuario = "root"; 
	private $pass = "";
	private $db = "db_autos"; 
	private $user ; 
	private $password;


	public function __construct(){

		$this->conexion = mysql_connect($this->server, $this->usuario, $this->pass);
		mysql_select_db($this->db);
		if($this->conexion==false){

			die("Fallo al tratar de conectar con MySQL: (". $this->conexion->connect_errno.")");


		}
	}

	public function cerrar(){

		$this->conexion->close();

	}
}


?>