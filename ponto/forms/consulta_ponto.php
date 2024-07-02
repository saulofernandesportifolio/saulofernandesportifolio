<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href= "dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css"> 

<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></SCRIPT>

</head>

<body>
<div align="center"> 
  <p><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" />  
  </p>
  <form name="form1" method="post" action="consulta_ponto2.php?usuario=<?php echo "$usuario"?>">
  <p>&nbsp;</p>
    <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Consulta Ponto</strong></font></p>
    <p>&nbsp;</p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Selecione 
      o Colaborador: </font><font color="#003366"> 
      <select name="login" id="select">
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
      <input name="usuario" type="hidden" id="usuario2" value="<?php echo "$usuario" ?>" />
      </font><font size="2" face="Arial, Helvetica, sans-serif">RE: 
      <input name="re" type="text" id="re2" size="18" maxlength="18" />
      </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Selecione 
      o per&iacute;odo:</font> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="data_inicio" id="data_inicio2">
      <input type="button" name="btn2" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_inicio'),'yyyy/mm/dd',this,true);">
      </font><font size="2" face="Arial, Helvetica, sans-serif">a</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="text" name="data_fim" id="data_fim2">
      <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_fim'),'yyyy/mm/dd',this,true);">
      </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
      </font><font color="#003366">&nbsp; </font></p>
    <p align="left">&nbsp;</p>
    <p align="center">
      <input type="submit" name="Submit" value="Consultar" />
      <input type="button" name="Submit2" value="Cancelar" onclick="history.back()" />
    </p>
    </form>

  <p><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
</div>
</body>
</html>
