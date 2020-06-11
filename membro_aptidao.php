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
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$nm = @$_SESSION["member"];
$id = $_SESSION["pk_membro_session"];
$te_foto = $_SESSION["te_foto_session"];
$nm_membro = $_SESSION["nm_membro_session"];
$nu_tel_casa = $_SESSION["nu_tel_casa_session"];

?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><img src="fotos/<?php echo $te_foto;?>" width="40" height="39"></td>
    </tr>
    <tr>
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">Nome: <?php echo $nm_membro;?> | Tel: 
        <?php echo $nu_tel_casa;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
     
      <td class="labelEsquerda">Aptid&otilde;es</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();

	$sql = mysql_query("SELECT * FROM merces, aptidoes WHERE merces.fk_aptidao = aptidoes.pk_aptidao AND fk_membro = ".$id." ORDER BY nm_aptidao");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_aptidao");?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="80%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
