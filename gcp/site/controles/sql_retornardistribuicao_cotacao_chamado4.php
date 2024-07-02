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
	
	echo $_POST['filtro'];

foreach($_POST["ling"] as $id_cotacao)
{


if($_POST['filtro'] == 1){
   
  $sql_update1 = "UPDATE cip_nv.tbl_analise SET
                    status_cip_analise =3,
                    disc_status_cip_analise='Distribuir',
                    obs_analise = NULL,
                    motivo_da_acao = NULL,
					disc_motivo_da_acao= NULL,
                    idtbl_usuario_analise = NULL,
					dt_distribuicao = '$dt_distribuicao',
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

$sql_delete1 = "DELETE FROM cip_nv.tbl_chamado 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());


}elseif($_POST['filtro'] == 2){   
    
    $sql_update1 = "UPDATE cip_nv.tbl_input SET
                    status_cip_input =7,
                    disc_status_cip_input='Distribuir',
                    obs_input = NULL,
                    motivo_da_acao = NULL,
					disc_motivo_da_acao= NULL,
                    idtbl_usuario_input = NULL,
					dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_input = NULL,
                    hora_tratamento_input = NULL,
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

$sql_delete1 = "DELETE FROM cip_nv.tbl_auditoria 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());

$sql_delete1 = "DELETE FROM cip_nv.tbl_correcao 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());  

$sql_delete1 = "DELETE FROM cip_nv.tbl_chamado 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error()); 

  
  }elseif($_POST['filtro'] == 3){   
    
    $sql_update1 = "UPDATE cip_nv.tbl_auditoria SET
                    status_cip_auditoria =13,
                    disc_status_cip_auditoria='Distribuir',
                    obs_auditoria = NULL,
                    motivo_da_acao = NULL,
					disc_motivo_da_acao= NULL,
                    idtbl_usuario_auditoria = NULL,
					dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_auditoria = NULL,
                    hora_tratamento_auditoria = NULL,
                    dt_retorno_distribuicao='$dt_distribuicao',
                    idtbl_usuario_retorno_distribuicao='{$_COOKIE['idtbl_usuario']}'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());


$sql_delete1 = "DELETE FROM cip_nv.tbl_correcao 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error()); 

$sql_delete1 = "DELETE FROM cip_nv.tbl_chamado 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error()); 
  
  }elseif($_POST['filtro'] == 4){   
    
    $sql_update1 = "UPDATE cip_nv.tbl_correcao SET
                    status_cip_correcao =20,
                    disc_status_cip_correcao='Distribuir',
                    obs_correcao = NULL,
                    motivo_da_acao = NULL,
					disc_motivo_da_acao= NULL,
                    idtbl_usuario_correcao = NULL,
					dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_correcao = NULL,
                    hora_tratamento_correcao = NULL,
                    dt_retorno_distribuicao='$dt_distribuicao',
                    idtbl_usuario_retorno_distribuicao='{$_COOKIE['idtbl_usuario']}'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());

$sql_delete1 = "DELETE FROM cip_nv.tbl_chamado 
					WHERE id_cotacao = $id_cotacao";
	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());

  
  }elseif($_POST['filtro'] == 5){   
    
 $sql_update1 = "UPDATE cip_nv.tbl_chamado SET
                    status_cip_chamado =30,
                    disc_status_cip_chamado='Aguardando Chamado',
                    obs_chamado = NULL,
                    motivo_da_acao = NULL,
					disc_motivo_da_acao= NULL,
                    idtbl_usuario_chamado = NULL,
					dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_chamado = NULL,
                    hora_tratamento_chamado = NULL,
                    dt_retorno_distribuicao='$dt_distribuicao',
                    idtbl_usuario_retorno_distribuicao='$idtbl_usuario'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());

 $sql="SELECT a.id_cotacao,b.setor_origem  
     FROM cip_nv.tbl_cotacao a 
     INNER JOIN cip_nv.tbl_chamado b 
 	 ON a.id_cotacao=b.id_cotacao and b.id_cotacao='$id_cotacao' ";
  $acao = mysql_query($sql,$conecta) or die (mysql_error());
  $linha_atv = mysql_fetch_array($acao);
  $setor_origem    = $linha_atv["setor_origem"];
 
 if($setor_origem  == 'Input' )
{
$sql_delete1 = "DELETE FROM cip_nv.tbl_input 
					WHERE id_cotacao = $id_cotacao and   status_cip_input = 7 ";
 	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());
}else   

if($setor_origem  == 'Auditoria' )
{
 $sql_delete1 = "DELETE FROM cip_nv.tbl_auditoria 
					WHERE id_cotacao = $id_cotacao and  and   status_cip_auditoria = 13 ";
 	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());
}else   
 
if($setor_origem  == 'Correcao' )
{
 $sql_delete1 = "DELETE FROM cip_nv.tbl_correcao 
					WHERE id_cotacao = $id_cotacao and  and   status_cip_correcao=20 ";
 	
$acao_delete1 = mysql_query($sql_delete1,$conecta) or die (mysql_error());
} 
 
 
 }        
}	

echo utf8_encode("<script>alert('Cotacoes distribuidas para o login: $nome'); 
	              alert('Data/Hora De Retorno Distribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formfiltro_retorno_chamado.php');
                  </script>\n");
	exit;

}

mysql_free_result($acao_user,$acao_update1,$acao);
mysql_close($conecta);
mysql_next_result($conecta);


?>	


</body>
</html>