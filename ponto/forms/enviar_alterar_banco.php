<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php

$data_atual = date("Y/m/d H:i:s");

include "abreconexao.php";

$sql_valida = "SELECT perfil FROM usuarios WHERE login = '$usuario'";

$acao_valida = mysql_query($sql_valida) or die (mysql_error());

while ($linha_valida = mysql_fetch_assoc($acao_valida))
	{
			$perfil = $linha_valida["perfil"];
	
	}
	
	if ($perfil <> 3)
	
	{
				echo "<script>alert('Voce nao tem permissao para realizar esta alteracao. Em caso de duvidas consulte os administradores do sistema.'); history.back();  </script>\n";
				exit;
	}
	
	else
	{		
				
				$sql_update = "UPDATE banco_horas SET
								banco = '$banco'
								,observacao = '$observacao'
								,usuario_modificacao = '$usuario'
								,data_modificacao = '$data_atual'
								WHERE usuario = '$login'";
								
								$acao_update = mysql_query($sql_update) or die (mysql_error());
								
										echo "<script>alert('Banco alterado com sucesso.'); window.open('consulta_banco_horas2.php?&usuario=$usuario&login=0&re=','conteudo'); </script>\n";
										exit;

		}

?>


</body>
</html>
