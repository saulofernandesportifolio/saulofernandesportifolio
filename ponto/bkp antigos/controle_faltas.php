<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href= "dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css"> 

<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></SCRIPT>

<script>

function enviardados()
{


if (document.dados.login.value=="0")
{
alert( "Selecione o colaborador" );
document.dados.login.focus();
return false;
}


if (document.dados.data_falta.value=="")
{
alert( "Selecione a data de entrada" );
document.dados.data_falta.focus();
return false;
}

if (document.dados.tipo_falta.value=="0")
{
alert( "Selecione o tipo da falta" );
document.dados.tipo_falta.focus();
return false;
}

return true;
}


</script>

</head>

<body>
<p align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
<p align="center">&nbsp;</p>
<p align="left">&nbsp;</p>
  <form method="post" action="enviar_controle_faltas.php?usuario=<?php echo "$usuario"?>" name="dados" id="form1" onSubmit="return enviardados();">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Selecione 
    o colaborador: 
    <select name="login" id="select2">
      <option value="0" selected>Selecione</option>
      <?php
		
	include "abreconexao.php";
	
		$sql_user = "SELECT login, nome FROM usuarios WHERE perfil = 1 ORDER BY nome";
		
		$acao_user = mysql_query($sql_user) or die (mysql_error());
		
		while($linha = mysql_fetch_assoc($acao_user))
		{
		
		$login = $linha["login"];
		$nome = $linha["nome"];
		
			echo "<option value='$login'";
			echo ">$nome</option>";
}
?>
    </select>
    </font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Data da Falta: 
    <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
    <input type="text" name="data_falta" id="data_falta2">
    <input type="button" name="btn2" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_falta'),'yyyy/mm/dd',this,true);">
    Tipo: 
    <select name="tipo_falta" id="tipo_falta">
      <option value="0" selected>Selecione</option>
      <option value="Folga">Folga</option>
      <option value="Justificada/Atestado">Justificada/Atestado</option>
      <option value="Nao Justificada">N&atilde;o Justificada</option>
    </select>
    </font></font></p>
  <p align="center"> 
    <input type="submit" name="Submit" value="Cadastrar" />
    <input type="button" name="Submit2" value="Cancelar" onclick="history.back()" />
  </p>
  <p align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" />
  </p>
</form>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
</body>
</html>
