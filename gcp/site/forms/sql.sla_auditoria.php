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


/***INICIO DO BLOCO ACRESCENTA DIAS A DATA INICIAL DA VISAO TIRANDO SABADO/DOMINGO/FERIADOS E ADICIONANDO PARA FRENTE **/

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
            '01/01',
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04',
            '01/05',
            date('d/m',$datas['corpus_cristi']),
            '07/09', 
            '12/10',
            '02/11',
            '15/11',
            '25/12',
            '12/05'
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
          
            //echo '<br>';
            //VERIFICANDO SE EH DIA DE TRABALHO
            if(date("w", dataToTimestamp($xDataInicial))=="0"){
               //SE DIA FOR DOMINGO OU FERIADO, SOMA +1
               $xDataInicial=Soma1dia($xDataInicial);
               //$xDataInicial=Soma1dia($xDataInicial);

            }
            if(date("w", dataToTimestamp($xDataInicial))=="6"){
               //SE DIA FOR SABADO, SOMA +2
               $xDataInicial=Soma1dia($xDataInicial);
               $xDataInicial=Soma1dia($xDataInicial);
               //$xDataInicial=Soma1dia($xDataInicial);
               
            }
            if(date("w", dataToTimestamp($xDataInicial))=="5"){
               //SE DIA FOR SABADO, SOMA +3
                //$xDataInicial=Soma1dia($xDataInicial);
               //$xDataInicial=Soma1dia($xDataInicial);
               //$xDataInicial=Soma1dia($xDataInicial);

               /* if($xDataInicial==Feriados(date("Y"),$i)){
                     $xDataInicial=Soma1dia($xDataInicial);
                     $xDataInicial=Soma1dia($xDataInicial);
                     $xDataInicial=Soma1dia($xDataInicial);

                     

                   }  */
                 

            }else{
               //senaum vemos se este dia eh FERIADO
               for($i=0; $i<=12; $i++){
                  if($xDataInicial==Feriados(date("Y"),$i)){
                     $xDataInicial=Soma1dia($xDataInicial);
                  }

               }
            }
         }
      return $xDataInicial;
      }
/*** FINAL DO BLOCO FUNÇÃO ACRESCENTA DIAS A DATA INICIAL DA VISAO TIRANDO SABADO/DOMINGO/FERIADOS E ADICIONANDO PARA FRENTE **/


/***INICIO DO BLOCO DE FUNÇÕES PARA PEGAR DIAS UTEIS ENTRE DUAS DATAS **/

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

$calculoDias - $diaFDS;


return $calculoDias - $diaFDS;


}


$selecsla="SELECT b.id_cotacao FROM cip_nv.tbl_cotacao a 
           INNER JOIN cip_nv.tbl_auditoria b 
           ON b.id_cotacao=a.id_cotacao WHERE b.status_cip_auditoria IN (14) 
           AND b.idtbl_usuario_auditoria='{$_COOKIE['idtbl_usuario']}' ";
$acao_sla = mysql_query($selecsla,$conecta) or die (mysql_error());
while($linha_sla = mysql_fetch_assoc($acao_sla))
{
 $id_cotacao           = $linha_sla["id_cotacao"];





/***FINAL DO BLOCO DE FUNÇÕES PARA PEGAR DIAS UTEIS ENTRE DUAS DATAS **/


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
                 FROM cip_nv.tbl_cotacao a 
                     INNER JOIN cip_nv.tbl_cotacao b
                     ON a.n_da_cotacao = b.cotacao_principal 
                          WHERE a.id_cotacao='$id_cotacao' AND a.TIPO_COTACAO='Principal' GROUP BY a.id_cotacao  ";

       $consulta_servico = mysql_query($query_linhas,$conecta) or die (mysql_error());

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

        $sql_tipolinhas="SELECT * FROM cip_nv.tbl_sla WHERE tipo='".$linha['tipo_de_linha']."' ";
        $consulta_linhas = mysql_query($sql_tipolinhas,$conecta) or die (mysql_error());
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


  /*if($linha['tipo_de_linha'] == 'ALTA' && $linha['dias'] == 1){
    
    $visao2=$diav."/".$mesv."/".$anov;
  }elseif($linha['tipo_de_linha'] == 'TROCA' && $linha['dias'] == 1){
    
    $visao2=$diav."/".$mesv."/".$anov;
  }else{*/

  $visao2=$diav."/".$mesv."/".$anov;

 // }

  $visao_ilha=$anov."-".$mesv."-".$diav." ".$horafiltro;


$DataInicial = $visao2; 
$QtdDia = $linha['dias'];
$diasSomados = SomaDiasUteis($DataInicial,$QtdDia);



   //CHAMADA DA FUNCAO
   $diasUteis = DiasUteis($DataInicial,$data2);
   $diasNormal = CalculaDias($DataInicial,$data2);




if( $diasUteis > $QtdDia ){

 $criterio= "Fora do prazo";


}elseif( $diasUteis <= $QtdDia ){

    if($diasUteis < 0){

    $diasUteis=0;
  }else{

    $diasUteis=$diasUteis;
  }

 $criterio= "Dentro do prazo";

}




//tratamento data sem hora do criado em vivocorp
  $diavc=substr($diasSomados ,0,2);
  $mesvc=substr($diasSomados ,3,2);  
  $anovc=substr($diasSomados ,6,4);

   $vencimento_ilha=$anovc."-".$mesvc."-".$diavc;
   //echo '<br>';

$venci1=$diavc."/".$mesvc."/".$anovc;



$data1=$venci1;
$data2=date("d/m/Y");

$data1=explode("/",$data1);
$data2=explode("/",$data2);

$d1=strtotime("$data1[2]-$data1[1]-$data1[0]");
$d2=strtotime("$data2[2]-$data2[1]-$data2[0]");

$data_final=($d2-$d1)/86400;

if($data_final < 0){

  $data_final= $data_final * -1;
}

$data_final;


if($$data_final == 0 ){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($data_final == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($data_final  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($data_final > 2 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}
if($criterio == 'Fora do prazo' ){

  //echo "nao é igual";

  $Vence="Backlog";
}


$vencimento_ilha1=$vencimento_ilha." ".$horafiltro;

$query_linha="UPDATE cip_nv.tbl_cotacao a SET  
                                a.visao_ilha  ='".$visao_ilha."',
                                a.vencimento_ilha ='".$vencimento_ilha1."',
                                a.dia           ='".$linha['dias']."',
                                a.TEMPO         ='".$linha['criterio']."',
                                a.TIPO_PROCESSO ='".$linha['tipo_processo']."',
                                a.TIPO_DE_LINHA ='".$linha['tipo_de_linha']."',
                                a.SLA_DIAS      ='".$diasUteis."',
                                a.PRAZO_DIAS    ='".$criterio."',
                                a.VENCIMENTODIAS ='".$Vence."'                                
                                WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2 = mysql_query($query_linha,$conecta) or die (mysql_error());

}


$query1= "SELECT * FROM cip_nv.tbl_cotacao  WHERE id_cotacao  = '$id_cotacao' "; 
                                
  $acao_cota2 = mysql_query($query1,$conecta) or die (mysql_error());
    
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
                                                              

                     
       $query2="UPDATE cip_nv.tbl_cotacao a,cip_nv.tbl_cotacao b SET 
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


}


/*Seleciona o id da tabela serviço para update protocolo*/     


echo" <script> 
       document.location.replace('principal.php?&t=forms/form_fila_cotacao_auditoria.php');
      </script>
      ";                                        
    exit();


?>

      
   </body>
</html>
