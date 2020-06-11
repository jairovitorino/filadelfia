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
      <td colspan="3" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><?php echo $msg;?></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="3" class="labelCentro">ANIVERSARIANTES DO M&Ecirc;S</td>
    </tr>
    <tr> 
      <td colspan="3" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td width="5%" class="labelEsquerda">Foto</td>
      <td width="45%" class="labelEsquerda">Nome</td>
      <td width="50%" class="labelEsquerda">Dia/M&ecirc;s</td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$mes_atual = date("m");
	$sql = mysql_query("SELECT pk_membro,nm_membro, dt_nascimento, te_foto FROM membros WHERE MONTH(membros.dt_nascimento) = '".$mes_atual."' AND fk_saida = 6 ORDER BY nm_membro");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$pk_membro = mysql_result($sql, $z, "pk_membro");
	$te_foto = mysql_result($sql, $z, "te_foto");
	$dt_nascimento = mysql_result($sql, $z, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2);
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelEsquerda"><img src="fotos/<?php echo $te_foto;?>" width="20" height="24"></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql, $z, "nm_membro");?></td>
      <td class="labelEsquerda"><?php echo $dt_nascimento;?></td>
    </tr>
    <?php }?>
	<?php 
	$sql_flu = mysql_query("SELECT pk_flutuante,nm_flutuante, dt_nascimento FROM flutuantes 
	WHERE MONTH(flutuantes.dt_nascimento) = '".$mes_atual."' AND fk_saida = 6 ORDER BY nm_flutuante");
	$row_flu = @mysql_num_rows($sql_flu);
	for ($x = 0; $x < $row_flu; $x++){
	$pk_flutuante = mysql_result($sql_flu, $x, "pk_flutuante");
	$dt_nascimento = mysql_result($sql_flu, $x, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2);

	?>		
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td class="labelEsquerda"><img src="fotos/<?php echo $te_foto;?>" width="20" height="24"></td>
      <td class="labelEsquerda"><?php echo mysql_result($sql_flu, $x, "nm_flutuante");?></td>
      <td class="labelEsquerda"><?php echo $dt_nascimento;?></td>
    </tr>
    <?php }?>
  </table>
	  
  <table width="80%" border="0" align="center">
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelCentro"><input name="gera" type="button" id="gera" onClick="tpl('classes/interface.php?abrirAniverMes=abrirAniverMes')" value="Imprimir PDF">
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>
<?php include "rodape/rodape.php";?>
</html>
