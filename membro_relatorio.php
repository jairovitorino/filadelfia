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
/*
function pesquisar(){
var mycodigo = document.getElementById('nu_rg');
if ( mycodigo.value ==""  )
alert("Favor informar o RG");
document.getElementById('nu_rg').focus;
}
*/
function move_i(what) { what.style.background='#cccccc'; }
function move_o(what) { what.style.background='#ffffff'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$nm = $_SESSION["member"];
if ($nm_usuario) {
?>

<form name="formulario">
  <table width="67%" border="0" align="center">
    <tr> 
      <td width="37%" class="labelDireita">&nbsp;</td>
      <td colspan="4" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">NOME</td>
      <td width="22%" class="labelEsquerda">TELEFONE</td>
      <td width="13%" class="labelEsquerda">SEXO</td>
      <td width="14%" class="labelEsquerda">ADMISS&Atilde;O</td>
      <td width="14%" class="labelEsquerda">MOTIVO</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * FROM membros, status, entradas WHERE membros.fk_entrada = entradas.pk_entrada AND membros.fk_sexo = status.pk_status AND fk_saida = 6 ORDER BY nm_membro");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	$_SESSION["pk_membro_sql"] = $pk_membro;
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_status");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "dt_admissao");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_entrada");?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="67%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
	
    <tr> 
      <td class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
	<tr> 
      <td class="labelCentro"><?php } else { echo "Sistema não foi logado..."; } ?><br></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
