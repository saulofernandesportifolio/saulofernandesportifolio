<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../fixa/site/funcoes/f_inserir_dados.php");
   
require_once '../fixa/site/classes/cripto.php';

$cripto = new cripto();

$id_usuario= $_GET['id'];

$id_usuario = $cripto->decodificar($id_usuario);

$id_base = $_POST['base'];

    try{
    
        if(isset($_POST["submit"]))
        {
            $file = $_FILES['file']['tmp_name'];
            
                require_once '../fixa/site/classes/PHPExcel/IOFactory.php';
                $objPHPExcel = PHPExcel_IOFactory::load($file);
                $objPHPExcel->setActiveSheetIndex(0);
                
              
                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

                    $ultimaLinha        = $worksheet->getHighestRow(); 
                    $ultimaColuna       = $worksheet->getHighestColumn(); // e.g 'F'
                    $ultimaColunaIndex  = PHPExcel_Cell::columnIndexFromString($ultimaColuna);
                   
                    $getData = $objPHPExcel->getActiveSheet();

                    // navegar na linha
                    for($linha=1; $linha<=$ultimaLinha; $linha++){
                       
                       //armazenar dados de cada linha
                       $dados = array();
                       
                        // navegar nas colunas da respectiva linha
                        for($coluna=0; $coluna<=$ultimaColunaIndex; $coluna++){
                            //todo:valida coluna em branco
                                if($linha>1){
                                    //valida se a coluna excel é do tipo date                               
                                    if(PHPExcel_Shared_Date::isDateTime($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)))
                                    {   
                                        $dados[$coluna] = gmdate("Y/m/d",  PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()));
                                    }else{
                                        // armazena os dados de cada coluna
                                        $dados[$coluna] = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue();
                                    }
                                }
                        }
                        
                        if($linha>1){
                            //valida registro unico de cada tabela
                            if($id_base == 2)
                            {
                                $query_valida_chave = mysql_query("SELECT pacote FROM siscom_vendas WHERE pacote = '$dados[0]' AND status = '$dados[8]'");
                                $id = $dados[0];
                            }
                            else if($id_base == 3)
                            {
                                $query_valida_chave = mysql_query("SELECT nro_solicitacao FROM siscom_servico WHERE nro_solicitacao = '$dados[11]' AND status = '$dados[12]'");
                                $id = $dados[11];
                            }
                            else if($id_base == 1)
                            {
                                $query_valida_chave = mysql_query("SELECT cod_solicitacao FROM gestao_servicos WHERE cod_solicitacao = '$dados[0]'");
                                $id = $dados[0];
                            }
                            else if($id_base == 4)
                            {
                                $query_valida_chave = mysql_query("SELECT cnpj FROM empresa WHERE cnpj = '$dados[5]'");
                                $id = $dados[0];
                            }
                            

                            if($id_base == 5 || $id_base == 6 || $id_base == 7 || $id_base == 8 || $id_base == 9)
                            {
                                //inseri linha no bd
                                f_inserir_dados($dados,  $id_base, $id_usuario, 'N');
                            }else{
                                //verifica se item ja existe ou nao
                                if(mysql_affected_rows() == 0)
                                {
                                    if($id > 0)
                                    {
                                        //inseri linha no bd
                                        f_inserir_dados($dados,  $id_base, $id_usuario, 'S');
                                    }
                                }
                            }
                        }                       
                    }   
                }

                //se arquivo todo foi carregado dados serao inseridos na tabela de gs
                echo"
                   <script type=\"text/javascript\">
                    alert('Arquivo carregado com sucesso!');
                          document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=views/home.php'
                    </script>
                ";
                exit();
        }
    }catch(Exception $e){
        // pega excessao
        //echo $e->getMessage();
        echo '<br/> Ocorreu um erro no processamento do arquivo <br/>';
        echo 'Verifique as instruções de envio e tenta novamente <br/>';
        echo 'Se o erro persistir informe o ocorrido ao Administrador do site'; 
    }

    /*
    //teste para ver dados inseridos na tela de upload
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

                    $ultimaLinha        = $worksheet->getHighestRow(); 
                    $ultimaColuna       = $worksheet->getHighestColumn(); // e.g 'F'
                    $ultimaColunaIndex  = PHPExcel_Cell::columnIndexFromString($ultimaColuna)-1;
                    echo "<table border='1'>";
                    // navegar na linha
                    for($linha=1; $linha<=$ultimaLinha; $linha++){
                        echo "<tr>";
                        // navegar nas colunas da respectiva linha
                        for($coluna=0; $coluna<=$ultimaColunaIndex; $coluna++){
                            if($linha==1){
                                // escreve o cabeçalho da tabela a bold
                                echo "<th>".($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue())."</th>";
                            }else{
                                //valida se a coluna excel é do tipo date                               
                                if(PHPExcel_Shared_Date::isDateTime($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)))
                                {
                                    echo "<td>" . gmdate("Y/m/d",  PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()))."</td>";
                                }else{
                                // escreve os dados da tabela
                                    echo "<td>".($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue())."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
    **/
  
?>