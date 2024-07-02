<?php
/**
 * @author Lauro Pereira
 * @copyright 2013
 */
 if(isset($_POST['erro'])&& $_POST['erro'] != ""){
     $sql = "SELECT id, item
                FROM tp.cont_sub_motivos_erro
                WHERE id_erro = '{$_POST['erro']}' ORDER BY item";
     include '../conexao.php';
     $qr = mysql_query($sql) or die(mysql_error());
     
     while($ln = mysql_fetch_assoc($qr)){
        echo '<option value="'.$ln['id'].'">'.$ln['item'].'</option>';
     }
 }else
{
    echo '<option value="n/a" disabled="disabled">Erro n&atilde;o selecionado.</option>';
}
?>