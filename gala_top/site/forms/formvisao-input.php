

<?php

 $atv_op="SELECT count(a.substatus_da_cotacao)as totalinput,
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
        $acao_op=mysql_query($atv_op,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $totalinput = $dado2['totalinput'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_input= $dado2['status_cip_input'];
                   
                    
 echo '<br\>';

 switch($status_cip_input){

    case 7: /*echo "quantificar: ".*/ $totaldistribuirinput= $totalinput; 
                                      
           // echo '<br\>';
            break;
    case 8: /*echo "distribuir: ".*/ $totaldistribuidoinput=  $totalinput; 
                                     
           // echo '<br\>';
            break;
    case 9: /*echo "distribuido:".*/ $totalanaliseinput=  $totalinput;
            //echo '<br\>';
            break; 
    case 10: /*echo "reprovado:".*/ $totalreprovadoinput=  $totalinput; 
                                   
            //echo '<br\>';
            break;

    case 11: /*echo "reprovado:".*/ $totalchamadoinput=  $totalinput; 
                                   
            //echo '<br\>';
            break;

    case 12: /*echo "aprovado:".*/ $totalestoqueinput=  $totalinput; 
                                 
            //echo '<br\>';
   

if(empty($totaldistribuirinput)){
  $totaldistribuirinput="0";
}
if(empty($totaldistribuidoinput)){
  $totaldistribuidoinput="0";
}
if(empty($totalanaliseinput)){
  $totalanaliseinput="0";
}
if(empty($totalreprovadoinput)){
  $totalreprovadoinput="0";
}
if(empty($totalchamadoinput)){
  $totalchamadoinput="0";
}

if(empty($totalestoqueinput)){
  $totalestoqueinput="0";
}


}

$total_geral=$totaldistribuirinput+$totaldistribuidoinput+$totalanaliseinput+$totalreprovadoinput+$totalchamadoinput+$totalestoqueinput;

}

$periodo=$data_1." ".utf8_encode("até")." ".$data_2;


?>

		<style type="text/css">
#container3, #sliders3 {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container3 {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container3').highcharts({
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
            text: '<?php echo "Input"." - ".utf8_encode("Diário")  ?>',
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
                   // format: '{point.y:.f}%',
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
                name: 'Distribuir',
                y: <?php echo $totaldistribuirinput ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuidoinput ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'An\u00e1lise input',
                y: <?php echo $totalanaliseinput ?>,
                drilldown: 'An\u00e1lise input'
            }, {
                name: 'Reprovado input',
                y: <?php echo $totalreprovadoinput ?>,
                drilldown: 'Reprovado input'
               
            }, {
                name: 'Chamado',
                y:<?php echo $totalchamadoinput ?>,
                drilldown: 'Chamado'
                
            }, {
                name: 'Estoque',
                y:<?php echo $totalestoqueinput ?>,
                drilldown: 'Estoque'
                
            }]
        }],
      
    });
});
		</script>


<div id="container3" style="min-width:100px; height:200px; margin-left: 0px;"></div>





