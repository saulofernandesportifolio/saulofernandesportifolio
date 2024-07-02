<?php

//-------Inclui os parâmetros do meu formulário, ficando assim----

$data = date('dmYHis');
$origem = 'E:/wamp/bin/mysql/mysql5.1.36/bin/mysqldump.exe'; //endereço do mysqldump no windows ou no linux
$destino = 'E:/wamp/www/gala_top/site/forms/backup/'; //pasta onde vai salvar EX.: C:/Backup/ ou /var/www/Backup/
$host = 'localhost';
$db = 'cip_nv';
$user = 'root';
$pass = 'Emprez@sVs20';

$arq_bkp = $destino.$db.'_'.$data.'.sql'; //Salva no destino com o nome do bd_data.sql


$command = "$origem --host=$host --user=$user --password=$pass --databases $db > $arq_bkp";
system($command);

//----------

echo "bkp realizado com sucesso";

?>