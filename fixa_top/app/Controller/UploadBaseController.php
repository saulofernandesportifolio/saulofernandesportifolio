<?php 
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/UploadBase.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/SiscomVenda.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/SiscomServico.php");
include($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");

$id_usuario= isset($_POST['id_usuario']) ? $_POST['id_usuario'] : ''; ;
$id_usuario = $cripto->decodificar($id_usuario);
$id_base = isset($_POST['base']) ? $_POST['base'] : ''; ;

if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'importarBase': 
        { 
          echo importBase($id_usuario, $id_base, $cripto); 
          break; 
        }
    } 
} 


function importBase($id_usuario, $id_base, $cripto)
{

            $file = $_FILES['file']['tmp_name'];
            
                require_once '../fixa_top/app/Model/PHPExcel/IOFactory.php';
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
                                        //testar numero de caracteres hora 
                                        //echo "data " . strlen($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue());   
                                        if(strlen($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()) == 5)
                                        {
                                            $dados[$coluna] = gmdate("Y/m/d",  PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()));
                                        }
                                        else if(strlen($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()) > 5)
                                        {
                                            $dados[$coluna] = gmdate("H:i:s",  PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()));
                                        }
                                    }
                                    else
                                    {
                                        // armazena os dados de cada coluna
                                        $dados[$coluna] = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue();
                                    }

                                    if(!isset($dados[$coluna]))
                                    {
                                        $dados[$coluna] = null;
                                    }    
                                }
                        }
                       
                        if($linha>1)
                        {
                            //valida registro unico de cada tabela
                            if($id_base == 1)
                            {
                             
                                $uploadBase = new UploadBase(1, 'Siscom Vendas');

                                //se for reentrada de solicitação reprovada não valida status
                                if($uploadBase->validaSolicitacaoReprovada($dados[7],"sv"))
                                {
                                    $solicitacaoNova = true;
                                }
                                else
                                {
                                     $solicitacaoNova = $uploadBase->validaSolicitacaoImportada('Siscom Vendas', $dados[7], $dados[8]);
                                }
                                 
                                $id = trim($dados[7]);

                                //valida data de atualizacao do Siscom
                                if(strlen($dados[17]) > 0)
                                {
                                   
                                    if($uploadBase->validaDataAtualizacaoSiscom($dados[17], $dados[7]) != '1')
                                    {
                                        $dataAtualizacaoSiscomInvalida = 1;
                                    }

                                    $data_atualizacao_siscom = $dados[17];

                                    $dataT = explode("/", substr($data_atualizacao_siscom, 0, 10));
                                    if(strlen($dataT[1]) == 1)
                                    {
                                        $data = substr($data_atualizacao_siscom, 0, 9);
                                        $hora = substr($data_atualizacao_siscom, 10, 18);

                                        $data = explode("/", $data);
                                        $data = $data[2] . "-" . "0". $data[1] . "-" . $data[0] . ' ' . $hora;
                                    }
                                    else
                                    {
                                        $data = substr($data_atualizacao_siscom, 0, 10);
                                        $hora = substr($data_atualizacao_siscom, 11, 18);

                                        $data = explode("/", $data);
                                        $data = $data[2] . "-" . $data[1] . "-" . $data[0] . ' ' . $hora;
                                    }

                                    $data = strtotime($data);
                                  
                                    $dataFinalVendas = date( "Y/m/d H:i:s", $data);

                                }else{
                                    $dataFinalVendas = "";
                                    //se nao tiver data de atualizacao siscom não entra no sistema - vendas
                                    $solicitacaoNova = false;
                                }

                            }
                            else if($id_base == 2)
                            {
                                $uploadBase = new UploadBase(2, 'Siscom Serviço');

                                 //se for reentrada de solicitação reprovada não valida status
                                if($uploadBase->validaSolicitacaoReprovada($dados[11],"ss"))
                                {
                                    $solicitacaoNova = true;
                                }
                                else
                                {
                                    $solicitacaoNova = $uploadBase->validaSolicitacaoImportada('Siscom Servicos',$dados[11], $dados[12]);
                                }
                                
                                $id = trim($dados[11]);
                            
                                 //valida data de atualizacao do Siscom
                                if(strlen($dados[13]) > 0)
                                {
                                   
                                    if($uploadBase->validaDataAtualizacaoSiscom($dados[13], $dados[11]) != '1')
                                    {
                                        $dataAtualizacaoSiscomInvalida = 1;
                                    }

                                    $data_atualizacao_siscom = $dados[13];

                                    $dataT = explode("/", substr($data_atualizacao_siscom, 0, 10));
                                    if(strlen($dataT[1]) == 1)
                                    {
                                        $data = substr($data_atualizacao_siscom, 0, 9);
                                        $hora = substr($data_atualizacao_siscom, 10, 18);

                                        $data = explode("/", $data);
                                        $data = $data[2] . "-" . "0". $data[1] . "-" . $data[0] . ' ' . $hora;
                                    }
                                    else
                                    {
                                        $data = substr($data_atualizacao_siscom, 0, 10);
                                        $hora = substr($data_atualizacao_siscom, 11, 18);

                                        $data = explode("/", $data);
                                        $data = $data[2] . "-" . $data[1] . "-" . $data[0] . ' ' . $hora;
                                    }


                                    $data = strtotime($data);

                                    $dataFinal = date( "Y/m/d H:i:s", $data);

                                }else{
                                    $dataFinal = '';
                                }

                            }
                           
                            //verifica se item ja existe ou nao
                            if($solicitacaoNova)
                            {
                                //nao permite entrada de ids igual a 0
                                if($id > 0)
                                {
                                    if($id_base == 1)
                                    {
                                        $siscomVenda = new SiscomVenda(
                                                $dados[0], //cnpj
                                                $dados[1], //razaoSocial
                                                $dados[4], //gerenteNegocio
                                                $dados[5], //escritorioGn
                                                $dados[8], //status
                                                $dados[7], //siscom
                                                $dados[2], //produtoDescricao
                                                $dados[3], //quantidade
                                                $dados[9], //motivoCancIndisp
                                                $dados[12], //numOrdem
                                                $dados[7],  //numPedido
                                                $dados[13], //dataEmissao
                                                $dados[14], //motivoCritica
                                                $dados[16],  //tipoReplica
                                                $dataFinalVendas
                                                );

                                        //inseri linha no bd
                                        $siscomVenda->enviaSolicitacaoBase($siscomVenda, $id_usuario);
                                    }
                                    else if($id_base == 2)
                                    {

                                        $siscomServico = new SiscomServico(
                                                $dados[3], //cnpj, 
                                                $dados[5], //razaoSocial, 
                                                $dados[8], //gerenteNegocio, 
                                                $dados[9], //escritorioGn, 
                                                $dados[10], //responsavelGnCanal, 
                                                $dados[12], //status, 
                                                $dados[0], //clienteEspecial, 
                                                $dados[1] .' '. $dados[2], //dataSiscom, 
                                                $dados[4], //codigoCliente, 
                                                $dados[6], //descricao, 
                                                $dados[7], //evento, 
                                                $dados[11], //nroSolicitacao
                                                $dataFinal  //siscom data atualizada
                                                );

                                        //inseri linha no bd
                                        $siscomServico->enviaSolicitacaoBase($siscomServico, $id_usuario);
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
                          document.location.href='principal.php?id=" . $cripto->codificar($id_usuario) . "&t=View/home.php'
                    </script>
                ";
                exit();
}