<?php

    $tempo = 0;
  set_time_limit($tempo);
  
ini_set ( 'mysql.connect_timeout' ,  '10000' ); 
ini_set ( 'default_socket_timeout' ,  '10000' );
ini_set('memory_limit', '-1');



$sql="SELECT bb.id_cotacao as ds_cota,bb.cotacao_principal as ds_cotap FROM tbl_cotacao_antiga bb,tbl_cotacao aa WHERE aa.id_cotacao_antiga IS NULL";
$acao = mysql_query($sql) or die (mysql_error());

while($linha = mysql_fetch_array($acao)){
echo $id_cota=$linha["ds_cota"];
$cotap=$linha["ds_cotap"];


$sql2="UPDATE tbl_cotacao a 
SET a.id_cotacao_antiga='$id_cota' 
WHERE a.cotacao_principal='$cotap' 
AND a.id_cotacao_antiga IS NULL ";

}

$sql_linhas=" UPDATE tbl_cotacao a,(SELECT   id_cotacao,
                                                         cotacao_principal,
                                                         ALTAS, 
                                                         PORTABILIDADE,
                                                         MIGRACAO,
                                                         TROCAS,
                                                         TT,
                                                         BACKUP, 
                                                         M_2_M,
                                                         FIXA,
                                                         PRE_POS, 
                                                         MIGRACAO_TROCA,
                                                         total_linhas_cip FROM tbl_cotacao_antiga ) b 
                         SET 
                         a.ALTAS                  =b.ALTAS,
                         a.PORTABILIDADE2 =b.PORTABILIDADE,
                         a.MIGRACAO           =b.MIGRACAO,
                         a.TROCAS                =b.TROCAS,
                         a.TT                          =b.TT,
                         a.BACKUP                =b.BACKUP,
                         a.M_2_M                   =b.M_2_M,
                         a.FIXA                         =b.FIXA,
                         a.PRE_POS                =b.PRE_POS, 
                         a.MIGRACAO_TROCA =b.MIGRACAO_TROCA,
                         a.total_linhas_cip         =b.total_linhas_cip
                         
          WHERE a.cotacao_principal = b.cotacao_principal AND a.id_cotacao_antiga=b.id_cotacao AND a.total_linhas_cip IS NULL";
$acao = mysql_query($sql_linhas) or die (mysql_error());



echo "atualizada";

?>