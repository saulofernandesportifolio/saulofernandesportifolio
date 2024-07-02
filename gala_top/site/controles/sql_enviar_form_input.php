<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_input= date("Y/m/d"); 
 $hora_tratamento_input=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 


if(empty($_POST['substatus']) || empty($_POST['obs_input'])){
    
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
if($_POST['motivodaacao']  == 4){
    
 $disc_motivo_da_acao =utf8_encode("Erro de personalização"); 
    
}
if($_POST['motivodaacao']  == 8){
    
 $disc_motivo_da_acao =utf8_encode("Reprovado por inconsistência"); 
    
}
if($_POST['motivodaacao'] == 7){
    
 $disc_motivo_da_acao ="Input realizado"; 
    
}
if($_POST['motivodaacao']  == 11){
    
 $disc_motivo_da_acao =utf8_encode("Erro na(s) linha(s)"); 
    
}
if($_POST['motivodaacao']  == 16){
    
 $disc_motivo_da_acao =utf8_encode("Aguardando chamado"); 
    
}




if($_POST['substatus'] == 10)
{
$disc_status_cip="Reprovado input";
$tipo="Ilha de Input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="input";
$status=utf8_encode("Pendente");
$acao="Reprovado input";
}
if($_POST['substatus'] == 9 )
{
$disc_status_cip=utf8_encode("Enviar para Análise Input");
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Analise de input";
$status=utf8_encode("Pendente");
$acao="Análise input";
}

if($_POST['substatus'] == 11 )
{
$disc_status_cip="Aguardando chamado";
$tipo="Ilha de Input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
}

if($_POST['substatus'] == 12 )
{
$disc_status_cip="Aguardando Estoque";
$tipo="Ilha de Input";
$enviado_ilha = utf8_encode("Pré-viabilidade concluída");
$sub_status_ilha="Aguardando Estoque";  
$status=utf8_encode("Pendente");
$acao="Aguardando Estoque";    
}


$sub_status_ilha2= utf8_encode($sub_status_ilha);

$obs_input=arrumaString($_POST['obs_input']);

$motivodaacao= utf8_encode($_POST['motivodaacao']);

$sql_update="UPDATE tbl_input a
             SET a.status_cip_input='{$_POST['substatus']}',
                 a.obs_input='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_input='$disc_status_cip',
                 a.dt_tratamento_input='$dt_tratamento_input',
                 a.hora_tratamento_input='$hora_tratamento_input'
                 WHERE a.id_input='$id_input'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


$sql_cota="SELECT * FROM tbl_input WHERE id_input='$id_input'";
$acao_cota = mysql_query($sql_cota) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
		$id_cotacao2      = $linha_cota["id_cotacao"];
		}

$sql_update="UPDATE tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


if($_POST['substatus'] == 9 )
{
         $sql_inserir3 ="INSERT INTO tbl_auditoria(id_cotacao,
                                                status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '13',
                                                       'Distribuir',
                                                       'Auditoria'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   
 
 
if($_POST['substatus'] == 11 )
{
         $sql_inserir3 ="INSERT INTO tbl_chamado(id_cotacao,
                                                status_cip_chamado,
                                               disc_status_cip_chamado,
                                               setor_origem,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Input',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   


 
/*Seleciona o id da tabela serviço para update protocolo*/     
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_input.php');
      </script>
      ";                                        
    exit();
    
?>