<?php
include "../funcoes.php";
//Consulta que separa de 20 em 20 conteúdos exibidos por página
//Autor: Lauro Pereira
//Grupo Empreza

if(!isset($cont))$cont = 0;
if(!isset($limite))$limite = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de pedidos tramitando
$sql_usuario_logado = mysql_fetch_assoc(
	mysql_query("SELECT * FROM tbl_usuarios WHERE id='".$ide."';"));
    
include "../bd.php";
$sql_tramitando = mysql_query("SELECT * FROM tbl_chamados WHERE (status <> 'CONCLUIDO') 
                            AND login = '".$sql_usuario_logado["login"]."' 
                            ORDER BY prioridade, status ASC");


//Armazena o total de pedidos tramitando
$num = mysql_num_rows($sql_tramitando);

//Verifica se o usuario não possui mais chamados Tramitando
if($num == 0)
{
    echo"
			<script type=\"text/javascript\">
			alert('Você não possui chamados tramitando!');
			document.location.replace('menu_1.php?ide=".$ide."&m=2.php');
			</script>
 		";
}

?>

<!--  Forma o cabeçalho da tabela  -->
<h2>M&oacute;dulo de consulta - Chamados tramitando</h2>
<table border="1" >
  <tr>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">N&ordm;</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="13%">solicita&ccedil;&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="17%">Servi&ccedil;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="7%" >Sistema</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Usu&aacute;rio</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Input</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Solicitado por:</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="18%">Status</td>
    <td colspan="2" style="background-color:#AAAAAA; font-weight:bold;" align="center" width="5%" >Tratamento</td>
  </tr>
<?php
//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*10)+10); $i++){
				
				$linha_atv = mysql_fetch_assoc($sql_tramitando);
				$idatividade			=	$linha_atv["n_chamado"];
				$solicitacao			=	$linha_atv["solicitacao"];
				$tipo					=	$linha_atv["tipo"];
				$sistema				=	$linha_atv["sistema"];
				$login					=	$linha_atv["login"];
                $solic_por				=	$linha_atv["l_input"];
				$dt_solic				=	$linha_atv["dt_solic"];
				$descricao				=	$linha_atv["descricao"];
				$status					=	$linha_atv["status"];

//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 15 em 15)	
		if($i >= ($limite * 10) && $i < mysql_num_rows($sql_tramitando)){
			$cont = $cont + 1;
			if($status == "DEVOLVIDO")
			{$classe = "class=\"devolvido\"";}
			else{$classe = "";}
			//marca responsável
			if($login == $sql_usuario_logado["login"])$login = "<strong>".$login."</strong>";
			echo '<tr>
    			<td align="center" width="10%"><a ',$classe,'>',$idatividade,'</td>
				<td align="center" width="13%"><a ',$classe,'>',$solicitacao,'</td>
				<td align="center" width="17%"><a ',$classe,'>',$tipo,'</td>
				<td align="center" width="7%" ><a ',$classe,'>',$sistema,'</td>
				<td align="center" width="15%"><a ',$classe,'>',$login,'</td>
				<td align="center" width="15%"><a ',$classe,'>',transforme_data_dma($dt_solic),'</td>
                <td align="center" width="12%">',$solic_por,'</td>
				<td align="center" width="18%"><a ',$classe,'>',$status,'</a></td>
				<td align="center" width="5%" ><a style="color:#0033FF" href="menu_1.php?ide='.$ide.'&m=4&n_chamado='.$idatividade.'">Abrir</a>
				</td>
				<td align="center" width="5%" ><a style="color:#0033FF" href="menu_1.php?ide='.$ide.'&m=11&n_chamado='.$idatividade.'">Editar</a>
				</td>
			  </tr>';		
		}
	}
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*10)+1 > $num || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}

//Constrói o rodapé da tabela
		echo "<tr>
				<td>
					<a href=\"menu_1.php?m=12&ide=$ide&limite=".($limite-1)."\">&nbsp;&nbsp;Exibir</br><< menos</a>
				</td>
				<td colspan=\"7\"><font><center>Exibindo do <strong>".(($limite*10)+1)."</strong> até o <strong>".(($limite*10)+$cont)."</strong> das <strong>".$num." atividades</strong> em seu nome de um total de <strong>"
				.mysql_num_rows(mysql_query("SELECT * FROM tbl_chamados WHERE (status <> 'CONCLUIDO')"))." atividades </strong>aguardando tratamento.</font><font>Clique em &quot;<strong>Abrir</strong>&quot; para trabalhar</center></font></td>
				<td colspan=\"2\">
					<a href=\"menu_1.php?m=12&ide=$ide&limite=".($limite+1)."\">Exibir mais>></a>
				</td>
			  </tr>
		";
?>
</div>