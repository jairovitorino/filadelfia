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
      <td colspan="9" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="9" class="labelEsquerda"> 
        <?php
   if ($msg){
     echo "<div align='left'><img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
    <tr> 
      <td colspan="9" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="4%" class="labelEsquerda">Alterar</td>
      <td width="24%" class="labelEsquerda">Nome</td>
      <td width="10%" class="labelEsquerda">Doc. Identidade</td>
      <td width="6%" class="labelEsquerda"> Sanguineo</td>
      <td width="24%" class="labelEsquerda">Telefone</td>
      <td width="6%" class="labelEsquerda">Status</td>
      <td width="18%" class="labelEsquerda">Nascimento</td>
      <td width="8%" class="labelCentro">Excluir</td>
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
	$sql = mysql_query("SELECT * 
	FROM membros, instrucao, profissoes, saidas
	WHERE membros.fk_profissao = profissoes.pk_profissao AND membros.fk_saida = saidas.pk_saida AND membros.fk_instrucao = instrucao.pk_instrucao ORDER BY nm_membro LIMIT $inicio, $qnt");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	$nm_saida = mysql_result($sql, $z, "nm_saida");
	$dt_nascimento = mysql_result($sql, $z, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2). "/" .substr($dt_nascimento,5,2). "/" .substr($dt_nascimento,0,4);
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelCentro"><a href="javascript:tpl('classes/interface.php?alterarMembroLista=alterarMembroLista&pk_membro=<?php echo $pk_membro;?>')"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_rg");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_rh");?></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nu_tel_casa");?></td>
      <td class="labelEsquerda"><?php echo $nm_saida;?></td>
      <td class="labelEsquerda"><?php echo $dt_nascimento;?></td>
      <td class="labelCentro"><a href="javascript:del('classes/interface.php?excluirMembro=excluirMembro&pk_membro=<?php echo $pk_membro;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
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
$sql_select_all = "SELECT * 
	FROM membros, instrucao, profissoes 
	WHERE membros.fk_profissao = profissoes.pk_profissao AND membros.fk_instrucao = instrucao.pk_instrucao AND fk_saida = 6 ORDER BY nm_membro ";
$sql_query_all = mysql_query($sql_select_all);
$total_registros = mysql_num_rows($sql_query_all);
$pags = ceil($total_registros/$qnt);
$max_links = 3;
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_listaa.php?p=1' target='_self'>Inicio&nbsp;&nbsp;</a></font>";
for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_listaa.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo $p." ";
for($i = $p+1; $i <= $p+$max_links; $i++) {
if($i > $pags)
{

}
else
{
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_listaa.php?p=".$i."' target='_self'>".$i."</a></font> ";
}
}
echo "<font size='1' face='Arial, Helvetica, sans-serif'><a href='membro_listaa.php?p=".$pags."' target='_self'>Ultima</a></font> ";


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
