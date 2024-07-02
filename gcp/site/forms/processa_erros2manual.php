<?php
include '../../bd.php';
$id_filtro_vivocorp = $_POST['id_filtro_vivocorp'];
$sql = "SELECT * FROM bd_erros_pn.tipos_erros_vivocorp a 
        INNER JOIN bd_erros_pn.tipos_erros b  
        ON b.id_filtro=a.id_filtro_vivocorp
        WHERE a.id= '$id_filtro_vivocorp'  ";
$qr = mysql_query($sql,$conecta2) or die(mysql_error());
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Não tem erros para esta opção').'</option>';

}else{
	 echo '<option value="">Selecione...</option>';
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['id_filtro'].'">'.$ln['tipo'].'</option>';
   }
}



?>