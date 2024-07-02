<?php
ini_set('memory_limit', '-1');

$caminhoDoMysqldump = "E:/wamp/bin/mysql/mysql5.1.36/bin/mysqldump.exe";
$DBUSER="root";
$DBPASSWD="Emprez@sVs20";
$DATABASE="cip_nv";


$filename = "backup-".date("d-m-Y").".sql.zip";
$mime = "application/x-gzip";

header( "Content-Type: ".$mime );
header( 'Content-Disposition: attachment; filename="'.$filename.'"' );

$cmd = "$caminhoDoMysqldump -u $DBUSER --pssword=$DBPASSWD $DATABASE | gzip --best";   


passthru($cmd);

exit(0);


?>

