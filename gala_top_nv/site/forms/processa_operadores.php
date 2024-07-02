<?php
 include("../../bd.php");
$id_filtro = $_POST['id_filtro'];

if($id_filtro != '1234'){
$sql = "SELECT * FROM tbl_usuarios WHERE turno LIKE '%$id_filtro%' and perfil IN (2,3,12,5,6) and status=1 ORDER BY nome ASC ";
$qr = mysql_query($sql) or die(mysql_error());
echo '<option value="0" selected="selected">Selecione</option>';
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Sem operadores neste turno').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
    echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
   }
}
}
else{
    
$sql = "SELECT * FROM tbl_usuarios WHERE turno LIKE '%' and  perfil IN (2,3,12,5,6) and status=1 ORDER BY nome ASC ";
$qr = mysql_query($sql) or die(mysql_error());
echo '<option value="0" selected="selected">Selecione</option>';
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
   }

}

?>