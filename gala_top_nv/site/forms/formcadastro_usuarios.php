<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario">

<form style="background:#E7E4D1;" class="bradius" action="principal.php?&t=controles/sql_cadastro_usuario4.php" method="post" enctype="multipart/form-data" name="form1" >
  <p align="center"><b><font color="#a0873c" size="4" face="Gotham Light">Cadastro Usu&aacute;rio <?php echo $page2; ?></font></b></p>
      <br />
  
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome:&nbsp;<input type="text" name="nome" value="" id="nome" class="txtgrande bradius" /></label> 
</p>
 <br />
<p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">CPF:&nbsp;<input type="text" name="cpf" value="" id="cpf" class="txt bradius" maxlength="11" onblur="ValidaEntrada(this,'cpf');"/>* Somente Numeros</label> 
</p>
 <br />
 <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
   <font color="#000000" size="3" face="Gotham Light">
    Selecione o setor:</font> 
    <select class="txt2comboboxpequeno bradius" class="sb" name="setor_user" id="setor_user">
    <?php if( $canal == "%") {?>
      <option value="0" selected="selected">Selecione</option>
      <option value="1">Supervisor</option>
      <option value="2">An&aacute;lise</option>
      <option value="3">Input</option>
      <option value="5">An&aacute;lise de input</option>
      <option value="6">Corre&ccedil;&atilde;o</option> 
      <option value="12">Operador - CO</option> 
      <option value="13">Chamado</option>  
      <?php }?>
               
    </select>
    
    
    
    

  &nbsp;<font color="#000000" size="3" face="Gotham Light">
    Turno:</font> 
   		<select name="turno_user" id="turno_user" class="txt2comboboxpequeno bradius">
        <option value="0" selected="selected">Selecione</option>
        <option value="1" >Diurno</option>
        <option value="2" >Intermedi&aacute;rio</option>
        <option value="3" >Noturno</option>
          
</select>
</p>
<br />
 <p style="border: #735D25 solid; padding: 3px 3px 3px 3px;" class="bradius">
<font color="#000000" size="3" face="Gotham Light">
    Supervisor Operador:</font> 
   		<select name="supervisor_user" id="supervisor_user" class="txt2comboboxpadrao bradius">
        <option value="0" selected="selected">Selecione</option>
       <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM tbl_supervisor WHERE projeto NOT IN('saiu','GERENTE','B.I')  ORDER BY nome";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['nome']}</option>";
   }
 ?>
          
</select></p>
<br /><br />
    <br />
    <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
</div>

</body>
</html>
