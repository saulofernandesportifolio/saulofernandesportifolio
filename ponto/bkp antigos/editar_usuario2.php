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

$sql = "SELECT * FROM usuarios WHERE login = '".$_REQUEST['login']."'";

$acao = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_assoc($acao))
{
		$id							= $linha["id"];
		$login						= $linha["login"];
		$nome						= $linha["nome"];
		$perfil2						= $linha["perfil"];
		$hora_entrada				= $linha["hora_entrada"];
		$hora_saida					= $linha["hora_saida"];
		$hora_limite_ponto			= $linha["hora_limite_ponto"];
		$hora_ent_sab				= $linha["hora_ent_sab"];
		$hora_sai_sab				= $linha["hora_sai_sab"];
		$hora_limite_sab			= $linha["hora_limite_sab"];
		$ctps						= $linha["ctps"];
		$data_admissao				= $linha["data_admissao"];
		$funcao						= $linha["funcao"];
		$departamento				= $linha["departamento"];
		$carga_horaria				= $linha["carga_horaria"];
		$carga_horaria_sab			= $linha["carga_horaria_sab"];
		
		
		
}

$carga_horaria = "$carga_horaria h";


if ($perfil2 == 1)
{
	$perfil2 =  "Colaborador";
}

if ($perfil2 == 2)
{
	$perfil2 =  "Supervisor";
}

if ($perfil2 == 3)
{
	$perfil2 =  "Administrador";
}



$sql_valida = "SELECT perfil FROM usuarios WHERE login = '$usuario'";

$acao_valida = mysql_query($sql_valida) or die (mysql_error());

while ($linha_valida = mysql_fetch_assoc($acao_valida))
{
		$valida = $linha_valida["perfil"];
}

		if ($valida <> 3)
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
  <p>&nbsp;</p>
</div>
<div align="center">
  <p>&nbsp;</p>
  <form method="post" action="enviar_editar_usuario.php?usuario=<?php echo "$usuario"?>&id=<?php echo "$id"?>" name="dados" id="form1" onSubmit="return enviardados();">
    <p align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Dados 
      Departamento Pessoal</font></strong></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nome: 
      <input name="nome" type="text" id="nome" value="<?php echo "$nome"?>" size="50">
      RE: 
      <input name="re" type="text" id="re" value="<?php echo "$login"?>">
      </font></p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">CTPS: 
      <input name="ctps" type="text" id="re4" value="<?php echo "$ctps"?>">
      </font></p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fun&ccedil;&atilde;o: 
      <input name="funcao" type="text" id="re3" value="<?php echo "$funcao"?>">
      Departamento:</font><font color="#000000"><?php echo "<font size='2' face='Arial' color='#333'>$departamento"?> 
      </font> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <select name="departamento" id="select">
        <option value="0" selected>Alterar</option>
        <option value="24 de Outubro">24 de Outubro</option>
        <option value="Jose Bonifacio">Jos&eacute; Bonif&aacute;cio</option>
      </select>
      </font></p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Carga 
      Hor&aacute;ria Di&aacute;ria: </font><font color="#000000"><?php echo "<font size='2' face='Arial' color='#333'>$carga_horaria"?></font> 
      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <select name="carga_horaria" id="carga_horaria">
        <option value="0" selected>Alterar</option>
        <option value="8">8h</option>
        <option value="6">6h</option>
      </select>
      </font></p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Data 
      Admiss&atilde;o: 
      <input name="data_admissao" type="text" id="data_admissao" value="<?php echo "$data_admissao"?>">
      <input type="button" name="btn" value="selecionar" onclick="javascript:displayCalendar(document.getElementById('data_admissao'),'dd/mm/yyyy',this,true);">
      &nbsp;&nbsp; </font><font color="#000000">&nbsp; </font></p>
    <p align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hor&aacute;rios 
      Normais </font></strong></font></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Hora 
      Entrada: 
      <input name="hora_entrada" type="text" id="hora_entrada" onkeypress="valida_horas(this)" value="<?php echo "$hora_entrada"?>" maxlength="8">
      Hora Sa&iacute;da: 
      <input name="hora_saida" type="text" id="hora_saida" onkeypress="valida_horas(this)" value="<?php echo "$hora_saida"?>" maxlength="8">
      Hora Limite Entrada: 
      <input name="hora_limite_ponto" type="text" id="hora_limite_ponto" onkeypress="valida_horas(this)" value="<?php echo "$hora_limite_ponto"?>" maxlength="8">
      </font></p>
    <p align="center">&nbsp;</p>
    <p align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hor&aacute;rios 
      no Sab&aacute;do</font></strong></font></p>
    <p align="center">&nbsp;</p>
    <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Hora 
      Entrada: 
      <input name="hora_ent_sab" type="text" id="hora_ent_sab" onkeypress="valida_horas(this)" value="<?php echo "$hora_ent_sab"?>" maxlength="8">
      Hora Sa&iacute;da: 
      <input name="hora_sai_sab" type="text" id="hora_sai_sab" onkeypress="valida_horas(this)" value="<?php echo "$hora_sai_sab"?>" maxlength="8">
      Hora Limite Entrada: 
      <input name="hora_limite_sab" type="text" id="hora_limite_sab" onkeypress="valida_horas(this)" value="<?php echo "$hora_limite_sab"?>" maxlength="8">
      </font></p>
    <p align="center">&nbsp;</p>
    <p align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Dados 
      Sistema </font></strong></font></p>
    <p align="center">&nbsp;</p>
    <p align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Perfil: 
      </font><font color="#000000"><?php echo "<font size='2' face='Arial' color='#333'>$perfil2"?> 
      </font> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <select name="perfil_2" id="select2">
        <option value="0" selected>Alterar</option>
        <option value="1">Colaborador</option>
        <option value="2">Supervisor</option>
        <option value="3">Administrador</option>
      </select>
      </font></p>
    <p align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
      <input type="submit" name="enviar" id="enviar2" value="Alterar" />
      <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
      </font><font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp; </p>
</div>
<?php
}
?>
</body>
</html>