<?php

//habilita controle de erros
error_reporting(0);
ini_set(�display_errors�, 0 );

$page="Fixa Top - Tela Login";
setcookie("salva","");
setcookie("id_usuario","");
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" href="css/imagem/title_empz.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../fixa_top/css/style.css" />
<title><?php echo $page;?></title>

<!-- Linkando a biblioteca javascript jQuery -->
<script type="text/javascript" src="js/lib/jquery-1.12.0.min.js" ></script>

<!-- Linkando o arquivo que ter� as fun��es javascript - functions.js -->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/funcoesJs.js"></script>
 
 <!-- Fun��es para valida��o de CPF e CNPJ -->
<script type="text/javascript" src="js/valida_cpf_cnpj.js"></script>
<script type="text/javascript" src="js/mask/jquery.mask.js"></script>
<script type="text/javascript" src="js/mask/jquery.mask.min.js"></script>

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
            <div class="logo">
                <img src="css/imagem/fundo2.JPG" alt="<?php echo $title;?>" width="150" height="60" style="padding-left:26px" />
            </div>
            <h3 align="center"><strong>CIP - Fixa Top</strong></h3>
            <div class="acomodar">
            	<form action="valida_usuario.php" method="POST">
                    <label for="cpf">CPF: </label>
                        <input 
                            id="cpf" 
                            type="text" 
                            class="txt bradius login_input" 
                            name="cpf"
                            required
                        />
                    <label for="senha">Senha: </label>
                        <input  
                            id="senha" 
                            type="password" 
                            class="txt bradius login_input" 
                            name="senha" 
                            required
                        />
                        <input 
                            type="submit" 
                            class="sb bradius" 
                            name="entrar" 
                            id="entrar" 
                            value="Entrar" 
                        />
                </form>
            </div>       
        </div>
    </div>
</body>

</html>