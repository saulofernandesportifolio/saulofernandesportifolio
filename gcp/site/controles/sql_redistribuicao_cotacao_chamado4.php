<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  





if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if (empty($_POST['login_operador_chamado']))
{
  echo "<script>alert('selecione um operador.'); window.history.go(-1); </script>\n";
  exit;
}
else
{

foreach($_POST["ling"] as $id_cotacao)
{


    $sql_update1 = "UPDATE cip_nv.tbl_chamado SET
                    status_cip_chamado =31,
                    disc_status_cip_chamado='Redistribuido',
                    obs_chamado = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_chamado='{$_POST['login_operador_chamado']}',
					          dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_chamado = NULL,
                    hora_tratamento_chamado = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='{$_COOKIE['idtbl_usuario']}'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());  
  
    
}


$sql_user = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_chamado']}' ";
 	
$acao_user = mysql_query($sql_user,$conecta) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
$user_distribuicao=$linha_user['nome'];   
    
}	

echo "<script>alert('Cotacoes redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formfiltro_redistribuicao_chamado.php');
                  </script>\n";
	exit;

}


mysql_free_result($acao_user,$acao_update1,$acao_operador);
mysql_close($conecta);
mysql_next_result($conecta);

?>	


</body>
</html>