<?php
class Liberacao {
	private $idLiberacao;
	private $nuLiberacao;
	private $dtEmissao;
	private $dtLiberacao;
	
	public function Detalhe(){
	}
	public function setIdLiberacao($idLiberacao){
		$this-> idLiberacao = $idLiberacao;
	}
	public function getIdLiberacao(){
		return $this-> idLiberacao;
	}
	public function setNuLiberacao($nuLiberacao){
		$this-> nuLiberacao = $nuLiberacao;
	}
	public function getNuLiberacao(){
		return $this-> nuLiberacao;
	}
	public function setDtEmissao($dtEmissao){
		$this-> dtEmissao = $dtEmissao;
	}
	public function getDtEmissao(){
		return $this-> dtEmissao;
	}
	public function setDtLiberacao($dtLiberacao){
		$this-> dtLiberacao = $dtLiberacao;
	}
	public function getDtLiberacao(){
		return $this-> dtLiberacao;
	}

}
?>