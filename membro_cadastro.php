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
function validar_cmpo(nmCmpo){

if ( document.getElementById('nm_membro').value == "" ){
alert("preencher o campo Nome");
nmCmpo.document.getElementById('nm_membro').focus(); 
nmCmpo.document.getElementById('nm_membro').style.border="1px solid red";
return (false);
}
if ( document.getElementById('nu_rg').value == "" ){
alert("preencher o campo RG");
nmCmpo.document.getElementById('nu_rg').focus(); 
nmCmpo.document.getElementById('nu_rg').style.border="1px solid red";
return (false);
}
if ( document.getElementById('fk_sexo').value == 0 ){
alert("preencher o campo Sexo");
nmCmpo.document.getElementById('fk_sexo').focus(); 
nmCmpo.document.getElementById('fk_sexo').style.border="1px solid red";
return (false);
}
if ( document.getElementById('fk_instrucao').value == 0 ){
alert("preencher o campo Grau de Instrução");
nmCmpo.document.getElementById('fk_instrucao').focus(); 
nmCmpo.document.getElementById('fk_instrucao').style.border="1px solid red";
return (false);
}
if ( document.getElementById('fk_profissao').value == 0 ){
alert("preencher o campo Profissão");
nmCmpo.document.getElementById('fk_profissao').focus(); 
nmCmpo.document.getElementById('fk_profissao').style.border="1px solid red";
return (false);
}
if ( document.getElementById('fk_estado').value == 0 ){
alert("preencher o campo Estado Civil");
nmCmpo.document.getElementById('fk_estado').focus(); 
nmCmpo.document.getElementById('fk_estado').style.border="1px solid red";
return (false);
}
if ( document.getElementById('fk_entrada').value == 0 ){
alert("preencher o campo Motivo");
nmCmpo.document.getElementById('fk_entrada').focus(); 
nmCmpo.document.getElementById('fk_entrada').style.border="1px solid red";
return (false);
}
return (true);
}
function sair(detUrl){
document.location = detUrl;
}
var req;
function acesso(){
	if (window.XMLHttpRequest){
	req = new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
	req = new ActiveXObject("Microsoft.XMLHTTP");
	}	
	var nu_rg = document.getElementById("nu_rg").value;
	var validarRg = document.getElementById("validarRg").value;
	
	var dados = 'nu_rg='+nu_rg+"&validarRg="+validarRg;
	req.open("POST", "classes/interface.php", true);
	req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	req.onreadystatechange = function(){
		if (req.readyState == 1){
			document.getElementById("tes").innerHTML = '<font color="red">Verificando...</font>';
		}
		if (req.readyState == 4 && req.status == 200){
		var resposta = req.responseText;
		document.getElementById("tes").innerHTML = resposta;
		
		}
	}

req.send(dados);
//nu_rg = document.getElementById("nu_rg").focus();
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
<form name="form1" method="post" action="classes/interface.php" enctype="multipart/form-data" onSubmit="return validar_cmpo(this)">
  <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro">&nbsp;</td>
    </tr>
    <?php
	$nm_usuario = $_SESSION['user'];
	//$nm_membro = @$_SESSION['nm_membro_session'];
	$nu_rg = @$_SESSION['nu_rg_session'];
	$msg = @$_SESSION['msg_session'];
	if ($nm_usuario) {
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
      <td colspan="6" class="labelEsquerda"><tr> 
      <td colspan="2" class="labelEsquerda"><font color="#FF0000"><div id="tes"></div></font></td>
    </tr></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelEsquerda"> 
    
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
	
    <tr> 
      <td width="12%" class="labelDireita"><font color="#FF0000">Nome</font></td>
      <td class="labelEsquerda"><input name="nm_membro" type="text" id="nm_membro" value="<?php echo @$nm_membro;?>" size="50" maxlength="50"> 
      </td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_casa" type="text" id="nu_tel_casa" value="<?php echo @$nu_tel_casa;?>" size="20" maxlength="50"></td>
      <td class="labelDireita">Imagem</td>
      <td class="labelEsquerda"><input type="file" name="upload" id="upload" onChange="javascript:foto()"></td>
    </tr>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">RG</font></td>
      <td class="labelEsquerda"><input name="nu_rg" type="text" id="nu_rg" value="<?php echo @$nu_rg;?>" onBlur="javascript:acesso()" size="30" maxlength="20"></td>
      <td class="labelDireita">Nascimento</td>
      <td class="labelEsquerda"> 
        <?php
		require 'classes/calendario.php';	
		$calendario_campo = new calendario;
		$calendario_campo->nome_campo="dt_nascimento";
		$calendario_campo->value_campo=@$dt_nascimento;
		$calendario_campo->criar_campo();
		 ?>
      </td>
      <td class="labelDireita">RH</td>
      <td class="labelEsquerda"><input name="nm_rh" type="text" id="nm_rh" value="<?php echo @$nm_rh;?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Rua, Av, etc</td>
      <td width="24%" class="labelEsquerda"><input name="nm_logra" type="text" id="nm_logra" value="<?php echo @$nm_logra;?>" size="50" maxlength="70"></td>
      <td width="8%" class="labelDireita">CEP</td>
      <td width="18%" class="labelEsquerda"><input name="nu_cep" type="text" id="nu_cep" value="<?php echo @$nu_cep;?>" size="20" maxlength="8"></td>
        <?php
		//CONECTA AO MYSQL    
		 require_once("classes/conexao.php");          
	   	$mysql = new Mysql();
		$mysql->conectar(); 
		$sql_bairro = "SELECT * FROM bairros ORDER BY nm_bairro"; 
		$sql_bairro = mysql_query($sql_bairro);       
		$row_bairro = mysql_num_rows($sql_bairro);
		?>
	  <td width="12%" class="labelDireita"><font color="#FF0000">Bairro</font></td>
      <td width="26%" class="labelEsquerda"><select name="fk_bairro" id="fk_bairro">
          <option value="0">-- Selecione -- >></option>
          <?php for($x=0; $x<$row_bairro; $x++) { ?>
          <option value="<?php echo mysql_result($sql_bairro, $x, "pk_bairro"); ?>"> 
          <?php echo mysql_result($sql_bairro, $x, "nm_bairro"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">Cidade</td>
      <td class="labelEsquerda"><input name="nm_cidade" type="text" id="nm_cidade" value="<?php echo @$nm_cidade;?>" size="30" maxlength="50"></td>
      <td class="labelDireita">UF</td>
      <td class="labelEsquerda"><select name="nm_uf" id="nm_uf">
          <option value="0">-- Selecione -- >></option>
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
	
		$sql_sexo = "SELECT * FROM status WHERE cl_status = '5' ORDER BY nm_status"; 
		$sql_sexo = mysql_query($sql_sexo);       
		$row_sexo = mysql_num_rows($sql_sexo);
		?>
      <td class="labelDireita"><font color="#FF0000">Sexo</font></td>
      <td class="labelEsquerda"><select name="fk_sexo" id="fk_sexo">
          <option value="0">-- Selecione -- >></option>
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
          <option value="0">-- Selecione -- >></option>
          <?php for($o=0; $o<$row_inst; $o++) { ?>
          <option value="<?php echo mysql_result($sql_inst, $o, "pk_instrucao"); ?>"> 
          <?php echo mysql_result($sql_inst, $o, "nm_instrucao"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">Col&eacute;gio</td>
      <td class="labelEsquerda"><input name="nm_escola" type="text" id="nm_escola" value="<?php echo @$nm_escola;?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_escola" type="text" id="nu_tel_escola" value="<?php echo @$nu_tel_escola;?>" size="20" maxlength="20"></td>
    </tr>
    <?php
	   	$sql_pro = "SELECT * FROM profissoes ORDER BY nm_profissao"; 
		$sql_pro = mysql_query($sql_pro);       
		$row_pro = mysql_num_rows($sql_pro);
		?>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">Profiss&atilde;o</font></td>
      <td class="labelEsquerda"><select name="fk_profissao" id="fk_profissao">
          <option value="0">-- Selecione -- >></option>
          <?php for($m=0; $m<$row_pro; $m++) { ?>
          <option value="<?php echo mysql_result($sql_pro, $m, "pk_profissao"); ?>"> 
          <?php echo mysql_result($sql_pro, $m, "nm_profissao"); ?></option>
          <?php } ?>
        </select>
        &nbsp;&nbsp;<a href="classes/interface.php?abrirProfCadastro=abrirProfCadastro">+</a></td>
      <td class="labelDireita">Empresa</td>
      <td class="labelEsquerda"><input name="nm_empresa" type="text" id="nm_empresa" value="<?php echo @$nm_empresa;?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_empresa" type="text" id="nu_tel_empresa" value="<?php echo @$nu_tel_empresa;?>" size="20" maxlength="50"></td>
    </tr>
    <?php
	   	$sql_civil = "SELECT * FROM estados ORDER BY nm_estado"; 
		$sql_civil = mysql_query($sql_civil);       
		$row_civil = mysql_num_rows($sql_civil);
		?>
    <tr> 
      <td class="labelDireita"><font color="#FF0000">Estado Civil</font></td>
      <td class="labelEsquerda"><select name="fk_estado" id="fk_estado">
          <option value="0">-- Selecione -- >></option>
          <?php for($n=0; $n<$row_civil; $n++) { ?>
          <option value="<?php echo mysql_result($sql_civil, $n, "pk_estado"); ?>"> 
          <?php echo mysql_result($sql_civil, $n, "nm_estado"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">C&ocirc;njuge</td>
      <td class="labelEsquerda"><input name="nm_conjuge" type="text" id="nm_conjuge" value="<?php echo @$nm_conjuge;?>" size="30" maxlength="50"></td>
      <td class="labelDireita">Data Casam.</td>
      <td class="labelEsquerda"> 
        <?php
		$calendario_campo->nome_campo="dt_casamento";
		$calendario_campo->value_campo=@$dt_casamento;
		$calendario_campo->criar_campo();
		
		 ?>
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">Local Casamento</td>
      <td class="labelEsquerda"><input name="nm_local" type="text" id="nm_local" value="<?php echo @$nm_local;?>" size="30" maxlength="50"> 
      </td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp; </td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelDireita">Pai</td>
      <td colspan="5" class="labelEsquerda"><input name="nm_pai" type="text" id="nm_pai" value="<?php echo @$nm_pai;?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">M&atilde;e</td>
      <td colspan="5" class="labelEsquerda"><input name="nm_mae" type="text" id="nm_mae" value="<?php echo @$nm_mae;?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Admiss&atilde;o</td>
      <td class="labelEsquerda"> 
        <?php
		$calendario_campo->nome_campo="dt_admissao";
		$calendario_campo->value_campo=@$dt_admissao;
		$calendario_campo->criar_campo();
		
		$sql_motivo = "SELECT * FROM entradas ORDER BY nm_entrada"; 
		$sql_motivo = mysql_query($sql_motivo);       
		$row_motivo = mysql_num_rows($sql_motivo);
		?>
      </td>
      <td class="labelDireita"><font color="#FF0000">Motivo</font></td>
      <td class="labelEsquerda"><select name="fk_entrada" id="fk_entrada">
          <option value="0">-- Selecione -- >></option>
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
      <td class="labelEsquerda"><input name="nm_igreja" type="text" id="nm_igreja" value="<?php echo @$nm_igreja;?>" size="40" maxlength="50"></td>
      <td class="labelDireita">Pastor</td>
      <td class="labelEsquerda"><input name="nm_pastor" type="text" id="nm_pastor" value="<?php echo @$nm_pastor;?>" size="40" maxlength="50"></td>
      <td class="labelDireita">Tel</td>
      <td class="labelEsquerda"><input name="nu_tel_igreja" type="text" id="nu_tel_igreja" value="<?php echo @$nu_tel_igreja;?>" size="20" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Observa&ccedil;&atilde;o</td>
      <td colspan="5" class="labelEsquerda"><input name="te_observacao" type="text" id="te_observacao" value="<?php echo @$te_observacao;?>" size="100" maxlength="150"></td>
    </tr>
    <tr> 
      <td class="labelDireita">E-mail</td>
      <td colspan="5" class="labelEsquerda"><input name="nm_email" type="text" id="nm_email" value="<?php echo @$nm_email;?>" size="50" maxlength="80"></td>
    </tr>
	
    <tr> 
      <td class="labelEsquerda">&nbsp;</td>
      <td colspan="5"> <input type="hidden" name="inserirMembro" value="inserirMembro">
        <input type="hidden" name="validarRg" value="validarRg">
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
	   
        <input name="sai" type="button" id="sai" value="Home" onClick="javascript:sair('tpl.php')"> 
      </td>
    </tr>
  </table>
</form>
<?php
 $calendario_campo->criar_java_campo();
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
