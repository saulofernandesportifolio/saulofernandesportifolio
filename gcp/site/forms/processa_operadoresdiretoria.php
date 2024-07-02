<?php
 //include("../../bd.php");

 
$servidor = "10.119.243.217";//Geralmente é localhost mesmo
$nome_usuario = "root";//Nome do usuário do mysql
$senha_usuario = "atento"; //Senha do usuário do mysql
$nome_do_banco = "input_piloto"; //Nome do banco de dados
$conecta2serv02 = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario", TRUE) or die (mysql_error());
$banco2 = mysql_select_db("$nome_do_banco",$conecta2serv02) or die (mysql_error());

$sql = "SELECT a.id,a.turno FROM input_piloto.tbl_usuarios a 
        WHERE a.id= '{$_POST['login_operadores_dir']}' ORDER BY a.turno ASC ";
      
$qr = mysql_query($sql,$conecta2serv02) or die(mysql_error());



//echo '<option value="0" selected="selected">Selecione</option>';
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Sem operadores neste turno').'</option>';
}else{
   while($ln = mysql_fetch_assoc($qr)){
    echo '<option value="'.$ln['turno'].'">'.$ln['turno'].'</option>';
   }
}
mysql_free_result($qr);
mysql_close($conecta);

?>