<?php 
session_start();

$titulo = @$_SESSION['titulo'];
$titulo == "" ? $titulo = "ARLS - Concórdia - GOEB" : $titulo = $titulo;
?>
<html>
<head>
<title><?php echo $titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="img/igreja.png"/>
<?php
$login_igreja = @$_SESSION['login_igreja'];
   
 if ($login_igreja){
$id_tipo = @$_SESSION["id_tipo"];
$nm_usuario = $_SESSION["user"];
?>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="form1" method="post" action="">
<table width="100%" border="0" >
 
<?php if ( $id_tipo == 43 ) { ?>
<tr> 
 <td class="labelCentro">&nbsp;</td>
</tr>
<tr> 
 <td class="labelCentro"><?php echo "<div align='center'><img src='img/msg_verde.gif' width='20' height='20'><font color='#006600' size='2' face='Arial, Helvetica, sans-serif'> Bem Vindo Sr(a): $nm_usuario. </font></div>";?></td>
</tr>
 <script type="text/javascript" src="js/menu.js"></script>
<tr> 
  <td><ul class="udm" id="udm" name="udm">
      <li><a href="#">Cadastros</a>
      <ul>
       <li><a href="classes/interface.php?abrirMembroPesquisa=abrirMembroPesquisa">Membros</a>
	   <li><a href="classes/interface.php?abrirAptidaoPesquisa=abrirAptidaoPesquisa">Aptd&otilde;es</a> 
	          <li><a href="classes/interface.php?abrirProfPesquisa=abrirProfPesquisa">Profiss&otilde;es</a> 
              <li><a href="classes/interface.php?abrirUsuarioPesquisa=abrirUsuarioPesquisa">Usu&aacute;rios</a>
	    </ul>
    </li>
     <li><a href="#">Relat&oacute;rios</a> 
   <ul>
       		<li><a href="#">Membros</a>
             <ul>
              <li><a href="classes/interface.php?abrirMembroFlutuante=abrirMembroFlutuante">Flutuantes</a></li>			 
			   <li><a href="#">Efetivos</a>
			   <ul>			   
			   <li><a href="classes/interface.php?abrirMembroEfetivo=abrirMembroEfetivo">Todos</a></li>
			   <li><a href="classes/interface.php?abrirParametrizado=abrirParametrizado&nm_usuario=<?php echo $nm_usuario;?>">Parametrizado</a></li>
			    </ul>
			   <li><a href="classes/interface.php?abrirMembroTeste=abrirMembroTeste">Estado Civil</a></li>
              <li><a href="classes/interface.php?abrirMembroInativo=abrirMembroInativo">Inativos</a></li>
              </ul>
			<li><a href="#">Aptid&otilde;es</a>
             <ul>
              <li><a href="classes/interface.php?abrirAptidaoMembro=abrirAptidaoMembro">Membros</a></li>
                  <li><a href="classes/interface.php?abrirAptidaoAcao=abrirAptidaoAcao">&Iacute;tens</a></li>
              </ul>
			   <li><a href="classes/interface.php?abrirMembroAniver=abrirMembroAniver">Aniversariantes</a></li> 			   
                <li><a href="classes/interface.php?abrirGraficoMembro=abrirGraficoMembro">Infogr&aacute;fico</a></li> 
			  			
   </ul>
    <li><a href="#">Suporte</a> 
     <ul>
    <li><a href="">Manual</a></li>
	 <li><a href="#">Backup</a>
        	<ul>		
			 <li><a href="classes/interface.php?executarBackup=executarBackup">Executar</a></li>
		  <li><a href="#">Exibir</a></li>		 
		 </ul>
		 <li><a href="#">Imagens</a></li>
	  <li><a href="">Vers&atilde;o 3.0</a></li>
      
	 </ul>
    <li><a href="#">Sair</a> 
    <ul>
      <li><a href="logout.php">Logout</a></li>
     </ul>
     </ul></td>
    </tr>
    <?php } elseif ( $id_tipo == 44 ) {?>
    <tr> 
      <td colspan="5" class="labelCentro"><?php echo "<div align='center'><img src='img/msg_amarela.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> Bem Vindo Sr(a): $nm_usuario </font></div>";?></td>
    </tr>
    <script type="text/javascript" src="js/menu.js"></script>
    <tr> 
      <td><ul class="udm" id="udm" name="udm">
       
     <li><a href="#">Relat&oacute;rios</a> 
       <ul>
     		<li><a href="#">Membros</a>
             <ul>
              <li><a href="classes/interface.php?abrirMembroAtivo=abrirMembroAtivo">Ativos</a></li>
              <li><a href="classes/interface.php?abrirMembroInativo=abrirMembroInativo">Inativos</a></li>
              </ul>
			<li><a href="#">Aptid&otilde;es</a>
             <ul>
              <li><a href="classes/interface.php?abrirAptidaoMembro=abrirAptidaoMembro">Membros</a></li>
              <li><a href="classes/interface.php?abrirAptidaoAcao=abrirAptidaoAcao">&Iacute;tens</a></li>
              </ul>	   	   
	 </ul>
          <li><a href="#">Ajuda</a> 
            <ul>
             <li><a href="">Manual</a></li>
     		<li><a href="">Suporte T&eacute;cnico</a></li>
			  <li><a href="">Vers&atilde;o 1.0</a></li>
            </ul>
          <li><a href="#">Sair</a> 
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        </ul></td>
    </tr>
	    <?php } else {
		// width="4%"
		echo "<table border='0' width='50%' align='center'>";
		echo "<tr>";
		echo "<tdclass='labelEsquerda'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='labelEsquerda'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='labelCentro'>Sr.(a) $nm_usuario, seu acesso ainda não foi liberado. Entre em contato com o Administrador!</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<tdclass='labelEsquerda'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='labelEsquerda'>&nbsp;</td>";
		echo "</tr>";
		echo "</table>";
		?>
		
    <?php if ( !empty($_POST['nm_login']) ) {?>
    <tr> 
      <td class="labelCentro"><?php echo "<div align='center'><img src='img/msg_amarela.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> Usuário não cadastrado ou login ou senha inválida... </font></div>";?></td>
    </tr>
    <?php } ?>
    <?php }?>
  </table>
</form>
<script language="JavaScript">
function move_i(what) { what.style.background='#cccccc'; }
function move_o(what) { what.style.background='#ffffff'; }
</script> 
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
</body>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>

