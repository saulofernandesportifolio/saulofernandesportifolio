
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
               WHERE ( a.dt_inclusao_bd_cip2 LIKE '$dt_mes3%' OR  b.dt_tratamento_auditoria LIKE '$dt_mes3%') 
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

    case 13: /*echo "quantificar: ".*/ $totaldistribuirauditoria2= $totalauditoria; 
                                      
           // echo '<br\>';
            break;
    case 14: /*echo "distribuir: ".*/ $totaldistribuidoauditoria2=  $totalauditoria; 
                                     
           // echo '<br\>';
            break;
    case 15: /*echo "distribuido:".*/ $totalanaliseauditoria2=  $totalauditoria;
            //echo '<br\>';
            break; 
    case 16: /*echo "reprovado:".*/ $totalreprovadoauditoria2=  $totalauditoria; 
                                   
            //echo '<br\>';
            break;

    case 17: /*echo "reprovado:".*/ $totalchamadoauditoria2= $totalauditoria; 
                                   
            //echo '<br\>';
            break;
            
      case 19: /*echo "reprovado:".*/ $totalagestoqueauditoria2= $totalauditoria; 
                                   
            //echo '<br\>';
            break;        

    case 18: /*echo "aprovado:".*/ $totalcorrecaoauditoria2= $totalauditoria; 
                                 
            //echo '<br\>';
        // break;

    //case 19: /*echo "aprovado:".*/ $totalestoqueauditoria= $totalauditoria; 
                                 
            //echo '<br\>';

if(empty($totaldistribuirauditoria2)){
  $totaldistribuirauditoria2="0";
}
if(empty($totaldistribuidoauditoria2)){
  $totaldistribuidoauditoria2="0";
}
if(empty($totalanaliseauditoria2)){
  $totalanaliseauditoria2="0";
}
if(empty($totalreprovadoauditoria2)){
  $totalreprovadoauditoria2="0";
}
if(empty($totalchamadoauditoria2)){
  $totalchamadoauditoria2="0";
}

if(empty($totalcorrecaoauditoria2)){
  $totalcorrecaoauditoria2="0";
}

if(empty($totalagestoqueauditoria2)){
  $totalagestoqueauditoria2="0";
}

}

$total_geral=$totaldistribuirauditoria2+$totaldistribuidoauditoria2+$totalanaliseauditoria2+$totalreprovadoauditoria2+$totalchamadoauditoria2+$totalcorrecaoauditoria2+$totalagestoqueauditoria2;

}

//echo '<br>';
//echo "backlog";
     $atv_op2="SELECT count(a.substatus_da_cotacao)as totalauditoria,
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
               WHERE ( a.dt_inclusao_bd_cip2 < '$dt_diaatual') 
               AND b.status_cip_auditoria IN (13,14,17,19) 
               GROUP BY b.disc_status_cip_auditoria  
               
                ";
        $acao_op2=mysql_query($atv_op2,$conecta); 
        
   while ($dado2= mysql_fetch_array($acao_op2)) 
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $totalauditoria = $dado2['totalauditoria'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_auditoria= $dado2['status_cip_auditoria'];

echo '<br>';

  switch($status_cip_auditoria){

    case 13: /*echo "quantificar: ".*/ $totaldistribuirauditoriabacklog= $totalauditoria; 
                                      
           // echo '<br\>';
            break;
    case 14: /*echo "distribuir: ".*/ $totaldistribuidoauditoriabacklog=  $totalauditoria; 
                                     
           // echo '<br\>';
                                     
            break;

    case 17: /*echo "reprovado:".*/ $totalchamadoauditoriabacklog=  $totalauditoria; 
                                   
            //echo '<br\>';
            break;

    case 19: /*echo "aprovado:".*/ $totalagestoqueauditoriabacklog= $totalauditoria; 
                                 
            //echo '<br\>';
   

if(empty($totaldistribuirauditoriabacklog)){
  $totaldistribuirauditoriabacklog="0";
}
if(empty($totaldistribuidoauditoriabacklog)){
  $totaldistribuidoauditoriabacklog="0";
}
if(empty($totalchamadoauditoriabacklog)){
  $totalchamadoauditoriabacklog="0";
}

if(empty($totalagestoqueauditoriabacklog)){
  $totalagestoqueauditoriabacklog="0";
}


$total_geralbacklog=$totaldistribuirauditoriabacklog+$totaldistribuidoauditoriabacklog+$totalchamadoauditoriabacklog+$totalagestoqueauditoriabacklog;



}

}        
   
if(empty($totaldistribuidoauditoriabacklog)){
  $totaldistribuidoauditoriabacklog="0";
}
if(empty($totalchamadoauditoriabacklog)){
  $totalchamadoauditoriabacklog="0";
}

if(empty($totalagestoqueauditoriabacklog)){
  $totalagestoqueauditoriabacklog="0";
}
if(empty($totaldistribuirauditoria2)){
  $totaldistribuirauditoria2="0";
}
if(empty($totaldistribuidoauditoria2)){
  $totaldistribuidoauditoria2="0";
}
if(empty($totalanaliseauditoria2)){
  $totalanaliseauditoria2="0";
}
if(empty($totalreprovadoauditoria2)){
  $totalreprovadoauditoria2="0";
}
if(empty($totalchamadoauditoria2)){
  $totalchamadoauditoria2="0";
}

if(empty($totalcorrecaoauditoria2)){
  $totalcorrecaoauditoria2="0";
}

if(empty($totalagestoqueauditoria2)){
  $totalagestoqueauditoria2="0";
}

$totaldistribuirauditoriageral= $totaldistribuirbacklog + $totaldistribuirauditoria2;
$totaldistribuidoauditoriageral= $totaldistribuidobacklog + $totaldistribuidoauditoria2;
$totalanaliseauditoriageral= $totalanaliseauditoria2;
$totalreprovadoauditoriageral=  $totalreprovadoauditoria2;  
$totalcorrecaouditoriageral=  $totalcorrecaoauditoria2;  
$totalchamadoauditoriageral=  $totalchamadoauditoria2 + $totalchamadoauditoriabacklog;
$totalagestoqueauditoriageral=  $totalagestoqueauditoria2 + $totalagestoqueauditoriabacklog;




$periodo=substr($dt_mes3,0,7);

$totalgeralgeral=$total_geralbacklog+$total_geral2;

?>

		<style type="text/css">
#container6, #sliders6 {
    min-width: 469px; 
    max-width: 469px;
    margin: 0 auto;

}
#container6 {
    height: 200px; 
}
</style>
<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container6').highcharts({
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
            text: '<?php echo "Auditoria"." - "."Consolidado"  ?>',
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
                y: <?php echo $totaldistribuirauditoriageral ?>,
                drilldown: 'Distribuir'
            }, {
                name: 'Distribuido',
                y: <?php echo $totaldistribuidoauditoriageral ?>,
                drilldown: 'Distribuido'
            }, {
                name: 'Aprovado an\u00e1lise',
                y: <?php echo $totalanaliseauditoriageral ?>,
                drilldown: 'Aprovado an\u00e1lise'
            }, {
                name: 'Reprovado an\u00e1lise',
                y: <?php echo $totalreprovadoauditoriageral ?>,
                drilldown: 'Reprovado an\u00e1lise'
               
            }, {
                name: 'Chamado',
                y:<?php echo $totalchamadoauditoriageral ?>,
                drilldown: 'Chamado'
                
            }, {
                name: 'Corre\xE7\xE3o',
                y:<?php echo $totalcorrecaouditoriageral ?>,
                drilldown: 'Corre\xE7\xE3o'
                
            }, {
                name: 'Estoque',
                y:<?php echo $totalagestoqueauditoriageral ?>,
                drilldown: 'Estoque'
                
            }]
        }],
      
    });
});
		</script>


<div id="container6" style="min-width:300px; height:200px; margin-left: 0px;"></div>





