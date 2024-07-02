<?php
set_time_limit(200);
require_once('../fixa_top/bd.php');

$mes = $_POST['mes'];

$query = mysql_query("CALL SP_TRAMITACAO_REPORT('$mes')");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
              $fetch[0], //Data
              $fetch[1], //Operador                  
              $fetch[2], //Siscom                    
              $fetch[3], //Data Entrada Siscom
              $fetch[4], //Data reb solicitação       
              $fetch[5], //Canal Entrada             
              $fetch[6], //Produto                   
              $fetch[7], //Serviço                   
              $fetch[8], //Complemento Serviço       
              $fetch[9], //Qtde Acessos          
              $fetch[10], //CNPJ                      
              $fetch[11], //Razão Social                     
              $fetch[12], //status 
              $fetch[13], //obs                    
              $fetch[14], //oportunidade          
              $fetch[15], //proposta,
              $fetch[16], //escritorio_gn,
              $fetch[17], //motivo devolucao,       
              $fetch[18], //complem devolucao,   
              $fetch[19], //data devolucao,     
	       $fetch[20]  //revisao
       );
}

echo json_encode($output);

?>

