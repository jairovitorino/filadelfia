<?php 
session_start();
include "cabecalho/cabecalho.php";
?>
<html>
<head>
<title>Sistema Docente</title>
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
$msg = $_SESSION["msg_session"];
if ($nm_usuario) {
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">GR&Aacute;FICOS</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">ESTADO CIVIL</td>
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
	$separados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 3 ");
	$row_sepa = mysql_num_rows($separados);
	for ($c = 0; $c < $row_sepa; $c++){
	}
	$solteiros = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 1 ");
	$row_solt = mysql_num_rows($solteiros);
	for ($d = 0; $d < $row_solt; $d++){
	}
	$viuvos = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 5 ");
	$row_viuv = mysql_num_rows($viuvos);
	for ($e = 0; $e < $row_viuv; $e++){
	}
	$homens = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 37 ");
	$row_home = mysql_num_rows($homens);
	for ($f = 0; $f < $row_home; $f++){
	}
	$mulheres = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 38 ");
	$row_mulh = mysql_num_rows($mulheres);
	for ($g = 0; $g < $row_mulh; $g++){
	}
	$adolescentes = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 6 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 19 ");
	$row_ado = mysql_num_rows($adolescentes);
	for ($h = 0; $h < $row_ado; $h++){
	}
	$jovens = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 20 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 36 ");
	$row_jov = mysql_num_rows($jovens);
	for ($i = 0; $i < $row_jov; $i++){
	}
	$adultos = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 35 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 65 ");
	$row_adu = mysql_num_rows($adultos);
	for ($j = 0; $j < $row_adu; $j++){
	}
	$idosos = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 64  ");
	$row_ido = mysql_num_rows($idosos);
	for ($l = 0; $l < $row_ido; $l++){
	}
	$total = $total + $a + $b + $c + $d + $e;
	?>
    <tr>
      <td width="11%" class="labelEsquerda">Casados</td>
      <td width="89%" class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $a;?>" height="10">&nbsp;<?php echo $a;?></td>
    </tr>
    <tr>
      <td class="labelEsquerda">Divorciados</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $b;?>" height="10">&nbsp;<?php echo $b;?></td>
    </tr>
    <tr>
      <td class="labelEsquerda">Separados</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $c;?>" height="10">&nbsp;<?php echo $c;?></td>
    </tr>
   <tr>
      <td class="labelEsquerda">Solteiros</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $d;?>" height="10">&nbsp;<?php echo $d;?></td>
    </tr>
    <tr>
      <td class="labelEsquerda">Vi&uacute;vos</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $e;?>" height="10">&nbsp;<?php echo $e;?></td>
    </tr>
    <tr>
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr>
      <td colspan="2" class="labelEsquerda">GENERO</td>
    </tr>
     <tr>
      <td class="labelEsquerda">Homens</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $f;?>" height="10">&nbsp;<?php echo $f;?></td>
    </tr>
   <tr>
      <td class="labelEsquerda">Mulheres</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $g;?>" height="10">&nbsp;<?php echo $g;?></td>
    </tr>
	 <tr>
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
	<tr>
      <td colspan="2" class="labelEsquerda">FAIXA ET&Aacute;RIA</td>
    </tr>
     <tr>
      <td class="labelEsquerda">Adolescentes</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $h;?>" height="10">&nbsp;<?php echo $h;?></td>
    </tr>
   <tr>
      <td class="labelEsquerda">Jovens</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $i;?>" height="10">&nbsp;<?php echo $i;?></td>
    </tr>
 	<tr>
      <td class="labelEsquerda">Adultos</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $j;?>" height="10">&nbsp;<?php echo $j;?></td>
    </tr>
		<tr>
      <td class="labelEsquerda">Idosos</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $l;?>" height="10">&nbsp;<?php echo $l;?></td>
    </tr>
	 <tr>
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
	<tr>
      <td colspan="2" class="labelEsquerda">ESCOLARIDADE</td>
    </tr>
     <tr>
      <td class="labelEsquerda">Fundamental</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $h;?>" height="10">&nbsp;<?php echo $h;?></td>
    </tr>
   <tr>
      <td class="labelEsquerda">Medio</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $i;?>" height="10">&nbsp;<?php echo $i;?></td>
    </tr>
 	<tr>
      <td class="labelEsquerda">Superior</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $j;?>" height="10">&nbsp;<?php echo $j;?></td>
    </tr>
		<tr>
      <td class="labelEsquerda">P&oacute;s-Gradua&ccedil;&atilde;o</td>
      <td class="labelEsquerda"><img src="img/barra.jpg" width="<?php echo $l;?>" height="10">&nbsp;<?php echo $l;?></td>
    </tr>
  </table>
	  
  <table width="80%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr>
      <td colspan="8" class="labelEsquerda">Total:&nbsp;<?php echo $total;?></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">Fonte: Sistema Filad&eacute;lfia</td>
    </tr>
    <tr> 
      <td class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>

<?php 
} else {

}
include "rodape/rodape.php";?>
</html>
