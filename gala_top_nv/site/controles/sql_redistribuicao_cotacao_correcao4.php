<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  



 $login_operador;



if (empty($_POST["ling"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
if("$login_operador_correcao" == '0'){ 

echo "<script>alert('Por favor selecionar o usuario.'); window.history.go(-1); </script>\n";
	exit;

}
else
{

foreach($_POST["ling"] as $id_cotacao)
{


    $sql_update1 = "UPDATE tbl_correcao SET
                    status_cip_correcao =21,
                    disc_status_cip_correcao='Redistribuido',
                    obs_correcao = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_correcao ='{$_POST['login_operador_correcao']}',
					          dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_correcao = NULL,
                    hora_tratamento_correcao = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='$idtbl_usuario'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1) or die (mysql_error());  
  
    
}


$sql_user = "SELECT idtbl_usuario,usuario FROM tbl_usuarios 
					WHERE idtbl_usuario = '{$_POST['login_operador_correcao']}' ";
 	
$acao_user = mysql_query($sql_user) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
$user_distribuicao=$linha_user['usuario'];   
    
}	

echo "<script>alert('Pedidos redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/formredistribuicao_cotacao_correcao.php');
                  </script>\n";
	exit;

}

?>	


</body>
</html>