<?php
### coded by nobody - www.zorzo.hpg.com.br

// arquivo de feriados
//$feriados = file('feriado.txt');

$feriados = array('01/01',
                  '09/02',
                  '25/03',
                  '21/04',
                  '26/05',
                  '07/09',
                  '20/09',
                  '12/10',
                  '02/11',
                  '15/11',
                  '25/12');

$data='29/02/2016';
// conversão p/ padrão brasileiro dd/mm/aaaa
$data=explode("/","$data");
$d=$data[0];
$m=$data[1];
$y=$data[2];

// verifica se a data é válida!
$res=checkdate($m,$d,$y);
$days_working = 0;
if ($res==1){
   // quantos dias tem o mês
   $days_month = date ("t", mktime (0,0,0,$m,$d,$y));

   // numero de dias úteis no mês
   for ($day = 01; $day <= $days_month; $day++){
       $diames = $day.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0) && (date("w", mktime (0,0,0,$m,$day,$y)) != 6)) {
                   $days_working = $days_working - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$day,$y)) != 0) && (date("w", mktime (0,0,0,$m,$day,$y)) != 6)) {
             $days_working++;
       }
   }
   echo 'Dias úteis no mês: '.$days_working."<br>\n";

   // numero de dias úteis até a data informada
   for ($days = 01; $days <= $d; $days++){
       $diames = $days.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
                   $days_working_prev_date = $days_working_prev_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$days,$y)) != 0) && (date("w", mktime (0,0,0,$m,$days,$y)) != 6)) {
           $days_working_prev_date++;
       }
   }
   echo 'Dias até a data: '.$days_working_prev_date."<br>\n";

   // numero de dias úteis depois da data informada
   for ($daysm = $d; $daysm <= $days_month; $daysm++){
       $diames = $daysm.'/'.$m;
       for ($dia = 1; $dia <= count($feriados); $dia++){
           if (eregi($diames,$feriados[$dia])){
               if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
                   $days_working_next_date = $days_working_next_date - 1;
               }
           }
       }
       if ((date("w", mktime (0,0,0,$m,$daysm,$y)) != 0) && (date("w", mktime (0,0,0,$m,$daysm,$y)) != 6)) {
           $days_working_next_date++;
       }
   }
   echo 'Dias depois da data: '.$days_working_next_date."<br>\n";

} else {
   echo "Data informada não é válida!!!";
}

?>
