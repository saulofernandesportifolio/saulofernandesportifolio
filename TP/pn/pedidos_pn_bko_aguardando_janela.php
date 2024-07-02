<?php   
@session_start(); 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<p>
<?php
//Testa se o perfil está correto.

	if($_SESSION["pn_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>
<?php
include "../../tp/conexao.php";

$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 //$data_dia= date("y/m/d"); 
 
include "../../tp/pn/pn_fila_guardando_janela.php";


$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());

$num_ = mysql_num_rows($acao_pedidos); 

?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div>
    
      <div id="conteudo" >
        
        <p id="p_padrao">Você tem <?php echo "$num" ?> Pedidos de Portabilidade</p>
      <?php          
	  
	                               
echo "<table id = \"conteudo_pn\" align=\"center\" border=\"0\" bgcolor=\"#999999\">
        <tr>
		<td id=\"t_td\" width=\"12%\">
         <strong><font color=\"#000000\">Pedido</font></strong>
         </td>
         <td id=\"t_td\" width=\"5%\"><font color=\"#000000\">
         <strong>Regional</font></strong>
         </td>
		 <td id=\"t_td\" width=\"10%\">
         <strong><font color=\"#000000\">Data</font></strong>
         </td>
         <td id=\"t_td\" width=\"10%\">
         <strong><font color=\"#000000\">Status Pedido</font></strong>
		 </td>
         <td id=\"t_td\" width=\"20%\">
         <strong><font color=\"#000000\">Cliente</font></strong>
         </td>
		 <td id=\"t_td\" width=\"3%\">
         <strong><font color=\"#000000\">Canal</font></strong>
         </td> 
		 <td id=\"t_td\" width=\"3%\">
         <strong><font color=\"#000000\">Data Janela</font></strong>
         </td>          
		 <td id=\"t_td\" width=\"3%\">
         <strong><font color=\"#000000\">TMO</font></strong>
         </td>                            
</tr>
 ";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
       $cor= "#FFFFFF";
			while ($dado=mysql_fetch_array($acao_pedidos))
		         {
				
				 $id = $dado["id_pn"];
				 $regional = $dado["regional"];
				 $data_inicial = $dado["data_inicial"];
				 $numero_pedido = $dado ["numero_pedido"];
				 $revisao = $dado["revisao"];
				 $status_pedido = $dado["status_pedido"];
				 $nome_cliente = $dado ["nome_cliente"];
				 $ultima_atualizacao_status = $dado["ultima_atualizacao_status"];
				 $codigo_adabas = $dado["codigo_adabas"];
				 $cpf_cnpj_cliente = $dado["cpf_cnpj_cliente"];
                 $canal = $dado["canal"];
				 $pn = $dado["pn"];
				 $data_tramite = $dado["data_tramite"];
                 $data_janela = $dado["data_janela"];
		
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_tramite";


$data_atual = date("Y-m-j"); 
$data1=explode('-', $data_atual);
$data_atu= $data1[2];
//echo "$data_americano";

$data2=$data_americano;
$data_cad1= $data2[2];
$sla = $data_atu - $data_cad1;
if ($sla >=3){
	$tempo_sla= "<font color='#FF0000'><b>$sla</b></font>";
}
else{
	$tempo_sla = $sla;
}				 
				 
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_inicial";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_inicial2 = $data;
//$linha['visao_ilha']=$visao_ilha2;

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$data_janela";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$data_janela2 = $data;
//$linha['visao_ilha']=$visao_ilha2;				 

 if($cor == "#CCCCCC"){
                     $cor= "#FFFFFF";
                      }else{
                      $cor= "#CCCCCC";
					  }


				
				echo "<tr bgcolor=\"$cor\">
             
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\"><a href=\"../../tp/pn/pn_bko.php?&id=$id\">$numero_pedido</font></a></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$regional</font></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$data_inicial2</font></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$status_pedido</font></td> 
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$nome_cliente</font></td>
				  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$canal</font></td>
				  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$data_janela2</font></td>
				  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$tempo_sla</font></td>
               </tr>";
               
               
               
         
				 }
				  echo "</table>";   

			 ?>
   
        </div>
        
    </div>
    
</div>
</body>
</html>