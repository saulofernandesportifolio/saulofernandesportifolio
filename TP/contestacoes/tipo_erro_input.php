<?php
/**
 * @author saulo de assis
 * @copyright 2014
 * 
 */

 if(isset($_POST['erro'])&& $_POST['erro'] != ""){
    
   echo '<option value="0">'.'Selecione'.'</option>';  
  
 $sql = "SELECT id, item
                FROM tp.cont_motivos_erro_input
                WHERE id_erro LIKE '%-{$_POST['erro']}-%' ORDER BY item,id_erro";
     include '../conexao.php';
             
     $qr = mysql_query($sql) or die(mysql_error());
      
     while($ln = mysql_fetch_assoc($qr)){
      echo '<option value="'.$ln['id'].'">'.$ln['item'].'</option>';
     }
   
     
 }
 else
{
    echo '<option value="n/a" disabled="disabled">Erro n&atilde;o selecionado.</option>';
}
?>