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
         $("select[name=login_operador_aud]").change(function(){
            $("select[name=turno]").html('<option value="0">Carregando...</option>');
            $.post("processa_operadoresfilhasaud.php", 
                  {login_operador_aud:$(this).val()},
                  function(valor){
                     $("select[name=turno]").html(valor);
           $teste=$ln['turno'];  
          })
         })
        
        }) 

</script>




</head>
<?php 

include("../../bd.php");
?>

<div id="filtroservicojava bradius">
<?php

$id_auditoria = (int) $_GET['id_auditoria'];

 $sql_valida = "SELECT a.id_auditoria,a.id_cotacao,b.id_cotacao,b.n_da_cotacao     
                             FROM cip_nv.tbl_auditoria a
                             INNER JOIN cip_nv.tbl_cotacao b 
                             ON b.id_cotacao=a.id_cotacao
                             WHERE a.id_auditoria = '$id_auditoria' ";
                   
              $acao_valida = mysql_query($sql_valida,$conecta) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $id_auditoria = $linha_status_cip['id_auditoria'];
              $id_cotacao = $linha_status_cip['id_cotacao'];
              $n_da_cotacao = $linha_status_cip['n_da_cotacao'];
 ?>             

<p align="center"  class="tituloformjava bradius"><font size="5" style="text-align: center;">Cadastro operador que realizou o input complementar</font></p>


<div class="divformservicojava  bradius">
<form action="../controles/sql_cotacoesprincipal_auditoria_registroinputfilhas.php?id_auditoria=<?php echo $id_auditoria; ?>"  method="POST">

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação:&nbsp<?php echo $n_da_cotacao; ?> </label>
</p>


  <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
     <label style="padding-left: 5px;">Operador input:&nbsp;
    <select class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');" name="login_operador_aud" id="login_operador_aud">
    <option value="" selected="selected">Selecione</option>
  
     <?php
                     $sql = "SELECT * FROM cip_nv.tbl_usuarios WHERE status=1 and perfil NOT IN (4,1) ORDER BY nome ASC ";
                     $qr = mysql_query($sql,$conecta) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
                     }
                     ?>


    </select>
 
     Turno:
      <select name="turno" id="turno"  class="txt2comboboxpequeno bradius">
                  <option value="" onblur="ValidaEntrada(this,'tcombo');" selected="selected">Selecione...</option>
                  <option value="<?php echo $turno; ?>" ><?php echo $turno; ?></option>
                     

      </select></label></font></p>

 <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Criado em:&nbsp;
   <input maxlength="19" name="criadoem" onKeyPress="DataHora2(event, this)" class="txt2datahora bradius">&nbsp;preencher conforme máscara: dd/mm/aaaa hh:mm:ss

</p>     

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Témino efetivo:&nbsp;
<input maxlength="19" name="terminoefetivo" onKeyPress="DataHora2(event, this)" class="txt2datahora bradius">&nbsp;preencher conforme máscara: dd/mm/aaaa hh:mm:ss

</p>

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
   
 <label style="padding-left: 5px;">Observação_input:<br />&nbsp;<textarea  name="obs_input" onblur="ValidaEntrada(this,'textarea');" class="txt2textarea bradius" ></textarea></label>   

</p>


<?php 

/*mysql_free_result($acao_valida,$result,$qr);
mysql_close($conecta); 
mysql_next_result($conecta);*/


?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input name="cancelar" type="button" value="Fechar" class="sb2 bradius" onclick="window.close();"/>
 
</form>

</div>

</div>



</body>
</html>

