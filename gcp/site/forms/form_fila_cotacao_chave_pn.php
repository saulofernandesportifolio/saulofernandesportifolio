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


if(empty($_POST['status_tpf'])){

  $_POST['status_tpf']='%';


}


$sql_cotaanalise="CALL bd_erros_pn.fila_chave_pn("."'{$cpf}'".","."'{$_POST['status_tpf']}'".")";

$acao_cotacoesanalise = mysql_query($sql_cotaanalise,$conecta2) or die (mysql_error());
$num_analise = mysql_num_rows($acao_cotacoesanalise);

/*if($num_analise <= 0)
{


    echo "<script type=\"text/javascript\">
            alert('Voce nao possui cotações em sua visão. Por favor entre em contato com a distribuição.');
      document.location.replace('principal.php');
       </script>";
        exit;
    
}
else{
*/


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
    

    <form name="myform" method="POST" action="principal.php?&t=forms/form_fila_cotacao_chave_pn.php" id="frm-filtro">
  
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    
   <br /><br /><br /><br />
   <p>
   <input type="button" name="Submit2" class="sb3 bradius" value="cadastrar manualmente" onclick="window.location='principal.php?t=forms/form_cotacoes_chave_pn_manual.php'"/>
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
            }

              ?></option>
          <?php } ?>
                     <option value="%">Todos</option>
                     <option value="1">Aberto</option>
                     <option value="2">Em tratamento</option>
                     <option value="4">Chamado TI</option>
                     <option value="5">Aguardando Comercial</option>
                     </select>
   </p>
</form>
   <br /><br />
    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <th>PROTOCOLO</th>  
    <th>PEDIDO</th>
    <th>SEGMENTO</th>
    <th>STATUS DO PDIDO</th>
    <th>LINHAS</th>
    <th>SOLICITANTE</th>
    <th>DATA JANELA VIVOCORP</th>
    <th>MOTIVO DA TRATATIVA</th>
    <th>DATA NOVA JANELA</th>
    <th>STATUS CIP</th>
    <th>OPERADOR</th>
    <th>EXCLUIR</th>
    </thead>
     <tbody>
  <?php


while($dado = mysql_fetch_assoc($acao_cotacoesanalise))
{
      	$id               = $dado["id_chave_pn"];
        $segmento         = $dado["segmento"];
        $protocolo        = $dado["protocolo"];
        $pedido           = $dado["pedido"];
        $status_do_pedido = $dado["status_pedido"];
        $linhas           = $dado["qtd_linha"];
        $solicitante      = $dado["solicitante"];
        $data_janela_vivocorp = $dado["data_janela"];
        $motivo_tratativa = $dado["motivo_tratativa"];
        $data_nova_janela = $dado["data_da_nova_janela"];
        $status_cip    = $dado['disc_status_fila'];
        $nomeop       = $dado['usuario'];
        
$data_janela_vivocorp=arrumadata($data_janela_vivocorp);

$data_nova_janela=arrumadata($data_nova_janela);


  if($cor == "#CCCCCC"){
                  $cor= "#FFFFFF";
                    }else{
                    $cor= "#000000";
          }

?>
  <tr bgcolor="#f5f5f5"> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'><a href=\"principal.php?&protocolo=$protocolo&id=$id&t=forms/form_cotacoes_chave_pn.php\">$protocolo</a></font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'><a href=\"principal.php?&protocolo=$protocolo&id=$id&t=forms/form_cotacoes_chave_pn.php\">$pedido</a></font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$segmento</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_do_pedido</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$linhas</font>"; ?></td> 
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$solicitante</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_janela_vivocorp</font>"; ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$motivo_tratativa</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$data_nova_janela</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_cip</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$nomeop</font>" ?></td>
    <td>
    <a href="principal.php?id=<?php echo $protocolo  ?>&t=controles/sql_excluir_chave_pn.php">EXCLUIR</a></td>
 </tr>
  <?php
  }
//}


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
