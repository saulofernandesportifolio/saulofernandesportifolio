<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Controle de Ponto on-line</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<?php setcookie("valida_log", ""); ?>

</head>

<body>
<div align="center"> 
  <p><img src="../ponto/imagens/empreza_1.jpg" width="742" height="100"/> </p>
  <p>&nbsp;</p>
  <p><font size="4" face="Arial, Helvetica, sans-serif"><strong>Ponto On-Line – Business Intelligence</strong></font></p>
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"></font></strong></p>
  <form id="form1" name="form1" method="post" action="valida_usuario.php">
    
    <table width="950" border="0" cellpadding="0" cellspacing="0">

      <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF"> 
        <td> <div align="center"> 
            <p align="justify"><font size="2" face="Arial, Helvetica, sans-serif">.</font></p>
            <table width="220" border="0">
              <tr> 
			    <td colspan="2" align="center" bgcolor="#A38C49" > <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Autentica&ccedil;&atilde;o</strong></font></td>
                <td colspan="2" align="center" > <div align="center"><font color="red" size="1" face="Arial, Helvetica, sans-serif"> 
                    <?php if (isset($_COOKIE['resposta']))
    echo ($_COOKIE['resposta']); ?>
                    </font> </div></td>
              </tr>
              <tr> 
                <td><p><font color="#333333" size="2" face="Courier New, Courier, mono">Login</font>:</p></td>
                <td> <input name="usuario" type="text" id="usuario3" size="20" maxlength="13" /> 
                  <br /> <font color="red" size="1" face="Arial, Helvetica, sans-serif"> 
                  <?php if (isset($_COOKIE['valida_login']))
    echo ($_COOKIE['valida_login']); ?>
                  </font> </td>
              </tr>
              <tr> 
                <td><p><font size="2" face="Courier New, Courier, mono">Senha</font>:</p></td>
                <td> <input name="senha" type="password" id="senha3" size="20" maxlength="15" /> 
                  <br /> <font color="red" size="1" face="Arial, Helvetica, sans-serif"> 
                  <?php if (isset($_COOKIE['valida_senha']))
    echo ($_COOKIE['valida_senha']); ?>
                  </font> </td>
              </tr>
              <tr> 
                <td colspan="2" align="center"> <input type="submit" name="button" id="button3" value="Login" /> 
                </td>
              </tr>
            </table>
            <font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
            </tr>
            
    </table>
    <br /><br /><br />
    <table>
    <tr>
           <td><div align="center"> 
            <p><font size="4" face="Arial, Helvetica, sans-serif"></font></p>
            <p align="justify"><font size="2" face="Arial, Helvetica, sans-serif">Este 
              sistema &eacute; propriedade do Grupo Empreza e deve ser ultilizado 
              somente por colaboradores autorizados.</font></p>
            <p align="justify"><font size="2" face="Arial, Helvetica, sans-serif">Todas 
              as a&ccedil;&otilde;es s&atilde;o monitoradas, a m&aacute; utiliza&ccedil;&atilde;o 
              est&aacute; sujeita as penalidades previstas em lei e ou puni&ccedil;&atilde;o 
              administrativa.</font></p>
          </div></td>
      </tr>
      </table>
  </form>
  <p>&nbsp;</p>
  <p><img src="../ponto/imagens/rodape_empreza.jpg" width="738" height="24" /> </p>
  </div>
</body>
</html>
