<?php
session_start();
require_once("fpdf/fpdf.php");
 define('FPDF_FONTPATH','fpdf/font/');
 $pdf = new FPDF("L");
 $pdf->Open();
 $pdf->AddPage();
 
 $pdf->Image('img/igreja.png',20,10,25,15);
  
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(77, 20);
$pdf->Cell(0,5,'IGREJA BATISTA FILADELFIA',0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(56, 25);
$pdf->Cell(0,5,'Rua Saldanha Marinho, nº113, Caixa dAgua, Salvador - BA | CEP: 40.323-010',0,1,'');


$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(95, 35);
$pdf->Cell(0,5,'INFOGRAFICO',0,1,'');

$hoje = date("d/m/Y");

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(97, 40);
$pdf->Cell(0,5,'Data '.$hoje,0,1,'');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,47);
$pdf->Cell(0,0,'',1,1,'L');

require_once("classes/conexao.php");
$mysql = new Mysql();
$mysql->conectar();

$casados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 2 ");
	$row_casa = mysql_num_rows($casados);
	for ($a = 0; $a < $row_casa; $a++){
}
$a == 0 ? $a = "" : $a = $a; 
$divorciados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 4 ");
	$row_divo = mysql_num_rows($divorciados);
	for ($b = 0; $b < $row_divo; $b++){
	}
$b == 0 ? $b = "" : $b = $b; 
$separados = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 3 ");
	$row_sepa = mysql_num_rows($separados);
	for ($c = 0; $c < $row_sepa; $c++){
	}
$c == 0 ? $c = "" : $c = $c; 
$solteiros = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 1 ");
	$row_solt = mysql_num_rows($solteiros);
	for ($d = 0; $d < $row_solt; $d++){
	}
$d == 0 ? $d = "" : $d = $d; 
$viuvos = mysql_query("SELECT * FROM membros, estados WHERE membros.fk_estado = estados.pk_estado AND fk_estado = 5 ");
	$row_viuv = mysql_num_rows($viuvos);
	for ($e = 0; $e < $row_viuv; $e++){
	}
$e == 0 ? $e = "" : $e = $e; 
$homens = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 37 ");
	$row_home = mysql_num_rows($homens);
	for ($f = 0; $f < $row_home; $f++){
	}
$f == 0 ? $f = "" : $f = $f; 
$mulheres = mysql_query("SELECT * FROM membros, status WHERE membros.fk_sexo = status.pk_status AND fk_sexo = 38 ");
	$row_mulh = mysql_num_rows($mulheres);
	for ($g = 0; $g < $row_mulh; $g++){
	}
$g == 0 ? $g = "" : $g = $g; 
$adolescentes = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 6 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 19 ");
	$row_ado = mysql_num_rows($adolescentes);
	for ($h = 0; $h < $row_ado; $h++){
	}
$h == 0 ? $h = "" : $h = $h; 
$jovens = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 20 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 36 ");
	$row_jov = mysql_num_rows($jovens);
	for ($i = 0; $i < $row_jov; $i++){
	}
$i == 0 ? $i = "" : $i = $i; 
$adultos = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 35 AND (YEAR(CURDATE())-YEAR(dt_nascimento)) < 65 ");
	$row_adu = mysql_num_rows($adultos);
	for ($j = 0; $j < $row_adu; $j++){
	}
$j == 0 ? $j = "" : $j = $j; 
$idosos = mysql_query("SELECT dt_nascimento, CURDATE(),(YEAR(CURDATE())-YEAR(dt_nascimento)) AS IDADE
	FROM membros 
	WHERE (YEAR(CURDATE())-YEAR(dt_nascimento)) > 64  ");
	$row_ido = mysql_num_rows($idosos);
	for ($l = 0; $l < $row_ido; $l++){
	}
$fundamental = mysql_query("SELECT * FROM membros, instrucao WHERE membros.fk_instrucao = instrucao.pk_instrucao AND fk_instrucao = 1 ");
	$row_funda = mysql_num_rows($fundamental);
	for ($m = 0; $m < $row_funda; $m++){
	}
$m == 0 ? $m = "" : $m = $m; 
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20, 48);
$pdf->Cell(0,5,'ESTADO CIVIL',0,1,'');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(20, 51);
$pdf->Cell(0,5,'CASADO(S) '.$a,0,1,'');
$a == 0 ? "" : $pdf->Image('img/barra.jpg',53,53,$a,1);

$pdf->SetXY(20, 54);
$pdf->Cell(0,5,'DIVORCIADO(S) '.$b,0,1,'');
$b == 0 ? "" : $pdf->Image('img/barra.jpg',53,56,$b,1);

$pdf->SetXY(20, 57);
$pdf->Cell(0,5,'SEPARADO(S) '.$c,0,1,'');
$c == 0 ? "" : $pdf->Image('img/barra.jpg',53,59,$c,1);

$pdf->SetXY(20, 60);
$pdf->Cell(0,5,'SOLTEIRO(S) '.$d,0,1,'');
$d == 0 ? "" : $pdf->Image('img/barra.jpg',53,62,$d,1);

$pdf->SetXY(20, 63);
$pdf->Cell(0,5,'VIÚVO(S) '.$e,0,1,'');
$e == 0 ? "" : $pdf->Image('img/barra.jpg',53,65,$e,1);

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,71);
$pdf->Cell(0,0,'',1,1,'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20, 72);
$pdf->Cell(0,5,'GENERO',0,1,'');

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetXY(20, 75);
$pdf->Cell(0,5,'HOMEM(S) '.$f,0,1,'');
$f == 0 ? "" : $pdf->Image('img/barra.jpg',53,77,$f,1);

$pdf->SetXY(20, 78);
$pdf->Cell(0,5,'MULHER(ES) '.$g,0,1,'');
$g == 0 ? "" : $pdf->Image('img/barra.jpg',53,80,$g,1);

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,86);
$pdf->Cell(0,0,'',1,1,'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetXY(20, 87);
$pdf->Cell(0,5,'FAIXA ETÁRIA',0,1,'');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(20, 91);
$pdf->Cell(0,5,'ADOLESCENTE(S) '.$h,0,1,'');
$h == 0 ? "" : $pdf->Image('img/barra.jpg',53,93,$h,1);

$pdf->SetXY(20, 94);
$pdf->Cell(0,5,'JOVEM(S) '.$i,0,1,'');
$i == 0 ? "" : $pdf->Image('img/barra.jpg',53,97,$i,1);

$pdf->SetXY(20, 97);
$pdf->Cell(0,5,'ADULTO(S) '.$j,0,1,'');
$j == 0 ? "" : $pdf->Image('img/barra.jpg',53,99,$j,1);

$pdf->SetXY(20, 100);
$pdf->Cell(0,5,'IDOSO(S) '.$l,0,1,'');
$l == 0 ? "" : $pdf->Image('img/barra.jpg',53,102,$l,1);

$pdf->Output("arquivo","I");
?>