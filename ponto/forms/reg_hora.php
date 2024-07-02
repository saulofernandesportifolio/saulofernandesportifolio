<?php
if (!isset($_COOKIE['valida_log'])) {
    echo "<br><font color='#999999' face='arial' size='2'>Favor fazer o login corretamente.</font>";
    echo "<hr><input type='button' name='voltar' value='<< Voltar' onclick =" .
        "window.location='index.php'" . ">";
    exit;
} else {
    include "../ponto/funcoes.php";
    
    
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
    
  <div id="imgtopo"><img src="../ponto/imagens/empreza_1.jpg" width="808" height="133" /> 
  </div>

        <!-- DIV PARA O CONTEUDO DO PORTAL (OPCIONAL) -->
    <div align="center" style="margin-top: 200px; margin-left: 100px;" >
    <br /><br /><br />
         <?php echo $usuario=$_COOKIE["id"]; ?> 
    <p align="left"> &nbsp;<font size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;Horario 
      atual:&nbsp;</font>&nbsp; <b>
      <?php 

        date_default_timezone_set("Brazil/East");
      
      $hora = date('H:i:s');
     echo date('H:i:s'); ?>
      </b> </div>
      
    <form id="form1" name="form1" method="post" action="frame.php?t=confirma_reg_hora.php">
    <div align="left">
      <p>
      <div align="center">
      
        <p><font size="2" face="Arial, Helvetica, sans-serif">Selecione a opção 
          de ponto:</font></p>
        <p><br />
        </p>
      </div>
      <div align="center">
        <table width="182" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr> 
            <td width="174" align="left" bgcolor="#FFFFFF"><font color="#000000"> 
              <input align="left" type="radio" name="acao" value='entrada' />
            <font size="2" face="Arial, Helvetica, sans-serif">entrada </font></font></td>
        </tr>
        <tr> 
            <td align="left" bgcolor="#FFFFFF"><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input align="left" type="radio" name="acao" value='inicio_int' />
            in&iacute;cio de intervalo</font></font></td>
        </tr>
        <tr> 
            <td align="left" bgcolor="#FFFFFF"><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input align="left" type="radio" name="acao" value='fim_int' />
            final de intervalo</font></font></td>
        </tr>
        <tr> 
            <td align="left" bgcolor="#FFFFFF"><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input align="left" type="radio" name="acao" value='saida' />
            sa&iacute;da</font></font></td>
        </tr>
      </table>
	  
        <p><font color="#000000"><br />
          </font> <br />
          <input type="hidden" name="usuario" value="<?php echo "$usuario" ?>"/>
          <input type="submit" name="button" id="button" align="center" value="Registrar ponto"/>
          <input type="button" name="Submit2" value="Voltar" onclick="history.back()" />
        </p>
	  </div>
    </div>
  </form>
    <img id="rodape" src="../ponto/imagens/rodape_empreza.jpg" width="808" height="30" /></p>
</center>
</body>
</html>