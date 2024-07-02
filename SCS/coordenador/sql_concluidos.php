<?php
/**
 * @author Lauro Pereira
 * @copyright 2014
 */
include "../funcoesSql.php";

//Executa pesquisa de pedidos tramitando
$sql = montaSqlSelect($_GET, 'tbl_chamados');
$sql .= " ORDER BY n_chamado;";
$sql_concluido = mysql_query($sql) or die(mysql_error());

//Armazena o total de pedidos tramitando
$num = mysql_num_rows($sql_concluido);
if($num === 0){
    echo("<tr><td colspan='9' align='center'><strong>Nenhuma atividade encontrada!</strong></td></tr>");
}
else{
    while($linha_atv = mysql_fetch_assoc($sql_concluido)){
        $idatividade	=	$linha_atv["n_chamado"];
        $solicitacao	=	$linha_atv["solicitacao"];
        $tipo		=	$linha_atv["tipo"];
        $sistema	=	$linha_atv["sistema"];
        $login		=	$linha_atv["login"];
        $dt_solic	=	$linha_atv["dt_solic"];
        $solic_por	=	$linha_atv["l_input"];
        $descricao	=	$linha_atv["descricao"];
        $dt_conclusao	=	$linha_atv["dt_conclusao"];

        echo '<tr>
            <td align="center" width="10%">'.$idatividade.'</td>
            <td align="center" width="13%">'.$solicitacao.'</td>
            <td align="center" width="18%">'.$tipo,'</td>
            <td align="center" width="7%" >'.$sistema.'</td>
            <td align="center" width="15%">'.$login.'</td>
            <td align="center" width="15%">'.transforme_data_dma($dt_solic).'</td>
            <td align="center" width="12%">'.$solic_por.'</td>
            <td align="center" width="18%">'.transforme_data_dma($dt_conclusao).'</td>
            <td align="center" width="5%" ><a style="color:#0033FF" href="menu_1.php?ide='.$ide.'&m=4&n_chamado='.$idatividade.'">Abrir</a>
            </td>
        </tr>';		
    }
}
echo "</table>";