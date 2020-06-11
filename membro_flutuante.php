<?php 
session_start();
include "cabecalho/cabecalho.php";
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
 
 	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	//$sql = mysql_query("SELECT * FROM membros WHERE fk_entrada = 5 OR fk_entrada = 6 OR fk_entrada = 7 AND fk_saida = 6 ORDER BY nm_membro");
	$sql = mysql_query("SELECT * FROM flutuantes WHERE fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_flutuante");
	@$row = mysql_num_rows($sql);
	
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
function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
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
function move_o(what) { what.style.background='#F5F5F5'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$msg = $_SESSION["msg_session"];
$nm = @$_SESSION["member"];

?>
<?php if ( $row ) {?>
<form name="formulario">
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="8" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
	 <tr> 
      <td colspan="8" class="labelEsquerda">
        <?php
   if ($msg){
     echo "<div align='left'><img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="4%" class="labelCentro">Ficha</td>
      <td width="34%" class="labelEsquerda">Nome</td>
      <td width="19%" class="labelEsquerda">Telefone</td>
      <td width="15%" class="labelEsquerda">Admiss&atilde;o</td>
      <td width="19%" class="labelEsquerda">Motivo</td>
      <td width="5%" class="labelCentro">Alterar</td>
      <td width="4%" class="labelCentro">Excluir</td>
    </tr>
    <?php 
	for ($z = 0; $z < $row; $z++){
	$pk_flutuante = mysql_result($sql, $z, "pk_flutuante");
	$dt_admissao = mysql_result($sql, $z, "dt_admissao");
	$dt_admissao = substr($dt_admissao,8,2)."/".substr($dt_admissao,5,2)."/".substr($dt_admissao,0,4);
	$fk_entrada = mysql_result($sql, $z, "fk_entrada");
	switch ($fk_entrada){
	case 5;
	$nm_entrada = "Agregado";
	break;
	case 6;
	$nm_entrada = "Visitante";
	break;
	case 7;
	$nm_entrada = "Novo decidido";
	break;
	
	}
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirFlutuanteFicha=abrirFlutuanteFicha&pk_flutuante=<?php echo $pk_flutuante;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_flutuante");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
      <td class="labelEsquerda"><?php echo $dt_admissao;?></td>
      <td class="labelEsquerda"><?php echo $nm_entrada;?></td>
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirFlutuanteAlt=abrirFlutuanteAlt&pk_flutuante=<?php echo $pk_flutuante;?>')"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirFlutuante=excluirFlutuante&pk_flutuante=<?php echo $pk_flutuante;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="76%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
	 <tr> 
      <td class="labelEsquerda">Total: <?php echo $z;?></td>
    </tr>
    <tr> 
      <td class="labelCentro"><input name="imprime" type="button" id="imprime" onClick="tpl('classes/interface.php?abrirFlutuantePdf=abrirFlutuantePdf')" value="Imprimir PDF"> 
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
	   <?php } else {?>
    <tr> 
      <td colspan="33"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
