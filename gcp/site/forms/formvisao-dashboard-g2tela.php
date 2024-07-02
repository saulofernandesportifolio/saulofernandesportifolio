

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv="refresh" content="5;url=formvisao_tela2.php"/>


<script language="JavaScript">
function abrirg2(URL) {
 
  var width = 10760;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script> 


    </head>

<body style="background-image:url(../img/imagem_visao_cip1.png); background-repeat: no-repeat; background-size: 155%">

<?php

//habilita controle de erros
error_reporting(0);
ini_set("display_errors", 0 );

$data_1=arrumadata($data_1);
$data_2=arrumadata($data_2);


$ip='10.119.243.23:3306';



/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
$dbhost23 = $ip; // endereco do servidor de banco de dados
$dbuser23 = 'root'; // login do banco de dados
$dbpass23 = 'atento'; // senha
//$dbpass = ''; // senha
$dbname23 = 'cip_nv'; // nome do banco de dados a ser usado
$conecta23 = mysql_connect($dbhost23, $dbuser23, $dbpass23, $dbname23);
$seleciona23 = mysql_select_db($dbname23);
$destroittabela23="DROP TABLE IF EXISTS tbl_acumulada_venc2;";
$destroittabela34 = mysql_query($destroittabela23, $conecta23 );
$sqlcriatabela23= "CREATE TABLE IF NOT EXISTS tbl_acumulada_venc2 (Tipo_de_Processo VARCHAR(255), 
                                                                 Fora_do_Prazo INT(255),
                                                                 Dentro_do_Prazo INT(255),
                                                                 Vence_Hoje INT(255),
                                                                 Vence_D1 INT(255),
                                                                 Vence_D2 INT(255),
                                                                 Vence_DM2 INT(255)
                                                                 );";


 $criatabela23 = mysql_query($sqlcriatabela23, $conecta23 );

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


$sql2="CALL cip_nv.SLA_TB_VENCIMENTO2('{$data_1}','{$data_2}')";
$acao_op2 = mysql_query($sql2,$conecta23) or die (mysql_error());

/*final total geral*/

function geraTabela($rs, $headers,$data_1,$data_2)
   {

      $s = "<table width='0%'  height='50%' style='font:60px important; ' >";
      $s.="<tr>";
      $s.="<th colspan='8' bgcolor='#FFFFFF'><p align='center'><font color='#337ab7' size='8'>Análise documentação</font></p></th>";
      $s.="</tr>";
      $s.= "<tr>";

     
    foreach ($headers as $header){
     $cor="#337ab7";

     
      $s.=  "<th bgcolor=$cor><font color='#FFFFFF'>$header</font></th>";

    }
 
    $s.= "</tr>";    

    $cor="#FFFFFF";

    while ($row = mysql_fetch_object($rs)){

      $cor = ($cor == "#FFFFFF") ? "#e9e9e9" : "#FFFFFF";


      $s.= "<tr>";

      foreach ($row as $data){
  
        
        if($data == '1.Analise documentacao'){ 
           $data="Análise documentação";
         

           $linkf="<td bgcolor=$cor align='left'>$data</td>";
 
            
                
        }
       if($data == 'Total Geral'){ 
                  
      
            $cor='#60646D';
            $color='#FFFFFF';       
        
        }
    
        $linkf="<td bgcolor=$cor align='center'><b><font color=$color>$data</font></b></td>";
         
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
$rs = mysql_query("SELECT Fora_do_Prazo,Dentro_do_Prazo,Vence_Hoje,Vence_D1,Vence_D2,Vence_DM2 FROM cip_nv.tbl_acumulada_venc WHERE Tipo_de_Processo ='1.Analise documentacao' GROUP BY Tipo_de_Processo ");
$headers = array('Fora do Prazo','Dentro do Prazo','Vence Hoje','Vence D+1','Vence D+2','Vence D>2'); //

geraTabela($rs, $headers,$data_1,$data_2);

mysql_free_result($acao_op2,$acao_optl,$acao_opb,$result3);
mysql_close($conecta23); 	



?>

<table style="margin-top: 100px; background-color:#ffffff;" border="0"  >
<td width="15%"><img src="../img/logoempznovo.png" height="100" width="130"></td>
<?php date_default_timezone_set("Brazil/East");?>
<td width="70%"><font size='9'><b><?php include('../../data/data.php'); ?><b></font><td>
<td width="70%"><div align="right"><img src="../img/logoemprezanovo.gif" height="90" width="90"></div></td>

</table>

