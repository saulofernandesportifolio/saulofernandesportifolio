<?php
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
</head>
<body>
<center>
    <div id="imgtopo">
        <img src="../sistema/imagens/headerazul.jpg" width="768" height="67" />
    </div>
        <!-- DIV PARA O CONTEUDO DO PORTAL (OPCIONAL) -->
    <div id="conteudo">
            <p>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br />
            <img src="../imagens/imagem_home.gif" width="183" height="219" />
            <img src="../imagens/vivo_azul.JPG" width="166" height="72" /><br />
            <img src="../imagens/suporte_texto1.JPG" width="295" height="43" />
            <img src="../sistema/imagens/vivo.jpg" width="212" height="32" /><br />
    </div>
    <img id="rodape" src="../sistema/imagens/fundo_menu.jpg" /></p>
</center>
</body>
</html>