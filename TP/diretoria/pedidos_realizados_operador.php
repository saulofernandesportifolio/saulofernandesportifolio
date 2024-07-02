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

	if($_SESSION["diretoria_input"] == 0){  
    	
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
		<td id=\"t_td\" width=\"7%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Ofensor</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Comentário</font></strong>
		</td>
        <td id=\"t_td\" width=\"10%\">
        <strong><font color=\"#000000\">Remetente</font></strong>
        </td>
		<td id=\"t_td\" width=\"3%\">
        <strong><font color=\"#000000\">TMT</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		$nome = $_SESSION["nome"];
		$login = $_SESSION["login"];
		$data_hoje = date("Y-m-d");
		$sql_consulta="Select * from base_diretoria where usuario='$login' and fila ='3' and data_tramite ='$data_hoje' order by id";
		//echo $sql_consulta;
		$acao_op=mysql_query($sql_consulta,$conecta);
		while ($dado=mysql_fetch_array($acao_op))
			{
				$id = $dado["id"];
				$pedido      = $dado ["pedido"];
				$ofensor     = $dado ["ofensor"];
				$comentario  = $dado ["comentario"];
				$remetente   = $dado ["remetente"];
				$tmt         = $dado ["tmt"];
			
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\">$pedido</td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$ofensor</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$comentario</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$remetente</td>
					<td id=\"t_td\" bgcolor=\"$cor\">$tmt</td>
               		</tr>";
				}
				echo "</table>";   
			 	?>
        </div>
        
    </div>
    
</div>
</body>
</html>