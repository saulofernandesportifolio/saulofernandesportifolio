<?php   
@session_start();



?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>

<body id="logar">

<?php

include "../../tp/conexao.php";


	if($_SESSION["pn_bko"] == 0 and $_SESSION["SUP_PN"] == 0){  
    echo"
		<script type=\"text/javascript\">
		alert('Você não tem permissão para acessar esta página!');
		document.location.replace('../../tp/logout.php');
		</script>
 		";
	}
	
	
	$tempo = 0;


  set_time_limit($tempo);
  
  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $datapn = date("d/m/Y");
  

  
?>
  
<div id="principal">
<?php
			  
    
//////////////////realiza tratamento nas palavras com acento antes de cadastrar no banco////////////////////////////////////////////////////////////
//$txt=$_POST['erro'];
/*if($_POST["erro"] =="")
{
	
}else
{
//transform($txt);

	
//function transform($txt){
	

  $beta=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",".",";",":","~","^","´","`"
   );
	 
    $erro=str_replace($alfa,$beta,$_POST["erro"]);
	//$omega=strtoupper($gama);
   //$omega=strip_tags($omega);
   //$omega=trim($omega);
  // print_r($gama);
echo "<br>";


}*/

include "../../tp/conexao.php";
    $data_janela = $_POST["data_janela"];
	$aprovacao_pedido = $_POST["aprovacao_pedido"];
	$ordem_manual= $_POST["ordem_manual"];
	$pistolagem_leitura = $_POST["pistolagem_leitura"];
	$data_tramite = $_POST["data_tramite"];
	$status_atlys = $_POST["status_atlys"];
	$status_spn = $_POST["status_spn"];
	$chamado = $_POST["chamado"];
	$erro = $_POST["erro"];
	$lancarplano_acao = $_POST["lancarplano_acao"];
	$lancarerro= $_POST["lancarerro"];
	$tratamento = $_POST["tratamento"];
	
$login = $_SESSION["login"];
$nome = $_SESSION["nome"];
//echo $lancarerro;
$sql_select = "SELECT * FROM controle_pn_bko WHERE id_pn = '$id'";
$acao_select = mysql_query($sql_select,$conecta);
while($linha= mysql_fetch_array($acao_select))
	{
	$plano_acao = $linha["plano_acao"];
	}
 
//////////////plano acao////////////////////////////////////////////////////
$variavel1pa = $plano_acao;
$variavel2pa= "\n".$datapn;
$variavel3pa = $lancarplano_acao;
$variavel4pa = $nome;
$variavel11pa =$variavel1pa.$variavel2pa." "."-"." ".$variavel3pa." "."-"." ".$variavel4pa;

//echo $variavel11pa;

////////////////////////////////////////////////////////////////////////////
$sql_select2 = "SELECT * FROM controle_pn_bko WHERE id_pn = '$id'";
$acao_select2 = mysql_query($sql_select2,$conecta);
while($linha2= mysql_fetch_array($acao_select2))
	{
	$obs_erro   = $linha2["obs_erro"];
	}
//////////////plano acao////////////////////////////////////////////////////
$variavel1oe = $obs_erro;
$variavel2oe= "\n".$datapn;
$variavel3oe = $lancarerro;
$variavel4oe = $nome;
$variavel11oe =$variavel1oe.$variavel2oe." "."-"." ".$variavel3oe." "."-"." ".$variavel4oe;

//echo $variavel11oe;

////////////////////////////////////////////////////////////////////////////

"<br>";
//echo $id;nl2br
	

	//echo $aprovacao_pedido;
	//echo "<br>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////				
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_tramite";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$data_tramite2 = $data;
//echo $data_tramite2;
//echo "<br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////////////////////////////				
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$pistolagem_leitura";

 $data_atualizacao = date('Y-m-d');
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$pistolagem_leitura = $data;
//echo $pistolagem_leitura;
//echo "<br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////////////////////////////				
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$aprovacao_pedido";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$aprovacao_pedido = $data;
//echo $aprovacao_pedido;
//echo "<br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////				
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_janela";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$data_janela = $data;
//echo $data_janela;
//echo "<br>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//echo $erro;

//echo "<br>";

if($tratamento == "Em tratamento")
   {
	$tratamento = "Em tratamento";
	$login = $_SESSION["login"];
	//echo $login;
include "../../tp/conexao.php";

$sql_updatepn="UPDATE controle_pn_bko SET data_tramite       = '$data_tramite2',
                                          data_janela        = '$data_janela',
                                          aprovacao_pedido   = '$aprovacao_pedido',
										  ordem_manual       = '$ordem_manual',
										  pistolagem_leitura = '$pistolagem_leitura',
										  chamado            = '$chamado',
										  erro               = '$erro',
										  plano_acao         = '$variavel11pa',
										  status_atlys       = '$status_atlys',
										  status_spn         = '$status_spn',
										  tratamento         = '$tratamento',
										  obs_erro           = '$variavel11oe',
										  status_tp          = 2,
										  disc_status_tp     = '$tratamento',
										  fila               = 2,
										  data_tramite2      = '$data_atualizacao',
										  login              = '$login'
 										  where id_pn        = '$id'";
$result = mysql_query($sql_updatepn,$conecta);	


	
   }
  
if($tratamento == "Corrigido")
   {
	$tratamento2 = "Corrigido";
	$login = $_SESSION["login"];
	include "../../tp/conexao.php";
	
$sql_updatepn="UPDATE controle_pn_bko SET data_tramite       = '$data_tramite2',
                                          data_janela        = '$data_janela',
                                          aprovacao_pedido   = '$aprovacao_pedido',
										  ordem_manual       = '$ordem_manual',
										  pistolagem_leitura = '$pistolagem_leitura',
										  chamado            = '$chamado',
										  erro               = '$erro',
										  plano_acao         = '$variavel11pa',
										  status_atlys       = '$status_atlys',
										  status_spn         = '$status_spn',
										  tratamento         = '$tratamento',
										  obs_erro           = '$variavel11oe',
										  status_tp          = 3,
										  disc_status_tp     = '$tratamento2',
										  fila               = 3,
										  login              = '$login',
										  data_tramite2      = '$data_atualizacao',
										  tramite            = 'Tratado'
 										  where id_pn        = '$id'";
$result = mysql_query($sql_updatepn,$conecta);	

   }
	echo"
	<script type=\"text/javascript\">
	alert('Cadastro alterado!');
	javascript: history.go(-2);
	</script>
 	";    
//echo $sql_updatepn;
   
?>
    
</div>
</body>
</html>