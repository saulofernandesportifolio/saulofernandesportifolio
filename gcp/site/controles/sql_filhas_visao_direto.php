<head>
<script>
function redireciona() {
window.close();
opener.location.href="../../site/forms/formbaixar_filhas_direto_input.php";
}
</script>
</head>
<?php

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_tratamento_input= date("y/m/d");
  
  $hora_tratamento_input = date("H:i:s");
  





 include("../../bd.php");


if (empty($_POST["id_cotacao2"]))
{
	echo "<script>alert('Nenhuma cotacao selecionada.'); window.history.go(-1); </script>\n";
	exit;
}
else
{

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
    
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
    }

/*if($_POST['substatus'] == 9 ){

  $disc_status_cip_input='Análise input';

}elseif($_POST['substatus'] == 10 ){

  $disc_status_cip_input='Reprovado input';

}elseif($_POST['substatus'] == 11 ){

  $disc_status_cip_input='Aguardando chamado';

}*/

$selectobs="SELECT * FROM cip_nv.tbl_input a 
INNER JOIN cip_nv.tbl_cotacao b 
ON a.id_cotacao=b.id_cotacao 
WHERE a.id_cotacao='{$_POST['id_complementar_da_principal']}'";
$acao_obs= mysql_query($selectobs,$conecta) or die (mysql_error()); 
$linha_obs = mysql_fetch_assoc($acao_obs);




if($_POST['substatus'] == 10)
{
$disc_status_cip_input="Reprovado input";
$tipo="Ilha de Input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="input";
$status=utf8_encode("Pendente");
$acao="Reprovado input";
}
if($_POST['substatus'] == 9 )
{
$disc_status_cip_input=utf8_encode("Enviar para Análise Input");
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Analise de input";
$status=utf8_encode("Pendente");
$acao="Análise input";
}

if($_POST['substatus'] == 11 )
{
$disc_status_cip_input="Aguardando chamado";
$tipo="Ilha de Input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
}




if($_POST['motivodaacao']== 7 ){

  $disc_motivo_da_acao='Input realizado';

}elseif($_POST['motivodaacao'] == 8 ){

  $disc_motivo_da_acao='Reprovado por inconsistência';

}elseif($_POST['motivodaacao'] == 16){

  $disc_motivo_da_acao='Pendente chamado';

}





 $sql_update1 = "UPDATE cip_nv.tbl_input SET
                    status_cip_input      ='{$_POST['substatus']}',
                    disc_status_cip_input ='$disc_status_cip_input',
                    motivo_da_acao        ='{$_POST['motivodaacao']}',
                    disc_motivo_da_acao   ='$disc_motivo_da_acao',
                    obs_input             ='{$linha_obs['obs_input']}',
                    idtbl_usuario_input   ='$idtbl_usuario',
					          dt_tratamento_input   = '$dt_tratamento_input' ,
                    hora_tratamento_input = '$hora_tratamento_input'

					WHERE id_cotacao = '{$_POST['id_cotacao2']}' ";
	
$result = mysql_query($sql_update1,$conecta) or die(mysql_error());  


if($_POST['substatus'] == 9 )
{
         $sql_inserir3 ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '13',
                                                       'Distribuir',
                                                       'Auditoria'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
}   




if($_POST['substatus'] == 11 )
{
         $sql_inserir3 ="INSERT INTO cip_nv.tbl_chamado(id_cotacao,
                                                status_cip_chamado,
                                               disc_status_cip_chamado,
                                               setor_origem,
                                               setor)
                                                VALUES('{$_POST['id_cotacao2']}',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Input',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
}  



$sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha',
                 b.acao='$acao',
                 b.status='$status'
                 WHERE b.id_cotacao='{$_POST['id_cotacao2']}'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 




  

 $id_complementar_da_principal=$_POST['id_complementar_da_principal'];

echo "<script>alert('Cadastrado com sucesso !'); 
	    document.location.replace('../forms/formbaixar_filhas_direto_input.php?id_complementar_da_principal={$id_complementar_da_principal}');
	               </script>\n";
	exit;

}

?>	


</body>
</html>