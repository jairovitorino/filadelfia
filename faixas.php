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
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="3" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="5%" class="labelCentro">Exibir</td>
      <td width="9%" class="labelEsquerda">Estado civil</td>
      <td width="86%" class="labelEsquerda">&nbsp;</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$criancas = mysql_query("SELECT dt_nascimento,CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento))- (RIGHT(CURDATE(),5)<RIGHT(dt_nascimento,5)) AS age 
	FROM membros
	WHERE dt_nascimento = '2009-09-07' AND age = 2 ");
	$row_cria = mysql_num_rows($criancas);
	for ($a = 0; $a < $row_cria; $a++){
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirMembroCivil=abrirMembroCivil&pk_estado=<?php echo $pk_estado;?>&nm_estado=<?php echo $nm_estado;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($criancas, $a, "age");?></td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
  <?php }?>
  </table>
	  
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="5" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro">Casado(a):<?php echo $a;?></td>
      <td class="labelCentro">Divorciado(a):<?php echo $b;?></td>
      <td class="labelCentro">Separado(a):<?php echo $c;?></td>
      <td class="labelCentro">Solteiro(a):<?php echo $d;?></td>
      <td class="labelCentro">Viuvo(a):<?php echo $e;?></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">
        <?php } else { echo "Sistema não foi logado..."; } ?>
        <br></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
