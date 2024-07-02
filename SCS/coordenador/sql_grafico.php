<?php

/**
 * @author Lauro Pereira
 * @copyright 2013
 */

include '../bd.php';

$tipo=$_POST['tipo'];

switch($tipo)
{
    case 'ProdOp':
        $sql_grafico = 'SELECT login as operador, count(n_chamado) as producao FROM tbl_chamados GROUP BY login';
        break;
}

while($linha = mysql_fetch_assoc(mysql_query($sql_grafico)))

return $linha;
?>