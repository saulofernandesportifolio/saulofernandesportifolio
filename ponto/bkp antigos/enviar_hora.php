<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
date_default_timezone_set("Brazil/East");

$data = date("Y/m/d");
$hora = date("H:i");
$hora_valida = date("H:i");
$data_hora = date("Y/m/d H:i:s");
$mes_entrada = date("m/y");
$data_impressao = date("d/m/Y");




include "abreconexao.php";

include "data.php";




//VALIDADE SE COLCABORADOR JA REGISTROU A ENTRADA NO MESMO DIA

$sql_valida = "SELECT usuario, data_entrada FROM registro_ponto WHERE data_entrada = '$data' and usuario = '$usuario'";

$acao_valida = mysql_query($sql_valida) or die(mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida = $linha_valida["usuario"];
}

//SE NÃO ENCONTRAR NENHUM REGISTRO NA TABELA DE PONTO, SISTEMA REGISTRA ENTRADA

if (!isset($valida))
{

	//SE DIA DA SEMANA NÃO FOR SABADO!
	
	if ($dia <> '6')
	
	{
	
		$sql_nome = "SELECT nome, hora_limite_ponto FROM usuarios WHERE login = '$usuario'";
		
		$acao_nome = mysql_query($sql_nome) or die (mysql_error());
		
		while($linha_nome = mysql_fetch_assoc($acao_nome))
		{
		$nome			= $linha_nome["nome"];
		$hora_limite 	= $linha_nome["hora_limite_ponto"];
		
		}
		
		
		if ($hora_valida > $hora_limite)
		{
			echo "<script>alert('Hora limite para registro de ponto excedida. Solicite autorizacao a supervisao para registrar sua entrada.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
			exit;
		}
		
		else
		{ 
			$sql = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent) VALUES ('$usuario', '$nome', '$mes_entrada', '$data_impressao', '$diasemana[$dia]', '$data', '$hora', '$data_hora')";
			
			$acao = mysql_query($sql) or die (mysql_error());
			
			include "reg_log.php";
			
			echo "<script>alert('Bom dia, ponto registrado com sucesso.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
			exit;
		}

	}
	
	
	//SE DIA DA SEMANA FOR SABADO!
	
	if ($dia == '6')
	{
	
		$sql_nome = "SELECT nome, hora_limite_sab FROM usuarios WHERE login = '$usuario'";
		
		$acao_nome = mysql_query($sql_nome) or die (mysql_error());
		
		while($linha_nome = mysql_fetch_assoc($acao_nome))
		{
		$nome			= $linha_nome["nome"];
		$hora_limite 	= $linha_nome["hora_limite_sab"];
		
		}
		
		
		if ($hora_valida > $hora_limite)
		{
			echo "<script>alert('Hora limite para registro de ponto excedida. Solicite autorizacao a supervisao para registrar sua entrada.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
			exit;
		}
		
		else
		{ 
			$sql = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent) VALUES ('$usuario', '$nome', '$mes_entrada', '$data_impressao', '$diasemana[$dia]', '$data', '$hora', '$data_hora')";
			
			$acao = mysql_query($sql) or die (mysql_error());
			
			include "reg_log.php";
			
			echo "<script>alert('Bom dia, ponto registrado com sucesso.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
			exit;
		}

	}




}
//CASO O COLABORADOR JA POSSUIR REGISTRO DE ENTRADA NA DATA DE HOJE NO BANCO DE DADOS

if(isset($valida))
{
	echo "<script>alert('Voce ja possui registro de entrada na data de hoje. Em caso de duvidas consulte a supervisao.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
	exit;
}		
	
	
	
?>

</body>
</html>