<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

include "abreconexao.php";
date_default_timezone_set("Brazil/East");
$data = date("Y/m/d");
$hora = date("H:i");
$hora_valida = date("H:i");
$data_hora = date("Y/m/d H:i:s");



$sql_valida = "SELECT usuario, data_entrada FROM registro_ponto WHERE data_entrada = '$data' and usuario = '$usuario'";

$acao_valida = mysql_query($sql_valida) or die(mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida = $linha_valida["usuario"];
}


	if (isset($valida))
	{
			$sql_valida_2 = "SELECT usuario, id FROM registro_ponto WHERE inicio_intervalo is NULL and usuario = '$usuario' and data_entrada = '$data'";
			
			$acao_valida_2 = mysql_query($sql_valida_2) or die(mysql_error());

			while($linha_valida_2 = mysql_fetch_assoc($acao_valida_2))
			{
			$valida_2 = $linha_valida_2["id"];
			}

			
			if(isset($valida_2))
				{
			
			
							$sql_intervalo = "UPDATE registro_ponto SET 
											   inicio_intervalo = '$hora'
											   WHERE data_entrada = '$data'
											   and usuario = '$usuario'";
							
							$acao_intervalo = mysql_query($sql_intervalo) or die (mysql_error());
							
							include "reg_log.php";
							
								echo "<script>alert('Inicio de Intervalo registrado com sucesso.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
								exit;
					}


					if(!isset($valida_2))
					{
					
					echo "<script>alert('Voce ja possui registro de inicio de intervalo, em caso de duvidas consulte a supervisao.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
					exit;
		
					}
	}

	
if(!isset($valida))
{

	echo "<script>alert('Voce nao possui registro de entrada na data de hoje. Em caso de duvidas consulte a supervisao.'); window.open('reg_hora.php?&usuario=$usuario','conteudo'); </script>\n";
	exit;
}	




?>

</body>
</html>
