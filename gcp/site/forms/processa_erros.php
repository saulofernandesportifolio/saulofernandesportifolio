<?php
include '../../bd.php';
$id_filtro = $_POST['id_filtro'];
$sql = "SELECT * FROM bd_erros_pn.filtro_erros WHERE tipo = '$id_filtro' ORDER BY motivo";
$qr = mysql_query($sql,$conecta2) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['motivo'].'">'.$ln['motivo'].'</option>';
   }
}

?>