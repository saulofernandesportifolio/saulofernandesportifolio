<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" />
</div>
<?php

$hora = date("H:i:s");

if ($acao == "entrada")

{

?>
<form id="form1" name="form1" method="post" action="enviar_hora.php?&usuario=<?php echo "$usuario"?>">
  <p align="center"> 
    <input name="acao" type="hidden" id="acao" value="<?php echo "$acao" ?>">
  </p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Confirmar 
    registro de entrada &agrave;s <?php echo "<font size='2' face='Arial' color='#333'>$hora"?></font></p>
  <p align="center"> 
    <label> </label>
  </p>
  <p align="center"> 
    <input type="submit" name="enviar" id="enviar" value="Registrar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
</form>
<?php
}

if ($acao == "saida")

{

?>
<form id="form1" name="form1" method="post" action="enviar_saida.php?&usuario=<?php echo "$usuario"?>">
  <p align="center"> 
    <input name="acao" type="hidden" id="acao" value="<?php echo "$acao" ?>">
  </p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Confirmar 
    registro de sa&iacute;da &agrave;s <?php echo "<font size='2' face='Arial' color='#333'>$hora"?></font></p>
  <p align="center"> 
    <label> </label>
  </p>
  <p align="center"> 
    <input type="submit" name="enviar" id="enviar" value="Registrar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
</form>
<?php
}

if ($acao == "inicio_int")

{

?>
<form id="form1" name="form1" method="post" action="enviar_inicio_intervalo.php?&usuario=<?php echo "$usuario"?>">
  <p align="center"> 
    <input name="acao" type="hidden" id="acao" value="<?php echo "$acao" ?>">
  </p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Confirmar 
    registro de inicio de intervalo &agrave;s <?php echo "<font size='2' face='Arial' color='#333'>$hora"?></font></p>
  <p align="center"> 
    <label></label>
  </p>
  <p align="center"> 
    <input type="submit" name="enviar" id="enviar" value="Registrar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
</form>
<?php
}


if ($acao == "fim_int")

{

?>
<form id="form1" name="form1" method="post" action="enviar_saida_intervalo.php?&usuario=<?php echo "$usuario"?>">
  <p align="center"> 
    <input name="acao" type="hidden" id="acao" value="<?php echo "$acao" ?>">
  </p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Confirmar 
    registro de final de intervalo &agrave;s <?php echo "<font size='2' face='Arial' color='#333'>$hora"?></font></p>
  <p align="center">&nbsp; </p>
  <p align="center"> 
    <input type="submit" name="enviar" id="enviar" value="Registrar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
</form>
<?php
}
?>
<div align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" />
</div>
</body>
</html>
