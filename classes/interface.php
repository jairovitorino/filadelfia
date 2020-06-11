<?php
session_start();
require_once("persistencias.php");
$persistencia = new Persistencia();
	// ----sistema filadélfia
	// ---- métodos logar
if ( !empty($_POST['logar']) )  {
	$nm_login = addslashes($_POST['nm_login']);
	$nm_senha = addslashes($_POST['nm_senha']);
	$persistencia->logar( $nm_login,$nm_senha);
	}
if ( !empty($_GET['abrirMembroPdf']) )  {
	
	header ("location: ../membro_efetivo_pdf.php");
	}
if ( !empty($_GET['abrirFlutuantePdf']) )  {
	
	header ("location: ../membro_flutuante_pdf.php");
	}
if ( !empty($_GET['abrirFichaPdf']) )  {
	$pk_membro = addslashes($_GET['pk_membro']);
	$_SESSION['pk_membro'] = $pk_membro;
	header ("location: ../membro_ficha_pdf.php");
	}
	// ---- métodos abrir
if ( !empty($_GET['abrirFlutuanteFicha']) )  {
	$pk_flutuante = addslashes($_GET['pk_flutuante']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirFlutuanteFicha($nm_usuario,$pk_flutuante);
	}
if ( !empty($_GET['abrirFlutuanteAlt']) )  {
	$pk_flutuante = addslashes($_GET['pk_flutuante']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirFlutuanteAlt($nm_usuario,$pk_flutuante);
	}
if ( !empty($_GET['abrirGraficoMembro']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirGraficoMembro($nm_usuario);
	}
if ( !empty($_GET['abrirMembroPesquisa']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroPesquisa($nm_usuario);
	}
if ( !empty($_GET['abrirMembroCadastro']) )  {
	unset($_SESSION["msg_session"]);
	unset($_SESSION["nu_rg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroCadastro($nm_usuario);
	}
if ( !empty($_GET['abrirMembroLista']) ) {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroLista($nm_usuario);
	}
if ( !empty($_GET['abrirProfPesquisa']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirProfPesquisa($nm_usuario);
	}
if ( !empty($_GET['abrirProfCadastro']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirProfCadastro($nm_usuario);
	}
if ( !empty($_GET['abrirProfLista']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirProfLista($nm_usuario);
	}
if ( !empty($_GET['abrirAptidaoPesquisa']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirAptidaoPesquisa($nm_usuario);
	}
if ( !empty($_GET['abrirAptidaoFiltro']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_membro = addslashes($_GET['pk_membro']);
	//$pk_membro = 245;
	$persistencia->abrirAptidaoFiltro($nm_usuario,$pk_membro);
	}
if ( !empty($_GET['abrirMembro']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembro($nm_usuario);
	}
if ( !empty($_GET['abrirMembroFicha']) )  {
	$pk_membro = addslashes($_GET['pk_membro']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroFicha($nm_usuario,$pk_membro);
	}
if ( !empty($_GET['abrirMembroAptidao']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroAptidao($nm_usuario);
	}
if ( !empty($_GET['abrirAptidaoMembro']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirAptidaoMembro($nm_usuario);
	}
if ( !empty($_GET['abrirAptidaoAcao']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirAptidaoAcao($nm_usuario);
	}
if ( !empty($_GET['abrirMembroFlutuante']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroFlutuante($nm_usuario);
	}
if ( !empty($_GET['abrirMembroCivil']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_estado = addslashes($_GET['pk_estado']);
	$nm_estado = addslashes($_GET['nm_estado']);
	$persistencia->abrirMembroCivil($nm_usuario,$pk_estado,$nm_estado);
	}
if ( !empty($_GET['abrirMembroEfetivo']) )  {
	unset($_SESSION["msg_session"]);
	unset($_SESSION['hc']);
	unset($_SESSION['h']);
	unset($_SESSION['i']);
	unset($_SESSION['j']);
	unset($_SESSION['l']);
	unset($_SESSION['fk_profissao']);
	unset($_SESSION['fk_bairro']);
	unset($_SESSION['fk_estado']);
	unset($_SESSION['nm_profissao']);
	unset($_SESSION['nm_bairro']);
	//unset($_SESSION['pk_membro_adolescente']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$hc = addslashes($_GET['hc']);
	$h = addslashes($_GET['h']);
	$i = addslashes($_GET['i']);
	$j = addslashes($_GET['j']);
	$l = addslashes($_GET['l']);
	$fk_profissao = addslashes($_GET['fk_profissao']);
	$fk_bairro = addslashes($_GET['fk_bairro']);
	$fk_estado = addslashes($_GET['fk_estado']);
	$nm_profissao = addslashes($_GET['nm_profissao']);
	$nm_bairro = addslashes($_GET['nm_bairro']);
	$nm_usuario = $_SESSION["user"];
	
	$persistencia->abrirMembroEfetivo($nm_usuario,$hc,$h,$i,$j,$l,$fk_profissao,$fk_bairro,$fk_estado,$nm_profissao,$nm_bairro);
	}
if ( !empty($_GET['abrirMembroTeste']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroTeste($nm_usuario);
	}
if ( !empty($_GET['abrirMembroInativo']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroInativo($nm_usuario);
	}
if ( !empty($_GET['abrirMembroAcao']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_aptidao = addslashes($_GET['pk_aptidao']);
	$nm_aptidao = addslashes($_GET['nm_aptidao']);
	$nm_membro = addslashes($_GET['nm_membro']);
	$persistencia->abrirMembroAcao($nm_usuario,$nm_membro,$pk_aptidao,$nm_aptidao);
	}
if ( !empty($_GET['abrirAcaoMembro']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_membro = addslashes($_GET['pk_membro']);
	$nm_membro = addslashes($_GET['nm_membro']);
	$nu_tel_casa = addslashes($_GET['nu_tel_casa']);
	$te_foto = addslashes($_GET['te_foto']);
	$persistencia->abrirAcaoMembro($nm_usuario,$pk_membro,$nm_membro,$nu_tel_casa,$te_foto);
	}
if ( !empty($_GET['abrirAniverMes']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);	
	$persistencia->abrirAniverMes($nm_usuario);
	}
if ( !empty($_GET['abrirMembroAniver']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirMembroAniver($nm_usuario);
	}
if ( !empty($_GET['abrirUsuario']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirUsuario($nm_usuario);
	}
if ( !empty($_GET['abrirUsuarioPesquisa']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirUsuarioPesquisa($nm_usuario);
	}
if ( !empty($_GET['abrirUsuarioLista']) )  {
	unset($_SESSION["msg_session"]);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->abrirUsuarioLista($nm_usuario);
	}
	// ---- métodos excluir
if ( !empty($_GET['excluirFlutuante']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_flutuante = addslashes($_GET['pk_flutuante']);
	$persistencia->excluirFlutuante($nm_usuario,$pk_flutuante);
	}
if ( !empty($_GET['excluirMembro']) )  {
	$pk_membro = addslashes($_GET['pk_membro']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$persistencia->excluirMembro($nm_usuario,$pk_membro);
	}
if ( !empty($_GET['excluirMembroAptidao']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_membro = addslashes($_GET['pk_membro']);
	$pk_aptidao = addslashes($_GET['pk_aptidao']);
	$nm_membro = addslashes($_GET['nm_membro']);
	$persistencia->excluirMembroAptidao($nm_usuario,$pk_membro,$nm_membro,$pk_aptidao);
	}
if ( !empty($_GET['excluirProfissao']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_profissao = addslashes($_GET['pk_profissao']);
	$persistencia->excluirProfissao($nm_usuario,$pk_profissao);
	}
if ( !empty($_GET['excluirUsuario']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_usuario = addslashes($_GET['pk_usuario']);
	$persistencia->excluirUsuario($nm_usuario,$pk_usuario);
	}
	// ---- métodos inserir
if ( !empty($_POST['inserirMembro']) )  {
	@$nm_usuario = addslashes($_POST['nm_usuario']);
	$nm_membro = addslashes($_POST['nm_membro']);
	$nm_membro = ucwords($nm_membro);
	$nu_rg = addslashes($_POST['nu_rg']);
	$nu_tel_casa = addslashes($_POST['nu_tel_casa']);
	$dt_nascimento = addslashes($_POST['dt_nascimento']);
	$nm_rh = addslashes($_POST['nm_rh']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$fk_bairro = addslashes($_POST['fk_bairro']);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_uf = addslashes($_POST['nm_uf']);
	$fk_sexo = addslashes($_POST['fk_sexo']);
	$fk_instrucao = addslashes($_POST['fk_instrucao']);
	$nm_escola = addslashes($_POST['nm_escola']);
	$nu_tel_escola = addslashes($_POST['nu_tel_escola']);
	$fk_profissao = addslashes($_POST['fk_profissao']);
	$nm_empresa = addslashes($_POST['nm_empresa']);
	$nu_tel_empresa = addslashes($_POST['nu_tel_empresa']);
	$fk_estado = addslashes($_POST['fk_estado']);
	$nm_conjuge = addslashes($_POST['nm_conjuge']);
	$dt_casamento = addslashes($_POST['dt_casamento']);
	$nm_local = addslashes($_POST['nm_local']);
	$nm_pai = addslashes($_POST['nm_pai']);
	$nm_mae = addslashes($_POST['nm_mae']);
	$dt_admissao = addslashes($_POST['dt_admissao']);
	$fk_entrada = addslashes($_POST['fk_entrada']);
	$nm_igreja = addslashes($_POST['nm_igreja']);
	$nu_tel_igreja = addslashes($_POST['nu_tel_igreja']);
	$nm_pastor = addslashes($_POST['nm_pastor']);
	$te_observacao = addslashes($_POST['te_observacao']);
	$nm_email = addslashes($_POST['nm_email']);
	$upload  = $_FILES['upload'];
	$te_foto = addslashes($_POST['te_foto']);
	
	$upextensao['extensoes'] = array('pdf','jpg');
	$extensao = strtolower(end(explode('.', $_FILES['upload']['name'])));
	$uptamanho['tamanho'] = 2097152; // 2Mb
		
	$imagem = $_FILES["upload"]["name"]; //pega o nome do arquivo
   	$temp_imagem = $_FILES["upload"]["tmp_name"]; //pega o "temp" do arquivo
   	$tipo = $_FILES["upload"]["type"]; //pega o tipo do arquivo
   	$tamanho = $_FILES["upload"]["size"]; //pega o tamanho do arquivo
   	$t_maximo = 2000000; //tamanho máximo do arquivo - em bytes
   	$uploaddir = '../fotos/';
	
	$uploadfile = $uploaddir . $_FILES['upload']['name'];
		
	$imagem = isset($_FILES['upload']) ? $_FILES['upload'] : FALSE;
	
		
	if ( ($nm_membro == "") || ($fk_sexo == 0) || ($fk_instrucao == 0) || ($fk_profissao == 0) || ($fk_estado == 0) || ($fk_entrada == 0) || ($nu_rg == "") || ($fk_bairro == 0) ){
	$msg = "Preencher campos obrigatórios";
	$_SESSION['msg_session'] = $msg;
	header ("location: ../membro_cadastro.php");
	
	} else if ($imagem == ""){
		$msg_session = "Escolha um arquivo á ser enviado";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_cadastro.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_cadastro.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_cadastro.php");
		
	} else if ( ($te_foto != "") && (!eregi("[gif|jpeg|jpg]", $tipo)) ){
		$msg_session = "Tipo de arquivo inválido";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_cadastro.php");
	
	} else if ( file_exists("$uploaddir"."$imagem") ){
		$msg_session = "Já existe um arquivo com este nome $imagem, por favor, renomeie-o";
		$_SESSION['msg_session'] = $msg_session;	
	header ("location: ../membro_cadastro.php");
		
	} else {
	move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile) ;
	
	$persistencia->inserirMembro($nm_usuario,$nm_membro,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
	$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,
	$dt_admissao,$fk_entrada,$nm_igreja,$nu_tel_igreja,$nm_pastor,$fk_entrada,$te_observacao,$nm_email,$te_foto);
	}
	}
if ( !empty($_POST['inserirMembroDados']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$pk_membro = addslashes($_POST['pk_membro']);
	$nm = addslashes($_POST['nm_membro']);
	$pk_aptidao = addslashes($_POST['pk_aptidao']);
	$persistencia->inserirMembroDados($nm_usuario,$pk_membro,$nm,$pk_aptidao);
	}
if ( !empty($_POST['inserirProfissao']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$nm_profissao = addslashes($_POST['nm_profissao']);
	
	if ( $nm_profissao == "" ){
	
	header ("location: ../profissao_cadastro.php");
	} else {
		
	$persistencia->inserirProfissao($nm_usuario,$nm_profissao);
	}
	}
if ( !empty($_POST['inserirUsuario']) )  {
	$nm_usuario_cadastro = addslashes($_POST['nm_usuario_cadastro']);
	$nm_login = addslashes($_POST['nm_login']);
	$nm_senha = addslashes($_POST['nm_senha']);
	$re_senha = addslashes($_POST['re_senha']);
	
	if ( ($nm_login == "") || ($nm_senha == "") ){
	
	header ("location: ../usuario_cadastro.php");
	
	} else if ( $nm_senha != $re_senha ){
	$msg = "Senha diferente";
	$_SESSION["msg_session"] = $msg;
	header ("location: ../usuario_cadastro.php");
	} else {	
	$persistencia->inserirUsuario($nm_usuario_cadastro,$nm_login,$nm_senha);
	}
	}
if ( !empty($_POST['inserirUsuarioVisitante']) )  {
	$nm_usuario_cadastro = addslashes($_POST['nm_usuario_cadastro']);
	$nm_login = addslashes($_POST['nm_login']);
	$nm_senha = addslashes($_POST['nm_senha']);
	
	$persistencia->inserirUsuarioVisitante($nm_usuario_cadastro,$nm_login,$nm_senha);
	}
if ( !empty($_GET['executarBackup']) )  {
	
	$host = "mysql.lauraware.com.br";//host do banco
	$user = "lauraware03";//usuario do banco
	$senha = "m4r4v1";//senha do banco 
	
	/*$host = "localhost";//host do banco
	$user = "root";//usuario do banco
	$senha = "";//senha do banco */
	
	$data = date("d-m-Y");
	$teste = "2015";
	$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases filadelfia > ../backup/".$data."_backup.sql") ;
	//$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases pessoal > ../arquivos/pessoal.sql") ;
	//$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases filadelfia > c:\util\apls_php\bds\filadelfia.sql") ;
	$resp = "rm *.sql";
	
	header ("location: ../tpl.php");
	}
	// ---- métodos alterar
if ( !empty($_POST['alterarMembro']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$nm_membro = addslashes($_POST['nm_membro']);
	$nm_membro = ucwords($nm_membro);
	$nu_rg = addslashes($_POST['nu_rg']);
	$nu_tel_casa = addslashes($_POST['nu_tel_casa']);
	$dt_nascimento = addslashes($_POST['dt_nascimento']);
	$nm_rh = addslashes($_POST['nm_rh']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$fk_bairro = addslashes($_POST['fk_bairro']);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_uf = addslashes($_POST['nm_uf']);
	$fk_sexo = addslashes($_POST['fk_sexo']);
	$fk_instrucao = addslashes($_POST['fk_instrucao']);
	$nm_escola = addslashes($_POST['nm_escola']);
	$nu_tel_escola = addslashes($_POST['nu_tel_escola']);
	$fk_profissao = addslashes($_POST['fk_profissao']);
	$nm_empresa = addslashes($_POST['nm_empresa']);
	$nu_tel_empresa = addslashes($_POST['nu_tel_empresa']);
	$fk_estado = addslashes($_POST['fk_estado']);
	$nm_conjuge = addslashes($_POST['nm_conjuge']);
	$dt_casamento = addslashes($_POST['dt_casamento']);
	$nm_local = addslashes($_POST['nm_local']);
	$nm_pai = addslashes($_POST['nm_pai']);
	$nm_mae = addslashes($_POST['nm_mae']);
	$dt_admissao = addslashes($_POST['dt_admissao']);
	$fk_entrada = addslashes($_POST['fk_entrada']);
	$nm_pastor = addslashes($_POST['nm_pastor']);
	$nm_igreja = addslashes($_POST['nm_igreja']);
	$fk_saida = addslashes($_POST['fk_saida']);
	$dt_saida = addslashes($_POST['dt_saida']);
	$te_observacao = addslashes($_POST['te_observacao']);
	$nm_email = addslashes($_POST['nm_email']);
	$pk_membro = addslashes($_POST['pk_membro']);
	$nm_foto = addslashes($_POST['nm_foto']);
	$upload  = $_FILES['upload'];
	$te_foto = addslashes($_POST['te_foto']);
	$nm_foto = addslashes($_POST['nm_foto']);
	
	$upextensao['extensoes'] = array('pdf','jpg');
	$extensao = strtolower(end(explode('.', $_FILES['upload']['name'])));
	$uptamanho['tamanho'] = 2097152; // 2Mb
		
	$imagem = $_FILES["upload"]["name"]; //pega o nome do arquivo
   	$temp_imagem = $_FILES["upload"]["tmp_name"]; //pega o "temp" do arquivo
   	$tipo = $_FILES["upload"]["type"]; //pega o tipo do arquivo
   	$tamanho = $_FILES["upload"]["size"]; //pega o tamanho do arquivo
   	$t_maximo = 2000000; //tamanho máximo do arquivo - em bytes
   	$uploaddir = '../fotos/';
	//$uploaddir = '../arquivos//';
	$uploadfile = $uploaddir . $_FILES['upload']['name'];
		
	$imagem = isset($_FILES['upload']) ? $_FILES['upload'] : FALSE;
	
	if ($imagem == ""){
		$msg_session = "Escolha um arquivo á ser enviado";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_alt.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_alt.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../membro_alt.php");
		
	} else if ( ($te_foto != "") && (!eregi("[gif|jpeg|jpg]", $tipo)) ){
		$msg_session = "Tipo de arquivo inválido";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: membro_alt.php");
	
	} else if ( file_exists("$uploaddir"."$imagem") ){
		$msg_session = "Já existe um arquivo com este nome $imagem, por favor, renomeie-o";
		$_SESSION['msg_session'] = $msg_session;	
	header ("location: ../membro_alt.php");
	
	} else {
	if ($nm_foto){
	move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile) ;
	}
	$persistencia->alterarMembro($nm_usuario,$nm_membro,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
	$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,
	$dt_admissao,$fk_entrada,$nm_pastor,$nm_igreja,$fk_saida,$dt_saida,$te_observacao,$nm_email,$pk_membro,$nm_foto,$te_foto);
	}
	}
if ( !empty($_POST['alterarFlutuante']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$nm_flutuante = addslashes($_POST['nm_flutuante']);
	$nm_flutuante = ucwords($nm_flutuante);
	$nu_rg = addslashes($_POST['nu_rg']);
	$nu_tel_casa = addslashes($_POST['nu_tel_casa']);
	$dt_nascimento = addslashes($_POST['dt_nascimento']);
	$nm_rh = addslashes($_POST['nm_rh']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$fk_bairro = addslashes($_POST['fk_bairro']);
	$nm_uf = addslashes($_POST['nm_uf']);
	$fk_sexo = addslashes($_POST['fk_sexo']);
	$fk_instrucao = addslashes($_POST['fk_instrucao']);
	$nm_escola = addslashes($_POST['nm_escola']);
	$nu_tel_escola = addslashes($_POST['nu_tel_escola']);
	$fk_profissao = addslashes($_POST['fk_profissao']);
	$nm_empresa = addslashes($_POST['nm_empresa']);
	$nu_tel_empresa = addslashes($_POST['nu_tel_empresa']);
	$fk_estado = addslashes($_POST['fk_estado']);
	$nm_conjuge = addslashes($_POST['nm_conjuge']);
	$dt_casamento = addslashes($_POST['dt_casamento']);
	$nm_local = addslashes($_POST['nm_local']);
	$nm_pai = addslashes($_POST['nm_pai']);
	$nm_mae = addslashes($_POST['nm_mae']);
	$dt_admissao = addslashes($_POST['dt_admissao']);
	$fk_entrada = addslashes($_POST['fk_entrada']);
	$nm_pastor = addslashes($_POST['nm_pastor']);
	$nm_igreja = addslashes($_POST['nm_igreja']);
	$nu_tel_igreja = addslashes($_POST['nu_tel_igreja']);
	$fk_saida = addslashes($_POST['fk_saida']);
	$dt_saida = addslashes($_POST['dt_saida']);
	$te_observacao = addslashes($_POST['te_observacao']);
	$nm_email = addslashes($_POST['nm_email']);
	$pk_flutuante = addslashes($_POST['pk_flutuante']);
	$nm_foto = addslashes($_POST['nm_foto']);
	$upload  = $_FILES['upload'];
	$te_foto = addslashes($_POST['te_foto']);
	$nm_foto = addslashes($_POST['nm_foto']);
	
	$upextensao['extensoes'] = array('pdf','jpg');
	$extensao = strtolower(end(explode('.', $_FILES['upload']['name'])));
	$uptamanho['tamanho'] = 2097152; // 2Mb
		
	$imagem = $_FILES["upload"]["name"]; //pega o nome do arquivo
   	$temp_imagem = $_FILES["upload"]["tmp_name"]; //pega o "temp" do arquivo
   	$tipo = $_FILES["upload"]["type"]; //pega o tipo do arquivo
   	$tamanho = $_FILES["upload"]["size"]; //pega o tamanho do arquivo
   	$t_maximo = 2000000; //tamanho máximo do arquivo - em bytes
   	$uploaddir = '../fotos/';
	$uploadfile = $uploaddir . $_FILES['upload']['name'];
		
	$imagem = isset($_FILES['upload']) ? $_FILES['upload'] : FALSE;
	
	if ($imagem == ""){
		$msg_session = "Escolha um arquivo á ser enviado";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../flutuante_alt.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../flutuante_alt.php");
	
	} else if ( $tamanho > $t_maximo ){
		$msg_session = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: ../flutuante_alt.php");
		
	} else if ( ($te_foto != "") && (!eregi("[gif|jpeg|jpg]", $tipo)) ){
		$msg_session = "Tipo de arquivo inválido";
		$_SESSION['msg_session'] = $msg_session;
	header ("location: flutuante_alt.php");
	
	} else if ( file_exists("$uploaddir"."$imagem") ){
		$msg_session = "Já existe um arquivo com este nome $imagem, por favor, renomeie-o";
		$_SESSION['msg_session'] = $msg_session;	
	header ("location: ../flutuante_alt.php");
	
	} else {
	if ($nm_foto){
	move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile) ;
	}
		
	$persistencia->alterarFlutuante($nm_usuario,$nm_flutuante,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
	$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,
	$dt_admissao,$fk_entrada,$nm_pastor,$nm_igreja,$nu_tel_igreja,$fk_saida,$dt_saida,$te_observacao,$nm_email,$pk_flutuante,$nm_foto,$te_foto);
	}
	}

if ( !empty($_GET['alterarMembroLista']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_membro = addslashes($_GET['pk_membro']);
	$persistencia->alterarMembroLista($nm_usuario,$pk_membro);
	}
if ( !empty($_POST['alterarProfissao']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$pk_profissao = addslashes($_POST['pk_profissao']);
	$nm_profissao = addslashes($_POST['nm_profissao']);
	$persistencia->alterarProfissao($nm_usuario,$pk_profissao,$nm_profissao);
	}
	// ---- métodos cadastrar
if ( !empty($_GET['cadastrarMembroDados']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk = addslashes($_GET['pk']);
	$nm = addslashes($_GET['nm']);
	$persistencia->cadastrarMembroDados($nm_usuario,$pk,$nm);
	}

if ( !empty($_POST['localizarMembro']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$nm_membro = addslashes($_POST['nm_membro']);
	$persistencia->localizarMembro($nm_usuario,$nm_membro);
	}
if ( !empty($_GET['alterarProfLista']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_profissao = addslashes($_GET['pk_profissao']);
	$persistencia->alterarProfLista($nm_usuario,$pk_profissao);
	}
if ( !empty($_GET['alterarUsuarioLista']) )  {
	$nm_usuario = addslashes($_GET['nm_usuario']);
	$pk_usuario = addslashes($_GET['pk_usuario']);
	
	$persistencia->alterarUsuarioLista($nm_usuario,$pk_usuario);
	}
if ( !empty($_POST['alterarUsuario']) )  {
	$nm_usuario_cadastro = addslashes($_POST['nm_usuario_cadastro']);
	$pk_usuario = addslashes($_POST['pk_usuario']);
	$nm_login = addslashes($_POST['nm_login']);
	$nm_senha = addslashes($_POST['nm_senha']);
	$re_senha = addslashes($_POST['re_senha']);
	$fk_status = addslashes($_POST['fk_status']);
	if ( $nm_senha != $re_senha ){
	$msg = "Senha diferente";
	$_SESSION["msg_session"] = $msg;
	header ("location: ../usuario_alt.php");
	} else {
	$persistencia->alterarUsuario($nm_usuario_cadastro,$pk_usuario,$nm_login,$nm_senha,$fk_status);
	}
	}
if ( !empty($_POST['validarRg']) )  {
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$nu_rg = addslashes($_POST['nu_rg']);
	$persistencia->validarRg($nm_usuario,$nu_rg);
	}
if ( !empty($_POST['inserirChecks']) )  {
	$pk_membro = addslashes($_POST['pk_membro']);
	$nm_usuario = addslashes($_POST['nm_usuario']);
	$acaosocial = addslashes($_POST['acaosocial']);
	$artesdramaticas = addslashes($_POST['artesdramaticas']);
	$bercario = addslashes($_POST['bercario']);
	$cantina = addslashes($_POST['cantina']);
	$construcao = addslashes($_POST['construcao']);
	$creche = addslashes($_POST['creche']);
	$discipulado = addslashes($_POST['discipulado']);
	$embaixadores = addslashes($_POST['embaixadores']);
	$esportes = addslashes($_POST['esportes']);
	$evangelismo = addslashes($_POST['evangelismo']);
	$financas = addslashes($_POST['financas']);
	$mensagens = addslashes($_POST['mensagens']);
	$musica = addslashes($_POST['musica']);
	$ornamentacao = addslashes($_POST['ornamentacao']);
	$professor = addslashes($_POST['professor']);
	$recepcao = addslashes($_POST['recepcao']);
	$secretaria = addslashes($_POST['secretaria']);
	$servicomedico = addslashes($_POST['servicomedico']);
	$servicosocial = addslashes($_POST['servicosocial']);
	$sonoplastia = addslashes($_POST['sonoplastia']);
	$trabadolescente = addslashes($_POST['trabadolescente']);
	$trabadulto = addslashes($_POST['trabadulto']);
	$trabcrianca = addslashes($_POST['trabcrianca']);
	$trabjovem = addslashes($_POST['trabjovem']);
	$persistencia->inserirChecks($nm_usuario,$pk_membro,$acaosocial,$artesdramaticas,$bercario,$cantina,$construcao,$creche,$discipulado,$embaixadores,$esportes,$evangelismo,$financas,$mensagens,$musica,$ornamentacao,$professor,$recepcao,$secretaria,$servicomedico,$servicosocial,$sonoplastia,$trabadolescente,$trabadulto,$trabcrianca,$trabjovem);
	}
if ( !empty($_GET['abrirParametrizado']) )  {
	unset($_SESSION['dt_inicial']);
	unset($_SESSION['dt_final']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	
	$_SESSION['nm_usuario'] = $nm_usuario;
	header ("location: ../membro_parametrizado.php");
	}
if ( !empty($_POST['pesquisarParametrizado']) )  {

	$dt_inicial = addslashes($_POST['dt_inicial']);
	$dt_final = addslashes($_POST['dt_final']);
	$nm_usuario = addslashes($_POST['nm_usuario']);
	
	if ( ($dt_inicial == "") || ($dt_final == "") ){
	$msg = "Campo Data: Preencimento obrigatório";
	$_SESSION['msg'] = $msg;
	$_SESSION['dt_inicial'] = $dt_inicial;
	$_SESSION['dt_final'] = $dt_final;
	$_SESSION['nm_usuario'] = $nm_usuario;
	header ("location: ../membro_parametrizado.php");
	} else {
	unset($_SESSION['msg']);
	$_SESSION['dt_inicial'] = $dt_inicial;
	$_SESSION['dt_final'] = $dt_final;
	$_SESSION['nm_usuario'] = $nm_usuario;
	header ("location: ../membro_parametrizado_lista.php");
	}
	}
	if ( !empty($_GET['abrirMembroParaPdf']) )  {

	$nm_usuario = addslashes($_GET['nm_usuario']);
	$dt_inicial = addslashes($_GET['dt_inicial']);
	$dt_final = addslashes($_GET['dt_final']);
	$_SESSION['dt_inicial'] = $dt_inicial;
	$_SESSION['dt_final'] = $dt_final;
	$_SESSION['nm_usuario'] = $nm_usuario;
	header ("location: ../membro_parametrizado_pdf.php");
	}
if ( !empty($_GET['abrirInfoGraficoPdf']) )  {
	unset($_SESSION['dt_inicial']);
	unset($_SESSION['dt_final']);
	$nm_usuario = addslashes($_GET['nm_usuario']);
	
	$_SESSION['nm_usuario'] = $nm_usuario;
	header ("location: ../infografico_pdf.php");
	}
?>