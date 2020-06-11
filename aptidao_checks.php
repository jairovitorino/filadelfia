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
function move_o(what) { what.style.background='#ffffff'; }
</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
$pk_membro = $_SESSION["pk_membro_sql"];
$nm_membro = $_SESSION["nm_membro_sql"];
?>

<form name="formulario" method="post" action="classes/interface.php">
  <table width="67%" border="0" align="center">
    <tr> 
      <td colspan="4" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro">APTID&Otilde;ES DE:&nbsp;<?php echo $nm_membro;?> 
      </td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">A&ccedil;&atilde;o Social</td>
      <td width="43%" class="labelEsquerda"><input name="acaosocial" type="checkbox" id="acaosocial" value="acaosocial"></td>
      <td width="19%" class="labelEsquerda">Artes Dramaticas</td>
      <td width="18%" class="labelEsquerda"><input name="artesdramaticas" type="checkbox" id="artesdramaticas" value="artesdramaticas"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Ber&ccedil;&aacute;rio</td>
      <td class="labelEsquerda"><input name="bercario" type="checkbox" id="bercario2" value="bercario"></td>
      <td class="labelEsquerda">Cantina</td>
      <td class="labelEsquerda"><input name="cantina" type="checkbox" id="cantina2" value="cantina"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Constru&ccedil;&atilde;o</td>
      <td class="labelEsquerda"><input name="construcao" type="checkbox" id="construcao" value="construcao"></td>
      <td class="labelEsquerda">Creche</td>
      <td class="labelEsquerda"><input name="creche" type="checkbox" id="creche2" value="creche"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Discipulado</td>
      <td class="labelEsquerda"><input name="discipulado" type="checkbox" id="discipulado" value="discipulado"></td>
      <td class="labelEsquerda">Embaixadores do Rei</td>
      <td class="labelEsquerda"><input name="embaixadores" type="checkbox" id="embaixadores" value="embaixadores"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Esportes</td>
      <td class="labelEsquerda"><input name="esportes" type="checkbox" id="esportes" value="esportes"></td>
      <td class="labelEsquerda">Evangelismo</td>
      <td class="labelEsquerda"><input name="evangelismo" type="checkbox" id="evangelismo" value="evangelismo"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Finan&ccedil;as</td>
      <td class="labelEsquerda"><input name="financas" type="checkbox" id="financas" value="financas"></td>
      <td class="labelEsquerda">Mensagens do Rei</td>
      <td class="labelEsquerda"><input name="mensagens" type="checkbox" id="mensagens" value="mensagens"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">M&uacute;sica</td>
      <td class="labelEsquerda"><input name="musica" type="checkbox" id="musica" value="musica"></td>
      <td class="labelEsquerda">Ornamenta&ccedil;&atilde;o</td>
      <td class="labelEsquerda"><input name="ornamentacao" type="checkbox" id="ornamentacao" value="ornamentacao"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Professor EBD</td>
      <td class="labelEsquerda"><input name="professor" type="checkbox" id="professor" value="professor"></td>
      <td class="labelEsquerda">Recep&ccedil;&atilde;o</td>
      <td class="labelEsquerda"><input name="recepcao" type="checkbox" id="recepcao" value="recepcao"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Secretaria</td>
      <td class="labelEsquerda"><input name="secretaria" type="checkbox" id="secretaria" value="secretaria"></td>
      <td class="labelEsquerda">Servi&ccedil;o M&eacute;dico</td>
      <td class="labelEsquerda"><input name="servicomedico" type="checkbox" id="servicomedico" value="servicomedico"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Servi&ccedil;o Social</td>
      <td class="labelEsquerda"><input name="servicosocial" type="checkbox" id="servicosocial2" value="servicosocial"></td>
      <td class="labelEsquerda">Sonoplastia</td>
      <td class="labelEsquerda"><input name="sonoplastia" type="checkbox" id="sonoplastia" value="sonoplastia"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Trabalhar c/ Adolescentes</td>
      <td class="labelEsquerda"><input name="trabadolescente" type="checkbox" id="trabadolescente" value="trabadolescente"></td>
      <td class="labelEsquerda">Trabalhar c/ Adultos</td>
      <td class="labelEsquerda"><input name="trabadulto" type="checkbox" id="trabadulto" value="trabadulto"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">Trabalhar c/ Crian&ccedil;as</td>
      <td class="labelEsquerda"><input name="trabcrianca" type="checkbox" id="trabcrianca" value="trabcrianca"></td>
      <td class="labelEsquerda">Trabalhar c/ Jovens</td>
      <td class="labelEsquerda"><input name="trabjovem" type="checkbox" id="trabjovem" value="trabjovem"></td>
    </tr>
    <tr> 
      <td width="20%" class="labelEsquerda">&nbsp;</td>
      <td colspan="3" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelCentro" colspan="4"><input name="inserirChecks" type="hidden" value="inserirChecks"> 
        <input name="pk_membro" type="hidden" value="<?php echo $pk_membro;?>"> 
        <input name="nm_membro" type="hidden" value="<?php echo $nm_membro;?>"></td>
    </tr>
    <tr> 
      <td class="labelCentro" colspan="4"><input name="grava" type="submit" id="grava" value="  Gravar  "> 
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
