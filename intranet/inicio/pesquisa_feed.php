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

if($pesquisa == "normal"){
    if(isset($_COOKIE['sql_pesquisa'])){
        $sql = $_COOKIE['sql_pesquisa'];
    }
    else{
        $sql = "SELECT * FROM feed WHERE titulo LIKE '%".$assunto."%' OR conteudo LIKE '%".$assunto."%';";
        //Cria COOKIE
        setcookie('sql_pesquisa',$sql);
    }
}
elseif($pesquisa == "detalhada"){
  if(isset($_COOKIE['sql_pesquisa'])){
	  $sql = $_COOKIE['sql_pesquisa'];
  }
  else{
    $sql = "SELECT * FROM feed WHERE ";
    if(isset($titulo)){
        $sql = $sql."titulo LIKE '%".$assunto."%' OR conteudo LIKE '%".$assunto."%' ";
    }
    if(isset($titulo) && isset($tipo)){
        $sql = $sql."AND ";
    }
    if(isset($tipo)){
        $sql = $sql."tipo = '".$tipo."' OR tipo = 'todos' ";
    }
	
    //Concatena AdWords
    for($k=1; $k <= 15 ; $k++){
        $variavel = "adwords".$k;
        if( isset($$variavel) && $$variavel <> ""){
        	if(!isset($concatena_adwords)){
        	  $concatena_adwords = "AND adwords LIKE '%".$$variavel."%' ";
            }
        	else{
        	  $concatena_adwords = $concatena_adwords."OR adwords LIKE '%".$$variavel."%' ";
            }
        }
	}
	if(isset($concatena_adwords)){$sql = $sql.$concatena_adwords;}
    
    //Cria COOKIE
	setcookie('sql_pesquisa',$sql);
 }
}

$feeds = mysql_query($sql) or die (mysql_error());

//Armazena o total de pedidos tramitando
$num = mysql_num_rows($feeds);

//Executa o Array sequencial que salvará os dados na tabela				
	for($i=0;$i < (($limite*3)+3); $i++){
		$linha = mysql_fetch_assoc($feeds);
	    $id_feed     = $linha["id"];
	    $titulo      = $linha["titulo"];
	    $us_post     = $linha["us_post"];
	    $dt_post     = $linha["dt_post"];
	    $tipo        = $linha["tipo"];
		$conteudo    = $linha["conteudo"];
		$adwords     = $linha["adwords"];
		
		//Controla se os dados que serão exibidos estão de acordo com o solicitado (de 15 em 15)	
		if($i >= ($limite * 3) && $i < mysql_num_rows($feeds)){
			$cont = $cont + 1;
			?>
			</br><H2><?php echo substr($titulo,0,51);?></H2>
			<p><?php echo substr($conteudo,0,strrpos(substr($conteudo,0,125)," "));?>...</p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?func=feed&id_feed=<?php echo $id_feed;?>">leia mais...</a>
			<hr>
			<?php }
	}
//Não permite que a variável seja decrementada quando ja estão sendo exibidos os primeiros valores
//nem que seja incrementada quando não houver valores a serem exibidos.
	if(($limite*3) >= $num || $limite < 0){
		echo "<script>history.back()</script>";
	exit;
	}
//Constrói o rodapé da tabela
		echo "<table class=\"no_format\"><tr>
			<td align=\"left\"><a href=\"index.php?func=pesq&pesquisa=detalhada&limite=",($limite-1),"\">&nbsp;&nbsp;<< Exibir menos</a></td>";
		
		
		for($j=0; $j < floor($num/3);$j++){
			
			if($j==0){echo "<td>Paginas: ";}
			
			echo "<a href=\"index.php?func=pesq&pesquisa=detalhada&limite=".($j)."\">&nbsp;";
			if($limite == $j){
				echo "<u>",($j+1),"</u>";
			}else{
				echo ($j+1);
			}
			
			echo "&nbsp;</a>";
		}
		echo "</td><td align=\"right\"><a href=\"index.php?func=pesq&pesquisa=detalhada&limite=",($limite+1),"\">Exibir mais >></a></td>
			</tr></table>
		";
?>