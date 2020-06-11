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
function move_o(what) { what.style.background='#ffffff'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$pk_flutuante = $_SESSION["pk_flutuante_session"] ;
?>

<form name="formulario">
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="5" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <?php 
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * 
	FROM flutuantes, status, estados, instrucao, profissoes, entradas, saidas, bairros
	WHERE flutuantes.fk_profissao = profissoes.pk_profissao AND flutuantes.fk_instrucao = instrucao.pk_instrucao 
	AND flutuantes.fk_bairro = bairros.pk_bairro
	AND flutuantes.fk_saida = saidas.pk_saida AND flutuantes.fk_entrada = entradas.pk_entrada AND flutuantes.fk_estado = estados.pk_estado AND flutuantes.fk_sexo = status.pk_status AND pk_flutuante = ".$pk_flutuante." ");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$id = mysql_result($sql, $z, "pk_flutuante");
	$nm_flutuante = mysql_result($sql, $z, "nm_flutuante");
	$te_foto = mysql_result($sql, $z, "te_foto");
	$nm_logra = mysql_result($sql, $z, "nm_logra");
	$nm_bairro = mysql_result($sql, $z, "nm_bairro");
	$nm_cidade = mysql_result($sql, $z, "nm_cidade");
	$nu_cep = mysql_result($sql, $z, "nu_cep");
	$nu_tel_casa = mysql_result($sql, $z, "nu_tel_casa");
	$nu_rg = mysql_result($sql, $z, "nu_rg");
	$dt_nascimento = mysql_result($sql, $z, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2)."/".substr($dt_nascimento,0,4);
	$nm_rh = mysql_result($sql, $z, "nm_rh");
	$nm_pai = mysql_result($sql, $z, "nm_pai");
	$nm_mae = mysql_result($sql, $z, "nm_mae");
	$nm_conjuge = mysql_result($sql, $z, "nm_conjuge");
	$nm_igreja = mysql_result($sql, $z, "nm_igreja");
	$nu_tel_igreja = mysql_result($sql, $z, "nu_tel_igreja");
	$nm_pastor = mysql_result($sql, $z, "nm_pastor");
	$dt_casamento = mysql_result($sql, $z, "dt_casamento");
	$dt_casamento = substr($dt_casamento,8,2)."/".substr($dt_casamento,5,2)."/".substr($dt_casamento,0,4);
	$nm_local = mysql_result($sql, $z, "nm_local");
	$nm_escola = mysql_result($sql, $z, "nm_escola");
	$nu_tel_escola = mysql_result($sql, $z, "nu_tel_escola");
	$nm_empresa = mysql_result($sql, $z, "nm_empresa");
	$nu_tel_empresa = mysql_result($sql, $z, "nu_tel_empresa");
	$nm_status = mysql_result($sql, $z, "nm_status");
	$nm_estado = mysql_result($sql, $z, "nm_estado");
	$nm_instrucao = mysql_result($sql, $z, "nm_instrucao");
	$nm_profissao = mysql_result($sql, $z, "nm_profissao");
	$nm_email = mysql_result($sql, $z, "nm_email");
	$te_observacao = mysql_result($sql, $z, "te_observacao");
	$nm_uf = mysql_result($sql, $z, "nm_uf");
	$dt_admissao = mysql_result($sql, $z, "dt_admissao");
	$dt_admissao = substr($dt_admissao,8,2)."/".substr($dt_admissao,5,2)."/".substr($dt_admissao,0,4);
	$nm_entrada = mysql_result($sql, $z, "nm_entrada");
	$nm_saida = mysql_result($sql, $z, "nm_saida");
	$dt_saida = mysql_result($sql, $z, "dt_saida");
	$dt_saida = substr($dt_saida,8,2)."/".substr($dt_saida,5,2)."/".substr($dt_saida,0,4);
	}
	?>
    <tr>
      <td colspan="5" class="labelCentro">FICHA DE IDENTICICA&Ccedil;&Atilde;O 
        DE DISCIPULADO</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"><img src="fotos/<?php echo $te_foto;?>" width="40" height="39"></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td width="7%" class="labelEsquerda">NOME:</td>
      <td width="21%" class="labelEsquerda"><?php echo $nm_flutuante;?></td>
      <td width="4%" class="labelDireita">TEL:</td>
      <td class="labelEsquerda"><?php echo $nu_tel_casa;?></td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td height="21" class="labelEsquerda">ENDERE&Ccedil;O:</td>
      <td colspan="2" class="labelEsquerda"><?php echo $nm_logra;?></td>
      <td width="30%" class="labelDireita">CEP:</td>
      <td width="38%" class="labelEsquerda"><?php echo $nu_cep;?></td>
    </tr>
  </table>
  <table width="80%" border="0" align="center">
    <tr> 
      <td width="13%" class="labelEsquerda">BAIRRO:</td>
      <td width="19%" class="labelEsquerda"><?php echo $nm_bairro;?></td>
      <td width="5%" class="labelDireita">CIDADE:</td>
      <td width="11%" class="labelEsquerda"><?php echo $nm_cidade;?></td>
      <td width="14%" class="labelDireita">UF:</td>
      <td width="9%" class="labelEsquerda"><?php echo $nm_uf;?></td>
      <td width="6%" class="labelDireita">RG:</td>
      <td width="23%" class="labelEsquerda"><?php echo $nu_rg;?></td>
    </tr>
    <tr> 
      <td width="13%" class="labelEsquerda">DATA NASCIMENTO:</td>
      <td width="19%" class="labelEsquerda"><?php echo $dt_nascimento;?></td>
      <td width="5%" class="labelDireita">SEXO:</td>
      <td width="11%" class="labelEsquerda"><?php echo $nm_status;?></td>
      <td width="14%" class="labelDireita">ESTADO CIVIL:</td>
      <td width="9%" class="labelEsquerda"><?php echo $nm_estado;?></td>
      <td width="6%" class="labelDireita">RH:</td>
      <td width="23%" class="labelEsquerda"><?php echo $nm_rh;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">PAI:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_pai;?></td>
      <td class="labelDireita">M&Atilde;E:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_mae;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">CONJUGE:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_conjuge;?></td>
      <td class="labelDireita">DATA CASAMENTO:</td>
      <td class="labelEsquerda"><?php echo $dt_casamento;?></td>
      <td class="labelDireita">LOCAL:</td>
      <td class="labelEsquerda"><?php echo $nm_local;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">ESCOLA:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_escola;?></td>
      <td class="labelDireita">GRAU DE INSTRU&Ccedil;&Atilde;O:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_instrucao;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">PROFISS&Atilde;O:</td>
      <td class="labelEsquerda"><?php echo $nm_profissao;?></td>
      <td class="labelDireita">TEL:</td>
      <td class="labelEsquerda"><?php echo $nu_tel_escola;?></td>
      <td class="labelDireita">E-MAIL:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $nm_email;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">EMPRESA:</td>
      <td class="labelEsquerda"><?php echo $nm_empresa;?></td>
      <td class="labelDireita">TEL:</td>
      <td class="labelEsquerda"><?php echo $nu_tel_empresa;?></td>
      <td class="labelDireita">OBSERVA&Ccedil;&Otilde;ES:</td>
      <td colspan="3" class="labelEsquerda"><?php echo $te_observacao;?></td>
    </tr>
  </table>
	
  <table width="80%" border="0" align="center">
    <tr>
      <td colspan="4" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro">INFORMA&Ccedil;&Otilde;ES COMPLEMENTARES</td>
    </tr>
	</table>
	
  <table width="80%" border="1" align="center">
    <tr> 
      <td colspan="2" class="labelCentro">ADMISS&Atilde;O</td>
      <td colspan="2" class="labelCentro">EXCLUS&Atilde;O</td>
    </tr>
    <tr> 
      <td width="82" class="labelCentro">DATA</td>
      <td width="387" class="labelCentro">MOTIVO</td>
      <td width="104" class="labelCentro">DATA</td>
      <td width="397" class="labelCentro">MOTIVO</td>
    </tr>
    <tr> 
      <td class="labelCentro"><?php echo $dt_admissao;?></td>
      <td class="labelCentro"><?php echo $nm_entrada;?></td>
      <td class="labelCentro"><?php echo $dt_saida;?></td>
      <td class="labelCentro"><?php echo $nm_saida;?></td>
    </tr>
  </table>
  
  <table width="80%" border="0" align="center">
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="25%" class="labelEsquerda">IGREJA ONDE SE BATIZOU:</td>
      <td width="24%" class="labelEsquerda"><?php echo $nm_igreja;?></td>
      <td width="5%" class="labelCentro">TEL:</td>
      <td width="46%" class="labelEsquerda"><?php echo $nu_tel_igreja;?></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">PASTOR QUE CELEBROU O BATISMO:</td>
      <td class="labelEsquerda"><?php echo $nm_pastor;?></td>
      <td class="labelCentro">&nbsp;</td>
      <td class="labelCentro">&nbsp;</td>
    </tr>
  </table>
	
  <table width="80%" border="0" align="center">	
	<tr> 
      <td colspan="4" class="labelCentro"><input name="aptidao" type="button" id="volta" onClick="tpl('classes/interface.php?abrirAcaoMembro=abrirAcaoMembro&pk_membro=<?php echo $id;?>&nm_membro=<?php echo $nm_membro;?>&nu_tel_casa=<?php echo $nu_tel_casa;?>')" value="Aptid&otilde;es"> 
        <input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
