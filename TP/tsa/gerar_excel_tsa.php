<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title><?php echo utf8_encode('E-GTQ - Gestão  Tramite Qualidade'); ?></title>
<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="fContestacoes.js"></script>

</head>
<body id="logar">
<?php

	   include "../conexao.php";

ini_set ( 'mysql.connect_timeout' ,  '10000' ); 
ini_set ( 'default_socket_timeout' ,  '10000' );
ini_set('memory_limit', '-1');  
   
$acao = $_POST['acao']; 
$erro = $_POST["erro"];
$analise=$_POST["analise_bko"];
$data_1=$_POST["data_1"];  

function arrumadata($string) {
    if($string == ''){
    $data=substr($string,8,3)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data=substr($string,8,3)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,3)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,3)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}




date_default_timezone_set("Brazil/East");
$data2 = date("d-m-Y");
 $h=date("H");
 $m=date("i");
 $s=date("s");

$data=$data2." ".$h."h-".$m."m-".$s."s";

$Y= date("Y");
$m=date("m");
$i='0';

for($i;$i<= 12;$i++)

$m2=$m-$i;

if(strlen($m2) == 1)
{
$zero='0';
$m2= $zero.$m2;
}
else
{
    $m2;
}

$data3=$Y."-".$m2."-"."01";
?>
<div id="principal">
    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">Erros - <?php echo $_SESSION["nome"]; ?>.</p>
            <center><font><strong><?php echo utf8_encode('Exportação da base geral'); ?></strong></font></center>
<?php
   //Incluir a classe excelwriter
   include("../../tp/excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $nomeArq="relatorios/Base_TSA - ".$data." "."No ".rand(0,999999).".xls";
    $excel=new ExcelWriter($nomeArq);

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
 $myArr=array( 'Nº da monitoria ',
 'Data Auditoria ',
 'Data Correcao ',
 'Pedido ',
 'Qtde de Revisões ',
 'Indice Qualidade ',
 'Operacao ',
 'Parecer Auditoria ',
 'Acao Auditada ',
 'Erro ',
 'Descricao Do Erro ',
 'Ofertas ',
 'Analise Bko ',
 'Manifestacao Bko ',
 'Operador Ofensor ',
 'Analista da Atividade ',
 'Necessario Correcao ',
 'Area de Correcao ',
 'Acao de Correcao ',
 'Status da Correcao '
);
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	
	   include "../conexao.php";
   

  
$data_1 = substr($data_1,6,4)."/".substr($data_1,3,2)."/".substr($data_1,0,2);

if($data_2 <> '')
{
	$data_2 = substr($data_2,6,4)."/".substr($data_2,3,2)."/".substr($data_2,0,2);
}

else
{

	$data_2 = date("Y/m/d");
}	

if($data_1 <> ''){
$sql_consulta="SELECT * FROM base_tsa 
                WHERE `acao de correcao` LIKE '$acao' and 
                      `erro`          LIKE '$erro' and
                      `analise bko`   LIKE '$analise' and
                `datahora - auditoria` BETWEEN '$data_1' and '$data_2' 
                ORDER BY `datahora - auditoria`";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM base_tsa 
                WHERE `acao de correcao` LIKE '$acao' and 
                      `erro`          LIKE '$erro' and
                      `analise bko`   LIKE '$analise'  
                ORDER BY `datahora - auditoria`";
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if ($num == '0'){
	
	

				echo"
			<script type=\"text/javascript\">
			alert('Não consta pedidos com estes critérios');
			javascript: history.go(-1);
			
			</script>
			";
	die;
}
     

   
   if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
      $myArr=array( $n_monitoria = $dado["n_monitoria"],
        $dt_auditoria = $dado["data_hora_auditoria"],
        $pedido = $dado["pedido"],
        $q_revisoes = $dado["qtde de revisões"],
        $i_qualidade =  $dado["indice qualidade"],
        $operacao = $dado["operacao"],
        $parecer = $dado["parecer auditoria"],
        $acao = $dado["acao de correcao"],
        $erro = $dado["erro"],
        $desc_erro = $dado["descricao do erro"],
        $dt_correcao = $dado["data correcao"],
        $desc_oferta = $dado["ofertas"],
        $analise_bko = $dado["analise bko"],   
        $manifestacao = $dado["manifestacao bko"],
        $ofensor = $dado["operador ofensor"],
        $op_correcao = $dado["analista da atividade"],
        $correcao = $dado["necessario correcao"],
        $acao_correcao = $dado["area de correcao"],
        $area_correcao = $dado["acao de correcao"],
        $status_correcao =  $dado["status da correcao"]

                  );
         $excel->writeLine($myArr);
      }
   }
    $excel->close();	
    echo "<hr>
                        <font size='2' color='#666666'>
                            ".utf8_encode('Relatório Atividades gerado com sucesso.')."
                            <a href=\"".$nomeArq."\">
                                Abrir
                            </a>
                        </font>
                      <hr>";
?>
    </div> 
    </div>
</div>
</body>
</html>