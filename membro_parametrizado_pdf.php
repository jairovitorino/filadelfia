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


$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(90, 35);
$pdf->Cell(0,5,'MEMBROS EFETIVOS',0,1,'');

$hoje = date("d/m/Y");

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(98, 40);
$pdf->Cell(0,5,'Data '.$hoje,0,1,'');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,47);
$pdf->Cell(0,0,'',1,1,'L');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetX(20);
$pdf->Cell(40,3,'ORDEM');
$pdf->SetX(30);
$pdf->Cell(40,3,'NOME');
$pdf->SetX(103);
$pdf->Cell(40,3,'TELEFONE');
$pdf->SetX(145);
$pdf->Cell(40,3,'NASCIMENTO');
$pdf->SetX(165);
$pdf->Cell(40,3,'ADMISSÃO');

$dt_inicial = @$_SESSION["dt_inicial"];
$dt_inicial = substr($dt_inicial,6,4). "-" .substr($dt_inicial,3,2). "-" .substr($dt_inicial,0,2); 
$dt_final = @$_SESSION["dt_final"];
$dt_final = substr($dt_final,6,4). "-" .substr($dt_final,3,2). "-" .substr($dt_final,0,2); 

require_once("classes/conexao.php");
$mysql = new Mysql();
$mysql->conectar();

$i = 0;
//$sql = mysql_query("SELECT * FROM membros WHERE dt_admissao BETWEEN '".$dt_inicial."' AND '".$dt_final."' ");
$sql = mysql_query("SELECT * FROM membros WHERE id_ente = ".$_SESSION['id_ente']." ORDER BY nm_membro ");
while ($linhas = mysql_fetch_array($sql)){
$i = $i +1;
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,3,$i);
$pdf->SetX(30);
$pdf->Cell(0,3,$linhas['nm_membro']);
$pdf->SetX(103);
$pdf->Cell(0,3,$linhas['nu_tel_casa']);
$pdf->SetX(145);
$pdf->Cell(0,3,substr($linhas['dt_nascimento'],8,2)."/".substr($linhas['dt_nascimento'],5,2)."/".substr($linhas['dt_nascimento'],0,4));
$pdf->SetX(165);
$pdf->Cell(0,3,substr($linhas['dt_admissao'],8,2)."/".substr($linhas['dt_admissao'],5,2)."/".substr($linhas['dt_admissao'],0,4));
}
$pdf->Output("arquivo","I");
?>