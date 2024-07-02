<?php
include "../funcoes.php";
//Consulta que separa de 10 em 10 conteúdos exibidos por página
//Autor: Lauro Pereira
//Grupo Empreza

$sql_logado = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_usuarios WHERE id = $ide"));

if(!isset($cont))$cont = 0;
if(!isset($lim))$lim = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($lim) || $lim < 0){
	$lim = 0;
}

//Executa pesquisa de pedidos tramitando
include "../bd.php";
$sql_concluido = mysql_query("SELECT * FROM tbl_chamados WHERE (status = 'CONCLUIDO') AND l_input = '".$sql_logado['login']."' ORDER BY dt_conclusao DESC");

//Armazena o total de pedidos tramitando
$num = mysql_num_rows($sql_concluido);
?>

<!--  Forma o cabeçalho da tabela  -->
<h2>M&oacute;dulo de consulta - Chamados concluidos</h2>
<table border="1" >
  <tr>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="10%">N&ordm;</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="13%">solicita&ccedil;&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="17%">Servi&ccedil;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="7%" >Sistema</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Usu&aacute;rio</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="15%">Input</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="18%">Data de conclus&atilde;o</td>
    <td style="background-color:#AAAAAA; font-weight:bold;" align="center" width="5%" >ABRIR</td>
  </tr>
<?php
//Executa o Array sequencial que imprimirá os dados na tabela				
	for($i=0;$i < (($lim*10)+10); $i++){
				
				$linha_atv = mysql_fetch_assoc($sql_concluido);
				$idatividade			=	$linha_atv["n_chamado"];
				$solicitacao			=	$linha_atv["solicitacao"];
				$tipo					=	$linha_atv["tipo"];
				$sistema				=	$linha_atv["sistema"];
				$login					=	$linha_atv["login"];
				$dt_solic				=	$linha_atv["dt_solic"];
				$descricao				=	$linha_atv["descricao"];
				$dt_conclusao			=	$linha_atv["dt_conclusao"];

//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 15 em 15)	
		if($i >= ($lim * 10) && $i < mysql_num_rows($sql_concluido)){
			$cont = $cont + 1;
			echo '<tr>
    			<td align="center" width="10%">',$idatividade,'</td>
				<td align="center" width="13%">',$solicitacao,'</td>
				<td align="center" width="17%">',$tipo,'</td>
				<td align="center" width="7%" >',$sistema,'</td>
				<td align="center" width="15%">',$login,'</td>
				<td align="center" width="15%">',transforme_data_dma($dt_solic),'</td>
				<td align="center" width="18%">',transforme_data_dma($dt_conclusao),'</td>
				<td align="center" width="5%" ><a style="color:#0033FF" 
					href="menu_1.php?ide='.$ide.'&m=4&n_chamado='.$idatividade.'">Abrir</a>
				</td>
			  </tr>';		
		}
	}
	
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($lim*10)+1 > $num || $lim < 0){
		echo "<script>history.back()</script>";
	exit;
	}

//Constrói o rodapé da tabela
		echo "<tr>
				<td>
					<a href=\"menu_1.php?m=3&ide=$ide&lim=".($lim-1)."\">&nbsp;&nbsp;Exibir</br><< menos</a>
				</td>
				<td colspan=\"6\"><font><center>Exibindo do <strong>".(($lim*10)+1)."</strong> até o <strong>".(($lim*10)+$cont)."</strong> de um total de <strong>".$num." atividades </strong>conclu&iacute;das.</font><font>Clique em &quot;<strong>Abrir</strong>&quot; para exibir o conte&uacute;do</center></font></td>
				<td>
					<a href=\"menu_1.php?m=3&ide=$ide&lim=".($lim+1)."\">Exibir mais>></a>
				</td>
			  </tr>
		";
?>
</div>