<?php

/**
 * @author Lauro Pereira
 * @copyright 2013
 */

 include '../conexao.php';
 
 $erro = $_POST['erro'];
 $sql = "SELECT opcao FROM tp.tsa_menu WHERE classe = 'erro' AND indice = '".$erro."'";
 $qr = mysql_query($sql) or die(mysql_error());
 /*echo '<select name="desc_erro" class="combobox_padrao_grande">
                                <option value="0">Selecione...</option>';*/
 while($ln = mysql_fetch_assoc($qr)){
 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
 }
 //echo '</select>';
?>