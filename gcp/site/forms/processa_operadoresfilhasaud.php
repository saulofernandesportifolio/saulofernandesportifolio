<?php
 include("../../bd.php");
 $_POST['login_operador_aud'];

$sql = "SELECT b.idtbl_usuario,a.id_filtro,a.turno FROM cip_nv.tbl_turno a 
        INNER JOIN cip_nv.tbl_usuarios b 
        ON  a.id_filtro =b.turno 
        WHERE b.idtbl_usuario = '{$_POST['login_operador_aud']}' ORDER BY a.turno ASC ";
      
$qr = mysql_query($sql,$conecta) or die(mysql_error());



//echo '<option value="0" selected="selected">Selecione</option>';
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Sem operadores neste turno').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
    echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
   }
}
mysql_free_result($qr);
mysql_close($conecta);

?>