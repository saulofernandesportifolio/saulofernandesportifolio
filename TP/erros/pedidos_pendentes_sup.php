<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
function marca_desmarca() 
{
        var e = document.getElementsByTagName("input"); 
        var x = document.getElementById("texto"); 
        var master = document.getElementById("checkbox_master");         
        var bool; 
 
        if (x.innerHTML == "Marcar Todos") // if (master.checked == true) // <-- substituir "IF" para var master.checked sempre true. 
        { bool = true;  x.innerHTML = "Desmarcar Todos";        } 
        else 
        { bool = false; x.innerHTML = "Marcar Todos";           } 
 
        for(var i=1;i<e.length;i++) 
        { 
                if (e[i].type=="checkbox") 
                { 
                        e[i].checked = bool; 
                }        
        } 
        master.checked = false; // se var master.checked for sempre true -> apagar esta linha 
} 
</script> 
</head>
<body>
<?php
//Testa se o perfil está correto.
	if($_SESSION["adm_erros"] == 0){  
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('logout.php');
			</script>
 		";
$nome  = $_SESSION["nome"];
$login = $_SESSION["login"];
$turno = $_SESSION["turno"];
	}
	include "../conexao.php";
	$tempo = 0;
    set_time_limit($tempo);
 	date_default_timezone_set("Brazil/East");
	$data_dia= date("y/m/d"); 

	include "pendente_sup_fila.php";
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
		echo "<form action='deleta_erros.php' method='POST'>
        <table bgcolor='D6CA98' align='center' border='0'>
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
        <td id=\"t_td\" width=\"5%\">
        <strong><font color=\"#000000\"><u>Excluir</u><br /><span id='texto'>Marcar Todos</span> <input type='checkbox' onclick='marca_desmarca()'/></font></strong>
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

				echo "
                    <tr bgcolor=\"$cor\">
             
                  	<td id=\"t_td\" bgcolor=\"$cor\"><a href=\"erros_bko_sup.php?&id=$id\">$pedido</a></td>
                  	<td id=\"t_td\" bgcolor=\"$cor\">$regional</td> 
                  	<td id=\"t_td\" bgcolor=\"$cor\">$tipo</td>
					<td id=\"t_td\" bgcolor=\"$cor\">$linhas</td>
				  	<td id=\"t_td\" bgcolor=\"$cor\">$data_cad</td>
                    <td id=\"t_td\" bgcolor=\"$cor\"><input type='checkbox' name='erros[]' value='$id' /></td>

               		</tr>";
         
					}
				echo "
                    <tr><td align='right'><input type='submit' value='Excluir erros selecionados'/></td></tr></form></table>";   
			 	?>
			</div>
		</div>
	</div>
</body>
</html>