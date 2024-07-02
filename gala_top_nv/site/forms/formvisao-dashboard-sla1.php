

<?php

$prazod="Dentro do prazo";
$prazof="Fora do prazo";
$tipotroca="ALTA";

$atv_op="SELECT count(a.substatus_da_cotacao)as total,
               a.id_cotacao, 
               a.regional_atribuida, 
               a.carteira, 
               a.substatus_da_cotacao,
               b.status_cip_analise, 
               b.disc_status_cip_analise,
               a.PRAZO_DIAS,
               a.TIPO_COTACAO,
               a.TIPO_DE_LINHA,
               DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
               FROM tbl_cotacao a 
               INNER JOIN tbl_analise b
               ON a.id_cotacao=b.id_cotacao
               WHERE a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' 
               AND b.status_cip_analise IN (2,3,4,5,6) AND a.PRAZO_DIAS IN ('$prazod','$prazof') 
               AND a.TIPO_DE_LINHA ='".utf8_encode($tipotroca)."' 
                "; 
        $acao_op=mysql_query($atv_op,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise'];
                    $PRAZO_DIAS= $dado2['PRAZO_DIAS'];
                    
 echo '<br\>';

 switch($PRAZO_DIAS){

     case 'Fora do prazo': /*echo "aprovado:".*/ $totalreprovado= $total; 
                                 
            //echo '<br\>';
             break;
           
     case 'Dentro do prazo': /*echo "aprovado:".*/ $totalaprovado= $total; 
                                 
            //echo '<br\>';
if(empty($totalreprovado)){
  $totalreprovado="0";
}
if(empty($totalaprovado)){
  $totalaprovado="0";
}


$total_geral=$totalreprovado+$totalaprovado;

}


}

$periodo=$data_1." ".utf8_encode("até")." ".$data_2;


?>

		<style type="text/css">
#containersla1, #sliders {
    min-width: 200px; 
    max-width: 200px;
    margin: 0 auto;

}
#containersla1 {
    height: 250px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#containersla1').highcharts({
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
            text: '<?php echo utf8_encode("Altas")?>',
           style: {
              font: '8',
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
            //pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}%</b> do total<br/>'
        },

        series: [{
            name: 'Status',
            colorByPoint: true,
             data: [{
                name: 'Dentro',
                y: <?php echo $totalaprovado ?>,
                drilldown: 'Aprovado'
               
            }, {
                name: 'Fora',
                y:<?php echo $totalreprovado ?>,
                drilldown: 'Reprovado'
                
            }]
        }],
      
    });
});
		</script>


<div id="containersla1" style="min-width:170px; height:170px; margin-left: 0px;"></div>





