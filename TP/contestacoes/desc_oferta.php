<?php

/**
 * @author Lauro Pereira
 * @copyright 2013
 */

 include '../conexao.php';
 
 $erro = $_POST['erro'];
 
 if($erro == 6){
     $sql = "SELECT id, item FROM tp.cont_ofertas";
     $qr = mysql_query($sql) or die(mysql_error());
     
     while($ln = mysql_fetch_assoc($qr)){
     echo '<option value="'.$ln['id'].'">'.$ln['item'].'</option>';
     }
}else
{
    echo '<option value="NULL" disabled="disabled">Erro n&atilde;o relacionado &agrave; oferta.</option>';
}
?>