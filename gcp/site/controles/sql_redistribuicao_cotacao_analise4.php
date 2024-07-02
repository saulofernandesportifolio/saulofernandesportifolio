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
if (empty($_POST['login_operador_analise']))
{
  echo "<script>alert('selecione um operador.'); window.history.go(-1); </script>\n";
  exit;
}
else
{


foreach($_POST["ling"] as $id_cotacao)
{


$sql_verifica="SELECT * FROM cip_nv.tbl_chamado a 
               INNER JOIN cip_nv.tbl_analise b 
               ON a.id_cotacao='$id_cotacao' 
               WHERE a.status_cip_chamado IN (31,33) AND a.setor_origem='Analise' AND b.id_cotacao='$id_cotacao' ";
$acao_sql_verifica = mysql_query($sql_verifica,$conecta) or die (mysql_error());
$num_chamado=mysql_num_rows($acao_sql_verifica);

if($num_chamado > 0){

  echo "<script>alert('Verticar com operador chamado pois esta pendente na visao dele devera ser dado baixa da visao chamado'); 
        document.location.replace('principal.php?t=forms/formfiltro_redistribuicao_correcao.php');
      </script>\n";
    exit();

}





$sql_update1 = "UPDATE cip_nv.tbl_analise SET
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
                    idtbl_usuario_redistribuicao='{$_COOKIE['idtbl_usuario']}'
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

$sql_user = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_analise']}' ";
 	
$acao_user = mysql_query($sql_user,$conecta) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
 $user_distribuicao=$linha_user['nome'];   
    
}

echo "<script>alert('Cotacao redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formfiltro_redistribuicao_analise.php');
                  </script>\n";
	exit;

}


mysql_free_result($acao_user,$acao_delete1,$acao_update1);
mysql_close($conecta);
mysql_next_result($conecta);



?>	


</body>
</html>