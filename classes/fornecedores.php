<?php
class Fornecedor {
	private $idFornecedor;
	private $nmFornecedor;
	private $nuCnpjCpf;
	private $nuTelefone;
	private $nmContato;
	private $nmEndereco;
	private $teObs;

	public function Fornecedor(){
	}
	public function setIdFornecedor($idFornecedor){
		$this-> idFornecedor = $idFornecedor;
	}
	public function getIdFornecedor(){
	return $this-> idFornecedor;
	}
	public function setNmFornecedor($nmFornecedor){
		$this-> nmFornecedor = $nmFornecedor;
	}
	public function getNmFornecedor(){
	return $this-> nmFornecedor;
	}
	public function setNuCnpjCpf($nuCnpjCpf){
		$this-> nuCnpjCpf = $nuCnpjCpf;
	}
	public function getNuCnpjCpf(){
	return $this-> nuCnpjCpf;
	}
	public function setNuTelefone($nuTelefone){
		$this-> nuTelefone = $nuTelefone;
	}
	public function getNuTelefone(){
	return $this-> nuTelefone;
	}
	public function setNmContato($nmContato){
		$this-> nmContato = $nmContato;
	}
	public function getNmContato(){
	return $this-> nmContato;
	}
	public function setNmEndereco($nmEndereco){
		$this-> nmEndereco = $nmEndereco;
	}
	public function getNmEndereco(){
	return $this-> nmEndereco;
	}
	public function setTeObs($teObs){
		$this-> teObs = $teObs;
	}
	public function getTeObs(){
	return $this-> teObs;
	}




}
?>