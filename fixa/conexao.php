<?php

function Conectar()
{ 
	try
	{ 
		$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'); 
		$con = new PDO("mysql:host=localhost; dbname=fixa;", "root", "Emprez@sVs20", $opcoes); 
		return $con; 
	} 
	catch (Exception $e)
	{ 
		echo 'Erro: '.$e->getMessage(); 
		return null; 
	} 
}

?>
