<head> 
    <meta http-equiv="refresh" content="url=principal.php?&t=forms/form_fila_cotacao_pn_pos_logistica.php"/>
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
 
  var width = 780;
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
  
  
  

  
 if($perfil!= 16){
    
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
  
 

ini_set('mysql.connect_timeout','30'); 
ini_set('default_socket_timeout','30');
ini_set('memory_limit', '-1');

 $dt_diaf = date("Y-m-d");

 $sql_cotaanalise="CALL bd_erros_pn.fila_pn_pos_logistica("."'{$dt_diaf}'".","."'{$cpf}'".")";

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
  de portabilidades para serem analisadas na pos logistica</b></font></p>
<br />
<p><b><font color="#000000" size="2" face="Gotham Light">
  Voc&ecirc; tem um total de <?php echo "$num_analise pedidos"?> 
    na sua vis&atilde;o. Clique 
    em Abrir para analisar:</b></font></p>
    <br />
    

    <form method="POST" action="exemplo.html" id="frm-filtro">
  
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    </form>
   <br /><br /><br /><br />
   
    <input type="button" name="Submit2" class="sb2 bradius" value="Pos-analise" onclick="window.location='principal.php?t=forms/form_fila_cotacao_pn_pos_analise.php'"/>
     <input type="button" name="Submit2" class="sb2 bradius" value="Conclusao" onclick="window.location='principal.php?t=forms/form_fila_cotacao_pn_conclusao.php'"/>
     <br /><br />
    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <th>REGIONAL</th>
    <th>FORNECEDOR</th>
	  <th>DATA INICIO</th>
    <th>NUMERO PEDIDO</th>
	  <th>STATUS PEDIDO</th>
    <th>DATA JANELA</th>
    <th>TRATATIVA</th>
    <th>CHAMADO</th>
    <th>ERRO</th> 
    <th>PN</th>
    <th>STATUS CIP</th>
    <th>CADASTRO</th>
    <th>HISTORICO</th>
  </tr>
    </thead>
     <tbody>
  <?php



while($linha_atv = mysql_fetch_assoc($acao_cotacoesanalise))
{
	$id_pn           			     = $linha_atv["id_pn"];
  $regional                  = $linha_atv["regional"];
  $fornecedor                = $linha_atv["fornecedor"];
  $data_inicio               = $linha_atv["data_inicial"];
  $numero_pedido             = $linha_atv["numero_pedido"];
  $status_pedido             = $linha_atv["status_pedido"];
  $data_janela               = $linha_atv["data_janela"];
  $tratativa                 = $linha_atv["tratamento"];
  $chamado                   = $linha_atv["chamado"];
  $erro                      = $linha_atv["erro"];
  $pn                        = $linha_atv["pn"];
  $status_cip                = $linha_atv["status_tp"];
  $disc_status_cip           = $linha_atv["disc_status_tp"];

$data_inicio=arrumadata($data_inicio);

$ultima_atualizacao_status=arrumadata($ultima_atualizacao_status);

$data_janela=arrumadata($data_janela);

?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$fornecedor</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_inicio</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$numero_pedido</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_pedido</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_janela</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tratativa</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$chamado</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$erro</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$pn</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td> 
    <td>
<a href="javascript:abrir('site/forms/form_efetuar_cadastro_pn_pos_logistica.php?id_pn=<?php echo $id_pn ?>&id_user=<?php echo $idtbl_usuario  ?>');">
    <?php echo "<font size='1' color='$cor' face='Arial'>Efetuar</font>" ?></a></td>

 <td>
<a href="javascript:abrir2('site/forms/form_historico_pn.php?id_pn=<?php echo $id_pn ?>&id_user=<?php echo $idtbl_usuario  ?>');">
    <?php echo "<font size='1' color='$cor' face='Arial'>Visualizar</font>" ?></a></td>   
 </tr>
  <?php
  }
}


  ?>

</tbody>    
</table>

<br />


<?php

 mysql_free_result($acao_operador,$acao_cotacoesanalise,$acao_query);
 mysql_close($conecta,$conecta2);

?>


<p align="left">
  <input type="hidden" name="canal" value="<?php echo $canal ?>" />
 

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php'"/>

</p>
   </div>

    </div>
</div>

</body>
</html>
