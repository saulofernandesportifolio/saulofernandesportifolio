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
$hora = date("H:i:s");
$hora_valida = date("H:i:s");
$data_hora = date("Y/m/d H:i:s");

   
echo $usuario=$_COOKIE["id"];


//VALIDADE SE COLABORADOR JA REGISTROU O INICIO DO INTERVALO NO MESMO DIA

$sql_valida = "SELECT usuario, inicio_intervalo FROM registro_ponto WHERE inicio_intervalo IS NOT NULL and usuario = '$usuario' and data_entrada = '$data'";

$acao_valida = mysql_query($sql_valida) or die(mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida = $linha_valida["usuario"];
$inicio_int=$linha_valida["inicio_intervalo"];
}


	if (isset($valida))
	{
	
			$sql_valida_2 = "SELECT usuario, id FROM registro_ponto WHERE fim_intervalo is NULL and usuario = '$usuario' and data_entrada = '$data'";
			
			$acao_valida_2 = mysql_query($sql_valida_2) or die (mysql_error());
			
			while($linha_valida_2 = mysql_fetch_assoc($acao_valida_2))
			{
			$valida_2 = $linha_valida_2["id"];
			}
			
				if (isset($valida_2))
				{
                        $horasever=explode(":",$hora);
                        echo $horasever[0].'<br>'; /*horas*/
                        echo $horasever[1].'<br>'; /*Minutos*/
                        echo $horasever[2]; /*Segundos*/
                        
                        $horainicioint=explode(":",$inicio_int);
                        echo $horainicioint[0].'<br>'; /*horas*/
                        echo $horainicioint[1].'<br>'; /*Minutos*/
                        echo $horainicioint[2]; /*Segundos*/

                        
                        
                        $calcula1=$horasever[0]-$horainicioint[0];
                        $calcula2=$horasever[1]-$horainicioint[1];
                        $calcula3=$horasever[2]-$horainicioint[2];
                        
                        
                        if($calcula1 >= 1 and $calcula2 >= 0 and $calcula3 >= 0){
						$sql_intervalo = "UPDATE registro_ponto SET
											fim_intervalo = '$hora'
											WHERE data_entrada = '$data' 
											and usuario = '$usuario'";
						
						$acao_intervalo = mysql_query($sql_intervalo) or die (mysql_error());
						
						include "reg_log.php";
                        
                          if($calcula2 > 0){
                        
                        echo "<script>alert('O intervalo excedeu : $calcula2 minutos'); 
                           </script>\n";
				
                        }
                        
                        
					  	echo "<script>alert('Final do intervalo registrado com sucesso.'); 
                              document.location.replace('frame.php?t=conteudo.php'); </script>\n";
						exit;  
                                                
                        }else{
                         	echo "<script>alert('Não passou uma hora de intervalo ainda!'); 
                             history.back(); </script>\n";
						exit;   
                            
                        }
                        
	
				}
				
				else
				{
				
						echo "<script>alert('Voce ja possui registro de saida de intervalo, em caso de duvidas consulte a supervisao.'); 
                              document.location.replace('frame.php?t=conteudo.php'); </script>\n";
						exit;
				}

				
	
	}


	if(!isset($valida))
	
	{
			echo "<script>alert('Voce nao registrou de inicio de intervalo, em caso de duvidas consulte a supervisao.'); 
                   document.location.replace('frame.php?t=conteudo.php'); </script>\n";
			exit;
	}



?>

</body>
</html>
