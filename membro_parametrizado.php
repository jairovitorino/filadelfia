<?php 
session_start();
include "cabecalho/cabecalho.php";
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
$nm_usuario = $_SESSION['nm_usuario'];

$msg = @$_SESSION['msg'];

$dt_inicial = @$_SESSION['dt_inicial'];
$dt_final = @$_SESSION['dt_final'];

if ($nm_usuario){
?>
<html>
<head>
<title>Igreja Batista Filad&eacute;lfia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="SHORTCUT ICON" href="img/igreja.png"/>
<script language="JavaScript">
function caixas(){
	document.getElementById('dt_inicial').focus();
}

function sair(inserir){
document.location = inserir;
}

</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<form name="formulario" method="post" action="classes/interface.php">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> 
        <?php
   if ($msg){
     echo "<div align='left'><img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr>
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="45%" class="labelDireita">Data Inicial:</td>
      <td width="55%" class="labelEsquerda">  <?php
		require 'classes/calendario.php';	
		$calendario_campo = new calendario;
		$calendario_campo->nome_campo="dt_inicial";
		$calendario_campo->value_campo=@$dt_inicial;
		$calendario_campo->criar_campo();
		 ?></td>
    </tr>
    <tr> 
      <td class="labelDireita">Data Final:</td>
      <td class="labelEsquerda"><?php $calendario_campo->nome_campo="dt_final";
		$calendario_campo->value_campo=@$dt_final;
		$calendario_campo->criar_campo();?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="pesquisarParametrizado" value="pesquisarParametrizado">
        <input type="hidden" name="nm_usuario" value="<?php echo $nm_usuario;?>"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="pesquisa" type="submit" id="pesquisa" value="Pesquisar">
        <input name="sai" type="button" id="sai" value="Home" onClick="javascript:sair('tpl.php')"></td>
    </tr>
  </table>
</form>
<?php
 $calendario_campo->criar_java_campo();
?>
<?php 
} else {

}
} else {
 include "rodape/rodape.php";
 }
 ?>

?>
</html>
