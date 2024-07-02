<?php
$tempo = 0;

  set_time_limit($tempo);

date_default_timezone_set("Brazil/East");
  

$datadia = date("d");
$dataano = date("Y");
$dataatual = date("d/m/Y");
$dia = date("w");
/*$diasemana[0] = "Domingo";
$diasemana[1] = "Segunda-feira";
$diasemana[2] = "Terça-feira";
$diasemana[3] = "Quarta-feira";
$diasemana[4] = "Quinta-feira";
$diasemana[5] = "Sexta-feira";
$diasemana[6] = "Sábado";
*/
$mes = date("n");
$mesano[1] = "01";
$mesano[2] = "02";
$mesano[3] = "03";
$mesano[4] = "04";
$mesano[5] = "05";
$mesano[6] = "06";
$mesano[7] = "07";
$mesano[8] = "08";
$mesano[9] = "09";
$mesano[10] = "10";
$mesano[11] = "11";
$mesano[12] = "12";

echo "<font face='arial' color='#000000' size='2'> $datadia/$mesano[$mes]/$dataano </font>";
?>