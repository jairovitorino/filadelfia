<?php 
session_start();
include "cabecalho/cabecalho.php";
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>
<html>
<head>
<title>Igreja</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
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
function move_o(what) { what.style.background='#F5F5F5'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$nm = $_SESSION["member"];
?>

<form name="formulario">
  <table width="67%" border="0" align="center">
    <tr> 
      <td width="6%" class="labelDireita">&nbsp;</td>
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro">Alterar</td>
      <td width="88%" class="labelEsquerda">Nome</td>
      <td width="6%" class="labelCentro">Ficha</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	
	$sql = mysql_query("SELECT * FROM membros WHERE nm_membro LIKE '%$nm%' ORDER BY nm_membro");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?alterarMembroLista=alterarMembroLista&pk_membro=<?php echo $pk_membro;?>')"><img src="img/insert.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirMembroFicha=abrirMembroFicha&pk_membro=<?php echo $pk_membro;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="67%" border="0" align="center">
    <tr> 
      <td colspan="3" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td width="31%" class="labelCentro">Total: <?php echo $z;?></td>
      <?php 
	 	$sql = mysql_query("SELECT * FROM membros WHERE nm_membro LIKE '$nm%' AND fk_sexo = 37 AND fk_saida = 6 ");
		$row = mysql_num_rows($sql);
		for ($a = 0; $a < $row; $a++){			
		}
	  ?>
      <td width="44%" class="labelCentro">&nbsp;</td>
      <?php 
	 	$sql = mysql_query("SELECT * FROM membros WHERE nm_membro LIKE '$nm%' AND fk_sexo = 38 AND fk_saida = 6 ");
		$row = mysql_num_rows($sql);
		for ($b = 0; $b < $row; $b++){			
		}
	  ?>
      <td width="25%" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3" class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>


</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
