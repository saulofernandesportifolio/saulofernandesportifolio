<script language="JavaScript">
function abrirg2(URL) {
 
  var width = 10760;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script> 

<?php

$data_1=arrumadata($data_1);
$data_2=arrumadata($data_2);






/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost2 = '10.119.243.23:3306'; // endereco do servidor de banco de dados
$dbuser2 = 'root'; // login do banco de dados
$dbpass2 = 'atento'; // senha
//$dbpass = ''; // senha
$dbname2 = 'cip_nv'; // nome do banco de dados a ser usado
$conecta2 = mysql_connect($dbhost2, $dbuser2, $dbpass2, $dbname2);
$seleciona2 = mysql_select_db($dbname2);
$destroittabela2="DROP TABLE IF EXISTS tbl_acumulada_venc;";
$destroittabela3 = mysql_query($destroittabela2, $conecta2 );
$sqlcriatabela2 = "CREATE TABLE IF NOT EXISTS tbl_acumulada_venc (Tipo_de_Processo VARCHAR(255), 
                                                                 Fora_do_Prazo INT(255),
                                                                 Dentro_do_Prazo INT(255),
                                                                 Vence_Hoje INT(255),
                                                                 Vence_D1 INT(255),
                                                                 Vence_D2 INT(255),
                                                                 Vence_DM2 INT(255)
                                                                 );";


 $criatabela2 = mysql_query($sqlcriatabela2, $conecta2 );

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


$sql2="CALL cip_nv.SLA_TB_VENCIMENTO('{$data_1}','{$data_2}')";
$acao_op2 = mysql_query($sql2,$conecta2) or die (mysql_error());

/*final total geral*/

function geraTabela($rs, $headers,$data_1,$data_2)
   {
      $s = "<table class='lista-clientesdashboard' cellspacing='0' cellpadding='0'>";
      $s.="<tr>";
      $s.="<th colspan='8'>Visao SLA</th>";
      $s.="</tr>";
    $s.= "<tr>";
    foreach ($headers as $header)   {
      $s.=  "<th>$header</th>";
  
    }
 
    $s.= "</tr>";      
    while ($row = mysql_fetch_object($rs)){
      $s.= "<tr>";
      foreach ($row as $data){
        if($data == '1.Analise documentacao'){
           $data="Análise documentacao";
           $linkf="<td><a href=javascript:abrirg2('site/forms/formfiltro_visao.php?filtrar=analise&data_1=$data_1&data_2=$data_2');>$data</a></td>";
        
        }elseif($data == '2.Ilha de Input'){
           $data="Ilha de Input";
           $linkf="<td><a href=javascript:abrirg2('site/forms/formfiltro_visao.php?filtrar=input&data_1=$data_1&data_2=$data_2');>$data</a></td>";
        
        }elseif($data == '3.Analise de input'){
           $data="Análise de input";
           $linkf="<td><a href=javascript:abrirg2('site/forms/formfiltro_visao.php?filtrar=auditoria&data_1=$data_1&data_2=$data_2');>$data</a></td>";
        
        }elseif($data == '4.Correcao Input'){
           $data="Correção Input";
          $linkf="<td><a href=javascript:abrirg2('site/forms/formfiltro_visao.php?filtrar=correcao&data_1=$data_1&data_2=$data_2');>$data</a></td>";
        
        }elseif($data == 'Total Geral'){
           $data="Total Geral";
          $linkf="<td><a href=javascript:abrirg2('site/forms/formfiltro_visao_tl.php?&data_1=$data_1&data_2=$data_2');>$data</a></td>";
        
        }else{
          $linkf="<td>$data</td>";  
        }
        
        // $s.=  "<td><a href=$linkf>$data</a></td>";
         
         $s.=  $linkf;
  
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
$rs = mysql_query("SELECT * FROM cip_nv.tbl_acumulada_venc GROUP BY Tipo_de_Processo ");
$headers = array('Tipo_de_Processo','Fora_do_Prazo','Dentro_do_Prazo','Vence_Hoje','Vence_D+1','Vence_D+2','Vence_D>2'); //

/* Chama a função */
geraTabela($rs, $headers,$data_1,$data_2);

mysql_free_result($acao_op2,$acao_optl,$acao_opb,$result3);
mysql_close($conecta2); 	

?>
