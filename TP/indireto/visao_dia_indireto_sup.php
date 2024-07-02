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

	if($_SESSION["ADM_REVERSAO_IND"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
	
$nome = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
//echo $login;	
include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){
					    
$login = $dado["login"];
						}
//echo $login;
;
	$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
  //$dt_dia="2013-02-15";
  //echo $dt_dia;
  
   $dt_dia2 = date("d/m/Y");
  
  include("../../tp/conexao.php");
  $atv_op2="SELECT * FROM ilha_reversao_indireto_bko WHERE data_tramite ='$dt_dia'";
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
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_tramite2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
					     }
						}
						
						
?>

           <p id="p_padrao" align="center">Visão Indireto Dia: <?php echo $dt_dia2 ?></p>
            <hr width="104%">       
             <?php
			 //tabela por regional - inicio
			 
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM ilha_reversao_indireto_bko WHERE data_tramite ='$dt_dia'";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
							
               $atv_op="SELECT COUNT(pedido)as pedido,criado_em,usuario,disc_status_tp,regional FROM ilha_reversao_indireto_bko WHERE data_tramite = '$dt_dia' GROUP BY regional";
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
						$data_cadastro = $dado['criado_em'];
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
				$atv_op="SELECT * FROM ilha_reversao_indireto_bko WHERE data_tramite ='$dt_dia' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(pedido)as pedido,criado_em,usuario,disc_status_tp,tipo_erro FROM ilha_reversao_indireto_bko WHERE data_tramite = '$dt_dia' GROUP BY tipo_erro";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0' class='combobox_padrao_grande'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo Do Erro</font></strong>
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
						$tipo_de_solicitacao= $dado['tipo_erro'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['criado_em'];
						$pedido = $dado['pedido'];
				
				if($tipo_de_solicitacao == ""){
					$tipo_de_solicitacao = 'Pendente';
				}else $tipo_de_solicitacao = $tipo_de_solicitacao;
				
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
             <br> <br> <br> <br><br><br>
              <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT * FROM ilha_reversao_indireto_bko WHERE data_tramite ='$dt_dia' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               
				       
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                        $atv_op="SELECT COUNT(pedido)as pedido,criado_em,usuario,disc_status_tp,descricao_do_erro FROM ilha_reversao_indireto_bko WHERE data_tramite = '$dt_dia' GROUP BY descricao_do_erro";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr>
		<td id=\"t_td\" width=\"20%\">
        <strong><font color=\"#000000\">Motivo</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"5%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login5 = $dado['usuario'];
						$motivo= $dado['descricao_do_erro'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['criado_em'];
						$pedido = $dado['pedido'];				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}
				if($motivo == ""){
					$motivo = 'Pendente';
				}else $motivo = $motivo;


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
			//tabela por operador - inicio
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM ilha_reversao_indireto_bko WHERE data_tramite ='$dt_dia' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
		               				   
						$login2=mysql_num_rows($acao_op);
				
						 }					
						
						
                     $atv_op="SELECT COUNT(pedido)as pedido ,regional,usuario,disc_status_tp ,criado_em ,tramite ,nome2,data_tramite,turno FROM ilha_reversao_indireto_bko WHERE data_tramite = '$dt_dia' and tramite = 'Tratando' or data_tramite= '$dt_dia' and tramite = 'Tratado' or data_tramite = '$dt_dia' and tramite = 'Aguardando' GROUP BY 
					 tramite, usuario DESC";
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
						$usuario = $dado['usuario'];
						$data_tramite = $dado['data_tramite'];
						$turnoo = $dado['turno'];
						$pedido = $dado['pedido'];
						
				$data_americano = "$data_cadastro"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				$data_cadastro2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				$data_americano2 = "$data_tramite"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data2 = explode(" ",$data_americano2);
				$data2="$partes_da_data2[0]";
				
				$datatransf2 = explode("-",$data2);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
				$data_tramite3 = $data2;
								
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$nome2</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$data_tramite3</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$tramite</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$data_cadastro2</td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$turnoo</td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">";
					?>
					
<a href="javascript:abrir('pedidos_indireto_detalhes_sup.php?&login_usuario=<?php echo $usuario ?>&tramite=<?php echo $tramite ?>&turnoo=<?php echo $turnoo ?>&pesquisa_data=<?php echo $pesquisa_data ?>');"><?php echo $pedido ?></a>

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
        
        </div>
        
    </div>
    
</div>
</body>
</html>