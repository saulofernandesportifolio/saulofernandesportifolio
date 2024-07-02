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


if (document.dados.nome.value=="")
{
alert( "Digite o nome do colaborador" );
document.dados.nome.focus();
return false;
}


if (document.dados.re.value=="")
{
alert( "Digite o RE do colaborador" );
document.dados.re.focus();
return false;
}

if (document.dados.funcao.value=="")
{
alert( "Digite a Funcao do colaborador" );
document.dados.funcao.focus();
return false;
}

if (document.dados.departamento.value=="0")
{
alert( "Selecione o departamento" );
document.dados.departamento.focus();
return false;
}

if (document.dados.carga_horaria.value=="0")
{
alert( "Selecione a carga horaria" );
document.dados.carga_horaria.focus();
return false;
}

if (document.dados.data_admissao.value=="")
{
alert( "Selecione a data de admissao" );
document.dados.data_admissao.focus();
return false;
}

if (document.dados.hora_entrada.value=="")
{
alert( "Digite a hora de entrada" );
document.dados.carga_horaria.focus();
return false;
}


if (document.dados.hora_saida.value=="")
{
alert( "Digite a hora de saida" );
document.dados.carga_horaria.focus();
return false;
}

if (document.dados.hora_limite_ponto.value=="")
{
alert( "Digite a hora limite para ponto" );
document.dados.hora_limite_ponto.focus();
return false;
}

if (document.dados.hora_ent_sab.value=="")
{
alert( "Digite a hora de entrada sabado" );
document.dados.hora_ent_sab.focus();
return false;
}

if (document.dados.hora_sai_sab.value=="")
{
alert( "Digite a hora de saida no sabado" );
document.dados.hora_sai_sab.focus();
return false;
}


if (document.dados.hora_limite_sab.value=="")
{
alert( "Digite a hora limite para ponto no sabado" );
document.dados.hora_limite_sab.focus();
return false;
}


if (document.dados.hora_limite_sab.value=="")
{
alert( "Digite a hora limite para ponto no sabado" );
document.dados.hora_limite_sab.focus();
return false;
}


if (document.dados.hora_limite_sab.value=="0")
{
alert( "Selecione o perfil para o sistema" );
document.dados.hora_limite_sab.focus();
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
<?php

include "abreconexao.php";

$sql = "SELECT perfil FROM usuarios WHERE login = '$usuario'";

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
	{
		$perfil = $linha["perfil"];
	}
	
	if ($perfil <> 3)
	{
			
					echo "<script>alert('Voce nao tem permissao para realizar esta acao. Em caso de duvidas consulte os administradores do sistema.'); history.back();  </script>\n";
					exit;
	}
	
	else
	{



?>


<div align="center"> 
  <p><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
  <p>&nbsp;</p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">* Todos os campos s&atilde;o 
    preenchimento obrigat&oacute;rio. </font></p>
  <form method="post" action="enviar_criar_usuario.php?usuario=<?php echo "$usuario"?>" name="dados" id="form1" onSubmit="return enviardados();">
    <p align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Dados 
      Departamento Pessoal</font></strong></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Nome: 
      <input name="nome" type="text" id="nome" size="50">
      RE: 
      <input name="re" type="text" id="re">
      </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">CTPS: 
      <input name="ctps" type="text" id="re4">
      </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Fun&ccedil;&atilde;o: 
      <input name="funcao" type="text" id="re3">
      Departamento: 
      <select name="departamento" id="select">
        <option value="0" selected>Selecione</option>
        <option value="24 de Outubro">24 de Outubro</option>
        <option value="Jose Bonifacio">Jos&eacute; Bonif&aacute;cio</option>
      </select>
      </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Carga Hor&aacute;ria 
      Di&aacute;ria: 
      <select name="carga_horaria" id="carga_horaria">
        <option value="0" selected>Selecione</option>
        <option value="8">8h</option>
        <option value="6">6h</option>
      </select>
      </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Data Admiss&atilde;o: 
      </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
      <input type="text" name="data_admissao" id="data_admissao">
      <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_admissao'),'dd/mm/yyyy',this,true);">
      </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
      </font><font color="#003366">&nbsp; </font><font size="2" face="Arial, Helvetica, sans-serif"> 
      </font></p>
    <p align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hor&aacute;rios 
      Normais </font></strong></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Hora Entrada: 
      <input name="hora_entrada" type="text" id="hora_entrada" maxlength="8" onkeypress="valida_horas(this)">
      Hora Sa&iacute;da: 
      <input name="hora_saida" type="text" id="hora_saida" maxlength="8" onkeypress="valida_horas(this)">
      Hora Limite Entrada: 
      <input name="hora_limite_ponto" type="text" id="hora_limite_ponto" maxlength="8" onkeypress="valida_horas(this)">
      </font></p>
    <p align="center">&nbsp;</p>
    <p align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hor&aacute;rios 
      no Sab&aacute;do</font></strong></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Hora Entrada: 
      <input name="hora_ent_sab" type="text" id="hora_ent_sab" maxlength="8" onkeypress="valida_horas(this)">
      Hora Sa&iacute;da: 
      <input name="hora_sai_sab" type="text" id="hora_sai_sab" maxlength="8" onkeypress="valida_horas(this)">
      Hora Limite Entrada: 
      <input name="hora_limite_sab" type="text" id="hora_limite_sab" maxlength="8" onkeypress="valida_horas(this)">
      </font></p>
    <p align="center">&nbsp;</p>
    <p align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Dados 
      Sistema </font></strong></p>
    <p align="center">&nbsp;</p>
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Perfil: 
      <select name="perfil_2" id="select2">
        <option value="0" selected>Selecione</option>
        <option value="1">Colaborador</option>
        <option value="2">Supervisor</option>
        <option value="3">Administrador</option>
      </select>
      </font></p>
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="submit" name="enviar" id="enviar2" value="Cadastrar" />
      <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
      </font></p>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp; </p>
</div>
<?php
}
?>
</body>
</html>
