<?php

//-------Inclui os parâmetros do meu formulário, ficando assim----

$data = date('dmYHis');
$origem = {'/usr/bin/mysqldump'}; //endereço do mysqldump no windows ou no linux
$destino = {'/opt/lampp/htdocs/gala_top/site/forms/backup/'}; //pasta onde vai salvar EX.: C:/Backup/ ou /var/www/Backup/
$host = {'localhost'};
$db = {'cip_nv'};
$user = {'root'};
$pass = {''};

$arq_bkp = $destino.$db.'_'.$data.'.sql'; //Salva no destino com o nome do bd_data.sql
$command = "$origem --host=$host --user=$user --password=$pass --databases $db > $arq_bkp";
system($command);

//----------

echo "bkp realizado com sucesso";

?>