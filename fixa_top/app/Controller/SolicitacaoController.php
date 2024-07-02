<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/fixa_top/bd.php");
include_once($_SERVER['DOCUMENT_ROOT']."/fixa_top/app/Model/cripto.php");

$criptoSolicitacao = new cripto();
$idUsuario  = isset($_GET['idUsuarioCriptografado']) ? $_GET['idUsuarioCriptografado'] : '';

if (!empty($opcao))
{ 
    switch ($opcao)
    { 
        case 'buscaSolicitacoesTramitacaoDistribuir': 
        { 
            $siscom  = isset($_GET['siscom']) ? $_GET['siscom'] : '';

            echo buscaSolicitacoesTramitacaoDistribuir($siscom); 
            break; 
        }
        case 'buscaSolicitacoesAprovacaoDistribuir':
        {
            $siscom  = isset($_GET['siscom']) ? $_GET['siscom'] : '';
            
            echo buscaSolicitacoesAprovacaoDistribuir($criptoSolicitacao, $idUsuario, $siscom); 
            break;    
        }
        case 'buscaSolicitacoesTramitacaoOperador':
        {
            echo buscaSolicitacoesTramitacaoOperador($criptoSolicitacao, $idUsuario);
            break;
        }
        case 'distribuirSolicitacoes':
        {
            if(isset($_POST['data']))
            {
                $data_cadastro = $_POST['data'];
                $data_cadastro_data_hora = substr($data_cadastro,11,8);
                
                $data_cadastro_data = substr($data_cadastro,0,10);

                $data_cadastro_data = explode("/", $data_cadastro_data);
                $data_cadastro_data = $data_cadastro_data[2] . "/" . $data_cadastro_data[1] . "/" . $data_cadastro_data[0];
                $s = $data_cadastro_data . $data_cadastro_data_hora;
                
                $date = strtotime($s);
                $data_cadastro = date("Y-m-d H:i:s", $date);
            }
            else
            {
                $data_cadastro=date("Y-m-d H:i:s");
            }

            echo distribuirSolicitacoes($criptoSolicitacao, $_POST['sup'], $_POST['op'], $_POST['sm'],$_POST['fase'], $_POST['source'], $data_cadastro);
            break;
        }
        case 'consultaItensPendentesFasesOperador':
        {
            echo getSolicitacoesPendentesFaseOperador($criptoSolicitacao, $idUsuarioCriptografado, $fase);
            break; 
        }
        case 'consultaItensAguardoFasesOperador':
        {
            echo getSolicitacoesAguardoFaseOperador($criptoSolicitacao, $idUsuarioCriptografado, $fase);
            break; 
        }
        case 'buscaSolicitacoesAprovacaoOperador':
        {
            echo buscaSolicitacoesAprovacaoOperador($criptoSolicitacao, $idUsuario);
            break;
        }
        case 'tabela_redistribuicao':
        {
            echo getSolicitacaoRedistribuicao($n_solicitacao);
            break; 
        }
        case 'usuario_fase':
        {
            echo getUsuarioFase($criptoSolicitacao, $fase, $idUsuarioCriptografado);
            break; 
        }
        case 'redistribuirSolicitacoes':
        {
             if(isset($_POST['data']))
            {
                $data_cadastro = $_POST['data'];
                $data_cadastro = explode("/", $data_cadastro);
                $data_cadastro = $data_cadastro[2] . "-" . $data_cadastro[1] . "-" . $data_cadastro[0];
                $data_cadastro = strtotime($data_cadastro);
                $data_cadastro = date( "Y-m-d H:i:s", $data_cadastro);
            }
            else
            {
                $data_cadastro=date("Y-m-d H:i:s");
            }

            echo redistribuirSolicitacoes($criptoSolicitacao, $_POST['sup'], $_POST['op'], $_POST['sm'],$_POST['fase'], $_POST['source'], $data_cadastro);
            break;
        }
        case 'consultaSolicitacaoExistente':
        {
            echo getSolicitacaoDataPendentes($ids);
            break; 
        }
        case 'consultaHistoricoSolicitacao':
        {
            echo consultaHistoricoSolicitacao($n_solicitacao);
            break; 
        }
        case 'itens_operador_area_supervisor':
        {   
            echo getItensOperadorAreaSupervisor($usuario, $fase);
            break; 
        }
        case 'excluirItensSiscom':
        {
            $data_exclusao=date("Y-m-d H:i:s");    
            echo excluirItensSiscom($criptoSolicitacao, $_POST['sup'], $_POST['sm'],$_POST['fase'], $_POST['source'], $data_exclusao, $_POST['listaItens']);
            break;
        } 
    } 
} 


function buscaSolicitacoesTramitacaoDistribuir($siscom)
{
    $sql = mysql_query("CALL SP_DISTRIBUIR_TRAMITACAO($siscom)");

    while($fetch  = mysql_fetch_array($sql))
    {
        $output[]  = array (
            $fetch[0],  //siscom, 
            $fetch[1],  //cnpj, 
            $fetch[2],  //razao_social,
            $fetch[3],  //gn_responsavel_canal, 
            $fetch[4],  //escritorio_gn, 
            $fetch[5],  //gn_responsavel_canal,
            $fetch[6],  //status, 
            $fetch[7],  //revisao, 
            $fetch[8],  //data, 
            $fetch[9],  //importacao_usuario, 
            $fetch[10], //origem
            $fetch[11], //usuario tramitacao
            $fetch[12], //data_siscom
            $fetch[13], //data_vencimento_sla
            $fetch[14]  //tempo_restante
        );
    }
    echo json_encode($output);
}

function buscaSolicitacoesAprovacaoDistribuir(cripto $criptoSolicitacao, $idUsuario, $siscom)
{
    $idUsuario = $criptoSolicitacao->decodificar($idUsuario);

    $sql = mysql_query("CALL SP_DISTRIBUIR_APROVACAO($siscom)");

    while($fetch  = mysql_fetch_array($sql))
    {
        $output[]  = array (
            $fetch[0], //siscom, 
            $fetch[1], //revisao, 
            $fetch[2], //data siscom,
            $fetch[3], //data vencimento sla, 
            $fetch[4], //tempo restante, 
            $fetch[5], //qtde acessos,
            $fetch[6], //cnpj, 
            $fetch[7], //razao social, 
            $fetch[8], //status tramitacao, 
            $fetch[9], //obs tramitacao, 
            $fetch[10],//operador tramitacao
            $fetch[11],//data finalizacao tramitacao
            $fetch[12] //horas prioridade
        );
    }
    echo json_encode($output);
}

function buscaSolicitacoesTramitacaoOperador(cripto $criptoSolicitacao, $idUsuario)
{
    $idUsuario = $criptoSolicitacao->decodificar($idUsuario);

    $buscarOperador=mysql_query("SELECT 
                u.id_usuario, 
                u.nome, 
                count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil !=4 AND tramitacao = 'Com operador' AND u.id_status = 2
                GROUP BY u.id_usuario
                UNION
                SELECT 
                    u.id_usuario, 
                    u.nome, 
                    0 AS numero_solicitacoes
                FROM usuario u 
                WHERE ID_USUARIO not in(
                SELECT 
                    u.id_usuario
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil !=4 AND tramitacao = 'Com operador' AND u.id_status = 2
                GROUP BY u.id_usuario
                )AND id_perfil in(6) AND u.id_status = 2
                GROUP BY u.id_usuario
                ORDER BY nome");

    while($fetch  = mysql_fetch_array($buscarOperador))
    {
        $output[]  = array (
            $criptoSolicitacao->codificar($fetch[0]), //id_usuario, 
            $fetch[1], //nome, 
            $fetch[2] //n_pedidos
        );
    }

    echo json_encode($output);

}


function distribuirSolicitacoes(cripto $criptoSolicitacao, $sup, $op, $solicitacoesArray, $fase, $source, $data_cadastro)
{

    $sup = $criptoSolicitacao->decodificar($sup);
    $op = $criptoSolicitacao->decodificar($op);

    $nSolicitacoes = count($solicitacoesArray); 
 
    if($nSolicitacoes == 0)
    {
        exit();
    }
    else
    {
        //atualiza informaçoes na tabela de usuario x solicitacao
        for($item = 0; $item < $nSolicitacoes; $item++) 
        {

                if($source == 'distribuicao_manual')
                {

                        $solicitacaoId = $solicitacoesArray[$item];

                        if($fase == 'tramitacao' || $fase == 'aprovacao')
                        {
                            //busca revisao solicitacao manual
                            $fetchRevisaoManual = mysql_query("SELECT IFNULL(MAX(revisao),0) AS revisao FROM tramitacao WHERE siscom = '$solicitacaoId'");
                        }

                        if(mysql_affected_rows() > 0)
                        {
                              while($rowrm=mysql_fetch_array($fetchRevisaoManual))
                              {
                                    $revisao = $rowrm['revisao'] + 1;
                              }
                        }
                        else
                        {
                            $revisao = 1;
                        }
                    
                        $priorizacao = 0;
                }
                else
                {
                    //get solicitacao and revisao
                    $dadosSolicitacao = explode("&", $solicitacoesArray[$item]);
                    $solicitacaoId   = $dadosSolicitacao[0];
                    $revisao         = $dadosSolicitacao[1];
                    $priorizacao     = $dadosSolicitacao[2];
                    $horasPrioridade = $dadosSolicitacao[3];
                }

                //distribui solicitacao para usuario
                $sql_insere="INSERT INTO usuario_solicitacao(id_usuario, id_solicitacao, id_supervisor, reg_data, revisao, priorizacao, horasPrioridade) 
                            VALUES('$op', '$solicitacaoId', '$sup', '$data_cadastro', $revisao, $priorizacao, $horasPrioridade)";
    

                $acao_insere= mysql_query($sql_insere) or die (mysql_error());



                //atualiza tabela solicitacao_fases 
                if($fase == 'tramitacao')
                {

                        //verifica se item ja existe na tabela solicitacao de fases
                        $checkSolicitacaoFases=mysql_query("SELECT * FROM solicitacao_fases WHERE id_solicitacao = '$solicitacaoId'");

                        if(mysql_affected_rows() > 0)
                        {
                            $sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
                                                                SET 
                                                                    tramitacao       = 'Com operador', 
                                                                    id_usuario_resp  = $op,
                                                                    revisao          = $revisao,
                                                                    data_ultima_acao = '$data_cadastro',
                                                                    fonte            = 'Distribuicao'
                                                                WHERE id_solicitacao = '$solicitacaoId'";   
                        }
                        else
                        {
                            $sql_atualiza_status_fase_edicao = "INSERT INTO solicitacao_fases(id_solicitacao, tramitacao, id_usuario_resp, revisao, data_ultima_acao, fonte) 
                                                        VALUES('$solicitacaoId', 'Com operador', '$op', '$revisao', '$data_cadastro','Distribuicao')";
                        
                        }


                        if($source == 'distribuicao_manual')
                        {
                             $sql_inicia_tramitacao = "UPDATE tramitacao
                                                        SET siscom = '$solicitacaoId', revisao = '$revisao' 
                                                        WHERE siscom = '$solicitacaoId'";
                        }
                        else
                        {
                             //verifica se solic. é encontrada tabela siscom vendas
                            $query_busca_data = mysql_query("SELECT dataSiscom as data FROM siscom_vendas WHERE siscom = '$solicitacaoId' AND revisao = '$revisao'
                                                                    UNION SELECT data FROM siscom_servicos WHERE siscom = '$solicitacaoId' AND revisao = '$revisao'");
                             while($row_li=mysql_fetch_array($query_busca_data))
                            {
                                $data_entrada_siscom  = $row_li['data'];
                            }



                            $sql_inicia_tramitacao = "INSERT INTO tramitacao(siscom, revisao, prioridade, horasPrioridade, data_entrada_siscom)
                                                        VALUES('$solicitacaoId','$revisao', '$priorizacao', '$horasPrioridade', '$data_entrada_siscom')";
                        }
                     

                        $acao_atualiza_inicia_pre = mysql_query($sql_inicia_tramitacao) or die (mysql_error());
                }
                else if($fase == 'aprovacao')
                {
                    $sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
                                                        SET 
                                                            aprovacao        = 'Com operador', 
                                                            id_usuario_resp  = $op,
                                                            revisao          = $revisao,
                                                            data_ultima_acao = '$data_cadastro',
                                                            fonte            = 'Distribuicao'
                                                        WHERE id_solicitacao = '$solicitacaoId'";   
                }

                $acao_atualiza_status_fase_edicao = mysql_query($sql_atualiza_status_fase_edicao) or die (mysql_error());

                //verifica se solic. é encontrada tabela siscom vendas
                $query_busca_siscom_vendas = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$solicitacaoId'");

                if(mysql_affected_rows() > 0){
                    //atualiza tabela siscom vendas
                    $query_atualiza_siscom_vendas = "UPDATE siscom_vendas SET distribuido = 'S' WHERE siscom = '$solicitacaoId'";
            
                    $acao_atualiza_siscom_vendas = mysql_query($query_atualiza_siscom_vendas) or die (mysql_error());
                }

                //verifica se solic. é encontrada tabela siscom servicos
                $query_busca_siscom_servico = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$solicitacaoId'");

                if(mysql_affected_rows() > 0){
                    //atualiza tabela siscom vendas
                    $query_atualiza_siscom_servico = "UPDATE siscom_servicos SET distribuido = 'S' WHERE siscom = '$solicitacaoId'";
                
                    $acao_atualiza_siscom_servico = mysql_query($query_atualiza_siscom_servico) or die (mysql_error());
                }

        }
                            
    }
}

function getSolicitacoesPendentesFaseOperador(cripto $criptoSolicitacao, $id_usuario, $fase)
{
    $id_usuario = $criptoSolicitacao->decodificar($id_usuario);
    
        if($fase == 'tramitacao')
        {
            $fetchSolicitacoesPendentesFaseOperador=mysql_query(
                            "CALL SP_ITENS_OPERADOR_TRAMITACAO('$id_usuario')");
        }
        else if($fase == 'aprovacao')
        {
            $fetchSolicitacoesPendentesFaseOperador=mysql_query("CALL SP_ITENS_OPERADOR_APROVACAO('$id_usuario')");
        }
         while($row  = mysql_fetch_array($fetchSolicitacoesPendentesFaseOperador))
         {
            $output[]  = array (
                    $row[0], //priorizacao,
                    $row[1], //id_solicitacao,
                    $row[2], //revisao,
                    $row[3], //data_siscom,
                    $row[4], //SLA,
                    $row[5], //data_vencimento_sla,
                    $row[6], //tempo_restante
                    $row[7], //cnpj
                    $row[8], //razao_social
                    $row[9], //status
                    $row[10] //fase
            );
         }

            echo json_encode($output);      
}


function getSolicitacoesAguardoFaseOperador(cripto $criptoSolicitacao, $id_usuario, $fase)
{
    $id_usuario = $criptoSolicitacao->decodificar($id_usuario);
    
        if($fase == 'tramitacao')
        {
            $fetchSolicitacoesPendentesFaseOperador=mysql_query(
                            "SELECT DISTINCT
                                t.siscom,
                                IFNULL(date_format(us.reg_data, '%d/%m/%Y %H:%i:%s'), '') AS distribuicao_data,
                                    IFNULL(date_format(t.reg_dt_entrada, '%d/%m/%Y %H:%i:%s'), '') AS data_aguardo,
                                t.cnpj,
                                t.razao_social,
                                t.quantidade_acessos,
                                ss.descricao as status,
                                t.obs,
                                t.motivo_devolucao,
                                t.descricao_motivo_devolucao,
                                t.revisao,
                                'tramitacao' AS origem 
                            FROM 
                                tramitacao t 
                            INNER JOIN solicitacao_fases sf
                                ON t.revisao = sf.revisao
                                AND t.siscom =  sf.id_solicitacao
                            INNER JOIN usuario_solicitacao us
                                ON t.revisao = us.revisao
                                AND t.siscom =  us.id_solicitacao
                            INNER JOIN status_solicitacao ss
                                ON t.id_status = ss.id_status_solicitacao
                            WHERE 
                            sf.tramitacao = 'Aguardando retorno' AND sf.id_usuario_resp = $id_usuario 
                            ORDER BY 
                                us.priorizacao, sf.revisao, us.reg_data");
        }
        else if($fase == 'aprovacao')
        {
            $fetchSolicitacoesPendentesFaseOperador=mysql_query("SELECT DISTINCT
                                                                        IFNULL(sf.id_solicitacao, '') AS id_solicitacao,
                                                                        IFNULL(t.data_entrada_siscom, '') AS data_entrada_siscom,
                                                                        IFNULL(date_format(t.reg_dt_entrada, '%d/%m/%Y %H:%i:%s'),'') AS data_finalizacao_tram,
                                                                        IFNULL(t.cnpj, '') AS cnpj,
                                                                        IFNULL(t.razao_social, '') AS razao_social,
                                                                        IFNULL(ss.descricao, '') AS status,
                                                                        sf.revisao,
                                                                        'aprovacao' AS origem 
                                                                    FROM 
                                                                        solicitacao_fases sf 
                                                                    INNER JOIN tramitacao t
                                                                        ON t.siscom = sf.id_solicitacao 
                                                                        AND t.revisao = sf.revisao
                                                                    INNER JOIN status_solicitacao ss
                                                                        ON ss.id_status_solicitacao = t.id_status
                                                                    WHERE 
                                                                        sf.aprovacao = 'Com operador' AND sf.id_usuario_resp = $id_usuario 
                                                                    ORDER BY 
                                                                        sf.revisao");
        }
         while($row  = mysql_fetch_array($fetchSolicitacoesPendentesFaseOperador))
         {
           $output[]  = array (
                    $row[0], //siscom,
                    $row[1], //distribuicao_data,
                    $row[2], //data_aguardo,
                    $row[3], //cnpj,
                    $row[4], //razao_social,
                    $row[5], //quantidade_acessos,
                    $row[6], //status
                    $row[7], //obs
                    $row[8], //motivo_devolucao
                    $row[9], //descricao_motivo
                    $row[10], //revisao
                    $row[11] //origem
            );
         }

            echo json_encode($output);      
}

function buscaSolicitacoesAprovacaoOperador(cripto $criptoSolicitacao, $idUsuario)
{
    $idUsuario = $criptoSolicitacao->decodificar($idUsuario);

    $buscarOperador=mysql_query("SELECT 
                                    u.id_usuario, 
                                    u.nome, 
                                    count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
                                FROM usuario u 
                                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                                WHERE id_perfil !=4 AND aprovacao = 'Com operador' AND u.id_status = 2
                                GROUP BY u.id_usuario
                                UNION
                                SELECT 
                                    u.id_usuario, 
                                    u.nome, 
                                    0 AS numero_solicitacoes
                                FROM usuario u 
                                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                                WHERE id_perfil in(12) and u.id_usuario NOT IN (SELECT id_usuario_resp FROM solicitacao_fases  where aprovacao = 'Com operador') AND u.id_status = 2
                                GROUP BY u.id_usuario
                                ORDER BY nome");

    while($fetch  = mysql_fetch_array($buscarOperador))
    {
        $output[]  = array (
            $criptoSolicitacao->codificar($fetch[0]), //id_usuario, 
            $fetch[1], //nome, 
            $fetch[2] //n_pedidos
        );
    }

    echo json_encode($output);

}


function getSolicitacaoRedistribuicao($n_solicitacao)
{
    $sql = mysql_query("SELECT 
                            IFNULL(sf.id_solicitacao,'') as siscom,
                            IFNULL(sf.tramitacao,'') as tramitacao,
                            IFNULL(sf.aprovacao,'') as aprovacao,
                            IFNULL(u.nome,'') AS nome_operador,
                            IFNULL(sf.revisao,'') as revisao
                        FROM solicitacao_fases sf
                            LEFT JOIN usuario u
                            ON sf.id_usuario_resp = u.id_usuario
                        WHERE id_solicitacao = '$n_solicitacao'");

    while($fetch  = mysql_fetch_array($sql))
    {
        $output[]  = array (
                $fetch[0], //siscom,
                $fetch[1], //tramitacao,
                $fetch[2], //aprovacao,
                $fetch[3], //nome_operador,
                $fetch[4] //revisao
        );
    }

    echo json_encode($output);
}

function getUsuarioFase(cripto $criptoSolicitacao, $fase, $idUsuario)
{
    $idUsuario = $criptoSolicitacao->decodificar($idUsuario);
        
    if($fase == 'tramitacao')
    {
        $sql=mysql_query("SELECT 
                u.id_usuario, 
                u.nome, 
                count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil !=4 AND tramitacao = 'Com operador' AND u.id_status = 2
                GROUP BY u.id_usuario
                UNION
                SELECT 
                    u.id_usuario, 
                    u.nome, 
                    0 AS numero_solicitacoes
                FROM usuario u 
                WHERE ID_USUARIO not in(
                SELECT 
                    u.id_usuario
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil !=4 AND tramitacao = 'Com operador' AND u.id_status = 2
                GROUP BY u.id_usuario
                )AND id_perfil in(6) AND u.id_status = 2
                GROUP BY u.id_usuario
                ORDER BY nome");

         while($fetch  = mysql_fetch_array($sql))
        {
            $output[]  = array (
                $criptoSolicitacao->codificar($fetch[0]), //id_usuario, 
                $fetch[1], //nome, 
                $fetch[2] //n_pedidos
            );
        }

        echo json_encode($output);      
    }
    else if($fase =='aprovacao')
    {
        $sql=mysql_query(
            "SELECT 
                    u.id_usuario, 
                    u.nome, 
                    count(solicitacao_fases.id_solicitacao) as numero_solicitacoes 
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil !=4 AND aprovacao = 'Com operador' AND u.id_status = 2
                GROUP BY u.id_usuario
                UNION
                SELECT 
                    u.id_usuario, 
                    u.nome, 
                    0 AS numero_solicitacoes
                FROM usuario u 
                    LEFT JOIN solicitacao_fases ON solicitacao_fases.id_usuario_resp = u.id_usuario
                WHERE id_perfil in(12) and u.id_usuario NOT IN (SELECT id_usuario_resp FROM solicitacao_fases  where aprovacao = 'Com operador') AND u.id_status = 2
                GROUP BY u.id_usuario
                ORDER BY nome");

         while($fetch  = mysql_fetch_array($sql))
         {
            $output[]  = array (
                $criptoSolicitacao->codificar($fetch[0]), //id_usuario, 
                $fetch[1], //nome, 
                $fetch[2] //n_pedidos
            );
         }

        echo json_encode($output);      
    }
}

function redistribuirSolicitacoes($criptoSolicitacao, $sup, $op, $solicitacoesArray, $fase, $fonte, $data_cadastro)
{
    $nSolicitacoes = count($solicitacoesArray); 
    $sup =  $criptoSolicitacao->decodificar($sup);
    $op =  $criptoSolicitacao->decodificar($op);

    if($nSolicitacoes == 0)
    {
        exit();
    }else{
        //atualiza informaçoes
        for($item = 0; $item < $nSolicitacoes; $item++) {

                //get solicitacao and revisao
                $dadosSolicitacao = explode("&", $solicitacoesArray[$item]);
                $solicitacaoId = $dadosSolicitacao[0];
                $revisao       = $dadosSolicitacao[1];
                
                //redistribui solicitacao - atualiza usuario (busca informacoes)
                $fetchDadosUsuarioSolic = mysql_query("SELECT * FROM usuario_solicitacao WHERE id_solicitacao = '$solicitacaoId' AND revisao = $revisao");

                if(mysql_affected_rows() > 0)
                {

                    while($row_us=mysql_fetch_array($fetchDadosUsuarioSolic))
                    {
                        $dataEntrada  = $row_us['reg_data'];
                        $revisao      = $row_us['revisao'];
                    }
                }

                //deleta solicitacao do usuario antigo
                $sql_delete_usuario_solicitacao="DELETE FROM usuario_solicitacao WHERE id_solicitacao = '$solicitacaoId' AND revisao = $revisao"; 

                $acao_insere= mysql_query($sql_delete_usuario_solicitacao) or die (mysql_error());

                //insere novo responsável - data e revisao permanecem a mesma de antes
                $sql_insere="INSERT INTO usuario_solicitacao(id_usuario, id_solicitacao, id_supervisor, reg_data, revisao) 
                                VALUES('$op', '$solicitacaoId', '$sup', '$dataEntrada', $revisao)";

                $acao_insere= mysql_query($sql_insere) or die (mysql_error());

                //atualiza tabela solicitacao_fases 
                if($fase == 'tramitacao')
                {

                        //atualiza solicitacao fases
                        $sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
                                                            SET 
                                                                tramitacao   = 'Com operador', 
                                                                aprovacao = '',
                                                                id_usuario_resp  = '$op',
                                                                data_ultima_acao = now(),
                                                                fonte = 'Redistribuicao'
                                                            WHERE id_solicitacao = '$solicitacaoId'"; 
                        
                }
                else if($fase == 'aprovacao')
                {
                    $sql_atualiza_status_fase_edicao = "UPDATE solicitacao_fases
                                                        SET 
                                                            aprovacao  = 'Com operador', 
                                                            id_usuario_resp = $op,
                                                            data_ultima_acao = now(),
                                                            fonte = 'Redistribuicao'
                                                        WHERE id_solicitacao = '$solicitacaoId'";   
                }

                $acao_atualiza_status_fase_edicao = mysql_query($sql_atualiza_status_fase_edicao) or die (mysql_error());
         }
    }
}

function getSolicitacaoDataPendentes($n_solicitacao)
{
    $sql = mysql_query("SELECT id_solicitacao, status, situacao FROM solicitacoes_pendentes sp 
                        WHERE id_solicitacao = '$n_solicitacao' AND situacao != 'Corrigido'");
    while($fetch  = mysql_fetch_array($sql))
    {
        $output[]  = array (
                $fetch[0], //id_solicitacao,
                $fetch[1], //status,
                $fetch[2]  //situacao
        );
    }

    echo json_encode($output);
}

function consultaHistoricoSolicitacao($n_solicitacao)
    {   
        if($n_solicitacao != "null"){
            $sql = mysql_query("SELECT * FROM(
									SELECT * FROM VW_TRAMITACAO_HISTORICO WHERE n_solicitacao = '$n_solicitacao' UNION ALL
									SELECT * FROM VW_APROVACAO_HISTORICO WHERE n_solicitacao = '$n_solicitacao' 
								) T ORDER BY data");
        }        
        
        
        while($fetch  = mysql_fetch_array($sql))
        {
            $output[]  = array (
                    $fetch[0], //solicitacoes.data,
                    $fetch[1], //u.nome AS operador,
                    $fetch[2], //u.cpf,
                    $fetch[3], //solicitacoes.n_solicitacao,
                    $fetch[4], //solicitacoes.fase,
                    $fetch[5], //ss.descricao AS status,
                    $fetch[6], //solicitacoes.cnpj,
                    $fetch[7], //solicitacoes.razao_social,
                    $fetch[8], //solicitacoes.qtd_acessos,
                    $fetch[9] //solicitacoes.revisao
            );
        }

        echo json_encode($output);
    } 

function getItensOperadorAreaSupervisor($idUsuario,$fase)
{
    if($fase == "Tramitação")
    {
        $sql = mysql_query("SELECT 
                                sf.id_solicitacao, 
                                sf.revisao,
                                date_format(us.reg_data, '%d/%m/%Y %H:%i:%s') AS reg_data,
                                IFNULL(us.priorizacao,0) AS priorizacao
                        FROM solicitacao_fases sf
                            INNER JOIN usuario_solicitacao us 
                                ON sf.id_solicitacao = us.id_solicitacao
                                AND sf.revisao = us.revisao
                                AND sf.id_usuario_resp = us.id_usuario
                        WHERE sf.id_usuario_resp = '$idUsuario' AND sf.tramitacao = 'Com operador'");
    }
    else if($fase == "Aprovação")
    {
         $sql = mysql_query("SELECT 
                                sf.id_solicitacao, 
                                sf.revisao,
                                date_format(us.reg_data, '%d/%m/%Y %H:%i:%s') AS reg_data,
                                IFNULL(us.priorizacao,0) AS priorizacao
                        FROM solicitacao_fases sf
                            INNER JOIN usuario_solicitacao us 
                                ON sf.id_solicitacao = us.id_solicitacao
                                AND sf.revisao = us.revisao
                                AND sf.id_usuario_resp = us.id_usuario 
                        WHERE sf.id_usuario_resp = '$idUsuario' AND sf.aprovacao = 'Com operador'");
    }
    

    while($fetch = mysql_fetch_array($sql))
    {
        $output[]  = array (
                $fetch[0], //id_solicitacao,
                $fetch[1], //revisao
                $fetch[2], //reg_data
                $fetch[3]  //priorizacao
        );
    }

    echo json_encode($output);
}

function excluirItensSiscom(cripto $criptoSolicitacao, $sup, $solicitacoesArray, $fase, $source, $data_exclusao, $listaItens)
{

    $sup = $criptoSolicitacao->decodificar($sup);

    $nSolicitacoes = count($solicitacoesArray); 
 
    if($nSolicitacoes == 0)
    {
        exit();
    }
    else
    {
        //exclui itens tabela siscom
        for($item = 0; $item < $nSolicitacoes; $item++) 
        {

            //get solicitacao and revisao
            $dadosSolicitacao = explode("&", $solicitacoesArray[$item]);
            $solicitacaoId = $dadosSolicitacao[0];
            $revisao       = $dadosSolicitacao[1];
        
            
            //atualiza tabela solicitacao_fases 
            if($fase == 'tramitacao')
            {
                //verifica se solic. é encontrada tabela siscom vendas
                $query_busca_siscom_vendas = mysql_query("SELECT siscom FROM siscom_vendas WHERE siscom = '$solicitacaoId' AND revisao = '$revisao' AND distribuido IS NULL");

                if(mysql_affected_rows() > 0)
                {
                    //atualiza tabela siscom vendas
                    $query_atualiza_siscom_vendas = "DELETE FROM siscom_vendas WHERE siscom = '$solicitacaoId' AND revisao = '$revisao' AND distribuido IS NULL";
            
                    $acao_atualiza_siscom_vendas = mysql_query($query_atualiza_siscom_vendas) or die (mysql_error());
                }

                //verifica se solic. é encontrada tabela siscom servicos
                $query_busca_siscom_servico = mysql_query("SELECT siscom FROM siscom_servicos WHERE siscom = '$solicitacaoId' AND revisao = '$revisao' AND distribuido IS NULL");

                if(mysql_affected_rows() > 0)
                {
                    //atualiza tabela siscom vendas
                    $query_atualiza_siscom_servico = "DELETE FROM siscom_servicos WHERE siscom = '$solicitacaoId' AND revisao = '$revisao' AND distribuido IS NULL";
                
                    $acao_atualiza_siscom_servico = mysql_query($query_atualiza_siscom_servico) or die (mysql_error());
                }

                //distribui solicitacao para usuario
                $sql_insere="INSERT INTO itens_excluidos(id_usuario, fase, source, solicitacaoId, data_exclusao) 
                                VALUES('$sup', '$fase', '$source', '$solicitacaoId', '$data_exclusao')";
        
                $acao_insere= mysql_query($sql_insere) or die (mysql_error());
            }
        }                        
    }
}    
?>
