<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/padrao.css" rel="stylesheet" style="text/css">
</head>

<body>

<?php
//Testa se o perfil está correto.
	if($_SESSION["treinamento"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
$nome  = $_SESSION["nome"];
	}


	
 	date_default_timezone_set("Brazil/East");

?>

	<div id="principal">
            <div id="menu">
            
            <?php include("../menu.php") ?>
            
            </div>
    <div>
    <div id="conteudo_pn" >

    
	<?php          
		echo "<table bgcolor='D6CA98' align='center' border='0'>
        <tr>
		<td id=\"t_td\" width=\"2%\">
        <strong><font color=\"#000000\">ID</font></strong>
        </td>
        <td id=\"t_td\" width=\"15%\"><font color=\"#000000\">
        <strong>Comentário</font></strong>
        </td>
		<td id=\"t_td\" width=\"15%\"><font color=\"#000000\">
        <strong>Destinatario</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Data Cadastro</font></strong>
        </td>
		</tr>
		";
            
//Pesquisa e retorna os campos declarado nas variáveis.
        include("../../tp/conexao.php");
        $cor= "#FFFFFF";
		
			$sql_pn = "select * from controle_de_questionamentos where orientador = '$nome' and status ='Pendente'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		{
				$id = $dado["id"];
				$comentario = $dado["comentario"];
				$data_cadastro = $dado["data_cadastro"];
				$destinatario = $dado["destinatario"];
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"altera_treinamento_controle_questionamentos.php?&id=$id\">$id</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$comentario</td> 
					<td id=\"t_td\" bgcolor=\"$cor\">$destinatario</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$data_cadastro</td>

               		</tr>";
         
					}
				echo "</table>";   
			 	?>
			</div>
		</div>
	</div>
</body>
</html>