<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"> 
  <p><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /></p>
  <p>&nbsp;</p>
  <?php
  
  include "abreconexao.php";
  
  	if ($login == 0 and $re == '')
		  {
				$sql = "SELECT * FROM banco_horas ORDER BY banco DESC";
		  }
		  
  	if ($login <> 0 and $re == '')
  
		  { 
				$sql = "SELECT * FROM banco_horas WHERE usuario = '".$_REQUEST['login']."' ORDER BY banco";
		  }

	if ($re <> '')
		
		 {
				$sql = "SELECT * FROM banco_horas WHERE usuario = '".$_REQUEST['re']."'";
		 }	
  
  ?>
  
  <p align="left"><a href="gerar_excel_banco.php?usuario=<?php echo "$usuario"?>&login=<?php echo "$login"?>" target = "blank" title="Exportar consulta para Excel"><img src="../ponto/imagens/icone excel.jpg" width="30" height="31" border="0"></a></p>
  <table width="899" border="1" cellpadding="0" cellspacing="0">
    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
      <td width="407"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">RE</font></div></td>
      <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Nome</font></div></td>
      <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Banco de Horas</font></div></td>
	  <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Obs</font></div></td>
      <td width="476"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Alterar</font></div></td>
    </tr>
    <?php

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
	{
		$id							= $linha["id"];
		$re			 				= $linha["usuario"];
		$nome						= $linha["nome"];
		$banco						= $linha["banco"];
		$observacao					= $linha["observacao"];


?>
    <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
      <td> <font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$re"?> 
        </font> <div align="left"></div>
        <div align="right"></div></td>
      <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$nome"?> 
        </font> <div align="left"></div></td>
      <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$banco"?> 
        </font> <div align="left"></div></td>
      <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$observacao"?> 
        </font> <div align="left"></div></td>
      <td> <div align="center"><a href="alterar_banco_horas_id.php?id=<?php echo "$id" ?>&usuario=<?php echo "$usuario" ?>"><font size="1" face="Arial" >ALTERAR</font></a></div></td>
    </tr>
    <?php
  	}
	?>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">
    <input type="submit" name="Submit" value="Voltar" onClick="history.back()">
  </p>
</div>
</body>
</html>
