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
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
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
  
if($perfil != 1 && $perfil != 4 &&  $perfil != 17){
    
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
  


ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );







if(empty($_POST["ling"])){
    
 echo "
       <script type=\"text/javascript\">
        alert('Selecione alguma cotação !');
        history.back();
	    </script>
 ";   
    
    
 exit();   
}



?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_retornardistribuicao_erros4_top_tt.php" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Erros TT</font></b></p>
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de pedidos a retornar</strong></font></p>
<br />


      
<input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
</p>

<br /><br /><br /><br />
   
<br /><br />

    <table border="0" class="lista-clientes" >
    <thead> 
    <tr> 
    <th>
    </th>
    <th>PEDIDO</th>
    <th>REGIONAL</th>
    <th>CLIENTE</th>
    <th>LINHAS</th>
    <th>TIPO</th>
    <th>TIPO NO VIVOCORP</th>
    <th>DATA</th>
    <th>VPE</th>
    <th>STATUS CIP</th>

  </tr>
    </thead>
         <tbody>
    
    <?php
foreach($_POST["ling"] as $id)
{




    $query= "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil = 1 and 
                   idtbl_usuario = '$idtbl_usuario '";
    $acao_atv=mysql_query($query,$conecta);
    
    while($linha_user = mysql_fetch_assoc($acao_atv))
    {
    $login	=	$linha_user["usuario"];
    $nome   =	$linha_user["nome"];
    $canal =  $linha_user["tramite"]; 
    //$situacao = $linha_op["situacao"];
    $usuario="$login";
    //$regional2 = $linha_user["regional"];	
    }


$sql ="SELECT * FROM bd_erros_pn.base_erros_top_tt a 
       WHERE a.id = '$id'    
       ORDER BY a.criado_em ASC LIMIT 0,20000";


$acao = mysql_query($sql,$conecta2) or die (mysql_error());

while($dado = mysql_fetch_assoc($acao))
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
        $status_tp     = $dado['status_tp'];

 $criado_em=arrumadatahora($criado_em);


$data_inicio=arrumadata($data_inicio);

$ultima_atualizacao_status=arrumadata($ultima_atualizacao_status);

  $data_cad=arrumadatahora($data_cadastro);

  if($cor == "#CCCCCC"){
                  $cor= "#FFFFFF";
                    }else{
                    $cor= "#000000";
          }



?>
 
     <tr> 
     <td>
     <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id" ?>" checked readonly="True"/></td>

     <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$pedido</font>"; ?></td>
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

 <?php

  mysql_free_result($acao,$acao_operador,$acao_atv);
  mysql_close($conecta,$conecta2);  

  ?>

<p>

  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Retornar" class="sb2 bradius" />
 </p>
</form>
</div>
</div>


