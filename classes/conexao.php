<?php 
class Mysql {
	
	/*
	private $servidor = "mysql.lauraware.com.br";
	private $usuario = "lauraware03";
	private $senha = "m4r4v1";
	private $banco = "lauraware03";
	*/
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $banco = "filadelfia";
	
	public function setServidor($servidor){
			$this->servidor = $servidor;
		}
	public function getServidor(){
			return $this->servidor;
		}
	public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
	public function getUsuario(){
			return $this->usuario;
		}
	public function setSenha($senha){
			$this->senha = $senha;
		}
	public function getSenha(){
			return $this->senha;
		}
	public function setBanco($banco){
			$this->banco = $banco;
		}
	public function getBanco(){
			return $this->banco;
		}
	
	public function conectar(){

	$conn = mysql_connect($this->servidor,$this->usuario,$this->senha) or die (mysql_error());
	$db = mysql_select_db($this->banco,$conn);
	}

	
}

?>