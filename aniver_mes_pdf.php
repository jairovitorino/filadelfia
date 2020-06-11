<?php
define("FPDF_FONTPATH","fpdf/font/");
require_once("fpdf/fpdf.php");
$pdf = new FPDF('P'); 
$pdf->Open(); 

$pdf->AddPage(); 

//$pdf->Image("img/bahia_fios_logo.jpg", 20,3,30,40);

require_once("classes/conexao.php");
$mysql = new Mysql();
$mysql->conectar();
$nu_mes = date("m");
$nu_ano = date("Y");
switch ($nu_mes){
	case 1;
	$mes = "JANEIRO";
	break;
case 2;
	$mes = "FEVEREIRO";
	break;
case 3;
	$mes = "MARCO";
	break;
case 4;
	$mes = "ABRIL";
	break;
case 5;
	$mes = "MAIO";
	break;
case 6;
	$mes = "JUNHO";
	break;
case 7;
	$mes = "JULHO";
	break;
case 8;
	$mes = "AGOSTO";
	break;
case 9;
	$mes = "SETEMBRO";
	break;
case 10;
	$mes = "OUTUBRO";
	break;
case 11;
	$mes = "NOVEMBRO";
	break;
case 12;
	$mes = "DEZEMBRO";
	break;
default;
	$mes = "";
	break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(77, 20);
$pdf->Cell(0,5,'IGREJA BATISTA FILADELFIA',0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(56, 25);
$pdf->Cell(0,5,'Rua Saldanha Marinho, nº113, Caixa dAgua, Salvador - BA | CEP: 40.323-010',0,1,'');


$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(70, 35);
$pdf->Cell(0,5,'ANIVERSARIANTES DO MÊS DE '.$mes,0,1,'');

$pdf->SetXY(97, 40);
$pdf->Cell(0,5,'PARABÉNS!!!',0,1,'');


// 1A LINHA HORIZONTAL
$pdf->SetXY(20,47);
$pdf->Cell(0,0,'',1,1,'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(20);
$pdf->Cell(40,5,'NOME');
$pdf->SetX(135);
$pdf->Cell(40,5,'DIA');
$pdf->SetX(145);
$pdf->Cell(40,5,'TELEFONE');

$mes_atual = date("m");
$sql_for = mysql_query("SELECT pk_membro,nm_membro, dt_nascimento, nu_tel_casa,DAY(membros.dt_nascimento) AS dia
FROM membros
WHERE MONTH(membros.dt_nascimento) = '".$mes_atual."' AND fk_saida = 6 ORDER BY dia");
$i = 0;
while ( $vetor = mysql_fetch_array($sql_for) ){
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$vetor['nm_membro']);
$pdf->SetX(137);
$pdf->Cell(0,5,$vetor['dia']);
$pdf->SetX(145);
$pdf->Cell(0,5,$vetor['nu_tel_casa']);
$i = $i + 1;
}
/*$sql_flu = mysql_query("SELECT pk_flutuante,nm_flutuante, dt_nascimento, nu_tel_casa,DAY(flutuantes.dt_nascimento) AS dia
FROM flutuantes
WHERE MONTH(flutuantes.dt_nascimento) = '".$mes_atual."' AND fk_saida = 6 ORDER BY dia");
$i = 0;
while ( $vetor = mysql_fetch_array($sql_flu) ){
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$vetor['nm_flutuante']);
$pdf->SetX(137);
$pdf->Cell(0,5,$vetor['dia']);
$pdf->SetX(151);
$pdf->Cell(0,5,$vetor['nu_tel_casa']);
$i = $i + 1;
}

//LABEL LANÇAMENTOS
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 270);
$pdf->Cell(0,5,'Itens:',0,1,'');

//CAMPO LANÇAMENTOS
$pdf->SetXY(30, 270);
$pdf->Cell(0,5,$i,0,1,'');


// 2A LINHA HORIZONTAL
$pdf->SetXY(20,268);
$pdf->Cell(0,0,'',1,1,'L');
*/


# Gera a saida no navegador
$pdf->Output();

?>