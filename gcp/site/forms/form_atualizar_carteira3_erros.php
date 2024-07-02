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
  
include("../../bd.php");


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_GET['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 19 && $perfil != 17 && $perfil != 18 && $perfil != 21){
    
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





if(empty($_GET['cpf_cnpj']) ){ 
    
echo "
       <script type=\"text/javascript\">
        alert('É nescessário digitar um cnpj válido !');
        history.back();
      </script>
 ";
  exit();     
    
}  


$sql="SELECT  
carteira.Cliente,
carteira.carteira,
carteira.tipo_de_cliente,
carteira.CNPJ_CPF_do_grupo_economico,
carteira.cpf_cnpj,
carteira.data_carga,
carteira.carregado_por_cip
FROM
bd_erros_pn.carteira
WHERE
carteira.cpf_cnpj ='{$_GET['cpf_cnpj']}'";





?>

<table class="tablepadrao" >
<td>
<div id="filtroservicocart" class="form bradius">
<div class="divformservicocart">

<p></p>

<p align="center">


<form name="myform" action="../controles/sql_form_atualizar_carteira3_erros.php" method="post" id="frm-filtro">



<?php
$acao = mysql_query($sql,$conecta2) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

 <p>Total de <?php echo "$num_ cliente"?>:</font></p>
  <br />
      
    <table border="0" class="lista-clientes">
    <thead> 
    
    <tr>
    <th>CLIENTE</th>
    <th>CARTEIRA</th>
    <th>CNPJ</th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{
    
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["Cliente"];
  $cpf_cnpj             = $linha_atv["cpf_cnpj"];
 

?>


     
     <tr>
      <td class="tdconteudo"><?php echo "<font size='1' face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><select name="tipo2" id="tipo2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius" >
   <option value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
   <?php  
   //seleciona a base de dados para uso
   $query33= "SELECT carteira FROM cip_nv.carteira2 GROUP BY carteira ";
   $result33= mysql_query($query33,$conecta);    
 
   while($dado= mysql_fetch_array($result33)){
         echo "<option value=\"{$dado['carteira']}\">
            {$dado['carteira']}</option>";
   }
 ?> </select></td>
      <td class="tdconteudo"><?php echo "<font size='1' face='Arial'>$cpf_cnpj</font>" ?></td>
     </tr>
    <?php
  	}
	?>
    </tbody>
  </table>
  <br />

  <?php

 //mysql_free_result($acao_operador,$acao);
 //mysql_close($conecta,$conecta2);

?>
<input type="hidden" name="cpf_cnpj" value="<?php echo $cpf_cnpj ?>" />

<input type="hidden" name="id_user" value="<?php echo $idtbl_usuario ?>" />

 <input type="submit" name="Submit" value="Efetuar cadastro" class="sb3 bradius" />

</form>
</div>
</div>
</td>
</table>
</body>
</html>

