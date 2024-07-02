<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("Y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/Y H:i:s");
  



if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
else
{

foreach($_POST["ling"] as $id_cotacao)
{
   
$sql_update1 = "UPDATE tbl_auditoria SET
                    status_cip_auditoria =14,
                    disc_status_cip_auditoria='Redistribuido',
                    obs_auditoria = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_auditoria = '{$_POST['login_operador_auditoria']}',
					          dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_auditoria = NULL,
                    hora_tratamento_auditoria = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='$idtbl_usuario'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1) or die (mysql_error());


$sql_delete1 = "DELETE FROM tbl_correcao 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1) or die (mysql_error());  
  
   
}

$sql_user = "SELECT idtbl_usuario,usuario FROM tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_auditoria']}' ";
 	
$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
$user_distribuicao=$linha_user['usuario'];   
    
}


	

echo "<script>alert('Pedidos distribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora De Retorno Distribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formredistribuicao_cotacao_auditoria.php');
                  </script>\n";
	exit;

}

?>	


</body>
</html>