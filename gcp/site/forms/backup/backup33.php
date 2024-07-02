<?php

// configuração do seu banco
$host = 'localhost'; //
$user = 'root';
$pass = 'Emprez@sVs20';
$db = 'cip_nv';
$print_result = true; //true para imprimir aba, false para não imprimir
$save_backup = true; //true para salvar, false para não salvar
$backup_file_name = "bkpcip_nv"; //Nome do arquivo, se $save_backup estiver ativado
$backup_file_format = "sql"; // formato da extensão (automatic_backup_140409.sql)
// fim configuração do banco

$con = mysql_connect($host,$user,$pass);
mysql_select_db($db);

//Pega as datas e calcula o tempo do última backup
$nova_data = date("Y-m-d");
$calcula = strtotime($nova_data . "-1 days"); //Aqui vc especifica intervalo entre o Backup

$calcula2= date('Y-m-d',$calcula);

echo $verifica = "SELECT * FROM data_backup ";
$exec_verifica = mysql_query($verifica);
//$exec_verifica= mysql_query($verifica) or die (mysql_error());
while ($row = mysql_fetch_array($exec_verifica))
{
  $id = $row["id"];
  echo $data = $row["ultimo_backup"];
}

//Verifica se a data do último backup é igual ao calculado pelo intervalo
//Se for igual quer dizer que o backup deve ser efetuado
if ($calcula2==$data)
{

//Lista as tabelas de seu banco
$tables = mysql_list_tables($db);
$backup = '-- Yunie Auto Backup System - Adaptado por Alan Maia - alanmaia@amazoninfo.com.br
-- Database: '.$db.'
-- Date: '.date("d/m/y", time()).'';

$backup .= '';

//Rotina para criar arquivo com as instruções SQL
while ($tables_result = mysql_fetch_assoc($tables))
{
  $tablename = $tables_result['Tables_in_'.$db.''];
  $backup .= '---- `'.$tablename.'` table --';
  $backup .= 'DROP TABLE IF EXISTS `'.$tablename.'`;
  CREATE TABLE IF NOT EXISTS `'.$tablename.'`
  (
  ';
  $fieldname = '';
  $fields_array = array();
  $table_fields = mysql_query("SHOW COLUMNS FROM `".$tablename."`");
  $primary_key = '';
  while ($fields_result = mysql_fetch_assoc($table_fields))
  {
    if (!empty($fieldname))
    {
        $backup .= ',
    ';
    }
  $fieldname = $fields_result['Field'];
  $fields_array[] = $fieldname;
  $type = $fields_result['Type'];
  $primary = '';
  $increment = '';
  if ($fields_result['Extra'] == 'auto_increment')
  {
  $increment = ' AUTO_INCREMENT';
  }
  $null = 'NULL';
  if ($fields_result['Null'] == 'NO')
  {
  $null = 'NOT NULL';
  }
  if ($fields_result['Key'] == 'PRI')
  {
  $primary_key = $fieldname;
  }
  $default = $fields_result['Default'];
  if ($default && empty($increment))
  {
  $default = ' DEFAULT \''.$default.'\'';
  }
  else
  {
  $default = '';
  }
  $backup .= '`'.$fieldname.'` '.$type.' '.$null.''.$increment.''.$default.'';
  }
  if (!empty($primary_key))
  {
    $backup .= ',
    PRIMARY KEY (`id`)';
  }
  $backup .= '
  );';
  $fields_list = '(';
  $field_num = 1;
  foreach(array_keys($fields_array) as $keys)
  {
  $fields_list .= '`'.$fields_array[$keys].'`';
  if ($field_num != sizeof($fields_array))
  {
  $fields_list .= ', ';
  }
  $field_num++;
  }
  $fields_list .= ')';
  $rows_fields = mysql_query('SELECT * FROM `'.$tablename.'`');
  echo mysql_error();
  $inserts = mysql_num_rows($rows_fields);
  if ($inserts > 0)
  {
    $backup .= '
    INSERT INTO `'.$tablename.'` '.$fields_list.' VALUES
    ';
    $insert_num = 0;
    while ($rows_result = mysql_fetch_assoc($rows_fields))
    {
      $insert_num++;
      $field_num = 1;
      $backup .= '(';
      foreach(array_keys($rows_result) as $keys)
      {
        $value = $rows_result[$keys];
        $value = str_replace("'","''",$value);
        if (!is_numeric($value))
        {
        $backup .= "'".$value."'";
        }
        else
        {
        $backup .= $value;
        }
        if ($field_num != sizeof($rows_result))
        {
        $backup .= ',';
        }
        $field_num++;
      }
      $backup .= ')';
      if ($insert_num == $inserts)
      {
        $backup .= ';';
      }
      else
      {
        $backup .= ',
        ';
      }
    }
  }
  $backup .= '
  ';
}
  //Se no config estiver true visualiza num text area as instruções SQL
  if ($print_result == true)
  {
    //Aqui vc pode imprimir num text area as instruções SQL pra mim não é necessário
    //por isso está comentado para visualizar é só descomentar
    //echo '<textarea rows="30" cols="100" wrap="OFF">'.$backup.'</textarea>';
  }
  //Se noconfig estiver true salva em arquivo .sql as instruções SQL
  if ($save_backup == true)
  {
    //Aqui vc define o diretório onde o arquivo deve ser salvo
    //Pode ser escrito como c:/pasta/bkp/
    //Pode ser qualquer unidade inclusive na rede basta a pasta ter permissão
    //Não esqueça de terminar o diretoírio com a barra /
    $dir = "E:/wamp/www/gala_top/site/forms/backup/";
    $file = fopen($dir.$backup_file_name.'_'.date("dmy", time()).'.'.$backup_file_format.'', "w+");
    fwrite($file, $backup);
    fclose($file);
  }

  //Aqui aconselho a criar uma tabela para gravar a data do ultimo backup e atualizar para data atual
  //Assim quando entrar no sistema a rotina irá verificar se há necessidade de backup
  //de acordo com o cálculo no inicio do código
   $update ="UPDATE `data_backup` SET `ultimo_backup` = '$new_data' WHERE `id` ='$id'";
  $exec_update = mysql_query($update);
  $msg = "Backup Realizado com sucesso!";
}
else
{
  $msg = "Não foi necessário realizar o Backup!";
}
?>
