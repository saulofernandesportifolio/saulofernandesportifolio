<head>
<script>
/*function redireciona() {
window.close();
opener.location.href="../forms/form_atualizar_cotacoes_contestacao_status.php?&idcont=<?php //echo $id_contestacao_cotacao; ?>";
}*/
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

 $sql = "UPDATE cip_nv.base_erros_cotacao_contestacao_manual 
        SET contestacao='{$_POST['contestacao']}'
        WHERE id_contestacao_cotacao='{$_POST['id_contestacao_cotacao']}' and id='{$_POST['id_erro']}' ";

 $result=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_3");


/*

echo "<script>alert('Status atualizado com sucesso !'); 
                        redireciona();
                 window.close();

               </script>\n";
  exit;*/
  
  
  echo "<script>alert('Status atualizado com sucesso !'); 
                        history.back();
                           </script>\n";
  exit;
  
  


mysql_free_result($consulta,$result);
mysql_close($conecta);
mysql_next_result($conecta);


?>	


</body>
</html>