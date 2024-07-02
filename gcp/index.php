<?php
$page="GCP";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/padrao.css" />
<link rel="shortcut icon" href="css/imagem/logo_mundogira.gif" type="image/x-icon" />
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

<script type="text/javascript" src="js/funcoesJs.js"></script>
</head>

<body onload="startTime();" class="divctl">

<div id="resolucao">


<fieldset id="fieldset2" class="bradius">
<table class="barratopo2 bradius">
<td width="20%">
<table>
<td class="logo2mapab bradius"><img src="css/imagem/logoempznovo.png" width="130" height="90"  /></td>
</table>
</td>
<td width="80%">
<table class="tablelogotop bradius">
<td class="spannome2 bradius">GCP - Gestão e Controle de Processos Móvel</td>
<td  id="hora" class="spanhora2 bradius"></td>
</table> 
<td class="logo2b bradius"><img src="css/imagem/logo_mundogira.gif"  width="90" height="90" /></td>
</td>
</table>

  </fieldset>


    <form action="valida_usuario.php" method="POST">
        <div id="login" class="form bradius">
        <h3 align="center" style="background: #337ab7"><strong><font color="#ffffff">Autentica&ccedil;&atilde;o</strong></font></h3>


        <div class="acomodarlogin">
        <div class="logo4"><img src="css/imagem/backoffice.png" width="150" height="150" /></div>
        <div class="logo5"><img src="css/imagem/logoempznovo.png" width="210" height="150" /></div>
            <label for="cpf">CPF : <input id="cpf" type="text" class="txt bradius" name="cpf" value="" /></label>
            <label for="senha">Senha: <input  id="senha" type="password" class="txt bradius" name="senha" value="" /></label>
            <input type="submit" class="sb bradius" name="entrar" id="entrar" value="Entrar" />
            </form>
        <!--principal-->

        </div>
       
                       
    </div>

     

</div>
</body>

</html>
