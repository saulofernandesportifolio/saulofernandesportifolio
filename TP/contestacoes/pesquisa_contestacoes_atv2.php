<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css" />
<?php
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");
include "../conexao.php";

$datames=date("Y-m-d");


$d=date("d");
$Y= date("Y");
$m=date("m");
$i='0';

for($i;$i< 60;$i++)
{
 
 $dia=$d+$i;

 $dia2=$d-$i;

}

/*echo "data inicial: ".$dia2;
echo '<br>';
echo "data final: ".$dia;*/

if(strlen($dia) == 1)
{
$zero='0';
$dia= $zero.$dia;
}
else
{
$dia;
}  

if(strlen($dia2) == 1)
{
$zero='0';
$dia2= $zero.$dia2;
}
else
{
$dia2;
} 

if($dia2 < '0' )
{
$mes=$m-1;
if(strlen($mes) == 1)
{
$zero='0';
$mes= $zero.$mes;
}
else
{
    $mes;
} 

 $data_filtro=$Y."-".$mes."-".$dia;  

$condicao="WHERE bc.data_do_recebimento BETWEEN '$data_filtro' AND '$datames' ORDER BY bc.data_do_recebimento"; 

}
if($dia2 > '0'){
    


if($dia2 > '0' and $dia2 < '16'){
$diaatual=$dia2;
//$dia= $dia2+$d; 
$data_filtro=$Y."-".$m."-".$dia; 
}else{
$data_filtro=$Y."-".$m."-".$dia;    
$diaatual= $dia-$d;
}

echo '<br>';


if(strlen($diaatual) == 1)
{
$zero='0';
$diaatual= $zero.$diaatual;
}
else
{
$diaatual;
} 

$dia_inic=$Y."-".$m."-".$diaatual;

$condicao="WHERE bc.data_do_recebimento BETWEEN '$dia_inic' AND '$data_filtro' ORDER BY bc.data_do_recebimento";   
 
}

if (isset($_GET["n_pesquisa"])){
    @session_start();    
    if($_SESSION["contestacoes_atv_sup"] != 0){
        $sup = 1;
    }else{
        $sup = 0;
    }
 
 $n_pesquisa=$_GET["n_pesquisa"];
 
if(empty($n_pesquisa))
    {
    include "../conexao.php";
    
 $sql = "SELECT bc.id_contestacao_atv,
                   bc.n_atividade, 
                   bc.n_pedido,
                   bc.cotacao, 
                   bc.revisao,
                   bc.qtd_contestacoes, 
                   bc.adabas, 
                   DATE_FORMAT(bc.data_retorno, '%d/%m/%Y %H:%i%:%s') as data_retorno, 
                   DATE_FORMAT(bc.data_do_recebimento, '%d/%m/%Y') as data_do_recebimento,
                   CASE 
                        WHEN regional = 'RS' OR regional = 'SC' OR regional = 'PR'
                        THEN 'SUL' 
                        WHEN regional = 'GO' OR regional = 'MT' OR regional = 'MS' OR regional = 'DF'
                        THEN 'CO'
                        WHEN regional = 'AL' OR regional = 'BA' OR regional = 'CE' OR regional = 'MA'
                          OR regional = 'PB' OR regional = 'PE' OR regional = 'PI' OR regional = 'RN'
                          OR regional = 'SE' OR regional = 'TO'
                        THEN 'NE'
                        WHEN regional = 'AC' OR regional = 'AP' OR regional = 'AM' OR regional = 'PA'
                          OR regional = 'RO' OR regional = 'RR'
                        THEN 'NO'
                        WHEN regional = 'ES' OR regional = 'RJ'
                        THEN 'LESTE'
                        WHEN regional = 'MG'
                        THEN 'MG'
                    ELSE 'SP'
                    END as regional,
                   co.item, 
                   bc.observacoes_colaborador, 
                   bc.retorno_do_email
            FROM base_contestacoes_atividades bc 
            	INNER JOIN cont_tp_ofensor_input co ON co.id = bc.ofensor 
                                             
                $condicao
                LIMIT 200;
                ";
                $result = mysql_query($sql) or die(mysql_error());
}

if(!empty($n_pesquisa))
    {
        
 $sql2="SELECT bc.id_contestacao_atv,
                   bc.n_atividade, 
                   bc.n_pedido,
                   bc.cotacao, 
                   bc.revisao,
                   bc.qtd_contestacoes, 
                   bc.adabas, 
                   DATE_FORMAT(bc.data_retorno, '%d/%m/%Y %H:%i%:%s') as data_retorno, 
                   DATE_FORMAT(bc.data_do_recebimento, '%d/%m/%Y') as data_do_recebimento,
                   CASE 
                        WHEN regional = 'RS' OR regional = 'SC' OR regional = 'PR'
                        THEN 'SUL' 
                        WHEN regional = 'GO' OR regional = 'MT' OR regional = 'MS' OR regional = 'DF'
                        THEN 'CO'
                        WHEN regional = 'AL' OR regional = 'BA' OR regional = 'CE' OR regional = 'MA'
                          OR regional = 'PB' OR regional = 'PE' OR regional = 'PI' OR regional = 'RN'
                          OR regional = 'SE' OR regional = 'TO'
                        THEN 'NE'
                        WHEN regional = 'AC' OR regional = 'AP' OR regional = 'AM' OR regional = 'PA'
                          OR regional = 'RO' OR regional = 'RR'
                        THEN 'NO'
                        WHEN regional = 'ES' OR regional = 'RJ'
                        THEN 'LESTE'
                        WHEN regional = 'MG'
                        THEN 'MG'
                    ELSE 'SP'
                    END as regional,
                   co.item, 
                   bc.observacoes_colaborador, 
                   bc.retorno_do_email
            FROM base_contestacoes_atividades bc 
            	INNER JOIN cont_tp_ofensor_input co
            	ON co.id = bc.ofensor                
              WHERE bc.n_atividade LIKE '$n_pesquisa%' OR  bc.n_pedido LIKE '$n_pesquisa%' OR  bc.cotacao LIKE '$n_pesquisa%' LIMIT 200 ";
        $result = mysql_query($sql2) or die(mysql_error());
    }
  
        
    include "../conexao.php";
    
$login = $_SESSION["login"];

  
$cont = mysql_num_rows($result);
if ($cont > 0) {
    $tabela = "<table id=\"table_conteudo\" border=1>
                     <tr>
                     <td style='font-weight: 600;' align='center'>Numero da Atividade</td>
                      <td style='font-weight: 600;' align='center'>Numero do pedido</td>
                      <td style='font-weight: 600;' align='center'>Cotação</td>
                      <td style='font-weight: 600;' align='center'>Revisao</td>
                      <td style='font-weight: 600;' align='center'>nº contestacao</td>
                      <td style='font-weight: 600;' align='center'>Adabas</td>
                      <td style='font-weight: 600;' align='center'>Data do Recebimento</td>
                      <td style='font-weight: 600;' align='center'>Data do Retorno</td>
                      <td style='font-weight: 600;' align='center'>Ofensor</td>
                      <td style='font-weight: 600;' align='center'>Regional</td>
                     </tr>";
    $return = "$tabela";
    while ($linha = mysql_fetch_array($result)) {
        $return .= "<tr>";
         $return .= "<td style='background-color: white;' align='center' width='100%'>
        <a href='atualiza_contestacao_atv.php?idv=".$linha['id_contestacao_atv']."'>".$linha["n_atividade"]."</a></td>";
       $return .= "<td style='background-color: white;' align='center' width='100%'>
        <a href='atualiza_contestacao_atv.php?idv=".$linha['id_contestacao_atv']."'>".$linha["n_pedido"]."</a></td>";
           $return .= "<td style='background-color: white;' align='center' width='100%'>
        <a href='atualiza_contestacao_atv.php?idv=".$linha['id_contestacao_atv']."'>".$linha["cotacao"]."</a></td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["revisao"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["qtd_contestacoes"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["adabas"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["data_do_recebimento"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["data_retorno"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["item"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["regional"] .
            "</td>";
        $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Descrição do erro</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["observacoes_colaborador"]) > 60) ? substr($linha["observacoes_colaborador"], 0,60) .
            "..." . "</td>" : $linha["observacoes_colaborador"] . "</td>";
        $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>E-MAIL</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["retorno_do_email"]) > 60) ? substr($linha["retorno_do_email"], 0,60) .
            "..." . "</td>" : $linha["retorno_do_email"] . "</td>";
        $return .= "</tr><tr><td colspan=10 style='font-size=2;background-color=#BDBDBD;'>&nbsp</td></tr>";
    }
    $return .= "</table>";
    echo $return;
    } else {
    echo "Não foram encontrados registros!";
    }
  }

?>