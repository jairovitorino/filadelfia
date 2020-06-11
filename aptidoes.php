<?php 
session_start();
include "cabecalho/cabecalho.php";
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>
<html>
<head>
<title>Igreja Batista Filad&eacute;lfia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<script language="JavaScript">
function caixas(){
	document.getElementById('nu_rg').focus();
}

function tpl(inserir){
document.location = inserir;
}
/*
function pesquisar(){
var mycodigo = document.getElementById('nu_rg');
if ( mycodigo.value ==""  )
alert("Favor informar o RG");
document.getElementById('nu_rg').focus;
}
*/
function move_i(what) { what.style.background='#cccccc'; }
function move_o(what) { what.style.background='#ffffff'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$nm = @$_SESSION["member"];
$pk_aptidao = $_SESSION["pk_aptidao_session"];
$nm_aptidao = $_SESSION["nm_aptidao_session"];
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="3" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><?php echo $nm_aptidao;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      
      <td width="24%" class="labelEsquerda">NOME</td>
      <td width="70%" class="labelEsquerda">TELEFONE</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * 
	FROM merces, membros, aptidoes 
	WHERE merces.fk_aptidao = aptidoes.pk_aptidao AND merces.fk_membro = membros.pk_membro AND fk_aptidao = ".$pk_aptidao." 
	ORDER BY nm_membro");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	//$pk_aptidao = mysql_result($sql, $z, "pk_aptidao");
	//$_SESSION["pk_aptidao_sql"] = $pk_aptidao;
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
     
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="80%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
