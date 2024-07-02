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
*Calcula a quantidade de dias úteis entre duas datas (sem contar feriados)*/

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
*Calcula a quantidade de dias úteis entre duas datas (sem contar feriados)*/

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

  switch($diasemana){
    
    case"0": $diasemana = utf8_encode("Domingo");
                 $DDTL=1;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));      
                          break;
    case"1": $diasemana = utf8_encode("Segunda-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                             break;
    case"2": $diasemana = utf8_encode("Terça-Feira");
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
    case"6": $diasemana = utf8_encode("Sábado"); 
                 $DDTL=2;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                       
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
    case"2": $diasemana2 = utf8_encode("Terça-Feira");
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
    case"6": $diasemana2 = utf8_encode("Sábado"); 
                 $DDTL2=2;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));       
                 $criterio33=''; 
                  
                                                 break;

         }

        $vencimento3=$vencimento2." ".$criterio33." ".$diasemana2;
  // echo '<br>';
   //echo '<br>';
   //echo "Vencimento: ".$vencimento2;
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
    case"2": $semanavenc = utf8_encode("Terça-Feira");
                    
                                break;
    case"3": $semanavenc = utf8_encode("Quarta-Feira"); 
                 
                                   break;
    case"4": $semanavenc = utf8_encode("Quinta-Feira");
                  
                                       break;
    case"5": $semanavenc = utf8_encode("Sexta-Feira");
                 
                    
                                           break;
    case"6": $semanavenc = utf8_encode("Sábado"); 
                  
                  
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
            '01/01', //sexta-feira  Confraternização Universal
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04', //quinta-feira Tiradentes
            '01/05', //segunda-feira  Dia do Trabalho
             date('d/m',$datas['corpus_cristi']),
            '07/09', //quarta-feira Independência do Brasil
            '20/09', //terça-feira  Verificar O 20 de Setembro. Feriado Regional
            '12/10', //quarta-feira Nossa Senhora Aparecida/Dia das Crianças
            '02/11', //quarta-feira Finados
            '15/11', //terça-feira  Proclamação da República
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
         for($ii=1; $ii<=$xSomarDias; $ii++){
            
            $xDataInicial=Soma1dia($xDataInicial); //SOMA DIA NORMAL
            
            //VERIFICANDO SE EH DIA DE TRABALHO
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

 
// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($data_inicial) - strtotime($data_final);

//Calcula a diferença em dias
$dias = floor($diferenca / (60 * 60 * 24));




return $dias;

}
  

/*$query_linhas= "SELECT * FROM tbl_cotacao
			                    WHERE id_cotacao  = '$id_cotacao'";*/


$query_linhas="SELECT b.criado_em ,a.n_da_cotacao,
                      a.cotacao_principal,
                      a.termino_efetivo,
                      b.id_cotacao,
                      b.cotacao_principal,
                      b.status, 
                      b.TIPO_SERVICO,
                      b.ALTAS,
                      b.PORTABILIDADE2,
                      b.MIGRACAO,
                      b.TROCAS,
                      b.TT,
                      b.BACKUP,
                      b.M_2_M,
                      b.FIXA,
                      b.PRE_POS,
                      b.MIGRACAO_TROCA,
                      b.total_linhas_cip
                      FROM tbl_filhas a
INNER JOIN tbl_cotacao b
ON b.cotacao_principal=a.cotacao_principal
WHERE b.id_cotacao  = b.id_cotacao and b.status IN('Pendente') AND a.termino_efetivo ='0000-00-00 00:00:00' 
ORDER BY a.criado_em  DESC LIMIT 1 ";


$consulta_servico = mysql_query($query_linhas) or die (mysql_error());
      while($linha = mysql_fetch_array($consulta_servico)){
       
               
        $sql_tipolinhas="SELECT * FROM tbl_sla ";
        $consulta_linhas = mysql_query($sql_tipolinhas) or die (mysql_error());
        $tipolinhas = mysql_fetch_array($consulta_linhas);


                    
         $soma= $linha['ALTAS']+$linha['BACKUP']+$linha['PORTABILIDADE2'];
             if($linha['ALTAS'] == $linha['total_linhas_cip']){
                  $linha['tipo_de_linha']="ALTA";
              }else
                  if( $linha['BACKUP']== $linha['total_linhas_cip']){
                     $linha['tipo_de_linha']="ALTA";
                   }else
                  if( $linha['PORTABILIDADE2']== $linha['total_linhas_cip']){
                     $linha['tipo_de_linha']="ALTA";
                   }else
                     if($soma== $linha['total_linhas_cip']){
                        $linha['tipo_de_linha']="ALTA";
                       }else
                          if($linha['TROCAS'] == $linha['total_linhas_cip']){
                            $linha['tipo_de_linha']="TROCA";                     
                           }else
                           if($linha['TT'] == $linha['total_linhas_cip']){
                            $linha['tipo_de_linha']="TT";                     
                           }else{
                              $linha['tipo_de_linha']=utf8_encode("TROCA + MIGRAÇÃO");  
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

//$data2=$calcula_datahorafutura= date("Y-m-d H:i:s");
$data2=$calcula_datahorafutura= date("Y-m-d");
//$data2=$calcula_datahorafutura= '2016-02-20';
/*echo '<br>';
echo "Existem ".dias_uteis($data1,$data2)." dias ".utf8_encode("úteis")."entre $data1 e hoje $data2"; 
$dias1=dias_uteis($data1,$data2);
echo '<br>';*/

//echo '<br>';
//echo "criado em: ".
$data1;
//echo '<br>';

//echo '<br>';
//echo "Dias prazo: ".
$DD2=$linha["dias"];
//echo '<br>';

$dias1=$DD2;



//função

//$DataInicial = "01/02/2016";
$datafiltro1=$data1;
$datafiltro=substr($datafiltro1,0,10);
$horafiltro=substr($datafiltro1,10,10);

 $diav=substr(diasemana($datafiltro),0,2);
 $mesv=substr(diasemana($datafiltro),3,2);  
 $anov=substr(diasemana($datafiltro),6,4);

 $visao2=$diav."/".$mesv."/".$anov; 

$DataInicial =$visao2;
$QtdDia = $DD2;
$diasSomados = SomaDiasUteis($DataInicial,$QtdDia);

 $diav1=substr($diasSomados,0,2);
 $mesv1=substr($diasSomados,3,2);  
 $anov1=substr($diasSomados,6,4);


$vencimento1=$anov1."/".$mesv1."/".$diav1;



  //echo '<br>';
  
//echo "Somar ".$QtdDia." dia(s) de ".utf8_encode("visão é")." inicial: ".$DataInicial.". Vencimento : ".diasemana1($vencimento1); 


//echo '<br>';

if(strlen(diferencadata($diasSomados,$data2)) == 3){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}elseif(strlen(diferencadata($diasSomados,$data2)) == 2){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}else
{
   $diasdff = diferencadata($diasSomados,$data2);  
}

//echo "A diferenca e de ".$diasdff." entre as datas";
//echo '<br>';

//echo '<hr>';



 
if($diasdff <= $linha["dias"]){
   
  $criterio= "Dentro do prazo";
 
  
}
elseif($diasdff > $linha["dias"]){
    
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

 

 $diav2=substr(substr(diasemana1($vencimento1),0,10),0,2);
 $mesv2=substr(substr(diasemana1($vencimento1),0,10),3,2);  
 $anov2=substr(substr(diasemana1($vencimento1),0,10),6,4);
$vencimento3=$anov2."-".$mesv2."-".$diav2." ".$horafiltro;



$query_linha="UPDATE tbl_cotacao a SET 
                              	a.visao_ilha  ='".$DataInicial."',
                                a.vencimento_ilha ='".$vencimento3."',
								                a.dia           ='".$linha['dias']."',
								                a.TEMPO         ='".$linha['criterio']."',
						                    a.TIPO_PROCESSO ='".$linha['tipo_processo']."',
						                    a.TIPO_DE_LINHA ='".$linha['tipo_de_linha']."',
						                    a.SLA_DIAS      ='".$diasdff."',
                                a.PRAZO_DIAS    ='".$criterio."'                              	
                                WHERE id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2 = mysql_query($query_linha) or die (mysql_error());

}


?>




</body>
</html>
