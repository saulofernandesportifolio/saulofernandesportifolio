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
 /*filtro operador form auditoria por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_analise]").html('<option value="0">Carregando...</option>');
            $.post("processa_operadores.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operadores]").html(valor);
           $teste=$ln['login_operadores'];  
          }
                  )
         })
      }) 
 


     $(document).ready(function(){
         $("select[name=id_filtro2]").change(function(){
            $("select[name=descricao_erro]").html('<option value="0">Carregando...</option>');
            $.post("processa.php", 
                  {id_filtro2:$(this).val()},
                  function(valor){
                     $("select[name=descricao_erro]").html(valor);
           $teste=$ln['descricao_erro'];  
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
 $sql_valida = "SELECT a.id_auditoria_filha,a.id_cotacao,b.id_cotacao,c.n_da_cotacao     
                             FROM tbl_auditoria_filha a
                             INNER JOIN tbl_cotacao b 
                             ON b.id_cotacao=a.id_cotacao
                             INNER JOIN tbl_filhas c 
                             ON c.id_cotacao=a.id_cotacao_filha
                             WHERE a.id_auditoria_filha = '$id_auditoria' ";
                   
              $acao_valida = mysql_query($sql_valida) or die (mysql_error());   
              $linha_status_cip= mysql_fetch_array($acao_valida);
              $id_auditoria_filha = $linha_status_cip['id_auditoria_filha'];
              $id_cotacao = $linha_status_cip['id_cotacao'];
              $n_da_cotacao = $linha_status_cip['n_da_cotacao'];
 ?>             

<p align="center"  class="tituloformjava bradius"><font size="5" style="text-align: center;">Análise de input - Motivos Erros</font></p>


<div class="divformservicojava  bradius">
<form action="../controles/sql_cotacoesfilha_auditoria_tipo_de_erros4.php?id_auditoria_filha=<?php echo $id_auditoria_filha; ?>"  method="POST">

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cotação filha:&nbsp<?php echo $n_da_cotacao; ?></label>
</p>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ofensor:&nbsp;
<select name="ofensor" id="ofensor" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_ofensores_auditoria  ORDER BY ofensor";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['ofensor']}</option>";
   }
 ?> </select></label></p>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo erro:&nbsp;
<select name="id_filtro2" id="id_filtro2" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>
   <?php
  $sql = "SELECT * FROM tbl_tipo_de_erro_auditoria ORDER BY tipo_erro ";
                     $qr = mysql_query($sql) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro2'].'">'.$ln['tipo_erro'].'</option>';
                     }
   
 ?> </select></label></p>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Descricao erro:&nbsp;
<select name="descricao_erro" id="descricao_erro" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxgrande bradius">
   <option value="">Selecione....</option>
 
  </select></label>
</p>

<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Ação auditoria:&nbsp;
<select name="acao" id="acao" onblur="ValidaEntrada(this,'combo');" class="txt2comboboxpadrao bradius">
   <option value="">Selecione....</option>
   <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_acao_auditoria  ORDER BY acao";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['acao']}</option>";
   }
 ?> </select></label></p>


<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador:&nbsp;
 <select class="txt2comboboxpadrao bradius"  name="login_operadores" id="login_operadores">
      <option value="0" selected="selected">Selecione</option>
    </select>

<font color="#000000" size="3" face="Gotham Light">
    Turno:</font> 
   		<select name="id_filtro" id="id_filtro"  class="txt2comboboxpequeno bradius">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                       

					 
                     $sql = "SELECT * FROM tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select></label></p>

<br />

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.close();"/>
 
</form>

</div>

</div>



</body>
</html>

