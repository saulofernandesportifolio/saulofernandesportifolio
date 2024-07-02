<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SCS - Sistema de Controle de Solicitações</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="empreza.css" media="all" />
</head>

<body>
<div id="left" class="idx">
	<img id="img_top" class="idx" src="img/logo_empreza_3.jpg">
<form id="form1" name="form1" method="post" action="valida_usuarios.php">
    <table width="220" border="0">
        <tr> 
          <td colspan="2" align="center">
          <strong>Autentica&ccedil;&atilde;o</strong>
          </td>
          <td colspan="2" align="center" >
          </p>
          </td>
        </tr>
        <tr> 
          <td><p>Login:</p></td>
          <td>
          <input name="usuario" type="text" id="usuario" size="20" maxlength="25" />
            <br /> <font color="red" size="1" face="Arial, Helvetica, sans-serif">
            <?php if(isset($log_error)){ echo $log_error;}?>
            </font>
          </td>
        </tr>
        <tr> 
          <td><p>Senha:</p></td>
          <td> <input name="senha" type="password" id="senha3" size="20" maxlength="20" />
            <br /> <font color="red" size="1" face="Arial, Helvetica, sans-serif"> 
            <?php if(isset($sen_error)){ echo $sen_error;}?>
            </font>
          </td>
        </tr>
        <tr> 
          <td colspan="2" align="center"> <input type="submit" name="button" id="button3" value="Login" /> 
          </td>
        </tr>
    </table>
</div>
<div id="rigth" class="idx">
      <h2>Sistema de Controle de Solicita&ccedil;&otilde;es</h2>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Este sistema &eacute; propriedade do Grupo Empreza e deve ser ultilizado somente 
        por colaboradores autorizados.
      </p>
      <p>Todas as a&ccedil;&otilde;es s&atilde;o monitoradas, a m&aacute; utiliza&ccedil;&atilde;o 
        est&aacute; sujeita as penalidades previstas em lei e ou puni&ccedil;&atilde;o 
        administrativa.
      </p> 
</div>
</form>
</body>
</html>
