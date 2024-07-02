<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title><?php echo utf8_encode('E-GTQ - Gest�o  Tramite Qualidade'); ?></title>
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
            <center><font><strong><?php echo utf8_encode('Exporta��o da base geral'); ?></strong></font></center>
<?php
   //Incluir a classe excelwriter
   include("../../tp/excelwriter.inc.php");

   //Voc� pode colocar aqui o nome do arquivo que voc� deseja salvar.
    $nomeArq="relatorios/Base_ERROS - ".$data." "."No ".rand(0,999999).".xls";
    $excel=new ExcelWriter($nomeArq);

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
 $myArr=array('Pedido',
 'Comentario ',
 'Tipo ',
 'Motivo Erro ',
 'Portabilidade ',
 'Cliente ',
 'Status ',
 'Status Do Pedido ',
 'Revisao ',
 'Regional ',
 'Criado_em ',
 'Alta ',
 'Troca ',
 'Transferencia Titularidade ',
 'Data Correcao ',
 'Ofensor ',
 'Adabas ',
 'Usuario ',
 'Id Tabelao ',
 'Fila ',
 'Nome2 ',
 'Tramite ',
 'Data Tramite ',
 'Turno ',
 'Cnpj ',
 'Status Tp ',
 'Disc Status Tp ',
 'Vpe ',
 'Cnpj Raiz ',
 'Operador ',
 'Linhas ',
 'Cadastro Manual ',
 'tipo_vivocorp'
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
$sql_consulta="SELECT * FROM base_erros WHERE ($regional) and ($tramite) and ($turno) and criado_em BETWEEN '$data_1' and '$data_2' ORDER BY criado_em";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}

if($data_1 == ''){
$sql_consulta="SELECT * FROM base_erros WHERE ($regional) and ($tramite) and ($turno) and criado_em BETWEEN '$data_1' and '$data_2' ORDER BY crido_em";
$sql=$sql_consulta; 
$resultado = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($resultado);
$num;
}
 if ($num == '0'){
	
	

				echo"
			<script type=\"text/javascript\">
			alert('N�o consta pedidos com estes crit�rios');
			javascript: history.go(-1);
			
			</script>
			";
	die;
}
     

   
   if($resultado==true){
   
      while($linha = mysql_fetch_array($resultado)){
      $myArr=array($pedido=$linha['pedido'],
                  $comentario=$linha['comentario'],
                  $tipo=$linha['tipo'],
                  $motivo_erro=$linha['motivo_erro'],
                  $portabilidade=$linha['portabilidade'],
                  $cliente=$linha['cliente'],
                  $status=$linha['status'],
                  $status_do_pedido=$linha['status_do_pedido'],
                  $revisao=$linha['revisao'],
                  $regional=$linha['regional'],
                  $criado_em=arrumadata($linha['criado_em']),
                  $alta=$linha['alta'],
                  $troca=$linha['troca'],
                  $transferencia_titularidade=$linha['transferencia_titularidade'],
                  $data_correcao=arrumadata($linha['data_correcao']),
                  $ofensor=$linha['ofensor'],
                  $adabas=$linha['adabas'],
                  $usuario=$linha['usuario'],
                  $id_tabelao=$linha['id_tabelao'],
                  $fila=$linha['fila'],
                  $nome2=$linha['nome2'],
                  $tramite=$linha['tramite'],
                  $data_tramite=arrumadata($linha['data_tramite']),
                  $turno=$linha['turno'],
                  $cnpj=$linha['cnpj'],
                  $status_tp=$linha['status_tp'],
                  $disc_status_tp=$linha['disc_status_tp'],
                  $vpe=$linha['vpe'],
                  $cnpj_raiz=$linha['cnpj_raiz'],
                  $operador=$linha['operador'],
                  $linhas=$linha['linhas'],
                  $cadastro_manual=$linha['cadastro_manual'],
                  $tipo_vivocorp=$linha['tipo_vivocorp']
                  );
         $excel->writeLine($myArr);
      }
   }
    $excel->close();	
    echo "<hr>
                        <font size='2' color='#666666'>
                            ".utf8_encode('Relat�rio Atividades gerado com sucesso.')."
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