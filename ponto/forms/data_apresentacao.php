<?php
$tempo = 0;

  set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
$datadia = date("d");
$dataano = date("Y");
$dataatual = date("d/m/Y");
$dia = date("w");
$diasemana[0] = "Domingo";
$diasemana[1] = "Segunda-feira";
$diasemana[2] = "Terca-feira";
$diasemana[3] = "Quarta-feira";
$diasemana[4] = "Quinta-feira";
$diasemana[5] = "Sexta-feira";
$diasemana[6] = "S�bado";

$mes = date("n");
$mesano[1] = "Janeiro";
$mesano[2] = "Fevereiro";
$mesano[3] = "Mar�o";
$mesano[4] = "Abril";
$mesano[5] = "Maio";
$mesano[6] = "Junho";
$mesano[7] = "Julho";
$mesano[8] = "Agosto";
$mesano[9] = "Setembro";
$mesano[10] = "Outubro";
$mesano[11] = "Novembro";
$mesano[12] = "Dezembro";

echo "<font face='arial' size='2'>$diasemana[$dia], $datadia de $mesano[$mes] de $dataano. </font>";
?>