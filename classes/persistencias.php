<?php
@session_start();
require_once("conexao.php");
$mysql = new Mysql();
$mysql->conectar();

class Persistencia {

	// ---> métodos abrir
public function abrirFlutuanteFicha($nm_usuario,$pk_flutuante){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_flutuante_session"] = $pk_flutuante;
		
		header ("location: ../flutuante_ficha.php");
	}

public function abrirFlutuanteAlt($nm_usuario,$pk_flutuante){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_flutuante_session"] = $pk_flutuante;
		
		header ("location: ../flutuante_alt.php");
	}
public function abrirGraficoMembro($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../infografico.php");
	}
public function abrirMembroAptidao($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../aptidao_cadastro.php");
	}
public function abrirProfPesquisa($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../profissao_pesquisa.php");
	}
public function abrirProfCadastro($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../profissao_cadastro.php");
	}
public function abrirProfLista($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] ="";
		header ("location: ../profissao_lista.php");
	}
public function abrirAptidaoFiltro($nm_usuario,$pk_membro){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_session"] = $pk_membro;
		header ("location: ../aptidao_filtro.php");
	}
public function abrirAptidaoMembro($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../aptidao_membros.php");
	}
public function abrirAptidaoAcao($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../aptidao_itens.php");
	}
public function abrirMembroCivil($nm_usuario,$pk_estado,$nm_estado){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_estado_session"] = $pk_estado;
		$_SESSION["nm_estado_session"] = $nm_estado;
		header ("location: ../membro_civil.php");
	}
public function abrirMembroEfetivo($nm_usuario,$hc,$h,$i,$j,$l,$fk_profissao,$fk_bairro,$fk_estado,$nm_profissao,$nm_bairro){
		$nm_usuario = $_SESSION["user"];
		
		
		$_SESSION["hc"] = $hc;
		$_SESSION['h'] = $h;
		$_SESSION['i'] = $i;
		$_SESSION['j'] = $j;
		$_SESSION['l'] = $l;
		$_SESSION['fk_profissao'] = $fk_profissao;
		$_SESSION['fk_bairro'] = $fk_bairro;
		$_SESSION['fk_estado'] = $fk_estado;
		$_SESSION['nm_profissao'] = $nm_profissao;																																
		$_SESSION['nm_bairro'] = $nm_bairro;																																
		$_SESSION["nm_usuario"] = $nm_usuario;
		header ("location: ../membro_efetivo.php");
	}

public function abrirMembroFlutuante($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = "";
		header ("location: ../membro_flutuante.php");
	}
public function abrirMembroTeste($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../membro_estado.php");
	}
public function abrirMembroInativo($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../membro_inativo.php");
	}
public function abrirMembroAcao($nm_usuario,$nm_membro,$pk_aptidao,$nm_aptidao){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_aptidao_session"] = $pk_aptidao;
		$_SESSION["nm_aptidao_session"] = $nm_aptidao;
		$_SESSION["nm_membro_session"] = $nm_membro;
		header ("location: ../aptidoes.php");
	}
public function abrirAcaoMembro($nm_usuario,$pk_membro,$nm_membro,$nu_tel_casa,$te_foto){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_session"] = $pk_membro;
		$_SESSION["nm_membro_session"] = $nm_membro;
		$_SESSION["nu_tel_casa_session"] = $nu_tel_casa;
		$_SESSION["te_foto_session"] = $te_foto;
		header ("location: ../membro_aptidao.php");
	}

public function abrirUsuario($nm_usuario){

		$nm_usuario = $_SESSION["user"];
		
		header ("location: ../usuario.php");
	}

public function abrirMembroPesquisa($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../membro_pesquisa.php");
	}
public function abrirMembroCadastro($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		unset($_SESSION['nu_rg']);
		header ("location: ../membro_cadastro.php");
	}
public function abrirMembroLista($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = "";
		header ("location: ../membro_listaa.php");
	}
public function abrirAptidaoPesquisa($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../aptidao_pesquisa.php");
	}
public function abrirMembroFicha($nm_usuario,$pk_membro){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_session"] = $pk_membro;
		$_SESSION["msg_aviso"] = $msg;
		header ("location: ../membro_ficha.php");
	}
public function abrirMembro($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$msg = "";
		$_SESSION["msg_aviso"] = $msg;
		header ("location: ../membro_cadastro.php");
	}
public function abrirAniverMes($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$msg = "";
		$_SESSION["msg_aviso"] = $msg;
		header ("location: ../aniver_mes_pdf.php");
	}
	// ----> métodos alterar
public function alterarMembro($nm_usuario,$nm_membro,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
	$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,
	$dt_admissao,$fk_entrada,$nm_pastor,$nm_igreja,$fk_saida,$dt_saida,$te_observacao,$nm_email,$pk_membro,$nm_foto,$te_foto){
	
	if ( ($fk_entrada == 5) || ($fk_entrada == 6) || ($fk_entrada == 7)  ){
	$msg = "Dados gravados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		
		$dt_cadastro = date("Y-m-d");				
		$dt_nascimento = substr($dt_nascimento,6,4). "-" .substr($dt_nascimento,3,2). "-" .substr($dt_nascimento,0,2); // 15/06/2010
		$dt_casamento = substr($dt_casamento,6,4). "-" .substr($dt_casamento,3,2). "-" .substr($dt_casamento,0,2); // 15/06/2010
		$dt_admissao = substr($dt_admissao,6,4). "-" .substr($dt_admissao,3,2). "-" .substr($dt_admissao,0,2); 
		
		$sql_into = mysql_query("INSERT INTO flutuantes (nm_flutuante,nu_rg,nu_tel_casa,dt_nascimento,nm_rh,nm_logra,nu_cep,fk_bairro,nm_cidade,nm_uf,fk_sexo,fk_instrucao,
		nm_escola,nu_tel_escola,fk_profissao,nm_empresa,nu_tel_empresa,fk_estado,nm_conjuge,dt_casamento,nm_local,nm_pai,nm_mae,dt_admissao,nm_igreja,fk_saida,nu_tel_igreja,nm_pastor,fk_entrada,
		te_observacao,nm_email) 
		VALUES('".$nm_membro."','".$nu_rg."','".$nu_tel_casa."','".$dt_nascimento."','".$nm_rh."','".$nm_logra."','".$nu_cep."',
		".$fk_bairro.",'".$nm_cidade."','".$nm_uf."',".$fk_sexo.",".$fk_instrucao.",'".$nm_escola."','".$nu_tel_escola."',".$fk_profissao.",'".$nm_empresa."',
		'".$nu_tel_empresa."',".$fk_estado.",'".$nm_conjuge."','".$dt_casamento."','".$nm_local."','".$nm_pai."','".$nm_mae."','".$dt_admissao."',
		'".$nm_igreja."',6,'".$nu_tel_igreja."','".$nm_pastor."',".$fk_entrada.",'".$te_observacao."','".$nm_email."')") or die("Erro Flutuante");
		
		$sql_sel = mysql_query("SELECT max(flutuantes.pk_flutuante) as pk_flutuante FROM flutuantes ");
		$row_sel = mysql_num_rows($sql_sel);
		for ($b=0; $b < $row_sel; $b++){
	 	$pk_flutuante = mysql_result($sql_sel, $b, "pk_flutuante");
		}
		$sql = mysql_query("DELETE FROM membros WHERE pk_membro = ".$pk_flutuante." ");
		$_SESSION["pk_flutuante_session"] = $pk_flutuante;
		header ("location: ../flutuante_alt.php");

	} else {
	$te_foto = substr($te_foto,13);
	$dt_nascimento = substr($dt_nascimento,6,4)."/".substr($dt_nascimento,3,2)."/".substr($dt_nascimento,0,2);
	$dt_admissao = substr($dt_admissao,6,4)."/".substr($dt_admissao,3,2)."/".substr($dt_admissao,0,2);	
	$dt_casamento = substr($dt_casamento,6,4)."/".substr($dt_casamento,3,2)."/".substr($dt_casamento,0,2);
	$dt_saida = substr($dt_saida,6,4). "-" .substr($dt_saida,3,2). "-" .substr($dt_saida,0,2); // 15/06/2010
	$sql = mysql_query("UPDATE membros SET nm_membro = '".$nm_membro."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nu_tel_casa = '".$nu_tel_casa."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nu_rg = '".$nu_rg."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET dt_nascimento = '".$dt_nascimento."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET dt_admissao = '".$dt_admissao."' WHERE pk_membro = ".$pk_membro." ");	
	$sql = mysql_query("UPDATE membros SET nm_rh = '".$nm_rh."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_logra = '".$nm_logra."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nu_cep = '".$nu_cep."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_bairro = ".$fk_bairro." WHERE pk_membro = ".$pk_membro." ") or die ("Erro em fk_bairro");
	$sql = mysql_query("UPDATE membros SET nm_cidade = '".$nm_cidade."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_uf = '".$nm_uf."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_sexo = ".$fk_sexo." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_instrucao = ".$fk_instrucao." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_escola = '".$nm_escola."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nu_tel_escola = '".$nu_tel_escola."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_profissao = ".$fk_profissao." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_empresa = '".$nm_empresa."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nu_tel_empresa = '".$nu_tel_empresa."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_estado = ".$fk_estado." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_conjuge = '".$nm_conjuge."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET dt_casamento = '".$dt_casamento."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_local = '".$nm_local."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_pai = '".$nm_pai."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_mae = '".$nm_mae."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_entrada = ".$fk_entrada." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_pastor = '".$nm_pastor."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_igreja = '".$nm_igreja."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET fk_saida = ".$fk_saida." WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET dt_saida = '".$dt_saida."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET te_observacao = '".$te_observacao."' WHERE pk_membro = ".$pk_membro." ");
	$sql = mysql_query("UPDATE membros SET nm_email = '".$nm_email."' WHERE pk_membro = ".$pk_membro." ");
	if ($nm_foto)
	$sql = mysql_query("UPDATE membros SET te_foto = '".$te_foto."' WHERE pk_membro = ".$pk_membro." ");
	
		$msg = "Dados alterados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		
		$_SESSION["pk_membro_session"] = $pk_membro;
		header ("location: ../membro_alt.php");
	}
	}
public function alterarFlutuante($nm_usuario,$nm_flutuante,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
	$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,
	$dt_admissao,$fk_entrada,$nm_pastor,$nm_igreja,$nu_tel_igreja,$fk_saida,$dt_saida,$te_observacao,$nm_email,$pk_flutuante,$nm_foto,$te_foto){
	
	if ( ($fk_entrada == 1) || ($fk_entrada == 2) || ($fk_entrada == 3) || ($fk_entrada == 4) ){
	
	$msg = "Dados gravados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		
		$dt_cadastro = date("Y-m-d");				
		$dt_nascimento = substr($dt_nascimento,6,4). "-" .substr($dt_nascimento,3,2). "-" .substr($dt_nascimento,0,2); // 15/06/2010
		$dt_casamento = substr($dt_casamento,6,4). "-" .substr($dt_casamento,3,2). "-" .substr($dt_casamento,0,2); // 15/06/2010
		$dt_admissao = substr($dt_admissao,6,4). "-" .substr($dt_admissao,3,2). "-" .substr($dt_admissao,0,2); // 15/06/2010
		$dt_saida = substr($dt_saida,6,4). "-" .substr($dt_saida,3,2). "-" .substr($dt_saida,0,2); // 15/06/2010
		$sql_into = mysql_query("INSERT INTO membros (nm_membro,te_foto,nu_rg,nu_tel_casa,dt_nascimento,nm_rh,nm_logra,nu_cep,nm_cidade,nm_uf,fk_sexo,fk_instrucao,nm_escola,nu_tel_escola,fk_profissao,nm_empresa,nu_tel_empresa,fk_estado,nm_conjuge,dt_casamento,nm_local,nm_pai,nm_mae,dt_admissao,nm_igreja,nu_tel_igreja,nm_pastor,fk_entrada,te_observacao,nm_email,dt_cadastro) 
		VALUES('".$nm_flutuante."','".$te_foto."','".$nu_rg."','".$nu_tel_casa."','".$dt_nascimento."','".$nm_rh."','".$nm_logra."','".$nu_cep."','".$fk_bairro."',
		'".$nm_cidade."','".$nm_uf."',".$fk_sexo.",".$fk_instrucao.",'".$nm_escola."','".$nu_tel_escola."',".$fk_profissao.",'".$nm_empresa."',
		'".$nu_tel_empresa."',".$fk_estado.",'".$nm_conjuge."','".$dt_casamento."','".$nm_local."','".$nm_pai."','".$nm_mae."','".$dt_admissao."',
		'".$nm_igreja."','".$nu_tel_igreja."','".$nm_pastor."',".$fk_entrada.",'".$te_observacao."','".$nm_email."','".$dt_cadastro."')");
		
		$sql_del = mysql_query("DELETE FROM flutuantes WHERE pk_flutuante = ".$pk_flutuante." ");
		
		$sql_sel = mysql_query("SELECT max(membros.pk_membro) as pk_membro FROM membros ");
		$row_sel = mysql_num_rows($sql_sel);
		for ($b=0; $b < $row_sel; $b++){
	 	$pk_membro = mysql_result($sql_sel, $b, "pk_membro");
		}
		$sql = mysql_query("DELETE FROM membros WHERE nm_membro = '' ");
		$_SESSION["pk_membro_session"] = $pk_membro;
		header ("location: ../membro_alt.php");
	} else {
	$te_foto = substr($te_foto,13);
	$dt_nascimento = substr($dt_nascimento,6,4)."/".substr($dt_nascimento,3,2)."/".substr($dt_nascimento,0,2);
	$dt_admissao = substr($dt_admissao,6,4)."/".substr($dt_admissao,3,2)."/".substr($dt_admissao,0,2);	
	$dt_casamento = substr($dt_casamento,6,4)."/".substr($dt_casamento,3,2)."/".substr($dt_casamento,0,2);
	$dt_saida = substr($dt_saida,6,4). "-" .substr($dt_saida,3,2). "-" .substr($dt_saida,0,2); // 15/06/2010
	$sql = mysql_query("UPDATE flutuantes SET nm_flutuante = '".$nm_flutuante."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_tel_casa = '".$nu_tel_casa."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_rg = '".$nu_rg."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET dt_nascimento = '".$dt_nascimento."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET dt_admissao = '".$dt_admissao."' WHERE pk_flutuante = ".$pk_flutuante." ");	
	$sql = mysql_query("UPDATE flutuantes SET nm_rh = '".$nm_rh."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_logra = '".$nm_logra."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_cep = '".$nu_cep."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_bairro = ".$fk_bairro." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_cidade = '".$nm_cidade."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_uf = '".$nm_uf."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_sexo = ".$fk_sexo." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_instrucao = ".$fk_instrucao." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_escola = '".$nm_escola."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_tel_escola = '".$nu_tel_escola."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_profissao = ".$fk_profissao." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_empresa = '".$nm_empresa."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_tel_empresa = '".$nu_tel_empresa."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_estado = ".$fk_estado." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_conjuge = '".$nm_conjuge."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET dt_casamento = '".$dt_casamento."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_local = '".$nm_local."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_pai = '".$nm_pai."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_mae = '".$nm_mae."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_entrada = ".$fk_entrada." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_pastor = '".$nm_pastor."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_igreja = '".$nm_igreja."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nu_tel_igreja = '".$nu_tel_igreja."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET fk_saida = ".$fk_saida." WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET dt_saida = '".$dt_saida."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET te_observacao = '".$te_observacao."' WHERE pk_flutuante = ".$pk_flutuante." ");
	$sql = mysql_query("UPDATE flutuantes SET nm_email = '".$nm_email."' WHERE pk_flutuante = ".$pk_flutuante." ");
	if ($nm_foto)
	$sql = mysql_query("UPDATE flutuantes SET te_foto = '".$te_foto."' WHERE pk_flutuante = ".$pk_flutuante." ");
	
		$msg = "Dados alterados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		
		$_SESSION["pk_flutuante_session"] = $pk_flutuante;
		header ("location: ../flutuante_alt.php");
	}
	}

public function alterarMembroLista($nm_usuario,$pk_membro){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_session"] = $pk_membro;
		$_SESSION["msg_aviso"] = "";
		header ("location: ../membro_alt.php");
		}
public function alterarProfLista($nm_usuario,$pk_profissao){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_profissao_session"] = $pk_profissao;
		$_SESSION["msg_aviso"] = "";
		header ("location: ../profissao_alt.php");
		}
public function alterarProfissao($nm_usuario,$pk_profissao,$nm_profissao){

	$sql = mysql_query("UPDATE profissoes SET nm_profissao = '".$nm_profissao."' WHERE pk_profissao = ".$pk_profissao." ");

		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_profissao_session"] = $pk_profissao;
		$msg = "Dados alterados com sucesso...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../profissao_alt.php");
		}
	// --- métodos excluir
public function excluirFlutuante($nm_usuario,$pk_flutuante){

	$sql = mysql_query("DELETE FROM flutuantes WHERE pk_flutuante = ".$pk_flutuante."  ");
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Dados excluidos com sucesso...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../membro_flutuante.php");
	}
public function excluirMembroAptidao($nm_usuario,$pk_membro,$nm_membro,$pk_aptidao){

	$sql = mysql_query("DELETE FROM merces WHERE fk_aptidao = ".$pk_aptidao." AND fk_membro = ".$pk_membro." ");
	
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_aptidao_session"] = $pk_aptidao;
		$_SESSION["pk_membro_session"] = $pk_membro;
		$_SESSION["nm_membro_session"] = $nm_membro;
		header ("location: ../aptidao_det.php");
	}
public function excluirMembro($nm_usuario,$pk_membro){

	$sql = mysql_query("SELECT * FROM `merces` WHERE fk_membro = ".$pk_membro." ");
	$linhas = mysql_num_rows($sql);
	if ($linhas == 0){
	
	$sql = mysql_query("DELETE FROM membros WHERE pk_membro = ".$pk_membro." ");
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Excluido com sucesso...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../membro_listaa.php");
	
	
	} else {
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Não pode ser excluido...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../membro_lista.php");
	}
	}

public function inserirMembro($nm_usuario,$nm_membro,$nu_rg,$nu_tel_casa,$dt_nascimento,$nm_rh,$nm_logra,$nu_cep,$fk_bairro,$nm_cidade,$nm_uf,$fk_sexo,
$fk_instrucao,$nm_escola,$nu_tel_escola,$fk_profissao,$nm_empresa,$nu_tel_empresa,$fk_estado,$nm_conjuge,$dt_casamento,$nm_local,$nm_pai,$nm_mae,$dt_admissao,$fk_entrada,$nm_igreja,$nu_tel_igreja,$nm_pastor,$fk_entrada,$te_observacao,$nm_email,$te_foto){

	if ( ($te_foto == "") && ($fk_sexo == 37) ) {
		$te_foto = "img_masc.jpg";
		} else if ( ($te_foto == "") && ($fk_sexo == 38) ) {
		$te_foto = "img_fem.jpg";
		}
		

	$sql = mysql_query("SELECT * FROM membros WHERE nu_rg = '".$nu_rg."' ");
	$row = mysql_num_rows($sql);
		for ($a=0; $a < $row; $a++){
	 	$pk_membro = mysql_result($sql, $a, "pk_membro");
		}
		if ($row == 1 ){
		$msg = "RG já existe no banco!!";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		$_SESSION["nm_membro_session"] = $nm_membro;
		$_SESSION["nu_rg_session"] = $nu_rg;
		header ("location: ../membro_cadastro.php");
		}
		//if ( $fk_entrada == 5  ){
		if ( ($fk_entrada == 5) || ($fk_entrada == 6) || ($fk_entrada == 7)  ){
		$msg = "Dados gravados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		$image = $_FILES['image']['tmp_name'];
		if ( $image ){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		}
		$image_name = addslashes($_FILES['image']['name']);
		if ( @$image_size ){
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		}
		$tamanho = ($_FILES['image']['size']);
			
		$dt_cadastro = date("Y-m-d");				
		$dt_nascimento = substr($dt_nascimento,6,4). "-" .substr($dt_nascimento,3,2). "-" .substr($dt_nascimento,0,2); // 15/06/2010
		$dt_casamento = substr($dt_casamento,6,4). "-" .substr($dt_casamento,3,2). "-" .substr($dt_casamento,0,2); // 15/06/2010
		$dt_admissao = substr($dt_admissao,6,4). "-" .substr($dt_admissao,3,2). "-" .substr($dt_admissao,0,2); // 15/06/2010
		// ,fg_membro,nu_rg,nu_tel_casa,dt_nascimento,nm_rh,nm_logra,nu_cep,nm_bairro,nm_cidade,nm_uf,fk_sexo,fk_instrucao,nm_escola,nu_tel_escola,fk_profissao,nm_empresa,
		// nu_tel_empresa,fk_estado,nm_conjuge,dt_casamento,nm_local,nm_pai,nm_mae,dt_admissao,nm_igreja,nu_tel_igreja,nm_pastor,fk_entrada,te_observacao,nm_email
		//,'".$image."','".$nu_rg."','".$nu_tel_casa."','".$dt_nascimento."','".$nm_rh."','".$nm_logra."','".$nu_cep."','".$nm_bairro."',
		//'".$nm_cidade."','".$nm_uf."',".$fk_sexo.",".$fk_instrucao.",'".$nm_escola."','".$nu_tel_escola."',".$fk_profissao.",'".$nm_empresa."',
		//'".$nu_tel_empresa."',".$fk_estado.",'".$nm_conjuge."','".$dt_casamento."','".$nm_local."','".$nm_pai."','".$nm_mae."','".$dt_admissao."',
		//'".$nm_igreja."','".$nu_tel_igreja."','".$nm_pastor."',".$fk_entrada.",'".$te_observacao."','".$nm_email."'
		$sql_into = mysql_query("INSERT INTO flutuantes (nm_flutuante,te_foto,fk_instrucao,fk_profissao,fk_estado,fk_sexo,fk_entrada,fk_saida,nu_rg,nm_logra,nm_cidade,fk_bairro,nm_local,nm_pai) 
		VALUES('".$nm_membro."','".$te_foto."',".$fk_instrucao.",".$fk_profissao.",".$fk_estado.",".$fk_sexo.",".$fk_entrada.",6,'".$nu_rg."','".$nm_logra."','".$nm_cidade."',".$fk_bairro.",'".$nm_local."','".$nm_pai."')") or die ("Erro Flutuante");
		
		$sql_sel = mysql_query("SELECT max(flutuantes.pk_flutuante) as pk_flutuante FROM flutuantes ");
		$row_sel = mysql_num_rows($sql_sel);
		for ($b=0; $b < $row_sel; $b++){
	 	$pk_flutuante = mysql_result($sql_sel, $b, "pk_flutuante");
		}
		$sql = mysql_query("DELETE FROM flutuantes WHERE nm_flutuante = '' ");
		$_SESSION["pk_flutuante_session"] = $pk_flutuante;
		header ("location: ../flutuante_alt.php");
	}
	
	else {
		$msg = "Dados gravados com sucesso...";
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = $msg;
		$image = $_FILES['image']['tmp_name'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		$tamanho = ($_FILES['image']['size']);
			
		$dt_cadastro = date("Y-m-d");				
		$dt_nascimento = substr($dt_nascimento,6,4). "-" .substr($dt_nascimento,3,2). "-" .substr($dt_nascimento,0,2); // 15/06/2010
		$dt_casamento = substr($dt_casamento,6,4). "-" .substr($dt_casamento,3,2). "-" .substr($dt_casamento,0,2); // 15/06/2010
		$dt_admissao = substr($dt_admissao,6,4). "-" .substr($dt_admissao,3,2). "-" .substr($dt_admissao,0,2); // 15/06/2010
		$te_foto = substr($te_foto,13);
		$sql_into = mysql_query("INSERT INTO membros (nm_membro,te_foto,nu_rg,nu_tel_casa,dt_nascimento,nm_rh,nm_logra,nu_cep,fk_bairro,nm_cidade,nm_uf,fk_sexo,fk_instrucao,nm_escola,nu_tel_escola,fk_profissao,nm_empresa,nu_tel_empresa,fk_estado,nm_conjuge,dt_casamento,nm_local,nm_pai,nm_mae,dt_admissao,nm_igreja,nu_tel_igreja,nm_pastor,fk_entrada,te_observacao,nm_email,dt_cadastro) 
		VALUES('".$nm_membro."','".$te_foto."','".$nu_rg."','".$nu_tel_casa."','".$dt_nascimento."','".$nm_rh."','".$nm_logra."','".$nu_cep."',".$fk_bairro.",
		'".$nm_cidade."','".$nm_uf."',".$fk_sexo.",".$fk_instrucao.",'".$nm_escola."','".$nu_tel_escola."',".$fk_profissao.",'".$nm_empresa."',
		'".$nu_tel_empresa."',".$fk_estado.",'".$nm_conjuge."','".$dt_casamento."','".$nm_local."','".$nm_pai."','".$nm_mae."','".$dt_admissao."',
		'".$nm_igreja."','".$nu_tel_igreja."','".$nm_pastor."',".$fk_entrada.",'".$te_observacao."','".$nm_email."','".$dt_cadastro."')") or die("Erro Membro");
		
		$sql_sel = mysql_query("SELECT max(membros.pk_membro) as pk_membro FROM membros ");
		$row_sel = mysql_num_rows($sql_sel);
		for ($b=0; $b < $row_sel; $b++){
	 	$pk_membro = mysql_result($sql_sel, $b, "pk_membro");
		}
		$sql = mysql_query("DELETE FROM membros WHERE nm_membro = '' ");
		$_SESSION["pk_membro_session"] = $pk_membro;
		header ("location: ../membro_alt.php");
	}
	}
public function excluirProfissao($nm_usuario,$pk_profissao){

	$sql = mysql_query("SELECT * FROM `membros` WHERE fk_profissao = ".$pk_profissao." ");
	$linhas = mysql_num_rows($sql);
	if ($linhas == 0){
	
	$sql = mysql_query("DELETE FROM profissoes WHERE pk_profissao = ".$pk_profissao." ");
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Excluido com sucesso...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../profissao_lista.php");
	
	
	} else {
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Não pode ser excluido...";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../profissao_lista.php");
	}
	}
	// ----> métodos logar
public function logar( $nm_login, $nm_senha ){
	$sql_usuario = mysql_query("SELECT * FROM usuarios, entidades WHERE usuarios.id_ente = entidades.id_ente AND nm_login = '".$nm_login."' AND nm_senha = password('".$nm_senha."') " );
	$row_usuario = mysql_num_rows($sql_usuario);
	
	 	for ($a=0; $a < $row_usuario; $a++){
	 	$param = mysql_result($sql_usuario, $a, "pk_usuario");
		$nm_usuario = mysql_result($sql_usuario, $a, "nm_usuario");
		$id_tipo = mysql_result($sql_usuario, $a, "fk_status");
		$id_ente = mysql_result($sql_usuario, $a, "id_ente");
		$nm_ente = mysql_result($sql_usuario, $a, "nm_ente");
		$nm_login = mysql_result($sql_usuario, $a, "nm_login");
		}
		if ($row_usuario == 0){
		$msg = "Login Negado...";
		header ("location: ../index.php?msg=$msg");
		} else {
		$_SESSION["user"] = $nm_usuario;
		$_SESSION["id_tipo"] = $id_tipo;
		$_SESSION["id_ente"] = $id_ente;
		$_SESSION["nm_ente"] = $nm_ente;
		$_SESSION['titulo'] = $nm_ente;
		$_SESSION['login_igreja'] = $nm_login;
		
		header ("location: ../tpl.php?msg");
			
		}
	}
public function cadastrarMembroDados($nm_usuario,$pk,$nm){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_sql"] = $pk;
		$_SESSION["nm_membro_sql"] = $nm;
		header ("location: ../aptidao_checks.php");
		}
public function inserirMembroDados($nm_usuario,$pk_membro,$nm,$pk_aptidao){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_membro_sql"] = $pk_membro;
		$_SESSION["pk_aptidao_sql"] = $pk_aptidao;
		$_SESSION["nm_membro_sql"] = $nm;
		
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$pk_aptidao.")");
		
		header ("location: ../aptidao_det.php");
		}
public function inserirProfissao($nm_usuario,$nm_profissao){
	
	$sql = mysql_query("INSERT INTO profissoes (nm_profissao) VALUES('".$nm_profissao."')");
	
	$sql = mysql_query("SELECT MAX(profissoes.pk_profissao) AS pk_profissao FROM profissoes");
	$row = mysql_num_rows($sql);
	for ( $a=0; $a < $row; $a++ ){
	$pk_profissao = mysql_result($sql, $a, "pk_profissao");
	}

		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_profissao_session"] = $pk_profissao;
		$msg = "Dados inseridos com sucesso";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../profissao_alt.php");
}
public function localizarMembro($nm_usuario,$nm_membro){

		$nm_usuario = $_SESSION["user"];
		$_SESSION["member"] = $nm_membro;
		header ("location: ../membro_localiza.php");
	}
public function inserirUsuario($nm_usuario_cadastro,$nm_login,$nm_senha){

	if ( $nm_usuario_cadastro == '' ){
	$msg = "Existem campos vazios...";
	$_SESSION["msg_session"] = $msg;
	header ("location: ../usuario.php");
	}
	$dt_cadastro = date("Y-m-d");
	$sql = mysql_query("INSERT INTO usuarios (nm_usuario,nm_login,nm_senha,fk_status,dt_cadastro) 
	VALUES('".$nm_usuario_cadastro."','".$nm_login."',password('".$nm_senha."'),45,'".dt_cadastro."')")
	or die("Erro inserir usuario");
    $sql_sel = mysql_query("SELECT * FROM usuarios ");
	$row = mysql_num_rows($sql_sel);
	for ($i=0 ; $i < $row ; $i++){
	$pk_usuario = mysql_result($sql_sel, $i, "pk_usuario");
	$fk_status = mysql_result($sql_sel, $i, "fk_status");
	}
	
		$nm_usuario = $_SESSION["user"];
		$_SESSION['pk_usuario_session'] = $pk_usuario;
		$_SESSION['fk_status_session'] = $fk_status;
		$msg = "Usuario cadastrado com sucesso";
		$_SESSION["msg_session"] = $msg;
		header ("location: ../usuario_alt.php");
	}
public function inserirUsuarioVisitante($nm_usuario_cadastro,$nm_login,$nm_senha){

	if ( $nm_usuario_cadastro == '' ){
	$msg = "Existem campos vazios...";
	header ("location: ../usuario.php?msg=$msg");
	}
	$dt_cadastro = date("Y-m-d");
	$sql = mysql_query("INSERT INTO usuarios (nm_usuario,nm_login,nm_senha,fk_status,dt_cadastro) VALUES('".$nm_usuario_cadastro."','".$nm_login."','".$nm_senha."',45,
	'".$dt_cadastro."')");
    $sql_sel = mysql_query("SELECT * FROM usuarios ");
	$row = mysql_num_rows($sql_sel);
	for ($i=0 ; $i < $row ; $i++){
	$pk_usuario = mysql_result($sql_sel, $i, "pk_usuario");
	$fk_status = mysql_result($sql_sel, $i, "fk_status");
	}
	
		$nm_usuario = $_SESSION["user"];
		$_SESSION['pk_usuario_session'] = $pk_usuario;
		$_SESSION['fk_status_session'] = $fk_status;
		$msg = "Dados enviados com sucesso. Aguarde liberação do Administrador.";
		header ("location: ../index.php?msg=$msg");
	}
public function alterarUsuario($nm_usuario_cadastro,$pk_usuario,$nm_login,$nm_senha,$fk_status){
	
	$sql = mysql_query("UPDATE usuarios SET nm_usuario = '".$nm_usuario_cadastro."' WHERE pk_usuario = ".$pk_usuario." ");
	$sql = mysql_query("UPDATE usuarios SET nm_login = '".$nm_login."' WHERE pk_usuario = ".$pk_usuario." ");
	$sql = mysql_query("UPDATE usuarios SET nm_senha = '".$nm_senha."' WHERE pk_usuario = ".$pk_usuario." ");
	$sql = mysql_query("UPDATE usuarios SET fk_status = ".$fk_status." WHERE pk_usuario = ".$pk_usuario." ");
	
		$nm_usuario = $_SESSION["user"];
		$msg = "Dados alterados com sucesso...";
		$_SESSION["msg_session"] = $msg;
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_usuario_session"] = $pk_usuario;
		header ("location: ../usuario_alt.php");
	}
public function abrirUsuarioPesquisa($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["msg_session"] = "";
		header ("location: ../usuario_pesquisa.php");
	}
public function abrirUsuarioLista($nm_usuario){

	$sql = mysql_query("DELETE FROM usuarios WHERE nm_usuario = '' ");
		$_SESSION["msg_session"] = "";
		$nm_usuario = $_SESSION["user"];
		header ("location: ../usuario_lista.php");
	}
public function alterarUsuarioLista($nm_usuario,$pk_usuario){
		$nm_usuario = $_SESSION["user"];
		$_SESSION["pk_usuario_session"] = $pk_usuario;
		header ("location: ../usuario_alt.php");
		}
public function excluirUsuario($nm_usuario,$pk_usuario){
	
	$sql = mysql_query("DELETE FROM usuarios WHERE pk_usuario = ".$pk_usuario." ") or die ("erro ao excluir...");
		$nm_usuario = $_SESSION["user"];
		//$_SESSION["pk_usuario_session"] = $pk_usuario;
		header ("location: ../usuario_lista.php");
		}
public function validarRg($nm_usuario,$nu_rg){

$sql = mysql_query("SELECT * FROM membros WHERE nu_rg = '".$nu_rg."' ");
	$row = mysql_num_rows($sql);
		for ($a=0; $a < $row; $a++){
	 	$pk_membro = mysql_result($sql, $a, "pk_membro");
		}
		$nm_usuario = $_SESSION["user"];
		if ( $row == 1 ){
		echo "Aten&ccedil;&atilde;o! RG j&aacute; cadastrado.";
		}
		}
	public function inserirChecks($id_membro,$acaosocial,$artesdramaticas,$bercario,$cantina,$construcao,$creche,$discipulado,$embaixadores,$esportes,$evangelismo,$financas,$mensagens,$musica,$ornamentacao,$professor,$recepcao,$secretaria,$servicomedico,$servicosocial,$sonoplastia,$trabadolescente,$trabadulto,$trabcrianca,$trabjovem){
	
	if ( $acaosocial != "" ) {
		$acaosocial = 1;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$acaosocial.")");
	}
	if ( $artesdramaticas != "" ) {
		$artesdramaticas = 2;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$artesdramaticas.")");
	}
	if ( $bercario != "" ) {
		$bercario = 3;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$bercario.")");
	}
	if ( $cantina != "" ) {
		$cantina = 4;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$cantina.")");
	}
	if ( $construcao != "" ) {
		$construcao = 5;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$construcao.")");
	}
	if ( $creche != "" ) {
		$creche = 6;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$creche.")");
	}
	if ( $discipulado != "" ) {
		$discipulado = 7;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$discipulado.")");
	}
	if ( $embaixadores != "" ) {
		$embaixadores = 8;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$embaixadores.")");
	}
	if ( $esportes != "" ) {
		$esportes = 9;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$esportes.")");
	}
	if ( $evangelismo != "" ) {
		$evangelismo = 10;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$evangelismo.")");
	}
	if ( $financas != "" ) {
		$financas = 11;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$financas.")");
	}
	if ( $mensagens != "" ) {
		$mensagens = 12;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$mensagens.")");
	}
	if ( $musica != "" ) {
		$musica = 13;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$musica.")");
	}
	if ( $ornamentacao != "" ) {
		$ornamentacao = 14;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$ornamentacao.")");
	}
	if ( $professor != "" ) {
		$professor = 15;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$professor.")");
	}
	if ( $recepcao != "" ) {
		$recepcao = 16;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$recepcao.")");
	}
	if ( $secretaria != "" ) {
		$secretaria = 17;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$secretaria.")");
	}
	if ( $servicomedico != "" ) {
		$servicomedico = 18;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$servicomedico.")");
	}
	if ( $servicosocial != "" ) {
		$servicosocial = 19;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$servicosocial.")");
	}
	if ( $sonoplastia != "" ) {
		$sonoplastia = 20;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$sonoplastia.")");
	}
	if ( $trabadolescente != "" ) {
		$trabadolescente = 21;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$trabadolescente.")");
	}
	if ( $trabadulto != "" ) {
		$trabadulto = 22;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$trabadulto.")");
	}
	if ( $trabcrianca != "" ) {
		$trabcrianca = 23;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$trabcrianca.")");
	}
	if ( $trabjovem != "" ) {
		$trabjovem = 24;
		$sql = mysql_query("INSERT INTO merces (fk_membro,fk_aptidao) VALUES(".$pk_membro.",".$trabjovem.")");
	}
		
		$_SESSION["id_membro"] = $id_membro;
		header ("location: ../aptidao_det.php");
	}
	
public function abrirMembroAniver($nm_usuario){
		$nm_usuario = $_SESSION["user"];
		header ("location: ../aniversariantes_mes.php");
	}

}
?>