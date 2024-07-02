<?php
set_time_limit(200);
require_once('../fixa_top/bd.php');

$mes = $_POST['mes'];

$query = mysql_query("CALL SP_APOIO_REPORT('$mes')");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
               $fetch[0], // Operador;
               $fetch[1],  //Solicitação                   
               $fetch[2],  //Data receb. solicitação                    
               $fetch[3],  //Canal Entrada          
               $fetch[4],  //Produto             
               $fetch[5],  //Serviço                    
               $fetch[6],  //Complemento Serviço                   
               $fetch[7],  //Escritório GN 
               $fetch[8],  //Qtde Acessos       
               $fetch[9],   //CNPJ        
               $fetch[10],  //Razão Social                       
               $fetch[11],  // Status                   
               $fetch[12],  // Obs                    
               $fetch[13],  //Motivo Devolução 
               $fetch[14],  //Compl. Motivo Devolução
               $fetch[15]  //Data Cadastro
       );
}

echo json_encode($output);

?>

