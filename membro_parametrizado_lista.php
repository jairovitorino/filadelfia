<?php 
session_start();
include "cabecalho/cabecalho.php";
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

$dt_inicial = @$_SESSION["dt_inicial"];
$dt_inicial = substr($dt_inicial,6,4). "-" .substr($dt_inicial,3,2). "-" .substr($dt_inicial,0,2); 
$dt_final = @$_SESSION["dt_final"];
$dt_final = substr($dt_final,6,4). "-" .substr($dt_final,3,2). "-" .substr($dt_final,0,2); 

$nm = @$_SESSION["member"];
if ($nm_usuario) {
?>

<form name="formulario">
  <table width="76%" border="0" align="center">
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
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
	$sql = mysql_query("SELECT * FROM membros WHERE dt_admissao BETWEEN '".$dt_inicial."' AND '".$dt_final."' AND id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
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
      <td class="labelCentro">
<input name="imprime" type="button" id="imprime" onClick="tpl('classes/interface.php?abrirMembroParaPdf=abrirMembroParaPdf&dt_inicial=<?php echo $dt_inicial;?>&dt_final=<?php echo $dt_final;?>')" value="Imprimir PDF">
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
 </table>

</form>
<?php include "rodape/rodape.php";?>
</html>
