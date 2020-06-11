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
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
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
      <td width="4%" class="labelEsquerda">Alterar</td>
      <td width="21%" class="labelEsquerda">Nome</td>
      <td width="12%" class="labelEsquerda">Telefone</td>
      <td width="31%" class="labelEsquerda">Rua</td>
      <td width="12%" class="labelEsquerda">Bairro</td>
      <td width="12%" class="labelEsquerda">Cidade</td>
      <td width="2%" class="labelEsquerda">UF</td>
      <td width="6%" class="labelCentro">Excluir</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * FROM membros WHERE fk_saida = 6 ORDER BY nm_membro");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?alterarMembroLista=alterarMembroLista&pk_membro=<?php echo $pk_membro;?>')"><img src="img/insert.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_logra");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_bairro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_cidade");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_uf");?></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirMembro=excluirMembro&pk_membro=<?php echo $pk_membro;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="80%" border="0" align="center">
   <tr> 
      <td colspan="3" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro">Total: <?php echo $z;?></td>
	  <?php 
	 	$sql = mysql_query("SELECT * FROM membros WHERE fk_saida = 6 AND fk_sexo = 37 ");
		$row = mysql_num_rows($sql);
		for ($a = 0; $a < $row; $a++){			
		}
	  ?>
      <td class="labelCentro">Homens: <?php echo $a;?></td>
	   <?php 
	 	$sql = mysql_query("SELECT * FROM membros WHERE fk_saida = 6 AND fk_sexo = 38 ");
		$row = mysql_num_rows($sql);
		for ($b = 0; $b < $row; $b++){			
		}
	  ?>
      <td class="labelCentro">Mulheres: <?php echo $b;?></td>
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
