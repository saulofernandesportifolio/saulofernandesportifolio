

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
               WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' OR  b.dt_tratamento_analise BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."') 
               AND b.status_cip_analise IN (2,3,4,5,6) 
               GROUP BY b.disc_status_cip_analise 
                ";
        $acao_op=mysql_query($atv_op,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise'];
                   
                    
 echo '<br\>';

 switch($status_cip_analise){

    case 2: /*echo "quantificar: ".*/ $totalquantificar= $total; 
                                      
           // echo '<br\>';
            break;
    case 3: /*echo "distribuir: ".*/ $totaldistribuir= $total; 
                                     
           // echo '<br\>';
            break;
    case 4: /*echo "distribuido:".*/ $totaldistribuido= $total;
            //echo '<br\>';
            break; 
    case 5: /*echo "reprovado:".*/ $totalreprovado= $total; 
                                   
            //echo '<br\>';
            break;

    case 6: /*echo "aprovado:".*/ $totalaprovado= $total; 
                                 
            //echo '<br\>';
  

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



$total_geral=$totalquantificar+$totaldistribuir+$totaldistribuido+$totalreprovado+$totalaprovado;

}


}

$periodo=$data_1." ".utf8_encode("até")." ".$data_2;


?>

		<style type="text/css">
#container, #sliders {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container').highcharts({
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
                beta: 15,
                depth: 50,
                viewDistance: 25
            }      
                 
        },
        title: {
            text: '<?php echo utf8_encode("Análise")." - ".utf8_encode("Diário")  ?>',
           style: {
              font: '9',
              fontFamily: 'Gotham Light'
                       
                }
        },
        subtitle: {
            text: 'Periodo: <?php echo $periodo ?>',
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
                text: '<?php echo $total_geral.' '.utf8_encode("cotações"); ?>',
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
                    //format: '{point.y:.f}%',
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
           // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}%</b> do total<br/>'
        },

        series: [{
            name: 'Status',
            colorByPoint: true,
             data: [{
                name: 'Quantificar',
                y: <?php echo $totalquantificar ?>,
                drilldown: 'Quantificar'
            }, {
                name: 'Distribuir',
                y: <?php echo $totaldistribuir ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuido ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'Aprovado',
                y: <?php echo $totalaprovado ?>,
                drilldown: 'Aprovado'
               
            }, {
                name: 'Reprovado',
                y:<?php echo $totalreprovado ?>,
                drilldown: 'Reprovado'
                
            }]
        }],
      
    });
});
		</script>


<div id="container" style="min-width:300px; height:200px; margin-left: 0px;"></div>





