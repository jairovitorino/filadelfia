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
function valida_dados(form1){
	if (form1.nm_usuario_cadastro.value == ""){
	alert("Preencher o campo NOME");
	return false;
	nmform.document.getElementById('nm_usuario_cadastro').focus();
	}
	if (form1.nm_login.value == ""){
	alert("Preencher o campo LOGIN");
	return false;
	nmform.document.getElementById('nm_login').focus();
	}
	if (form1.nm_senha.value == ""){
	alert("Preencher o campo SENHA");
	return false;
	nmform.document.getElementById('nm_senha').focus();
	}
	if (form1.id_status.value == ""){
	alert("Preencher o campo STATUS");
	return false;
	nmform.document.getElementById('id_status').focus();
	}
	}
function tpl(detUrl){
document.location = detUrl;
}
</script>
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="images/din.jpg"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<?php
$nm_usuario = $_SESSION["user"];
?>
<form name="form1" method="post" action="classes/interface.php" onSubmit="valida_dados(this)">
  <table width="67%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">CADASTRO DE USU&Aacute;RIO</td>
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
      <td class="labelEsquerda"><input name="re-senha" type="password" id="re-senha" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="inserirUsuarioVisitante" type="hidden" id="inserirUsuarioVisitante" value="inserirUsuarioVisitante" ></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="grava" type="submit" id="grava" value="Gravar"> 
        <input name="refaz" type="reset" id="refaz" value="Refazer">
        <input name="volta" type="button" id="volta" onClick="tpl('logout.php')" value="&lt;&lt; Voltar"> 
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><font color="#FF0000"><?php echo @$_GET['msg'];?></font></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
  </table>
</form>
</body>

<?php include "rodape/rodape.php";?>
</html>

