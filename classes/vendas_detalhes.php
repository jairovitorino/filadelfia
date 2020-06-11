<?php
class Venda {
	private $idVenda;
	private $nuVenda;
	private $vlTotal;
	private $dtVenda;
	private $nuAno;
	
	public function Venda(){
	}
	public function setIdVenda($idVenda){
		$this-> idVenda = $idVenda;
	}
	public function getIdVenda(){
	return $this-> idVenda;
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


}
?>