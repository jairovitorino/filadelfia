<?php 
session_start();
include "cabecalho/cabecalho.php";
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

function move_i(what) { what.style.background='#cccccc'; }
function move_o(what) { what.style.background='#F5F5F5'; }

function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
}
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$msg = $_SESSION["msg_session"];
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="5" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda">
        <?php
   if ($msg){
     echo "<div align='left'><img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="4%" class="labelEsquerda">Alterar</td>
      <td width="70%" class="labelEsquerda">Nome</td>
      <td width="11%" class="labelEsquerda">Status</td>
      <td width="9%" class="labelEsquerda">Cadastro</td>
      <td width="6%" class="labelCentro">Excluir</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * 
	FROM usuarios, status 
	WHERE usuarios.fk_status = status.pk_status AND cl_status = '6' AND pk_usuario <> 123 ORDER BY nm_usuario");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_usuario = mysql_result($sql, $z, "pk_usuario");
	$dt_cadastro = mysql_result($sql, $z, "dt_cadastro");
	$dt_cadastro = substr($dt_cadastro,8,2). "/" .substr($dt_cadastro,5,2). "/" .substr($dt_cadastro,0,4);
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?alterarUsuarioLista=alterarUsuarioLista&pk_usuario=<?php echo $pk_usuario;?>')"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_usuario");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_status");?></td>
      <td class="labelEsquerda"><?php echo $dt_cadastro;?></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirUsuario=excluirUsuario&pk_usuario=<?php echo $pk_usuario;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
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
<?php include "rodape/rodape.php";?>
</html>
