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
      '07/09',
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


//CALCULA DIAS UTEIS data inicial
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
      $yDataInicial = Soma1dia($yDataInicial); //dia + 1.

   }
return $calculoDias - $diaFDS;
}



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
                          WHERE a.id_cotacao='$id_cotacao' AND a.TIPO_COTACAO='Principal' GROUP BY a.id_cotacao  ";

       $consulta_servico = mysql_query($query_linhas) or die (mysql_error());

       $num=mysql_num_rows( $consulta_servico);

      while($linha = mysql_fetch_array($consulta_servico)){
        
       //$linha = mysql_fetch_array($consulta_servico);


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
         
        /*echo '<br>';
        echo "linhas cip";
        echo  $linha['tipo_de_linha']." = ".$linha['total_linhas_cip'];
        echo '<br>';


        echo '<br>';
        echo "linhas sla";
        echo  $tipolinhas['tipo']." = ".$tipolinhas['linhas']."=".$tipolinhas['linhas2'];
        echo '<br>';*/
      
           if($linha['tipo_de_linha'] == $tipolinhas['tipo'] 
            and $linha['total_linhas_cip'] >= $tipolinhas['linhas'] 
              and $linha['total_linhas_cip'] <= $tipolinhas['linhas2']){
            $linha['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha['dias']=$tipolinhas['sla_total'];


       
            }else

            if($linha['tipo_de_linha'] == $tipolinhas['tipo'] && $linha['total_linhas_cip'] >= $tipolinhas['linhas'] && $tipolinhas['linhas2'] == 0){
            $linha['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha['dias']=$tipolinhas['sla_total'];
           
            }

  

    
     }/* fimbloco alta pura*/  
 

//data criado em vivocorp          
$datauteis=substr($linha['criado_em'],0,10);
//$datauteis='2016-08-22';

//data para calculo dias corridos
$data2=$calcula_datahorafutura= date("d/m/Y");

 //echo '<br>';
//tratamento data sem hora do criado em vivocorp
  $diav=substr($datauteis,8,2);
  $mesv=substr($datauteis,5,2);  
  $anov=substr($datauteis,0,4);

 
 //tratamento para pegar horario vivocorp  
  $datahora=$linha['criado_em'];
  $horafiltro=substr($datahora,10,10);



  //visao ilha para cip
  $visao2=$diav."/".$mesv."/".$anov;

  $visao_ilha=$anov."-".$mesv."-".$diav." ".$horafiltro;
/*
  //variavel para função dias uteis e dias corridos mais primeiro vencimento
  echo "data inicial: ".*/$DataInicial =$visao2;
/*  echo '<br>';


echo '<br>';
//dias prazo sla para tratamento
echo "Dias prazo de sla: ".*/$diaprazo=$linha['dias'];
$d=$linha['dias'];
$dd="P".$d."D";

//echo '<br>';
//vencimento(d/m/y) primeiro vencimento
$data = $DataInicial;

//echo '<br>';
//função para adicionar dias para primeiro vencimento 
$data = DateTime::createFromFormat('d/m/Y',$data);
$data->add(new DateInterval($dd)); // 2 diasqtd dias corridos: 
$datateste=$data->format('d/m/Y');

//tratamento preimeiro vencimento
  $diavi=substr($datateste,0,2);
  $mesvi=substr($datateste,3,2);  
  $anovi=substr($datateste,6,4);

/*echo '<br>';  
//primeiro vencimento pronto para validar 
echo "visao_venc1:".*/$visao_venc=$diavi."/".$mesvi."/".$anovi;

/*
     
//variavel para função dias uteis e dias corridos data final
  echo "data final: ".*/$DataFinal =  $visao_venc;
 /* echo '<br>';
  
 //CHAMADA DA FUNCAO dias uteis
 echo "qtd dias uteis: ".*/$diasUteis = DiasUteis($DataInicial, $DataFinal);


/* echo '<br>';
//CHAMADA DA FUNCAO dias corridos ate vencimento
 echo "qtd  dias corridos: ".*/$diasNormal = CalculaDias($DataInicial, $DataFinal);

/* echo '<br>';
 //pegar o dia da semana para ver se é sabado ou domingo
echo " semana: ".*/$diaSemanafiltro = date("w", dataToTimestamp($DataFinal));
if($diasUteis == $diasNormal){
   $diaafrente=0;

}elseif($diaSemanafiltro == 5 || $diaSemanafiltro == 1){
   $diaafrente=-1;

}else{

   $diaafrente=0;
}
/*echo '<br>';  
//calculo da diferença dias corrido menos dias uteis
echo "difença entre dias normais e uteis: ".*/$ddvenc=$diasNormal-$diasUteis+($diaafrente);

//resultado para somar ao vencimento data final
$ddvenc="P".$ddvenc."D";

$data = $DataFinal;

//echo '<br>';

//função para acrecimo dias no vencimento
$data = DateTime::createFromFormat('d/m/Y',$data);
$data->add(new DateInterval($ddvenc)); // diasqtd dias corridos: 
$datateste1=$data->format('d/m/Y');
//tratamento data vencimento.
  $diavi1=substr($datateste1,0,2);
  $mesvi1=substr($datateste1,3,2);  
  $anovi1=substr($datateste1,6,4);

/*echo '<br>';  

//vencimento ilha para tratamento da verificação sabado domingo

echo "vencimento_ilha: ".*/$Venc=$diavi1."/".$mesvi1."/".$anovi1;

/*echo '<br>'; 

//pegar o dia da semana para ver se é sabado ou domingo
echo " semana: ".*/$diaSemana2 = date("w", dataToTimestamp($Venc));

//se for sabado ou domingo executa a validação
if($diaSemana2 == 6 || $diaSemana2 == 0 || $diaSemana2 == 5){


if($diaSemana2 == 6 ){
    $d=2;
  }elseif($diaSemana2 == 0 ){
    
    $d=1;

  }elseif($diaSemana2 == 5 ){
    
    $d=0;

  }
//resultado conforme dia para pular o sabado ou domingo
$ddvc2="P".$d."D";


//data recebe vencimento para pular o sabado ou domingo
$data =$Venc;



//echo '<br>';
//função adiciona sabado ou domingo 
$data = DateTime::createFromFormat('d/m/Y',$data);
$data->add(new DateInterval($ddvc2)); // diasqtd dias corridos: 
$datateste2=$data->format('d/m/Y');

//tratamento data
  $diavi2=substr($datateste2,0,2);
  $mesvi2=substr($datateste2,3,2);  
  $anovi2=substr($datateste2,6,4);


 /* echo '<br>';

//vencimento pulando sabado ou domingo  

echo "vencimento_ilha: ".*/$vencimento_ilha=$anovi2."-".$mesvi2."-".$diavi2." ".$horafiltro;

$Venc13=$diavi2."/".$mesvi2."/".$anovi2;
}else{

/*  echo '<br>';
// vencimento seguindo curso normal sem sabado ou domingo
echo "vencimento_ilha: ".*/$vencimento_ilha=$anovi1."-".$mesvi1."-".$diavi1." ".$horafiltro;
$Venc13=$diavi1."/".$mesvi1."/".$anovi1;

}

/*echo '<br>';
echo "dias novoc: ".*/$dias1=DiasUteis($Venc13,$data2);

//echo '<br>';
if( $dias1 > $diaprazo ){

 $criterio= "Fora do prazo";


}elseif( $dias1 <= $diaprazo ){

    if($dias1 < 0){

    $dias1=0;
  }else{

    $dias=$dias1;
  }

 $criterio= "Dentro do prazo";

}



if($dias1 == 0){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($dias1  == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($dias1  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($dias1  >= 3 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}



$query_linha="UPDATE tbl_cotacao a SET  
                                a.visao_ilha  ='".$visao_ilha."',
                                a.vencimento_ilha ='".$vencimento_ilha."',
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



}  


?>

 </body>
</html>
