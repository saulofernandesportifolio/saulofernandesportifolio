
<?php
     
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
               WHERE ( a.dt_inclusao_bd_cip2 LIKE '$dt_mes3%' OR b.dt_tratamento_analise LIKE '$dt_mes3%' ) 
               AND b.status_cip_analise IN (2,3,4,5,6) 
                GROUP BY b.status_cip_analise      
                ";
        $acao_op=mysql_query($atv_op,$conecta);
      
   
      
       

   while ($dado2= mysql_fetch_array($acao_op)) 
           {        
                    $id_cotacao=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise']; 

//echo '<br>';

 switch($status_cip_analise){

    case 2: /*echo "quantificar:".*/ $totalquantificar2= $total; 
                                      
           // echo '<br\>';
            break;
    case 3: /*echo "distribuir:".*/ $totaldistribuir2= $total; 
                                     
            //echo '<br\>';
            break;
    case 4: /* echo "distribuido:".*/ $totaldistribuido2= $total;
            echo '<br\>';
            break; 
    case 5:/* echo "reprovado:".*/ $totalreprovado2= $total; 
                                   
           // echo '<br\>';
            break;

    case 6: /*echo "aprovado:".*/ $totalaprovado2= $total; 
                                 
           echo '<br\>';
   

if(empty($totalquantificar2)){
  $totalquantificar2="0";
}
if(empty($totaldistribuir2)){
  $totaldistribuir2="0";
}
if(empty($totaldistribuido2)){
  $totaldistribuido2="0";
}
if(empty($totalreprovado2)){
  $totalreprovado2="0";
}
if(empty($totalaprovado2)){
  $totalaprovado2="0";
}


$total_geral2=$totalquantificar2+$totaldistribuir2+$totaldistribuido2+$totalreprovado2+$totalaprovado2;



}

}
//echo '<br>';
//echo "backlog";
     $atv_op2="SELECT count(a.substatus_da_cotacao)as total,
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
               WHERE ( a.dt_inclusao_bd_cip2 < '$dt_diaatual') 
               AND b.status_cip_analise IN (2,3,4) 
               GROUP BY b.status_cip_analise 
               UNION
               SELECT count(a.substatus_da_cotacao)as totalinput,
               a.id_cotacao, 
               a.regional_atribuida, 
               a.carteira, 
               a.substatus_da_cotacao,
               b.status_cip_input, 
               b.disc_status_cip_input,
               DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
               FROM tbl_cotacao a 
               INNER JOIN tbl_input b
               ON a.id_cotacao=b.id_cotacao
               WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' OR  b.dt_tratamento_input BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."') 
               AND b.status_cip_input IN (7,8,9,10,11,12) 
               GROUP BY b.disc_status_cip_input 
                ";
        $acao_op2=mysql_query($atv_op2,$conecta); 
        
   while ($dado2= mysql_fetch_array($acao_op2)) 
           {        
                    $id_cotacao=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise']; 

echo '<br>';

 switch($status_cip_analise){

    case 2: /*echo "quantificar:".*/ $totalquantificarbacklog= $total; 
                                      
            //echo '<br\>';
            break;
    case 3: /*echo "distribuir:".*/ $totaldistribuirbacklog= $total; 
                                     
            //echo '<br\>';
            break;
    case 4: /*echo "distribuido:".*/ $totaldistribuidobacklog= $total;
            //echo '<br\>';

   

if(empty($totalquantificarbacklog)){
  $totalquantificarbacklog="0";
}
if(empty($totaldistribuirbacklog)){
  $totaldistribuirbacklog="0";
}
if(empty($totaldistribuidobacklog)){
  $totaldistribuidobacklog="0";
}


$total_geralbacklog=$totalquantificarbacklog+$totaldistribuirbacklog+$totaldistribuidobacklog;



}

}        
   
if(empty($totalquantificarbacklog)){
  $totalquantificarbacklog="0";
}
if(empty($totaldistribuirbacklog)){
  $totaldistribuirbacklog="0";
}
if(empty($totaldistribuidobacklog)){
  $totaldistribuidobacklog="0";
}
if(empty($totalquantificar2)){
  $totalquantificar2="0";
}
if(empty($totaldistribuir2)){
  $totaldistribuir2="0";
}
if(empty($totaldistribuido2)){
  $totaldistribuido2="0";
}
if(empty($totalreprovado2)){
  $totalreprovado2="0";
}
if(empty($totalaprovado2)){
  $totalaprovado2="0";
}
if(empty($total_geral2)){
  $total_geral2="0";
}
if(empty($total_geralbacklog)){
  $total_geralbacklog="0";
}

$totalquantificargeral= $totalquantificarbacklog + $totalquantificar2;      
$totaldistribuirgeral= $totaldistribuirbacklog + $totaldistribuir2;
$totaldistribuidogeral= $totaldistribuidobacklog + $totaldistribuido2;
$totalreprovadogeral= $totalreprovado2;
$totalaprovadogeral=  $totalaprovado2;   






$periodo=substr($dt_mes3,0,7);

$totalgeralgeral=$total_geralbacklog+$total_geral2;

?>
 	<style type="text/css">
#container2, #sliders2 {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container2 {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container2').highcharts({
        chart: {
            type: 'column',
            style: { 
                 font: '8',
                 fontFamily: 'Gotham Light',    
                fontSize:'small'
                },
          options3d: {
                enabled: true,
                alpha: 15,
                beta: 0,
                depth: 50,
                viewDistance: 25
            }     
        },
        title: {
            text: '<?php echo utf8_encode("Análise")." - "."Consolidado" ?>',
           style: {
              font: '9',
              fontFamily: 'Gotham Light'
                       
                }
        },
        subtitle: {
            text: 'Mes: <?php echo $periodo ?>',
           style: {
              font: '8',
              fontFamily: 'Gotham Light',
              fontSize:'small'         
                }
            
        },
        xAxis: {
            type: 'category'
            
        },
        yAxis: {
            title: {
                text: '<?php echo $totalgeralgeral.' '.utf8_encode("cotações"); ?>',
                style: {
              font: '8',
              fontFamily: 'Gotham Light',
              fontSize:'larger'         
                }
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.f}%',
                style: { 
                 font: '8',
                 fontFamily: 'Gotham Light',    
                fontSize:'small'
                }   
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:8px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}%</b> do total<br/>'
        },

        series: [{
            name: 'Status',
            colorByPoint: true,
             data: [{
                name: 'Quantificar',
                y: <?php echo $totalquantificargeral ?>,
                drilldown: 'Quantificar'
            }, {
                name: 'Distribuir',
                y: <?php echo $totaldistribuirgeral ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuidogeral ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'Aprovado',
                y: <?php echo $totalaprovadogeral ?>,
                drilldown: 'Aprovado'
               
            }, {
                name: 'Reprovado',
                y:<?php echo $totalreprovadogeral ?>,
                drilldown: 'Reprovado'
                
            }]
        }],
      
    });
});
		</script>

<div id="container2" style="min-width:600px; height: 200px; margin-left: 0px;"></div>
