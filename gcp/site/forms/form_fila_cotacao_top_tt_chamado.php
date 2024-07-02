<head> 
    <meta http-equiv="refresh" content="url=principal.php?&t=forms/form_fila_cotacao_top_tt_chamado.php"/>
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
		}
  
  
  

  
 if($perfil != 13){
    
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
  
 

ini_set ('mysql.connect_timeout','30'); 
ini_set ('default_socket_timeout','30');
ini_set('memory_limit', '-1');

if(empty($_POST['n_da_cotacao'])){

  $_POST['n_da_cotacao']='%';
}

if(empty($_POST['tratativach'])){

  $_POST['tratativach']='%';
}



if($_POST['tratativach'] == '%'  && $_POST['n_da_cotacao'] == '%' ){

    $sql_cotachamado="CALL bd_erros_pn.fila_chamado_tt2("."'{$idtbl_usuario}'".","."'{$_POST['tratativach']}'".","."'{$_POST['n_da_cotacao']}'".")";

}elseif($_POST['tratativach'] != '%'  && $_POST['n_da_cotacao'] == '%' ){
    
    $sql_cotachamado="CALL bd_erros_pn.fila_chamado_tt2("."'{$idtbl_usuario}'".","."'{$_POST['tratativach']}'".","."'{$_POST['n_da_cotacao']}'".")";

    
}
$acao_cotacoeschamado = mysql_query($sql_cotachamado,$conecta) or die (mysql_error());
$num_chamado= mysql_num_rows($acao_cotacoeschamado);


if($num_chamado <= 0)
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
  de cota&ccedil;&otilde;es para serem analisadas</b></font></p>
<br />
<p><b><font color="#000000" size="2" face="Gotham Light">
  Voc&ecirc; tem um total de <?php echo "$num_chamado cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o. Clique 
    em Abrir para analisar:</b></font></p>
    <br />
    

  <form method="POST" action="exemplo.html" id="frm-filtro">
  
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    </form>

    <br /><br /><br /><br />


   
    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <tr>
    <th>PEDIDO/OV</th>
    <th>REGIONAL</th>
    <th>CLIENTE</th>
    <th>LINHAS</th>
    <th>TIPO</th>
    <th>TIPO NO VIVOCORP</th>
    <th>DATA</th>
    <th>VPE</th>
    <th>STATUS CIP</th>
    </thead>
     <tbody>
  <?php



while($dado = mysql_fetch_assoc($acao_cotacoeschamado))
{
	$idch            = $dado["idch"];
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
  
$data_inicio=arrumadata($data_inicio);

$ultima_atualizacao_status=arrumadata($ultima_atualizacao_status);

  $data_cad=arrumadatahora($data_cadastro);

  if($cor == "#CCCCCC"){
                  $cor= "#FFFFFF";
                    }else{
                    $cor= "#000000";
          }

          

?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'><a href=\"principal.php?&idch=$idch&t=forms/form_cotacoes_erros_top_tt_chamado.php\">$pedido</a></font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$linhas</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo_vivocorp</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_cad</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$vpe</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_cip</font>" ?></td>
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
   <input type="hidden" name="setor_orgem" value="<?php echo $setor_orgem ?>" />

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php'"/>
</p>
   </div>

    </div>
</div>


<?php

 mysql_free_result($acao_operador,$acao_cotacoeschamado,$acao_query);
 mysql_close($conecta);
 mysql_next_result($conecta);
?>


</body>
</html>
