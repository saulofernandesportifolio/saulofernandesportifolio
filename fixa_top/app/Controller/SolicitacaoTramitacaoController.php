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
            echo buscaSolicitacoesTramitacaoDistribuir(); 
            break; 
        }
    } 
} 


function buscaSolicitacoesTramitacaoDistribuir()
{
    $sql = mysql_query("CALL SP_DISTRIBUIR_TRAMITACAO()");

    while($fetch  = mysql_fetch_array($sql))
    {
        $output[]  = array (
            $fetch[0], //siscom, 
            $fetch[1], //cnpj, 
            $fetch[2], //razao_social,
            $fetch[3], //gn_responsavel_canal, 
            $fetch[4], //escritorio_gn, 
            $fetch[5], //gn_responsavel_canal,
            $fetch[6], //status, 
            $fetch[7], //revisao, 
            $fetch[8], //data, 
            $fetch[9], //importacao_usuario, 
            $fetch[10] //origem
        );
    }
    echo json_encode($output);
}
