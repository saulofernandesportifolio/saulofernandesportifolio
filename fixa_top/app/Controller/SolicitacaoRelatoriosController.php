<?php
ini_set('memory_limit', '-1');
ini_set('mysql.connect_timeout' ,  '200' ); 
ini_set('default_socket_timeout' ,  '200' );

set_time_limit(0);
require_once '../fixa_top/app/Model/PHPExcel.php';
require_once '../fixa_top/app/Model/PHPExcel/IOFactory.php';

$relatorio  = $_POST['relatorioBi'];
$dataInicio = $_POST['data_inicio'];
$dataFim    = $_POST['data_fim'];

if($relatorio == "consolidado_geral")
{
    // Create your database query
    $query = "CALL SP_CONSOLIDADO_REPORT('$dataInicio', '$dataFim')";  

}
else
{
  // Create your database query
    $query = "CALL SP_CONSULTA_RELATORIOS('$relatorio', '$dataInicio', '$dataFim')";    
}

// Execute the database query
$result = mysql_query($query) or die(mysql_error());

// Instantiate a new PHPExcel object
$objPHPExcel = new PHPExcel(); 

// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0); 


if($relatorio == 'tramitacao')
{
    $objPHPExcel->getActiveSheet()->setTitle('tramitacao geral');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
         $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_importacao']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['id_usuario_tramitacao']);  
         $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['siscom']);                   
         $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['canal_entrada']);
         $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['data_entrada_siscom']);  
         $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['produto']);             
         $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['servico']);                
         $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['complemento_servico']);    
         $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['quantidade_acessos']);     
         $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['cnpj']);                   
         $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['razao_social']);           
         $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['data_encerramento']);      
         $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['status']);              
         $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['obs']);                    
         $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['oportunidade']);
         $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['proposta']);
         $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['escritorio_gn']);              
         $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['motivo_devolucao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['descricao_motivo_devolucao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['data_devolucao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['data_recebimento_solicitacao_manual']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['revisao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['origem']);        
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'tramitacao geral' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
}
else if($relatorio == 'aprovacao')
{
    {
        $objPHPExcel->getActiveSheet()->setTitle('aprovacao geral');

        // Initialise the Excel row number
        $rowCount = 1; 
        // Iterate through each result from the SQL query in turn
        // We fetch each database result row into $row in turn
        while($row = mysql_fetch_array($result)){ 
            // Set cell An to the "name" column from the database (assuming you have a column called name)
            //    where n is the Excel row number (ie cell A1 in the first row)
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_importacao']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data']);  
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['id_usuario_tramitacao']);   
                $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['siscom']);                  
                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['data_entrada_siscom']);     
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['canal_entrada']);        
                $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['produto']);              
                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['servico']);                 
                $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['complemento_servico']);     
                $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['quantidade_acessos']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['data_recebimento_aprovacao']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['cnpj']);                    
                $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['razao_social']);            
                $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['oportunidade']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['proposta']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['data_finalizado']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['obs']); 
                $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['status']);               
                $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['motivo_devolucao']);
                $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['complemento_motivo_devolucao']);
                $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['data_devolucao']);   
                $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['revisao']);
                $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['origem']); 
            // Increment the Excel row counter
            $rowCount++; 
        } 

        $file_name = 'aprovacao geral' . date('Y-m-d H:i').'.xlsx';  

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


        header('Content-Disposition: attachment;filename="'.$file_name.'"');

        header('Cache-Control: max-age=0');
    }
}
else if($relatorio == 'consolidado_tramitacao')
{
    $objPHPExcel->getActiveSheet()->setTitle('tramitacao');

    // Initialise the Excel row number
    $rowCount = 1; 
    // Iterate through each result from the SQL query in turn
    // We fetch each database result row into $row in turn
    while($row = mysql_fetch_array($result)){ 
        // Set cell An to the "name" column from the database (assuming you have a column called name)
        //    where n is the Excel row number (ie cell A1 in the first row)
         $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_importacao']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data_finalizacao_tramitacao']);  
         $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['numero_dias_tratativa']);                   
         $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['SLA']);
         $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['id_usuario_tramitacao']);  
         $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['siscom']);             
         $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['canal_entrada']);
         $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['data_entrada_siscom']);                
         $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['produto']);    
         $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['servico']);     
         $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['complemento_servico']);                   
         $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['quantidade_acessos']);           
         $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['cnpj']);      
         $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['razao_social']);              
         $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['data_encerramento']);                    
         $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['status']);
         $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['obs']);
         $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['oportunidade']);              
         $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['proposta']);
         $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['escritorio_gn']);
         $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['motivo_devolucao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['descricao_motivo_devolucao']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['data_devolucao']);
         $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['data_recebimento_solicitacao_manual']);
         $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['revisao']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['origem']); 
         $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['relatorio']);          
        // Increment the Excel row counter
        $rowCount++; 
    } 

    $file_name = 'Tramitacao - Realizado/Pendentes' . date('Y-m-d H:i').'.xlsx';  

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


    header('Content-Disposition: attachment;filename="'.$file_name.'"');

    header('Cache-Control: max-age=0');
}
else if($relatorio == 'consolidado_aprovacao')
{
    {
        $objPHPExcel->getActiveSheet()->setTitle('aprovacao');

        // Initialise the Excel row number
        $rowCount = 1; 
        // Iterate through each result from the SQL query in turn
        // We fetch each database result row into $row in turn
        while($row = mysql_fetch_array($result)){ 
            // Set cell An to the "name" column from the database (assuming you have a column called name)
            //    where n is the Excel row number (ie cell A1 in the first row)
             $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data_importacao']); 
             $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data_finalizacao_tramitacao']); 
             $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['data_finalizacao_aprovacao']);  
             $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['numero_dias_tratativa']);                   
             $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['SLA']);
             $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['id_usuario_tramitacao']);  
             $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['siscom']);  
             $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['data_entrada_siscom']);             
             $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['canal_entrada']);               
             $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['produto']);    
             $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['servico']);     
             $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['complemento_servico']);                   
             $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['quantidade_acessos']);
             $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['data_recebimento_aprovacao']);             
             $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['cnpj']);      
             $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['razao_social']);              
             $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['data_encerramento']);                    
             $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['status']);
             $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['obs']);
             $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['oportunidade']);              
             $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['proposta']);
             $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['escritorio_gn']);
             $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['motivo_devolucao']);
             $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['descricao_motivo_devolucao']); 
             $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['data_devolucao']);
             $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['data_recebimento_solicitacao_manual']);
             $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['revisao']); 
             $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['origem']); 
             $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $row['relatorio']);
            // Increment the Excel row counter
            $rowCount++; 
        } 

        $file_name = 'Aprovacao - Realizado/Pendentes' . date('Y-m-d H:i').'.xlsx';  

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


        header('Content-Disposition: attachment;filename="'.$file_name.'"');

        header('Cache-Control: max-age=0');
    }
}
else if($relatorio == 'consolidado_geral')
{
    {
        $objPHPExcel->getActiveSheet()->setTitle('Consolidado');

        // Initialise the Excel row number
        $rowCount = 1; 
        // Iterate through each result from the SQL query in turn
        // We fetch each database result row into $row in turn
        while($row = mysql_fetch_array($result)){ 
            // Set cell An to the "name" column from the database (assuming you have a column called name)
            //    where n is the Excel row number (ie cell A1 in the first row)
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['siscom']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['data_entrada_siscom']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['revisao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['prioridade']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['horasPrioridade']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['data_vencimento_sla']);  
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['status_sla']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['substatusCipTramitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['substatusCipAprovacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['usuarioTramitacao']);                
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['canal_entrada']);                      
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['produto']);                                
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['servico']);                               
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['complemento_servico']);                    
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['quantidade_acessos']);                     
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['cnpj']);                                   
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['razao_social']);                           
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['statusTramitacao']);                              
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['obsTramitacao']);                                  
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['data_finalizacaoTramitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['escritorio_gn']);                          
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['oportunidade']);                          
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['proposta']);                               
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['motivo_devolucao_tramitacao']);                       
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['descricao_motivo_devolucao_tramitacao']);             
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['data_recebimento_tramitacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['usuarioAprovacao']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['statusAprovacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $row['motivo_devolucao_aprovacao']);            
            $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $row['complemento_motivo_devolucao_aprovacao']);       
            $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, $row['data_recebimento_aprovacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, $row['data_finalizacaoAprovacao']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, $row['origem']);
 
            // Increment the Excel row counter
            $rowCount++; 
        } 

        $file_name = 'Consolidado' . date('Y-m-d H:i').'.xlsx';  

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