<?php   
@session_start(); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>


<title>E - GTQ  - Gestão Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" coment="5; URL=pedidos_indireto_bko.php" >
</head>

<body>

<p>
<?php
//Testa se o perfil está correto.

	if($_SESSION["operador_direto"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
<?php
include "../../tp/conexao.php";

/*
if ($_COOKIE["atualizada"] == "atualizar"){
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=pedidos_direto_bko.php'>";
setcookie("atualizada");
}*/
$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 //$data_dia= date("y/m/d"); 
 
include "../../tp/direto/direto_fila.php";

$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());

$num_ = mysql_num_rows($acao_pedidos); 

?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div>
    
      <div id="conteudo" >
        
        <p id="p_padrao">Você tem <?php echo "$num" ?> Pedidos</p>
      <?php          
	  
	                               
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
			while ($dado=mysql_fetch_array($acao_pedidos))
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
             
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\"><a href=\"../../tp/direto/reversao_direto.php?&id=$id\">$pedido</font></a></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$regional</font></td>
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$criado_em</font></td> 
                  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">$revisao</font></td>
				  <td id=\"t_td\" bgcolor=\"$cor\"><font size=\"2\">tmo</font></td>
	               </tr>";
				}
				  echo "</table>";   
			 ?>
        </div>
    </div>
</div>
</body>
</html>