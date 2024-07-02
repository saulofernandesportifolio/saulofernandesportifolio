<?php

/**
 * @author saulo.ruas
 * @copyright 2016
 */



?>

<?
//CALCULANDO DIAS NORMAIS
/*Abaixo vamos calcular a diferença entre duas datas. Fazemos uma reversão da maior sobre a menor 
para não termos um resultado negativo. */
function CalculaDias($xDataInicial, $xDataFinal){
   $time1 = dataToTimestamp($xDataInicial);  
   $time2 = dataToTimestamp($xDataFinal);  

   $tMaior = $time1>$time2 ? $time1 : $time2;  
   $tMenor = $time1<$time2 ? $time1 : $time2;  

   $diff = $tMaior-$tMenor;  
   $numDias = $diff/86400; //86400 é o número de segundos que 1 dia possui  
   return $numDias;
}

//LISTA DE FERIADOS NO ANO
/*Abaixo criamos um array para registrar todos os feriados existentes durante o ano.*/
function Feriados($ano,$posicao){
   $dia = 86400;
   $datas = array();
   $datas['pascoa'] = easter_date($ano);
   $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
   $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
   $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
   $feriados = array (
      '01/01',
      '02/02', // Navegantes
      date('d/m',$datas['carnaval']),
      date('d/m',$datas['sexta_santa']),
      date('d/m',$datas['pascoa']),
      '21/04',
      '01/05',
      date('d/m',$datas['corpus_cristi']),
      '20/09', // Revolução Farroupilha \m/
      '12/10',
      '02/11',
      '15/11',
      '25/12',
   );
   
return $feriados[$posicao]."/".$ano;
}      

//FORMATA COMO TIMESTAMP
/*Esta função é bem simples, e foi criada somente para nos ajudar a formatar a data já em formato  TimeStamp facilitando nossa soma de dias para uma data qualquer.*/
function dataToTimestamp($data){
   $ano = substr($data, 6,4);
   $mes = substr($data, 3,2);
   $dia = substr($data, 0,2);
return mktime(0, 0, 0, $mes, $dia, $ano);  
} 

//SOMA 01 DIA   
function Soma1dia($data){   
   $ano = substr($data, 6,4);
   $mes = substr($data, 3,2);
   $dia = substr($data, 0,2);
return   date("d/m/Y", mktime(0, 0, 0, $mes, $dia+1, $ano));
}


//CALCULA DIAS UTEIS
/*É nesta função que faremos o calculo. Abaixo podemos ver que faremos o cálculo normal de dias ($calculoDias), após este cálculo, faremos a comparação de dia a dia, verificando se este dia é um sábado, domingo ou feriado e em qualquer destas condições iremos incrementar 1*/

function DiasUteis($yDataInicial,$yDataFinal){

   $diaFDS = 0; //dias não úteis(Sábado=6 Domingo=0)
   $calculoDias = CalculaDias($yDataInicial, $yDataFinal); //número de dias entre a data inicial e a final
   $diasUteis = 0;
   
   while($yDataInicial!=$yDataFinal){
      $diaSemana = date("w", dataToTimestamp($yDataInicial));
      if($diaSemana==0 || $diaSemana==6){
         //se SABADO OU DOMINGO, SOMA 01
         $diaFDS++;
      }else{
      //senão vemos se este dia é FERIADO
         for($i=0; $i<=12; $i++){
            if($yDataInicial==Feriados(date("Y"),$i)){
               $diaFDS++;   
            }
         }
      }
      $yDataInicial = Soma1dia($yDataInicial); //dia + 1
   }
return $calculoDias - $diaFDS;
}

?>   
  <?   
   $DataInicial = "18/10/2010";
   $DataFinal = "27/10/2010";
   
   //CHAMADA DA FUNCAO
   $diasUteis = DiasUteis($DataInicial, $DataFinal);
   $diasNormal = CalculaDias($DataInicial, $DataFinal);
   ?>
   
     <br />
      <?=$diasNormal?> dias entre <?=$DataInicial?> e <?=$DataFinal?>; <br />
      <?=$diasUteis?> dias úteis entre <?=$DataInicial?> e <?=$DataFinal?>; <br />
      
