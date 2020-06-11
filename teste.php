<?php
require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT nm_membro, dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE 
	FROM membros
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 27 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 50 ORDER BY dt_nascimento DESC");
	$i = 0;
	while ( $vetor = mysql_fetch_array($sql) ){
	$i = $i + 1;
	
	echo $vetor['nm_membro']."  -  ";
	echo $vetor['IDADE']."<br>";
	}
	echo $i;
?> 