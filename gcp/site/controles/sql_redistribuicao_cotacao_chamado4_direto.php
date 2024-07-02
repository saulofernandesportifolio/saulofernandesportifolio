<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../principal.php?t=forms/form_fila_cotacao_chamado.php";
}
</script>
</head>
<?php

error_reporting(0);
ini_set("display_errors", 0 );


$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  





 include("../../bd.php");


if (empty($_POST["id_cotacao"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}


else
{


//$_POST['id_user'];


 $sql_update1 = "UPDATE cip_nv.tbl_chamado SET
                    status_cip_chamado =31,
                    disc_status_cip_chamado='Redistribuido',
                    obs_chamado = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_chamado='{$_POST['id_user']}',
					          dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_chamado = NULL,
                    hora_tratamento_chamado = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='{$_POST['id_user']}'
					WHERE id_cotacao = '{$_POST['id_cotacao']}' ";
	
$result = mysql_query($sql_update1,$conecta) or die(mysql_error());  
  
    

$sql_user = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['id_user']}' ";
 	
$acao_user = mysql_query($sql_user,$conecta) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
$user_distribuicao=$linha_user['nome'];   
    
}	
echo "<script>alert('Cotacoes redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
                   redireciona();
	               window.close();

               </script>\n";
	exit;
}

mysql_free_result($result);
mysql_close($conecta);
mysql_next_result($conecta);


?>	


</body>
</html>