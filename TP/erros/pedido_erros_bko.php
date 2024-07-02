<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>E-GTQ - Gestão  Tramite Qualidade</title>
    <link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <title>E-GTQ - Gestão  Tramite Qualidade</title>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<?php
//Testa se o perfil está correto.
	if($_SESSION["erros_bko"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
            $nome = $_SESSION["nome"];
            $login = $_SESSION["login"];
            $turno = $_SESSION["turno"];
	}
	include "../conexao.php";
	$tempo = 0;
    set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d"); 

	if (empty($_POST["tipo"]))
    {
    echo "<script>alert('Nenhum erro selecionado.'); document.location.replace('erros_filtro.php'); </script>\n";
    exit;
    }
    if (empty($_POST["regional"]))
    {
    echo "<script>alert('Nenhuma regional selecionada.'); document.location.replace('erros_filtro.php'); </script>\n";
    exit;
    }
    if (empty($_POST["carteira"]))
    {
    echo "<script>alert('Nenhuma carteira selecionada.'); document.location.replace('erros_filtro.php'); </script>\n";
    exit;
    }
    
    
    $carteira = $_POST["carteira"];
    $contador = count($carteira);
    
    if ($contador == 2){
    	$filtro_carteira = "(base_erros.vpe='Nao') or (base_erros.vpe='sim')";	
    	}
    if($carteira[0] == "vpe" and $contador != 2){
    	$filtro_carteira = "(base_erros.vpe='sim')";
    	}
    
    if($carteira[0] == "vpg" and $contador != 2){
    	$filtro_carteira = "(base_erros.vpe='Nao')";
    	}
    	
    //echo $filtro_carteira;
    
    $nome = $_SESSION["nome"];
    $login = $_SESSION["login"];
    $turno = $_SESSION["turno"];
    
    $tipo = $_POST['tipo']; 
    $valores = ''; 
    foreach($tipo as $k => $v){ 
    $valores.= ",or, "."base_erros.tipo="."'".$v."'";
    }
    //DELETE($valores,1,2);
    $valores = "teste".$valores.") and (status_tp = 1";
    $lista = explode(",", $valores);
    $lista2 = array_slice($lista,2,55);
    $novavar = implode("", $lista2);
    //$sql_consulta="SELECT * FROM controle_pn_bko WHERE $novavar ORDER BY data_inicial ASC";
    //print $sql_consulta; 
    
    $tipo = $_POST['regional']; 
    $regionais = ''; 
    foreach($tipo as $k => $v){ 
    $regionais.= ", or, "."base_erros.regional="."'".$v."'";
    }
    //DELETE($valores,1,2);
    $regionais = "teste".$regionais;
    $regiao = explode(",", $regionais);
    $regiao2 = array_slice($regiao,2,55);
    $novavar2 = implode("", $regiao2);
    
    
    $sql_verifca="SELECT * FROM base_erros 
                    WHERE (base_erros.fila = 1) and 
                    (base_erros.tramite = 'Aguardando') and 
                    ($novavar2) and ($novavar) and ($filtro_carteira)
                    ORDER BY criado_em ASC";

	$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
	$num = mysql_num_rows($acao_pedidos);
    
    if($num <= 0)
    {       
		 echo "<script type=\"text/javascript\">
        alert('Voce nao possui atividades em sua visao. Por favor entre em contato com a distribuicao.');
		document.location.replace('../../tp/erros/erros_filtro.php');
		</script>";
        exit;
    }
?>

	<div id="principal">
    <div id="menu">
    
	<?php include("../menu.php") ?>
    
    </div>
    <div>
    <div id="conteudo_pn" >
     
    <p id="p_padrao">Você tem <?php echo "$num" ?> Solicitações pendente.</p>
    
	<?php          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"1%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Cliente</font></strong>
        </td>
        <td id=\"t_td\" width=\"1%\">
        <strong><font color=\"#000000\">Linhas</font></strong>
		</td>
		<td id=\"t_td\" width=\"1%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
		</td>
        <td id=\"t_td\" width=\"1%\">
        <strong><font color=\"#000000\">Data</font></strong>
        </td>
		</tr>
		";
               
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		while ($dado=mysql_fetch_array($acao_pedidos))
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
                $cliente = $dado["cliente"];

				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"erros_bko.php?&id=$id\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td>
                    <td id=\"t_td\" bgcolor=\"$cor\">$cliente</td>   
                  	<td id=\"t_td\" bgcolor=\"$cor\">$linhas</td>
                    <td id=\"t_td\" bgcolor=\"$cor\">$tipo</td>
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