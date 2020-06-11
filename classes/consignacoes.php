<?php
class Consignacao {
	private $idConsignacao;
	private $nuConsignacao;
	private $nuConsignacaoAno;
	private $nuAno;
	private $idFornecedor;
	private $nmFornecedor;
	private $idDetalhe;
	private $vlDetalhe;
	private $vlTotal;
	private $ctConsignacao;
	private $dtCadastro;
	private $idStatus;
	private $idUsuario;
	private $param;

	public function Consignacao(){
	}
	public function setIdConsignacao($idConsignacao){
		$this-> idConsignacao = $idConsignacao;
	}
	public function getIdConsignacao(){
	return $this-> idConsignacao;
	}
	public function setNuConsignacao($nuConsignacao){
		$this-> nuConsignacao = $nuConsignacao;
	}
	public function getNuConsignacao(){
	return $this-> nuConsignacao;
	}
	public function setNuConsignacaoAno($nuConsignacaoAno){
		$this-> nuConsignacaoAno = $nuConsignacaoAno;
	}
	public function getNuConsignacaoAno(){
	return $this-> nuConsignacaoAno;
	}
	public function setNuAno($nuAno){
		$this-> nuAno = $nuAno;
	}
	public function getNuAno(){
	return $this-> nuAno;
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
	public function setIdDetalhe($idDetalhe){
		$this-> idDetalhe = $idDetalhe;
	}
	public function getIdDetalhe(){
	return $this-> idDetalhe;
	}	
	public function setVlDetalhe($vlDetalhe){
		$this-> vlDetalhe = $vlDetalhe;
	}
	public function getVlDetalhe(){
	return $this-> vlDetalhe;
	}
	public function setVlTotal($vlTotal){
		$this-> vlTotal = $vlTotal;
	}
	public function getVlTotal(){
	return $this-> vlTotal;
	}
	
	public function setCtConsignacao($ctConsignacao){
		$this-> ctConsignacao = $ctConsignacao;
	}
	public function getCtConsignacao(){
	return $this-> ctConsignacao;
	}
	public function setDtCadastro($dtCadastro){
		$this-> dtCadastro = $dtCadastro;
	}
	public function getDtCadastro(){
	return $this-> dtCadastro;
	}
	public function setIdStatus($idStatus){
		$this-> idStatus = $idStatus;
	}
	public function getIdStatus(){
	return $this-> idStatus;
	}
	public function setIdUsuario($idUsuario){
		$this-> idUsuario = $idUsuario;
	}
	public function getIdUsuario(){
	return $this-> idUsuario;
	}
	
	public function setParam($param){
		$this-> param = $param;
	}
	public function getParam(){
	return $this-> param;
	}
	
}
?>