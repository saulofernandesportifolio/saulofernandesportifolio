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
</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["SUP_SAP"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
	}
?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
    </div>
    
    <div id="caixa" >
    
         <div id="conteudo" >
        
            <p id="p_padrao">Administrador - &nbsp; <?php echo $_SESSION["nome"]; ?>.</p><br>
           <p id="p_padrao" align="center">Visão Geral</p>
                   
             <?php
			 //tabela por regional - inicio
			 
						include("../../tp/conexao.php");
				$atv_op="SELECT COUNT(login)as login FROM diario_sap_bko GROUP BY login";
                        $acao_op=mysql_query($atv_op,$conecta);
						while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login2= $dado['login'];
						}
							
                        $atv_op="SELECT COUNT(data_cadastro)as data_cadastro,login,disc_status_tp,regional FROM diario_sap_bko GROUP BY regional";
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
		               
				        $login = $dado['login'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_cadastro'];
						
						//echo $regional;
						//echo "<br>";
						//echo $login; 
						//echo "<br>";
					    //echo $disc_status_tp;
						
						//echo $data_cadastro;
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$regional</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$data_cadastro</td>
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
				$atv_op="SELECT COUNT(login)as login FROM diario_sap_bko GROUP BY login";
                        $acao_op=mysql_query($atv_op,$conecta);
						while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login2= $dado['login'];
						}
							
                        $atv_op="SELECT COUNT(data_cadastro)as data_cadastro,login,disc_status_tp,tipo_de_solicitacao FROM diario_sap_bko GROUP BY tipo_de_solicitacao";
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
		               
				        $login = $dado['login'];
						$tipo_de_solicitacao= $dado['tipo_de_solicitacao'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_cadastro'];
						
						//echo $regional;
						//echo "<br>";
						//echo $login; 
						//echo "<br>";
					    //echo $disc_status_tp;
						
						//echo $data_cadastro;
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$tipo_de_solicitacao</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$data_cadastro</td>
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
				
				//tabela por tipo de solicitação - fim   
			 	?>
             <br>
              <?php
			  //tabela por motivo - inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT COUNT(login)as login FROM diario_sap_bko GROUP BY login";
                        $acao_op=mysql_query($atv_op,$conecta);
						while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login2= $dado['login'];
						}
							
                        $atv_op="SELECT COUNT(data_cadastro)as data_cadastro,login,disc_status_tp,motivo FROM diario_sap_bko GROUP BY motivo";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Motivo</font></strong>
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
		               
				        $login = $dado['login'];
						$motivo= $dado['motivo'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_cadastro'];
						
						//echo $regional;
						//echo "<br>";
						//echo $login; 
						//echo "<br>";
					    //echo $disc_status_tp;
						
						//echo $data_cadastro;
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$motivo</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$data_cadastro</td>
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
				//tabela por motivo - fim
				  
			 	?>
             <br>
            
           <?php
			  //tabela por disc_status_tp (tipo)- inicio
			  
						include("../../tp/conexao.php");
				$atv_op="SELECT COUNT(login)as login FROM diario_sap_bko GROUP BY login";
                        $acao_op=mysql_query($atv_op,$conecta);
						while ($dado= mysql_fetch_array($acao_op))
		                {
		               
				        $login2= $dado['login'];
						}
							
                        $atv_op="SELECT COUNT(data_cadastro)as data_cadastro,login,disc_status_tp FROM diario_sap_bko GROUP BY disc_status_tp";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='reight' border='0'>
		<tr>
		<td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
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
		               
				        $login = $dado['login'];
						//$motivo= $dado['motivo'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_cadastro'];
						
						//echo $regional;
						//echo "<br>";
						//echo $login; 
						//echo "<br>";
					    //echo $disc_status_tp;
						
						//echo $data_cadastro;
				
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" width=\"1%\" bgcolor=\"$cor\">$disc_status_tp</td>
                  	<td id=\"t_td1\" width=\"1%\" bgcolor=\"$cor\" align=\"right\">$data_cadastro</td>
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
             <br>
                        
            <?php
			//tabela por operador - inicio
						include("../../tp/conexao.php");
						//$atv_op="SELECT COUNT(login)as login FROM diario_sap_bko GROUP BY login";
                        $atv_op="SELECT COUNT(regional)as regional,login,disc_status_tp,data_cadastro FROM diario_sap_bko GROUP BY login";
                        $acao_op=mysql_query($atv_op,$conecta);
						          
		echo "<table bgcolor='D6CA98' align='left' border='0'>
        <tr>
		<td id=\"t_td\" width=\"35%\">
        <strong><font color=\"#000000\">Login do Operador</font></strong>
        </td>
       	<td id=\"t_td1\" width=\"15%\">
        <strong><font color=\"#000000\">Data Cadastro</font></strong>
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
		               
				        $login = $dado['login'];
						$regional = $dado['regional'];
						$disc_status_tp = $dado['disc_status_tp'];
						$data_cadastro = $dado['data_cadastro'];
						
						//echo $regional;
						//echo "<br>";
						//echo $login; 
						//echo "<br>";
					    //echo $disc_status_tp;
						
						//echo $data_cadastro;
						
				$data_americano = "$data_cadastro"; 
				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("-",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$data_cadastro2 = $data;
				//$linha['visao_ilha']=$visao_ilha2;
				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$login</a></td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$data_cadastro2</td>
                  	<td id=\"t_td1\" bgcolor=\"$cor\">$regional</td> 
                  	</tr>";
         
					}
				echo "</table>";
				//tabela por operador - fim   
			 	?>
        
        </div>
        
    </div>
    
</div>
</body>
</html>