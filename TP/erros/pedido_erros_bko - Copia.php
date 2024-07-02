<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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

	include "erros_filtro_fila.php";
	$acao_pedidos = mysql_query($sql_verifca) or die (mysql_error());
	$num_ = mysql_num_rows($acao_pedidos);
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
		<td id=\"t_td\" width=\"8%\">
        <strong><font color=\"#000000\">Pedido</font></strong>
        </td>
		<td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\">Regional</font></strong>
        </td>
        <td id=\"t_td\" width=\"17%\">
        <strong><font color=\"#000000\">Linhas</font></strong>
		</td>
		<td id=\"t_td\" width=\"3%\">
        <strong><font color=\"#000000\">Tipo</font></strong>
		</td>
        <td id=\"t_td\" width=\"5%\">
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

				
				if($cor == "#CCCCCC"){
                	$cor= "#FFFFFF";
                    }else{
                    $cor= "#CCCCCC";
					}

				echo "<tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"erros_bko.php?&id=$id\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
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