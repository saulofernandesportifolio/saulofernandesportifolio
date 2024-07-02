<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href= "dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css"> 

<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></SCRIPT>

</head>

<body>
<div align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /> 
</div>
<form name="form1" method="post" action="consulta_horas2.php?usuario=<?php echo "$usuario"?>">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Selecione 
    os dados para consulta:</font></p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Per&iacute;odo:</font> 
    <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
    <input type="text" name="data_inicio" id="data_inicio">
    <input type="button" name="btn2" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_inicio'),'yyyy/mm/dd',this,true);">
    </font><font size="2" face="Arial, Helvetica, sans-serif">a</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
    <input type="text" name="data_fim" id="data_fim">
    <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_fim'),'yyyy/mm/dd',this,true);">
    </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
    </font><font color="#003366">&nbsp; </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
    </font></p>
  <p align="center">&nbsp;</p>
  <p align="center"> 
    <input type="submit" name="Submit" value="Enviar">
    <input type="submit" name="Submit2" value="Voltar" onClick="history.back()"/>
  </p>
</form>
<p align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
</body>
</html>
