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
</head>
<body id="logar" background="../../tp/img/background.JPG">

<?php
//Testa se o perfil está correto.

	if($_SESSION["controle_atividades"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
	$data=date("d/m/Y");
?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
        
            <p id="p_padrao">Produção do dia <?php echo $data;?> - <?php echo $_SESSION["nome"]; ?>.</p>
            
<?php          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"20%\">
        <strong><font color=\"#000000\">Motivo</font></strong>
        </td>
        <td id=\"t_td\" width=\"15%\">
        <strong><font color=\"#000000\">Solicitado por</font></strong>
		</td>
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Ação</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		$nome = $_SESSION["nome"];
		$login = $_SESSION["login"];
		$data_hoje = date("Y-m-d");
		$sql_consulta="Select * from erros_pendentes where login='$login' and data_cad ='$data_hoje'";
		//echo $sql_consulta;
		$acao_op=mysql_query($sql_consulta,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$pedido = $dado ["pedido"];
				$motivo = $dado ["motivo"];
				$solicitado_por = $dado["solicitado_por"];
				$acao = $dado["acao"];
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$pedido</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$motivo</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$solicitado_por</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$acao</td>

               		</tr>";
         
					}
				echo "</table>";   
			 	?>
        </div>
        
    </div>
    
</div>
</body>
</html>