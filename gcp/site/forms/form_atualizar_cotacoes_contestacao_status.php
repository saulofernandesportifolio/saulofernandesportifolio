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
          }form_exclui_cotacoes_contestacao_ofensor.php
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd'form_exclui_cotacoes_contestacao_ofensor.php).addClass('odd');
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
  
 
//include("../../gala/bd.php");
 include("../../bd.php");
ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );

//echo $_POST["status_ci"];


/*$sql = "SELECT MAX(a.id_cotacao)as id_cotacao
               FROM tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               WHERE a.carteira LIKE '$canal%' and 
                       b.status_cip_analise NOT IN (3)  LIMIT 0,20000 ";
$acao2 = mysql_query($sql) or die (mysql_error());
while($linha_atv = mysql_fetch_assoc($acao2)){
echo $id_cotacafiltro=$linha_atv['id_cotacao'];
echo '<br>';
}*/
$id_contestacao_cotacao=(int) $_GET['id_contestacao_cotacao'];

$sql = "SELECT a.id_cotacao,
               a.n_da_cotacao,
               a.cotacao_principal,
               b.id_contestacao_cotacao,
               b.id,
               c.nome as analista_contestacao,
               d.item as ofensor,
               e.item as tipo2,
               f.item as tipo_apurado,
               g.nome as analista_ofensor,
               h.turno as turno_ofensor,
               i.item as contestacao      
        FROM cip_nv.tbl_cotacao a 
        INNER JOIN cip_nv.base_erros_cotacao_contestacao b
        ON b.id_cotacao=a.id_cotacao  
        LEFT JOIN cip_nv.tbl_usuarios c 
        ON b.analista_contestacao=c.idtbl_usuario 
        LEFT JOIN cip_nv.cont_ofensor_input d 
        ON b.ofensor=d.id
        LEFT JOIN cip_nv.cont_motivos_erro_input e 
        ON b.tipo2=e.id   
        LEFT JOIN cip_nv.cont_sub_motivos_erro_input f 
        ON b.tipo_apurado=f.id  
        LEFT JOIN cip_nv.tbl_usuarios g                    
        ON b.analista_ofensor=g.idtbl_usuario 
        LEFT JOIN cip_nv.tbl_turno h                    
        ON b.turno_ofensor=h.id_filtro 
         LEFT JOIN cip_nv.cont_contestacao i                     
        ON b.contestacao=i.id

        WHERE  b.id_contestacao_cotacao = '$id_contestacao_cotacao' ";
                   

   
            

?>



<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" action="../controles/sql_atualizar_cotacoes_contestacao_status4.php" method="post" id="frm-filtro">

<br />

<p><font color="#337ab7" size="4" face="Gotham Light"><strong>Lista de ofensores para excluir</strong></font></p>
<br />
<?php
$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);


/*if($num_ == 0){

echo "<script>alert('Nenhuma cotacao complementar encontrarda ate o momento.'); window.history.go(-1); </script>\n";
  exit;

}*/


?>


 <p>Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o:</font></p>
  <br />
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
   
   

   
    <table border="0" class="lista-clientes" >
    <thead> 
    
    <tr>
    <th><font size='1'  face='Arial'>PRINCIPAL</font></th>
    <th><font size='1'  face='Arial'>COMPLEMENTAR</font></th>
    <th><font size='1'  face='Arial'>ANALISTA CONTESTACAO</font></th>
    <th><font size='1'  face='Arial'>OFENSOR</font></th>
    <th><font size='1'  face='Arial'>TIPO2</font></th>
    <th><font size='1'  face='Arial'>TIPO APURADO</font></th>
    <th><font size='1'  face='Arial'>OPERADOR REPROVACAO</font></th>
    <th><font size='1'  face='Arial'>TURNO</font></th>
    <th><font size='1'  face='Arial'>CONTESTACAO</font></th>
     
  </tr>
    </thead>
         <tbody>
    
    <?php


while($linha_atv = mysql_fetch_assoc($acao))
{
 
$id_erro=$linha_atv['id'];




?>
    <tr>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['cotacao_principal']."</font>"?></td>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['n_da_cotacao']."</font>"?></td>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['analista_contestacao']."</font>"?></td>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['ofensor']."</font>"?></td>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['tipo2']."</font>"?></td>
    <td><?php echo "<font size='1' face='Arial'>".$linha_atv['tipo_apurado']."</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' face='Arial'>".$linha_atv['analista_ofensor']."</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' face='Arial'>".$linha_atv['turno_ofensor']."</font>" ?></td>
    <td class="tdconteudo"><select name="contestacao" id="contestacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequenino bradius">
   <option value="<?php echo $linha_atv['contestacao'] ?>" ><?php echo $linha_atv['contestacao']; ?></option>
   <?php
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.cont_contestacao  ORDER BY item";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['item']}</option>";
   }
 ?> </select>
    </tr>
    <?php
    }
  ?>
    </tbody>
  </table>
  <br />


<?php

 mysql_free_result($acao);
 mysql_close($conecta);

?>
  <input type="hidden" name="id_contestacao_cotacao" value="<?php echo $id_contestacao_cotacao  ?>" />
  <input type="hidden" name="id_erro" value="<?php echo $id_erro;  ?>" />
  
  <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
  <input type="button" name="Submit2" value="Fechar" onclick="window.close()" class="sb2 bradius" />

</form>
</div>
</div>

</body>
</html>