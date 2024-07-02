<?php

//FUNวรO PARA SALVAR MENSAGENS NOS COOKIES
function add_cookies($errologin,$errosenha,$erronome,$errosetor,
$erroramal,$errosenha1,$errosenha2,$erroemail,$resposta,$perfil){
    if(isset($errologin))
	   setcookie("valida_login", $errologin);
    else
    	setcookie("valida_login", "");
    if(isset($errosenha))
	   setcookie("valida_senha", $errosenha);
    else
    	setcookie("valida_senha", "");
    if(isset($erronome))
    	setcookie("valida_nome", $erronome);
    else
    	setcookie("valida_nome", "");
    if(isset($errosetor))
    	setcookie("valida_setor", $errosetor);
    else
    	setcookie("valida_setor", "");
    if(isset($erroramal))
    	setcookie("valida_ramal", $erroramal);
    else
    	setcookie("valida_ramal", "");
    if(isset($errosenha1))
    	setcookie("valida_senha1", $errosenha1);
    else
    	setcookie("valida_senha1", "");
    if(isset($errosenha2))
    	setcookie("valida_senha2", $errosenha2);
    else
    	setcookie("valida_senha2", "");
    if(isset($erroemail))
    	setcookie("valida_email", $erroemail);
    else
    	setcookie("valida_email", "");
    if(isset($resposta))
    	setcookie("resposta", $resposta);
    else
    	setcookie("resposta", "");
    if(isset($perfil))
    	setcookie("perfil", $perfil);
    else
    	setcookie("perfil", "");
}
?>