<?php

/**
 * @author Lauro Pereira
 * @copyright 2014
 */
include "../conexao.php";

$sql = "DELETE FROM base_erros WHERE ";
$cont = 0;
foreach($_POST['erros'] as $idx => $vlr){
        $cont++;
        $sql .= " id = '$vlr'";
        if($cont < count($_POST['erros']) ){
            $sql .= " or ";
        }
}
mysql_query($sql);
$num = mysql_affected_rows();
echo "<script type=\"text/javascript\">
        alert('Você excluiu $num atividades da base de erros!');
        document.location.replace('../../tp/erros/pendente_sup.php');
      </script>";

?>