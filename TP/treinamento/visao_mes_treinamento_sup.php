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
  var height = 150;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=680,height=800');
 
}
</script>

</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["treinamento_sup"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
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
  $atv_op2="SELECT * FROM controle_de_questionamentos WHERE data_cadastro like '%$dt_dia%'";
                        $acao_op2=mysql_query($atv_op2,$conecta);
					$dado2= mysql_fetch_array($acao_op2);
					    {
		                 $data_cadastro= $dado2['data_cadastro'];
						  if($data_cadastro == '')
						 {
						$data_cadastro= '';
						$data_cadastro2= '';
						 }
						 else
						 {
						 $data_americano = "$data_cadastro"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_cadastro2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
					     }
						}
?>                     

         <p id="p_padrao" align="center">Visão Treinamento Geral Mês : <?php echo $dt_mes ?></p>
        <hr width="104%">          
             <?php
			 //tabela por regional - inicio
			 
					include("../../tp/conexao.php");
				$atv_op="SELECT * FROM controle_de_questionamentos WHERE data_cadastro like '%$dt_dia%'";
                        $acao_op=mysql_query($atv_op,$conecta);
						$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
						
						
                        $atv_op="SELECT COUNT(status)as status1, status FROM controle_de_questionamentos WHERE data_cadastro  like '%$dt_dia%' GROUP BY status";
                        $acao_op=mysql_query($atv_op,$conecta);
						
					          
		echo "<table bgcolor='D6CA98' align='left' border='0' width='90' class='combobox_padrao'>
		<tr>
		<td id=\"t_td\" width=\"25%\">
        <strong><font color=\"#000000\">Status Controle de Questionamento</font></strong>
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
		               
				       // $login3 = $dado['usuario'];
						$status = $dado['status'];
						$status1 = $dado['status1'];
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"5%\" bgcolor=\"$cor\">$status</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$status1</td>
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
				$atv_op="SELECT * FROM plano_de_acao WHERE data_cadastro like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					$dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
							
                     $atv_op="SELECT COUNT(atividade)as atividade1, atividade FROM plano_de_acao WHERE data_cadastro like '%$dt_dia%' GROUP BY atividade";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0' class='combobox_padrao_grande'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Plano de Ação(Atividades)</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"10%\">
        <strong><font color=\"#000000\">Total</font></strong>
        </td>
		</tr>
	 
		";
           $atividade1='';    
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
						$atividade= $dado['atividade'];
						$atividade1= $dado['atividade1'];
						//$data_cadastro = $dado['data_cadastro'];
						


				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$atividade</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$atividade1</td>
                  	  	</tr>";
						
				               
					}
					$cor2 = '#CCCCCC';
					echo" <tr bgcolor=\"$cor2\">
	               <td id=\"t_td\" width=\"1%\">
                    <strong><font color=\"#000000\">Total Geral</font></strong>
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$atividade1</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				echo "<br>";
				//tabela por tipo de solicitação - fim   
			 	?>
            
             <br><br><br>
       <table><tr><td>   
           <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM controle_de_questionamentos WHERE data_cadastro like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					    $dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
						
                    $atv_op="SELECT * FROM controle_de_questionamentos";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Orientador</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Destinatario</font></strong>
        </td>
		<td id=\"t_td1\" width=\"5%\">
        <strong><font color=\"#000000\">Status</font></strong>
        </td>
		 <td id=\"t_td1\" width=\"8%\">
        <strong><font color=\"#000000\">Data Cadastro</font></strong>
        </td>
        <td id=\"t_td1\" width=\"2%\">
        <strong><font color=\"#000000\">ID</font></strong>
        </td>
		</tr>
		";
             ?>
			 
	 
	<?php 
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado= mysql_fetch_array($acao_op))
		                {
		               
						$id = $dado['id'];
						$comentario = $dado['comentario'];
						$data_cadastro = $dado['data_cadastro'];
						$destinatario = $dado['destinatario'];
						$orientador = $dado['orientador'];
						$status = $dado['status'];
////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$datatransf2 = explode("-",$data_cadastro);
				$data2 = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";
				//$datacompleta = $data;
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
				
					<td id=\"t_td1\" bgcolor=\"$cor\">$orientador</td>	
					<td id=\"t_td1\" bgcolor=\"$cor\">$destinatario</td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$status</td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$data2</td>
					
                  	
             		<td id=\"t_td1\" bgcolor=\"$cor\">";
			 					?>
                    
<a href="javascript:abrir('treinamento_controle_questionamentos_sup.php?&id=<?php echo $id ?>');"><?php echo $id ?></a>

					<?php
					echo '</td>';
         
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
					
					</td>
					<td  id=\"t_td1\" width=\"1%\" bgcolor=\"$cor2\">
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				//tabela por motivo - fim
?>

</td></tr>
<tr><td><br><br>

</td></tr>
<tr><td>
<?php

			//tabela por operador - inicio
						include("../../tp/conexao.php");
						$atv_op="SELECT * FROM plano_de_acao WHERE data_cadastro like '%$dt_dia%' ";
                        $acao_op=mysql_query($atv_op,$conecta);
					    $dado= mysql_fetch_array($acao_op);
					    {
						$login2=mysql_num_rows($acao_op);
						
						 }
						
                    $atv_op="select COUNT(operador) as atividade1,operador,atividade, reincidente from  plano_de_acao group by atividade, reincidente, operador order by operador";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"35%\">
        <strong><font color=\"#000000\">Operador</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Atividade</font></strong>
        </td>
		<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Reincidente</font></strong>
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

						$operador    = $dado['operador'];
						$atividade   = $dado['atividade'];
						$reincidente = $dado['reincidente'];
						$atividade1  = $dado['atividade1'];
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
						
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$operador</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$atividade</a></td>
					<td id=\"t_td1\" bgcolor=\"$cor\">$reincidente</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">";
					?>
                    
<a href="javascript:abrir('pedidos_treinamento_detalhes_sup.php?&operador=<?php echo $operador ?>&atividade=<?php echo $atividade ?>&reincidente=<?php echo $reincidente ?>');"><?php echo $atividade1 ?></a>

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
					<strong><font color=\"#000000\">$login2</font></strong>
					</td>
		           </tr>
				    "; 
				echo "</table>";
				//tabela por operador - fim   
			 	?>
        </td></tr></table>
        </div>
    </div>
</div>
</body>
</html>