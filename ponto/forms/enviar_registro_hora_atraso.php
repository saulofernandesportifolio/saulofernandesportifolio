<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

		if ($login == 0)
		{
				
				echo "<script>alert('Selecione o colaborador.'); history.back();  </script>\n";
				exit;
		}
		


date_default_timezone_set("Brazil/East");
$data = date("Y/m/d");
$hora = date("H:i");
$hora_valida = date("H:i");
$data_hora = date("Y/m/d H:i:s");
$mes_entrada = date("m/y");
$data_impressao = date("d/m/Y");


include "abreconexao.php";

include "data.php";

$sql_valida = "SELECT usuario, data_entrada FROM registro_ponto WHERE data_entrada = '$data' and usuario = '$login'";

$acao_valida = mysql_query($sql_valida) or die(mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida = $linha_valida["usuario"];
}



if(isset($valida))
{
	echo "<script>alert('Colaborador ja possui registro de entrada na data de hoje.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
	exit;
}		

//SE NÃO ENCONTRAR NENHUM REGISTRO NA TABELA DE PONTO, SISTEMA REGISTRA ENTRADA


if (!isset($valida))
{

	//SE DIA DA SEMANA NÃO FOR SABADO!
	
	if ($dia <> '6')
	
	{
	
				$sql_nome = "SELECT nome FROM usuarios WHERE login = '$usuario'";
		
				$acao_nome = mysql_query($sql_nome) or die (mysql_error());
				
				while($linha_nome = mysql_fetch_assoc($acao_nome))
				{
				$nome			= $linha_nome["nome"];
				
				}

	
						$sql = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent) VALUES ('$login', '$nome', '$mes_entrada', '$data_impressao', '$diasemana[$dia]', '$data', '$hora', '$data_hora')";
			
						$acao = mysql_query($sql) or die (mysql_error());
						
						echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
						exit;
		}
				if ($dia == '6')
				{
				
					$sql_nome = "SELECT nome FROM usuarios WHERE login = '$usuario'";
					
					$acao_nome = mysql_query($sql_nome) or die (mysql_error());
					
					while($linha_nome = mysql_fetch_assoc($acao_nome))
					{
					$nome			= $linha_nome["nome"];
					
					}
					
					
								$sql = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent) VALUES ('$login', '$nome', '$mes_entrada', '$data_impressao', '$diasemana[$dia]', '$data', '$hora', '$data_hora')";
			
								$acao = mysql_query($sql) or die (mysql_error());
								
								echo "<script>alert('Bom dia, ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
								exit;
		
		
		}

	}




?>
</body>
</html>
