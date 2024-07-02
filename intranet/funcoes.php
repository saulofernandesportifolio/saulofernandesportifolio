<?php

function tratar_arquivo_upload($string){
   // pegando a extensao do arquivo
   $partes 	= explode(".", $string);
   $extensao 	= $partes[count($partes)-1];	
   // somente o nome do arquivo
   $nome	= preg_replace('/\.[^.]*$/ ', '', $string);	
   // removendo simbolos, acentos etc
   $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
   $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
   $nome = strtr($nome, utf8_decode($a), $b);
   $nome = str_replace(".","-",$nome);
   $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'',$nome);
   return utf8_decode(strtolower($nome.".".$extensao));
}

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
?>

<script>

/*
<input name='nome' maxlength="5" onchange="verifica_horas(this)" onkeypress="valida_horas(this, event)"/>
*/

function valida_horas(edit, ev) {
	     li = new Array(':');
		 liE = new Array(58);
		 somenteNumero(edit,ev,li,liE);
		 if(edit.value.length == 2)     
		 edit.value += ":"; 
		 }
		 
function verifica_horas(obj) {
	     if(obj.value.length < 5)
		 obj.value = '';
		 else     
		 {
	     hr = parseInt(obj.value.substring(0,2));
		 mi = parseInt(obj.value.substring(3,5));         
		          
		 if((hr < 0 || hr > 23) || (mi < 0 || mi > 60))         
		 {             
		 obj.value = '';             
		 alert('Hora inválida');         
		 }     
		 } 
		 }		 
 <!-- Marcara para Datas 
/*
<input name='nome' type='text' readonly='readonly' onKeyUp='Formatadata(this,event)'>
*/
function Formatadata(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}

<!-- Função valida campos vazios -->

function enviardados()
{

	if (document.dados.data_1.value=="")
	{
			alert( "Preencha o campo de data" );
			document.dados.data_1.focus();
			return false;
	}

	return true;
}



////////////////////////////////////////////////////////////////////////////////////////////////////

function Formatahora(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace(":", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + ':' + vr.substr(2, 2);
				}
			}

<!-- Função valida campos vazios -->

function enviardadoshora()
{

	if (document.dados.data_1.value=="")
	{
			alert( "Preencha o campo de Hora" );
			document.dados.data_1.focus();
			return false;
	}

	return true;
}	 
		 
</script>