<?php
 include("../../bd.php");
 $id_filtro44 = $_POST['id_filtro44'];
$sql = "SELECT idtbl_usuario,nome,perfil,status FROM tbl_usuarios 
WHERE perfil LIKE '$id_filtro44' ORDER BY nome ASC ";
$qr = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   //echo '<select name="'.$ln['motivo'].'"class="combo_padrao_banco" >';
   echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln["nome"].'</option>';
   
   }
}





/*}
}
elseif($id_filtro == 235612){
    
$sql = "SELECT * FROM tbl_usuarios WHERE Perfil LIKE '%' and status=1 ORDER BY nome ASC ";
$qr = mysql_query($sql) or die(mysql_error());
echo '<option value="0" selected="selected">Selecione</option>';
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
   }

}

?>