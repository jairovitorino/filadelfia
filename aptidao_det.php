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
$pk_membro = $_SESSION["pk_membro_sql"] ;
$nm_membro = $_SESSION["nm_membro_sql"] ;
?>

<form name="formulario">
  <table width="61%" height="161" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">APTID&Otilde;ES DE: :<?php echo $nm_membro;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="85%" class="labelEsquerda">&Iacute;tem</td>
      <td width="15%" class="labelCentro">Excluir</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	
	$sql = mysql_query("SELECT * FROM merces, aptidoes WHERE merces.fk_aptidao = aptidoes.pk_aptidao AND fk_membro = ".$pk_membro."  ");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_aptidao = mysql_result($sql, $z, "pk_aptidao");
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_aptidao");?></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirMembroAptidao=excluirMembroAptidao&pk_membro=<?php echo $pk_membro;?>&pk_aptidao=<?php echo $pk_aptidao;?>&nm_membro=<?php echo $nm_membro;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="3" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="continua" type="button" id="continua" onClick="tpl('aptidao_checks.php')" value="Continuar">
        <input name="volta2" type="button" id="volta2" onClick="tpl('classes/interface.php?abrirMembroCadastro=abrirMembroCadastro')" value="Membros"> 
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
