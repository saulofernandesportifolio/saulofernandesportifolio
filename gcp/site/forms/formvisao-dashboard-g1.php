 

<?php

$data_1=arrumadata($data_1);
$data_2=arrumadata($data_2);


/*
$ip='localhost:3306';


/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
/*$dbhost = $ip; // endereco do servidor de banco de dados
$dbuser = 'root'; // login do banco de dados
$dbpass = 'atento'; // senha
//$dbpass = ''; // senha
$dbname = 'cip_nv'; // nome do banco de dados a ser usado
$conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
$seleciona = mysql_select_db($dbname);
$destroittabela="DROP TABLE IF EXISTS tbl_acumulada;";
$destroittabela2 = mysql_query($destroittabela, $conecta );
$sqlcriatabela = "CREATE TABLE IF NOT EXISTS tbl_acumulada (Total VARCHAR(255), 
                                                              LINHAS VARCHAR(255),
                                                              MES date,
                                                              PRAZO_DIAS VARCHAR(255),
                                                              VENCIMENTODIAS VARCHAR(255),
                                                              SETOR_B VARCHAR(255)
                                                              );";


$criatabela = mysql_query($sqlcriatabela, $conecta );*/

$sqlcriatabela = "CALL cip_nv.cria_tbl_acumulada()";
$criatabela =mysql_query($sqlcriatabela, $conecta );

// inicia a conexao ao servidor de banco de dados
/*if(! $conecta )
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
echo "<br />A tabela foi criada!";*/
//SUBSTRING(a.criado_em,1,10) BETWEEN '$data_1' AND '$data_2' OR b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' 

$sql2="SELECT a.id_cotacao,
count(a.total_linhas_cip) as total,
a.criado_em as data_tratamento,
a.revisao as revisao,
a.dia,
a.SLA_DIAS,
b.setor,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
WHERE b.status_cip_analise IN (2,3,4) AND a.TIPO_COTACAO='Principal' 
GROUP BY data_tratamento ";

$acao_op2 = mysql_query($sql2,$conecta) or die (mysql_error());

while($linha=mysql_fetch_array($acao_op2)){

 
$MES=$linha4['data_tratamento'];


/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}*/






$insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                       )VALUES(
                                        '1.Entrante',
                                        '".$linha['total']."',
                                        '".$linha['data_tratamento']."',
                                        '".$linha['PRAZO_DIAS']."',
                                        '".$linha['VENCIMENTODIAS']."',
                                        '".$linha['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());




 }


$sql2="SELECT a.id_cotacao,
count(a.total_linhas_cip) as total,
b.dt_tratamento_analise as data_tratamento,
a.revisao as revisao,
a.dia,
a.SLA_DIAS,
b.setor,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
WHERE b.status_cip_analise IN (5,6,34) AND b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND a.TIPO_COTACAO='Principal' 
GROUP BY data_tratamento  
 ";

$acao_op2 = mysql_query($sql2,$conecta) or die (mysql_error());

while($linha=mysql_fetch_array($acao_op2)){

 
$MES=$linha4['data_tratamento'];

/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}
*/


$insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                       )VALUES(
                                        '1.Entrante',
                                        '".$linha['total']."',
                                        '".$linha['data_tratamento']."',
                                        '".$linha['PRAZO_DIAS']."',
                                        '".$linha['VENCIMENTODIAS']."',
                                        '".$linha['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());




 }






$sql3="SELECT a.id_cotacao,
b.dt_tratamento_analise as data_tratamento,
count(a.total_linhas_cip) as total,
a.dia,
a.SLA_DIAS,
b.setor,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
INNER JOIN cip_nv.tbl_input c ON c.id_cotacao=a.id_cotacao
WHERE b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND b.status_cip_analise IN (5,6)
AND c.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND c.status_cip_input IN (9,10)  AND a.TIPO_COTACAO='Principal' 
GROUP BY data_tratamento,setor ";



$acao_op3 = mysql_query($sql3,$conecta) or die (mysql_error());

while($linha2=mysql_fetch_array($acao_op3)){

 $MES=$linha4['data_tratamento'];

/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}*/




   $insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                        )VALUES(
                                        '2.Saida',
                                        '".$linha2['total']."',
                                        '".$linha2['data_tratamento']."',
                                        '".$linha2['PRAZO_DIAS']."',
                                        '".$linha2['VENCIMENTODIAS']."',
                                        '".$linha2['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());



 }


$sql3="SELECT a.id_cotacao,
b.dt_tratamento_analise as data_tratamento,
sum(a.total_linhas_cip) as total_linhas,
a.dia,
a.SLA_DIAS,
b.setor,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
INNER JOIN cip_nv.tbl_input c ON c.id_cotacao=a.id_cotacao
WHERE b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND b.status_cip_analise IN (5,6)
AND c.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND c.status_cip_input IN (9,10) AND a.TIPO_COTACAO='Principal' 
GROUP BY a.total_linhas_cip";



$acao_op3 = mysql_query($sql3,$conecta) or die (mysql_error());

while($linha3=mysql_fetch_array($acao_op3)){


 $MES=$linha4['data_tratamento'];

/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}*/






   $insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                        )VALUES(
                                        '3.Qtd de linhas',
                                        '".$linha3['total_linhas']."',
                                        '".$linha3['data_tratamento']."',
                                        '".$linha3['PRAZO_DIAS']."',
                                        '".$linha3['VENCIMENTODIAS']."',
                                        '".$linha3['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());


 }


$sql3="SELECT a.id_cotacao,
b.dt_tratamento_analise as data_tratamento,
count(a.total_linhas_cip) as total,
a.dia,
a.SLA_DIAS,
b.setor,
a.revisao as revisao,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
INNER JOIN cip_nv.tbl_input c ON c.id_cotacao=a.id_cotacao
WHERE b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND b.status_cip_analise IN (5,6)
AND c.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND c.status_cip_input IN (9,10) AND a.TIPO_COTACAO='Principal'  
AND a.PRAZO_DIAS='Fora do prazo' 
GROUP BY data_tratamento,revisao,setor ";



$acao_op3 = mysql_query($sql3,$conecta) or die (mysql_error());

while($linha3=mysql_fetch_array($acao_op3)){


/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}*/



 $insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                        )VALUES(
                                        '"."Backlog"." ".utf8_encode($linha3['TIPO_DE_LINHA'])."',
                                        '".$linha3['total']."',
                                        '".$linha3['data_tratamento']."',
                                        '".$linha3['PRAZO_DIAS']."',
                                        '".$linha['VENCIMENTODIAS']."',
                                        '".$linha['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());

}


$sql3="SELECT a.id_cotacao,
b.dt_tratamento_analise as data_tratamento,
count(a.total_linhas_cip) as total,
a.dia,
a.SLA_DIAS,
b.setor,
a.revisao as revisao,
a.total_linhas_cip,
a.PRAZO_DIAS,
a.TIPO_DE_LINHA,
a.VENCIMENTODIAS FROM cip_nv.tbl_cotacao a 
INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao 
INNER JOIN cip_nv.tbl_input c ON c.id_cotacao=a.id_cotacao
WHERE b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND b.status_cip_analise IN (5,6)
AND c.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND c.status_cip_input IN (9,10)  
AND a.PRAZO_DIAS='Dentro do prazo' AND a.TIPO_COTACAO='Principal'  OR b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' AND b.status_cip_analise IN (5,6)
AND c.dt_tratamento_input BETWEEN '$data_1' AND '$data_2' AND c.status_cip_input IN (9,10) AND a.PRAZO_DIAS='Fora do prazo' AND a.TIPO_COTACAO='Principal' 
GROUP BY data_tratamento,a.PRAZO_DIAS,a.TIPO_DE_LINHA,revisao ";


$acao_op3 = mysql_query($sql3,$conecta) or die (mysql_error());

while($linha3=mysql_fetch_array($acao_op3)){

/*
if($linha['SLA_DIAS'] == $linha['dia']){

  //echo "igual";
 $linha['VENCIMENTODIAS'] = "1.Vence Hoje"; 

}
if($linha['SLA_DIAS']  == 1 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS'] ="2.Vence D+1";
}

if($linha['SLA_DIAS']   == 2){

  //echo "nao é igual";

  $linha['VENCIMENTODIAS'] ="3.Vence D+2";
}

if($linha['SLA_DIAS']  >= 3 ){

  //echo "nao é igual";

 $linha['VENCIMENTODIAS']  ="4.Vence D>2";
}*/





if($linha3['PRAZO_DIAS'] == 'Dentro do prazo'){
$totaldentro=$linha3['total'];
}

if($linha3['PRAZO_DIAS'] == 'Fora do prazo'){
$totalfora=$linha3['total'];
}


$totalsla=($totaldentro/$linha3['total'])*100;

$totalsla2=substr($totalsla,0,5);

//$totalsla2=$totaldentro;


$insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                        )VALUES(
                                        '"."Sla - "." ".utf8_encode($linha3['TIPO_DE_LINHA'])." "."(Dentro do prazo)"."',
                                        '".$totaldentro."',
                                        '".$linha3['data_tratamento']."',
                                        '".$linha3['PRAZO_DIAS']."',
                                        '".$linha3['VENCIMENTODIAS']."',
                                        '".$linha3['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());




 $insert3="INSERT INTO cip_nv.tbl_acumulada (Total,
                                        LINHAS,
                                        MES,
                                        PRAZO_DIAS,
                                        VENCIMENTODIAS,
                                        SETOR_B
                                        )VALUES(
                                        '"."Sla - "." ".utf8_encode($linha3['TIPO_DE_LINHA'])." "."(Fora do prazo)"."',
                                        '".$totalfora."',
                                        '".$linha3['data_tratamento']."',
                                        '".$linha3['PRAZO_DIAS']."',
                                        '".$linha3['VENCIMENTODIAS']."',
                                        '".$linha3['setor']."'
                                        )";

 $result3 = mysql_query($insert3,$conecta) or die(mysql_error());

}


 function criaPivotTable($sql, $nomeRelatorio)
 {
    $p=0;
    $total_geral=array();
    $contLinha=1;
    $contCol=1;
    $consulta = mysql_query($sql) or die(mysql_error());
    
    echo "<table class='lista-clientespivot' border='1'>";

          $num=mysql_num_rows($consulta);
          echo "<tr>";
          echo "<th colspan='$num'>RESUMO ACUMULADO</th>";
          echo "</tr>";
  
    while($campos = mysql_fetch_assoc($consulta)){        

        if($contLinha == 1){

            echo "<tr>";
            foreach(array_keys($campos) as $idx => $vlr){
              
                if($contCol == 1){
                    echo "<th>".$vlr."</th>";
                    $contCol++;
                }else{
                   
                   
                    $vlr = str_replace("_", " ", $vlr);
                    $cabec = "<th>";
                    $cabec .= $vlr;
                    $cabec .= "</th>";

                    echo $cabec;
                }                
            }
            echo "<th>TOTAL</th></tr>";
            $contLinha = 0;                                                
        }
        echo "<tr>";
        $total =0;
        foreach(array_values($campos) as $idx => $vlr){
            if($contLinha == 0){
                echo "<td>";
                $contLinha++;
            }else{
                if(!isset($total_geral[$p])){
                    $total_geral[$p] = 0;
                }
                $total_geral[$p]+= $vlr;
                $total += $vlr;
                echo "<td>";
                $p++;  
            }
           echo $vlr."</td>";
        }
        $contLinha = 0;
        echo "<th>$total</th></tr>";
        if(!isset($total_geral[$p]))
        {
            $total_geral[$p] = 0;
        }
        $total_geral[$p]+= $total;
        $p=0;
    }
 
    echo "</tr>";
    echo "</table>";
            
    unset($consulta);
    unset($sql);

}


mysql_query("SET lc_time_names = 'pt_BR';");
$sql ='call cip_nv.resumo1("bc.Total", "date_format(bc.MES,\'%m/%Y\')", "bc.LINHAS", "cip_nv.tbl_acumulada bc"," bc.MES BETWEEN \''."$data_1".'\' AND \''."$data_2".'\'  ");';
     criaPivotTable($sql, "Tipo de Processo");

 

  mysql_free_result($acao_op2,$acao_op3,$result3);
  mysql_close($conecta);  

  
?>
