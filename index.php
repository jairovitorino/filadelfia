<?php 
session_start();
include "cabecalho/cabecalho.php";

?>

<html>
<head>
<title>Igreja</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">

<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<script language="JavaScript">
function caixas(){
		document.getElementById('nm_login').focus();
		
		return (false);
}

</script>
<form name="form1" action="classes/interface.php" method="post" onSubmit="return valida_dados(this)">
  <table width="54%" border="0" align="center">
    <?php $msg = @$_GET['msg'];?>
    <?php $_SESSION['user'] = "Admin";?>
    <?php if ( !empty($msg) ) {?>
    <tr> 
      <td colspan="6" class="labelEsquerda"> 
        <?php
   if ($msg){
   echo "<div align='left'><img src='img/msg_verde.gif' width='20' height='20'><font color='#006600' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <?php } else { ?>
    <tr> 
      <td colspan="6" class="labelDireita">&nbsp;</td>
    </tr>
    <?php } ?>
    <tr> 
      <td colspan="4" class="labelDireita">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td colspan="2"><input type="hidden" name="logar" value="logar"></td>
    </tr>
    <tr> 
      <td width="37%" class="labelDireita">Login</td>
      <td colspan="2"><input name="nm_login" type="text" id="nm_login" size="40" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Senha</td>
      <td colspan="2"><input name="nm_senha" type="password" id="nm_senha" size="15" maxlength="15"></td>
    </tr>
    <tr> 
      <td class="labelEsquerda"><strong>Vers&atilde;o 1.2</strong></td>
      <td width="31%" class="labelDireita"><input name="conecta" type="submit" id="conecta" value="Conectar"></td>
      <td width="32%" class="labelDireita">&nbsp;</td>
    </tr>
  </table>
</form>
</body>


</html>
