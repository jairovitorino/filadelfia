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
if ($nm_usuario) {
?>

<form name="formulario">
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="5%" class="labelCentro">Exibir</td>
      <td class="labelEsquerda">Estado civil</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$casados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 2 ");
	$row_casa = mysql_num_rows($casados);
	for ($a = 0; $a < $row_casa; $a++){
	}
	$divorciados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 4 ");
	$row_divo = mysql_num_rows($divorciados);
	for ($b = 0; $b < $row_divo; $b++){
	}
	$nao_informado = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 6 ");
	$row_nao = mysql_num_rows($nao_informado);
	for ($c = 0; $c < $row_nao; $c++){
	}
	$separados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 3 ");
	$row_sepa = mysql_num_rows($separados);
	for ($d = 0; $d < $row_sepa; $d++){
	}
	$solteiros = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 1 ");
	$row_solt = mysql_num_rows($solteiros);
	for ($e = 0; $e < $row_solt; $e++){
	}
	$viuvos = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 5 ");
	$row_viuv = mysql_num_rows($viuvos);
	for ($f = 0; $f < $row_viuv; $f++){
	}
	$sql = mysql_query("SELECT * FROM estados ORDER BY nm_estado");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_estado = mysql_result($sql, $z, "pk_estado");
	$nm_estado = mysql_result($sql, $z, "nm_estado");
	?>
   <tr> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirMembroCivil=abrirMembroCivil&pk_estado=<?php echo $pk_estado;?>&nm_estado=<?php echo $nm_estado;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_estado");?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="6" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td width="18%" class="labelCentro">Casado(a):<?php echo $a;?></td>
      <td width="16%" class="labelCentro">Divorciado(a):<?php echo $b;?></td>
      <td width="18%" class="labelCentro">N&atilde;o informado(s):<?php echo $c;?></td>
      <td width="15%" class="labelCentro">Separado(a):<?php echo $d;?></td>
      <td width="14%" class="labelCentro">Solteiro(a):<?php echo $e;?></td>
      <td width="19%" class="labelCentro">Viuvo(a):<?php echo $f;?></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"> 
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
