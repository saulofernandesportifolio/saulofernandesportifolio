<?php
include'../../tp/conexao.php';
$id_filtro = $_POST['id_filtro'];
$sql = "SELECT * FROM motivos_reversao_indireto_bko WHERE filtro = '$id_filtro'";
$qr = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   //echo '<select name="'.$ln['motivo'].'"class="combo_padrao_banco" >';
   echo '<option value="'.$ln['motivo'].'">'.$ln['motivo'].'</option>';
   
   }
}
?>