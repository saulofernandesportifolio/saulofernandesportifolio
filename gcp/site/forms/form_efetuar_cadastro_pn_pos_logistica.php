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
  
 
//include("../../gala/bd.php");
include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );

//echo $_POST["status_ci"];
$id_user = (int) $_GET['id_user'];
$id_pn = (int) $_GET['id_pn'];

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='$id_user'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}



?>
<table class="tablepadrao" >
<td>
<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>



<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Cadastro Motivo PN</strong></font></p>
    <form name="form1"  method="POST" action="../controles/sql_cadastro_pn2.php" />

    <table border="0" id="frm-filtro" width="auto" class="lista-clientes">
   
    <thead> 
    <tr>
    <th>TRATATIVA</th>
    <th>CHAMADO</th>
    <th>ERRO</th> 
    <th>STATUS CIP</th>
    </tr>
    </thead>
     <tbody>
   <tr bgcolor="#f5f5f5">
   <td class="tdconteudo">
    <input type="text" id="tratamento" name="tratamento" size="30" class="txtmedio bradius"  placeholder="preencher os campos"  /></td> 
   <td class="tdconteudo">
    <input type="text" id="chamado" name="chamado" size="30" class="txtmedio bradius"  placeholder="preencher os campos"  /></td>
    <td class="tdconteudo">
    <input type="text" id="erro" name="erro" size="30" class="txtmedio bradius"  placeholder="preencher os campos"  /></td>
    <td class="tdconteudo">
    <select name="status_cip" id="status_cip" class="txt2comboboxpequenino bradius" >
      <option value="0" >Selecione...</option>
      <option value="1" >Tratativa</option>
      <option value="2" >Tratado</option>
               
</select> 
</td>
</tbody>    
</table>

<br />

<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>

  <input type="hidden" name="id_pn" value="<?php echo $id_pn  ?>"/>
  <input type="hidden" name="id_user" value="<?php echo $idtbl_usuario  ?>"/>


  <input type="button" name="Submit2" value="Fechar" onclick="window.close();" class="sb2 bradius" />

    <input type="submit" name="Submit" value="Efetuar cadastro" class="sb2 bradius" />

</form>
</div>
</div>
</td>
</table>
</body>
</html>

