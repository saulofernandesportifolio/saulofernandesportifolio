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
function abrirrevisaocart(URL) {
 
  var width = 600;
  var height = 200;
 
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
  
if($perfil != 1 && $perfil != 4 && $perfil != 18 && $perfil != 21){
    
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



?>

<table class="tablepadrao" >
<td>
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>

<p align="center">


<form name="myform" action="principal.php?t=controles/sql_cadastro_carteira.php" method="post" id="frm-filtro">

<p align="center"><b><font color="#337ab7" size="5" face="Gotham Light">Cadastro Cliente</font></b></p>
<br />

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
    
     <tr>
      <td class="tdconteudo"><input type="text" name="cliente" value="" onblur="ValidaEntrada(this,'combo');" class="txtgrande bradius"></td>
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
      <td class="tdconteudo"><input type="text" name="cnpj" value="" value="" onblur="ValidaEntrada(this,'combo');" class="txt bradius"></td>

    </tr>
      </tbody>
  </table>
  <br />

  <?php

 mysql_free_result($acao_operador,$acao);
 mysql_close($conecta);

?>

    <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Cadastrar"  />

  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?&t=forms/form_atualizar_carteira.php'" class="sb2 bradius" />




</form>
</div>
</div>
</td>
</table>
</body>
</html>

