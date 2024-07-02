<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<link href= "dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css"> 

<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></SCRIPT>

<script>


<!--
    function valida_horas(edit){
      if(event.keyCode<48 || event.keyCode>57){
        event.returnValue=false;
      }
      if(edit.value.length==2 || edit.value.length==5){
        edit.value+=":";}
}
//-->


</script>

</head>

<body>
<?php

include "abreconexao.php";

$sql = "SELECT * FROM registro_ponto WHERE id = $id";

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
{
$login					= $linha["usuario"];
$nome					= $linha["nome"];
$mes					= $linha["mes"];
$data_entrada			= $linha["data_entrada"];
$hora_entrada			= $linha["hora_entrada"];
$data_saida				= $linha["data_saida"];
$hora_saida				= $linha["hora_saida"];
$inicio_intervalo		= $linha["inicio_intervalo"];	
$fim_intervalo			= $linha["fim_intervalo"];
$observacao				= $linha["observacao"];

}


$mes_consulta = substr($mes,0,2);

$ano_consulta = substr($mes,3,2);

$ano_consulta = "20$ano_consulta";


?>
<p align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
<form name="form1" method="post" action="enviar_alterar_registro_id.php?usuario=<?php echo "$usuario"?>&mes_consulta=<?php echo "$mes_consulta"?>&ano_consulta=<?php echo "$ano_consulta"?>&id=<?php echo "$id"?>&login=<?php echo "$login"?>">
  <p><font size="2" face="Arial, Helvetica, sans-serif">Nome</font>: <?php echo "<font size='2' face='Arial' color='#333'>$nome"?></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Para realizar 
    a altera&ccedil;&atilde;o selecione o per&iacute;odo.</strong></font></p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">*</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Selecione 
    o per&iacute;odo: 
    <input type="radio" name="dia_ponto" value="1" />
    normal 
    <input type="radio" name="dia_ponto" value="2" />
    s&aacute;bado 
    <input type="radio" name="dia_ponto" value="3" />
    domingo/feriado</font></p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Data Entrada: 
    <input name="data_entrada" type="text" id="data_entrada" value="<?php echo "$data_entrada" ?>">
    <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_entrada'),'yyyy/mm/dd',this,true);">
    </font><font size="2" face="Arial, Helvetica, sans-serif">Hora Entrada: 
    <input name="hora_entrada" type="text" id="hora_entrada" value="<?php echo "$hora_entrada"?>" maxlength="8" onkeypress="valida_horas(this)">
    <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"> Inicio Intervalo: 
    <input name="inicio_intervalo" type="text" id="inicio_intervalo" value="<?php echo "$inicio_intervalo"?>" maxlength="8" onkeypress="valida_horas(this)">
    <font color="#FF0000" size="1">(Ex: 09:00:00)</font><font color="#FF0000"> 
    </font> Final Intervalo: 
    <input name="fim_intervalo" type="text" id="fim_intervalo" value="<?php echo "$fim_intervalo"?>" maxlength="8" onkeypress="valida_horas(this)">
    <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Data Saida: 
    <input name="data_saida" type="text" id="data_saida" value="<?php echo "$data_saida"?>">
    <input type="button" name="btn2" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_saida'),'yyyy/mm/dd',this,true);">
    Hora Saida: 
    <input name="hora_saida" type="text" id="hora_saida" value="<?php echo "$hora_saida"?>" maxlength="8" onkeypress="valida_horas(this)">
    <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font> </p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Observa&ccedil;&atilde;o: 
    <textarea name="observacao" cols="60" rows="6" id="observacao"><?php echo "$observacao"?></textarea>
    </font></p>
  <p>&nbsp;</p>
  <p align="center"> 
    <input type="submit" name="enviar" id="enviar2" value="Cadastrar" />
    <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
  </p>
  <p align="center"><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
  </form>



</body>
</html>
