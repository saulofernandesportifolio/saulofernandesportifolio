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

foreach($_POST["ling"] as $id)
{



 $sql_update1 = "UPDATE bd_erros_pn.base_erros_top_tt  SET
                    status_tp =1,
                    disc_status_tp='Aberto',
                    data_correcao = NULL,
                    ofensor = NULL,
                    adabas = NULL,
					          usuario = 'Aguardando',
                    fila = 1,
                    nome2 = 'Aguardando Operador',
                    tramite = 'Aguardando',
                    data_tramite = NULL,
                    turno = 'ND',
                    operador = 'Aguardando Operador',
                    turno_ofensor = NULL,
                    data_tratamento = NULL,
                    hora_tratamento = NULL,
                    comentario = NULL
					WHERE id = $id";


	
$acao_update1 = mysql_query($sql_update1,$conecta2) or die (mysql_error());
   

$sql_delete1 = "DELETE FROM bd_erros_pn.base_erros_historico_top_tt  
				      	WHERE id = $id ";
 	
$acao_delete1 = mysql_query($sql_delete1,$conecta2) or die (mysql_error());
    
    
}	

echo "<script>alert('Pedidos distribuidos para o login: $nome'); 
	            document.location.replace('principal.php?t=forms/formfiltro_retorno_erros_top_tt.php');
                  </script>\n";
	exit();

}

mysql_free_result($acao_update1,$acao_delete1);
mysql_close($conecta2);
mysql_next_result($conecta2);


?>	


</body>
</html>