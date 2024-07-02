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
$hora = date("H:i:s");
$hora_valida = date("H:i:s");
$data_hora = date("Y/m/d H:i:s");

echo $usuario=$_COOKIE["id"];


include "abreconexao.php";

include "data.php";

/*function soma_horas($hora1, $hora2) {
$times = array(
$hora1, //aqui vai o valor da sua tabela
$hora2, //aqui vai o valor da sua tabela
);
$seconds = 0;
foreach ( $times as $time ){
list( $g, $i, $s ) = explode( ':', $time );
$seconds += $g * 3600;
$seconds += $i * 60;
$seconds += $s;
}
$hours = floor( $seconds / 3600 );
$seconds -= $hours * 3600;
$minutes = floor( $seconds / 60 );
$seconds -= $minutes * 60;

if(strlen($minutes)==1) {
$minutes = "0".$minutes;
}
if(strlen($seconds)==1) {
$seconds = "0".$seconds;
}
return "{$hours}:{$minutes}:{$seconds}";
}*/


//VALIDADE SE COLABORADOR JA REGISTROU A ENTRADA NO MESMO DIA

$sql_valida = "SELECT usuario, data_entrada FROM registro_ponto WHERE data_entrada = '$data' and usuario = '$usuario'";

$acao_valida = mysql_query($sql_valida) or die(mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida = $linha_valida["usuario"];
}



if (!isset($valida))
{
	echo "<script>alert('Voce nao registrou sua entrada hoje. Em caso de duvidas consulte a supervisao.'); 
    document.location.replace('frame.php?t=conteudo.php'); </script>\n";
	exit;
}

if (isset($valida))
{
		
		$sql_valida_int = "SELECT  usuario, id FROM registro_ponto WHERE inicio_intervalo is NOT NULL and fim_intervalo is NULL and usuario = '$usuario' and data_entrada = '$data'";
		
		$acao_valida_int = mysql_query($sql_valida_int) or die (mysql_error());
		
		while($linha_valida_int = mysql_fetch_assoc($acao_valida_int))
		{
		$valida_int = $linha_valida_int["usuario"];
		}
		
		
		if (isset($valida_int))
		{
				echo "<script>alert('Voce nao possui registro de saida de intervalo. Em caso de duvidas consulte a supervisao.'); 
                document.location.replace('frame.php?t=conteudo.php');</script>\n";
				exit;

		}
		
		if(!isset($valida_int))
		{
		
		$sql_valida_2 = "SELECT  usuario, id FROM registro_ponto WHERE data_saida is NULL and usuario = '$usuario' and data_entrada = '$data'";
		
		$acao_valida_2 = mysql_query($sql_valida_2) or die (mysql_error());
		
		while($linha_valida_2 = mysql_fetch_assoc($acao_valida_2))
		{
		$valida_2 = $linha_valida_2["id"];
		}
		
		
		if(!isset($valida_2))
		{
					echo "<script>alert('Voce ja possui registro de saida na data de hoje. Em caso de duvidas consulte a supervisao.'); 
                    document.location.replace('frame.php?t=conteudo.php'); </script>\n";
					exit;
		}
		
		else
		{

		
		//SE DIA DA SEMANA NÃO FOR SABADO!
	
		if ($dia <> '6')
		{
		  
                    //REGISTRA HORA DA SAIDA 
					
					$sql_update = "UPDATE registro_ponto SET 
									data_saida = '$data'
									,hora_saida = '$hora'
									,data_hora_saida = '$data_hora'
									WHERE data_entrada = '$data'
									and usuario = '$usuario'";
					
					$acao_update = mysql_query($sql_update) or die (mysql_error());
                    
                    
					
					$sql_nome = "SELECT nome, carga_horaria,hora_saida FROM usuarios WHERE id = '$usuario'";
		
					$acao_nome = mysql_query($sql_nome) or die (mysql_error());
		
					while($linha_nome = mysql_fetch_assoc($acao_nome))
					{
					$nome			= $linha_nome["nome"];
					$carga_horaria 	= $linha_nome["carga_horaria"];
                    $hora_saida2    = $linha_nome["hora_saida"];
					
					}
					
					
					$sql_reg = "SELECT * FROM registro_ponto WHERE usuario = '$usuario' and data_entrada = '$data'";
					
					$acao_reg = mysql_query($sql_reg) or die (mysql_error());
					
					while($linha_reg = mysql_fetch_assoc($acao_reg))
					{
						$data_reg_entrada		= $linha_reg["data_entrada"];
						$hora_reg_entrada		= $linha_reg["hora_entrada"];
						$inicio_int				= $linha_reg["inicio_intervalo"];
						$fim_int				= $linha_reg["fim_intervalo"];
						$data_reg_saida         = $linha_reg["data_saida"];
                        $hora_reg_saida		    = $linha_reg["hora_saida"];
					}
                    
                    
                     //echo soma_horas($hora_reg_entrada, $hora_reg_saida);
                    
                        $horaent=explode(":",$hora_reg_entrada);
                        $horaent[0].'<br>'; /*horas*/
                        $horaent[1].'<br>'; /*Minutos*/
                        $horaent[2]; /*Segundos*/
                        
                        $horainicioint=explode(":",$inicio_int);
                        $horainicioint[0].'<br>'; /*horas*/
                        $horainicioint[1].'<br>'; /*Minutos*/
                        $horainicioint[2]; /*Segundos*/

                        $horafim_int=explode(":",$fim_int);
                        $horafim_int[0].'<br>'; /*horas*/
                        $horafim_int[1].'<br>'; /*Minutos*/
                        $horafim_int[2]; /*Segundos*/

                        $horasaida=explode(":",$hora_reg_saida);
                        $horasaida[0].'<br>'; /*horas*/
                        $horasaida[1].'<br>'; /*Minutos*/
                        $horasaida[2]; /*Segundos*/
                        
                        echo '<br>';
                        echo "saída menos entrada";
                        echo '<br>';
                         $calcula1=$horasaida[0]-$horaent[0];
                        echo '<br>';
                         $calcula2=$horasaida[1]-$horaent[1];
                        echo '<br>';
                        $calcula3=$horasaida[2]-$horaent[2];
                        
                        echo '<br>';
                        echo "saída do intervalo menos entrada intervalo";
                        echo '<br><br><br>';
                         $intervalo1=$horafim_int[0]-$horainicioint[0];
                        echo '<br>';
                         $intervalo2=$horafim_int[1]-$horainicioint[1];
                        echo '<br>';
                        $intervalo3=$horafim_int[2]-$horainicioint[2];
                        
                        echo '<br>';
                        echo "dimibui tempo do imtervalo da carga horaria";
                        echo '<br><br><br>';
                        
                        $calcula1 - $intervalo1;
                        echo '<br>';
                         $calcula2 - $intervalo2;
                        echo '<br>';
                        $calcula3 - $intervalo3;
                        echo '<br>';
            
                         $hora= date("H").'<br>';  
                         $minuto= date("i").'<br>';
                         $segundo= date("s").'<br>';
                        
                        $hvalida=$hora.":".$minuto.":".$segundo;
                        
                        $validarhora=explode(":",$hvalida);
                        $validarhora[0].'<br>'; /*horas*/
                        $validarhora[1].'<br>'; /*Minutos*/
                        $validarhora[2]; /*Segundos*/
                        
                        
                        echo '<br>';
                        $horasaida3=explode(":",$hora_saida2);
                        $horasaida3[0].'<br>'; /*horas*/
                        $horasaida3[1].'<br>'; /*Minutos*/
                        $horasaida3[2]; /*Segundos*/
                        
                        
                        
                        echo '<br>';          
					
                      if($calcula1  > $hora_saida2)
                           {
                            
                                   
                         echo "maior que a carga";
                     	$sql_banco = "SELECT banco,banco_positivo FROM banco_horas WHERE usuario = '$usuario'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										$banco = $linha_banco["banco_positivo"];
										}
                                        
                                        $banco3=explode(":",$banco);
                                        $banco3[0].'<br>'; /*horas*/
                                        $banco3[1].'<br>'; /*Minutos*/
                                        $banco3[2]; /*Segundos*/
                    
                             echo '<br>';                      
                            $horaextra1=$horasaida3[0]-$validarhora[0]+$banco[0];
                            $horaextra2=$horasaida3[1]-$validarhora[1]+$banco[1];
                            $horaextra3=$horasaida3[2]-$validarhora[2]+$banco[2];   
                                                                          
                                echo '<br>';
                          echo  $nova_hora=$horaextra1.":".$horaextra2.":".$horaextra3;
                            
                                $novo_banco=$nova_hora;
                       
                                        
                         echo   $banco= "banco_positivo='{$novo_banco}'";
                         
                         
                         $sql_update_banco = "UPDATE banco_horas SET $banco WHERE usuario = '$usuario'";
										
					            $acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
										
									/*	echo "<script>alert('Ponto registrado com sucesso.'); 
                                        document.location.replace('frame.php?t=conteudo.php'); </script>\n";
										exit;*/    
                            
                                                      
                           }
                          if($calcula1 == $hora_saida2)
                           {
                 
                                               
                         echo "igual a carga";
                   
                            
                             echo '<br>';    
                             
                             				
							$sql_banco = "SELECT banco,banco_positivo FROM banco_horas WHERE usuario = '$usuario'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										$banco = $linha_banco["banco_positivo"];
										}
                                        
                                        $banco3=explode(":",$banco);
                                            echo $banco3[0].'<br>'; /*horas*/
                                            echo $banco3[1].'<br>'; /*Minutos*/
                                            echo $banco3[2]; /*Segundos*/
                             
                              $horaextra1=$horasaida3[0]-$validarhora[0]+$banco3[0];
                              $horaextra2=$horasaida3[1]-$validarhora[1]+$banco3[1];
                              $horaextra3=$horasaida3[2]-$validarhora[2]+$banco3[2];   
                                                                          
                                echo '<br>';
                          echo  $nova_hora=$horaextra1.":".$horaextra2.":".$horaextra3;
                            
                                 $novo_banco=$nova_hora;
                                                                    
                                   echo    $banco= "banco_positivo='{$novo_banco}'";
                                   
                                $sql_update_banco = "UPDATE banco_horas SET $banco WHERE usuario = '$usuario'";
										
					            $acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
										
									/*	echo "<script>alert('Ponto registrado com sucesso.'); 
                                        document.location.replace('frame.php?t=conteudo.php'); </script>\n";
										exit;*/       
                            
                                                      
                           }
                        
                        if($calcula1  < $hora_saida2)
                           {
                            
                                      
                            
                            echo "menor que a carga";
                            echo '<br>'; 
                                              
                                             
                            	$sql_banco = "SELECT banco,banco_negativo,usuario FROM banco_horas WHERE usuario = '$usuario'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										$banco = $linha_banco["banco_negativo"];
										}
									
                                           $banco3=explode(":",$banco);
                                             $banco3[0].'<br>'; /*horas*/
                                             $banco3[1].'<br>'; /*Minutos*/
                                             $banco3[2]; /*Segundos*/ 
                            
                            
                            if($horasaida3[1] == '00')
                            {
                             $horasaida3[1]='60';
                            }else{
                                
                              $horasaida3[1]=$horasaida3[1];  
                            }
                              if($horasaida3[2] == '00')
                            {
                             $horasaida3[2]='60';
                            }else{
                                
                              $horasaida3[2]=$horasaida3[1];  
                            }
                            
                              
                            $horaextra1=$horasaida3[0]-$validarhora[0]+$banco3[0];
                            $horaextra2=$horasaida3[1]-$validarhora[1]+$banco3[1];
                            $horaextra3=$horasaida3[2]-$validarhora[2]+$banco3[2]; 
                            
                      echo  $nova_hora=$horaextra1.":".$horaextra2.":".$horaextra3;  
                                   
                      
                       
                       echo '<br>'; 
                       	      echo $sql_update_banco = "UPDATE banco_horas SET banco_negativo ='$nova_hora'  WHERE usuario = '$usuario'";
										
					            $acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
										
									/*	echo "<script>alert('Ponto registrado com sucesso.'); 
                                        document.location.replace('frame.php?t=conteudo.php'); </script>\n";
										exit;*/                            
                           }
                    
                
                        
                        
                       		include "reg_log.php";
                               
                               
                               
                                
                    
									/*	$dia_banco =  substr($data_reg_entrada,8,2); 
										$mes_banco =  substr($data_reg_entrada,5,2);
										$ano_banco =  substr($data_reg_entrada,0,4);
										$hora_banco = substr($hora_reg_entrada,0,2);
										$min_banco = substr($hora_reg_entrada,3,2);
										$seg_banco = substr($hora_reg_entrada,6,3);
										
								      $data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco.":".$seg_banco;
										
									
										 $dia_atual =  substr($data,8,2); 
										 $mes_atual =  substr($data,5,2);
										 $ano_atual =  substr($data,0,4);
										 $hora_atual = substr($hora,0,2);
										 $min_atual = substr($hora,3,2);
                                         $seg_atual = substr($hora,6,3);
					
					                 $data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual.":".$seg_atual;
										
									//	$data_dif = mktime($hora_banco,$min_banco,$seg_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
								//		$data_dif1 = mktime($hora_atual,$min_atual,$seg_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										$horas_dif = ($data_dif1 - $data_dif);
										
										$horas_trabalhadas = round(($horas_dif/60/60));
					
								
									
										//Calcula tempo de intervalo
										
										$dia_int =  substr($data_reg_entrada,8,2); 
										$mes_int =  substr($data_reg_entrada,5,2);
										$ano_int =  substr($data_reg_entrada,0,4);
										$hora_inicio = substr($inicio_int,0,2);
										$min_inicio = substr($inicio_int,3,2);
										$seg_inicio = substr($inicio_int,6,3);
										
										$int_dif = $dia_int."-".$mes_int."-".$ano_int ." ".$hora_inicio.":".$min_inicio.":".$seg_inicio;
										
										
										
										 $dia_int2 =  substr($data_reg_entrada,8,2); 
										 $mes_int2 =  substr($data_reg_entrada,5,2);
										 $ano_int2 =  substr($data_reg_entrada,0,4);
										 $hora_fim = substr($fim_int,0,2);
										 $min_fim = substr($fim_int,3,2);
										 $seg_fim = substr($fim_int,6,3);
										
										
										$int_dif_2 = $dia_int2."-".$mes_int2."-".$ano_int2." ".$hora_fim.":".$min_fim.":".$seg_fim;
										
										//$int_dif = mktime($hora_inicio,$min_inicio,0,$mes_int,$dia_int,$ano_int);
										
										//$int_dif_2 = mktime($hora_fim,$min_fim,0,$mes_int2,$dia_int2,$ano_int2);
										
										$intervalo_dif = ($int_dif_2 - $int_dif);
										
										$tempo_intervalo = round(($intervalo_dif/60/60));

										$horas_trabalhadas = $horas_trabalhadas - $tempo_intervalo;
										
									    $horas_trabalhadas = round($horas_trabalhadas);								
													
										
										
								
						
					
					//REGISTRA HORA DA SAIDA 
					
					
					
					
					$sql_update = "UPDATE registro_ponto SET 
									data_saida = '$data'
									,hora_saida = '$hora'
									,data_hora_saida = '$data_hora'
									WHERE data_entrada = '$data'
									and usuario = '$usuario'";
					
					$acao_update = mysql_query($sql_update) or die (mysql_error());
					
					include "reg_log.php";
					
					//VERFICA SE COLABORADOR REALIZOU HORA EXTRA
					
					
					
					if($horas_trabalhadas > $carga_horaria)
					
					{		
					
							$dif = $horas_trabalhadas - $carga_horaria;
														
														
							if ($dif < 2)
							
							{
																	
									
									//DEFINE A PORCENTAGEM ACRESCENTADA A HORA EXTRA
											$perc = 50;
								
											
											//ARREDONDA HORAS 											
											$hrs = round(($dif));
											
											//CALCULA AS HORAS COM A PORCENTAGEM DEFINIDA
											$calc = ($perc / 100) * $hrs;
											 
											 
											$nova_hora = $hrs + $calc;
											
											//ARREDONDA E CONVERTE TEMPO EM HORAS
											$nova_hora = round($nova_hora);

										
										
										//Verifica banco de horas do colaborador
										
									
										$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										$banco = $linha_banco["banco"];
										}
																
										$novo_banco = $banco + $nova_hora;
									
										//;$novo_banco = "$novo_banco:00:00";
                                        $novo_banco = "$novo_banco";
										
										$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
										
										$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
										
										echo "<script>alert('Ponto registrado com sucesso.'); 
                                        document.location.replace('frame.php?t=conteudo.php'); </script>\n";
										exit;
											
							}
							
							if ($dif >= 2)
							{
										
										$hrs_1 = $dif - 2;
										
										$hrs_2 = 2;
										
										
										//DEFINE A PORCENTAGEM ACRESCENTADA A HORA EXTRA
										$perc = 50;
										$perc70 = 70;
										
										//CALCULA AS HORAS COM A PORCENTAGEM DEFINIDA
										$calc = ($perc70 / 100) * $hrs_1;
										 
										 //CALCULA AS 2 PRIMERIAS HORAS
										 
										$calc_2 = ($perc / 100) * $hrs_2;
										 
										$nova_hora =  $dif + $calc + $calc_2;
										
										$nova_hora = round($nova_hora);
										

								//Verifica banco de horas
							
								$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
								
								$acao_banco = mysql_query($sql_banco) or die (mysql_error());
								
								while($linha_banco = mysql_fetch_assoc($acao_banco))
								{
								$banco = $linha_banco["banco"];
								}
														
							    $novo_banco = $banco + $nova_hora;
							
								//$novo_banco = "$novo_banco:00:00";
                                $novo_banco = "$novo_banco";
								
								$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
								
								$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
				
				
				echo "<script>alert('Ponto registrado com sucesso.'); 
                     document.location.replace('frame.php?t=conteudo.php'); </script>\n";
				exit;				
														
			
						
				}
		
		}
	
	
	
	
		if($horas_trabalhadas < $carga_horaria)
		{						
		                      
							    $horas_dif = $carga_horaria - $horas_trabalhadas;
                                
                                //$horas_dif=explode(":",$carga_horaria)
								
								$horas_dif = ($horas_dif * 60 * 60);
                                
								$horas_faltas_ponto = gmdate("H:i:s", $horas_dif);
								
								$horas_faltas_banco = round(($horas_dif/60/60));	
									
											
							
											
								
								$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
								
								$acao_banco = mysql_query($sql_banco) or die (mysql_error());
								
								while($linha_banco = mysql_fetch_assoc($acao_banco))
								{
								$banco = $linha_banco["banco"];
								}
			
			 					$novo_banco = $banco - $horas_faltas_banco;
								
								//$novo_banco = "$novo_banco:00:00";
                                
                                $novo_banco = "$novo_banco";
			
								$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
								
								$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
								
								
								$sql_faltas = "UPDATE registro_ponto SET falta = '$horas_faltas_ponto' WHERE usuario = '$usuario' and data_entrada = '$data'";
								
								$acao_faltas = mysql_query($sql_faltas) or die (mysql_error());
								
								
			
								echo "<script>alert('Ponto registrado com sucesso.'); 
                                document.location.replace('frame.php?t=conteudo.php'); </script>\n";
								exit;
						
				}
				
				if($horas_trabalhadas == $carga_horaria)
				{
								
								echo "<script>alert('Ponto registrado com sucesso.'); 
                                document.location.replace('frame.php?t=conteudo.php'); </script>\n";
								exit;
				}
		
}
 
 
		if ($dia == '6')
			
			{
					$sql_nome = "SELECT nome, carga_horaria_sab FROM usuarios WHERE login = '$usuario'";
		
					$acao_nome = mysql_query($sql_nome) or die (mysql_error());
		
					while($linha_nome = mysql_fetch_assoc($acao_nome))
					{
					$nome			= $linha_nome["nome"];
					$carga_sab	 	= $linha_nome["carga_horaria_sab"];
					
					}
					
					
					$sql_reg = "SELECT * FROM registro_ponto WHERE usuario = '$usuario' and data_entrada = '$data'";
					
					$acao_reg = mysql_query($sql_reg) or die (mysql_error());
					
					while($linha_reg = mysql_fetch_assoc($acao_reg))
					{
						$data_reg_entrada		= $linha_reg["data_entrada"];
						$hora_reg_entrada		= $linha_reg["hora_entrada"];
						
					}
					
										//Calcula horas trabalhadas
					
										$dia_banco =  substr($data_reg_entrada,8,2); 
										$mes_banco =  substr($data_reg_entrada,5,2);
										$ano_banco =  substr($data_reg_entrada,0,4);
										$hora_banco = substr($hora_reg_entrada,0,2);
										$min_banco = substr($hora_reg_entrada,3,2);
										
										
										$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
										
										
										
										 $dia_atual =  substr($data,8,2); 
										 $mes_atual =  substr($data,5,2);
										 $ano_atual =  substr($data,0,4);
										 $hora_atual = substr($hora,0,2);
										 $min_atual = substr($hora,3,2);
					
					
										$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
										
										$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
										$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										$horas_dif = ($data_dif1 - $data_dif);
										
										$horas_trabalhadas = round(($horas_dif/60/60));

					
					//REGISTRA HORA DA SAIDA 
					
					$sql_update = "UPDATE registro_ponto SET 
									data_saida = '$data'
									,hora_saida = '$hora'
									,data_hora_saida = '$data_hora'
									WHERE data_entrada = '$data'
									and usuario = '$usuario'";
					
					$acao_update = mysql_query($sql_update) or die (mysql_error());
					
					
					include "reg_log.php";
					
	
					//VERFICA SE COLABORADOR REALIZOU HORA EXTRA
					
					if($horas_trabalhadas > $carga_sabado)
					
					
					$dif = $horas_trabalhadas - $carga_sabado;
														
														
							if ($dif < 2)
							
							{
																	
									
									//DEFINE A PORCENTAGEM ACRESCENTADA A HORA EXTRA
											$perc = 50;
								
											
											//ARREDONDA HORAS 											
											$hrs = round(($dif));
											
											//CALCULA AS HORAS COM A PORCENTAGEM DEFINIDA
											$calc = ($perc / 100) * $hrs;
											 
											 
											$nova_hora = $hrs + $calc;
											
											//ARREDONDA E CONVERTE TEMPO EM HORAS
											$nova_hora = round($nova_hora);

										
										
										//Verifica banco de horas do colaborador
										
									
										$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										$banco = $linha_banco["banco"];
										}
																
										$novo_banco = $banco + $nova_hora;
									
										$novo_banco = "$novo_banco:00:00";
										
										$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
										
										$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
										
										echo "<script>alert('Ponto registrado com sucesso.'); 
                                        document.location.replace('frame.php?t=conteudo.php'); </script>\n";
										exit;
											
							}
							
							if ($dif >= 2)
							{
										
										$hrs_1 = $dif - 2;
										
										$hrs_2 = 2;
										
										
										//DEFINE A PORCENTAGEM ACRESCENTADA A HORA EXTRA
										$perc = 50;
										$perc70 = 70;
										
										//CALCULA AS HORAS COM A PORCENTAGEM DEFINIDA
										$calc = ($perc70 / 100) * $hrs_1;
										 
										 //CALCULA AS 2 PRIMERIAS HORAS
										 
										$calc_2 = ($perc / 100) * $hrs_2;
										 
										$nova_hora =  $dif + $calc + $calc_2;
										
										$nova_hora = round($nova_hora);
										

								//Verifica banco de horas
							
								$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
								
								$acao_banco = mysql_query($sql_banco) or die (mysql_error());
								
								while($linha_banco = mysql_fetch_assoc($acao_banco))
								{
								$banco = $linha_banco["banco"];
								}
														
							    $novo_banco = $banco + $nova_hora;
							
								$novo_banco = "$novo_banco:00:00";
								
								$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
								
								$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
				
				
				echo "<script>alert('Ponto registrado com sucesso.'); 
                document.location.replace('frame.php?t=conteudo.php'); </script>\n";
				exit;				
														
			
						
				}
		
		}
	
	
	
	
		if($horas_trabalhadas < $carga_sabado)
		{						
		
								$horas_dif = $carga_sabado - $horas_trabalhadas;
								
								$horas_dif = ($horas_dif * 60 * 60);
								
								$horas_faltas_ponto = gmdate("H:i:s", $horas_dif);
								
								$horas_faltas_banco = round(($horas_dif/60/60));	
									
											
							
											
								
								$sql_banco = "SELECT banco FROM banco_horas WHERE usuario = '$usuario'";
								
								$acao_banco = mysql_query($sql_banco) or die (mysql_error());
								
								while($linha_banco = mysql_fetch_assoc($acao_banco))
								{
								$banco = $linha_banco["banco"];
								}
			
			 					$novo_banco = $banco - $horas_faltas_banco;
								
								$novo_banco = "$novo_banco:00:00";
			
								$sql_update_banco = "UPDATE banco_horas SET banco = '$novo_banco' WHERE usuario = '$usuario'";
								
								$acao_update_banco = mysql_query($sql_update_banco) or die (mysql_error());
								
								
								$sql_faltas = "UPDATE registro_ponto SET falta = '$horas_faltas_ponto' WHERE usuario = '$usuario' and data_entrada = '$data'";
								
								$acao_faltas = mysql_query($sql_faltas) or die (mysql_error());
								
								
			
								echo "<script>alert('Ponto registrado com sucesso.'); 
                                document.location.replace('frame.php?t=conteudo.php'); </script>\n";
								exit;
						
				}
				
				if($horas_trabalhadas == $carga_sabado)
				{
								
								echo "<script>alert('Ponto registrado com sucesso.'); 
                                document.location.replace('frame.php?t=conteudo.php'); </script>\n";
								exit;
				}
			*/
       
}
}
}
}


?>


</body>
</html>