<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<script src="../../tp/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../tp/jquery.popupWindow.js" type="text/javascript"></script>

</head>
<body id="logar" background="../../tp/img/background.JPG">


<?php
//Testa se o perfil está correto.

	if($_SESSION["supervisor_direto"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>



      <?php          

 $turno1 = $turnoo;
 $login_usuario1 = $login_usuario;
 $tramite1 = $tramite;


include("../../tp/conexao.php");


 $pesquisa_data1 = $pesquisa_data;
 $dt_dia = date("Y-m-d");
include("../../tp/conexao.php");

if ($pesquisa_data1 == 'mes'){
	 $dt_dia = date("Y-m-");

$atv_op="SELECT * FROM ilha_reversao_direto_bko WHERE turno = '$turno1' and usuario = '$login_usuario1' and tramite = '$tramite1' and data_tramite like '%$dt_dia%'";
}else $atv_op="SELECT * FROM ilha_reversao_direto_bko WHERE turno = '$turno1' and usuario = '$login_usuario1' and tramite = '$tramite1' and data_tramite like '%$dt_dia'";
	  
	                               
echo "<table id = \"conteudo_pn\" align=\"center\" border=\"0\" bgcolor=\"#999999\">
        <tr>
		<td id=\"t_td\" width=\"5%\">
         <strong><font color=\"#000000\">Pedido</font></strong>
         </td>
         <td id=\"t_td\" width=\"5%\"><font color=\"#000000\">
         <strong><font color=\"#000000\"> Regional</font></strong>
         </td>
		 <td id=\"t_td\" width=\"5%\">
         <strong><font color=\"#000000\">Data</font></strong>
         </td>
		 <td id=\"t_td\" width=\"5%\">
         <strong><font color=\"#000000\">Revisão</font></strong>
		 </td>
         <td id=\"t_td\" width=\"5%\">
         <strong><font color=\"#000000\">TMO</font></strong>
         </td>                            
</tr>
 ";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
       $cor= "#FFFFFF";
	   $acao_op=mysql_query($atv_op,$conecta);
			while ($dado=mysql_fetch_array($acao_op))
		         {
				
				 $id = $dado["id_reversaoind"];
				 $regional = $dado["regional"];
				 $criado_em = $dado["criado_em"];
				 $pedido = $dado ["pedido"];
				 $revisao = $dado["revisao"];
		
//VARIAVEL COM A DATA NO FORMATO AMERICANO
if ($criado_em <> 0){   
$data_americano2 = "$criado_em";
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("-",$data2);
$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
$criado_em = $data2;
}
else
{
$criado_em = "";
}

 if($cor == "#CCCCCC"){
                     $cor= "#FFFFFF";
                      }else{
                      $cor= "#CCCCCC";
					  }

				echo "<tr bgcolor=\"$cor\">
             
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\"><a href=\"../../tp/direto/direto_bko_sup_detalhe.php?&id=$id\">$pedido</font></a></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$regional</font></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$criado_em</font></td> 
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$revisao</font></td>
				  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">tmo</font></td>
	               </tr>";
				}
				  echo "</table>";   
			

//echo $atv_op;						
?>
</body>
</html>