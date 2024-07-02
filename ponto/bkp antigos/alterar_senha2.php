<?php
include "abreconexao.php";

$sql = "SELECT * FROM usuarios WHERE login='".$_REQUEST['usuario']."'"; 
$acao = mysql_query($sql) or die(mysql_error());		


while ($linha = mysql_fetch_assoc($acao))
{
$senha4     = $linha["senha"]; 
}

if($senha4 <> $senha)
{
echo("A senha Atual nao confere com a Senha que o usuario possui");
echo("<hr><input type='button' name='voltar' value='<< Voltar' onclick='history.back()'>");
exit;
}


if($nova <> $confirma)
{
echo "Senha de confirmacao nao confere com a Nova senha, digite novamente !";
echo("<hr><input type='button' name='voltar' value='<< Voltar' onclick='history.back()'>");
exit;
}

if($nova == 'empreza')
{
echo "Senha deve ser diferente da senha inicial, digite novamente!";
echo("<hr><input type='button' name='voltar' value='<< Voltar' onclick='history.back()'>");
exit;
}


if($nova == $confirma)
{


$sql2 = "UPDATE usuarios SET
senha   = '$nova'
,acesso = 2
WHERE login = '".$_REQUEST['usuario']."'";

$acao2 = mysql_query($sql2) or die(mysql_error());		


echo "<script>alert('Senha alterado com sucesso. Realize o login novamente.'); window.open('index.php'); window.top.close('alterar_senha2.php','conteudo'); </script>\n";

}
?>