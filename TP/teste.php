<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/padrao.css" rel="stylesheet" style="text/css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<form action="teste2.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               		<tr >
                      <td id="t_td">Email</td>
                      <td id="t_td"><span id="sprytextfield1">
                      <label for="email"></label>
                      <input type="text" name="email" id="email" class="combobox_padrao_grande"/><br />
                      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                    </tr><tr >
                      <td id="t_td">Assunto</td>
                  	   <td id="t_td"><span id="sprytextfield2">
                  	     <label for="remetente"></label>
                  	     <input type="text" name="assunto" id="assunto" class="combobox_padrao_grande"/>
               	       <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                    </tr><tr >
                      <td id="t_td">Texto</td>
                  	   <td id="t_td"><span id="sprytextfield3">
                  	     <label for="texto"></label>
                         <textarea name="texto" id="texto" class="combobox_padrao_grande" ></textarea>
               	       <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                    </tr>
                    <tr><td id="t_td"></td>
                    <td id="t_td">
                    <input name="enviar" type="submit" value="Enviar" class="botao_padrao" />
                    <input name="limpar" type="reset" value="Limpar" class="botao_padrao" />
                    </td></tr>
  </table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>