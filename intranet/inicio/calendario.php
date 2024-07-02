<!--
-Projeto: Calendário
-Autor: Lauro Pereira
-Data: 31/07/2013
-->
<?php //Controle de variáveis já existentes

if(!isset($id_usuario)){$id_usuario = "";}
if(!isset($id_evento)){$id_evento = "";}
if(!isset($id_feed)){$id_feed = "";}

?>
<center>
<br />
<table id="tbCalendario" class="no_format">
	<?php
	if(!isset($_COOKIE['login'])){echo '<tr><td colspan="7"><div align="center" id="naoLogado"><font>Faça login para inserir eventos.</font></div></td></tr>';}
	if(date("m") < 10)
    {
	   $mes = str_replace('0','',date("m"));
    }
    else
    {
        $mes = date("m");
    }
	$ano = date("Y");

	//VERIFICA SE EXISTE VARIAÇÃO DE DATA
	if(!isset($datavar)){
		$datavar = 0;
	}
	//ALTERA DATA
	$aux = $mes + $datavar; 
	//DECREMENTA MES ATÉ 1, CASO PASSE DECREMENTA O ANO
		while($aux < 1){
			$aux = $aux + 12;
			$ano = $ano - 1;
		}
	//INCREMENTA MES ATÉ 12, CASO PASSE INCREMENTA O ANO
		while($aux > 12){
			$aux = $aux - 12;
			$ano = $ano + 1;
		}
		if(($aux >0) && ($aux <13)){$mes = $aux;}

	//MÊS EXIBIDO NA PARTE SUPERIOR DO CALENDÁRIO
	echo 
	"<tr><td><a href=\"index.php?set=".$set."&func=".$func."&datavar=".($datavar-1)."&id_usuario=".$id_usuario."&id_evento=".$id_evento."&id_feed=".$id_feed."\"> < </a></td>
         <td colspan='5'><font>".
	ucfirst($mesano["$mes"])." - ".$ano."</font></td>
         <td><a href=\"index.php?set=".$set."&func=".$func."&datavar=".($datavar+1)."&id_usuario=".$id_usuario."&id_evento=".$id_evento."&id_feed=".$id_feed."\"> > </a></td>";

	//CABEÇALHO COM OS DIAS DA SEMANA DE DOM À SEX
	echo "<tr><td><strong>Dom</strong>
		  <td><strong>Seg</strong></td>
		  <td><strong>Ter</strong></td>
		  <td><strong>Qua</strong></td>
		  <td><strong>Qui</strong></td>
		  <td><strong>Sex</strong></td>
		  <td><strong>Sab</strong></td></tr>";
		 
	$dia = 1;
	$num_dias = date('t', mktime(0,0,0,$mes,1,$ano));
	$pdm = date('w',mktime(0,0,0,$mes,1,$ano));
  	//CORIA A VARIAVEL $cont COM A QUANTIA DE LINHAS QUE SERÃO NECESSÁRIAS PARA O CALENDÁRIO
	if( $pdm + $num_dias <= (7 * 5 )){
		$cont = 5;}
	else{$cont = 6;}
	
	//FORMATA O PRIMEIRO DIA DA SEMANA DO MÊS COM DOMINGO = 0
	if($pdm == 7){$pdm = 0;}
	
	//LAÇO DE REPETIÇÃO PARA LINHAS (<TR>) (SEMANAS)
	for($i=1; $i <= $cont; $i++){
		echo "<tr>";
		//LAÇO DE REPETIÇÃO PARA COLUNAS (<TD>) (DIAS)
		for($j=0; $j < 7 ; $j++){
			$evento = "";
			$tipo = "";
			//COLOCA CÉLULAS VAZIAS NOS DIAS EM QUE O MÊS AINDA NÃO COMEÇOU
			if( $j < $pdm && $i == 1){echo "<td></td>";}
			else{
				if($dia <= $num_dias){
					//ALTERA A CLASSE DOS PRIMEIROS DIAS DA SEMANA (DOMINGO) PARA FORMATAÇÃO CSS ESPECIAL
					if ($j == 0){$tipo = 'domingo';}
					
					//VERIFICA SE O USUARIO ESTÁ LOGADO
					if(!isset($_COOKIE['login']))
					{$login = "";}else{$login = $_COOKIE['login'];}
					
					//CONSULTA PARA OS EVENTOS DO DIA
					$sql = "SELECT * FROM calendario WHERE data = '".date("Y-m-d",mktime(0,0,0,$mes,$dia,$ano))."' AND
					(tipo <> 'pessoal' OR (tipo = 'pessoal' AND us_evento = '".$login."')) ORDER BY tipo DESC;";
					
					$acao = mysql_query($sql) or die (mysql_error());
					
					//ATRIBUI EVENTOS CONCATENADOS À VARIAVEL $evento
					$x = 0;
					while($campo = mysql_fetch_assoc($acao))
					{	
						if( $x == 0 ){$evento = $evento."-".$campo["evento"];}
						else{$evento = $evento."\n-".$campo["evento"];}
						
						if($campo["us_evento"] != NULL){
								$evento	= $evento." por ".$campo["us_evento"];
						}
						$tipo = $campo["tipo"];
						$x = $x + 1;
					}
					echo "<td><a onclick='naoLogado()'";
					if(isset($_COOKIE['login'])){
						echo "href=\"index.php?func=add_event&data=".date("Y-m-d",mktime(0,0,0,$mes,$dia,$ano))."\" ";}
					else {echo "href=\"#\" ";}
					echo "title='".$evento."' class='".$tipo."''>&nbsp;&nbsp;&nbsp;".$dia."&nbsp;&nbsp;&nbsp;</a></td>";
					
				$dia = $dia + 1;	
				}
				else{echo "<td></td>";}
			}
		}
		echo "</tr>";
	}
?>
</table>
</center>