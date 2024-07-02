<?php
include'../conexao.php';
$id_filtro = $_POST['id_filtro'];
$sql = "SELECT * FROM filtro_sap_pendente_corrigido_motivo WHERE tipo = '$id_filtro' AND descricao='Enviado para'";
$qr = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem motivos para esta opção').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['motivo'].'">'.$ln['motivo'].'</option>';
   }
}
?>