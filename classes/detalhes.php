<?php 
class Detalhe {
	private $idDetalhe;
	private $nmFornecedor;
	private $idConsignacao;
	private $vlDetalhe;
	private $dtDetalhe;
	private $nuConsignacao;
	private $idUsuario;
	private $nuAno;
	private $param;
	
	public function Detalhe(){
	}
	public function setIdDetalhe($idDetalhe){
		$this-> idDetalhe = $idDetalhe;
	}
	public function getIdDetalhe(){
	return $this-> idDetalhe;
	}
	public function setNmFornecedor($nmFornecedor){
		$this-> nmFornecedor = $nmFornecedor;
	}
	public function getNmFornecedor(){
	return $this-> nmFornecedor;
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
	public function setIdUsuario($idUsuario){
		$this-> idUsuario = $idUsuario;
	}
	public function getIdUsuario(){
	return $this-> idUsuario;
	}
	public function setNuAno($nuAno){
		$this-> nuAno = $nuAno;
	}
	public function getNuAno(){
	return $this-> nuAno;
	}
	public function setVlDetalhe($vlDetalhe){
		$this-> vlDetalhe = $vlDetalhe;
	}
	public function getVlDetalhe(){
	return $this-> vlDetalhe;
	}
	public function setDtDetalhe($dtDetalhe){
		$this-> dtDetalhe = $dtDetalhe;
	}
	public function getDtDetalhe(){
	return $this-> dtDetalhe;
	}
	public function setParam($param){
		$this-> param = $param;
	}
	public function getParam(){
	return $this-> param;
	}

	
}
?>