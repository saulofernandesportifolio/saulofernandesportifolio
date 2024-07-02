
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
               WHERE ( a.dt_inclusao_bd_cip2 LIKE '$dt_mes3%' OR b.dt_tratamento_input LIKE '$dt_mes3%' ) 
               AND b.status_cip_input IN (7,8,9,10,11,12) 
                GROUP BY b.status_cip_input     
                ";
        $acao_op=mysql_query($atv_op,$conecta);
      
   
      
       

   while ($dado2= mysql_fetch_array($acao_op)) 
           {        
                    $id_cotacao=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $totalinput = $dado2['totalinput'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_input= $dado2['status_cip_input']; 

//echo '<br>';
 switch($status_cip_input){
    
 case 7: /*echo "quantificar: ".*/ $totaldistribuirinput2= $totalinput; 
                                      
           // echo '<br\>';
            break;
    case 8: /*echo "distribuir: ".*/ $totaldistribuidoinput2=  $totalinput; 
                                     
           // echo '<br\>';
            break;
    case 9: /*echo "distribuido:".*/ $totalanaliseinput2=  $totalinput;
            //echo '<br\>';
            break; 
    case 10: /*echo "reprovado:".*/ $totalreprovadoinput2=  $totalinput; 
                                   
            //echo '<br\>';
            break;

    case 11: /*echo "reprovado:".*/ $totalchamadoinput2=  $totalinput; 
                                   
            //echo '<br\>';
            break;

    case 12: /*echo "aprovado:".*/ $totalestoqueinput2=  $totalinput; 
                                 
            //echo '<br\>';
    default:

if(empty($totaldistribuirinput2)){
  $totaldistribuirinput2="0";
}
if(empty($totaldistribuidoinput2)){
  $totaldistribuidoinput2="0";
}
if(empty($totalanaliseinput2)){
  $totalanaliseinput2="0";
}
if(empty($totalreprovadoinput2)){
  $totalreprovadoinput2="0";
}
if(empty($totalchamadoinput2)){
  $totalchamadoinput2="0";
}

if(empty($totalestoqueinput2)){
  $totalestoqueinput2="0";
}


$total_geral=$totaldistribuirinput2+$totaldistribuidoinput2+$totalanaliseinput2+$totalreprovadoinput2+$totalchamadoinput2+$totalestoqueinput2;



}

}
//echo '<br>';
//echo "backlog";
     $atv_op2="SELECT count(a.substatus_da_cotacao)as totalinput,
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
               WHERE ( a.dt_inclusao_bd_cip2 < '$dt_diaatual') 
               AND b.status_cip_input IN (7,8,11,12)  
               GROUP BY b.status_cip_input 
               
                ";
        $acao_op2=mysql_query($atv_op2,$conecta); 
        
   while ($dado2= mysql_fetch_array($acao_op2)) 
           {        
                    $id_cotacao=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $totalinput = $dado2['totalinput'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_input= $dado2['status_cip_input']; 

echo '<br>';

  switch($status_cip_input){

      case 7: /*echo "quantificar: ".*/ $totaldistribuirinputbacklog= $totalinput; 
                                      
           // echo '<br\>';
            break;
    case 8: /*echo "distribuir: ".*/ $totaldistribuidoinputbacklog=  $totalinput; 
                                     
           // echo '<br\>';
                                     
            break;

    case 11: /*echo "reprovado:".*/ $totalchamadoinputbacklog=  $totalinput; 
                                   
            //echo '<br\>';
            break;

    case 12: /*echo "aprovado:".*/ $totalestoqueinputbacklog=  $totalinput; 
                                 
            //echo '<br\>';
 

if(empty($totaldistribuirinputbacklog)){
  $totaldistribuirinputbacklog="0";
}
if(empty($totaldistribuidoinputbacklog)){
  $totaldistribuidoinputbacklog="0";
}
if(empty($totalchamadoinputbacklog)){
  $totalchamadoinputbacklog="0";
}

if(empty($totalestoqueinputbacklog)){
  $totalestoqueinputbacklog="0";
}


$total_geralbacklog=$totaldistribuirinputbacklog+$totaldistribuidoinputbacklog+$totalchamadoinputbacklog+$totalestoqueinputbacklog;



}

}        
   
if(empty($totalquantificarbacklog)){
  $totalquantificarbacklog="0";
}
if(empty($totaldistribuidoinputbacklog)){
  $totaldistribuidoinputbacklog="0";
}
if(empty($totalchamadoinputbacklog)){
  $totalchamadoinputbacklog="0";
}

if(empty($totalestoqueinputbacklog)){
  $totalestoqueinputbacklog="0";
}
if(empty($totaldistribuirinput2)){
  $totaldistribuirinput2="0";
}
if(empty($totaldistribuidoinput2)){
  $totaldistribuidoinput2="0";
}
if(empty($totalanaliseinput2)){
  $totalanaliseinput2="0";
}
if(empty($totalreprovadoinput2)){
  $totalreprovadoinput2="0";
}
if(empty($totalchamadoinput2)){
  $totalchamadoinput2="0";
}

if(empty($totalestoqueinput2)){
  $totalestoqueinput2="0";
}

$totaldistribuirinputgeral= $totaldistribuirbacklog + $totaldistribuirinput2;
$totaldistribuidoinputgeral= $totaldistribuidobacklog + $totaldistribuidoinput2;
$totalanaliseinputgeral= $totalanaliseinput2;
$totalreprovadoinputgeral=  $totalreprovadoinput2;   
$totalchamadoinputgeral=  $totalchamadoinput2 + $totalchamadoinputbacklog;
$totalestoqueinputgeral=  $totalestoqueinput2 + $totalestoqueinputbacklog;




$periodo=substr($dt_mes3,0,7);

$totalgeralgeral=$total_geralbacklog+$total_geral2;


?>
 	<style type="text/css">
#container4, #sliders4 {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container4 {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container4').highcharts({
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
            text: '<?php echo utf8_encode("Input")." - "."Consolidado" ?>',
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
                y: <?php echo $totaldistribuirinputgeral ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuidoinputgeral ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'An\u00e1lise input',
                y: <?php echo $totalanaliseinputgeral ?>,
                drilldown: 'An\u00e1lise input'
            }, {
                name: 'Reprovado input',
                y: <?php echo $totalreprovadoinputgeral ?>,
                drilldown: 'Reprovado input'
               
            }, {
                name: 'Chamado',
                y:<?php echo $totalchamadoinputgeral ?>,
                drilldown: 'Chamado'
                
            },{
                name: 'Estoque',
                y:<?php echo $totalestoqueinputgeral ?>,
                drilldown: 'Estoque'
                
            }]
        }],
      
    });
});
		</script>

<div id="container4" style="min-width:300px; height: 200px; margin-left: 0px;"></div>







