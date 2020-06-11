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
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
	<tr> 
      <td colspan="2" class="labelCentro">MEMBROS EFETIVOS</td>
    </tr>
    <tr> 
      <td width="5%" class="labelCentro">Exibir</td>
      <td class="labelEsquerda">Motivo</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	
	$aclamacao = mysql_query("SELECT * FROM membros WHERE fk_entrada = 1 ");
	$row_acla = mysql_num_rows($aclamacao);
	for ($a = 0; $a < $row_acla; $a++){
	}
	$batismo = mysql_query("SELECT * FROM membros WHERE fk_entrada = 2 ");
	$row_bat = mysql_num_rows($batismo);
	for ($b = 0; $b < $row_bat; $b++){
	}
	$carta = mysql_query("SELECT * FROM membros WHERE fk_entrada = 3 ");
	$row_car = mysql_num_rows($carta);
	for ($c = 0; $c < $row_car; $c++){
	}
	$reconciliacao = mysql_query("SELECT * FROM membros WHERE fk_entrada = 4 ");
	$row_rec = mysql_num_rows($reconciliacao);
	for ($d = 0; $d < $row_rec; $d++){
	}
	$agregado = mysql_query("SELECT * FROM membros WHERE fk_entrada = 5 ");
	$row_agre = mysql_num_rows($agregado);
	for ($e = 0; $e < $row_acla; $e++){
	}
	$visita = mysql_query("SELECT * FROM membros WHERE fk_entrada = 6 ");
	$row_vis = mysql_num_rows($visita);
	for ($f = 0; $f < $row_vis; $f++){
	}	
	$novo = mysql_query("SELECT * FROM membros WHERE fk_entrada = 7 ");
	$row_novo = mysql_num_rows($novo);
	for ($g = 0; $g < $row_novo; $g++){
	}	
	$total = $total + $a + $b + $c + $d ;
	$sql = mysql_query("SELECT * FROM entradas WHERE pk_entrada = 1 OR pk_entrada = 2 OR pk_entrada = 3 OR pk_entrada = 4 ORDER BY nm_entrada");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_entrada = mysql_result($sql, $z, "pk_entrada");
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirMembroCivil=abrirMembroCivil&pk_entrada=<?php echo $pk_entrada;?>&nm_estado=<?php echo $nm_estado;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_entrada");?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="5" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td width="22%" class="labelCentro">Total:&nbsp;&nbsp;<?php echo $total;?></td>
      <td width="21%" class="labelCentro">Aclama&ccedil;&atilde;o:&nbsp;&nbsp;<?php echo $a;?></td>
      <td width="19%" class="labelCentro">Batismo:&nbsp;&nbsp;<?php echo $b;?></td>
      <td width="20%" class="labelCentro">Carta de Transfer&ecirc;ncia:&nbsp;&nbsp;<?php echo $c;?></td>
      <td width="18%" class="labelCentro">Reconcilia&ccedil;&atilde;o:&nbsp;&nbsp;<?php echo $d;?></td>
    </tr>
    <tr>
      <td colspan="5" class="labelCentro">&nbsp;</td>
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
