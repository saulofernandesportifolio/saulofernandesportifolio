
<?php
//header("Content-Type: text/html; charset=utf-8");

$host = "localhost";
$usuario2 = "root";
$senha2 = "Emprez@sVs20";
$base_dados = "ponto";

/* Realizando conexao com o banco de dados */
$con = mysql_connect($host, $usuario2, $senha2) or die("Erro de conexão com a base de dados. Contate o administrador do sistema.");

/* Selecionando a base de dados */
$banco_dados = mysql_select_db($base_dados, $con) or die("Erro de conexão com a base de dados. Contate o administrador do sistema.");

mysql_query("SET NAMES ‘utf8′");
mysql_query("SET character_set_connection=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_results=utf8");

?>