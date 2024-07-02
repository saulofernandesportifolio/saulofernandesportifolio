<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_distribuicao = date("y/m/d H:i:s");
  
  $dt_distribuicao2 = date("d/m/y H:i:s");
  



include("../bd.php");


if (empty($_POST["id_cotacao"]))
{
	echo "<script>alert('Nenhuma atividade selecionada.'); window.history.go(-1); </script>\n";
	exit;
}

else
{

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='$id_user'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
    }

foreach($_POST["id_cotacao"] as $id_cotacao)
{


    $sql_update1 = "UPDATE cip_nv.tbl_chamado SET
                    status_cip_chamado =31,
                    disc_status_cip_chamado='Redistribuido',
                    obs_chamado = NULL,
                    motivo_da_acao = NULL,
                    disc_motivo_da_acao = NULL,
                    idtbl_usuario_chamado='$idtbl_usuario',
					          dt_distribuicao = '$dt_distribuicao',
                    dt_tratamento_chamado = NULL,
                    hora_tratamento_chamado = NULL,
                    dt_redistribuicao='$dt_distribuicao',
                    idtbl_usuario_redistribuicao='$idtbl_usuario'
					WHERE id_cotacao = $id_cotacao";
	
$acao_update1 = mysql_query($sql_update1,$conecta) or die (mysql_error());  
  
    
}


$sql_user = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios 
					WHERE idtbl_usuario = '$idtbl_usuario' ";
 	
$acao_user = mysql_query($sql_user,$conecta) or die (mysql_error());

while($linha_user= mysql_fetch_array($acao_user)){
 
$user_distribuicao=$linha_user['nome'];   
    
}	

echo "<script>alert('Cotacoes redistribuidos para o login: $user_distribuicao'); 
	              alert('Data/Hora da redistribuição: $dt_distribuicao2');	
	               document.location.replace('principal.php?t=forms/form_fila_chamado.php');
                  </script>\n";
	exit;

}

mysql_free_result($acao_user,$acao_update1,$acao_operador);
mysql_close($conecta);
mysql_next_result($conecta);



?>	


</body>
</html>