<?php

/**
 * @author saulo.assis
 * @copyright 2015
 */


//Arquivo para conex�o com a base de daddos 

$host = "localhost";
$user_bd = "root";
//$senha_bd = "Emprez@sVs20";
$senha_bd = "atento";
$base_dados = "cip_nv";

//Realizando a conex�o com o banco de dados

$conecta = mysql_connect ($host, $user_bd, $senha_bd) or die ("Erro de conexao com o banco de dados, por favor entre em contato com a area de desenvolvimento B.I");

//Seleciona a base de dados

$banco_dados = mysql_select_db($base_dados, $conecta) or die ("Erro de conexao com a base de dados, por favor entre em contato com a area de desenvolvimento B.I");





//Arquivo para conex�o com a base de daddos 

$host2 = "localhost";
$user_bd2 = "root";
//$senha_bd2 = "Emprez@sVs20";
$senha_bd2 = "atento";
$base_dados2 = "bd_erros_pn";

//Realizando a conex�o com o banco de dados

$conecta2 = mysql_connect ($host2, $user_bd2, $senha_bd2) or die ("Erro de conexao com o banco de dados, por favor entre em contato com a area de desenvolvimento B.I 2");

//Seleciona a base de dados

$banco_dados2 = mysql_select_db($base_dados2, $conecta2) or die ("Erro de conexao com a base de dados, por favor entre em contato com a area de desenvolvimento B.I 2");




//Arquivo para conex�o com a base de daddos 

$host3 = "localhost";
$user_bd3 = "root";
//$senha_bd3 = "Emprez@sVs20";
$senha_bd3 = "atento";
$base_dados3 = "cip";

//Realizando a conex�o com o banco de dados

$conecta3 = mysql_connect ($host3, $user_bd3, $senha_bd3) or die ("Erro de conexao com o banco de dados, por favor entre em contato com a area de desenvolvimento B.I 3");

//Seleciona a base de dados

$banco_dados3 = mysql_select_db($base_dados3, $conecta3) or die ("Erro de conexao com a base de dados, por favor entre em contato com a area de desenvolvimento B.I 3");






mysql_query("SET NAMES utf8");
mysql_query("SET character_set_connection=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_results=utf8");


?>
