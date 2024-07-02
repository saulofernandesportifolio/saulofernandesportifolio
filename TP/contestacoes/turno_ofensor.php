<?php

/**
 * @author Lauro Pereira
 * @copyright 2014
 */

 include '../conexao.php';
 
 $ofensor = $_POST['ofensor'];
 
 if($ofensor != ''){
     $sql = "SELECT item, turno, validacao 
			 FROM cont_operador
			 WHERE id = '$ofensor' ";
     $qr = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error());
     if($qr['turno'] == '')
     	die("O turno do usuario ".$qr["item"]." não foi cadastrado!");
     else
     	die($qr['turno']);
}else
{
    die('Erro nao identificado!');
}
?>