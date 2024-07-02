<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>

<head>

<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/funcoesJs.js"></script>
<link rel="shortcut icon" href="../../css/imagem/Icone_Empreza.jpg" type="image/x-icon" />

<script type="text/javascript" src="../../js/jquery2.js"></script>
<script>
 /*filtro operador form auditoria por setor*/
$(document).ready(function(){
         $("select[name=login_operadores_cont]").change(function(){
            $("select[name=turno]").html('<option value="0">Carregando...</option>');
            $.post("processa_operadorescont.php", 
                  {login_operadores_cont:$(this).val()},
                  function(valor){
                     $("select[name=turno]").html(valor);
           $teste=$ln['turno'];  
          })
         })
        
        }) 
 
     $(document).ready(function(){
         $("select[name=ofensor]").change(function(){
            $("select[name=tipo2]").html('<option value="0">Carregando...</option>');
            $.post("processa_motivos_erroscont.php", 
                  {ofensor:$(this).val()},
                  function(valor){
                     $("select[name=tipo2]").html(valor);
           $teste=$ln['tipo2'];  
          }
                  )
         })
      })


     $(document).ready(function(){
         $("select[name=tipo2]").change(function(){
            $("select[name=tipo_apurado]").html('<option value="0">Carregando...</option>');
            $.post("processa_sub_motivos_erroscont.php", 
                  {tipo2:$(this).val()},
                  function(valor){
                     $("select[name=tipo_apurado]").html(valor);
           $teste=$ln['tipo_apurado'];  
          }
                  )
         })
      })

</script>



</head>
<?php 

include("../../bd.php");
?>

<div id="filtroservicojava bradius">
<?php
 $sql_valida = "SELECT * FROM cip_nv.base_contestacoes_cotacao_manual b 
                                         
                             WHERE  b.id_contestacao_cotacao = '$id_contestacao_cotacao' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $cotacao_atividade_pedido = $linha_status_cip['cotacao_atividade_pedido'];
              $id_contestacao_cotacao=  $linha_status_cip['id_contestacao_cotacao'];
?>
<p align="center"  class="tituloformjava bradius">
<font size="5" style="text-align: center;">Contestação manual - Motivos Erros</font></p>


<div class="divformservicojava  bradius">
<form action="../controles/sql_cotacoes_contestacao_tipo_de_erros4manual.php?id_contestacao_cotacao=<?php echo $id_contestacao_cotacao; ?>"  method="POST">

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotacao/Atividade/Pedido:&nbsp<?php echo $cotacao_atividade_pedido; ?> </label>
</p>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ofensor:&nbsp;
<select name="ofensor" id="ofensor" onblur="validaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php


      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.cont_ofensor_input  ORDER BY item";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['item']}</option>";
   }
 ?> </select></label></p>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo2:&nbsp;
<select name="tipo2" id="tipo2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
<option value="0" selected="selected">Selecione......</option>

   
 </select></label></p>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo apurado:&nbsp;
<select name="tipo_apurado" id="tipo_apurado" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
  <option value="0" selected="selected">Selecione</option>
 
  </select></label>
</p>

  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador da Reprovação:&nbsp;
    <select class="txt2comboboxpadrao bradius"  name="login_operadores_cont" id="login_operadores_cont">
    <option value="0" selected="selected">Selecione</option>

     <?php
                     $sql = "SELECT * FROM cip_nv.tbl_usuarios WHERE status=1 and perfil NOT IN(4) ORDER BY nome ASC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
                     }
                     ?>


    </select>
 
     Turno:
      <select name="turno" id="turno"  class="txt2comboboxpequeno bradius">
                  <option value="0" selected="selected">Selecione...</option>
                  <option value="<?php echo $turno; ?>" ><?php echo $turno; ?></option>
                     

      </select></label></font></p>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Contestacao:&nbsp;
<select name="contestacao" id="contestacao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpequenino bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

      
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.cont_contestacao  ORDER BY item";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['item']}</option>";
   }
 ?> </select></label></p>

<?php 

/*mysql_free_result($acao_valida,$result,$qr);
mysql_close($conecta);*/

?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input name="cancelar" type="button" value="Fechar" class="sb2 bradius" onclick="window.close();"/>
 
</form>

</div>

</div>



</body>
</html>

