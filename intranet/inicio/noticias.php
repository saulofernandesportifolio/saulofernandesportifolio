<?php
//Consulta que separa de 3 em 3 conteúdos exibidos por página
//Autor: Lauro Pereira
//Grupo Empreza

if(!isset($cont))$cont = 0;

//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
if(!isset($limite) || $limite < 0){
	$limite = 0;
}

//Executa pesquisa de pedidos tramitando
include "bd.php";
$feeds = mysql_query("SELECT * FROM feed WHERE tipo = '".$set."' OR tipo = 'todos' ORDER BY dt_post DESC;") or die (mysql_error());

//Cria titulo das mensagens
switch($set)
{
    case 'NT': $t = 'Notícias';break;
    case 'PR': $t = 'Procedimentos';break;
    case 'RH': $t = 'Recursos Humanos';break;
    case 'LD': $t = 'Liderança';break;
}

//Exibe o titulo com o tipo de posts
echo "<center><h1>".$t."</h1></center>";
//Armazena o total de pedidos tramitando
$num = mysql_num_rows($feeds);

//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*3)+3); $i++){
		$linha       = mysql_fetch_assoc($feeds);
	    $id_feed     = $linha["id"];
	    $titulo      = stripslashes($linha["titulo"]);
	    $us_post     = $linha["us_post"];
	    $dt_post     = $linha["dt_post"];
	    $tipo        = $linha["tipo"];
		$conteudo    = stripslashes($linha["conteudo"]);
		$adwords     = $linha["adwords"];
		
		//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 3 em 3)	
		if($i >= ($limite * 3) && $i < $num){
			?>
			<br /><h2><a href="index.php?func=feed&id_feed=<?php echo $id_feed;?>"><?php echo substr($titulo,0,51);?></a></h2>
			<p><?php echo substr($conteudo,0,strrpos(substr($conteudo,0,125)," "));?>...</p>
            <div align="right"><a href="index.php?func=feed&id_feed=<?php echo $id_feed;?>">leia mais...</a></div>
			<hr />
			<?php 
            $cont++;}
	}
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*3) > $num-1 || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}
//Constrói o rodapé da tabela
		echo "<table align=\"left\" class=\"no_format\"><tr>
			<td align=\"center\" width=\"25%\"><a href=\"index.php?set=".$set."&func=not&limite=",($limite-1),"\"><< Pag. anterior</a></td>";			
		if(!isset($exc)){$exc = 0;}
		$pag = 0 + $exc;
		$f = 0;
		for($j=0; $j < $num;$j++){
			$f += 1;
			if($f == 4){$f = 1;}
			if($j == 0){echo "<td width=\"50%\">|&nbsp;Paginas: ";}
			if($exc >= 15 && $j==0){
				echo "<a href=\"index.php?set=".$set."&func=not&exc=".($exc-15)."&limite=".($pag-1)."\">&nbsp;<<&nbsp;</a>";
			}
			if($pag < 15 + $exc && $pag <= ($num/3)){			
				if($f == 1){
					$pag = $pag + 1;
					if(($pag-1) == $limite){
						echo "<a href=\"index.php?set=".$set."&func=not&exc=".$exc."&limite=".($pag-1)."\">&nbsp;<u>",($pag),"</u>&nbsp;</a>";;
					}else{
						echo "<a href=\"index.php?set=".$set."&func=not&exc=".$exc."&limite=".($pag-1)."\">&nbsp;",$pag,"&nbsp;</a>";
					}
				}
			}
			elseif($pag >= $exc+15){
				$exc += 15;
				echo "<a href=\"index.php?set=".$set."&func=not&exc=".$exc."&limite=".($pag-1)."\">&nbsp;>>&nbsp;</a>|";
				break;
			}
		}
		echo "</td><td align=\"center\"  width=\"15%\"><a href=\"index.php?set=".$set."&func=not&exc=".$exc."&limite=",($limite+1),"\">Próxima pag. >></a></td>
			</tr></table>";
?>