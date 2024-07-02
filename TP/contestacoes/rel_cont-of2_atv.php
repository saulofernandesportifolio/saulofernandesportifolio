<?php
include "../conexao.php";
$id = $_POST['id'];
$result = "<table class='detalhes'>";

$sql = "SELECT cm.item as 'motivo', csm.item as 'sub-motivo', count(bc.id_contestacao_atv) as 'Qtd'
FROM base_contestacoes_atividades bc 
INNER JOIN cont_motivos_erro_input cm ON bc.tipo2 = cm.id
INNER JOIN cont_sub_motivos_erro_input csm ON bc.tipo_apurado = csm.id
WHERE bc.analista LIKE '$id'
GROUP BY cm.item, csm.item
ORDER BY Qtd DESC";

$consulta = mysql_query($sql);
while($retorno = mysql_fetch_assoc($consulta)){
    $result .= "<tr><td align='center'><strong><u>".$retorno['sub-motivo']."</u></strong></td><td><u>".$retorno['Qtd']."</u></td></tr>";
}
$result .= "</table>";
die($result);
?>