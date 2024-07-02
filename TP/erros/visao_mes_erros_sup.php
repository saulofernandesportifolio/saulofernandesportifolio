<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../../tp/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
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

	if($_SESSION["adm_erros"] == 0){  
    	
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
  //$dt_dia = "2013-02-";
  //echo $dt_dia ;
 
  
   include("../../tp/conexao.php");
  $atv_op2="SELECT * FROM base_erros WHERE data_tramite like '%$dt_dia%'";
                        $acao_op2=mysql_query($atv_op2,$conecta);
					$dado2= mysql_fetch_array($acao_op2);
					    {
		                 $data_tramite= $dado2['data_tramite'];
						  if($data_tramite == '')
						 {
						$data_tramite= '';
						$data_tramite2= '';
						 }
						 else
						 {
						 $data_americano = "$data_tramite"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_tramite2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
					     }
						}
?>                     

         <p id="p_padrao" align="center">Visão Erros Geral Mês : <?php echo $dt_mes ?></p>
        <hr width="104%">          
             <?php
			 //tabela por regional - inicio
			 
					include("../../tp/conexao.php");
				$atv_op="SELECT * FROM base_erros WHERE data_tramite like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
						
						
                        $atv_op="SELECT COUNT(pedido)as pedido,data_tramite,usuario,disc_status_tp,regional FROM base_erros WHERE data_tramite like '%$dt_dia%' GROUP BY regional";
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
		               
				        $login3 = $dado['usuario'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_tramite'];
						$pedido = $dado['pedido'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$regional</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
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
				   
				//tabela por tipo de solicitação - inicio    
				   
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM base_erros WHERE data_tramite like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(pedido)as pedido,data_tramite,usuario,disc_status_tp,tipo FROM base_erros WHERE data_tramite like '%$dt_dia%' GROUP BY tipo";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0' class='combobox_padrao_grande'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo De Solicitacao</font></strong>
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
		               
				        $login4 = $dado['usuario'];
						$tipo_de_solicitacao= $dado['tipo'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_tramite'];
						$pedido = $dado['pedido'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo_de_solicitacao</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
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
				//tabela por tipo de solicitação - fim   
			 	?>
             <br><br><br><br>
              <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM base_erros WHERE data_tramite like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					
						}
							
                        $atv_op="SELECT COUNT(pedido)as pedido,data_tramite,usuario,disc_status_tp,status_do_pedido FROM base_erros WHERE data_tramite like '%$dt_dia%' GROUP BY status_do_pedido";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Motivo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login5 = $dado['usuario'];
						$motivo= $dado['status_do_pedido'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_tramite'];
						$pedido = $dado['pedido'];
				
					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$motivo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
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
				//tabela por motivo - fim
				  
			 	?>
                
                        <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM erros_pendentes WHERE data_cad like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					
						}
							
                        $atv_op="SELECT COUNT(pedido)as pedido,data_cad,tipo FROM erros_pendentes WHERE data_cad like '%$dt_dia%' GROUP BY tipo";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Atividades pendentes</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $tipo = $dado['tipo'];
						$pedido= $dado['pedido'];

				
					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$pedido</td>
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
				//tabela por motivo - fim
				  
			 	?>
                
  
                <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="select sum(linhas)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					$linha1 = $dado['Linha'];
						}
							
                        $atv_op="select sum(linhas)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '%$dt_dia%' 
group by tipo, disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						         
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr><strong>Linhas pendentes</strong></tr>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">status</font></strong>
        </td>
		       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               

						$disc_status_tp = $dado['disc_status_tp'];
						$linha = $dado['Linha'];
						$tipo = $dado['tipo'];
						

					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$disc_status_tp</td>
					<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$linha</td>
                  	  	</tr>";						
				               
					}
					
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\"></font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$linha1</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				echo "<br>";
				echo "<br>";
				//tabela por motivo - fim
				  
			 	?>
                
                
                
                                <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="select sum(pedido)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
					$linha1 = $dado['Linha'];
						}
							
                        $atv_op="select sum(pedido)as Linha,linhas,tipo,disc_status_tp from base_erros where disc_status_tp <> 'Tratado' and data_tramite like '%$dt_dia%' 
group by tipo, disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						         
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr><strong>Pedidos pendentes</strong></tr>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">status</font></strong>
        </td>
		       	<td id=\"t_td1\" width=\"12%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               

						$disc_status_tp = $dado['disc_status_tp'];
						$linha = $dado['Linha'];
						$tipo = $dado['tipo'];
						

					if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$disc_status_tp</td>
					<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$linha</td>
                  	  	</tr>";						
				               
					}
					
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\"></font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$linha1</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				echo "<br>";
				echo "<br>";
				//tabela por motivo - fim
				  
			 	?>
                                       

                        
            <?php
			//tabela por operador - inicio
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM base_erros WHERE data_tramite like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					    $dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
						
                        $atv_op="SELECT COUNT(pedido)as pedido, regional,usuario,disc_status_tp,criado_em,tramite,nome2,data_tramite,turno FROM base_erros WHERE data_tramite like '%$dt_dia%' and tramite = 'Tratando' or data_tramite like '%$dt_dia%' and tramite = 'Tratado' or data_tramite like '%$dt_dia%' and tramite = 'Aguardando' GROUP BY usuario, disc_status_tp DESC";
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
        <strong><font color=\"#000000\">Data Cadastro</font></strong>
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
		               
				        $login8 = $dado['usuario'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['criado_em'];
						$tramite = $dado['tramite'];
						$nome2 = $dado['nome2'];
						$data_tramite = $dado['data_tramite'];
						$turnoo = $dado['turno'];
						$pedido = $dado['pedido'];
						$usuario = $dado['usuario'];
						
				$data_americano = "$data_cadastro"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_cadastro2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
				$data_americano2 = "$data_tramite"; 
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
					<td id=\"t_td1\" bgcolor=\"$cor\">$disc_status_tp</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$data_cadastro2</td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$turnoo</td>  
					<td id=\"t_td1\" bgcolor=\"$cor\">";
					?>
					
<a href="javascript:abrir('pedidos_erros_detalhes_sup.php?&login_usuario=<?php echo $usuario ?>&tramite=<?php echo $disc_status_tp ?>&turnoo=<?php echo $turnoo ?>&pesquisa_data=<?php echo $pesquisa_data ?>');"><?php echo $pedido ?></a>

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