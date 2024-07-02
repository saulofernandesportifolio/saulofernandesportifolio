<?php 
setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

?>

<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario">

<form style="background:#E7E4D1;" class="bradius" action="principal.php?&t=controles/sql_cadastro_usuario4.php" method="post" enctype="multipart/form-data" name="form1" >
  <p align="center"><b><font color="#337ab7" size="4" face="Gotham Light">Cadastro Usu&aacute;rio <?php echo $page2; ?></font></b></p>
      <br />
  
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome:&nbsp;<input type="text" name="nome" value="" id="nome" class="txtgrande bradius" /></label> 
</p>
 <br />
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">CPF:&nbsp;<input type="text" name="cpf" value="" id="cpf" class="txt bradius" maxlength="11" onblur="ValidaEntrada(this,'cpf');"/>* Somente Numeros</label> 
</p>
 <br />
 <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">
    Selecione o setor:&nbsp; 
    <select class="txt2comboboxpequeno bradius" class="sb" name="setor_user" id="setor_user">
    <?php if( $canal == "%") {?>
      <option value="0" selected="selected">Selecione</option>
      <option value="2">An&aacute;lise</option>
      <option value="3">Input</option>
      <option value="5">An&aacute;lise de input</option>
      <option value="6">Corre&ccedil;&atilde;o</option> 
      <option value="12">Operador - CO</option> 
      <option value="13">Chamado</option>  
      <option value="14">Contesta&ccedil;&atilde;o</option>
      <option value="15">Diretoria</option>
      <option value="16">Portabilidade</option>
      <option value="17">Erros-TT</option>
      <option value="18">Analista-lider</option>
      <option value="19">Erros</option>
      <option value="20">Swap</option>
      <?php }?>
               
    </select>
    &nbsp;
    Turno: 
   		<select name="turno_user" id="turno_user" class="txt2comboboxpequeno bradius">
        <option value="0" selected="selected">Selecione</option>
        <option value="1" >Diurno</option>
        <option value="2" >Intermedi&aacute;rio</option>
        <option value="3" >Noturno</option>
          
</select></label>
</p>
<br />
 <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">
    Supervisor Operador:</font> 
   		<select name="supervisor_user" id="supervisor_user" class="txt2comboboxpadrao bradius">
        <option value="0" selected="selected">Selecione</option>
       <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_supervisor 
        WHERE projeto NOT IN('saiu','GERENTE','B.I') AND tipo_supervisor IN ('VPE','VPE/TOP')  ORDER BY nome";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['nome']}</option>";
   }
 ?>
          
</select></label></p>
<br /><br />
    <br />

<?php

 mysql_free_result($result);
 mysql_close($conecta);

?>

    <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
</div>

</body>
</html>
