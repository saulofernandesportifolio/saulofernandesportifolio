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
if ( empty($_POST["filtro"]))
{
	echo "<script>alert('Nenhuma setor selecionado.'); window.history.go(-1); </script>\n";
	exit;
}
else
{

foreach($_POST["ling"] as $id_cotacao)
{



 $sql_update1 = "UPDATE cip_nv.tbl_analise SET
                    status_cip_analise =3,
                    disc_status_cip_analise='Distribuir',
                    obs_analise = NULL,
                    motivo_da_acao = NULL,
                    idtbl_usuario_analise = NULL,
					          dt_distribuicao = NULL,
                    dt_tratamento_analise = NULL,
                    hora_tratamento_analise = NULL,
                    status_correcao = NULL,
                    disc_status_correcao = NULL,
                    data_correcao = NULL,
                    hora_correcao = NULL,
                    obs_correcao_op = NULL,
                    id_correcao = NULL,
                    dt_retorno_distribuicao='$dt_distribuicao',
                    idtbl_usuario_retorno_distribuicao='{$_COOKIE['idtbl_usuario']}'
					WHERE id_cotacao = $id_cotacao";
	


	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());
   

$sql_delete1 = "DELETE FROM cip_nv.tbl_input 
					WHERE id_cotacao = $id_cotacao";
 	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());

$sql_delete1 = "DELETE FROM cip_nv.tbl_auditoria 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());

$sql_delete1 = "DELETE FROM cip_nv.tbl_correcao 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());  
  
    
    
}	

echo "<script>alert('Pedidos distribuidos para o login: $nome'); 
	              alert('Data/Hora Da Retorno Distribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formfiltro_retorno_analise.php');
                  </script>\n";
	exit;

}


mysql_free_result($acao_user,$acao_update1,$acao_delete1);
mysql_close($conecta);
mysql_next_result($conecta);



?>	


</body>
</html>