
<?php

 $atv_op="SELECT count(a.substatus_da_cotacao)as totalauditoria,
               a.id_cotacao, 
               a.regional_atribuida, 
               a.carteira, 
               a.substatus_da_cotacao,
               b.status_cip_auditoria, 
               b.disc_status_cip_auditoria,
               DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
               FROM tbl_cotacao a 
               INNER JOIN tbl_auditoria b
               ON a.id_cotacao=b.id_cotacao
               WHERE ( a.dt_inclusao_bd_cip2 BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."' OR  b.dt_tratamento_auditoria BETWEEN '".arrumadata($data_1)."' AND '".arrumadata($data_2)."') 
               AND b.status_cip_auditoria IN (13,14,15,16,17,18,19) 
               GROUP BY b.disc_status_cip_auditoria 
                ";
        $acao_op=mysql_query($atv_op,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $totalauditoria = $dado2['totalauditoria'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_auditoria= $dado2['status_cip_auditoria'];
                    
 echo '<br\>';

 switch($status_cip_auditoria){

    case 13: /*echo "quantificar: ".*/ $totaldistribuirauditoria= $totalauditoria; 
                                      
           // echo '<br\>';
            break;
    case 14: /*echo "distribuir: ".*/ $totaldistribuidoauditoria=  $totalauditoria; 
                                     
           // echo '<br\>';
            break;
    case 15: /*echo "distribuido:".*/ $totalanaliseauditoria=  $totalauditoria;
            //echo '<br\>';
            break; 
    case 16: /*echo "reprovado:".*/ $totalreprovadoauditoria=  $totalauditoria; 
                                   
            //echo '<br\>';
            break;

    case 17: /*echo "reprovado:".*/ $totalchamadoauditoria= $totalauditoria; 
                                   
            //echo '<br\>';
            break;
            
      case 19: /*echo "reprovado:".*/ $totalagestoqueauditoria= $totalauditoria; 
                                   
            //echo '<br\>';
            break;        

    case 18: /*echo "aprovado:".*/ $totalcorrecaoauditoria= $totalauditoria; 
                                 
            //echo '<br\>';
        // break;

    //case 19: /*echo "aprovado:".*/ $totalestoqueauditoria= $totalauditoria; 
                                 
            //echo '<br\>';

if(empty($totaldistribuirauditoria)){
  $totaldistribuirauditoria="0";
}
if(empty($totaldistribuidoauditoria)){
  $totaldistribuidoauditoria="0";
}
if(empty($totalanaliseauditoria)){
  $totalanaliseauditoria="0";
}
if(empty($totalreprovadoauditoria)){
  $totalreprovadoauditoria="0";
}
if(empty($totalchamadoauditoria)){
  $totalchamadoauditoria="0";
}

if(empty($totalcorrecaoauditoria)){
  $totalcorrecaoauditoria="0";
}

if(empty($totalagestoqueauditoria)){
  $totalagestoqueauditoria="0";
}

}

$total_geral=$totaldistribuirauditoria+$totaldistribuidoauditoria+$totalanaliseauditoria+$totalreprovadoauditoria+$totalchamadoauditoria+$totalcorrecaoauditoria+$totalagestoqueauditoria;

}

$periodo=$data_1." ".utf8_encode("até")." ".$data_2;


?>

		<style type="text/css">
#container5, #sliders5 {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container5 {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container5').highcharts({
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
            text: '<?php echo "Auditoria"." - ".utf8_encode("Diário")  ?>',
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
            //pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}%</b> do total<br/>'
        },

        series: [{
            name: 'Status',
            colorByPoint: true,
             data: [{
                name: 'Distribuir',
                y: <?php echo $totaldistribuirauditoria ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuidoauditoria ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'Aprovado an\u00e1lise',
                y: <?php echo $totalanaliseauditoria ?>,
                drilldown: 'Aprovado an\u00e1lise'
            }, {
                name: 'Reprovado an\u00e1lise',
                y: <?php echo $totalreprovadoauditoria ?>,
                drilldown: 'Reprovado an\u00e1lise'
               
            }, {
                name: 'Chamado',
                y:<?php echo $totalchamadoauditoria ?>,
                drilldown: 'Chamado'
                
            }, {
                name: 'Corre\xE7\xE3o',
                y:<?php echo $totalcorrecaoauditoria ?>,
                drilldown: 'Corre\xE7\xE3o'
                
            }, {
                name: 'Estoque',
                y:<?php echo $totalagestoqueauditoria ?>,
                drilldown: 'Estoque'
                
            }]
        }],
      
    });
});
		</script>


<div id="container5" style="min-width:300px; height:200px; margin-left: 0px;"></div>





