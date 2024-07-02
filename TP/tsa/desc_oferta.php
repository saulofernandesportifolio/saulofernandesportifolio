<?php

/**
 * @author Lauro Pereira
 * @copyright 2013
 */

 include '../conexao.php';
 
 $erro = $_POST['erro'];
 
 if(strstr($erro, 'Book_de_ofertas')){
     $sql = "SELECT opcao FROM tp.tsa_menu WHERE classe = 'book'";
     $qr = mysql_query($sql) or die(mysql_error());
     
     while($ln = mysql_fetch_assoc($qr)){
     echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
     }
}else
{
    echo '<option value="n/a" disabled="disabled">Erro n&atilde;o relacionado &agrave; oferta.</option>';
}
?>