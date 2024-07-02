 

<?php
//$data_1=arrumadata($data_1);
//$data_2=arrumadata($data_2);






/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost4 = '10.119.243.23:3306'; // endereco do servidor de banco de dados
$dbuser4 = 'root'; // login do banco de dados
$dbpass4 = 'atento'; // senha
//$dbpass = ''; // senha
$dbname4 = 'cip_nv'; // nome do banco de dados a ser usado
$conecta4 = mysql_connect($dbhost4, $dbuser4, $dbpass4, $dbname4);
$seleciona4 = mysql_select_db($dbname4);
$destroittabela4="DROP TABLE IF EXISTS tbl_acumulada_visaoempz;";
$destroittabela5 = mysql_query($destroittabela4, $conecta4 );
$sqlcriatabela4= "CREATE TABLE IF NOT EXISTS tbl_acumulada_visaoempz (Tipo_de_Processo VARCHAR(255), 
                                                                 Dentro_do_Prazo INT(255),
                                                                 Em_Tratativa INT(255),
                                                                 Aguardando_Chamado INT(255),
                                                                 Pendente_Chamado INT(255)
                                                                 );";


 $criatabela4 = mysql_query($sqlcriatabela4, $conecta4 );

// inicia a conexao ao servidor de banco de dados
/*if(! $conecta2 )
{
  die("<br />Nao foi possivel conectar: " . mysql_error());
}
echo "<br />Conexao realizada!";

// seleciona o banco de dados no qual a tabela vai ser criada
if (! $seleciona2)
{
  die("<br />Nao foi possivel selecionar o banco de dados $dbname");
}
echo "<br />selecionado o banco de dados $dbname";

// finalmente, cria a tabela 
if(! $criatabela2 )
{
  die("<br />Nao foi possivel criar a tabela: " . mysql_error());
}
echo "<br />A tabela foi criada!";
//SUBSTRING(a.criado_em,1,10) BETWEEN '$data_1' AND '$data_2' OR b.dt_tratamento_analise BETWEEN '$data_1' AND '$data_2' ?*/

/************inicio bloco em tratativa *******************/

 
 $sqlb="CALL cip_nv.SLA_TB_VISAO_TB1('{$data_1}','{$data_2}')";
$acao_opb = mysql_query($sqlb,$conecta4) or die (mysql_error());
 

function geraTabela3($rsvisao, $headersvisao)
   {
      $s = "<table class='lista-clientesdashboard' cellspacing='0' cellpadding='0'>";
      $s.="<tr>";
      $s.="<th colspan='5'>Visao Atento</th>";
      $s.="</tr>";
    $s.= "<tr>";
    foreach ($headersvisao as $headervisao){
      $s.=  "<th>$headervisao</th>";
    }
 
    $s.= "</tr>";      
    while ($row = mysql_fetch_object($rsvisao)){
      $s.= "<tr>";
      foreach ($row as $data){
        if($data == '1.Analise documentacao'){
           $data="Análise documentacao";
        }
        if($data == '2.Ilha de Input'){
           $data="Ilha de Input";
        }
        if($data == '3.Analise de input'){
           $data="Análise de input";
        }
        if($data == '4.Correcao Input'){
           $data="Correção Input";
        }

        $s.=  "<td>$data</td>";
      }     
      $s.= "</tr>";            
    }
 
    $s.= "</table>";   
 
    echo $s;
   }



/* Conecta com o banco de dados */ 
//mysql_connect('localhost', 'root', 'Emprez@sVs20') or die('Erro ao conectar');
//mysql_select_db('cip_nv') or die('Erro ao selecionar banco de dados');
 
/* Executa a query */
$rsvisao = mysql_query("SELECT Dentro_do_Prazo,Em_Tratativa,Aguardando_Chamado,Pendente_Chamado FROM cip_nv.tbl_acumulada_visaoempz GROUP BY Tipo_de_Processo ");
$headersvisao = array('Dentro_do_Prazo','Em_Tratativa','Aguardando_Chamado','Pendente_Chamado'); 

/* Chama a função */
geraTabela3($rsvisao, $headersvisao);
   

mysql_close($conecta4);	

?>
