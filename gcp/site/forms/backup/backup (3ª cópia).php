<?php
ini_set('memory_limit', '-1');



$data = date('dmYHis');
$origem = 'E:/wamp/bin/mysql/mysql5.1.36/bin/mysqldump.exe'; //endereço do mysqldump no windows ou no linux
$destino = 'E:/wamp/www/gala_top/site/forms/backup/backup_banco/'; //pasta onde vai salvar EX.: C:/Backup/ ou /var/www/Backup/
$host = 'localhost';
$db = 'cip_nv';
$user = 'root';
$pass = 'Emprez@sVs20';




$arq_bkp = $destino.$db.'_'.$data.'.sql'; //Salva no destino com o nome do bd_data.sql

$command = "$origem --host=$host --user=$user --password=$pass --databases $db > $arq_bkp ";

system($command);

//$pasta = "E:/wamp/www/gala_top/site/forms/backup/backup_banco/";

$diretorio = dir($destino);

// Instancia a Classe Zip
if($zip1 = new ZipArchive()){

// Cria o Arquivo Zip, caso não consiga exibe mensagem de erro e finaliza script
if($zip1->open('arquivo_zip.zip', ZIPARCHIVE::CREATE) == TRUE){

while($arquivo = $diretorio->read()){

// Insere os arquivos que devem conter no arquivo zip
$zip1->addFile($arq_bkp);
//$zip1->addFile($pasta.$arquivo);
}

echo "Arquivo criado com sucesso.";
$diretorio->close();
}

}else{
die("O Arquivo não pode ser criado");
}	

$zip1->close();


echo "
       <script type=\"text/javascript\">
        alert('Backup gerado com sucesso !');
        document.location.replace('principal.php?&t=forms/backup/bd_gerado.php');
	    </script>
 ";
  exit();

?>



    