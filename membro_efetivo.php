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
function move_o(what) { what.style.background='#F5F5F5'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$hc = @$_SESSION["hc"];
$h = @$_SESSION["h"];
$i = @$_SESSION["i"];
$j = @$_SESSION["j"];
$l = @$_SESSION["l"];
$fk_profissao = @$_SESSION["fk_profissao"];
$fk_bairro = @$_SESSION["fk_bairro"];
$fk_estado = @$_SESSION["fk_estado"];
$nm_profissao = @$_SESSION["nm_profissao"];
$nm_bairro = @$_SESSION["nm_bairro"];
$nm = @$_SESSION["member"];
if ( $hc ){
$legenda = "Faixa etária: Crianças";
} else if ($h){
$legenda = "Faixa etária: Adolescentes";
} else if ($i){
$legenda = "Faixa etária: Jovens";
} else if ($j){
$legenda = "Faixa etária: Adultos";
} else if ($l){
$legenda = "Faixa etária: Idosos";
} else if ($fk_profissao){
$legenda = "Profissões: ".$nm_profissao;
} else if ($fk_bairro){
$legenda = "Localidade: ".$nm_bairro;
} else if ($fk_estado == 1){
$legenda = "Estado Civil: Solteiro";
} else if ($fk_estado == 2){
$legenda = "Estado Civil: Casado";
} else if ($fk_estado == 3){
$legenda = "Estado Civil: Separado";
} else if ($fk_estado == 4){
$legenda = "Estado Civil: Divorciado";
} else if ($fk_estado == 5){
$legenda = "Estado Civil: Viúvo";
} else if ($fk_estado == 6){
$legenda = "Estado Civil: Não informado";

} else {
$legenda = " ";
}
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>

<form name="formulario">
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelEsquerda"><?php echo $legenda;?></td>
      <td colspan="4" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="5%" class="labelCentro">Ficha</td>
      <td width="39%" class="labelEsquerda">Nome</td>
      <td width="15%" class="labelEsquerda">Telefone</td>
       <td width="10%" class="labelEsquerda">Admiss&atilde;o</td>
      <td width="31%" class="labelEsquerda">Motivo</td>
    </tr>
    <?php
	$p = @$_GET["p"];
	if(isset($p)) {
	$p = $p;
	} else {
	$p = 1;
	}
	$qnt = 20;
	$inicio = ($p*$qnt) - $qnt;           
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	
	if ( $hc ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 1 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 6 AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $h ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 6 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 19 AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $i ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 20 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 36 AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $j ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 35 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 65 AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $l ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 64 AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $fk_bairro ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE fk_bairro = ".$fk_bairro." AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $fk_profissao ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE fk_profissao = ".$fk_profissao." AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	} else if ( $fk_estado ){
	
	$sql = mysql_query("SELECT * FROM membros WHERE fk_estado = ".$fk_estado." AND fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);	
			
	
	} else {
	//$sql = mysql_query("SELECT * FROM membros WHERE fk_saida = 6 AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$sql = mysql_query("SELECT * FROM membros WHERE fk_saida = 6 ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	}
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	$dt_admissao = mysql_result($sql, $z, "dt_admissao");
	$dt_admissao = substr($dt_admissao,8,2)."/".substr($dt_admissao,5,2)."/".substr($dt_admissao,0,4);
	$fk_entrada = mysql_result($sql, $z, "fk_entrada");
	
	
	switch ($fk_entrada){
	case 1;
	$nm_entrada = "Aclamação";
	break;
	case 2;
	$nm_entrada = "Batismo";
	break;
	case 3;
	$nm_entrada = "Carta de Transferência";
	break;
	case 4;
	$nm_entrada = "Reconciliação";
	break;
	}
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?abrirMembroFicha=abrirMembroFicha&pk_membro=<?php echo $pk_membro;?>')"><img src="img/lupa.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
      <td class="labelEsquerda"><?php echo $dt_admissao;?></td>
      <td class="labelEsquerda"><?php echo $nm_entrada;?></td>
    </tr>
    <?php }?>
  </table>
	  
 <table width="76%" border="0" align="center">
     <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
   <tr> 
      <td class="labelDireita">
        <?php
echo "<br />";
$sql_select_all = "SELECT * FROM membros WHERE fk_saida = 6 ORDER BY nm_membro ";
$sql_query_all = mysql_query($sql_select_all);
$total_registros = mysql_num_rows($sql_query_all);
$pags = ceil($total_registros/$qnt);
$max_links = 3;
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_efetivo.php?p=1' target='_self'>Inicio&nbsp;&nbsp;</a></font>";
for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_efetivo.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo $p." ";
for($i = $p+1; $i <= $p+$max_links; $i++) {
if($i > $pags)
{

}
else
{
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_efetivo.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_efetivo.php?p=".$pags."' target='_self'>Ultima</a></font> ";
}

?>
      </td>
    </tr>


    <tr> 
      <td class="labelCentro"><input name="imprime" type="button" id="imprime" onClick="tpl('classes/interface.php?abrirMembroPdf=abrirMembroPdf')" value="Imprimir PDF">
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
	   <?php } else {?>
    <tr> 
      <td colspan="33"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
 </table>

</form>
<?php include "rodape/rodape.php";?>
</html>
