<?php
class Venda {
	private $idVenda;
	private $idStatus;
	private $nuVenda;
	private $vlTotal;
	private $dtVenda;
	private $nuMes;
	private $nuAno;
	private $param;
	private $nuParcela;
	private $teHistorico;
	
	public function Venda(){
	}
	public function setIdVenda($idVenda){
		$this-> idVenda = $idVenda;
	}
	public function getIdVenda(){
	return $this-> idVenda;
	}
	public function setIdStatus($idStatus){
		$this-> idStatus = $idStatus;
	}
	public function getIdStatus(){
	return $this-> idStatus;
	}
	
	public function setNuVenda($nuVenda){
		$this-> nuVenda = $nuVenda;
	}
	public function getNuVenda(){
	return $this-> nuVenda;
	}
	public function setVlTotal($vlTotal){
		$this-> vlTotal = $vlTotal;
	}
	public function getVlTotal(){
	return $this-> vlTotal;
	}
	public function setDtVenda($dtVenda){
		$this-> dtVenda = $dtVenda;
	}
	public function getDtVenda(){
	return $this-> dtVenda;
	}
	public function setNuAno($nuAno){
		$this-> nuAno = $nuAno;
	}
	public function getNuAno(){
	return $this-> nuAno;
	}
	public function setNuMes($nuMes){
		$this-> nuMes = $nuMes;
	}
	public function getNuMes(){
	return $this-> nuMes;
	}
	
	public function setParam($param){
		$this-> param = $param;
	}
	public function getParam(){
	return $this-> param;
	}
	public function setNuParcela($nuParcela){
		$this-> nuParcela = $nuParcela;
	}
	public function getNuParcela(){
	return $this-> nuParcela;
	}	
	public function setTeHistorico($teHistorico){
		$this-> teHistorico = $teHistorico;
	}
	public function getTeHistorico(){
	return $this-> teHistorico;
	}	

}
?>