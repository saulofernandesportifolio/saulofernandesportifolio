<script language="jscript">
 	var width = 150;
	var height = 250;
	var left = 99;
	var top = 99;
	window.open(URL,'janela','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=30%,height=20%');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</br>
<center><p>Você tem certeza que deseja excluir este evento?</p>
<table class="no_format"><tr>
<td colspan="2"><form id="exc_evento" method="post" action="evento/envia_evento.php?action=exclusao"></td></tr>
<input type="hidden" name="id_evento" value="<?php echo $id_evento ?>" />
<tr><td align="center"><input align="left" type="submit" value="    SIM    " /></td>
<td><input align="right" type="button" name="voltar" value="    NÃO    " onclick="history.go(-1)"/></td></tr>
</form>
</table>
</center>