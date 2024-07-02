<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Controle de Ponto On-Line</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
date_default_timezone_set("Brazil/East");
$data = date("dmY");


   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("relatorios/$login$data.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array('USUARIO','NOME','DATA','DIA','HORA ENTRADA','INICIO INTERVALO','FINAL INTERVALO','HORA SAIDA','FALTAS', 'CLASSIFICACAO', 'USUARIO MODIFICACAO','OBSERVACAO');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	
	include "abreconexao.php";

	$consulta = "SELECT * FROM registro_ponto WHERE usuario = '$login' and data_entrada BETWEEN '$data_inicio' and '$data_fim' ORDER BY data_entrada";
   
   $resultado = mysql_query($consulta);
   
   if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
         $myArr=array($linha['usuario'],$linha['nome'],$linha['data_impressao'],$linha['dia_impressao'],$linha['hora_entrada'],$linha['inicio_intervalo'],$linha['fim_intervalo'],$linha['hora_saida'],$linha['falta'],$linha['classificacao'],$linha['usuario_modificacao'],$linha['observacao']);
         $excel->writeLine($myArr);
      }
   }

    $excel->close();
    echo "<hr><font size='2' color='#666666'>Relatório gerado com sucesso. <a href=\"relatorios/$login$data.xls\">Abrir</a></font><hr>";

	?>
	


</body>
</html>
