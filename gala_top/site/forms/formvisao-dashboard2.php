<html>
<head>
<title>Como criar tabelas com PHP</title>
</head>
<body>

<?php
$data_1= arrumadata($data_1);
$data_2= arrumadata($data_2);

$prazod="Dentro do prazo";

/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost = 'localhost:3306'; // endereco do servidor de banco de dados
$dbuser = 'root'; // login do banco de dados
$dbpass = 'Emprez@sVs20'; // senha
$dbname = 'cip_nv'; // nome do banco de dados a ser usado
$conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
$seleciona = mysql_select_db($dbname);
$sqlcriatabela = "CREATE TABLE IF NOT EXISTS tbl_acumulada (setor VARCHAR(50), 
                                                            id_cotacao INT(255), 
                                                            vence_hoje INT(255), 
                                                            Vence_D_1 INT(255),
                                                            Vence_D_2 INT(255),
                                                            Vence_D_m_2 INT(255));";
$criatabela = mysql_query( $sqlcriatabela, $conecta );

// inicia a conexao ao servidor de banco de dados
if(! $conecta )
{
  die("<br />Nao foi possivel conectar: " . mysql_error());
}
echo "<br />Conexao realizada!";

// seleciona o banco de dados no qual a tabela vai ser criada
if (! $seleciona)
{
  die("<br />Nao foi possivel selecionar o banco de dados $dbname");
}
echo "<br />selecionado o banco de dados $dbname";

// finalmente, cria a tabela 
if(! $criatabela )
{
  die("<br />Nao foi possivel criar a tabela: " . mysql_error());
}
echo "<br />A tabela foi criada!";

$sql3="SELECT c.setor,c.id_cotacao 
       FROM tbl_analise c 
       INNER JOIN tbl_cotacao d
       ON c.id_cotacao=d.id_cotacao
       WHERE d.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
             AND d.PRAZO_DIAS IN ('$prazod') 
UNION 
SELECT c.setor,c.id_cotacao  
FROM tbl_input c
  INNER JOIN tbl_cotacao d
       ON c.id_cotacao=d.id_cotacao
       WHERE d.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
             AND d.PRAZO_DIAS IN ('$prazod') 
UNION 
SELECT c.setor,c.id_cotacao
FROM tbl_auditoria c 
INNER JOIN tbl_cotacao d
       ON c.id_cotacao=d.id_cotacao
       WHERE d.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
             AND d.PRAZO_DIAS IN ('$prazod') 
UNION 
SELECT c.setor,c.id_cotacao 
FROM tbl_correcao c
INNER JOIN tbl_cotacao d
       ON c.id_cotacao=d.id_cotacao
       WHERE d.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
             AND d.PRAZO_DIAS IN ('$prazod')  ";

$consulta3 = mysql_query($sql3) or die(mysql_error()); 
while($dado3= mysql_fetch_array($consulta3)){

$id_cotacao       =$dado3['id_cotacao'];
$setor           = $dado3['setor'];


 $sql4="INSERT INTO tbl_acumulada(setor,
                                  id_cotacao
                                  )VALUES(
                                  '$setor',
                                  '$id_cotacao')
                        
";
$consulta4 = mysql_query($sql4) or die(mysql_error()); 



}


// encerra a conexão
mysql_close($conecta);
?>
</body>
</html>


