<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/jquery.tablesorter.min.js"></script>
<script src="js/jquery.tablesorter.pager.js"></script>

<script>
    $(function(){
      
      $('table > tbody > tr:odd').addClass('odd');
      
      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });
      
      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });
      
      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });
      
      //$('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
      
      $("table") 
        .tablesorter({
          dateFormat: 'uk',
          headers: {
            0: {
              sorter: false
            },
            5: {
              sorter: false
            }
          }8
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd').addClass('odd');
        });
      
    });
    </script>


        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />



<script language="JavaScript">
function abrir(URL) {
 
  var width = 780;
  var height = 300;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script>
var actionButton = document.querySelector('.action');
actionButton.addEventListener('click', myFunction);

/* Usando jQuery */
$('.action').on('click', myFunction);

</script>


<script>

<!-- Função Checkbox selecionar todos -->

function selecionar_todas(retorno) {
    var frm = document.myform;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>

  <?php
 date_default_timezone_set('Brazil/East');

$data3=date('d/m/Y H:i');

//$calcula_data = date("d/m/Y");

$calcula_data = date("2017-07-24");


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 20){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
} 

 
  
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}
  
     function arrumadata2($string3) {
    if($string3 == ''){
    $data= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);   
        
    }else{
        
    $data= substr($string3,6,4)."/".substr($string3,3,2)."/".substr($string3,0,2);   
    }

 return $data;
} 


function arrumadata1($string3) {
    if($string3 == ''){
    $data2=substr($string3,8,2)."".substr($string3,5,2)."".substr($string3,0,4);   
        
    }else{
        
    $data2= substr($string3,8,2)."/".substr($string3,5,2)."/".substr($string3,0,4);   
    }

 return $data2;
}





Function entre($data1, $data2="",$tipo=""){
if($data2==""){
$data2 = date("d/m/Y H:i");
}
if($tipo==""){
$tipo = "h";
}
for($i=1;$i<=2;$i++){
${"dia".$i} = substr(${"data".$i},0,2);
${"mes".$i} = substr(${"data".$i},3,2);
${"ano".$i} = substr(${"data".$i},6,4);
${"horas".$i} = substr(${"data".$i},11,2);
${"minutos".$i} = substr(${"data".$i},14,2);
}
$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2)-mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);
switch($tipo){
case "m":
$difere = $segundos/60;
break;
case "H":
$difere = $segundos/3600;
break;
case "h":
$difere = round($segundos/3600);
break;
case "D":
$difere = $segundos/86400;
break;
case "d":
$difere = round($segundos/86400);
break;
}
return $difere;
}




if(empty($_POST['n_da_cotacao']) && empty($_POST['statuscip'])  ){ 
    
echo "
       <script type=\"text/javascript\">
        alert('É nescessário selecionar uma opção no status cip ou a cotação ou pedido a ser pesquisado !');
        history.back();
      </script>
 ";
  exit();     
    
}



$sql_valida="SELECT * FROM cip_nv.tbl_swap b WHERE b.statuscip = 1";


//$sql_valida="SELECT * FROM cip_nv.tbl_swap b WHERE (b.statuscip = 1 OR b.statuscip = 2 OR b.statuscip = 3) and tmt ='838:59:59' ";


$acao2 = mysql_query($sql_valida,$conecta) or die (mysql_error());

while($linha_atv2 = mysql_fetch_assoc($acao2)){

$id_swap1=$linha_atv2['id_swap'];    
$data_da_solicitacao1=$linha_atv2['data_da_solicitacao'];
$hora_da_solicitacao1=$linha_atv2['hora_da_solicitacao'];


$data_tratamento_swap_cip1=$linha_atv2['data_tratamento_swap_cip'];
$hora_tratamento_swap_cip1=$linha_atv2['hora_tratamento_swap_cip'];
$statuscip=$linha_atv2['statuscip'];


 $data1=arrumadata1($data_da_solicitacao1)." ".$hora_da_solicitacao1;


$diasemana_numero = date('w', strtotime($calcula_data));


if($diasemana_numero >= 1 && $diasemana_numero <= 5){


  if($statuscip == 2 || $statuscip == 3){
    
   $data3=arrumadata1($data_tratamento_swap_cip1)." ".substr($hora_tratamento_swap_cip1,0,5); 


  }


$h=entre($data1,$data3,"H");

$h=floor($h);

$hfinal=substr($data3,11,16);

$hinicial=substr($data1,11,16);

$hfinal=substr($data3,10,3);

$hinicial=substr($data1,10,3);

$mfinal=substr($data3,14,3);

$minicial=substr($data1,14,2);


/*if(substr($data1,10,3) > substr($data3,10,3)){


 $h =($hinicial - $hfinal);

}elseif(substr($data3,10,3) > substr($data1,10,3)){

 
  $h=($hfinal - $hinicial);
}*/

/*if(substr($data1,14,3) > substr($data3,14,3)){

  $m =($minicial - $mfinal);

}elseif(substr($data3,14,3) > substr($data1,14,3)){


   $m=($mfinal - $minicial);
}*/


 $m=($mfinal - $minicial);

if($h >= 0 && $h <= 9){
  $h='0'.$h;
}
if($m >= 0 && $m <= 9){
  $m='0'.$m;
}

$m2=substr($data3,14,16);

 /*if($hfinal == $hinicial){

  $h='00';
 }*/




$tmt11=$h.":".$m2;


$sql_valida_update="UPDATE cip_nv.tbl_swap 
                     SET tmt='$tmt11'
                    WHERE id_swap='$id_swap1' ";

$acao3 = mysql_query($sql_valida_update,$conecta) or die (mysql_error());

}


}


if(empty($_POST['n_da_cotacao'])){
    $_POST['n_da_cotacao']='%';
    
}

if(empty($_POST['statuscip'])){
    $_POST['statuscip']='%';
    
}


$sql="CALL cip_nv.visao_pesquisa_swap("."'{$_POST['n_da_cotacao']}'".","."'{$_POST['statuscip']}'".")";

$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);

if( $num_ == 0){

echo "<script>
            alert('Não encontra-se na base esta cotação.');
            document.location.replace('principal.php?t=forms/formconsulta_cotacoes_swap.php');
         </script>";

}


?>

<table class="tablepadrao" >
<td>
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<p align="center">


<form name="myform" action="#" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="3" face="Gotham Light">Resumo</font></b></p>
<br />

<p><font color="#337ab7" size="2" face="Gotham Light"><strong>Lista</strong></font></p>
<br />


 <p><?php echo "<font color='#000000' size='2' face='Gotham Light'>Total de  $num_ cota&ccedil;&otilde;es ou pedidos</font>"?>:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
    <table border="0" class="lista-clientes">
    <thead> 
    
    <tr>
    <th>COTACAO/PEDIDO</th>
    <th>REVISAO SWAP</th>
    <th>REGIONAL</th>
    <th>UF</th>
    <th>STATUS</th>
    <th>CARTEIRA</th>
    <th>DATA DA SOLICITAÇÃO</th>
    <th>HORA DA SOLICITAÇÃO</th>
    <th>TOTAL LINHAS</th>
    <th>TOTAL LINHAS SWAP</th>
    <th>SOLICITANTE</th>
    <th>NOME DO SOLICITANTE</th>
    <th>TMT</th>
     <th>SLA</th>
     <th>STTUS CIP</th>
     <th>OPERADOR SWAP</th>
  </tr>
    </thead>
         <tbody>
    
    <?php


//$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
$id_swap=$linha_atv['id_swap'];    
$cotacaopedido=$linha_atv['cotacaopedido'];
$data_da_solicitacao=$linha_atv['data_da_solicitacao'];
$hora_da_solicitacao=$linha_atv['hora_da_solicitacao'];
$regional=$linha_atv['regional'];
$status=$linha_atv['status'];
$data_da_tratativa_do_swap=$linha_atv['data_da_tratativa_swap'];
$solicitante=$linha_atv['solicitante'];
$gerente_de_contas=$linha_atv['remetente'];
$total_de_linhas=$linha_atv['total_de_linhas'];
$total_de_linhas_swap=$linha_atv['total_de_linhas_swap'];
$de_aparelho_inicial=$linha_atv['ap_inicial'];
$para_aparelho_final=$linha_atv['ap_final'];
$uf=$linha_atv['uf'];
$carteira=$linha_atv['carteira'];
$adabas=$linha_atv['adabas'];
$hora_tratativa_swap=$linha_atv['hora_da_tratativa_swap']; 
$login_operadores_swap=$linha_atv['login_operadores_swap'];
$turno=$linha_atv['turno'];
$remetente=$linha_atv['remetente'];
$swap=$linha_atv['swap'];
$sp2=$linha_atv['sp2'];
$emailsolicitacao=$linha_atv['emailsolicitacao'];
$retornoemail=$linha_atv['retornoemail'];
$statuscip=$linha_atv['statuscip'];
$nomegn=$linha_atv['nome_gc']; 
$tmt=$linha_atv['tmt'];
$revisao_swap=$linha_atv['revisao_swap'];
$nomeopswap=$linha_atv['nome'];
    
$data_da_solicitacao =arrumadatahora($data_da_solicitacao);
$dt_distribuicao=arrumadatahora($dt_distribuicao);
//$dt_tratamento     =arrumadatahora($dt_tratamento);


   $hora_base=48;

 if($tmt > $hora_base ){

     $e2e= $grupo;
     $cor = '#FF0000';

     //echo $cpf_cnpj;
  
    }else{ 
      $e2e= "-"; 
      $cor = '#464646';

     // echo $cpf_cnpj;
    } 
	
    if($solicitante == 1){
        $solicitante='GN GUARDIÃO';
    }
    if($solicitante == 2){
        $solicitante='GERENTE';
    }
    if($solicitante == 3){
        $solicitante='PRIORIDADE';
    }
    
    //echo substr($tmt,0,5);

    $hora_base=48;

     if($tmt < $hora_base){
         //echo "ok";

         $slaswap="Dentro";
     }else{
         $slaswap="Fora";        
     }

        if($statuscip == 1){
         $statuscip='Em Tratativa';
     }
     
     if($statuscip == 2){
        $statuscip='Concluido'; 
     }
    
    if($statuscip == 3){
        $statuscip='Reprovado'; 
     }

    if($statuscip == 4){
        $statuscip='Chamado TI'; 
     }

    if($statuscip == 5){
        $statuscip='Retorno Chamado'; 
     } 

    

     
?>


     
     <tr>
  
     <td class="tdconteudo"><?php echo "<a href='principal.php?id_swap=$id_swap&t=forms/form_swaptt.php'><font size='1' color='$cor' face='Arial'>$cotacaopedido</font></a>" ?></td>
     
          <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao_swap</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>" ?></td>
      <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$uf</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$carteira</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_da_solicitacao</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$hora_da_solicitacao</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$total_de_linhas</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$total_de_linhas_swap</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$solicitante</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$nomegn</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tmt</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$slaswap</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$statuscip</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$nomeopswap</font>" ?></td>
     </tr>
    <?php
  	}

	?>
    </tbody>
  </table>
  <br />

<?php

 mysql_free_result($acao_operador,$acao);
 mysql_close($conecta);

?>

  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/formconsulta_cotacoes_swap.php'" class="sb2 bradius" />



</form>
</div>
</div>
</td>
</table>
</body>
</html>

