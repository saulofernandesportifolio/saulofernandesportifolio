<?php
include'../conexao.php';
$id_filtro = $_POST['id_filtro'];
$sql = "SELECT * FROM filtro_erros WHERE tipo = '$id_filtro'";
$qr = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('N�o tem erros para esta op��o').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['motivo'].'">'.$ln['motivo'].'</option>';
   }
}
?>