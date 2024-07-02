<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link href="../ponto/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
function arrumadata($string) {
    if($string == ''){
    $data=substr($string,8,3)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data=substr($string,8,3)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}

include "abreconexao.php";

$data_inicio = substr($data_inicio,6,4)."-".substr($data_inicio,3,2)."-".substr($data_inicio,0,2);
if($data_fim <> '')
{
	$data_fim = substr($data_fim,6,4)."-".substr($data_fim,3,2)."-".substr($data_fim,0,2);
}
else
{
	$data_fim = date("Y/m/d");
}

if ($data_inicio == '' || $data_fim == '')
{

	echo "<script>alert('Digite um periodo para consulta.'); history.back();  </script>\n";
	exit;
}

		if ($data_inicio > $data_fim)
		{
				
				echo "<script>alert('Selecione o periodo corretamente.'); history.back();  </script>\n";
				exit;
		}



$sql = "SELECT * FROM registro_ponto WHERE usuario = '$usuario' and data_entrada BETWEEN '$data_inicio' and '$data_fim' ORDER BY data_entrada";



$usuario=$_COOKIE["id"];

$sql_user = "SELECT nome,login FROM usuarios WHERE id = '$usuario'";

$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user=mysql_fetch_assoc($acao_user))
{
$nome = $linha_user["nome"];
$matricula=$linha_user["login"];
}


?>

<div id="imgtopo"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /> 
</div>

<div id="divconteudo3">  
<table width="899" border="1" cellpadding="0" cellspacing="0">
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td width="407"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Nome: 
        </font><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$nome"?></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Matricula: 
        </font><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$matricula"?></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td width="476"> <div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="899" border="1" cellpadding="0" cellspacing="0">
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td width="407"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Data</font></div></td>
    <td width="476"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Hora 
        Entrada</font></div></td>
    <td width="476"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Inicio 
        Intervalo</font></div></td>
    <td width="476"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Fim 
        Intervalo</font></div></td>
    <td width="476"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Hora 
        Sa&iacute;da</font></div></td>
		     <td width="476">      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Faltas</font></div></td>
          <td width="476"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Classifica&ccedil;&atilde;o</font></div></td>

  </tr>
  <?php

$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_assoc($acao))
	{
		$data_entrada               = arrumadata($linha["data_impressao"]);
		$hora_entrada				= $linha["hora_entrada"];
		$hora_saida					= $linha["hora_saida"];
		$inicio_int					= $linha["inicio_intervalo"];
		$fim_int					= $linha["fim_intervalo"];
		$falta						= $linha["falta"];
		$classificacao				= $linha["classificacao"];
		


?>
  <tr align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
    <td> <font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$data_entrada"?> 
      </font> 
      <div align="center"></div>
      <div align="right"></div></td>
    <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$hora_entrada"?> 
      </font> 
      <div align="right"></div></td>
    <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$inicio_int"?> 
      </font> 
      <div align="right"></div></td>
    <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$fim_int"?> 
      </font> 
      <div align="right"></div></td>
    <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$hora_saida"?> 
      </font> 
      <div align="right"></div></td>
	      <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$falta"?> 
      </font> 
      <div align="right"></div></td>
    <td><font color="#FFFFFF"><?php echo "<font size='1,5' face='Arial' color='#333'>$classificacao"?> 
      </font> 
      <div align="right"></div></td>

  </tr>
  <?php
  	}
	?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <input type="submit" name="Submit" value="Voltar" onClick="history.back()">
</p>
</div>
</body>
</html>
