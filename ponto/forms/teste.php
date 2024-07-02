<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

date_default_timezone_set("Brazil/East");
include "abreconexao.php";

$sql = "SELECT * FROM registro_ponto WHERE usuario = '034153' ORDER BY data_entrada";

$busca = mysql_query($sql) or die (mysql_error());

$hoje = date("d/m/Y");

$end_fpdf = "fpdf"; 

$end_final = "teste/teste_php.pdf"; 

$tipo_pdf = "F"; 

$imagem = "../ponto/imagens/empreza_1.jpg width='808' height='133'/>"; 


$sql_2 = "SELECT * FROM usuarios WHERE login = '034153'";

$acao_2 = mysql_query($sql_2) or die (mysql_error);

while($linha_2 = mysql_fetch_assoc($acao_2)){

$nome			= $linha_2["nome"];
$matricula		= $linha_2["login"];

}



define("FPDF_FONTPATH", "$end_fpdf/font/");

require_once("$end_fpdf/fpdf.php"); 

$pdf = new FPDF(); 


$pdf -> Open();
$pdf->AddPage();



//Imprime imagem EmpreZa
$pdf->Image($imagem, 160, 8, 35, 25);
$pdf->SetY(20);


//Imprime titulo da impressão

$pdf->SetFont('Arial', '',8);
$pdf->Cell(180,5,"Gente especializada em gente", 0, 0, 'C');
$pdf->SetY(15);

//Imprime titulo da impressão

$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(180,5,"Grupo Empreza Recursos Humanos", 0, 0, 'C');
$pdf->SetY(35);

//Imprime titulo da impressão

$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(180,5,"Folha Ponto", 0, 0, 'C');
$pdf->SetY(50);


//Imprime informações do colaborador

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,"Matricula: $matricula", 1, 0, 'L');
$pdf->SetX(40);
$pdf->Cell(110,5," Nome: $nome ", 1, 0, 'L');
$pdf->SetX(150);
$pdf->Cell(40,5,"Período: ", 1 , 0, 'L');
$pdf->SetX(40);
$pdf->SetY(70);





//Imprime registro de horas

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,'Data', 1, 0, 'C');
$pdf->SetX(40);
$pdf->Cell(40,5,'Hora Entrada', 1, 0, 'C');
$pdf->SetX(80);
$pdf->Cell(40,5,'Inicio Intervalo', 1 , 0, 'C');
$pdf->SetX(120);
$pdf->Cell(40,5,'Fim Intervalo', 1, 0,  'C');
$pdf->SetX(160);
$pdf->Cell(40,5,'Hora Saida', 1, 0, 'C');


while($resultado = mysql_fetch_array($busca)){
$pdf->ln();
$pdf->Cell(30,5,$resultado["data_impressao"],0 ,0, 'C');
$pdf->SetX(40);
$pdf->Cell(40,5,$resultado["hora_entrada"],0 ,0, 'C');
$pdf->SetX(80);
$pdf->Cell(40,5,$resultado["inicio_intervalo"],0 ,0, 'C');
$pdf->SetX(120);
$pdf->Cell(40,5,$resultado["fim_intervalo"],0 ,0, 'C');
$pdf->SetX(160);
$pdf->Cell(40,5,$resultado["hora_saida"],0 ,0, 'C');
}

//Imprime titulo da impressão

$pdf->SetFont('Arial', '',8);
$pdf->Write( 35," ");


$pdf->SetFont('Arial', '',8);
$pdf->Write( 5,"_________________________________________________________\n $nome - $hoje");



$pdf->Output("$end_final", 'F');

?>



</body>
</html>
