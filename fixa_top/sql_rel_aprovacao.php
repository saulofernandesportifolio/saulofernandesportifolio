<?php
set_time_limit(200);
require_once('../fixa_top/bd.php');


$mes = $_POST['mes'];
$query = mysql_query("CALL SP_APROVACAO_REPORT('$mes')");

while($fetch = mysql_fetch_array($query))
{
	$output[] = array (
	       $fetch[0], //operador                   
             $fetch[1], //siscom                     
             $fetch[2], //dataEntradaSiscom          
             $fetch[3], //canalEntrada               
             $fetch[4], //produto                    
             $fetch[5], //servico                    
             $fetch[6], //complementoServico         
             $fetch[7], //quantidadeAcessos          
             $fetch[8], //cnpj                       
             $fetch[9], //razaoSocial                
             $fetch[10], //dataEncerramento           
             $fetch[11], //numeroOportunidadeProposta 
             $fetch[12], //status                     
             $fetch[13], //obs                        
             $fetch[14], //regDataEntrada  
             $fetch[15], //regDataEntrada  
             $fetch[16], //regDataEntrada
             $fetch[17], //revisao
             $fetch[18], //revisao
             $fetch[19] //revisao         
	);
}

echo json_encode($output);

?>

