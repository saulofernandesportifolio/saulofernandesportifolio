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
    $excel=new ExcelWriter("relatorios/banco/banco_horas$data.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array('USUARIO','NOME','BANCO','OBSERVACAO','USUARIO MODIFICACAO','DATA MODIFICACAO');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	
	include "abreconexao.php";

	$consulta = "SELECT * FROM banco_horas ORDER BY nome";
   
   $resultado = mysql_query($consulta);
   
   if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
         $myArr=array($linha['usuario'],$linha['nome'],$linha['banco'],$linha['observacao'],$linha['usuario_modificacao'],$linha['data_modificacao']);
         $excel->writeLine($myArr);
      }
   }

    $excel->close();
    echo "<hr><font size='2' color='#666666'>Relatório gerado com sucesso. <a href=\"relatorios/banco/banco_horas$data.xls\">Abrir</a></font><hr>";

	?>


</body>
</html>
