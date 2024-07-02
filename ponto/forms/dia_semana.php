<?php
$tempo = 0;

  set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
	$ano =  substr("$data_entrada", 0, 4);
	$mes =  substr("$data_entrada", 5, 2);
	$dia =  substr("$data_entrada", 8, 2);

$dia = date("w", mktime(0,0,0,$mes,$dia,$ano) );

$diasemana[0] = "Domingo";
$diasemana[1] = "Segunda-feira";
$diasemana[2] = "Terca-feira";
$diasemana[3] = "Quarta-feira";
$diasemana[4] = "Quinta-feira";
$diasemana[5] = "Sexta-feira";
$diasemana[6] = "Sabado";

$mes = date("n");
$mesano[1] = "Janeiro";
$mesano[2] = "Fevereiro";
$mesano[3] = "Março";
$mesano[4] = "Abril";
$mesano[5] = "Maio";
$mesano[6] = "Junho";
$mesano[7] = "Julho";
$mesano[8] = "Agosto";
$mesano[9] = "Setembro";
$mesano[10] = "Outubro";
$mesano[11] = "Novembro";
$mesano[12] = "Dezembro";

?>