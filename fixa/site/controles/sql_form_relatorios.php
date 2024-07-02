<?php
    
ini_set('memory_limit', '-1');
require_once '../fixa/site/classes/PHPExcel.php';
require_once '../fixa/site/classes/PHPExcel/IOFactory.php';

$relatorio  = $_POST['relatorioBi'];
$dataInicio = $_POST['data_inicio'];
$dataFim    = $_POST['data_fim'];


// Create your database query
$query = "CALL proc_consulta_relatorios_bi('$relatorio', '$dataInicio', '$dataFim')";  

// Execute the database query
$result = mysql_query($query) or die(mysql_error());

// Instantiate a new PHPExcel object
$objPHPExcel = new PHPExcel(); 

// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0); 

if($relatorio == 'pretramitacao')
    {
    $objPHPExcel->getActiveSheet()->setTitle('pretramitacao');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_hora']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['analista_pre']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['id_solicitacao']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['cat_produto']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['devolucao']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['canal_entrada']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['data_receb_solicitacao']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['n_pact_siscom']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['produto']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['tipo_solicitacao']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['servicos']);
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['cnpj']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['razao_social']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['qtd_acessos']); 
        $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['n_gestao_servicos']);
        $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['data_abert_gestao']);  
        $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['motivo_devolucao']);  
        $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['area_devolucao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['data_devolucao']);  
        $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['status_solicitacao']);  
        $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['obs']);  
        $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['revisao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['complemento_tipo_solicitacao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['e2e']);
        $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount,$row['data_pedido_cancelamento_cliente']);
        $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount,$row['dias_memorando_finalizacao_pre']);  
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'pretramitacao ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
}else if($relatorio == 'tramitacao')
{
    {
    $objPHPExcel->getActiveSheet()->setTitle('tramitacao');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_hora']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['analista_tramitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['devolucao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['id_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['data_entrada_siscom']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['canal_entrada']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['produto']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['servicos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['qtd_acessos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['n_pact_siscom']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['cnpj']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['razao_social']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['n_gestao_servicos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['data_abertura_gestao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['cat_produto']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['data_devolucao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['data_encerramento']);
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['status_solicitacao_tramitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['obs']);
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['revisao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['complemento_tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['e2e']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['data_pedido_cancelamento_cliente']); 
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'tramitacao ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
    }
}else if($relatorio == 'postramitacao')
{
    {
    $objPHPExcel->getActiveSheet()->setTitle('postramitacao');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_hora']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['usuario']);      
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['id_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['data_entrada_siscom']);                         
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['canal_entrada']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['produto']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['servicos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['qtd_acessos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['cnpj']);                                        
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['razao_social']);                           
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['n_gestao_servicos']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['motivo_devolucao']);            
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['oportunidade']);                   
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['proposta']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['data_recebimento_pos']);           
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['data_finalizado']);                        
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['contrato_mae']);
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['obs']);                        
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['revisao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['complemento_tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['e2e']);
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['data_pedido_cancelamento_cliente']);   
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['qtd_contrato_analisados']);    
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['data_assinatura_contrato']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['data_receb_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['dias_pre_pos']);
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'postramitacao ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
    }
}else if($relatorio == 'intragov')
{
    {
    $objPHPExcel->getActiveSheet()->setTitle('intragov');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['reg_dt_entrada']);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data_solicitacao']);   
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['usuario']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['devolucao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['canal_entrada']);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['produto']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['servico_intragov']);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['qtd_acessos']);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['motivo_cancelamento']);
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['cnpj']);             
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['razao_social']);
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['n_gestao_servicos']);
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['data_abertura_gestao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['motivo_devolucao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['area_solicitante']);
        $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['data_devolucao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['data_encerramento']);
        $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['status_solicitacao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['obs']);
        $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['revisao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['id_solicitacao']);
        $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['e2e']);
        $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['data_pedido_cancelamento_cliente']);
        $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['dias_memorando_finalizacao_intragov']);
        $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['dias_inicio_finalizacao']);
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'intragov ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
    }
}else if($relatorio == 'gcon')
{
    {
    $objPHPExcel->getActiveSheet()->setTitle('gcon');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['reg_dt_entrada']);      
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data_receb_documento']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['tipo_entrada']);        
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['contrato_mae']);        
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['data_assinatura_doc']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['numero_documento']);   
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['sistema_validacao']);   
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['n_vantive']);           
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['produto']);             
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['data_trativa']);        
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['nome_solicitante']);    
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['operador']);            
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['n_gestao_servicos']);  
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['razao_social']);            
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['cnpj']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['plano_solicitado']);        
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['qtde_acesso']);             
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['data_finalizacao']);               
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['numero_wcd']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['contrato']);          
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['revisao']);                 
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['id_solicitacao']);          
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['devolucao']);               
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['motivo_devolucao']);        
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['area_devolucao']);          
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['data_devolucao']);          
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['e2e']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $row['data_assinatura_contrato']);   
            $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $row['qtd_contrato_analisados']);    
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'gcon ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
    }
}
else if($relatorio == 'historico_pos')
{
    {
    $objPHPExcel->getActiveSheet()->setTitle('historico_pos');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_hora']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['usuario']);      
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['id_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['data_entrada_siscom']);                         
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['canal_entrada']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['produto']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['servicos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['qtd_acessos']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['cnpj']);                                        
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['razao_social']);                           
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['n_gestao_servicos']);              
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['motivo_devolucao']);            
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['oportunidade']);                   
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['proposta']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['data_recebimento_pos']);           
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['data_finalizado']);                        
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['contrato_mae']);
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['obs']);                        
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['revisao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['complemento_tipo_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['e2e']);
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['data_pedido_cancelamento_cliente']);   
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['qtd_contrato_analisados']);    
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['data_assinatura_contrato']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['data_receb_solicitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['dias_pre_pos']);
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'historico_pos ' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
    }
}


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

ob_end_clean();
$objWriter->save('php://output');


exit;


?>