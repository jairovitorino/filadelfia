<?php 
session_start();
include "cabecalho/cabecalho.php";
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>
<html>
<head>
<title>Sistema Docente</title>
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
$msg = @$_SESSION["msg_session"];
if ($nm_usuario) {
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">INFOGR&Aacute;FICO ESTAT&Iacute;STICOS</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
	 <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
	 <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$casados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 2 AND fk_saida = 6 ");
	$row_casa = mysql_num_rows($casados);
	for ($a = 0; $a < $row_casa; $a++){
	$fk_2 = 2;
	}
	$divorciados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 4 AND fk_saida = 6 ");
	$row_divo = mysql_num_rows($divorciados);
	for ($b = 0; $b < $row_divo; $b++){
	$fk_4 = 4;
	}
	$separados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 3 AND fk_saida = 6 ");
	$row_sepa = mysql_num_rows($separados);
	for ($c = 0; $c < $row_sepa; $c++){
	$fk_3 = 3;
	}
	$solteiros = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 1 AND fk_saida = 6 ");
	$row_solt = mysql_num_rows($solteiros);
	for ($d = 0; $d < $row_solt; $d++){
	$fk_1 = 1;
	}
	$viuvos = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 5 AND fk_saida = 6 ");
	$row_viuv = mysql_num_rows($viuvos);
	for ($e = 0; $e < $row_viuv; $e++){
	$fk_5 = 5;
	}
	$homens = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 37 AND fk_saida = 6 ");
	$row_home = mysql_num_rows($homens);
	for ($f = 0; $f < $row_home; $f++){
	}
	$mulheres = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 38 AND fk_saida = 6 ");
	$row_mulh = mysql_num_rows($mulheres);
	for ($g = 0; $g < $row_mulh; $g++){
	}
	$criancas = mysql_query("SELECT fk_saida, pk_membro,dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 1 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 6 AND fk_saida = 6 AND dt_nascimento <> '' ");
	$row_cri = mysql_num_rows($criancas);
	for ($hc = 0; $hc < $row_cri; $hc++){
	}
	
	$adolescentes = mysql_query("SELECT fk_saida, pk_membro,dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 6 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 19 AND fk_saida = 6 AND dt_nascimento <> '' ");
	$row_ado = mysql_num_rows($adolescentes);
	for ($h = 0; $h < $row_ado; $h++){
	}
	$jovens = mysql_query("SELECT fk_saida, dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 20 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 36 AND fk_saida = 6 AND dt_nascimento <> '' ");
	$row_jov = mysql_num_rows($jovens);
	for ($i = 0; $i < $row_jov; $i++){
	}
	$adultos = mysql_query("SELECT fk_saida, dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 35 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 65 AND fk_saida = 6 AND dt_nascimento <> '' ");
	$row_adu = mysql_num_rows($adultos);
	for ($j = 0; $j < $row_adu; $j++){
	}
	$idosos = mysql_query("SELECT fk_saida, dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 64 AND fk_saida = 6 AND dt_nascimento <> '' ");
	$row_ido = mysql_num_rows($idosos);
	for ($l = 0; $l < $row_ido; $l++){
	}
	//$total = @$total + $a + $b + $c + $d + $e + $f + $g + $h + $i + $j + $l + $m + $n + $o + $p + $q;
	
	//$total =  $a + $b + $c + $d + $e;
	
	$total =  $f + $g ;
	?>
   
    <tr> 
      <td colspan="2" class="labelEsquerda">GENERO</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Homens</td>
      <td class="labelEsquerda"><img src="img/quadro_roxo.jpg" width="<?php echo $f;?>" height="10">&nbsp;<?php echo $f ? $f : "";?></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Mulheres</td>
      <td class="labelEsquerda"><img src="img/quadro_pink.jpg" width="<?php echo $g;?>" height="10">&nbsp;<?php echo $g ? $g : "";?></td>
    </tr>	
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">ESTADO CIVIL</td>
    </tr>
     <?php 	
	$sql = mysql_query("SELECT fk_estado,nm_estado, COUNT(membros.pk_membro) AS qt 
	FROM estados, membros
	WHERE membros.fk_estado = estados.pk_estado AND fk_saida = 6
	GROUP BY fk_estado
	ORDER BY nm_estado	");
	$row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$fk_estado = mysql_result($sql, $i, "fk_estado");
	$nm_estado = mysql_result($sql, $i, "nm_estado");
	$qt = mysql_result($sql, $i, "qt");
	?>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda"><?php echo $nm_estado;?></td>
     <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&fk_estado=<?php echo $fk_estado;?>"><?php echo $qt;?></a></td>
    </tr>
    <?php } ?>   
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">FAIXA ET&Aacute;RIA</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Crian&ccedil;as</td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $hc;?>" height="10">&nbsp;<a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&hc=<?php echo $hc;?>"><?php echo $hc ? $hc : "";?></a></td>
    </tr>
	<tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Adolescentes</td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $h;?>" height="10">&nbsp;<a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&h=<?php echo $h;?>"><?php echo $h ? $h : "";?></a></td>
    </tr>
    
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Jovens</td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $i;?>" height="10">&nbsp;<a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&i=<?php echo $i;?>"><?php echo $i ? $i : "";?></a></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Adultos</td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $j;?>" height="10">&nbsp;<a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&j=<?php echo $j;?>"><?php echo $j ? $j : "";?></a></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda">Idosos</td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $l;?>" height="10">&nbsp;<a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&l=<?php echo $l;?>"><?php echo $l ? $l : "";?></a></td>
    </tr>
	<tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">ESCOLARIDADE</td>
    </tr>
     <?php 	
	$sql = mysql_query("SELECT nm_instrucao, COUNT(membros.pk_membro) AS qt 
	FROM instrucao, membros
	WHERE membros.fk_instrucao = instrucao.pk_instrucao
	GROUP BY fk_instrucao
	ORDER BY nm_instrucao	");
	$row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$nm_instrucao = mysql_result($sql, $i, "nm_instrucao");
	$qt = mysql_result($sql, $i, "qt");
	?>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda"><?php echo $nm_instrucao;?></td>
     <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	
   <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">PROFISS&Otilde;ES</td>
    </tr>
     <?php 	
	$sql = mysql_query("SELECT fk_profissao,nm_profissao, COUNT(membros.pk_membro) AS qt 
	FROM profissoes, membros
	WHERE membros.fk_profissao = profissoes.pk_profissao
	GROUP BY fk_profissao
	ORDER BY nm_profissao	");
	$row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$fk_profissao = mysql_result($sql, $i, "fk_profissao");
	$nm_profissao = mysql_result($sql, $i, "nm_profissao");
	$qt = mysql_result($sql, $i, "qt");
	?>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda"><?php echo $nm_profissao;?></td>
     <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&fk_profissao=<?php echo $fk_profissao;?>&nm_profissao=<?php echo $nm_profissao;?>"><?php echo $qt;?></a></td>
    </tr>
    <?php } ?>
   
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
	  <tr> 
      <td colspan="2" class="labelEsquerda">LOCALIDADE</td>
    </tr>
    <?php 	
	$sql = mysql_query("SELECT fk_bairro,nm_bairro, nm_cidade, COUNT(membros.pk_membro) AS qt 
	FROM bairros, membros
	WHERE membros.fk_bairro = bairros.pk_bairro
	GROUP BY fk_bairro
	ORDER BY nm_bairro	");
	$row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$fk_bairro = mysql_result($sql, $i, "fk_bairro");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$qt = mysql_result($sql, $i, "qt");
	?>
    <tr bgcolor="#FFFFFF"> 
      <td class="labelEsquerda"><?php echo $nm_bairro;?></td>
      <td class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo&fk_bairro=<?php echo $fk_bairro;?>&nm_bairro=<?php echo $nm_bairro;?>"><?php echo $qt;?></a></td>
    </tr>
    <?php } ?>
    
  </table>
	  
  <table width="80%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr>
      <td colspan="8" class="labelEsquerda">Total de membros:&nbsp;<?php echo $total;?></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">Fonte: Sistema Filad&eacute;lfia</td>
    </tr>
    <tr> 
      <td class="labelCentro"> 
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>

<?php 
} else {

}
?>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
