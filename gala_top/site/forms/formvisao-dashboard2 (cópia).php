<table class="lista-clientesdashboard">
  <tr>
  <th colspan="6"><?php echo "Cotação pendente top - Dentro do prazo"; ?></th>
    </tr> 
  <th>Tipo de Processo</th>
  <th>Dentro do prazo</th>
  <th>Vence Hoje</th>
  <th>Vence D+1</th>
  <th>Vence D+2</th>
  <th>Vence D>2</th>
  </tr>
  
<?php
$data_1= arrumadata($data_1);
$data_2= arrumadata($data_2);

$prazod="Dentro do prazo";


$sql="CALL resumo("."'{$data_1}'".","."'{$data_2}'".")";



        $acao_op=mysql_query($sql,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                    $id_cotacaoa=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise'];
                    $PRAZO_DIAS= $dado2['PRAZO_DIAS'];
                    $setor= $dado2['setor'];
                    $total2 = $dado2['total2'];
                    $vencimento_ilha2 = $dado2['vencimento_ilha'];
           

if($setor == "Analise" || $setor == "analise"){

  $setor="Análise de documentação";
}


if($setor == "Input" || $setor == "input"){

  $setor="Ilha de input";
}


if($setor == "Auditoria" || $setor == "auditoria"){

  $setor="Añálise de input";

}


if($setor == "Correcao" || $setor == "correcao"){

  $setor="Correção input";
}


$dia=date("Y-m-d");


 
if(strlen(diferencadata($vencimento_ilha2,$dia)) == 3){
   $diasdff = substr(diferencadata($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata($vencimento_ilha2,$dia)) == 2){
   $diasdff = substr(diferencadata($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata($vencimento_ilha2,$dia)) == 1)
{
    $diasdff = diferencadata($vencimento_ilha2,$dia);  
}


echo  $diasdff;
echo '<br>';

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

}


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




