<?php
session_start();
require_once("fpdf/fpdf.php");
 define('FPDF_FONTPATH','fpdf/font/');
 $pdf = new FPDF("P");
 $pdf->Open();
 $pdf->AddPage();
 
// $pdf->Image('img/arvore.jpg',90,10,25,15);
 
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(77, 20);
$pdf->Cell(0,5,'IGREJA BATISTA FILADELFIA',0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(56, 25);
$pdf->Cell(0,5,'Rua Saldanha Marinho, nº113, Caixa dAgua, Salvador - BA | CEP: 40.323-010',0,1,'');

$pdf->SetXY(78, 35);
$pdf->Cell(0,5,'FICHA DE IDENTIFICAÇÃO DE DISCIPULADO',0,1,'');

$hoje = date("d/m/Y");

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(98, 40);
$pdf->Cell(0,5,'Data '.$hoje,0,1,'');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,47);
$pdf->Cell(0,0,'',1,1,'L');


require_once("classes/conexao.php");
$mysql = new Mysql();
$mysql->conectar();

$sql = mysql_query("SELECT * 
	FROM membros, status, estados, instrucao, profissoes, entradas, saidas, bairros
	WHERE membros.fk_saida = saidas.pk_saida 
	AND membros.fk_instrucao = instrucao.pk_instrucao 
	AND membros.fk_bairro= bairros.pk_bairro
	AND membros.fk_profissao = profissoes.pk_profissao 
	AND membros.fk_entrada = entradas.pk_entrada 
	AND membros.fk_estado = estados.pk_estado 
	AND membros.fk_sexo = status.pk_status 
	AND pk_membro = ".$_SESSION['pk_membro']." ");
	$row = mysql_num_rows($sql);
	for ($z = 0; $z < $row; $z++){
	$id = mysql_result($sql, $z, "pk_membro");
	$nm_membro = mysql_result($sql, $z, "nm_membro");
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
	$pk_saida = mysql_result($sql, $z, "pk_saida");
	$nm_saida = mysql_result($sql, $z, "nm_saida");
	$dt_saida = mysql_result($sql, $z, "dt_saida");
	$dt_saida = substr($dt_saida,8,2)."/".substr($dt_saida,5,2)."/".substr($dt_saida,0,4);
	}

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 49);
$pdf->Cell(0,5,'NOME: '.$nm_membro,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(90, 49);
$pdf->Cell(0,5,'TEL: '.$nu_tel_casa,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 54);
$pdf->Cell(0,5,'ENDEREÇO: '.$nm_logra,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(95, 54);
$pdf->Cell(0,5,'CEP: '.$nu_cep,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(116, 54);
$pdf->Cell(0,5,'BAIRRO: '.$nm_bairro,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(160, 54);
$pdf->Cell(0,5,'CIDADE: '.$nm_cidade,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(190, 54);
$pdf->Cell(0,5,'UF: '.$nm_uf,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 59);
$pdf->Cell(0,5,'DATA NASC: '.$dt_nascimento,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(55, 59);
$pdf->Cell(0,5,'SEXO: '.$nm_status,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(80, 59);
$pdf->Cell(0,5,'EST. CIVIL: '.$nm_estado,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(120, 59);
$pdf->Cell(0,5,'RH: '.$nm_rh,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(139, 59);
$pdf->Cell(0,5,'CONJUGE: '.$nm_conjuge,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 64);
$pdf->Cell(0,5,'PAI: '.$nm_pai,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(90, 64);
$pdf->Cell(0,5,'MÃE: '.$nm_mae,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 69);
$pdf->Cell(0,5,'ESCOLA: '.$nm_escola,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 74);
$pdf->Cell(0,5,'INSTRUÇÃO: '.$nm_instrucao,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(80, 74);
$pdf->Cell(0,5,'PROFISSÃO: '.$nm_profissao,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(143, 74);
$pdf->Cell(0,5,'E-MAIL: '.$nm_email,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 79);
$pdf->Cell(0,5,'EMPRESA: '.$nm_empresa,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(80, 79);
$pdf->Cell(0,5,'TEL: '.$nu_tel_casa,0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 84);
$pdf->Cell(0,5,'OBSERVAÇÕES: '.$te_observacao,0,1,'');



$pdf->Output("arquivo","I");
?>