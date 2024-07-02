<?php
//Autor: Lauro Pereira
//Grupo Empreza

if(!isset($cont))$cont = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de eventos do usuario
include "bd.php";
$eventos = mysql_query("SELECT * FROM calendario WHERE us_evento = '".$_COOKIE['login']."' ORDER BY data ASC;") or die (mysql_error());

//Armazena o total de pedidos tramitando
$num = mysql_num_rows($eventos);
//EXIBE CABEÇALHO PADRÃO
echo "</br><H2>Meus eventos:</H2></br>";

//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*5)+5); $i++){
		$linha = mysql_fetch_assoc($eventos);
	    $id_evento	= $linha["id"];
		$data		= $linha["data"];
		$descricao	= $linha["evento"];
		$tipo		= $linha["tipo"];
		
		//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 10 em 10)	
		if($i >= ($limite * 5) && $i < mysql_num_rows($eventos)){
			$cont = $cont + 1;
			?>
			
			<p><?php echo substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4).
							" - $descricao - do tipo $tipo ";?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?func=edit_event&id_evento=<?php echo $id_evento;?>">editar</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?func=exc_event&id_evento=<?php echo $id_evento;?>">excluir</a>
            </p>
            <hr>
			<?php }
	}
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*5) > $num || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}
//Constrói o rodapé da tabela
		echo "<table class=\"no_format\"><tr>
			<td align=\"left\"><a href=\"index.php?func=my_event&set=".$set."&limite=",($limite-1),"\">&nbsp;&nbsp;<< Exibir menos</a></td>";
		
		$pag = 0;
		$f = 0;
		for($j=0; $j < $num;$j++){
			$f = $f + 1;
			if($f == 6){$f = 1;}
			if($f == 1){$pag = $pag + 1;}
			if($j == 0){echo "<td>Paginas: ";}
			if($f == 1){
				if(($pag-1) == $limite){
					echo "<a href=\"index.php?func=my_event&set=".$set."&limite=".($pag-1)."\">&nbsp;<u>",($pag),"</u>&nbsp;</a>";
				}else{
					echo "<a href=\"index.php?func=my_event&set=".$set."&limite=".($pag-1)."\">&nbsp;",$pag,"&nbsp;</a>";
				}
			}
		}
		if($num == 0){echo "<td align=\"center\"><a href=\"index.php\"><u>Nenhum evento registrado</u></a>";}
		echo "</td><td align=\"right\"><a href=\"index.php?func=my_event&set=".$set."&limite=",($limite+1),"\">Exibir mais >></a></td>
			</tr></table>
		";
?>