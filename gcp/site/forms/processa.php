<?php
 include("../../bd.php");
 $id_filtro2 = $_POST['id_filtro2'];

$sql = "SELECT id,id_filtro2,tipo_erro2 FROM cip_nv.tbl_tipo_de_erro_auditoria2 WHERE id_filtro2 LIKE '$id_filtro2' ";
$qr = mysql_query($sql,$conecta) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   //echo '<select name="'.$ln['motivo'].'"class="combo_padrao_banco" >';
   echo '<option value="'.$ln['id'].'">'.$ln["tipo_erro2"].'</option>';
   
   }
}

mysql_free_result($qr);
mysql_close($conecta);
?>