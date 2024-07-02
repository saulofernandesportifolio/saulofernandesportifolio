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
   
$regional = $_POST['regional']; 
$tramite = $_POST["tramite"];
$turno=$_POST["turno2"];
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
    $nomeArq="relatorios/Base_SAP - ".$data." "."No ".rand(0,999999).".xls";
    $excel=new ExcelWriter($nomeArq);

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
 $myArr=array( 'Regional ',
 'Adabas ',
 'Pedido ',
 'Ov ',
 'Nova Ov ',
 'Tipo Ov ',
 'Qtde Linhas Pedido ',
 'Qtde Linhas Ov ',
 'Data Do Desbloqueio ',
 'Motivo ',
 'Solicitado_por ',
 'Ofensor ',
 'Operador ',
 'Material Antigo ',
 'Material Novo ',
 'Tratado Por ',
 'Status Tp ',
 'Disc Status Tp ',
 'Cliente ',
 'Tipo De Solicitacao ',
 'Data Cadastro ',
 'Comentario ',
 'Id Tabelao ',
 'Fila ',
 'Login ',
 'Nome2 ',
 'Tramite ',
 'Data Tramite ',
 'Turno ',
 'Cadastro Manual ',
 'Motivo Pendente ',
 'Enviado Para ',
 'Acao OV '

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
$sql_consulta="SELECT * FROM diario_sap_bko WHERE ($regional) and ($tramite) and ($turno) and data_cadastro BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM diario_sap_bko WHERE ($regional) and ($tramite) and ($turno) and data_cadastro BETWEEN '$data_1' and '$data_2' ORDER BY data_cadastro";
$sql=$sql_consulta; 
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
      $myArr=array($regional=$linha['regional'],
                  $adabas=$linha['adabas'],
                  $pedido=$linha['pedido'],
                  $ov=$linha['ov'],
                  $nova_ov=$linha['nova_ov'],
                  $tipo_ov=$linha['tipo_ov'],
                  $qtde_linhas_pedido=$linha['qtde_linhas_pedido'],
                  $qtde_linhas_ov=$linha['qtde_linhas_ov'],
                  $data_do_desbloqueio=$linha['data_do_desbloqueio'],
                  $motivo=$linha['motivo'],
                  $solicitado_por=$linha['solicitado_por'],
                  $ofensor=$linha['ofensor'],
                  $operador=$linha['operador'],
                  $material_antigo=$linha['material_antigo'],
                  $material_novo=$linha['material_novo'],
                  $tratado_por=$linha['tratado_por'],
                  $status_tp=$linha['status_tp'],
                  $disc_status_tp=$linha['disc_status_tp'],
                  $cliente=$linha['cliente'],
                  $tipo_de_solicitacao=$linha['tipo_de_solicitacao'],
                  $data_cadastro=$linha['data_cadastro'],
                  $comentario=$linha['comentario'],
                  $id_tabelao=$linha['id_tabelao'],
                  $fila=$linha['fila'],
                  $login=$linha['login'],
                  $nome2=$linha['nome2'],
                  $tramite=$linha['tramite'],
                  $data_tramite=$linha['data_tramite'],
                  $turno=$linha['turno'],
                  $cadastro_manual=$linha['cadastro_manual'],
                  $motivo_pendente=$linha['motivo_pendente'],
                  $enviado_para=$linha['enviado_para'],
                  $acao_ov=$linha['acao_ov']
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