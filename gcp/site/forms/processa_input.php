<?php
 include("../../bd.php");
$id_filtro = $_POST['id_filtro'];


if($id_filtro != '1234'){
$sql = "CALL cip_nv.usuario_input("."'{$id_filtro}'".","."'{$regional}'".")";
$qr = mysql_query($sql,$conecta) or die(mysql_error());
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
    
 $sql = "CALL cip_nv.usuario_input("."'%'".","."'{$regional}'".")";
$qr = mysql_query($sql,$conecta) or die(mysql_error());
echo '<option value="0" selected="selected">Selecione</option>';
   while($ln = mysql_fetch_assoc($qr)){
   echo '<option value="'.$ln['idtbl_usuario'].'">'.$ln['nome'].'</option>';
   }

}

?>
