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
$diasemana[2] = "Ter&ccedil;a-feira";
$diasemana[3] = "Quarta-feira";
$diasemana[4] = "Quinta-feira";
$diasemana[5] = "Sexta-feira";
$diasemana[6] = "S&aacute;bado";

$mes = date("n");
$mesano[1] = "janeiro";
$mesano[2] = "fevereiro";
$mesano[3] = "março";
$mesano[4] = "abril";
$mesano[5] = "maio";
$mesano[6] = "junho";
$mesano[7] = "julho";
$mesano[8] = "agosto";
$mesano[9] = "setembro";
$mesano[10] = "outubro";
$mesano[11] = "novembro";
$mesano[12] = "dezembro";

echo utf8_encode(" $diasemana[$dia], $datadia de $mesano[$mes] de $dataano.");
?>