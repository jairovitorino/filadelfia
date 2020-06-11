<?php
if (IsSet($_COOKIE["login"]))
$login = $_COOKIE["login"];

if (IsSet($_COOKIE["senha"]))
$senha = $_COOKIE["senha"];

if ( !(empty($login) OR empty($senha)) )
{
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$resultado = mysql_query("SELECT * FROM usuarios WHERE nm_login = '".$login."' ");
	if ( mysql_num_rows($resultado) == 1 )
	{
		//if ($senha != mysql_result($resultado, 0, "nm_senha"))
		if ($senha != mysql_result($resultado, 0, "nm_senha"))
		{
			setcookie("login");
			setcookie("senha");
			echo "Voce não efetuou o LOGIN!";
			exit;
		}
	}
	else
	{
			setcookie("login");
			setcookie("senha");
			echo "Voce não efetuou o LOGIN!";
			exit;
		
	}
}
else 
{
	echo "Voce não efetuou o LOGIN!";
	exit;
}
//mysql_close($conn);
?>