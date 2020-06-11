<?php

//CONECTA AO MYSQL DATE_FORMAT(dt_memo,' %d/%m/%Y ')             
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
/*	
$id = addslashes($_REQUEST['id']);
$image = mysql_query("SELECT * FROM `imagens` WHERE id='$id'");
$image = mysql_fetch_assoc($image);
$image = $image['image'];
header("Content-type: image/jpeg");
echo $image;
*/

$id = addslashes($_REQUEST['id']);
$image = mysql_query("SELECT * FROM `membros` WHERE pk_membro='$id'");
$image = mysql_fetch_assoc($image);
$image = $image['fg_membro'];
header("Content-type: image/jpeg");
echo $image;

?>