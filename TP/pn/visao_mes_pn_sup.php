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

<script language="JavaScript">
function abrir(URL) {
 
  var width = 150;
  var height = 250;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=680,height=800');
 
}
</script>


</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["SUP_PN"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
		
$nome = $_SESSION["nome"];
//$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
	}
include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){
					    
$login = $dado["login"];
						}
//echo $login;

;

?>

	
<?php	
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-");
  $dt_mes = date("m/Y");
  
 // $dt_dia = '2013-01-';
  //$dt_mes = '01/2013';
  //echo $dt_dia ;
 
  
   include("../../tp/conexao.php");
  $atv_op2="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%'";
                        $acao_op2=mysql_query($atv_op2,$conecta);
					$dado2= mysql_fetch_array($acao_op2);
					    {
		                 $data_tramite2= $dado2['data_tramite2'];
						  if($data_tramite2 == '')
						 {
						$data_tramite2= '';
						$data_tramite3= '';
						 }
						 else
						 {
						 $data_americano = "$data_tramite2"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_tramite3 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
					     }
						}
?>                     

         <p id="p_padrao" align="center">Visão PN Geral Mês : <?php echo $dt_mes?></p>
        <hr width="104%">          
             <?php
			 //tabela por regional - inicio
			 
					include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					
						 }
						
						
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,data_inicial,login,disc_status_tp,regional FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' GROUP BY regional";
                        $acao_op=mysql_query($atv_op,$conecta);
						
					          
		echo "<table bgcolor='D6CA98' align='left' border='0' class='combobox_padrao'>
		<tr>
		<td id=\"t_td\" width=\"1%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"1%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login3 = $dado['login'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$numero_pedido = $dado['numero_pedido'];
									
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$regional</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$numero_pedido</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
					
				echo "</table>";  
								
				 //tabela por regional - fim 
				 
			 	?>
     
                   <?php
				   
				//tabela por status_pedido - inicio    
				   
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               				       
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,data_inicial,login,disc_status_tp,status_pedido FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' GROUP BY status_pedido";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0' class='combobox_padrao_grande'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Status Pedido</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login4 = $dado['login'];
						$status_pedido= $dado['status_pedido'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial= $dado['data_inicial'];
						$numero_pedido = $dado['numero_pedido'];
						
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$status_pedido</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$numero_pedido</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
					echo "<br>";
				//tabela por status_pedido - fim   
			 	?>
             <br>
              <?php
			  //tabela erro - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               
				        $login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,data_inicial,login,disc_status_tp,erro FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' GROUP BY erro";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Erro</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login5 = $dado['login'];
						$erro= $dado['erro'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$numero_pedido = $dado['numero_pedido'];
						
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}
					
					
					if($erro == ""){
						$valida_erro = "Aguardando";
					}else $valida_erro = $erro;
					
				echo "<tr bgcolor=\"$cor\">
             		<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$valida_erro</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$numero_pedido</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>"; 
				
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";				echo "<br>";
				echo "<br>";
				echo "<br>";				echo "<br>";
				echo "<br>";
						//tabela erro - fim
		  
			 	?>
            <br>
<br>
<br>

            
           <?php
			  //tabela por disc_status_tp (tipo)- inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               
				     
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,data_inicial,login,disc_status_tp FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' GROUP BY disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0' class='combobox_padrao'>
		<tr>
		<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
        </td>
       	<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login6 = $dado['login'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$numero_pedido = $dado['numero_pedido'];
						
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$disc_status_tp</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$numero_pedido</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>"; 
					
				//tabela por disc_status_tp(tipo)- fim
				  
			 	?>
           <?php
			  //tabela por tramite- inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,data_inicial,login,disc_status_tp,tramite FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' GROUP BY tramite";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='center' border='0' class='combobox_padrao_grande'>
		<tr>
		<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">Tramite</font></strong>
        </td>
       	<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login7 = $dado['login'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$tramite = $dado['tramite'];
						$numero_pedido = $dado['numero_pedido'];
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tramite</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$numero_pedido</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>"; 
				
				//tabela por tramite - fim
				  
			 	?>
              <br><br> <br><br>
                        
            <?php
			//tabela por operador - inicio
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					    $dado= mysql_fetch_array($acao_op);
					     {
		                $login2=mysql_num_rows($acao_op);
						 }
						
                        $atv_op="SELECT COUNT(numero_pedido)as numero_pedido,regional,login,disc_status_tp,data_inicial,tramite,nome2,data_tramite2,turno FROM controle_pn_bko WHERE data_tramite2 like '%$dt_dia%' and tramite = 'Tratando' or data_tramite2 like '%$dt_dia%' and tramite = 'Tratado' or data_tramite2 like '%$dt_dia%' and tramite = 'Aguardando' GROUP BY login, disc_status_tp DESC";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"35%\">
        <strong><font color=\"#000000\">Operador</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Data Tramite</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Tramite</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Data Inicial</font></strong>
        </td>
		 <td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Turno</font></strong>
        </td>
        <td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>		 
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login8 = $dado['login'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_inicial = $dado['data_inicial'];
						$tramite = $dado['disc_status_tp'];
						$nome2 = $dado['nome2'];
						$data_tramite2 = $dado['data_tramite2'];
						$turnoo = $dado['turno'];
						$numero_pedido = $dado['numero_pedido'];
						
						
				$data_americano = "$data_inicial"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_inicial2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
				$data_americano2 = "$data_tramite2"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				
				$data_tramite3 = $data2;
				$pesquisa_data='mes';									
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$nome2</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$data_tramite3</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$tramite</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$data_inicial2</td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$turnoo</td>  
					<td id=\"t_td1\" bgcolor=\"$cor\">";
					?>
					
<a href="javascript:abrir('pedidos_pn_detalhes_sup.php?&login_usuario=<?php echo $nome2 ?>&tramite=<?php echo $tramite ?>&turnoo=<?php echo $turnoo ?>&pesquisa_data=<?php echo $pesquisa_data ?>');"><?php echo $numero_pedido ?></a>

					<?php
					echo "</td>
					</tr>";
         
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    ";
				echo "</table>";
				//tabela por operador - fim   
			 	?>

</body>
</html>