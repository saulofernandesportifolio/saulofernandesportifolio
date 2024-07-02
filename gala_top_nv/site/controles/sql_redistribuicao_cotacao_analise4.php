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



$sql_update1 = "UPDATE tbl_analise SET
                    status_cip_analise =4,
                    disc_status_cip_analise='Redistribuido',
                    obs_analise = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_analise = '{$_POST['login_operador_analise']}',
					dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_analise = NULL,
                    hora_tratamento_analise = NULL,
                    status_correcao = NULL,
                    disc_status_correcao = NULL,
                    data_correcao = NULL,
                    hora_correcao = NULL,
                    obs_correcao_op = NULL,
                    id_correcao = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='$idtbl_usuario'
					WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1) or die (mysql_error());
   

$sql_delete1 = "DELETE FROM tbl_input 
					WHERE id_cotacao = $id_cotacao";
 	
$acao_delete1 = mysql_query($sql_delete1) or die (mysql_error());

$sql_delete1 = "DELETE FROM tbl_auditoria 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1) or die (mysql_error());

$sql_delete1 = "DELETE FROM tbl_correcao 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1) or die (mysql_error());  
  
    
    
}	

$sql_user = "SELECT idtbl_usuario,usuario FROM tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_analise']}' ";
 	
$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
 $user_distribuicao=$linha_user['nome'];   
    
}

echo "<script>alert('Pedidos redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formredistribuicao_cotacao_analise.php');
                  </script>\n";
	exit;

}

?>	


</body>
</html>