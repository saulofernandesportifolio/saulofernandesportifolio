<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?".">"; ?><?php

date_default_timezone_set("Brazil/East");
$dataatual = date("H:i:s");
$data_hoje = date("Y/m/d");

if (!isset($_COOKIE['valida_log'])) {
    echo "<br><font color='#999999' face='arial' size='2'>Favor fazer o login corretamente.</font>";
    echo "<hr><input type='button' name='voltar' value='<< Voltar' onclick =" .
        "window.location='index.php'" . ">";
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Controle de ponto - Suporte Regional Sul</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
   <div id="divconteudo2">  
  <div id="imgtopo"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /> 
  </div>
        <!-- DIV PARA O CONTEUDO DO PORTAL (OPCIONAL) -->
    
  
    <p> <br />
      <font face="Arial, Helvetica, sans-serif"><strong></strong><font color="#52492E" size="2"> 
      </font></font>
    <table width="773" border="0" cellpadding="0" cellspacing="0">
      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
        <td width="" valign="top"><div align="left"><img src="../ponto/imagens/cabecalho_empreza_ponto.jpg" width="200" height="200" />

          </div></td>
        <td width="0" valign="top"> <div align="left"> 
            <p align="left"><font face="Arial, Helvetica, sans-serif"><font color="#52492E" size="2"><font size="3"><strong>Sistema 
              para Controle e Registro de Ponto</strong></font></font></font></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p align="justify"><font size="2" face="Arial, Helvetica, sans-serif">Hoje 
              é 
              <?php include "data_apresentacao.php" ?>
              </font></p>
            <p align="justify"><font size="2" face="Arial, Helvetica, sans-serif">Para 
              realizara as ações no sistema utilize o menu de navegação.</font></p>
            <p align="justify">&nbsp;</p>
          </div></td>
      </tr>
   
    </table>
    <p>&nbsp;</p>
    <p><img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p> </div>
</center>
</body>
</html>