<?php

date_default_timezone_set("Brazil/East");
$dataatual = date("H:i:s");
$data_hoje = date("Y/m/d");

if (!isset($_COOKIE['valida_log']) || ($_COOKIE['valida_log'] == "")) {
    echo "<br><font color='#999999' face='arial' size='2'>Favor fazer o login corretamente.</font>";
    echo "<hr><input type='button' name='voltar' value='<< Voltar' onclick =" .
        "window.location='index.php'" . ">";
    exit;
}
?>
<html>
<head>
<refresh></refresh>
</head>
<title>Controle de Ponto On-Line</title>
<frameset cols="20%,80%" rows="100%" FRAMEBORDER="0">
  <frame name="menu" src="menu.php?usuario=<?php echo "$usuario" ?>" SCROLLING="NO">
  <frame name="conteudo" src="conteudo.php" SCROLLING="YES">
</frameset><noframes></noframes>
</html>