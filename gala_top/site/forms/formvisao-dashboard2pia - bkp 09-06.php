<table class="lista-clientesdashboard">
  <tr>
  <th colspan="6"><?php echo "Cotação pendente top - Dentro do prazo"; ?></th>
    </tr> 
  <th>Tipo de Processo</th>
  <th>Dentro do prazo</th>
  <th>Vence Hoje</th>
  <th>Vence D+1</th>
  <th>Vence D+2</th>
  <th>Vence D>2</th>
  </tr>
  
<?php
$data_1= arrumadata($data_1);
$data_2= arrumadata($data_2);

$prazod="Dentro do prazo";


/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost = 'localhost:3306'; // endereco do servidor de banco de dados
$dbuser = 'root'; // login do banco de dados
$dbpass = ''; // senha
$dbname = 'cip'; // nome do banco de dados a ser usado
$conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
$seleciona = mysql_select_db($dbname);
$sqllimpatabela = "DROP TABLE tbl_acumulada ";
$sqllimpatabela = mysql_query( $sqllimpatabela, $conecta );
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


echo $sql4="INSERT INTO tbl_acumulada(setor,
                                  id_cotacao
                                  )VALUES(
                                  '$setor',
                                  '$id_cotacao')
                        
";
$consulta4 = mysql_query($sql4) or die(mysql_error()); 



}


echo $sql="SELECT count(b.setor)as total, 
COUNT(a.vencimento_ilha) as total2,
a.id_cotacao, 
a.regional_atribuida, 
a.carteira,
a.tipo, 
a.substatus_da_cotacao, 
SUBSTRING(a.vencimento_ilha,1,10) as vencimento_ilha,
b.setor,
a.SLA_DIAS,
a.PRAZO_DIAS, 
a.TIPO_COTACAO, 
a.TIPO_DE_LINHA,
a.TIPOB, 
a.VENCIMENTODIAS,
b.vence_hoje,
b.vence_D_1,
b.vence_D_2,
b.vence_D_m_2,
DATE_FORMAT(a.dt_inclusao_bd_cip2, '%d/%m/%Y') as dt_inclusao_bd_cip2 
FROM tbl_cotacao a 
INNER JOIN  tbl_acumulada b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.dt_inclusao_bd_cip2 BETWEEN '$data_1' AND '$data_2' 
AND a.PRAZO_DIAS IN ('$prazod') 
GROUP BY b.setor,a.id_cotacao
"; 


 $acao_op=mysql_query($sql,$conecta);
  
   while ($dado2= mysql_fetch_array($acao_op))
           {        
                   echo $id_cotacao=$dado2['id_cotacao'];
                    $carteira = $dado2['carteira'];
                    $total = $dado2['total'];
                    $dt_inclusao_bd_cip= $dado2['dt_inclusao_bd_cip2'];
                    $status_cip_analise= $dado2['status_cip_analise'];
                    $PRAZO_DIAS= $dado2['PRAZO_DIAS'];
                    $setor= $dado2['setor'];
                    $total2 = $dado2['total2'];
                    $vencimento_ilha2 = $dado2['vencimento_ilha'];
                    $VENCIMENTODIAS2 = $dado2['VENCIMENTODIAS'];
                    $vence_hoje  = $dado2['vence_hoje'];
                    $vence_D_1   = $dado2['vence_D_1'];
                    $vence_D_2   = $dado2['vence_D_2'];
                    $vence_D_m_2 = $dado2['vence_D_m_2'];

if($setor == "Analise" || $setor == "analise"){

  $setor="Análise de documentação";
}


if($setor == "Input" || $setor == "input"){

  $setor="Ilha de input";
}


if($setor == "Auditoria" || $setor == "auditoria"){

  $setor="Análise de input";

}


if($setor == "Correcao" || $setor == "correcao"){

  $setor="Correção input";
}


$dia=date("Y-m-d");


 
if(strlen(diferencadata($vencimento_ilha2,$dia)) == 3){
   $diasdff = substr(diferencadata($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata($vencimento_ilha2,$dia)) == 2){
   $diasdff = substr(diferencadata($vencimento_ilha2,$dia),1,2);
}elseif(strlen(diferencadata($vencimento_ilha2,$dia)) == 1)
{
    $diasdff = diferencadata($vencimento_ilha2,$dia);  
}


echo  $diasdff;
echo '<br>';

if($diasdff == 0 ){

  //echo "igual";
  $Hoje = $total2;

}elseif(!empty($setor)){
 $Hoje=0;

}

if($diasdff  == 1){

  //echo "nao é igual";

  $venced1=$total2;
}
elseif(!empty($setor)){

$venced1=0;

}

if($diasdff  == 2){

  //echo "nao é igual";

  $venced2=$total2;
}
elseif(!empty($setor)){

$venced2=0;

}

if($diasdff  >= 3 ){

  //echo "nao é igual";

  $venced3=$total2;
}
elseif(!empty($setor)){

$venced3=0;

}

echo $query_linha="UPDATE tbl_acumulada a SET a.vence_hoje  ='$Hoje',
                                         a.vence_D_1   ='$vence1',
                                         a.vence_D_2   ='$vence2',
                                         a.vence_D_m_2  ='$vence3'
                                      
                                   WHERE a.id_cotacao  = $id_cotacao ";

 $acao_op=mysql_query($query_linha,$conecta);


?>


  <tr>
  <?php if(!empty($setor)){ ?>  
  <td><?php echo $setor ?></td>
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $total ?></td> 
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $vence_hoje ?></td> 
  <?php }if(!empty($setor)){ ?>
  <td><?php echo $vence_D_1 ?></td> 
  <?php }if(!empty($setor)){  ?>
  <td><?php echo $vence_D_2 ?></td> 
  <?php }if(!empty($setor)){ ?>
  <td><?php echo $vence_D_m_2 ?></td> 
  <?php } ?>
</tr>

<?php 


// encerra a conexão
mysql_close($conecta);

} ?>
</table>




