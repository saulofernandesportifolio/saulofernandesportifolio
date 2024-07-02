<head> 
    <meta http-equiv="refresh" content="url=principal.php?&t=forms/form_fila_cotacao_pn_conclusao.php"/>
    </head>
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
      
      $('form').submit(function(e){ e.preventDefault(); });
      
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
          }
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
 
  var width = 400;
  var height = 300;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<script language="JavaScript">
function abrir2(URL) {
 
  var width = 800;
  var height = 600;
 
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


 <script language="javascript">

function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>



  <?php

  
$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        $cpf               =$linha_operador["cpf"];
		}
  
  
  

  
 if($perfil!= 17){
    
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
    $data= substr($string,8,2)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data= substr($string,8,2)."/".substr($string,5,2)."/".substr($string,0,4);   
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



 
ini_set('mysql.connect_timeout','30'); 
ini_set('default_socket_timeout','30');
ini_set('memory_limit', '-1');

 $dt_diaf = date("Y-m-d");
//$data3=date("d/m/Y H:i");

if(empty($_POST['status_tpf'])){

  $_POST['status_tpf']='%';


}


$sql_validapd2 = "SELECT DISTINCT 
                        a.id,
                        a.tmt,
                        a.criado_em                           
                        FROM bd_erros_pn.base_erros_top_tt a 
                    WHERE a.fila NOT LIKE 3 
                    ORDER BY a.criado_em ASC ";
                   
 $acao_validapd2 = mysql_query($sql_validapd2,$conecta2) or die (mysql_error());


while($dado2 = mysql_fetch_assoc($acao_validapd2))
{
	$id            = $dado2["id"];
        $data_cadastro = $dado2["criado_em"];
        $status_cip    = $dado2['disc_status_tp'];
        $status_tp    = $dado2['status_tp'];
        $tmt           = $dado2['tmt'];
        $data_tratamento= $dado2['data_tratamento'];
        $hora_tratamento= $dado2['$hora_tratamento'];       

if($status_tp == 3){
    
  $data_a= substr(arrumadatahora($data_tratamento),0,10);
//echo '<br>';

  $hora_a= substr($hora_tratamento,0,5);

  $data1=$data_a." ".$hora_a;
 //echo '<br>';
}elseif($status_tp != 3){        
        
 $data_a= substr(arrumadatahora($data_cadastro),0,10);
//echo '<br>';

  $hora_a= substr($data_cadastro,10,6);

 $data1=$data_a.$hora_a;
 //echo '<br>';
}
//echo $data1='19/10/2017 19:50';
//echo '<br>';
//echo $data3;

// echo '<br>';

$diasemana_numero = date('w', strtotime($calcula_data));

if($diasemana_numero >= 1 && $diasemana_numero <= 5){


  if($status_tp == 2 || $status_tp == 3){
    
    $data3=date("d/m/Y")." ".date("H:i"); 


  }



//echo '<br>';

 $h=entre($data1,$data3,"h");
//echo " horas arredondadas.<br>";
 $m=entre($data1,$data3,"m");
//echo " minutos <br>";
//echo '<br>';

if($h >= 0 && $h <= 9){
  $h='0'.$h;
}
if($m >= 0 && $m <= 9){
  $m='0'.$m;
}


/*echo "este e o calculo ".*/$total2=$h.":".$m;

//echo '<br>';

}else{

 $total2=$tmt; 
} 
  
  


 $sql_update1 = "UPDATE bd_erros_pn.base_erros_top_tt 
                   SET  tmt = '$total2'									
		WHERE  id ='$id' AND fila NOT LIKE 3 ";
 $update1 = mysql_query($sql_update1,$conecta2) or die (mysql_error());

  
}






    $sql_validapd = "SELECT DISTINCT a.id,
                         a.pedido,
                         a.revisao                        
                        FROM bd_erros_pn.base_erros_top_tt a 
                    WHERE a.erros_existente_pedido IS NULL AND a.fila NOT LIKE 3 
                    ORDER BY a.pedido ";
                   
    $acao_validapd = mysql_query($sql_validapd,$conecta2) or die (mysql_error());

while($linha_updatepd= mysql_fetch_assoc($acao_validapd)){
        $pedido= $linha_updatepd['pedido'];
        $revisao= $linha_updatepd['revisao'];
/*
$sql1="UPDATE bd_erros_pn.base_erros_top_tt a, (SELECT count(pedido) as soma FROM bd_erros_pn.base_erros_linhas_top_tt WHERE pedido='$pedido' AND revisao='$revisao')b
SET a.linhas=b.soma 
WHERE pedido='$pedido'  AND revisao='$revisao'";
$acao_sql1 = mysql_query($sql1,$conecta2) or die (mysql_error());*/



 
 $sql_validamass2="CALL bd_erros_pn.atualiza_conteudo_erros_carga_top_tt("."'{$pedido}'".")";
 $resultmass2 = mysql_query($sql_validamass2,$conecta2) or die(mysql_error());

}



$sql_cotaanalise="CALL bd_erros_pn.fila_erros_top_tt("."'{$cpf}'".","."'{$_POST['status_tpf']}'".")";

$acao_cotacoesanalise = mysql_query($sql_cotaanalise,$conecta2) or die (mysql_error());
$num_analise = mysql_num_rows($acao_cotacoesanalise);

if($num_analise <= 0)
{


    echo "<script type=\"text/javascript\">
            alert('Voce nao possui cotações em sua visão. Por favor entre em contato com a distribuição.');
      document.location.replace('principal.php');
       </script>";
        exit;
    
}
else{



?>



<div class="divformdistribuicaoservico">
<div id="filtroservico" class="form bradius">

<p></p>
<p><b><font color="#337ab7" size="3" face="Gotham Light">Lista 
  de erros para serem analisados </b></font></p>
<br />
<p><b><font color="#000000" size="2" face="Gotham Light">
  Voc&ecirc; tem um total de <?php echo "$num_analise pedidos"?> 
    na sua vis&atilde;o. Clique 
    em Abrir para analisar:</b></font></p>
    <br />
    

    <form name="myform" method="POST" action="principal.php?&t=forms/form_fila_cotacao_erros_top_tt.php" id="frm-filtro">
  
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    
   <br /><br /><br /><br />
   <p>
   <input type="button" name="Submit2" class="sb3 bradius" value="cadastrar manualmente" onclick="window.location='principal.php?t=forms/form_cotacoes_erros_manual_top_tt.php'"/>
        &nbsp;&nbsp;&nbsp;Filtras por status&nbsp;
          <select name="status_tpf" onchange="this.form.submit();" class="txt2comboboxmedio bradius">
           <?php if(empty($_POST['status_tpf'])){ ?>
           <option selected="%">Todos</option>
            <?php }else{ ?>
           <option value="<?php echo $_POST['status_tpf'] ?>">
           <?php if($_POST['status_tpf'] == '%'){ 
          echo "Todos"; 
            }elseif($_POST['status_tpf'] == '1'){ 
            echo "Aberto"; 
            }elseif($_POST['status_tpf'] == '2'){ 
            echo "Em tratamento"; 
            }elseif($_POST['status_tpf'] == '4'){ 
            echo "Chamado TI"; 
            }elseif($_POST['status_tpf'] == '5'){ 
            echo "Aguardando Comercial"; 
            }elseif($_POST['status_tpf'] == '6'){ 
            echo "Aguadando CR"; 
            }

              ?></option>
          <?php } ?>
                     <option value="%">Todos</option>
                     <option value="1">Aberto</option>
                     <option value="2">Em tratamento</option>
                     <option value="4">Chamado TI</option>
                     <option value="5">Aguardando Comercial</option>
                     <option value="6">Aguadando CR</option>
                     </select>
   </p>
</form>
   <br /><br />
    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <th>PEDIDO/OV</th>
    <th>REGIONAL</th>
    <th>CLIENTE</th>
    <th>LINHAS</th>
    <th>TIPO NO VIVOCORP</th>
    <th>DATA</th>
    <th>VPE</th>
    <th>STATUS CIP</th>
     <th>TMT</th>
     <th>SLA</th>
    <th>EXCLUIR</th>
    </thead>
     <tbody>
  <?php


while($dado = mysql_fetch_assoc($acao_cotacoesanalise))
{
	$id            = $dado["id"];
        $regional      = $dado["regional"];
        $adabas        = $dado["adabas"];
        $pedido        = $dado["pedido"];
        $tipo          = $dado["tipo"];
        $linhas        = $dado["linhas"];
        $data_cadastro = $dado["criado_em"];
        $data_sla      = $data_cadastro;
        $cliente       = $dado["cliente"];
        $tipo_vivocorp = $dado["tipo_vivocorp"];
        $vpe           = $dado["vpe"];
        $status_cip    = $dado['disc_status_tp'];
        $tmt           = $dado['tmt'];
        
$data_inicio=arrumadata($data_inicio);

$ultima_atualizacao_status=arrumadata($ultima_atualizacao_status);

  $data_cad=arrumadatahora($data_cadastro);
  
  
  
    $hora_base='48';
    
    // Uma frase
$string = $tmt;
 
// Utiliza explode na string, criando um array
$tmt2= explode(':', $string);
 
 $tmt2=$tmt2[0]; 
    
 if($tmt2 > $hora_base ){

     $prazo= "Fora";
     $cor = '#FF0000';

     //echo $cpf_cnpj;
  
    }else{ 
      $prazo= "Dentro"; 
      $cor = '#464646';

     // echo $cpf_cnpj;
    } 
  
  

?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<a href=\"principal.php?&id=$id&t=forms/form_cotacoes_erros_top_tt.php\"><font size='1' color='$cor' face='Arial'>$pedido</font></a>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$linhas</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo_vivocorp</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_cad</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$vpe</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_cip</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tmt</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$prazo</font>" ?></td>
    <td>
    <a href="principal.php?id=<?php echo $id ?>&t=controles/sql_excluir_erros_top_tt.php"><font size="1" color="<?php echo $cor ?>" face="Arial">EXCLUIR</font></a>
    </td>
 </tr>
  <?php
  }
}


  ?>

</tbody>    
</table>

<br />



<p align="left">
  <input type="hidden" name="canal" value="<?php echo $canal ?>" />
 

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php'"/>

</p>
   </div>

    </div>
</div>


<?php

 mysql_free_result($acao_operador,$acao_cotacoesanalise,$acao_query);
 mysql_close($conecta,$conecta2);
 mysql_next_result($conecta,$conecta2);

?>

</body>
</html>
