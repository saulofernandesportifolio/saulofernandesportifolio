<?php
 include("../../bd.php");


$sql = "SELECT * FROM cip_nv.tbl_usuarios a 
        WHERE a.perfil LIKE '{$_POST['id_filtro3']}' and a.status=1  ORDER BY nome ASC ";
      
$qr = mysql_query($sql,$conecta) or die(mysql_error());



echo '<option value="0" selected="selected">Selecione</option>';
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Sem operadores neste setor').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
    echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
   }
}
mysql_free_result($qr);
mysql_close($conecta);
?>