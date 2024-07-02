<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>

<head>

<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>

<script src="../../js/jquery.tablesorter.min.js"></script>
<script src="../../js/jquery.tablesorter.pager.js"></script>

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
 
  var width = 600;
  var height = 300;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela2","scrollbars=yes, height=" + height +", width=" +width);
 
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
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

</head>

  <?php
  

 
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,3,2)."/".substr($string,0,2);   
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


function tempoData($dataini, $datafim){

	 
 # Split para dia, mes, ano, hora, minuto e segundo da data inicial
 $_split_datehour = explode('  ',$dataini);
 $_split_data = explode("/", $_split_datehour[0]);
 $_split_hour = explode(":", $_split_datehour[1]);
 # Coloquei o parse (integer) caso o timestamp nao tenha os segundos, dai ele fica como 0
 $dtini = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
 
 # Split para dia, mes, ano, hora, minuto e segundo da data final
 $_split_datehour = explode(' ',$datafim);
 $_split_data = explode("/", $_split_datehour[0]);
 $_split_hour = explode(":", $_split_datehour[1]);
 $dtfim = mktime ($_split_hour[0], $_split_hour[1], (integer)$_split_hour[2], $_split_data[1], $_split_data[0], $_split_data[2]);
 
 # Diminui a datafim que é a maior com a dataini
 $time = ($dtfim - $dtini);
 
 # Recupera os dias
 $days  = floor($time/86400);
 # Recupera as horas
 $hours = floor(($time-($days*86400))/3600);
 # Recupera os minutos
 $mins  = floor(($time-($days*86400)-($hours*3600))/60);
 # Recupera os segundos
 $secs  = floor($time-($days*86400)-($hours*3600)-($mins*60));
 
 # Monta o retorno no formato
 # 5d 10h 15m 20s
 # somente se os itens forem maior que zero
 $retorno  = "";
 $retorno .= ($days>0)  ?  $days .'d ' : ""  ;
 $retorno .= ($hours>0) ?  $hours .'h ': ""  ;
 $retorno .= ($mins>0)  ?  $mins .'m ' : ""  ;
 $retorno .= ($secs>0)  ?  $secs .'s ' : ""  ;
 
 # Se o dia for maior que 3 fica vermelho
 if($days > 3){
 return "<span style='color:red'>".$retorno."</span>";
 }
 return $retorno;
 
 }
 
 

 date_default_timezone_set("Brazil/East");

 $data2=date('d/m/Y H:i:s');


//include("../../gala/bd.php");
include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );

//echo $_POST["status_ci"];


/*$sql = "SELECT MAX(a.id_cotacao)as id_cotacao
               FROM tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               WHERE a.carteira LIKE '$canal%' and 
                       b.status_cip_analise NOT IN (3)  LIMIT 0,20000 ";
$acao2 = mysql_query($sql) or die (mysql_error());
while($linha_atv = mysql_fetch_assoc($acao2)){
echo $id_cotacafiltro=$linha_atv['id_cotacao'];
echo '<br>';
}*/

$nomeuser= (string) $_GET['nomeuser'];
$data_1= $_GET['data_1']; 
$data_2= $_GET['data_2'];
$setorf= (int) $_GET['setorf'];

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE nome='$nomeuser'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}


$sql ="SELECT DISTINCT a.id_swap,  
              a.cotacaopedido,
              a.data_da_solicitacao,
              a.hora_da_solicitacao,
              a.regional,
              a.status,
              a.data_da_tratativa_do_swap,
              a.solicitante,
              a.gerente_de_contas,
              a.total_de_linhas,
              a.total_de_linhas_swap,
              a.de_aparelho_inicial,
              a.para_aparelho_final,
              a.uf,
              a.carteira,
              a.adabas,
              a.hora_da_tratativa_swap, 
              a.login_operadores_swap,
              a.turno,
              a.remetente,
              a.swap,
              a.sp2,
              a.emailsolicitacao,
              a.retornoemail,
              a.statuscip,
              b.nome_gc, 
              a.tmt,
              a.revisao_swap,
              a.operador_swap,
              c.nome
FROM cip_nv.tbl_swap a   
LEFT JOIN cip_nv.remetente_swap b 
ON a.remetente=b.id
LEFT JOIN cip_nv.tbl_usuarios c 
ON a.operador_swap=c.idtbl_usuario

WHERE a.operador_swap='$idtbl_usuario' AND a.data_tratamento_swap_cip BETWEEN '$data_1' AND '$data_2' 
 
ORDER BY a.data_da_solicitacao";

 $setor="Swap";




?>

<table class="tablepadrao" >
<td>
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../forms/formdetalhes_visao_cotacao_operacao2.php?id_user=<?php echo $id_user ?>&setor=<?php echo $setor ?>" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light"><?php echo $setor; ?></font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de cotações a redistribuir</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

 <p>Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
   
   

   
    <table border="0" class="lista-clientesvisaoanalise" width="10%">
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


$diferenca=tempoData($data_da_solicitacao,$data2);

    if($solicitante == 1){
        $solicitante='GN GUARDIÃO';
    }
    if($solicitante == 2){
        $solicitante='GERENTE';
    }
    if($solicitante == 3){
        $solicitante='PRIORIDADE';
    }
    
 

     if($tmt < '48:00:00'){
         $slaswap="Dentro";
     }else{
         $slaswap="Fora";        
     }

        if($statuscip == 1){
         $statuscip='Tratando';
     }
     
     if($statuscip == 2){
        $statuscip='Tratado'; 
     }



?>
     <tr>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cotacaopedido</font>" ?></td>
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
  if(!empty($cao)){

  mysql_free_result($acao,$acao2,$acao_operador);

  }
  mysql_close($conecta); 

  ?> 

  <input type="hidden" name="status_cip" value="<?php echo $status_cip ?>"/>
  <input type="button" name="Submit2" value="Fechar" onclick="window.close();" class="sb2 bradius" />



</form>
</div>
</div>
</td>
</table>
</body>
</html>

