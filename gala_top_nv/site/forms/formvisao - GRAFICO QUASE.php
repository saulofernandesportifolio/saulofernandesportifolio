
<?php

  $tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


  $dt_dia = date("d/m/Y");
  $dt_mes = date("m/Y");
 // $dt_dia = "2016-02-01";
  //echo $dt_dia ;
 
 if(empty($data_1) && empty($data_2) ){
  $data_1=$dt_dia;  
  $data_2=$dt_dia;  
 }
 
 
  $ano=date("Y");
   $mesanterior=date("m")-1;
  $mesatual=date("m"); 
  
  if(strlen($mesanterior)==1){
    
    $mesanterior="0".$mesanterior;
  }else{
    
    $mesanterior=$mesanterior;
    
  }
  
    if(strlen($mesatual)==1){
    
    $mesatual="0".$mesatual;
  }else{
    
    $mesatual=$mesatual;
    
  }   
    
 $dt_diaanterior=$ano."-".$mesanterior."-";
 $dt_diaatual=$ano."-".$mesatual."-";


function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}




 $atv_op="SELECT * FROM tbl_cotacao a 
                        INNER JOIN tbl_analise b
                        ON a.id_cotacao=b.id_cotacao
                        WHERE (a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' )";
                        $acao_op=mysql_query($atv_op,$conecta);
            $dado= mysql_fetch_array($acao_op);
              {
            $totalgeral=mysql_num_rows($acao_op);
            
             }

    
      $atv_op="SELECT count(a.substatus_da_cotacao)as total,
               a.id_cotacao, 
               a.regional_atribuida, 
               a.carteira, 
               a.substatus_da_cotacao,
               b.status_cip_analise, 
               b.disc_status_cip_analise,
               DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
               FROM tbl_cotacao a 
               INNER JOIN tbl_analise b
               ON a.id_cotacao=b.id_cotacao
               WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' ) 
               AND b.status_cip_analise IN (2,3,4,5,6) 
               GROUP BY a.carteira,a.dt_inclusao_bd_cip2,b.disc_status_cip_analise 
               ORDER BY a.dt_inclusao_bd_cip2";
        $acao_op=mysql_query($atv_op,$conecta);
     
        
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                 echo   $status_cip_analise= $dado2['status_cip_analise']; 

echo '<br>';

switch($status_cip_analise){

    case 2: echo $totalquantificar= $total; 
                                      
            echo '<br\>';
            break;
    case 3: echo $totaldistribuir= $total; 
                                     
            echo '<br\>';
            break;
    case 4: echo $totaldistribuido= $total;
            echo '<br\>';
            break; 
    case 5: echo $totalreprovado= $total; 
                                   
            echo '<br\>';
            break;

    case 6: echo $totalaprovado= $total; 
                                 
            echo '<br\>';
   

if(empty($totalquantificar)){
  $totalquantificar="0";
}
if(empty($totaldistribuir)){
  $totaldistribuir="0";
}
if(empty($totaldistribuido)){
  $totaldistribuido="0";
}
if(empty($totalreprovado)){
  $totalreprovado="0";
}
if(empty($totalaprovado)){
  $totalaprovado="0";
}

// Dados do gráfico
$tipo = 'bvs';
$largura = 350;
$altura = 300;
$dados = array(
   'Quantificar' => $totalaprovado,
   'Distribuir'  => $totaldistribuir,
   'Distribuido' => $totaldistribuido,
   'Aprovado'    => $totalaprovado,
   'Reprovado'   =>$totalreprovado
   
);

}
}
// Gerando a URL dinamicamente
$labels = array_keys($dados);
$valores = array_values($dados);

$grafico = array(
   'cht' => $tipo,
   'chs' => $largura.'x'.$altura,
   'chd' => 't:'.implode(',', $valores),
   'chl' => implode('|', $labels)
);
$url = 'https://chart.googleapis.com/chart?'.http_build_query($grafico, '', '&amp;');

// Imprimindo o gráfico
printf('<img src="%s" width="%d" height="%d" alt="%s" />',
    $url, $largura, $altura, htmlentities('Gráfico de Exemplo', ENT_COMPAT, 'UTF-8'));



?>