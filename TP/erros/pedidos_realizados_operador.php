<?php   
@session_start(); 
include("../../tp/conexao.php");
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

	if($_SESSION["erros_bko"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
	$data=date("d/m/Y");
	$pedido1='0';
		$login = $_SESSION["login"];
		$data_hoje = date("Y-m-d");
		$sql_consulta="select count(pedido) as pedido1 from  base_erros where usuario='$login' and fila ='3' and data_tramite ='$data_hoje'";
		//echo $sql_consulta;
		$acao_op=mysql_query($sql_consulta,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$pedido1 = $dado["pedido1"];

			}
	
	
	
?>

<div id="principal">

    <div id="menu">
   <?php include("../../tp/menu.php") ?>
   
    </div>
    
    <div id="caixa" >
    
        <div id="conteudo" >
        
            <p id="p_padrao">Produção do dia <?php echo $data;?> -QTD :  <?php echo $pedido1 ?> OPERADOR :  <?php echo $_SESSION["nome"]; ?>.</p>
            
<?php          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
		</td>
		<td id=\"t_td\" width=\"3%\">
        <strong><font color=\"#000000\">Linhas</font></strong>
		</td>
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Data</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        
        $cor= "#FFFFFF";
		$nome = $_SESSION["nome"];
		$login = $_SESSION["login"];
		$data_hoje = date("Y-m-d");
		$sql_consulta="Select * from base_erros where usuario='$login' and fila ='3' and data_tramite ='$data_hoje'";
		//echo $sql_consulta;
		$acao_op=mysql_query($sql_consulta,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$id = $dado["id"];
				$regional = $dado["regional"];
				$adabas = $dado["adabas"];
				$pedido = $dado ["pedido"];
				$tipo = $dado ["tipo"];
				$linhas = $dado ["linhas"];
				$data_cadastro = $dado["criado_em"];
				$data_sla = $data_cadastro;
				$data_cadastro = explode('-', $data_cadastro);
				$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$pedido</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$tipo</td>
					<td id=\"t_td\" bgcolor=\"$cor\">$linhas</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$data_cad</td>

               		</tr>";
         
					}
				echo "</table>";   
			 	?>
        </div>
        
    </div>
    
</div>
</body>
</html>