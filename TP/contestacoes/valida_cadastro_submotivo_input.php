<?php
/**
 * @author Lauro Pereira
 * @copyright 2014
 */
 date_default_timezone_set('Brazil/East');


function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}
echo arrumaString($_POST['submotivo']);



include '../conexao.php';

    

$sql = "insert into `tp`.`cont_sub_motivos_erro_input`(
            `item`,
            `id_erro`)
     values( '{$_POST['submotivo']}', 
            '{$_POST['motivo']}')";
 mysql_query($sql) or die(mysql_error().$sql." erro #SQL_2");
 if(mysql_affected_rows() === 1){
    die("<script>
                alert('Sub motivo inserido com sucesso!');
                document.location.replace('../../tp/contestacoes/cadastro_ofensor_submotivos_input.php');
     
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir o sub motivo, favor verificar os dados inseridos.');
                document.location.replace('../../tp/contestacoes/cadastro_ofensor_submotivos_input.php');
         </script>");
 }
?>