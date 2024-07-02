<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css" />
<?php

$tempo = 0;
  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  
$datames=date("Y-m-d");


$d=date("d");
$Y= date("Y");
$m=date("m");
$i='0';

for($i;$i<16;$i++)
{
 $dia=$d+$i-$i;
 $dia2=$d-$i;

}

$dia2;
//echo '<br>';
$dia;

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

$condicao="WHERE bc.dt_entrada BETWEEN '$data_filtro' AND '$datames' "; 

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

$condicao="WHERE bc.dt_entrada BETWEEN '$dia_inic' AND '$data_filtro'";   
 
}



  include "../conexao.php";


if (isset($_GET["n_pedido"])){
    @session_start();    
    if($_SESSION["contestacoes_sup"] != 0){
        $sup = 1;
    }else{
        $sup = 0;
    }
    $n_pedido = $_GET["n_pedido"];
    
if(empty($n_pedido))
    {
      
 $sql = "SELECT bc.id_contestacao, 
                   bc.n_pedido, 
                   bc.revisao,
                   qtd_contestacoes, 
                   bc.cd_adabas, 
                   DATE_FORMAT(bc.dt_retorno, '%d/%m/%Y') as dt_retorno, 
                   DATE_FORMAT(bc.dt_entrada, '%d/%m/%Y') as dt_entrada,
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
                   co.item, bc.parecer, 
                   bc.texto 
            FROM base_contestacoes bc 
            	INNER JOIN cont_tp_ofensor co
            	ON co.id = bc.tp_ofensor 
                
                $condicao
              LIMIT 200
                ";
                $result = mysql_query($sql) or die(mysql_error());
    }
    if(!empty($n_pedido))
    {
        
  $sql2="SELECT bc.id_contestacao, 
                   bc.n_pedido, 
                   bc.revisao,
                   qtd_contestacoes, 
                   bc.cd_adabas, 
                   DATE_FORMAT(bc.dt_retorno, '%d/%m/%Y') as dt_retorno, 
                   DATE_FORMAT(bc.dt_entrada, '%d/%m/%Y') as dt_entrada,
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
                   co.item, bc.parecer, 
                   bc.texto 
            FROM base_contestacoes bc 
            	INNER JOIN cont_tp_ofensor co
            	ON co.id = bc.tp_ofensor 
              
                ";
        $sql2.= " WHERE bc.n_pedido like '$n_pedido%' LIMIT 200";
        $result = mysql_query($sql2) or die(mysql_error());
    }
    
    
    include "../conexao.php";
    
    $cont = mysql_num_rows($result);
    if ($cont > 0){
        $tabela = "<table id=\"table_conteudo\" border=1>
                     <tr>
                      <td style='font-weight: 600;' align='center'>Numero do pedido</td>
                      <td style='font-weight: 600;' align='center'>Revisao</td>
                      <td style='font-weight: 600;' align='center'>nº contestacao</td>
                      <td style='font-weight: 600;' align='center'>Cod. adabas</td>
                      <td style='font-weight: 600;' align='center'>Data entrada</td>
                      <td style='font-weight: 600;' align='center'>Data retorno</td>
                      <td style='font-weight: 600;' align='center'>Ofensor</td>
                      <td style='font-weight: 600;' align='center'>Regional</td>
                     </tr>";
        $return = "$tabela";
        while ($linha = mysql_fetch_array($result)){
            $return.= "<tr>";
                    $return.= "<td style='background-color: white;' align='center'><a href='atualiza_contestacao.php?idc=".$linha['id_contestacao']."'>".$linha["n_pedido"]."</a></td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["revisao"] . "</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["qtd_contestacoes"]."</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["cd_adabas"]."</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["dt_entrada"] . "</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["dt_retorno"] . "</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["item"]. "</td>";
                $return.= "<td style='background-color: white;' align='center'>" . $linha["regional"]. "</td>";
                $return.= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Descrição do erro</td>
                            <td colspan=7 style='font-size=13;background-color: white;'>";
                $return.=(strlen($linha["parecer"])>60)?substr($linha["parecer"],0,60)."...". "</td>":$linha["parecer"]. "</td>";
                $return.= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>E-MAIL</td>
                            <td colspan=7 style='font-size=13;background-color: white;'>";
                $return.=(strlen($linha["texto"])>60)?substr($linha["texto"],0,60)."...". "</td>":$linha["texto"]. "</td>";
            $return.= "</tr><tr><td colspan=9 style='font-size=2;background-color=#BDBDBD;'>&nbsp</td></tr>"; 
        }
        $return.="</table>";
        echo $return; 
    }else{
        echo "Não foram encontrados registros!";
    }
} 
?>