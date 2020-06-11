<?php session_start();?>
<html>
<head>
<title>Igreja Batista Filad&eacute;lfia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function caixas(){
	document.getElementById('nm_usuario_cadastro').focus();
}
function valida_dados(nmform){
	if (nmform.nm_usuario_cadastro.value == ""){
	alert("Preencher o campo NOME");
	return false;
	nmform.document.getElementById('nm_usuario_cadastro').focus();
	}
	if (nmform.nm_login.value == ""){
	alert("Preencher o campo LOGIN");
	return false;
	nmform.document.getElementById('nm_login').focus();
	}
	if (nmform.nm_senha.value == ""){
	alert("Preencher o campo SENHA");
	return false;
	nmform.document.getElementById('nm_senha').focus();
	}
	if (nmform.id_status.value == ""){
	alert("Preencher o campo STATUS");
	return false;
	nmform.document.getElementById('id_status').focus();
	}
	}
function tpl(detUrl){
document.location = detUrl;
}
</script>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="SHORTCUT ICON" href="images/din.jpg"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<?php 
$nm_usuario = $_SESSION["user"];
$msg = $_SESSION["msg_session"];
?>
<form name="form1" method="post" action="classes/interface.php" onSubmit="valida_dados(this)">
  <table width="67%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
      <td colspan="2" class="labelDireita">&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="6" class="labelCentro" bgcolor="#0000FF"><div align="center"><font color="#FFFFFF">CADASTRO 
          DE USU&Aacute;RIO</font></div></td>
    </tr>
   <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
	<tr> 
      <td colspan="2" class="labelDireita"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">
        <?php
		$msg_session = $_SESSION["msg_session"];
   if ($msg_session){
   echo "<div align='left'><img src='img/msg_verde.gif' width='20' height='20'><font color='#006600' size='2' face='Arial, Helvetica, sans-serif'> $msg_session </font></div>";
   }
	?>
      </td>
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
	$pk_usuario = $_SESSION["pk_usuario_session"];
	$fk_status = @$_SESSION["fk_status_session"];
	$sql = mysql_query("SELECT * FROM usuarios,status WHERE usuarios.fk_status = status.pk_status AND pk_usuario = ".$pk_usuario." ");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	?>
    <tr> 
      <td class="labelDireita">Nome</td>
      <td class="labelEsquerda"><input name="nm_usuario_cadastro" type="text" value="<?php echo mysql_result($sql, $z, "nm_usuario");?>" id="nm_usuario_cadastro" size="60" maxlength="50"> 
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">Login</td>
      <td class="labelEsquerda"><input name="nm_login" type="text" value="<?php echo mysql_result($sql, $z, "nm_login");?>" id="nm_login" size="25" maxlength="15"></td>
    </tr>
    <tr> 
      <td width="24%" class="labelDireita">Senha</td>
      <td width="76%" class="labelEsquerda"><input name="nm_senha" type="password" id="nm_senha" value="<?php echo mysql_result($sql, $z, "nm_senha");?>" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Repate-Senha</td>
      <td class="labelEsquerda"><input name="re_senha" type="password" id="re_senha" size="20" maxlength="50"></td>
    </tr>
	<?php
	   	$sql_inst = "SELECT * FROM status WHERE cl_status = '6' ORDER BY nm_status"; 
		$sql_inst = mysql_query($sql_inst);       
		$row_inst = mysql_num_rows($sql_inst);
		?>
    <tr> 
      <td class="labelDireita">Status</td>
      <td class="labelEsquerda"><select name="fk_status" id="fk_status">
          <option value="<?php echo mysql_result($sql, $z, "fk_status");?>"><?php echo mysql_result($sql, $z, "nm_status");?></option>
          <?php for($o=0; $o<$row_inst; $o++) { ?>
          <option value="<?php echo mysql_result($sql_inst, $o, "pk_status"); ?>"> 
          <?php echo mysql_result($sql_inst, $o, "nm_status"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
	<?php }?>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="alterarUsuario" type="hidden" id="alterarUsuario" value="alterarUsuario" >
        <input name="pk_usuario" type="hidden" id="pk_usuario" value="<?php echo $pk_usuario;?>" ></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="grava" type="submit" id="grava" value="Gravar"> 
        <input name="refaz" type="reset" id="refaz" value="Refazer">
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

<?php include "rodape/rodape.php";?>
</html>

