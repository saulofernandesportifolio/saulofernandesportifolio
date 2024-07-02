
<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_analise= date("Y/m/d"); 
 $hora_tratamento_analise=date("H:i:s");

 $data_correcao_analise= date("Y/m/d"); 
 $hora_correcao_analise=date("H:i:s");



  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 


if(empty($statuscorrecao) || empty($obs_correcao_op)){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}


$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='$idtbl_usuario'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
		while($linha_operador = mysql_fetch_assoc($acao_operador))
		{
		$idtbl_usuario      = $linha_operador["idtbl_usuario"];
		}


if($_POST['motivodaacao']  == 1 ){
    
 $disc_motivo_da_acao =utf8_encode("Correção realizada input"); 
    
}




if($_POST['statuscorrecao'] == 24 )
{
$disc_status_cip=utf8_encode("Enviar para correção input");
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correção input";
$status=utf8_encode("Pendente");
$acao=utf8_encode("Correção input"); 
}
if($_POST['statuscorrecao'] == 26)
{
$disc_status_cip=utf8_encode("Corrigida a correção input");
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correção input";
$status=utf8_encode("Concluída");
$acao=utf8_encode("Correção input"); 
}

$sub_status_ilha2=utf8_encode($sub_status_ilha);

$obs_correcao_op=arrumaString($_POST['obs_correcao_op']);



$sql_update="UPDATE tbl_input a
             SET a.status_correcao='{$_POST['statuscorrecao']}',
                 a.obs_correcao_op='$obs_correcao_op',
                 a.disc_status_correcao='$disc_status_cip',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.data_correcao='$data_correcao_analise',
                 a.hora_correcao='$hora_correcao_analise'
                 WHERE a.id_input='$id_input'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


$sql_cota="SELECT * FROM tbl_input WHERE id_input='$id_input'";
$acao_cota = mysql_query($sql_cota) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
		$id_cotacao2      = $linha_cota["id_cotacao"];
		}

$sql_update="UPDATE tbl_cotacao b
             SET b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2'
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 




/*Seleciona o id da tabela serviço para update protocolo*/     
      
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_input.php');
      </script>
      ";                                        
    exit();
  
?>