<?php

//Arquivo para conexão com a base de daddos SGP

$host = "localhost";
$user_bd = "root";
$senha_bd = "Emprez@sVs20";
$base_dados = "fixa_top";

//Realizando a conexão com o banco de dados

$conecta = mysql_connect ($host, $user_bd, $senha_bd) or die ("Erro de conexao com o banco de dados, por favor entre em contato com a area de BI");

//Seleciona a base de dados

$banco_dados = mysql_select_db($base_dados, $conecta) or die ("Erro de conexao com a base de dados CI, por favor entre em contato com a area de BI");


mysql_query("SET NAMES utf8");
mysql_query("SET character_set_connection=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_results=utf8");

?>