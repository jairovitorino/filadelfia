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
<link rel="SHORTCUT ICON" href="img/cristo_web.jpg"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<?php
$nm_usuario = $_SESSION["user"];
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
	  ?></td>
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
    <tr> 
      <td class="labelDireita">Nome</td>
      <td class="labelEsquerda"><input name="nm_usuario_cadastro" type="text" id="nm_usuario_cadastro" size="60" maxlength="50"> 
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">Login</td>
      <td class="labelEsquerda"><input name="nm_login" type="text" id="nm_login" size="25" maxlength="15"></td>
    </tr>
    <tr> 
      <td width="24%" class="labelDireita">Senha</td>
      <td width="76%" class="labelEsquerda"><input name="nm_senha" type="password" id="nm_senha" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Repate-Senha</td>
      <td class="labelEsquerda"><input name="re_senha" type="password" id="re_senha" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="inserirUsuario" type="hidden" id="inserirUsuario" value="inserirUsuario" ></td>
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

