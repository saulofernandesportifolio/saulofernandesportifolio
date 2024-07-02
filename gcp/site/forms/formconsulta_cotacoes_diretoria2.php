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
  
if($perfil != 1 && $perfil != 15){
    
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
  
     function arrumadata2($string3) {
    if($string3 == ''){
    $data= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);   
        
    }else{
        
    $data= substr($string3,6,4)."/".substr($string3,3,2)."/".substr($string3,0,2);   
    }

 return $data;
} 

echo "<br>";


$sql="CALL cip_nv.visao_pesquisa_diretoria("."'{$_GET['id_cota']}'".")";


$acao = mysql_query($sql,$conecta) or die (mysql_error());
echo $num_ = mysql_num_rows($acao);

if( $num_ == 0){

  $id_cota=$_GET['id_cota']; 
    
echo "<script>
           alert('Efetue o cadastro ponto de focal desta cotação.');
            document.location.replace('principal.php?&id_cota=$id_cota&t=forms/form_diretoria.php');
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

<p align="center"><b><font color="#337ab7" size="3" face="Gotham Light">Resumo - cotação</font></b></p>
<br />

<p><font color="#337ab7" size="2" face="Gotham Light"><strong>Lista de Cotações</strong></font></p>
<br />


 <p><?php echo "<font color='#000000' size='2' face='Gotham Light'>Total de  $num_ cota&ccedil;&otilde;es</font>"?>:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
    <table border="0" class="lista-clientes">
    <thead> 
    
    <tr>
    <tr>
    <th>COTACAO/PEDIDO</th>
    <th>REVISÃO</th>
    <th>REGIONAL</th>
    <th>UF</th>
    <th>CLIENTE</th>
    <th>AÇÃO</th>
    <th>SEGMENTO</th>
    <th>VISÃO ILHA</th>
    <th>VENCIMENTO</th>
    <th>STATUS SLA</th>
    <th>TIPO SERVIÇOS</th>
    <th>DATA DO RECEBIMENTO</th>
    <th>HORA DO RECEBIMENTO</th>
    <th>TOTAL LINHAS</th>
    <th>SOLICITANTE VIVO/ACCENTURE</th>
    <th>SOLICITANTE COMERCIAL</th>
  <!--<th>TMT</th>
    <th>SLA</th>-->
    <th>STATUS CIP PONTO FOCAL</th>
    <th>OPERADOR PONTO FOCAL</th>
    
    </tr>
     </thead>
         <tbody>
    
    <?php

while($linha_atv = mysql_fetch_assoc($acao))
{
  $id_cotacao                 = $linha_atv["id_cotacao"]; 
  $id_diretoria               = $linha_atv["id"];
  $cotacao_atividade          = $linha_atv["cotacao_atividade"];
  $n_da_cotacao               = $linha_atv["n_da_cotacao"];
  $revisao2                   = $linha_atv["revisao"];
  $regional                   = $linha_atv["regional"];
  $uf                         = $linha_atv["uf"];
  $cliente                    = $linha_atv["cliente"];
  $criado_em                  = arrumadatahora($linha_atv["criado_em"]);
  $acao                       = $linha_atv["acao"];
  $segmento                   = $linha_atv["segmento"];
  $data_do_recebimento        = arrumadata($linha_atv["data_de_recebimento"]);
  $hora_do_recebimento        = $linha_atv["hora_de_recebimento"];
  $total_linhas               = $linha_atv["total_linhas_cip"];
  $solicitante_vivo_accenture = $linha_atv["solicitante_vivo_accenture"];
  $solicitante                = $linha_atv["remetente"];
  $tmt                        = $linha_atv["tmt"];
  $disc_statusdiretoria       = $linha_atv["disc_statusdiretoria"];
  $operador_diretoria         = $linha_atv["operador_diretoria"];
  $nome_vivo_accenture        = $linha_atv["nome_vivo_accenture"];
  $nome_solicitante           = $linha_atv["nome_solicitante"];
  $operador_diretoria	      = $linha_atv["operador_diretoria"];
  $visao_ilha                 = arrumadatahora($linha_atv2["visao_ilha"]);
  $vencimento_ilha            = arrumadatahora($linha_atv2["vencimento_ilha"]);
  $prazo_dias                 = $linha_atv2["PRAZO_DIAS"];
  $tipo_servico               = $linha_atv2["TIPO_SERVICO"];
  
 $hora_base=48;

 if($tmt > $hora_base ){

      $cor = '#FF0000';

     //echo $cpf_cnpj;
  
    }else{ 
      $cor = '#464646';

     // echo $cpf_cnpj;
    } 
  
   $hora_base=48;

     if($tmt < $hora_base){
         //echo "ok";

         $slaswap="Dentro";
     }else{
         $slaswap="Fora";        
     }     
 

?>
    <tr>
  
     <td class="tdconteudo"><?php echo "<a href='principal.php?&id=$id_diretoria&t=forms/form_diretoria_tt.php'><font size='1' color='$cor' face='Arial'>$cotacao_atividade</font></a>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao2</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>"; ?></td> 
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$uf</font>"; ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$acao</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$segmento</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$visao_ilha</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$vencimento_ilha</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$prazo_dias</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo_servico</font>" ?></td>     
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_do_recebimento</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$hora_do_recebimento</font>" ?></td>
     <td class="tdconteudo">
     <a href="javascript:abrir('site/forms/formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
     <?php echo "<font size='1' color='$cor' face='Arial'>$total_linhas</font>" ?></a></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$nome_vivo_accenture</font>" ?></td>
     <td><?php echo "<font size='1' color='$cor' face='Arial'>$nome_solicitante</font>"; ?></td>
    <!--<td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tmt</font>" ?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$slaswap</font>" ?></td>-->
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_statusdiretoria</font>"?></td>
     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$operador_diretoria</font>" ?></td>
    </tr>
    <?php
  
     }
	?>
    </tbody>
  </table>
  <br />

<?php

 //mysql_free_result($acao_operador,$acao);
 mysql_close($conecta);

?>

  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/formconsulta_cotacoes_diretoria.php'" class="sb2 bradius" />



</form>
</div>
</div>
</td>
</table>
</body>
</html>

