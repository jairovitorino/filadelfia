<?php 
session_start();
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>
<html>
<head>
<title>Igreja Batista Filad&eacute;lfia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function caixas(){
	document.getElementById('nm_profissao').focus();
}
function tpl(detUrl){
document.location = detUrl;
}
function validar_cmpo(nmCmpo){

if ( document.getElementById('nm_profissao').value == "" ){
alert("preencher o campo Nome");
nmCmpo.document.getElementById('nm_profissao').focus(); 
nmCmpo.document.getElementById('nm_profissao').style.border="1px solid red";
return (false);
}
return (true);
}
</script>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="images/din.jpg"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<?php
$nm_usuario = $_SESSION["user"];
$pk_profissao = $_SESSION["pk_profissao_session"];
$msg = $_SESSION["msg_session"];
?>
<form name="form1" method="post" action="classes/interface.php" onSubmit="return validar_cmpo(this)">
  <table width="67%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
   <tr> 
      <td colspan="6" class="labelCentro" bgcolor="#000099"><div align="center"><font color="#FFFFFF">CADASTRO 
          DE PROFISS&Atilde;O</font></div></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> 
        <?php
   if ($msg){
   echo "<div align='left'><img src='img/msg_verde.gif' width='20' height='20'><font color='#006600' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</div></font></td>
    </tr>
    <?php
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * FROM profissoes WHERE pk_profissao = ".$pk_profissao." ");
	$row = mysql_num_rows($sql);
	for ( $a=0; $a < $row; $a++ ){
	?>
    <tr> 
      <td width="35%" class="labelDireita">Nome</td>
      <td width="65%" class="labelEsquerda"><input name="nm_profissao" value="<?php echo mysql_result($sql, $a, "nm_profissao");?>" type="text" size="50" maxlength="50"> 
      </td>
    </tr>
    <?php } ?>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="alterarProfissao" type="hidden" value="alterarProfissao" >
        <input name="pk_profissao" type="hidden" value="<?php echo $pk_profissao;?>" ></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="grava" type="submit" id="grava" value="&nbsp;&nbsp;Gravar&nbsp;&nbsp;"> 
        <input name="novo" type="button" id="novo" onClick="tpl('classes/interface.php?abrirProfCadastro=abrirProfCadastro')" value="&nbsp;&nbsp;Novo&nbsp;&nbsp;">
        <input name="volta2" type="button" id="volta2" onClick="tpl('classes/interface.php?abrirMembroCadastro=abrirMembroCadastro')" value="&nbsp;Membros&nbsp;"> 
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"> 
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
  </table>
</form>
</body>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>

