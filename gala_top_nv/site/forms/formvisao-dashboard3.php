
<table class="lista-clientesdashboard">
  <tr>
  <th colspan="6"><?php echo "Visão Sla"; ?></th>
    </tr> 
  <th>Tipo de Processo</th>
  <th>Dentro do prazo</th>
  <th>Vence Hoje</th>
  <th>Vence D+1</th>
  <th>Vence D+2</th>
  <th>Vence D>2</th>
  </tr>
  
<?php

$atv_op="SELECT count(a.substatus_da_cotacao)as total, 
COUNT(a.vencimento_ilha) as total2,
a.id_cotacao, 
a.regional_atribuida, 
a.carteira, 
a.substatus_da_cotacao, 
SUBSTRING(a.vencimento_ilha,1,10) as vencimento_ilha,
b.Setor,
a.PRAZO_DIAS, 
a.TIPO_COTACAO, 
a.TIPO_DE_LINHA, 
DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
FROM tbl_cotacao a 
INNER JOIN tbl_analise b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
AND a.TIPO_COTACAO ='Principal'
AND b.Setor = 'Analise' 
UNION 
SELECT count(a.substatus_da_cotacao)as total, 
COUNT(a.vencimento_ilha) as total2,
a.id_cotacao, 
a.regional_atribuida, 
a.carteira, 
a.substatus_da_cotacao, 
SUBSTRING(a.vencimento_ilha,1,10) as vencimento_ilha,
b.Setor,
a.PRAZO_DIAS, 
a.TIPO_COTACAO, 
a.TIPO_DE_LINHA, 
DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
FROM tbl_cotacao a 
INNER JOIN tbl_input b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
AND a.TIPO_COTACAO ='Principal'
AND b.Setor = 'Input'
UNION 
SELECT count(a.substatus_da_cotacao)as total, 
COUNT(a.vencimento_ilha) as total2,
a.id_cotacao, 
a.regional_atribuida, 
a.carteira, 
a.substatus_da_cotacao, 
SUBSTRING(a.vencimento_ilha,1,10) as vencimento_ilha,
b.Setor,
a.PRAZO_DIAS, 
a.TIPO_COTACAO, 
a.TIPO_DE_LINHA, 
DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
FROM tbl_cotacao a 
INNER JOIN tbl_auditoria b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
AND a.TIPO_COTACAO ='Principal'
AND b.Setor = 'Auditoria'
UNION 
SELECT count(a.substatus_da_cotacao)as total, 
COUNT(a.vencimento_ilha) as total2,
a.id_cotacao, 
a.regional_atribuida, 
a.carteira, 
a.substatus_da_cotacao, 
SUBSTRING(a.vencimento_ilha,1,10) as vencimento_ilha,
b.Setor,
a.PRAZO_DIAS, 
a.TIPO_COTACAO, 
a.TIPO_DE_LINHA, 
DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
FROM tbl_cotacao a 
INNER JOIN tbl_correcao b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
AND a.TIPO_COTACAO ='Principal'  
AND b.Setor = 'Correcao' "; 
        $acao_op=mysql_query($atv_op,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise'];
                    $PRAZO_DIAS= $dado2['PRAZO_DIAS'];
                    $setor= $dado2['Setor'];
                    $total2 = $dado2['total2'];
                    $vencimento_ilha = $dado2['vencimento_ilha'];
           

if($setor == "Analise"){

  $setor="Análise de documentação";
}


if($setor == "Input"){

  $setor="Ilha de input";
}


if($setor == "Auditoria"){

  $setor="Añálise de input";

}


if($setor == "Correcao" || $setor == "correcao"){

  $setor="Correção input";
}


$dia=date("Y-m-d");

 /* $diasdff = diferencadata($vencimento_ilha,$dia); 





if($diasdff == 0){

  //echo "igual";
  $Hoje = $total2;

}elseif(!empty($setor)){
 $Hoje=0;

}

if($diasdff  == 1 ){

  //echo "nao é igual";

  $venced1=$total2;
}
elseif(!empty($setor)){

$venced1=0;

}

if($diasdff  == 2){

  //echo "nao é igual";

  $venced2=$total2;
}
elseif(!empty($setor)){

$venced2=0;

}

if($diasdff  >= 3 ){

  //echo "nao é igual";

  $venced3=$total2;
}
elseif(!empty($setor)){

$venced3=0;

}*/


?>


  <tr>
  <?php if(!empty($setor)){ ?>  
  <td><?php echo $setor ?></td>
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $total ?></td> 
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $Hoje ?></td> 
  <?php }if(!empty($setor)){ ?>
  <td><?php echo $venced1 ?></td> 
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $venced2 ?></td> 
  <?php }if(!empty($setor)){ ?>
  <td><?php echo $venced3 ?></td> 
  <?php } ?>
</tr>

<?php } ?>
</table>








