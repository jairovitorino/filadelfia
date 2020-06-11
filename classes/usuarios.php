<?php
class Usuario {
	private $idUsuario;
	private $nmUsuario;
	private $nmLogin;
	private $nmSenha;
	private $idStatus;
	private $nmStatus;
	private $nuTelefone;
	private $nuMatricula;
	private $nmEndereco;
	private $nuCpf;
	private $dtCadastro;

	public function Usuario(){
	}
	public function setIdUsuario($idUsuario){
		$this-> idUsuario = $idUsuario;
	}
	public function getIdUsuario(){
	return $this-> idUsuario;
	}
	public function setNmUsuario($nmUsuario){
		$this-> nmUsuario = $nmUsuario;
	}
	public function getNmUsuario(){
	return $this-> nmUsuario;
	}
	public function setNmLogin($nmLogin){
		$this-> nmLogin = $nmLogin;
	}
	public function getNmLogin(){
	return $this-> nmLogin;
	}
	public function setNmSenha($nmSenha){
		$this-> nmSenha = $nmSenha;
	}
	public function getNmSenha(){
	return $this-> nmSenha;
	}
	public function setIdStatus($idStatus){
		$this-> idStatus = $idStatus;
	}
	public function getIdStatus(){
	return $this-> idStatus;
	}
	public function setNmStatus($nmStatus){
		$this-> nmStatus = $nmStatus;
	}
	public function getNmStatus(){
	return $this-> nmStatus;
	}
	
	public function setDtCadastro($dtCadastro){
		$this-> dtCadastro = $dtCadastro;
	}
	public function getDtCadastro(){
	return $this-> dtCadastro;
	}
	public function setNuTelefone($nuTelefone){
		$this-> nuTelefone = $nuTelefone;
	}
	public function getNuTelefone(){
	return $this-> nuTelefone;
	}
	
	public function setNuMatricula($nuMatricula){
		$this-> nuMatricula = $nuMatricula;
	}
	public function getNuMatricula(){
	return $this-> nuMatricula;
	}
	public function setNmEndereco($nmEndereco){
		$this-> nmEndereco = $nmEndereco;
	}
	public function getNmEndereco(){
	return $this-> nmEndereco;
	}
	public function setNuCpf($nuCpf){
		$this-> nuCpf = $nuCpf;
	}
	public function getNuCpf(){
	return $this-> nuCpf;
	}




}
?>