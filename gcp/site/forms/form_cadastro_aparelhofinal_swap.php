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

$perfil= (int) $_GET['perfil'];

  $id_swap=(int) $_GET['id_swap'];
  
if($perfil != 1 && $perfil != 20){
    
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

<form name="formulario" action="../controles/cadastrar_aparelhofinal_swap.php" method="post">
    
    <input type="hidden" name="perfil" value="<?php echo $perfil; ?>" />
   <input type="hidden" name="id_swap" value="<?php echo $id_swap; ?>" />
   <p align="center"><b><font color="#337ab7" size="4" face="Gotham Light">Cadastro Aparaelho Final VPG</font></b></p>
      <br />
                 
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Aparelho final(PARA):&nbsp;
<input  onblur="valida(this,'text');" id="ap_final" name="ap_final" value="<?php echo $dado['para_aparelho_final'];  ?>"  class="txtgrande bradius"/>
</label> 

<label style="padding-left: 5px;">Qtd:&nbsp;
    <input  onblur="valida(this,'text');" id="para_qtd" name="para_qtd"   class="txtpequeno bradius"/>
</label>  
</p>

</p>

 <br />



              <div style="padding-left:100px;">
                <input name="enviar" type="submit" value="Enviar" class="botao_padrao" >
                      
                <input name="limpar" type="reset" value="Limpar" class="botao_padrao">
                      
               <input type="button" name="Submit2" value="Fechar" class="botao_padrao" onClick="window.close();"> 
             

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

 $sql = "SELECT
              a.aparelho as apini, 
              a.qtd as qtdini,
              b.aparelho as apfim,
              b.qtd as qtdfim  
            FROM cip_nv.tbl_swap_aparelho a 
            LEFT JOIN (SELECT
                 aparelho,
                 qtd,
                 revisao_ap   
            FROM cip_nv.tbl_swap_aparelho 
            WHERE id_swap='$id_swap' AND tipo='final' )b 

            ON b.revisao_ap=a.revisao_ap
            WHERE a.id_swap='$id_swap' AND a.tipo='inicial'
            GROUP BY a.id_swap,a.revisao_ap";

?>


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../forms/formbaixar_filhas_direto_input2.php" method="post" id="frm-filtro">
<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Historico de aparelhos adicionados</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);
?>

   <br /><br />  

   
    <table border="0" class="lista-clientes" >
    <thead> 
    
    <tr>
    <th><font size='1'  face='Arial'>DE APARELHO INICIAL</font></th>
    <th><font size='1'  face='Arial'>QTD</font></th>
    <th><font size='1'  face='Arial'>DE APARELHO FINAL</font></th>
    <th><font size='1'  face='Arial'>QTD</font></th>
  </tr>
    </thead>
         <tbody>
    
    <?php




while($linha_atv = mysql_fetch_assoc($acao))
{






?>
     <tr>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['apini']}</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['qtdini']}</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['apfim']}</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1'  face='Arial'>{$linha_atv['qtdfim']}</font>"?></td>

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