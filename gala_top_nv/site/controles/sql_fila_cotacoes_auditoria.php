<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario


$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y/m/d"); 
 $hora_dia=date("H:i:s");
//Verifica se existe atividades pendentes no VivoCorp vinculadas ao usuario

if($perfil == 5 || $perfil == 12){
 
 
    
$_COOKIE['idtbl_usuario'];
    
$sql_verifca = "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.status_cip_auditoria,
                b.disc_status_cip_auditoria
                FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_auditoria = 14 and
                      b.idtbl_usuario_auditoria ='{$_COOKIE['idtbl_usuario']}' 
         GROUP BY a.criado_em,a.cotacao_principal ASC LIMIT 0,20000 ";
$acao_verifica = mysql_query($sql_verifca) or die (mysql_error());  
    
$num = mysql_num_rows($acao_verifica);

if($num <= 0)
{
$situacao="Sem Cotações";

$query="UPDATE tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario ='{$_COOKIE['idtbl_usuario']}'";
	   
 //envia a consulta sql para o mysql
(!mysql_query($query,$conecta)); 


        echo "<script type=\"text/javascript\">
            alert('Voce nao possui cotações em sua visão. Por favor entre em contato com a distribuição.');
			document.location.replace('principal.php');
			 </script>";
        exit;
    }


$sql_cota = "SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
                a.ALTAS,
                a.PORTABILIDADE2,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,
                a.PRE_POS,
                a.MIGRACAO_TROCA,                 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.status_cip_auditoria,
                b.disc_status_cip_auditoria
                FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao 
                WHERE a.carteira LIKE '$canal%' and 
                      b.status_cip_auditoria = 14 and
                      b.idtbl_usuario_auditoria ='{$_COOKIE['idtbl_usuario']}'              
         GROUP BY a.criado_em,a.cotacao_principal ASC LIMIT 0,20000 ";
$acao_atv = mysql_query($sql_cota) or die (mysql_error());

$situacao="Com Cotações";

$query="UPDATE tbl_usuarios SET situacao2 = '$situacao' WHERE idtbl_usuario = '{$_COOKIE['idtbl_usuario']}'";
 //envia a consulta sql para o mysql
(!mysql_query($query,$conecta)); 
}

?>