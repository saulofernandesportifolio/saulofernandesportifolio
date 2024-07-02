<?php
 include("../../bd.php");

$sql = "SELECT * FROM cip_nv.cont_swap_status WHERE filtro_status = '{$_POST['swap']}' ";
$qr = mysql_query($sql,$conecta) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';
}else{
  echo '<option value="" selected="selected">Selecione......</option>';
   while($ln = mysql_fetch_assoc($qr)){
   //echo '<select name="'.$ln['motivo'].'"class="combo_padrao_banco" >';
   echo '<option value="'.$ln['id'].'">'.$ln["item"].'</option>';
   
   }
}
mysql_free_result($qr);
mysql_close($conecta);
?>

