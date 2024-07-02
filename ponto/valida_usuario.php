<?php
ob_start();

//INICIA VARIAVEIS
$error = false;
$errologin = '';
$errosenha = '';

include "funcao_cookies.php";

//VALIDA CAMPOS VAZIOS
foreach ($_POST as $idx => $vlr) {
    if ($idx == "usuario" && empty($vlr)) {
        $errologin = "Insira o $idx!";
        $error = true;
    }
    if ($idx == "senha" && empty($vlr)) {
        $errosenha = "Insira a $idx!";
        $error = true;
    }
}

//VALIDA FORMATO DOS DADOS
$vl_login = '^([0-9a-z])|(ADMINISTRADOR)$';
$vl_email = '^([0-9a-zA-Z_.-]){5,70}@([0-9a-zA-Z]{3,30}).(com.br|com)$';
$vl_data = '^([0][1-9])/([0][1-9])/([1-2][0-9]{3})|
           ([1-2][0-9])/([0][1-9])/([1-2][0-9]{3})|
           ([3][0-1])/([0][1-9])/([1-2][0-9]{3})|
           ([0][1-9])/([1][0-2])/([1-2][0-9]{3})|
           ([1-2][0-9])/([1][0-2])/([1-2][0-9]{3})|
           ([3][0-1])/([1][0-2])/([1-2][0-9]{3})$';
$vl_senha = '^([A-Za-z0-9_@!.-]){4,}$';
if (ereg($vl_login, $_POST['usuario']) === false) {
    if (empty($errologin))
        $errologin = "Matricula inv&aacute;lida!";
    $error = true;
}
if (ereg($vl_senha, $_POST['senha']) === false) {
    if (empty($errosenha))
        $errosenha = "Senha Inv&aacute;lida!";
    $error = true;
}

include "abreconexao.php";

//VERIFICA SE USUARIO EXISTE
$sql = "SELECT * FROM usuarios WHERE login = '$usuario'";

$res = mysql_query($sql) or die(mysql_error());

while ($linha = mysql_fetch_assoc($res)) {
    $id = $linha["id"];
    $login = $linha["login"];
    $nome = $linha["nome"];
    $senha = $linha["senha"];
    $perfil = $linha["perfil"];
    $acesso = $linha["acesso"];
    $hora_entrada = $linha["hora_entrada"];
}
//VAL_MATRICULA
if (!isset($id)) {
    if (empty($errologin)) {
        $errologin = "Matricula n&atilde;o cadastrada!";
        $error = true;
    }
}
//VAL_SENHA
if ($_POST['senha'] != $senha) {
    if (empty($errosenha)) {
        $errosenha = "Senha incorreta!";
        $error = true;
    }
}



//CHAMA FUNวรO
add_cookies($errologin, $errosenha, '', '', '', '', '', '', $resposta, $perfil);

//REDIRECIONA SITE
if ($error == false) {
    setcookie("valida_log", "usuario ok");
    
    setcookie('id',$id['id'],time() + 28800);


    header('location:frame.php?t=conteudo.php');
} elseif ($error == true)
    header('location:index.php');
else
    echo "Foram encontradas instabilidades no sistema, favor contatar o administrador!";
ob_end_flush();
?>