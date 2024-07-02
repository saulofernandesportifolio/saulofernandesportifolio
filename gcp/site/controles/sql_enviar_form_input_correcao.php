
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
 


 $id_input= (int) $_GET['id_analise'];

 $id_cotacao = (int) $_GET['id_cotacao'];


if(empty($_POST['statuscorrecao']) || empty($_POST['obs_correcao_op'])){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='$idtbl_usuario'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
		while($linha_operador = mysql_fetch_assoc($acao_operador))
		{
		$idtbl_usuario      = $linha_operador["idtbl_usuario"];
		}


if($_POST['motivodaacao']  == 1 ){
    
 $disc_motivo_da_acao ="Correção realizada input"; 
    
}




if($_POST['statuscorrecao'] == 24 )
{
$disc_status_cip="Enviar para correção input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correção input";
$status="Pendente";
$acao="Correção input"; 
}
if($_POST['statuscorrecao'] == 26)
{
$disc_status_cip="Corrigida a correção input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correção input";
$status="Concluída";
$acao="Correção input"; 
}

$sub_status_ilha2=$sub_status_ilha;

$obs_correcao_op=$_POST['obs_correcao_op'];



$sql_update="UPDATE cip_nv.tbl_input a
             SET a.status_correcao='{$_POST['statuscorrecao']}',
                 a.obs_correcao_op='$obs_correcao_op',
                 a.disc_status_correcao='$disc_status_cip',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.data_correcao='$data_correcao_analise',
                 a.hora_correcao='$hora_correcao_analise'
                 WHERE a.id_input='$id_input'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


$sql_cota="SELECT * FROM cip_nv.tbl_input WHERE id_input='$id_input'";
$acao_cota = mysql_query($sql_cota,$conecta) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
		$id_cotacao2      = $linha_cota["id_cotacao"];
		}

$sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2'
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 



if($_POST['statuscorrecao'] == 26){

$sql_update="UPDATE cip_nv.tbl_correcao b
             SET b.status_cip_correcao=21,
                 b.disc_status_cip_correcao='Corrigida no Input' 
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error());

}


/*Seleciona o id da tabela serviço para update protocolo*/     
      
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_input.php');
      </script>
      ";                                        
    exit();


mysql_free_result($acao_update,$acao_cota,$acao_operador);
mysql_close($conecta);
mysql_next_result($conecta);  

  
?>