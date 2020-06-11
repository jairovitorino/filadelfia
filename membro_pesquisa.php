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
	document.getElementById('nm_membro').focus();
}

function tpl(inserir){
document.location = inserir;
}
//function listar(inserir){
//document.location = inserir;
//}
function pesquisar(){

var mycodigo = document.getElementById('nm_membro');

if ( mycodigo.value ==""  ) {
alert("Favor informar um NOME");
document.getElementById('nm_membro').focus;
} else { 
//document.location = documento;
document.formulario.action = "classes/interface.php";
document.formulario.method = "post";
document.formulario.submit();
}
}

</script> 
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
&nbsp;
&nbsp;
&nbsp;

<?php 
$nm_usuario = $_SESSION["user"];
if ($nm_usuario) {
?>

<form name="formulario" onSubmit="return validar_cmpo(this)">
  <table width="67%" border="0" align="center">
    <tr> 
      <td width="54%" class="labelDireita">&nbsp;</td>
      <td width="46%" class="labelDireita">Usu&aacute;rio logado:<?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelDireita"><hr></td>
    </tr>
      <tr> 
      <td colspan="2" class="labelCentro"><input type="hidden" name="localizarMembro" value="localizarMembro"></td>
    </tr>	
     <tr> 
      <td class="labelDireita">Infome um nome:</td>
      <td class="labelEsquerda"><input type="text" name="nm_membro" id="nm_membro" size="30" maxlength="50"></td>
    </tr>
    <tr>
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="2" class="labelCentro"><input type="button" name="Button" value="Localizar" onClick="pesquisar('classes/interface.php')"></td>
    </tr>    
    <tr> 
      <td colspan="2" class="labelCentro"><input name="lista" type="button" id="lista" onClick="tpl('classes/interface.php?abrirMembroLista=abrirMembroLista')" value="   Listar    "></td>
    </tr>
      <tr> 
      <td colspan="2" class="labelCentro"><input type="button" name="Button2" value="Cadastrar" onClick="tpl('classes/interface.php?abrirMembroCadastro=abrirMembroCadastro')">
        </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="volta" type="button" id="volta" onClick="tpl('tpl.php')" value="&lt;&lt; Voltar"></td>
    </tr>
	<tr> 
      <td class="labelCentro"><?php } else { echo "Sistema não foi logado..."; } ?><br></td>
    </tr>
  </table>

</form>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>

</html>
