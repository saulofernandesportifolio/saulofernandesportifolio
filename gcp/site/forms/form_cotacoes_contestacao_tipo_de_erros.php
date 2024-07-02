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
            $.post("principal.php?t=forms/processa_operadorescont.php", 
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
            $.post("principal.php?t=forms/processa_motivos_erroscont.php", 
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
            $.post("principal.php?t=forms/processa_sub_motivos_erroscont.php", 
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
echo

"<script>
 alert('Atenção se possuir mais erros refente a contestação da cotacao cadastra-los');
       
</script>";


?>





<div id="filtroservico bradius">
<?php
 $sql_valida = "SELECT  a.id_cotacao,a.n_da_cotacao,b.id_contestacao_cotacao     
                             FROM cip_nv.base_contestacoes_cotacao b 
                             INNER JOIN cip_nv.tbl_cotacao a 
                             ON a.id_cotacao=b.id_cotacao                       
                             WHERE  a.id_cotacao = '$id_cotacao' AND b.id_contestacao_cotacao ='$idcont' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              //$id_auditoria = $linha_status_cip['id_auditoria'];
              $id_cotacao = $linha_status_cip['id_cotacao'];
              $n_da_cotacao = $linha_status_cip['n_da_cotacao'];
 ?>             

<p align="center"  class="tituloform bradius">
<font size="5" style="text-align: center;">Contestação - Motivos Erros</font></p>


<div class="divformservico  bradius">
<form action="#"  method="POST">

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação:&nbsp<?php echo $n_da_cotacao; ?> </label>
</p>
<br />
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
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo2:&nbsp;
<select name="tipo2" id="tipo2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>

   
 </select></label></p>
<br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo apurado:&nbsp;
<select name="tipo_apurado" id="tipo_apurado" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>
 
  </select></label>
</p>
<br />
  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador da Reprovação:&nbsp;
    <select class="txt2comboboxpadrao bradius"  name="login_operadores_cont" id="login_operadores_cont">
    <option value="" selected="selected">Selecione</option>

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


<br />

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


mysql_free_result($acao_valida,$result,$qr);
mysql_close($conecta);
mysql_next_result($conecta);

?>

</br> 

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input name="cancelar" type="button" value="Fechar" class="sb2 bradius" onclick="window.close();"/>
 
</form>

</div>

</div>



</body>
</html>

