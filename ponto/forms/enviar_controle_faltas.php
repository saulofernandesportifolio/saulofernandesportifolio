<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php


date_default_timezone_set("Brazil/East");

$dia_reg =  substr($data_falta,8,2); 
$mes_reg =  substr($data_falta,5,2);
$ano_reg =  substr($data_falta,0,4);

$data_impressao = $dia_reg."/".$mes_reg."/".$ano_reg;

$data_entrada = $data_falta;




$data_atual = date("Y/m/d H:i:s");

include "abreconexao.php";

$sql_nome = "SELECT * FROM usuarios WHERE login = '".$_REQUEST['login']."'";

$acao_nome = mysql_query($sql_nome) or die (mysql_error());

while($linha_nome = mysql_fetch_assoc($acao_nome))
{

$nome					= $linha_nome["nome"];
$carga_horaria_normal	= $linha_nome["carga_horaria"];
$carga_hora_sab			= $linha_nome["carga_horaria_sab"];

}


include "dia_semana.php";

if ($dia <> '6')
		{
			$carga_horaria = $carga_horaria_normal;
		}
		
else
		{
			$carga_horaria = $carga_hora_sab;
		}
		






$sql_valida = "SELECT data_entrada, id FROM registro_ponto WHERE data_entrada = '".$_REQUEST['data_falta']."' and usuario = '".$_REQUEST['login']."'";

$acao_valida = mysql_query($sql_valida) or die (mysql_error());

while($linha_valida = mysql_fetch_assoc($acao_valida))
{
	$data_entrada		= $linha_valida["data_entrada"];
	$id					= $linha_valida["id"];
	
}



		if(isset($id))
		{
				
				
							
							$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '".$_REQUEST['login']."'";
							
							$acao_banco = mysql_query($sql_banco) or die (mysql_error());
							
							while ($linha_banco = mysql_fetch_assoc($acao_banco))
							{
								$banco = $linha_banco["banco"];
							}
							
							$novo_banco = $banco - $carga_horaria;
							
							$novo_banco = "$novo_banco:00:00";
							
							$falta = "$carga_horaria:00:00";
							
							$sql_reg_ponto = "UPDATE registro_ponto SET
												hora_entrada = NULL
												,data_hora_ent = NULL
												,data_saida = NULL
												,hora_saida = NULL
												,data_hora_saida = NULL
												,inicio_intervalo = NULL
												,fim_intervalo = NULL
												,falta = '$falta'
												,classificacao = '$tipo_falta'
												,usuario_modificacao = '$usuario'
												,data_modificacao = '$data_atual'
												WHERE id = $id";
												
												$acao_reg_ponto = mysql_query($sql_reg_ponto) or die (mysql_error());
												
												
												$sql_reg_banco = "UPDATE banco_horas SET
																   banco = '$novo_banco'
																   WHERE usuario = '$login'";
																   
																   $acao_reg_banco = mysql_query($sql_reg_banco) or die (mysql_error());
												
												
									echo "<script>alert('Falta adicionada com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
									exit;
					
							
					}
				
				if(!isset($id))
				
				{
				
				
				
				
							$sql_banco = "SELECT * FROM banco_horas WHERE usuario = '".$_REQUEST['login']."'";
							
							$acao_banco = mysql_query($sql_banco) or die (mysql_error());
							
							while ($linha_banco = mysql_fetch_assoc($acao_banco))
							{
								$banco = $linha_banco["banco"];
							}
							
							$novo_banco = $banco - $carga_horaria;
							
							$novo_banco = "$novo_banco:00:00";
							
							$falta = "$carga_horaria:00:00";
							
							include "dia_semana.php";
							
							$sql_reg_ponto = "INSERT INTO registro_ponto (usuario, nome, data_impressao, dia_impressao, data_entrada, falta, classificacao, usuario_modificacao, data_modificacao) VALUES ('$login', '$nome', '$data_impressao', '$diasemana[$dia]', '$data_falta', '$falta', '$tipo_falta', '$usuario', '$data_atual')";
							
							$acao_reg_ponto = mysql_query($sql_reg_ponto) or die (mysql_error());
							
							$sql_reg_banco = "UPDATE banco_horas SET
												banco = '$novo_banco'
												WHERE usuario = '$login'";
																   
												$acao_reg_banco = mysql_query($sql_reg_banco) or die (mysql_error());
		
												echo "<script>alert('Falta adicionada com sucesso.'); window.open('conteudo.php?&usuario=$usuario','conteudo'); </script>\n";
												exit;
				
				
				}


?>

</body>
</html>
