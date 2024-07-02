<?php
$page="GALA - VPG";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/padrao.css" />
<link rel="shortcut icon" href="css/imagem/Icone_Empreza.jpg" type="image/x-icon" />
<title><?php echo $page;?></title>


<!-- Linkando a biblioteca javascript jQuery -->
<script type="text/javascript" src="js/lib/jquery-1.4.2.js" ></script>

<!-- Linkando o arquivo que terá as funções javascript
 - functions.js -->
<script type="text/javascript" src="js/functions.js"></script>
<script>
function resizePage() {
        document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
        document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
      }

</script>
</head>

<body class="divctl">

<div id="resolucao">
	<div id="login" class="form bradius">
    <form action="valida_usuario.php" method="POST">
        <div class="logo"><img src="css/imagem/Logo_Empreza_12.jpg" alt="<?php echo $title;?>" width="200" height="58" /></a></div>
        <h3 align="center"><strong><font color="#000000"><?php echo $page ?></strong></font></h3>
        <h3 align="center" style="background: #735D25"><strong><font color="#FFFFFF">Autentica&ccedil;&atilde;o</strong></font></h3>
        <div class="acomodar">
        
        	
            
            <label for="cpf">CPF : </label><input id="cpf" type="text" class="txt bradius" name="cpf" value="" />
            <label for="senha">Senha: </label><input  id="senha" type="password" class="txt bradius" name="senha" value="" />
            <input type="submit" class="sb bradius" name="entrar" id="entrar" value="Entrar" />
            </form>
        <!--principal-->
        </div>

        
               
    </div>
</div>
</body>

</html>
