<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
</head>

<body>

<?php

if(!isset($dia_ponto))
{
echo "<script>alert('Selecione o periodo.'); history.go(-1); </script>\n";
exit;
}
date_default_timezone_set("Brazil/East");

//Define as variaveis

$mes_registro = "$mes_consulta/$ano_consulta";

$data_hora_ent = "$data_entrada $hora_entrada";

$data_hora_sai = "$data_saida $hora_saida";

$data_atual = date("Y/m/d H:i:s");



$dia_reg =  substr($data_entrada,8,2); 
$mes_reg =  substr($data_entrada,5,2);
$ano_reg =  substr($data_entrada,0,4);

$data_impressao = $dia_reg."/".$mes_reg."/".$ano_reg;





include "abreconexao.php";

$sql_valida = "SELECT * FROM registro_ponto WHERE usuario = '$login' and data_entrada = '$data_entrada'";

$acao_valida = mysql_query($sql_valida) or die (mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
$valida_data = $linha_valida["id"];
}

if (isset($valida_data))
{

echo "<script>alert('Usuario ja possui registro de ponto na data selecionada. Em caso de duvidas, consulte os administradores do sistema.'); history.back(); </script>\n";
exit;

}



$sql_user = "SELECT * FROM usuarios WHERE login = '".$_REQUEST['login']."'";

$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user = mysql_fetch_assoc($acao_user))
{

	$login			= $linha_user["login"];
	$nome			= $linha_user["nome"];
	$entrada		= $linha_user["hora_entrada"];
	$saida			= $linha_user["hora_saida"];
	$entrada_sab	= $linha_user["hora_ent_sab"];
	$saida_sab		= $linha_user["hora_sai_sab"];
	$carga_horaria	= $linha_user["carga_horaria"];
	$carga_sabado	= $linha_user["carga_horaria_sab"];
	
	
}

if ($dia_ponto == 1)
{
										//Calcula horas trabalhadas no dia

															
										$dia_banco =  substr($data_entrada,8,2); 
										$mes_banco =  substr($data_entrada,5,2);
										$ano_banco =  substr($data_entrada,0,4);
										$hora_banco = substr($hora_entrada,0,2);
										$min_banco = substr($hora_entrada,3,2);
										
										
										$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
										
										
										
										 $dia_atual =  substr($data_saida,8,2); 
										 $mes_atual =  substr($data_saida,5,2);
										 $ano_atual =  substr($data_saida,0,4);
										 $hora_atual = substr($hora_saida,0,2);
										 $min_atual = substr($hora_saida,3,2);
										
										
										
										$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
										
										$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
										$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										$horas_dif = ($data_dif1 - $data_dif);
										
										$horas_trabalhadas = round(($horas_dif/60/60));
							
							
							//Calcula tempo de intervalo
							
							
										$dia_int =  substr($data_entrada,8,2); 
										$mes_int =  substr($data_entrada,5,2);
										$ano_int =  substr($data_entrada,0,4);
										$hora_inicio = substr($inicio_intervalo,0,2);
										$min_inicio = substr($inicio_intervalo,3,2);
										
										
										$int_dif = $dia_int."-".$mes_int."-".$ano_int ." ".$hora_inicio.":".$min_inicio;
										
										
										
										 $dia_int2 =  substr($data_entrada,8,2); 
										 $mes_int2 =  substr($data_entrada,5,2);
										 $ano_int2 =  substr($data_entrada,0,4);
										 $hora_fim = substr($fim_intervalo,0,2);
										 $min_fim = substr($fim_intervalo,3,2);
										
										
										
										$int_dif_2 = $dia_int2."-".$mes_int2."-".$ano_int2." ".$hora_fim.":".$min_fim;
										
										$int_dif = mktime($hora_inicio,$min_inicio,0,$mes_int,$dia_int,$ano_int);
										
										$int_dif_2 = mktime($hora_fim,$min_fim,0,$mes_int2,$dia_int2,$ano_int2);
										
										$intervalo_dif = ($int_dif_2 - $int_dif);
										
										$tempo_intervalo = round(($intervalo_dif/60/60));
							
										
							//Arredonda horas trabalhadas			
										
							$horas_trabalhadas = $horas_trabalhadas - $tempo_intervalo;
							
							$horas_trabalhadas = round($horas_trabalhadas);
							
							
							
								
							
							if ($horas_trabalhadas < $carga_horaria)
							
							{
									
										$dia_banco =  substr($data_entrada,8,2); 
										$mes_banco =  substr($data_entrada,5,2);
										$ano_banco =  substr($data_entrada,0,4);
										$hora_banco = substr($hora_entrada,0,2);
										$min_banco = substr($hora_entrada,3,2);
										
										
										$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
										
										
										
										 $dia_atual =  substr($data_saida,8,2); 
										 $mes_atual =  substr($data_saida,5,2);
										 $ano_atual =  substr($data_saida,0,4);
										 $hora_atual = substr($hora_saida,0,2);
										 $min_atual =  substr($hora_saida,3,2);
										
										
										
										$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
										
										$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
										$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										
										$horas_dif_3 = ($data_dif1 - $data_dif);
										
										$horas_dif_3 = ($horas_dif_3/60/60);
										
										
										//Calcula Intervalo
										
										//Calcula tempo de intervalo
							
							
										$dia_int =  substr($data_entrada,8,2); 
										$mes_int =  substr($data_entrada,5,2);
										$ano_int =  substr($data_entrada,0,4);
										$hora_inicio = substr($inicio_intervalo,0,2);
										$min_inicio = substr($inicio_intervalo,3,2);
										
										
										$int_dif = $dia_int."-".$mes_int."-".$ano_int ." ".$hora_inicio.":".$min_inicio;
										
										
										
										 $dia_int2 =  substr($data_entrada,8,2); 
										 $mes_int2 =  substr($data_entrada,5,2);
										 $ano_int2 =  substr($data_entrada,0,4);
										 $hora_fim = substr($fim_intervalo,0,2);
										 $min_fim = substr($fim_intervalo,3,2);
										
										
										
										$int_dif_2 = $dia_int2."-".$mes_int2."-".$ano_int2." ".$hora_fim.":".$min_fim;
										
										$int_dif = mktime($hora_inicio,$min_inicio,0,$mes_int,$dia_int,$ano_int);
										
										$int_dif_2 = mktime($hora_fim,$min_fim,0,$mes_int2,$dia_int2,$ano_int2);
										
										$intervalo_dif = ($int_dif_2 - $int_dif);
										
										$tempo_intervalo = round(($intervalo_dif/60/60));

										
										$horas_dif_3 = $horas_dif_3 - $tempo_intervalo;
										
																	
										
										$horas_dif = $carga_horaria - $horas_dif_3;
										
										$horas_dif = ($horas_dif * 60 * 60);
										
																	
										
										
										
										$horas_faltas_ponto = gmdate("H:i:s", $horas_dif);
										
										$horas_faltas_banco = round(($horas_dif/60/60));
										
										
										
										
										
										//Verifica banco de Horas do colaborador
										
										
										
										
										$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
										$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
										while($linha_banco = mysql_fetch_assoc($acao_banco))
										{
										
										$banco = $linha_banco["banco"];
										
										}
										
										
										
										$novo_banco = $banco - $horas_faltas_banco;
										
										$novo_banco = "$novo_banco:00:00";
										
										
										
										//Registra ponto na tabela
										
										include "dia_semana.php";
										
										
										
										
																		
										$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, falta, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$horas_faltas_ponto', '$usuario', '$observacao', '$data_atual')";
										
										$acao_insert = mysql_query($sql_insert) or die (mysql_error());
										
										
										//Atualiza novo banco de horas do colaborador
										
										$sql_update = "UPDATE banco_horas SET 
														banco = '$novo_banco'
														WHERE usuario = '$login'";
														
										$acao_update = mysql_query($sql_update) or die (mysql_error());
										
										
										echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
										exit;
										
								
										
								}
								
								
								
								
							if ($horas_trabalhadas == $carga_horaria)
							{ 
									
							
										include "dia_semana.php";
									
										
										
										
																		
										$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
										$acao_insert = mysql_query($sql_insert) or die (mysql_error());
										echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
										exit;
										
										
										
								
							}
							
							if ($horas_trabalhadas > $carga_horaria)
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

											
											$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
											$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
											while($linha_banco = mysql_fetch_assoc($acao_banco))
											{
											
											$banco = $linha_banco["banco"];
											
											}
											
											$novo_banco = $banco + $nova_hora;
							
											$novo_banco = "$novo_banco:00:00";
											
											
											
											
											include "dia_semana.php";
											
											
											$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
											$acao_insert = mysql_query($sql_insert) or die (mysql_error());
											
											
											//Atualiza novo banco de horas do colaborador
											
											$sql_update = "UPDATE banco_horas SET 
															banco = '$novo_banco'
															WHERE usuario = '$login'";
															
											$acao_update = mysql_query($sql_update) or die (mysql_error());
											
											
											echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
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
										
										$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
											$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
											while($linha_banco = mysql_fetch_assoc($acao_banco))
											{
											
											$banco = $linha_banco["banco"];
											
											}
											
											$novo_banco = $banco + $nova_hora;
							
											$novo_banco = "$novo_banco:00:00";
											
											include "dia_semana.php";
											
											
											
											$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
											$acao_insert = mysql_query($sql_insert) or die (mysql_error());
											
											
											//Atualiza novo banco de horas do colaborador
											
											$sql_update = "UPDATE banco_horas SET 
															banco = '$novo_banco'
															WHERE usuario = '$login'";
															
											$acao_update = mysql_query($sql_update) or die (mysql_error());
											
											
											echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
											exit;
																		
										
								}
						
						}		
									
								
				}
										
									
if ($dia_ponto == 2)

{
										//Calcula horas trabalhadas no dia

															
										$dia_banco =  substr($data_entrada,8,2); 
										$mes_banco =  substr($data_entrada,5,2);
										$ano_banco =  substr($data_entrada,0,4);
										$hora_banco = substr($hora_entrada,0,2);
										$min_banco = substr($hora_entrada,3,2);
										
										
										$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
										
										
										
										 $dia_atual =  substr($data_saida,8,2); 
										 $mes_atual =  substr($data_saida,5,2);
										 $ano_atual =  substr($data_saida,0,4);
										 $hora_atual = substr($hora_saida,0,2);
										 $min_atual = substr($hora_saida,3,2);
										
										
										
										$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
										
										$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
										$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										$horas_dif = ($data_dif1 - $data_dif);
										
										$horas_trabalhadas = round(($horas_dif/60/60));
										
										
										
										
										
										if ($horas_trabalhadas < $carga_sabado)
										{
										
													$dia_banco =  substr($data_entrada,8,2); 
													$mes_banco =  substr($data_entrada,5,2);
													$ano_banco =  substr($data_entrada,0,4);
													$hora_banco = substr($hora_entrada,0,2);
													$min_banco = substr($hora_entrada,3,2);
													
													
													$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
													
													
													
													 $dia_atual =  substr($data_saida,8,2); 
													 $mes_atual =  substr($data_saida,5,2);
													 $ano_atual =  substr($data_saida,0,4);
													 $hora_atual = substr($hora_saida,0,2);
													 $min_atual =  substr($hora_saida,3,2);
													
													
													
													$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
													
													$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
													
													$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
													
													$horas_dif_3 = ($data_dif1 - $data_dif);
													
													$horas_dif_3 = ($horas_dif_3/60/60);
													
																				
													
													$horas_dif = $carga_sabado - $horas_dif_3;
													
													$horas_dif = ($horas_dif * 60 * 60);
													
																				
													
													
													
													$horas_faltas_ponto = gmdate("H:i:s", $horas_dif);
													
													$horas_faltas_banco = round(($horas_dif/60/60));
													
													
													
													
													
													//Verifica banco de Horas do colaborador
													
													
													
													
													$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
													
													$acao_banco = mysql_query($sql_banco) or die (mysql_error());
													
													while($linha_banco = mysql_fetch_assoc($acao_banco))
													{
													
													$banco = $linha_banco["banco"];
													
													}
													
													
													
													$novo_banco = $banco - $horas_faltas_banco;
													
													$novo_banco = "$novo_banco:00:00";
													
													
													
													//Registra ponto na tabela
													
													include "dia_semana.php";
													
													
													
													
																					
													$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, falta, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$horas_faltas_ponto', '$usuario', '$observacao', '$data_atual')";
													
													$acao_insert = mysql_query($sql_insert) or die (mysql_error());
													
													
													//Atualiza novo banco de horas do colaborador
													
													$sql_update = "UPDATE banco_horas SET 
																	banco = '$novo_banco'
																	WHERE usuario = '$login'";
																	
													$acao_update = mysql_query($sql_update) or die (mysql_error());
													
													
													echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
													exit;
													
																			
								}
								
								
								if ($horas_trabalhadas == $carga_sabado)
								{
								
										include "dia_semana.php";
									
										
										
										
																		
										$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
										$acao_insert = mysql_query($sql_insert) or die (mysql_error());
										echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
										exit;
										
										
								}
								
								
								if ($horas_trabalhadas > $carga_sabado)
								
								{
										
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

											
											$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
											$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
											while($linha_banco = mysql_fetch_assoc($acao_banco))
											{
											
											$banco = $linha_banco["banco"];
											
											}
											
											$novo_banco = $banco + $nova_hora;
							
											$novo_banco = "$novo_banco:00:00";
											
											
											include "dia_semana.php";
											
											
											$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
											$acao_insert = mysql_query($sql_insert) or die (mysql_error());
											
											
											//Atualiza novo banco de horas do colaborador
											
											$sql_update = "UPDATE banco_horas SET 
															banco = '$novo_banco'
															WHERE usuario = '$login'";
															
											$acao_update = mysql_query($sql_update) or die (mysql_error());
											
											
											echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
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
										
										$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
											$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
											while($linha_banco = mysql_fetch_assoc($acao_banco))
											{
											
											$banco = $linha_banco["banco"];
											
											}
											
											$novo_banco = $banco + $nova_hora;
							
											$novo_banco = "$novo_banco:00:00";
											
											include "dia_semana.php";
											
											
											
											$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
											$acao_insert = mysql_query($sql_insert) or die (mysql_error());
											
											
											//Atualiza novo banco de horas do colaborador

											
											$sql_update = "UPDATE banco_horas SET 
															banco = '$novo_banco'
															WHERE usuario = '$login'";
															
											$acao_update = mysql_query($sql_update) or die (mysql_error());
											
											
											echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
											exit;
																		
										
								}
						
						}		
									
								
				}
												
												
	 if ($dia_ponto == 3)
		{
													
						$dia_banco =  substr($data_entrada,8,2); 
						
										$mes_banco =  substr($data_entrada,5,2);
										$ano_banco =  substr($data_entrada,0,4);
										$hora_banco = substr($hora_entrada,0,2);
										$min_banco = substr($hora_entrada,3,2);
										
										
										$data_dif = $dia_banco."-".$mes_banco."-".$ano_banco ." ".$hora_banco.":".$min_banco;
										
										
										
										 $dia_atual =  substr($data_saida,8,2); 
										 $mes_atual =  substr($data_saida,5,2);
										 $ano_atual =  substr($data_saida,0,4);
										 $hora_atual = substr($hora_saida,0,2);
										 $min_atual = substr($hora_saida,3,2);
										
										
										
										$data_dif1 = $dia_atual."-".$mes_atual."-".$ano_atual." ".$hora_atual.":".$min_atual;
										
										$data_dif = mktime($hora_banco,$min_banco,0,$mes_banco,$dia_banco,$ano_banco);
										
										$data_dif1 = mktime($hora_atual,$min_atual,0,$mes_atual,$dia_atual,$ano_atual);
										
										$horas_dif = ($data_dif1 - $data_dif);
										
										$horas_trabalhadas = round(($horas_dif/60/60));
										
										
										
										
										//CALCULA AS HORAS COM A PORCENTAGEM DEFINIDA
										
										$perc70 = 130;
										
										$calc = ($perc70 / 100) * $horas_trabalhadas;
										
									
										$nova_hora = $calc + $horas_trabalhadas;
										
										
										$nova_hora = round($nova_hora);
										
										$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '$login'";
										
											$acao_banco = mysql_query($sql_banco) or die (mysql_error());
										
											while($linha_banco = mysql_fetch_assoc($acao_banco))
											{
											
											$banco = $linha_banco["banco"];
											
											}
											
											$novo_banco = $banco + $nova_hora;
							
											$novo_banco = "$novo_banco:00:00";
											
											include "dia_semana.php";
											
											
											
											$sql_insert = "INSERT INTO registro_ponto (usuario, nome, mes, data_impressao, dia_impressao, data_entrada, hora_entrada, data_hora_ent, data_saida, hora_saida, data_hora_saida, inicio_intervalo, fim_intervalo, usuario_modificacao, observacao, data_modificacao) VALUES ('$login', '$nome', '$mes_registro', '$data_impressao', '$diasemana[$dia]', '$data_entrada', '$hora_entrada', '$data_hora_ent', '$data_saida', '$hora_saida', '$data_hora_sai', '$inicio_intervalo', '$fim_intervalo', '$usuario', '$observacao', '$data_atual')";
										
											$acao_insert = mysql_query($sql_insert) or die (mysql_error());
											
											
											//Atualiza novo banco de horas do colaborador
											
											$sql_update = "UPDATE banco_horas SET 
															banco = '$novo_banco'
															WHERE usuario = '$login'";
															
											$acao_update = mysql_query($sql_update) or die (mysql_error());
											
											
											echo "<script>alert('Ponto registrado com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
											exit;
							
		
		}
										
					
					
					
				

?>


</body>
</html>
