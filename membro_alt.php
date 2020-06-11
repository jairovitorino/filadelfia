<?php 
session_start();
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
?>
<html>
<head>
<title>Igreja Batista Filad&eacute;lfia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function caixas(){
	document.getElementById('nm_membro').focus();
}
function sair(detUrl){
document.location = detUrl;
}
function cadastro(detUrl){
document.location = detUrl;
}
function foto(){
var saida = document.getElementById('te_foto');
saida.value =  document.getElementById('upload').value;
}
</script>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="SHORTCUT ICON" href="img/igreja.png"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="form1" method="post" action="classes/interface.php" enctype="multipart/form-data" onSubmit="valida_dados(this)">
  <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <?php
	$msg = @$_SESSION["msg_session"];	
	$nm_usuario = $_SESSION["user"];
	$pk_membro = $_SESSION["pk_membro_session"];	
	?>
   <tr> 
      <td colspan="6" class="labelCentro" bgcolor="#0000FF"><div align="center"><font color="#FFFFFF">MEMBRO 
          - CADASTRO</font></div></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda"> 
        <?php
     if ($nm_usuario){   
   ?>
      </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda">
        <?php
   if ($msg){
   echo "<div align='left'><img src='img/msg_verde.gif' width='20' height='20'><font color='#006600' size='2' face='Arial, Helvetica, sans-serif'> $msg </font></div>";
   }
	?>
      </td>
    </tr>
   
    <?php
	$msg = @$_SESSION["msg_session"];
	$nm_usuario = $_SESSION["user"];
	require_once("classes/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
		
	$sql = mysql_query("SELECT * 
	FROM membros,status,profissoes,instrucao,entradas,estados, saidas, bairros
	WHERE membros.fk_saida = saidas.pk_saida AND membros.fk_estado = estados.pk_estado AND membros.fk_entrada = entradas.pk_entrada 
	AND membros.fk_instrucao = instrucao.pk_instrucao 
	AND membros.fk_bairro = bairros.pk_bairro
	AND membros.fk_profissao = profissoes.pk_profissao AND membros.fk_sexo = status.pk_status AND pk_membro = ".$pk_membro." ");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$id = mysql_result($sql, $z, "pk_membro");
	$nm_membro = mysql_result($sql, $z, "nm_membro");
	$nm_membro = ucwords($nm_membro);
	$te_foto = mysql_result($sql, $z, "te_foto");
	$dt_nascimento = mysql_result($sql, $z, "dt_nascimento");
	$dt_casamento = mysql_result($sql, $z, "dt_casamento");
	$dt_saida = mysql_result($sql, $z, "dt_saida");
	$dt_saida = substr($dt_saida,8,2)."/".substr($dt_saida,5,2)."/".substr($dt_saida,0,4);
	$dt_admissao = mysql_result($sql, $z, "dt_admissao");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2)."/".substr($dt_nascimento,0,4);
	$dt_casamento = substr($dt_casamento,8,2)."/".substr($dt_casamento,5,2)."/".substr($dt_casamento,0,4);
	$dt_admissao = substr($dt_admissao,8,2)."/".substr($dt_admissao,5,2)."/".substr($dt_admissao,0,4);
	?>
	 <tr> 
      <td colspan="6" class="labelCentro"><img src="fotos/<?php echo $te_foto;?>" width="30" height="20"></td>
    </tr>
	<tr> 
      <td colspan="6" class="labelCentro">Foto</td>
    </tr>
	<tr> 
      <td width="12%" class="labelDireita"><font color="#FF0000">Nome</font></td>
      <td class="labelEsquerda"><input name="nm_membro" type="text" id="nm_membro" value="<?php echo $nm_membro;?>" size="50" maxlength="50"> 
      </td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_casa" type="text" id="nu_tel_casa" value="<?php echo mysql_result($sql, $z, "nu_tel_casa");?>" size="20" maxlength="50"></td>
      <td class="labelDireita">Imagem</td>
      <td class="labelEsquerda"><input type="file" name="upload" id="upload" onChange="javascript:foto()">
        <input type="checkbox" name="nm_foto" value="checkbox">
        Mudar a foto</td>
    </tr>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">RG</font></td>
      <td class="labelEsquerda"><input name="nu_rg" type="text" id="nu_rg" value="<?php echo mysql_result($sql, $z, "nu_rg");?>" size="30" maxlength="20"></td>
      <td class="labelDireita">Nascimento</td>
      <td class="labelEsquerda">
        <?php
		require 'classes/calendario.php';	
		$calendario_campo = new calendario;
		$calendario_campo->nome_campo="dt_nascimento";
		$calendario_campo->value_campo=$dt_nascimento;
		$calendario_campo->criar_campo();
		
		$sql_saida = "SELECT * FROM saidas ORDER BY nm_saida"; 
		$sql_saida = mysql_query($sql_saida);       
		$row_saida = mysql_num_rows($sql_saida);
		 ?>
      </td>
      <td class="labelDireita">RH</td>
      <td class="labelEsquerda"><input name="nm_rh" type="text" id="nm_rh" value="<?php echo mysql_result($sql, $z, "nm_rh");?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Rua, Av, etc</td>
      <td width="24%" class="labelEsquerda"><input name="nm_logra" type="text" id="nm_logra" value="<?php echo mysql_result($sql, $z, "nm_logra");?>" size="50" maxlength="50"></td>
      <td width="8%" class="labelDireita">CEP</td>
      <td width="18%" class="labelEsquerda"><input name="nu_cep" type="text" id="nu_cep" value="<?php echo mysql_result($sql, $z, "nu_cep");?>" size="20" maxlength="8"></td>
      <td width="12%" class="labelDireita"><font color="#FF0000">Bairro</font></td>
	  <?php 
	  $sql_bairro = "SELECT * FROM bairros ORDER BY nm_bairro"; 
		$sql_bairro = mysql_query($sql_bairro);       
		$row_bairro = mysql_num_rows($sql_bairro);
	  ?>
      <td width="26%" class="labelEsquerda"><select name="fk_bairro" id="fk_bairro">
          <option value="<?php echo mysql_result($sql, $z, "fk_bairro");?>"><?php echo mysql_result($sql, $z, "nm_bairro");?></option>
          <?php for($t=0; $t<$row_bairro; $t++) { ?>
          <option value="<?php echo mysql_result($sql_bairro, $t, "pk_bairro"); ?>"> 
          <?php echo mysql_result($sql_bairro, $t, "nm_bairro"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">Cidade</td>
      <td class="labelEsquerda"><input name="nm_cidade" type="text" id="nm_cidade" value="<?php echo mysql_result($sql, $z, "nm_cidade");?>" size="30" maxlength="50"></td>
      <td class="labelDireita">UF</td>
      <td class="labelEsquerda"><select name="nm_uf" id="nm_uf">
          <option value="<?php echo mysql_result($sql, $z, "nm_uf");?>"><?php echo mysql_result($sql, $z, "nm_uf");?></option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AM">AM</option>
          <option value="AP">AP</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MG">MG</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="PR">PR</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="RS">RS</option>
          <option value="SC">SC</option>
          <option value="SE">SE</option>
          <option value="SP">SP</option>
          <option value="TO">TO</option>
        </select></td>
      <?php
		//CONECTA AO MYSQL    
		 require_once("classes/conexao.php");          
	   	$mysql = new Mysql();
		$mysql->conectar(); 
		$sql_sexo = "SELECT * FROM status WHERE cl_status = '5' ORDER BY nm_status"; 
		$sql_sexo = mysql_query($sql_sexo);       
		$row_sexo = mysql_num_rows($sql_sexo);
		?>
      <td class="labelDireita"><font color="#FF0000">Sexo</font></td>
      <td class="labelEsquerda"><select name="fk_sexo" id="fk_sexo">
          <option value="<?php echo mysql_result($sql, $z, "fk_sexo");?>"><?php echo mysql_result($sql, $z, "nm_status");?></option>
          <?php for($l=0; $l<$row_sexo; $l++) { ?>
          <option value="<?php echo mysql_result($sql_sexo, $l, "pk_status"); ?>"> 
          <?php echo mysql_result($sql_sexo, $l, "nm_status"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <?php
	   	$sql_inst = "SELECT * FROM instrucao ORDER BY nm_instrucao"; 
		$sql_inst = mysql_query($sql_inst);       
		$row_inst = mysql_num_rows($sql_inst);
		?>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">Grau Instru&ccedil;&atilde;o</font></td>
      <td class="labelEsquerda"><select name="fk_instrucao" id="fk_instrucao">
          <option value="<?php echo mysql_result($sql, $z, "fk_instrucao");?>"><?php echo mysql_result($sql, $z, "nm_instrucao");?></option>
          <?php for($o=0; $o<$row_inst; $o++) { ?>
          <option value="<?php echo mysql_result($sql_inst, $o, "pk_instrucao"); ?>"> 
          <?php echo mysql_result($sql_inst, $o, "nm_instrucao"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">Col&eacute;gio</td>
      <td class="labelEsquerda"><input name="nm_escola" type="text" id="nm_escola" value="<?php echo mysql_result($sql, $z, "nm_escola");?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_escola" type="text" id="nu_tel_escola" value="<?php echo mysql_result($sql, $z, "nu_tel_escola");?>" size="20" maxlength="20"></td>
    </tr>
    <?php
	   	$sql_pro = "SELECT * FROM profissoes ORDER BY nm_profissao"; 
		$sql_pro = mysql_query($sql_pro);       
		$row_pro = mysql_num_rows($sql_pro);
		?>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">Profiss&atilde;o</font></td>
      <td class="labelEsquerda"><select name="fk_profissao" id="fk_profissao">
          <option value="<?php echo mysql_result($sql, $z, "fk_profissao");?>"><?php echo mysql_result($sql, $z, "nm_profissao");?></option>
          <?php for($m=0; $m<$row_pro; $m++) { ?>
          <option value="<?php echo mysql_result($sql_pro, $m, "pk_profissao"); ?>"> 
          <?php echo mysql_result($sql_pro, $m, "nm_profissao"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">Empresa</td>
      <td class="labelEsquerda"><input name="nm_empresa" type="text" id="nm_empresa" value="<?php echo mysql_result($sql, $z, "nm_empresa");?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_empresa" type="text" id="nu_tel_empresa" value="<?php echo mysql_result($sql, $z, "nu_tel_empresa");?>" size="20" maxlength="50"></td>
    </tr>
    <?php
	   	$sql_civil = "SELECT * FROM estados ORDER BY nm_estado"; 
		$sql_civil = mysql_query($sql_civil);       
		$row_civil = mysql_num_rows($sql_civil);
		?>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">Estado Civil</font></td>
      <td class="labelEsquerda"><select name="fk_estado" id="fk_estado">
          <option value="<?php echo mysql_result($sql, $z, "fk_estado");?>"><?php echo mysql_result($sql, $z, "nm_estado");?></option>
          <?php for($n=0; $n<$row_civil; $n++) { ?>
          <option value="<?php echo mysql_result($sql_civil, $n, "pk_estado"); ?>"> 
          <?php echo mysql_result($sql_civil, $n, "nm_estado"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">C&ocirc;njuge</td>
      <td class="labelEsquerda"><input name="nm_conjuge" type="text" id="nm_conjuge" value="<?php echo mysql_result($sql, $z, "nm_conjuge");?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Data Casam.</td>
      <td class="labelEsquerda">
        <?php
		$calendario_campo->nome_campo="dt_casamento";
		$calendario_campo->value_campo=$dt_casamento;
		$calendario_campo->criar_campo();		
		 ?>
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">Local Casamento</td>
      <td class="labelEsquerda"><input name="nm_local" type="text" id="nm_local" value="<?php echo mysql_result($sql, $z, "nm_local");?>" size="30" maxlength="50"> 
      </td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda"><!--DWLayoutEmptyCell-->&nbsp; </td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelDireita">Pai</td>
      <td colspan="5" class="labelEsquerda"><input name="nm_pai" type="text" id="nm_pai" value="<?php echo mysql_result($sql, $z, "nm_pai");?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">M&atilde;e</td>
      <td colspan="5" class="labelEsquerda"><input name="nm_mae" type="text" id="nm_mae" value="<?php echo mysql_result($sql, $z, "nm_mae");?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Admiss&atilde;o</td>
      <td class="labelEsquerda"><?php
		$calendario_campo->nome_campo="dt_admissao";
		$calendario_campo->value_campo=$dt_admissao;
		$calendario_campo->criar_campo();
		
		$sql_saida = "SELECT * FROM saidas ORDER BY nm_saida"; 
		$sql_saida = mysql_query($sql_saida);       
		$row_saida = mysql_num_rows($sql_saida);
		 ?></td>
      <?php
		$sql_motivo = "SELECT * FROM entradas ORDER BY nm_entrada"; 
		$sql_motivo = mysql_query($sql_motivo);       
		$row_motivo = mysql_num_rows($sql_motivo);
		?>
      <td class="labelDireita"><font color="#FF0000">Motivo</font></td>
      <td class="labelEsquerda"><select name="fk_entrada" id="fk_entrada">
          <option value="<?php echo mysql_result($sql, $z, "fk_entrada");?>"><?php echo mysql_result($sql, $z, "nm_entrada");?></option>
          <?php for($p=0; $p<$row_motivo; $p++) { ?>
          <option value="<?php echo mysql_result($sql_motivo, $p, "pk_entrada"); ?>"> 
          <?php echo mysql_result($sql_motivo, $p, "nm_entrada"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelDireita">Igreja</td>
      <td class="labelEsquerda"><input name="nm_igreja" type="text" id="nm_igreja" value="<?php echo mysql_result($sql, $z, "nm_igreja");?>" size="40" maxlength="50"></td>
      <td class="labelDireita">Pastor</td>
      <td class="labelEsquerda"><input name="nm_pastor" type="text" id="nm_pastor" value="<?php echo mysql_result($sql, $z, "nm_pastor");?>" size="40" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_igreja" type="text" id="nu_tel_igreja" value="<?php echo mysql_result($sql, $z, "nu_tel_igreja");?>" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Observa&ccedil;&atilde;o</td>
      <td colspan="5" class="labelEsquerda"><input name="te_observacao" type="text" id="te_observacao" value="<?php echo mysql_result($sql, $z, "te_observacao");?>" size="100" maxlength="150"></td>
    </tr>
    <tr> 
      <td class="labelDireita">E-mail</td>
      <td class="labelEsquerda"><input name="nm_email" type="text" id="nm_email" value="<?php echo mysql_result($sql, $z, "nm_email");?>" size="50" maxlength="80"></td>
      <td class="labelDireita">Saida</td>
      <td class="labelEsquerda"> <?php
		$calendario_campo->nome_campo="dt_saida";
		$calendario_campo->value_campo=@$dt_saida;
		$calendario_campo->criar_campo();		
		 ?></td>
	   <?php
		$sql_saida = "SELECT * FROM saidas ORDER BY nm_saida"; 
		$sql_saida = mysql_query($sql_saida);       
		$row_saida = mysql_num_rows($sql_saida);
		 ?>
	  <td class="labelDireita">Status</td>
      <td class="labelEsquerda"><select name="fk_saida" id="fk_saida">
          <option value="<?php echo mysql_result($sql_saida, $z, "fk_saida");?>"><?php echo mysql_result($sql, $z, "nm_saida");?></option>
          <?php for($r=0; $r<$row_saida; $r++) { ?>
          <option value="<?php echo mysql_result($sql_saida, $r, "pk_saida"); ?>"> 
          <?php echo mysql_result($sql_saida, $r, "nm_saida"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <?php } ?>
    <tr> 
      <td class="labelEsquerda">&nbsp;</td>
      <td colspan="5"> <input type="hidden" name="alterarMembro" value="alterarMembro"> 
        <input type="hidden" name="pk_membro" value="<?php echo $pk_membro;?>">
        <input type="hidden" name="upload" id="upload" > 
		<input type="hidden" name="te_foto" id="te_foto" ></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda"><img src="img/barra.jpg" width="17" height="8"> 
        - Preenchimento obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input name="grava" type="submit" id="grava" value="Gravar"> 
        <input name="novo" type="button" id="novo" value="Aptidão" onClick="javascript:cadastro('classes/interface.php?abrirAptidaoFiltro=abrirAptidaoFiltro&pk_membro=<?php echo $id;?>')">
        <input name="novo2" type="button" id="novo2" value="Novo" onClick="javascript:cadastro('classes/interface.php?abrirMembro=abrirMembro')">
        <input name="sai" type="button" id="sai" value="Home" onClick="javascript:sair('tpl.php')"> 
      </td>
    </tr>
  </table>
</form>
<?php
 @$calendario_campo->criar_java_campo();
?>
</body>
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
