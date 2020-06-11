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

function move_i(what) { what.style.background='#cccccc'; }
function move_o(what) { what.style.background='#F5F5F5'; }

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
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="6" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="33%" class="labelEsquerda">Nome</td>
      <td width="8%" class="labelEsquerda">Data Nascimento</td>
      <td width="6%" class="labelEsquerda">Sexo</td>
      <td width="53%" class="labelEsquerda">Faixa et&aacute;ria</td>
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
	$sql = mysql_query("SELECT pk_membro,nm_membro,nm_status,dt_nascimento,YEAR(membros.dt_nascimento) as ano FROM membros,status WHERE membros.fk_sexo = status.pk_status AND fk_saida = 6 ORDER BY ano DESC LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	$dt_nascimento = mysql_result($sql, $z, "dt_nascimento"); // 2009-09-22
	$dt_nasc = $dt_nascimento;
	$dt_nascimento = substr($dt_nascimento,0,4);
	$dt_nascimento = date("Y") - $dt_nascimento;
	if ($dt_nascimento <= 8)
	$dt_faixa = "Criança";
	if ( ($dt_nascimento >= 7) && ($dt_nascimento <= 18) )
	$dt_faixa = "Adolescente";
	if ( ($dt_nascimento >= 19) && ($dt_nascimento <= 35) )
	$dt_faixa = "Jovem";
	if ( ($dt_nascimento >= 36) && ($dt_nascimento <= 64) )
	$dt_faixa = "Adulto(a)";
	if ($dt_nascimento > 65)
	$dt_faixa = "Idoso(a)";
	$dt_nasc = substr($dt_nasc,8,2)."/".substr($dt_nasc,5,2)."/".substr($dt_nasc,0,4);
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo $dt_nasc;?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_status");?></td>
      <td class="labelEsquerda"><?php echo $dt_faixa;?> / <?php echo $dt_nascimento;?> 
        anos </td>
    </tr>
    <?php }?>
  </table>	  
 <table width="80%" border="0" align="center">
     <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
   <tr> 
      <td class="labelDireita">
        <?php
echo "<br />";
$sql_select_all = "SELECT pk_membro,nm_membro,nm_status,dt_nascimento,YEAR(membros.dt_nascimento) as ano FROM membros,status WHERE membros.fk_sexo = status.pk_status AND fk_saida = 6 ORDER BY ano DESC ";
$sql_query_all = mysql_query($sql_select_all);
$total_registros = mysql_num_rows($sql_query_all);
$pags = ceil($total_registros/$qnt);
$max_links = 3;
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membros_todos.php?p=1' target='_self'>Inicio&nbsp;&nbsp;</a></font>";
for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membros_todos.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo $p." ";
for($i = $p+1; $i <= $p+$max_links; $i++) {
if($i > $pags)
{

}
else
{
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membros_todos.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membros_todos.php?p=".$pags."' target='_self'>Ultima</a></font> ";


?>
      </td>
    </tr>


    <tr> 
      <td class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
 </table>

</form>
<?php include "rodape/rodape.php";?>
</html>
