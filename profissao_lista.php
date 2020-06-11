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
$msg = $_SESSION["msg_session"];
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="3" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"> 
        <?php
   if ($msg){
     echo "<div align='left'><img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="5%" class="labelEsquerda">Alterar</td>
      <td width="88%" class="labelEsquerda">Nome</td>
      <td width="7%" class="labelCentro">Excluir</td>
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
	$sql = mysql_query("SELECT * FROM profissoes ORDER BY nm_profissao LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_profissao = mysql_result($sql, $z, "pk_profissao");
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?alterarProfLista=alterarProfLista&pk_profissao=<?php echo $pk_profissao;?>')"><img src="img/insert.gif" width="12" height="12"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_profissao");?></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirProfissao=excluirProfissao&pk_profissao=<?php echo $pk_profissao;?>')"><img src="img/excluir2.gif" width="12" height="12"></a></td>
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
$sql_select_all = "SELECT * FROM profissoes ORDER BY nm_profissao ";
$sql_query_all = mysql_query($sql_select_all);
$total_registros = mysql_num_rows($sql_query_all);
$pags = ceil($total_registros/$qnt);
$max_links = 3;
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='profissao_lista.php?p=1' target='_self'>Inicio&nbsp;&nbsp;</a></font>";
for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='profissao_lista.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo $p." ";
for($i = $p+1; $i <= $p+$max_links; $i++) {
if($i > $pags)
{

}
else
{
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='profissao_lista.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='profissao_lista.php?p=".$pags."' target='_self'>Ultima</a></font> ";


?>
      </td>
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
