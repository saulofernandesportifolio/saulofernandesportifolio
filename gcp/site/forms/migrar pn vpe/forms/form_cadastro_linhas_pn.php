<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>

<head>

<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <script type="text/javascript" src="../../js/funcoesJs.js"></script>

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
  

 
  
function arrumadata($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4);
        
       }
return $data2;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}

$perfil= (int) $_GET['perfil'];
//echo '<br>';
$protocolo=(int) $_GET['protocolo'];
//echo '<br>'; 
$_COOKIE['idtbl_usuario'];
  
if($perfil != 1 && $perfil != 16){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
       window.close();
      </script>
 ";
  exit(); 
    
    
    
}
           

?>



<div class="divformusuario">

<form name="formulario" action="../controles/cadastrar_linhas_pn.php" method="post">
    
    <input type="hidden" name="perfil" value="<?php echo $perfil; ?>" />
    <input type="hidden" name="protocolo" value="<?php echo $protocolo; ?>" />
    <p align="center"><b><font color="#337ab7" size="4" face="Gotham Light">Cadastro de linhas VPE</font></b></p>
      <br />
                 
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">linha:&nbsp;
    <input  onblur="ValidaEntrada(this,'int');" id="linha_pn" name="linha_pn"  class="txt2comboboxmenor bradius" 
            placeholder="Somente Numeros"/>
     
</label>  
<label style="padding-left: 5px;">Data janela:&nbsp;
    <input type="text" name="dtjanela" id="data_janela"  maxlength="10" 
       class="txt2data bradius" onblur="ValidaEntrada(this,'date');" 
       onkeypress="Formatadata(this,event);"  placeholder="Somente data"/></label> 
</p>

</p>

 <br />





              <div style="padding-left:100px;">
                <input name="bt_enviar" id="bt_enviar" type="submit" value="Enviar" class="sb2 bradius">
                      
                <input name="limpar" type="reset" value="Limpar" class="sb2 bradius">
                      
               <input type="button" name="Submit2" value="Fechar" class="sb2 bradius" onClick="window.close();"> 
             

              </div>
             <br>     
            </form>
        </div>
    </div>

</body>
</html>
<?php
//include("../../gala/bd.php");
 include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );

 $sql = "SELECT DISTINCT * FROM bd_erros_pn.tbl_linha_chave_pn WHERE protocolo='$protocolo' ";

?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="#" method="post" id="frm-filtro">
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Historico de linhas adicionadas</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

   <br /><br />  

   
    <table border="0" class="lista-clientes"  width="auto">
    <thead> 
    
    <tr>
    <th><font size='1'  face='Arial'>LINHA</font></th>
    <th><font size='1'  face='Arial'>DATA JANELA</font></th>
    <th><font size='1'  face='Arial'>USUARIO</font></th>
    <th><font size='1'  face='Arial'>DATA CADASTRO</font></th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{





?>
     <tr>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['linha_pn']}</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>".arrumadata($linha_atv['data_janela'])."</font>"?></td>
   <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['usuario']}</font>"?></td>
   <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>".arrumadatahora($linha_atv['data_cadastro'])."</font>"?></td>

     </tr>
    
    </tr>
    <?php
    }
  ?>
    </tbody>
  </table>
  <br />
<input type="hidden" value="<?php echo $id_complementar_da_principal ?>" name="id_complementar_da_principal"/>
  <input type="button" name="Submit2" value="Fechar" onclick="window.close();" class="sb2 bradius" />

</form>
</div>
</div>

</body>