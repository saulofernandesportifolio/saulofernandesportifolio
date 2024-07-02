<?php
error_reporting(0);
ini_set("display_errors", 0 );

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");
  

   $mask = "site/forms/backup/backup_banco/*.zip";
   array_map( "unlink", glob( $mask ) );


switch (date("m")) {
        case "01":    $mes = Janeiro;     break;
        case "02":    $mes = Fevereiro;   break;
        case "03":    $mes = Marco;       break;
        case "04":    $mes = Abril;       break;
        case "05":    $mes = Maio;        break;
        case "06":    $mes = Junho;       break;
        case "07":    $mes = Julho;       break;
        case "08":    $mes = Agosto;      break;
        case "09":    $mes = Setembro;    break;
        case "10":    $mes = Outubro;     break;
        case "11":    $mes = Novembro;    break;
        case "12":    $mes = Dezembro;    break; 
 }
 

$dia_mes_ano_hora=date('d').'_de_'.$mes.'_de_'.date('Y').'_'.date('H').':'.date('i').':'.date('s');


$databd=$dia_mes_ano_hora;
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName ='cip_nv';
$mysqlUserName ='root';
$mysqlPassword ='atento';
$mysqlHostName ='10.119.243.217:3306';
$arq=$mysqlDatabaseName.'_'.$databd.'.sql';
$mysqlExportPath ='site/forms/backup/backup_banco/'.$arq;

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword.' '.'--routines'.' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command);

/*exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}*/




$zip = new ZipArchive();
$zip->open("site/forms/backup/backup_banco/$arq.zip", ZipArchive::OVERWRITE);
$zip->addFile(realpath("site/forms/backup/backup_banco/$arq"), basename("site/forms/backup/backup_banco/$arq"));
$zip->close();



$somefile="site/forms/backup/backup_banco/$arq";
error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);

//echo '<br>';
//echo "bkp realizado com sucesso";




$databd2=$dia_mes_ano_hora;
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName2 ='bd_erros_pn';
$mysqlUserName2 ='root';
$mysqlPassword2 ='empreza';
$mysqlHostName2 ='10.119.243.217:3306';
$arq2=$mysqlDatabaseName2.'_'.$databd2.'.sql';
$mysqlExportPath2 ='site/forms/backup/backup_banco/'.$arq2;

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysqldump --opt -h' .$mysqlHostName2.' -u' .$mysqlUserName2.' -p' .$mysqlPassword2.' '.'--routines'.' ' .$mysqlDatabaseName2.' > ' .$mysqlExportPath2;
exec($command);

/*exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}*/




$zip = new ZipArchive();
$zip->open("site/forms/backup/backup_banco/$arq2.zip", ZipArchive::OVERWRITE);
$zip->addFile(realpath("site/forms/backup/backup_banco/$arq2"), basename("site/forms/backup/backup_banco/$arq2"));
$zip->close();



$somefile="site/forms/backup/backup_banco/$arq2";
error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);

//echo '<br>';
//echo "bkp realizado com sucesso";



echo "
       <script type=\"text/javascript\">
        alert('Backup do Banco de dados gerado com sucesso!');
        document.location.replace('principal.php?&arq={$arq}&t=forms/backup/bd_gerado.php');
      </script>
 ";
  exit();
  
?>



    