 

<?php
//$data_1=arrumadata($data_1);
//$data_2=arrumadata($data_2);






/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost5 = '10.119.243.23:3306'; // endereco do servidor de banco de dados
$dbuser5 = 'root'; // login do banco de dados
$dbpass5 = 'atento'; // senha
//$dbpass = ''; // senha
$dbname5 = 'cip_nv'; // nome do banco de dados a ser usado
$conecta5 = mysql_connect($dbhost5, $dbuser5, $dbpass5, $dbname5);
$seleciona5 = mysql_select_db($dbname5);
$destroittabela5="DROP TABLE IF EXISTS tbl_acumulada_slaempz;";
$destroittabela6 = mysql_query($destroittabela5, $conecta5 );
$sqlcriatabela5= "CREATE TABLE IF NOT EXISTS tbl_acumulada_slaempz (Tipo_de_Processo VARCHAR(255), 
                                                                    Total_Tratamento INT(255),
                                                                    Dentro VARCHAR(255),
                                                                    Fora VARCHAR(255),
                                                                    Total_Backlog INT(255),
                                                                    Dentro_do_prazo INT(255),
                                                                    Dentrofiltro VARCHAR(255),
                                                                    Forafiltro VARCHAR(255)
                                                                    );";


 $criatabela5 = mysql_query($sqlcriatabela5, $conecta5 );

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


$sqlb="CALL cip_nv.cria_consulta_slaempz_tipo_de_processodpfp()";
$acao_opb = mysql_query($sqlb,$conecta5) or die (mysql_error());


function geraTabela4($rssla, $headerssla)
   {
      $s = "<table class='lista-clientesdashboard' cellspacing='0' cellpadding='0'>";
      $s.="<tr>";
      $s.="<th colspan='5'>Sla</th>";
      $s.="</tr>";
    $s.= "<tr>";
    foreach ($headerssla as $headersla){
      $s.=  "<th>$headersla</th>";
    }
 
    $s.= "</tr>";      
    while ($row = mysql_fetch_object($rssla)){
      $s.= "<tr>";
      foreach ($row as $data){
        $s.=  "<td>$data</td>";
      }     
      $s.= "</tr>";            
    }
 
    $s.= "</table>";   
 
    echo $s;
   }






/*final total geral*/



/* Conecta com o banco de dados */ 
//mysql_connect('localhost', 'root', 'Emprez@sVs20') or die('Erro ao conectar');
//mysql_select_db('cip_nv') or die('Erro ao selecionar banco de dados');
 
/* Executa a query */
$rssla = mysql_query("SELECT Total_Tratamento,Dentro,Fora FROM cip_nv.tbl_acumulada_slaempz GROUP BY Tipo_de_Processo ");
$headerssla= array('Total_Tratamento','Dentro','Fora'); 

/* Chama a função */
geraTabela4($rssla,$headerssla);
   
	mysql_close($conecta5);	
?>
