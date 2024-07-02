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

if (document.dados.mes_consulta.value=="0")
{
alert( "Selecione o mes para registro" );
document.dados.mes_consulta.focus();
return false;
}


if (document.dados.data_entrada.value=="")
{
alert( "Selecione a data de entrada" );
document.dados.data_entrada.focus();
return false;
}

if (document.dados.hora_entrada.value=="")
{
alert( "Preecha a hora de entrada" );
document.dados.hora_entrada.focus();
return false;
}


if (document.dados.data_saida.value=="")
{
alert( "Preencha a data de saida" );
document.dados.data_saida.focus();
return false;
}

if (document.dados.hora_saida.value=="")
{
alert( "Preencha a hora de saida" );
document.dados.hora_saida.focus();
return false;
}

return true;
}



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
 
<div align="center">
  
  <p align="center"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /> 
  </p>  <p align="center">&nbsp;</p>
  
  <form method="post" action="enviar_registro_hora.php?usuario=<?php echo "$usuario"?>" name="dados" id="form1" onSubmit="return enviardados();">
   
   <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Registrar Hor&aacute;rios</strong></font></p>
    <p align="left">&nbsp;</p>
    <div align="left">
<p><font size="2" face="Arial, Helvetica, sans-serif">*Colaborador:</font> 
        <font size="2" face="Arial, Helvetica, sans-serif"> 
        <select name="login" id="login">
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
        <input name="usuario" type="hidden" id="usuario" value="<?php echo "$usuario" ?>" /></font> 
        </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">*M&ecirc;s: <font color="#000000"> 
        <select name="mes_consulta">
          <option value="0" selected>Selecione</option>
          <option value="01">Janeiro</option>
          <option value="02">Fevereiro</option>
          <option value="03">Marco</option>
          <option value="04">Abril</option>
          <option value="05">Maio</option>
          <option value="06">Junho</option>
          <option value="07">Julho</option>
          <option value="08">Agosto</option>
          <option value="09">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>
        </font>Ano: <font color="#000000"> 
        <select name="ano_consulta" id="ano_consulta">
          <option value="10" selected>2010</option>
        </select>
        </font></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">*Selecione 
        o per&iacute;odo: 
        <input type="radio" name="dia_ponto" value="1">
        normal 
        <input type="radio" name="dia_ponto" value="2">
        s&aacute;bado 
        <input type="radio" name="dia_ponto" value="3">
        domingo/feriado</font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">*Data 
        Entrada: 
        <input type="text" name="data_entrada" id="data_entrada">
        <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_entrada'),'yyyy/mm/dd',this,true);">
        </font><font size="2" face="Arial, Helvetica, sans-serif">*Hora Entrada: 
        <input name="hora_entrada" type="text" id="hora_entrada" maxlength="8" onkeypress="valida_horas(this)">
        <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"> *Inicio Intervalo: 
        <input name="inicio_intervalo" type="text" id="inicio_intervalo" maxlength="8" onkeypress="valida_horas(this)">
        <font color="#FF0000" size="1">(Ex: 09:00:00)</font><font color="#FF0000"> 
        </font> *Final Intervalo: 
        <input name="fim_intervalo" type="text" id="fim_intervalo" maxlength="8" onkeypress="valida_horas(this)">
        <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">*Data Saida: 
        <input type="text" name="data_saida" id="data_saida">
        <input type="button" name="btn2" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_saida'),'yyyy/mm/dd',this,true);">
        *Hora Saida: 
        <input name="hora_saida" type="text" id="hora_saida" maxlength="8" onkeypress="valida_horas(this)">
        <font color="#FF0000" size="1">(Ex: 09:00:00)</font></font> </p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Observa&ccedil;&atilde;o: 
        <textarea name="observacao" cols="60" rows="6" id="observacao"></textarea>
        </font></p>
      <p>&nbsp;</p>
      <p align="center"> 
        <input type="submit" name="enviar" id="enviar2" value="Cadastrar" />
        <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
      </p>
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
  </form>

  <p><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" />

</p>
</div>


</body>
</html>
