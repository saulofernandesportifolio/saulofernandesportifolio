<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
</head>

<body>

<?php

$tempo = 0;

set_time_limit($tempo);


/**
*Calcula a quantidade de dias �teis entre duas datas (sem contar feriados)*/

function dias_uteis($datainicial,$datafinal=null){
  if (!isset($datainicial)) return false;
  if (!isset($datafinal)) $datafinal=time();

$segundos_datainicial = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datainicial));
$segundos_datafinal = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datafinal));
$dias = abs(floor(floor(($segundos_datafinal-$segundos_datainicial)/3600)/24 ) );
$uteis=0;
$dd=0;
$dd1=0;
$dd2=0;
for($i=1;$i <= $dias;$i++){
$diai = $segundos_datainicial+($i*3600*24);
$w = date('w',$diai);

if($w==0){

 date('d/m/Y',$diai)." e Domingo<br />";

//echo '<br>';
}elseif($w==6){
  
 
 date('d/m/Y',$diai)." e Sabado<br />";

//echo '<br>';

}else{
 date('d/m/Y',$diai)." e dia util<br />";
$uteis++;

}

}

return $uteis;

}

/**
*Calcula a quantidade de dias �teis entre duas datas (sem contar feriados)*/

function diasfinalsemana($datainicial,$datafinal=null,$diavenc,$diasprazo){
  if (!isset($datainicial)) return false;
  if (!isset($datafinal)) $datafinal=time();
  
  
 

$segundos_datainicial = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datainicial));
$segundos_datafinal = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datafinal));
//$segundos_$feriados = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$feriados));
$dias = abs(floor(floor(($segundos_datafinal-$segundos_datainicial)/3600)/24 ) );
$finalsemana=0;
$finalsemana1=0;
$finalsemana2=0;
$finalsemana3=0;

    if( $diavenc < $diasprazo){
    $contdias= $diavenc-3;
    }else
    if( $diasprazo == 1 ){
    $contdias= $diasprazo-2;
    }else{
    $contdias= $diasprazo;
    }
for($i=0;$i <= $contdias;$i++){
$diai = $segundos_datainicial+($i*3600*24);
$w = date('w',$diai);


if($w == 6 || $w == 0  ){
 $finalsemana=2;


}elseif($w == 5  ){
 $finalsemana=0;

}else{
date('d/m/Y',$diai)." uteis<br />";
 $finalsemana++;
 

 
}
 
}
$vencimento=date('Y/m/d', strtotime("+$finalsemana  days",strtotime($datafinal))); 

//echo '<br>';
return $vencimento;
//echo '<br>';
//return $finalsemana;

}


function diasemana($datafiltro){
   $ano =  substr("$datafiltro", 0, 4);
   $mes =  substr("$datafiltro", 5, -3);
   $dia =  substr("$datafiltro", 8, 9);

  $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

  switch($diasemana) {
    
    case"0": $diasemana = utf8_encode("Domingo");
                 $DDTL=1;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));      
                          break;
    case"1": $diasemana = utf8_encode("Segunda-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                             break;
    case"2": $diasemana = utf8_encode("Ter�a-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));   
                                break;
    case"3": $diasemana = utf8_encode("Quarta-Feira"); 
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro))); 
                                   break;
    case"4": $diasemana = utf8_encode("Quinta-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));  
                                       break;
    case"5": $diasemana = utf8_encode("Sexta-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                  
                                           break;
    case"6": $diasemana = utf8_encode("S�bado"); 
                 $DDTL=2;
                 $visao= date('d/m/Y', strtotime("-$DDTL  days",strtotime($datafiltro)));
                       
                                                 break;
  }
   
      
   
    //echo '<br>';
    //echo "visao:".$visao;
    //echo '<br>';
    return $visao;
    
 
}

function diasemana1($vencimento){
   $ano =  substr("$vencimento", 0, 4);
   $mes =  substr("$vencimento", 5, -3);
   $dia =  substr("$vencimento", 8, 9);

  $diasemana2 = date("w", mktime(0,0,0,$mes,$dia,$ano) );


  switch($diasemana2) {
     
       
       
    case"0": $diasemana2 = utf8_encode("Domingo");
                 $DDTL2=1;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';      
                          break;
    case"1": $diasemana2 = utf8_encode("Segunda-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';
                             break;
    case"2": $diasemana2 = utf8_encode("Ter�a-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';   
                                break;
    case"3": $diasemana2 = utf8_encode("Quarta-Feira"); 
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33=''; 
                                   break;
    case"4": $diasemana2 = utf8_encode("Quinta-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';  
                                       break;
    case"5": $diasemana2 = utf8_encode("Sexta-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("-$DDTL2  days",strtotime($vencimento)));
                 $criterio33="Dentro do prazo"; 
                    
                                           break;
    case"6": $diasemana2 = utf8_encode("S�bado"); 
                 $DDTL2=2;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));       
                 $criterio33=''; 
                  
                                                 break;

         }

        $vencimento3=$vencimento2." ".$criterio33." ".$diasemana2;
   //echo '<br>';
   //echo '<br>';
  // echo "Vencimento: ".$vencimento2;
   //echo '<br>';
  
  return $vencimento3;  
   }




function diasemana1venc($semanavenc){
   $ano =  substr("$semanavenc", 6,4);
   $mes =  substr("$semanavenc", 3, 2);
   $dia =  substr("$semanavenc", 0, 2);

  $semanavenc = date("w", mktime(0,0,0,$mes,$dia,$ano) );


  switch($semanavenc) {
     
       
       
    case"0": $semanavenc = utf8_encode("Domingo");
                     
                          break;
    case"1": $semanavenc = utf8_encode("Segunda-Feira");
                
                             break;
    case"2": $semanavenc = utf8_encode("Ter�a-Feira");
                    
                                break;
    case"3": $semanavenc = utf8_encode("Quarta-Feira"); 
                 
                                   break;
    case"4": $semanavenc = utf8_encode("Quinta-Feira");
                  
                                       break;
    case"5": $semanavenc = utf8_encode("Sexta-Feira");
                 
                    
                                           break;
    case"6": $semanavenc = utf8_encode("S�bado"); 
                  
                  
                                                 break;

         }


  return $semanavenc;  
   }


//CALCULANDO DIAS NORMAIS
      //LISTA DE FERIADOS NO ANO
      function Feriados($ano,$posicao){
         $dia = 86400;
         $datas = array();
         $datas['pascoa'] = easter_date($ano);
         $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
         $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
         $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
                           
         $feriados = array (
            '01/01', //sexta-feira  Confraterniza��o Universal
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04', //quinta-feira Tiradentes
            '01/05', //segunda-feira  Dia do Trabalho
             date('d/m',$datas['corpus_cristi']),
            '07/09', //quarta-feira Independ�ncia do Brasil
            '20/09', //ter�a-feira  Verificar O 20 de Setembro. Feriado Regional
            '12/10', //quarta-feira Nossa Senhora Aparecida/Dia das Crian�as
            '02/11', //quarta-feira Finados
            '15/11', //ter�a-feira  Proclama��o da Rep�blica
            '25/12', //natal           
         );                    
        
      return $feriados[$posicao]."/".$ano;
      }      

      //FORMATA COMO TIMESTAMP
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
      
      function SomaDiasUteis($xDataInicial,$xSomarDias){
         for($ii=0; $ii<=$xSomarDias; $ii++){
            
            $xDataInicial=Soma1dia($xDataInicial); //SOMA DIA NORMAL
            
            //VERIFICANDO SE E DIA DE TRABALHO
            if(date("w", dataToTimestamp($xDataInicial))=="0"){
               //SE DIA FOR DOMINGO OU FERIADO, SOMA +1
               $xDataInicial=Soma1dia($xDataInicial);
              
            }else if(date("w", dataToTimestamp($xDataInicial))=="6"){
               //SE DIA FOR SABADO, SOMA +2
               $xDataInicial=Soma1dia($xDataInicial);
               $xDataInicial=Soma1dia($xDataInicial);
              
            }else{
               //senaum vemos se este dia eh FERIADO
               for($i=0; $i<=12; $i++){
                  if($xDataInicial == Feriados(date("Y"),$i)){
                     $xDataInicial=Soma1dia($xDataInicial);
                    
                  }
               }
            }
         }
      return $xDataInicial;
      }

function diferencadata($YSomarDias,$Ydata2){
 $diav2=substr($YSomarDias,0,2);
 $mesv2=substr($YSomarDias,3,2);  
 $anov2=substr($YSomarDias,6,4);

 $diasSomados2 =$anov2."/".$mesv2."/".$diav2; 
 $data_inicial =$diasSomados2;
 $data_final =$Ydata2;

// Calcula a diferen�a em segundos entre as datas
$diferenca = strtotime($data_inicial) - strtotime($data_final);

//Calcula a diferen�a em dias
$dias = floor($diferenca / (60 * 60 * 24));



return $dias;

}  

/*********fim fun��es sla******/

function diferencadata2($data_inicial,$data_final){
 //$diav2=substr($YSomarDias,0,2);
 //$mesv2=substr($YSomarDias,3,2);  
 //$anov2=substr($YSomarDias,6,4);

// Usa a função strtotime() e pega o timestamp das duas datas:
$time_inicial = strtotime($data_inicial);
$time_final = strtotime($data_final);
// Calcula a diferença de segundos entre as duas datas:
$diferenca = $time_final - $time_inicial; // 19522800 segundos
// Calcula a diferença de dias
$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
// Exibe uma mensagem de resultado:
//echo "A diferença entre as datas ".$data_inicial." e ".$data_final." é de <strong>".$dias."</strong> dias";
// A diferença entre as datas 23/03/2009 e 04/11/2009 é de 225 dias

return $dias;

}




//contagem sla
   //include("site/forms/formdistribuir_cotacao_analise2.php");

//foreach($_POST["ling"] as $id_cotacao => $id_cotacao)
//{

/*echo '<br>';
echo '<br>';
echo '<br>';  
echo $id_cotacao;*/

 $query_linhas= "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO
                 FROM tbl_cotacao a 
                     INNER JOIN tbl_cotacao b
                     ON a.n_da_cotacao = b.cotacao_principal 
                          WHERE a.id_cotacao ='$id_cotacao' and a.TIPO_COTACAO='Principal' GROUP BY a.id_cotacao  ";

$consulta_servico = mysql_query($query_linhas) or die (mysql_error());



      while($linha = mysql_fetch_array($consulta_servico)){
       
                           
         $ALTAS= $linha['ALTAS']+$linha['BACKUP']+$linha['PORTABILIDADE2']+$linha['M_2_M']+$linha['FIXA'];

         $TROCAS=$linha['TROCAS'];

         $TT=$linha['TT']+$linha['PRE_POS'];

         $MIGACAO= $linha["MIGRACAO_TROCA"]+$linha["MIGRACAO"];


             
             if($ALTAS != 0 && $TROCAS == 0 && $TT == 0 && $MIGACAO == 0 ){
                  $linha['tipo_de_linha']="ALTA";
                  $linha['total_linhas_cip']=$ALTAS;

                

              }else
                  if($TROCAS != 0 && $TT == 0 && $MIGACAO == 0){
                     $linha['tipo_de_linha']="TROCA"; 
                     $linha['total_linhas_cip']= $TROCAS;  

                   

                    }else
                        if($TT != 0 && $MIGACAO == 0){
                            $linha['tipo_de_linha']="TT";
                            $linha['total_linhas_cip']= $TT;    

                         

                           }else
                           if($MIGACAO != 0){
                             $linha['tipo_de_linha']="TROCA + MIGRAÇÃO";
                             $linha['total_linhas_cip']=$MIGACAO; 
                             
                            


                           }

                                
         /* inicio bloco altapura*/   

        $sql_tipolinhas="SELECT * FROM tbl_sla WHERE tipo='".$linha['tipo_de_linha']."' ";
        $consulta_linhas = mysql_query($sql_tipolinhas) or die (mysql_error());
        while($tipolinhas = mysql_fetch_array($consulta_linhas)){  
         
           if($linha['tipo_de_linha'] == $tipolinhas['tipo'] and $linha['total_linhas_cip'] >= $tipolinhas['linhas'] and $linha['tipo_de_linha'] == $tipolinhas['tipo'] and $linha['total_linhas_cip'] <= $tipolinhas['linhas2']){
            $linha['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha['dias']=$tipolinhas['sla_total'];
           

           }else

            if($linha['tipo_de_linha'] == $tipolinhas['tipo'] and $linha['total_linhas_cip'] >= $tipolinhas['linhas'] and $tipolinhas['linhas2'] == 0){
            $linha['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha['dias']=$tipolinhas['sla_total'];


            } 

        }    
          /* fimbloco altapura*/  
           
      
 $data1=$linha['criado_em'];

$datafiltro1=$data1;
$datauteis=substr($datafiltro1,0,10);

$data2=$calcula_datahorafutura= date("Y-m-d");
//$data2=$calcula_datahorafutura= date("Y-m-d");
//$data2=$calcula_datahorafutura= '2016-04-04';
/*echo '<br>';
echo "Existem ".dias_uteis($datauteis,$data2)." dias ".utf8_encode("�teis")."entre $data1 e hoje $data2";*/
$dias1=dias_uteis($datauteis,$data2);
//echo '<br>';

//echo '<br>';
/*echo "criado em: ".*/$data1;
//echo '<br>';

//echo '<br>';
/*echo "Dias prazo: ".*/$DD2=$linha["dias"];
//echo '<br>';
$dias2=$DD2;
//fun��o

//$DataInicial = "01/02/2016";
$datafiltro1=$data1;
$datafiltro=substr($datafiltro1,0,10);
$horafiltro=substr($datafiltro1,10,10);

 $diav=substr(diasemana($datafiltro),0,2);
 $mesv=substr(diasemana($datafiltro),3,2);  
 $anov=substr(diasemana($datafiltro),6,4);

 $visao2=$diav."/".$mesv."/".$anov; 

 $visaoteste=$anov."-".$mesv."-".$diav; 

$DataInicial =$visao2;
$QtdDia = $DD2;
$diasSomados = SomaDiasUteis($DataInicial,$QtdDia);

 $diav1=substr($diasSomados,0,2);
 $mesv1=substr($diasSomados,3,2);  
 $anov1=substr($diasSomados,6,4);


$vencimento1=$anov1."/".$mesv1."/".$diav1;



/*echo '<br>';
  
echo "Somar ".$QtdDia." dia(s) de ".utf8_encode("vis�o �")." inicial: ".$DataInicial.". Vencimento : ".diasemana1($vencimento1); 


echo '<br>';*/



if(strlen(diferencadata($diasSomados,$data2)) == 3){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}elseif(strlen(diferencadata($diasSomados,$data2)) == 2){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}else
{
   $diasdff = diferencadata($diasSomados,$data2);  
}

/*echo "A diferenca e de ".$diasdff." entre as datas";
echo '<br>';

echo '<hr>';*/

$diasteste=$diasdff-$dias1;


if(strlen($diasteste) == 3){
    $diasteste = substr($diasteste,1,2);
}elseif(strlen($diasteste) == 2){
    $diasteste = substr($diasteste,1,2);
}else
{
   $diasteste = $diasteste;  
}


 
if($dias1 <= $linha["dias"]){
   
  $criterio= "Dentro do prazo";
 
  
}
elseif($dias1 > $linha["dias"]){
    
   if(!empty($prazo2)) {   
  $criterio= "Dentro do prazo";
  }
 $criterio= "Fora do prazo";
 
}

/* fim calculo de sla */

 $diav1=substr($DataInicial,0,2);
 $mesv1=substr($DataInicial,3,2);  
 $anov1=substr($DataInicial,6,4);
 $DataInicial= $anov1."-".$mesv1."-".$diav1." ".$horafiltro;

 $DataInicial2= $anov1."-".$mesv1."-".$diav1;

 $diav2=substr(substr(diasemana1($vencimento1),0,10),0,2);
 $mesv2=substr(substr(diasemana1($vencimento1),0,10),3,2);  
 $anov2=substr(substr(diasemana1($vencimento1),0,10),6,4);
 
 
 
 
 $vencimento3=$anov2."-".$mesv2."-".$diav2." ".$horafiltro;
//echo '<br>';

     $diav3=substr(($vencimento3),0,2);
     $mesv3=substr(($vencimento3),3,2);
     $anov3=substr(($vencimento3),6,4);  

//echo '<br>';
$diasemana_teste1 = date("w", mktime(0,0,0, $mesv1,$diav1,$anov1));
echo '<br>';

//echo '<br>';
$diasemana_teste = date("w", mktime(0,0,0, $mesv2,$diav2,$anov2));
//echo '<br>';


 
if($diasemana_teste >= 0 && $diasemana_teste <=6 ){

if($diasemana_teste1 == 4 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
 $diav2=$diav2-3;
//echo '<br>';
}else
if($diasemana_teste1 == 5 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
$diav2=$diav2-4;
//echo '<br>';
}else
if($diasemana_teste1 == 6 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
 $diav2=$diav2-5;
//echo '<br>';
}else
if($diasemana_teste1 == 0 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
 $diav2=$diav2-6;
//echo '<br>';
}elseif($diasemana_teste1 == 2 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
 $diav2=$diav2-3;
//echo '<br>';
}elseif($diasemana_teste1 == 3 && $diasemana_teste == 1){
//echo "vencimento sexta-feira";
//echo '<br>';
 $diav2=$diav2-3;
//echo '<br>';
}elseif($diasemana_teste == 5){
//echo "sexta-feira";
//echo '<br>';
 $diav2=$diav2-1;
//echo '<br>';
}elseif($diasemana_teste == 6){
//echo "sábado";
//echo '<br>';
 $diav2=$diav2+2;
//echo '<br>';
}elseif($diasemana_teste == 0){
//echo "Domingo";
//echo '<br>';
 $diav2=$diav2+1;
//echo '<br>';

}elseif($diasemana_teste == 1){
//echo "Segunda";
//echo '<br>';
 $diav2=$diav2-1;
//echo '<br>';

}elseif($diasemana_teste == 2 
|| $diasemana_teste == 3 
|| $diasemana_teste == 4 ){
//echo "Segunda a Quinta";
//echo '<br>';
 $diav2=$diav2-1;
//echo '<br>';
}

//echo '<br>';
//$diav2=$diav2-01;

 if(strlen($diav2)==1){
 //echo '<br>';
  $diav2="0".$diav2;
 //echo '<br>';
 }

 $vencimento=$anov2."-".$mesv2."-".$diav2." ".$horafiltro;

}


if($visaoteste == $data2){
  $dias1=0;

//echo "sim";

}




$dia=date("Y-m-d");

 
if(strlen(diferencadata2($vencimento_ilha2,$dia)) == 3){
   $diasdff2 = substr(diferencadata2($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata2($vencimento_ilha2,$dia)) == 2){
   $diasdff2 = substr(diferencadata2($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata2($vencimento_ilha2,$dia)) == 1)
{
    $diasdff2 = diferencadata2($vencimento_ilha2,$dia);  
}


//echo  $diasdff2;
//echo '<br>';


if($diasdff2 == 0){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($diasdff2  == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($diasdff2  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($diasdff2  >= 3 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}



$query_linha="UPDATE tbl_cotacao a SET  
                              	a.visao_ilha  ='".$DataInicial."',
                                a.vencimento_ilha ='".$vencimento."',
								a.dia           ='".$linha['dias']."',
								a.TEMPO         ='".$linha['criterio']."',
						        a.TIPO_PROCESSO ='".$linha['tipo_processo']."',
						        a.TIPO_DE_LINHA ='".$linha['tipo_de_linha']."',
						        a.SLA_DIAS      ='".$dias1."',
                                a.PRAZO_DIAS    ='".$criterio."',
                                a.VENCIMENTODIAS ='".$Vence."'                              	
                                WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2 = mysql_query($query_linha) or die (mysql_error());

}


 $query1= "SELECT * FROM tbl_cotacao  WHERE id_cotacao  = '$id_cotacao' "; 
                                
  $acao_cota2 = mysql_query($query1) or die (mysql_error());
    
    while($linha_query1 = mysql_fetch_assoc($acao_cota2))
    {
        $id_cotacao2   = $linha_query1["id_cotacao"];
        $cotacao_principal  = $linha_query1["cotacao_principal"];
        $revisao              = $linha_query1["REVISAO_PRINCIPAL"];
		$ALTAS                = $linha_query1['ALTAS'];
        $PORTABILIDADE        = $linha_query1['PORTABILIDADE2'];
        $MIGRACAO             = $linha_query1['MIGRACAO'];
        $TROCAS               = $linha_query1['TROCAS'];
        $TT                   = $linha_query1['TT'];
        $BACKUP               = $linha_query1['BACKUP'];
        $M_2_M                = $linha_query1['M_2_M'];
        $FIXA                 = $linha_query1['FIXA'];
        $PRE_POS              = $linha_query1["PRE_POS"]; 
        $MIGRACAO_TROCA       = $linha_query1["MIGRACAO_TROCA"];
        $visao_lha            = $linha_query1["visao_ilha"];
        $dia                  = $linha_query1["dia"];
        $vencimento_ilha      = $linha_query1["vencimento_ilha"];
        $TEMPO                = $linha_query1["TEMPO"]; 
        $TIPO_PROCESSO        = $linha_query1["TIPO_PROCESSO"];
        $TIPO_DE_LINHA        = $linha_query1["TIPO_DE_LINHA"]; 
        $SLA_DIAS             = $linha_query1["SLA_DIAS"];
        $PRAZO_DIAS           = $linha_query1["PRAZO_DIAS"];
        $total_linhas_cip     = $linha_query1["total_linhas_cip"];
        $TIPO_COTACAO         = $linha_query1["TIPO_COTACAO"];
                                                              

  /*if($TIPO_COTACAO  == 'Principal'){                          
   $query2="UPDATE tbl_cotacao a SET 
                         a.ALTAS          ='$ALTAS',
                         a.PORTABILIDADE2 ='$PORTABILIDADE',
                         a.MIGRACAO       ='$MIGRACAO',
                         a.TROCAS         ='$TROCAS',
                         a.TT             ='$TT',
                         a.BACKUP         ='$BACKUP',
                         a.M_2_M          ='$M_2_M',
                         a.FIXA           ='$FIXA',
                         a.PRE_POS        ='$PRE_POS', 
                         a.MIGRACAO_TROCA ='$MIGRACAO_TROCA',
                         a.total_linhas_cip ='$total_linhas_cip',
                         a.visao_ilha      ='$visao_lha',
                         a.vencimento_ilha ='$vencimento_ilha',
                         a.dia             ='$dia',
                         a.TEMPO           ='$TEMPO',
                         a.TIPO_PROCESSO   ='$TIPO_PROCESSO',
                         a.TIPO_DE_LINHA   ='$TIPO_DE_LINHA',
                         a.SLA_DIAS        ='$SLA_DIAS',
                         a.PRAZO_DIAS      ='$PRAZO_DIAS'              
          WHERE a.cotacao_principal  = '$cotacao_principal' and a.REVISAO_PRINCIPAL='$revisao' ";

          $result3= mysql_query($query2,$conecta);


        }else{ */                         
         $query2="UPDATE tbl_cotacao a,tbl_cotacao b SET 
                         a.ALTAS          ='$ALTAS',
                         a.PORTABILIDADE2 ='$PORTABILIDADE',
                         a.MIGRACAO       ='$MIGRACAO',
                         a.TROCAS         ='$TROCAS',
                         a.TT             ='$TT',
                         a.BACKUP         ='$BACKUP',
                         a.M_2_M          ='$M_2_M',
                         a.FIXA           ='$FIXA',
                         a.PRE_POS        ='$PRE_POS', 
                         a.MIGRACAO_TROCA ='$MIGRACAO_TROCA',
                         a.total_linhas_cip ='$total_linhas_cip',
                         a.visao_ilha      ='$visao_lha',
                         a.vencimento_ilha ='$vencimento_ilha',
                         a.dia             ='$dia',
                         a.TEMPO           ='$TEMPO',
                         a.TIPO_PROCESSO   ='$TIPO_PROCESSO',
                         a.TIPO_DE_LINHA   ='$TIPO_DE_LINHA',
                         a.SLA_DIAS        ='$SLA_DIAS',
                         a.PRAZO_DIAS      ='$PRAZO_DIAS'              
          WHERE a.cotacao_principal  = '$cotacao_principal' and a.revisao=b.revisao  AND a.TIPO_COTACAO='Complementar' and b.id_cotacao='$id_cotacao' ";

          $result3= mysql_query($query2,$conecta);


        //}



}


?>




</body>
</html>
