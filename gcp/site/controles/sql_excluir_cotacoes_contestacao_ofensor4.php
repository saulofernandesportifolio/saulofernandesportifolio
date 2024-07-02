<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../principal.php?&idcont=<?php echo $id_contestacao_cotacao; ?>&t=forms/form_cotacoes_contestacao_att.php";
}
</script>
</head>
<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  
   $calcula_data = date("d/m/Y");

 include("../../bd.php");

include("../../funcoes.php");



 $sql = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['idtbl_usuario'];
 $nome1= $consulta['nome'];

 $sql = "DELETE FROM cip_nv.base_erros_cotacao_contestacao 
        WHERE id='$id_erro' ";

 $result=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_3");




echo "<script>alert('Erro excluido com sucesso !'); 
                        redireciona();
                 window.close();

               </script>\n";
  exit;


mysql_free_result($consulta,$result);
mysql_close($conecta);
mysql_next_result($conecta);


?>	


</body>
</html>