<?php
$param = $_GET['param'];
require_once("conexao.php");
$mysql = new Mysql();
$mysql->conectar();

$sql = mysql_query("DELETE FROM consignacoes");
$sql = mysql_query("DELETE FROM detalhes");
require_once("metodos.php");
$metodos = new Metodos();
$metodos->redirect("../consignacao.php?param=$param");
	
	
?>