<?php
$tipo = $_POST['tipo'];

if($tipo == 'pedido'){
	echo"
		<script type=\"text/javascript\">
		document.location.replace('pesquisa_contestacoes.php');
		</script>
 	";
}elseif($tipo == 'atividade'){
	echo"
		<script type=\"text/javascript\">
		document.location.replace('pesquisa_contestacoes_atv.php');
		</script>
 	";
}else{
	die('erro: conteudo inválido ('.$tipo.')');
}