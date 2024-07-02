<?php 
setcookie('filtro',$_COOKIE['filtro'],time() - 28800);
setcookie('filtro2',$_COOKIE['filtro2'],time() - 28800);
setcookie('filtro3',$_COOKIE['filtro3'],time() - 28800);

?>

<div id="filtroservicousuario" class="form bradius">
<div class="divformusuario">

<form style="background:#D4D4D4;" class="bradius" action="principal.php?&t=controles/sql_cadastro_usuario4_coord.php" method="post" enctype="multipart/form-data" name="form1" >
  <p align="center"><b><font color="#337ab7" size="4" face="Gotham Light">Cadastro Usu&aacute;rio Coordenadores <?php echo $page2; ?></font></b></p>
      <br />
  
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome:&nbsp;<input type="text" name="nome" value="" id="nome" class="txtgrande bradius" /></label> 
</p>
 <br />
<p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">CPF:&nbsp;<input type="text" name="cpf" value="" id="cpf" class="txt bradius" maxlength="11" onblur="ValidaEntrada(this,'cpf');"/>* Somente Numeros</label> 
</p>
 <br />
 <p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius">
  <label style="padding-left: 5px;">
    Selecione o setor:&nbsp; 
    <select class="txt2comboboxpequeno bradius" class="sb" name="setor_user2" id="setor_user2" disabled="true">
      <option value="21">Coordenador</option>               
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
    Gerente coordenador:</font> 
   		<select name="coordenacao_user" id="coordenacao_user" class="txt2comboboxpadrao bradius">
        <option value="0" selected="selected">Selecione</option>
       <?php
    //conecta no SGBD MySQL

			
  //seleciona a base de dados para uso
   $query= "SELECT * FROM cip_nv.tbl_coordenador 
   WHERE projeto  IN ('GERENTE') 
   AND tipo_coordenador IN ('GERENTE')
   GROUP BY nome ASC ";
   $result= mysql_query($query,$conecta);
   while($dado= mysql_fetch_array($result)){
         echo "<option value=\"{$dado['id']}\">
               {$dado['nome']}</option>";
   }
 ?>
          
</select></label></p>
<br /><br />
    <br />


    <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
	<input type="button" name="Submit2" value="Cancelar" onclick="window.location='principal.php?&t=forms/formhome_operacao.php'" class="sb2 bradius"/>
    

 </form>
    
</div>
</div>

<?php

 mysql_free_result($result);
 mysql_close($conecta);
 mysql_next_result($conecta);

?>
</body>
</html>
