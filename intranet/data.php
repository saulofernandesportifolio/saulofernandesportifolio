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

// calculo de subtação de 2 horarios
function diminui_hora($hora_v1,$hora_v2){
$hora_inicial = strtotime($hora_v1);
$hora_final = strtotime($hora_v2);
$nHoras   = ($hora_final - $hora_inicial) / 3600;
$nMinutos = (($hora_final - $hora_inicial) % 3600) / 60;
$total_hora = sprintf ('%02d:%02d', $nHoras, $nMinutos);
return $total_hora;
}
// calculo de adição de 2 horarios
function soma_hora($hora_um,$hora_dois){
$tempo = array(
$hora_um,
$hora_dois,
);
$segundos = 0;
foreach ( $tempo as $time ){
list( $hora, $mim) = explode( ':', $time );
$segundos += $hora * 3600;
$segundos += $mim * 60;
}
$horas = floor( $segundos / 3600 );
$segundos -= $horas * 3600;
$minutos = floor( $segundos / 60 );
$segundos -= $minutos * 60;
$lol = $horas .':'. $minutos;
return $lol;
}
// calcula 2 datas, adiciona 8 horas de SLA em dias uteis, e  sabado e domingo não conta
function calcula_data_sla($data_v1,$data_v2){
$data_exp_v1 = explode ('/',$data_v1);
$data_exp_v2 = explode ('/',$data_v2);
$timestamp1 = mktime(0,0,0,$data_exp_v1[1],$data_exp_v1[0],$data_exp_v1[2]); 
$timestamp2 = mktime(0,0,0,$data_exp_v2[1],$data_exp_v2[0],$data_exp_v2[2]); 
$segundos_diferenca = $timestamp1 - $timestamp2; 
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
$dias_diferenca = ($dias_diferenca + 1) * -1;
$soma = 1;
$pega_semana = explode ('/',$data_v1);
$dia = $data_exp_v1[0];
$dia = $dia+1;
$tudo = 0;
while ($soma <= $dias_diferenca){		
		switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
				case 0:
				$valorq = '00:00' .' Domingo' ;
				break;
				case 1:
				$valorq = '08:00'.' Seg';
				break;
				case 2:
				$valorq = '08:00'.' ter';
				break;
				case 3:
				$valorq = '08:00'.' qua';
				break;
				case 4:
				$valorq = '08:00'.' qui';
				break;
				case 5:
				$valorq = '08:00'.' Sex';
				break;
				case 6:
				$valorq = '00:00' .' Sabado';
				//$diminuir = '-08:00';
				break;
		}
		$soma = $soma + 1;
		$dia = $dia + 1;
		$tudo = $tudo + $valorq;
}
return $tudo_dois = $tudo.':00';
}

//Calcula a diferença entre 2 datas
function diffDate($d1, $d2, $type='', $sep='-') {
	$d1 = explode($sep, $d1);
	$d2 = explode($sep, $d2);
	switch ($type){
		case 'A':
		  $X = 31536000;
		  break;
		case 'M':
		  $X = 2592000;
		  break;
		case 'D':
		  $X = 86400;
		  break;
		case 'H':
		  $X = 3600;
		  break;
		case 'MI':
		  $X = 60;
		  break;
		default:
		  $X = 1;
		}
	$date1 = mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]);
	$date2 = mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]);
	$calc_date = $date1 - $date2;
	return floor($calc_date/$X);
}

// transforma data dd/mm/aaaa
function transforme_data_dma($data_dma){
	if(empty($data_dma)){
	$data_modificada_dma = "";	
	}
else{
	$data_modificada_dma = explode('-', $data_dma);
	$data_modificada_dma = $data_modificada_dma[2].'/'.$data_modificada_dma[1].'/'.$data_modificada_dma[0];	
}
return $data_modificada_dma;
}

// transforma data aaaa/mm/dd
function transforme_data_amd($data_amd){
$data_modificada_amd = explode('/', $data_amd);
$data_modificada_amd = $data_modificada_amd[2].'-'.$data_modificada_amd[1].'-'.$data_modificada_amd[0];	
return $data_modificada_amd;
}

function is_date($dat){
$val = "erro";	
//data em formato americano
if(strlen($dat) == 10 && (strpos($dat,"-") != strrpos($dat,"-"))){
	$data = explode("-",$dat);
	// fatia a string $dat em pedados, usando / como referência
	$d     = $data[2];
	$m     = $data[1];
	$y     = $data[0];
	
	if(($d > 0 && $d< 32) && ( $m > 0 && $m < 13) && ($y > 0 && $m < 2016))
		{$val = "americano";}
	}
//data no formato brasiliero
elseif(strlen($dat) == 10 && (strpos($dat,"/") != strrpos($dat,"/"))){
	$data = explode("/",$dat);
	// fatia a string $dat em pedados, usando / como referência
	$d     = $data[0];
	$m     = $data[1];
	$y     = $data[2];
	
	if(($d > 0 && $d< 32) && ( $m > 0 && $m < 13) && ($y > 0 && $m < 2016))
		{$val = "brasileiro";}
}
	return $val;
}
?>