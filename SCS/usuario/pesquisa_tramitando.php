<?php
include "../funcoes.php";
//Consulta que separa de 10 em 10 conteúdos exibidos por página
//Autor: Lauro Pereira
//Grupo Empreza

$sql_logado = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_usuarios WHERE id = ".$_GET["ide"]));

if(!isset($cont))$cont = 0;
if(!isset($limite))$limite = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de pedidos tramitando
include "../bd.php";
$sql_tramitando = mysql_query("SELECT * FROM tbl_chamados WHERE (status <> 'CONCLUIDO') AND l_input = '".$sql_logado["login"]."' ORDER BY prioridade, status ASC");


//Armazena o total de pedidos tramitando
$num = mysql_num_rows($sql_tramitando);
?>

<!--  Forma o cabeçalho da tabela  -->
<h2>M&oacute;dulo de consulta - Chamados tramitando</h2>
<table border="1" >
  <tr>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">N&ordm;</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="13%">solicita&ccedil;&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="17%">Servi&ccedil;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="7%" >Sistema</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Usu&aacute;rio</br>tratamento</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Input</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="18%">Status</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="5%" >ABRIR</td>
  </tr>
<?php
//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*10)+10); $i++){
				
				$linha_atv = mysql_fetch_assoc($sql_tramitando);
				$idatividade			=	$linha_atv["n_chamado"];
				$solicitacao			=	$linha_atv["solicitacao"];
				$tipo					=	$linha_atv["tipo"];
				$sistema				=	$linha_atv["sistema"];
				$login_input			=	$linha_atv["login"];
				$login_chamado			=	$linha_atv["login"];
				$dt_solic				=	$linha_atv["dt_solic"];
				$descricao				=	$linha_atv["descricao"];
				$status					=	$linha_atv["status"];

//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 15 em 15)	
		if($i >= ($limite * 10) && $i < mysql_num_rows($sql_tramitando)){
			$cont = $cont + 1;
			if($status == "DEVOLVIDO"){$cor = "#FF0000";}
			else{$cor = "#000000";}
			
			echo '<tr>
    			<td align="center" width="10%"><a style="color=',$cor,'">',$idatividade,'</td>
				<td align="center" width="13%"><a style="color=',$cor,'">',$solicitacao,'</td>
				<td align="center" width="17%"><a style="color=',$cor,'">',$tipo,'</td>
				<td align="center" width="7%" ><a style="color=',$cor,'">',$sistema,'</td>
				<td align="center" width="15%"><a style="color=',$cor,'">',$login_chamado,'</td>
				<td align="center" width="15%"><a style="color=',$cor,'">',transforme_data_dma($dt_solic),'</td>
				<td align="center" width="18%"><a style="color=',$cor,'">',$status,'</a></td>
				<td align="center" width="5%" ><a style="color:#0033FF" href="menu_1.php?ide='.$ide.'&m=4&n_chamado='.$idatividade.'">Abrir</a>
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
					<a href=\"menu_1.php?m=2&ide=$ide&limite=".($limite-1)."\">&nbsp;&nbsp;Exibir</br><< menos</a>
				</td>
				<td colspan=\"6\"><font><center>Exibindo do <strong>".(($limite*10)+1)."</strong> até o <strong>".(($limite*10)+$cont)."</strong> de um total de <strong>".$num." atividades </strong>aguardando tratamento.</font><font>Clique em &quot;<strong>Abrir</strong>&quot; para trabalhar</center></font></td>
				<td>
					<a href=\"menu_1.php?m=2&ide=$ide&limite=".($limite+1)."\">Exibir mais>></a>
				</td>
			  </tr>
		";
?>
</div>