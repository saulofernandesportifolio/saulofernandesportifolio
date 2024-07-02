<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Controle de Ponto on-line</title>
<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1" />
</head>

<body>
<?php




include "abreconexao.php";
date_default_timezone_set("Brazil/East");

$sql = "SELECT * FROM registro_ponto WHERE usuario = '$login' and data_entrada BETWEEN '$data_inicio' and '$data_fim' ORDER BY data_entrada";

$busca = mysql_query($sql) or die (mysql_error());

$hoje = date("d/m/Y");
$data_arquivo = date("d-m-Y-h-i");
$end_fpdf = "fpdf"; 
$hora_atual = date("H:i:s");


$data_inicio_folha = substr($data_inicio,8,2)."/".substr($data_inicio,5,2)."/".substr($data_inicio,0,4);
$data_fim_folha = substr($data_fim,8,2)."/".substr($data_fim,5,2)."/".substr($data_fim,0,4);


$end_final = "folha/$login$data_arquivo.pdf"; 

$tipo_pdf = "F"; 

$imagem = "../imagens/Logo_EmpreZa.JPG"; 


$sql_2 = "SELECT * FROM usuarios WHERE login = '$login'";

$acao_2 = mysql_query($sql_2) or die (mysql_error);

while($linha_2 = mysql_fetch_assoc($acao_2)){

$nome			= $linha_2["nome"];
$matricula		= $linha_2["login"];
$data_admissao  = $linha_2["data_admissao"];
$funcao			= $linha_2["funcao"];
$departamento	= $linha_2["departamento"];
$ctps			= $linha_2["ctps"];


}

$sql_empresa = "SELECT * FROM empresa WHERE id = 1";

$acao_empresa = mysql_query($sql_empresa) or die (mysql_error());

while($linha_empresa = mysql_fetch_assoc($acao_empresa))
{
$empresa		= $linha_empresa["razao_social"];
$cnpj			= $linha_empresa["cnpj"];
$insc_est		= $linha_empresa["insc_est"];
}




define("FPDF_FONTPATH", "$end_fpdf/font/");

require_once("$end_fpdf/fpdf.php"); 

$pdf = new FPDF(); 


$pdf -> Open();
$pdf->AddPage();



//Imprime imagem EmpreZa e dados da impressão
$pdf->Image($imagem, 15, 8, 35, 25);
$pdf->SetFont('Arial', '',8);
$pdf->Cell(180,5,"Emitido em $hoje às $hora_atual", 0, 0, 'R');
$pdf->SetY(20);




//Imprime titulo da impressão

$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(180,5,"Cartão Ponto", 0, 0, 'C');
$pdf->SetY(25);

//Imprime titulo da impressão

$pdf->SetFont('Arial', '',8);
$pdf->Cell(180,5,"$data_inicio_folha - $data_fim_folha", 0, 0, 'C');
$pdf->SetY(40);



//Imprime informações do colaborador

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,utf8_decode("Empresa: $empresa"), 0, 0, 'L');
$pdf->SetX(100);
$pdf->Cell(30,5," Cnpj: $cnpj ", 0, 0, 'L');
$pdf->SetX(150);
$pdf->Cell(30,5," Insc. Est.: $insc_est ", 0, 0, 'L');
$pdf->SetX(40);
$pdf->SetY(50);



//Imprime informações do colaborador

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,"Nome: $nome", 0, 0, 'L');
$pdf->SetX(100);
$pdf->Cell(30,5," Matricula: $matricula ", 0, 0, 'L');
$pdf->SetX(150);
$pdf->SetY(55);

//Demais dados do colaborador

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,"C.T.P.S: $ctps ", 0, 0, 'L');
$pdf->SetX(100);
$pdf->Cell(30,5," Admissão: $data_admissao ", 0, 0, 'L');
$pdf->SetX(150);
$pdf->SetY(60);

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,"Função: $funcao ", 0, 0, 'L');
$pdf->SetX(100);
$pdf->SetY(65);

$pdf->SetFont('Arial', '',8);
$pdf->Cell(30,5,"Departamento: $departamento ", 0, 0, 'L');
$pdf->SetX(100);
$pdf->SetY(75);







//Imprime registro de horas

$pdf->SetFont('Arial', '',8);
$pdf->Cell(50,5,'Data', 1, 0, 'C');
$pdf->SetX(60);
$pdf->Cell(25,5,'Ent. 1', 1, 0, 'C');
$pdf->SetX(85);
$pdf->Cell(25,5,'Sai. 1', 1 , 0, 'C');
$pdf->SetX(110);
$pdf->Cell(25,5,'Ent. 2', 1, 0,  'C');
$pdf->SetX(135);
$pdf->Cell(25,5,'Sai. 2', 1, 0, 'C');
$pdf->SetX(160);
$pdf->Cell(25,5,'Faltas', 1, 0, 'C');


while($resultado = mysql_fetch_array($busca)){
$pdf->ln();
$pdf->Cell(20,5,$resultado["data_impressao"],0 ,0, 'C');
$pdf->Cell(20,5,$resultado["dia_impressao"],0 ,0, 'L');
$pdf->SetX(60);
$pdf->Cell(25,5,$resultado["hora_entrada"],0 ,0, 'C');
$pdf->SetX(85);
$pdf->Cell(25,5,$resultado["inicio_intervalo"],0 ,0, 'C');
$pdf->SetX(110);
$pdf->Cell(25,5,$resultado["fim_intervalo"],0 ,0, 'C');
$pdf->SetX(135);
$pdf->Cell(25,5,$resultado["hora_saida"],0 ,0, 'C');
$pdf->SetX(160);
$pdf->Cell(25,5,$resultado["falta"],0 ,0, 'C');

}
//Imprime dados para assinatura




$pdf->SetFont('Arial', '',8);
$pdf -> SetX(30);
$pdf -> Cell(10,50,'_____________________________________',0,0,'C');
$pdf -> SetX(90);
$pdf -> Cell(50,50,'_____________________________________',0,0,'C');

$pdf->SetFont('Arial', '',8);
$pdf -> SetX(30);
$pdf -> Cell(10,60,"$nome",0,0,'C');
$pdf -> SetX(90);
$pdf -> Cell(50,60,'Supervisor',0,0,'C');


$pdf->Output("$end_final", 'F');



?>
<p>&nbsp;</p>
<p><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Arquivo 
  gerado com sucesso</font> <a href="\\172.22.20.14\www\ponto\<?php echo "$end_final" ?>" target='_blank'><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Clique 
  aqui</strong></font></a> <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">para abrir!</font></p>
</body>
</html>
