<?php @session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css">

 <script>
    <!--
     
    function Carregado() {
      Msg_Carregando.style.display='none';
      pagina.style.display='block';
    }
    -->
    </script>


</head>

<body OnLoad="Carregado()" background="../../tp/img/background.JPG">

    <div id="Msg_Carregando">
      <script>
      <!--
      document.write('<img src = "../img/carregando.gif"> Carregando...')
      -->
      </script>
    </div>

    <script>
    <!--
    document.write('<div id="pagina" style="display: none;">')
    -->
    </script>

<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");

//inicia conexão com o banco de dados
include "../conexao.php";


 ini_set('memory_limit', '-1'); 

//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//Abre o arquivo CSV


$abraArq = fopen("$nome_arquivo", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq)
{
    echo ("<p>Arquivo n&atilde;o encontrado</p>");
}

else
{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    while ($linha = fgetcsv ($abraArq, 4096, ";"))
    {
        if($headerLine)
        {
            $headerLine = false;
        }

        else
        {



if($linha[20] =="")
{
	
}else
{
  $beta=array(
     " "," "," "
   );
   
   
   $alfa=array(
      "'","(",")"
   );
	 
    $linha[20]=str_replace($alfa,$beta,$linha[20]);
}

if ($linha[15]=="RSW1" || $linha[15]=="SCW1" || $linha[15]=="PRW1") {
	$reg="Sul";	
}
if ($linha[15]=="MNW1") {
	$reg="MG";	
}
if ($linha[15]=="RRW1" || $linha[15]=="APW1" || $linha[15]=="PAW1" || $linha[15]=="AMW1" || $linha[15]=="MAW1" ) {
	$reg="Norte";	
}
if ($linha[15]=="RNW1" || $linha[15]=="PEW1" || $linha[15]=="PIW1"  || $linha[15]=="PBW1"  || $linha[15]=="ALW1"  || $linha[15]=="CEW1") {
	$reg="Nordeste";	
}
if ($linha[15]=="BAW1" || $linha[15]=="RJW1" || $linha[15]=="SEW1" || $linha[15]=="ESW1") {
	$reg="Leste";	
}
if ($linha[15]=="SPW1") {
	$reg="SP";	
}
if ($linha[15]=="DFW1" || $linha[15]=="GOW1" || $linha[15]=="MTW1" || $linha[15]=="MSW1" || $linha[15]=="ROW1"  || $linha[15]=="ACW1"  || $linha[15]=="TOW1") {
	$reg="CO";	
}
$data_cadastro = date("Y-m-d");



if ($linha[18]== "3"){
	$filtro_um = "Desbloqueio de OV";
	$filtro_dois = "Erro no Cadastro do Cliente";
}
elseif ($linha[18]== "5"){
	$filtro_um = "Eliminação de OV";
	$filtro_dois = "OV em eliminação";
}
//Alterado de 8 para 10 por solicitação de renan azevedo, em 23/08/2013.
elseif ($linha[18]== "10"){
	$filtro_um = "Sem estoque";
	$filtro_dois = "Sem estoque";
}
elseif ($linha[18]== "ZN"){
	$filtro_um = "Desbloqueio de OV";
	$filtro_dois = "Endereço de entrega Divergente";
}
//Descartado por solicitação de renan azevedo, em 23/08/2013.
/*elseif ($linha[18]== "ZO"){
	$filtro_um = "Desbloqueio de OV";
	$filtro_dois = "Erro CFOP - Nota Fiscal Eletronica";
}*/
elseif ($linha[18]== "ZS"){
	$filtro_um = "Desbloqueio de OV";
	$filtro_dois = "NF Recusada Pelo Sistema";
}
//Descartado por solicitação de renan azevedo, em 23/08/2013.
/*elseif ($linha[18]== "ZX"){
	$filtro_um = "Desbloqueio de OV";
	$filtro_dois = "Troca de Material S/Estoque";
}*/
else{
	$filtro_um = "generico";
	$filtro_dois = "generico";
}
//Alterado de 8 para 10 por solicitação de renan azevedo, em 23/08/2013.
//Excluidos os itens "ZO" e "ZX"por solicitação de renan azevedo, em 23/08/2013.
if ($linha[18]=="3" or $linha[18]=="5" or $linha[18]=="10" or $linha[18]=="ZN" or $linha[18]=="ZS"){
 $valida_erro="ok";
}
else{
	$valida_erro="";
}
if ($reg=="Sul" or $reg=="MG" or $reg=="Leste" or $reg=="Nordeste"){
	$valida_reg="ok";
}
else{
	$valida_reg="";
}
//Acrescentado VPG-LESTE e VPG-Guardião por solicitação de renan azevedo, em 23/08/2013.
if ($linha[24]=="VPG" || $linha[24]=="VPG-LESTE"  || $linha[24]=="VPG-Guardião" ){
	$valida_res="ok";
}
else{
	$valida_res="";
}
///////////////////

$nome=$_SESSION["nome"];
$data_cadastro_comentario = date('d/m/Y');

$comentario = $data_cadastro_comentario." : ".trim($linha[20]);

if ($valida_erro == "ok" and $valida_reg== "ok" and $valida_res== "ok"){	
$concluir="ok";

$seleciona="Select * from diario_sap_bko where ov=$linha[2] and status_tp <> 2";
$resultado = mysql_query($seleciona) or die(mysql_error());
while ($dado= mysql_fetch_array($resultado))
		         {
		         $ov = $dado["ov"];
				 $status = $dado["status_tp"];
				 }
				 
}else
{
	$concluir="";
	$ov="";
	$status=1;
	
}
if(!isset($ov))$ov = "";
if($ov != $linha[2]){
$teste="ok";
}
else{
$teste="";
}

$nome_cadastro = $_SESSION["nome"];
$hora_atual = date ('H:i');
$data_atual = date ('Y-d-m');

if ($concluir == "ok" and $teste=="ok"){	

                   $sql = "INSERT IGNORE INTO diario_sap_bko (
				                                               regional,
															   adabas,
															   pedido,
															   ov,
															   nova_ov,
															   tipo_ov,
															   qtde_linhas_pedido,
															   qtde_linhas_ov,
															   data_do_desbloqueio,
															   motivo,
															   solicitado_por,
															   ofensor,
															   operador,
															   material_antigo,
															   material_novo,
															   tratado_por,
															   status_tp,
															   disc_status_tp,
															   cliente,
															   tipo_de_solicitacao,
															   data_cadastro,
															   comentario,
															   fila,
															   login,
															   nome2,
															   tramite,
															   data_tramite,
															   turno,
															   cadastro_manual,
															   hora_base,
															   data_base,
															   operador_base
															   )
                                                               VALUES ('$reg',
															           '$linha[33]',
																	   '$linha[0]',
																	   '$linha[2]', 
																	   '',
																	   '', 
																	   '',
																	   '', 
																	   '',
																	   '$filtro_dois',
																	   'Central de pedidos',
																	   '',
																	   '',
																	   '',
																	   '',
																	   '$nome',
																	   '1',
																	   'Aberto',
																	   '',
																	   '$filtro_um',
																	   '$data_cadastro',
																	   '$comentario',
																	   1,
																	   'Aguardando Operador',
																	   'Aguardando Operador',
																	   'Aguardando',
																	   '$dt_dia',
																	   'ND',
																	   'Não',
																	   '$hora_atual',
																	   '$data_atual',
																	   '$nome_cadastro'
																	   )";

                   $result = mysql_query($sql) or die(mysql_error());
				   
}
}
}
}
     
echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";

?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_sap.php'">	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>