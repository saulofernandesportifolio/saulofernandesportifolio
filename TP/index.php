<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">
<div id="principal_login">

    <div id="banner">
      <img src="img/banner.bmp" alt="Banner grupo Empreza"/>
    
        
        <div id="login_esquerda"><br/>

        <table id="login_esquerda">
        <form action="valida_usuario.php" method="post" >
        <tr><td><p id="p_padrao">Usuário :</p></td><td><span id="sprytextfield1" class="input">
        <input name="usuario" type="text" class="textbox_padrao" size="23"/>
        <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td></tr>
        <tr><td><p id="p_padrao">Senha &nbsp;&nbsp;:</p></td><td><span id="sprytextfield2" class="input">
        <input name="senha" type="password" class="textbox_padrao" size="23" maxlength="15"/>
        <span class="textfieldRequiredMsg">Campo obrigatório.</span></span></td></tr>
        <tr><td>
        </td><td>
        <input name="logar" type="submit" value="Logar" />
        <input name="limpar" type="reset" value="Limpar" />
        </td></tr>
        </form>
        </table>
        </div>

        <div id="login_direita"><p id="p_padrao">
        Este sistema é propriedade do Grupo Empreza e deve ser utilizado somente por colaboradores autorizados.<br/>							        <br>
        Todas as ações são monitoradas, a má utilização está sujeita as penalidades previstas em lei e ou punição administrativa</p>
        </div>
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:95});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>