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
 
  var width = 580;
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
 
  include("../../bd.php"); 
  
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
  
  
  

  
 if($perfil != 16){
    
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


$id_user = (int) $_GET['id_user'];
$id_pn = (int) $_GET['id_pn'];



$sql_cotaanalise="CALL bd_erros_pn.historico_pn("."'{$id_pn}'".")";

$acao_cotacoesanalise = mysql_query($sql_cotaanalise,$conecta2) or die (mysql_error());
$num_analise = mysql_num_rows($acao_cotacoesanalise);

if($num_analise <= 0)
{


    echo "<script type=\"text/javascript\">
            alert('Sem historico no momento.');
            window.close();
       </script>";
        exit;
    
}
else{


?>




<table class="tablepadrao" >
<td>

<div class="divformdistribuicaoservico">
<div id="filtroservico" class="form bradius">

<p></p>
<p><b><font color="#337ab7" size="3" face="Gotham Light">Historico portabilidade pos analise</b></font></p>
<br />

    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <th>REGIONAL</th>
    <th>FORNECEDOR</th>
	  <th>DATA INICIO</th>
    <th>NUMERO PEDIDO</th>
	  <th>STATUS PEDIDO</th>
    <th>ULTIMA ATUALIZACAO STATUS</th>
    <th>DATA JANELA</th>
    <th>CHAMADO</th>
    <th>ERRO</th> 
    <th>PN</th>
    <th>STATUS CIP</th>
    <th>TRAMITOU</th>
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
  $ultima_atualizacao_status = $linha_atv["ultima_atualizacao_status"];
  $data_janela               = $linha_atv["data_janela"];
  $chamado                   = $linha_atv["chamado"];
  $erro                      = $linha_atv["erro"];
  $pn                        = $linha_atv["pn"];
  $status_cip                = $linha_atv["status_tp"];
  $disc_status_cip           = $linha_atv["disc_status_tp"];
  $tramitou                  = $linha_atv["tramitou"];

$data_inicio=arrumadata($data_inicio);

$ultima_atualizacao_status=arrumadata($ultima_atualizacao_status);

$data_janela=arrumadata($data_janela);

$cor='#000000';   

?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$fornecedor</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_inicio</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$numero_pedido</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_pedido</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$ultima_atualizacao_status</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_janela</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$chamado</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$erro</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$pn</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tramitou</font>" ?></td>
</td>

 </tr>
  <?php


  }
}


  ?>

</tbody>    
</table>

<br />

<?php

error_reporting(0);
ini_set("display_errors", 0 );


 mysql_free_result($acao_operador,$acao_cotacoesanalise,$acao_query);
 mysql_close($conecta,$conecta2);

?>


<p align="left">

  <input type="hidden" name="id_pn" value="<?php echo $id_pn ?>" />

  <input type="button" name="Submit2" class="sb2 bradius" value="Fechar" onclick="window.close();"/>

</p>
   </div>

    </div>
</div>
</td>
</table>
</body>
</html>
