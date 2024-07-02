
<?php




$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_correcao = date("Y/m/d"); 
 $hora_tratamento_correcao =date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 



if(empty($substatus) || empty($obs_correcao)){
    
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



if($_POST['motivodaacao']  == 17 ){
    
 $disc_motivo_da_acao =utf8_encode("Aguardando chamado"); 
    
}

if($_POST['motivodaacao']  == 19){
    
 $disc_motivo_da_acao =utf8_encode("Documentação aprovada"); 
    
}

if($_POST['motivodaacao']  == 20){
    
 $disc_motivo_da_acao =utf8_encode("Reprovado por inconsistência"); 
    
}

if($_POST['motivodaacao']  == 21){
    
 $disc_motivo_da_acao =utf8_encode("Erro de personalização"); 
    
}

if($_POST['motivodaacao']  == 22){
    
 $disc_motivo_da_acao =utf8_encode("Erro na(s) linha(s)"); 
    
}

if($_POST['motivodaacao']  == 23){
    
 $disc_motivo_da_acao =utf8_encode("Falta de estoque"); 
    
}


if($_POST['substatus'] == 22)
{
$disc_status_cip=utf8_encode("Enviar para correção input");
$tipo="Correcao input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correcao input";
$status=utf8_encode("Pendente");
$acao=utf8_encode("Correção input");
}
if($_POST['substatus'] == 23 )
{
$disc_status_cip=utf8_encode("Enviar para correção analise");
$tipo="Correcao input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correcao input";
$status=utf8_encode("Pendente");
$acao=utf8_encode("Correção input");
}

if($_POST['substatus'] == 30 )
{
$disc_status_cip="Pendente chamado";
$tipo="Correcao input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correcao input";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
}


if($_POST['substatus'] == 28 )
{
$disc_status_cip=utf8_encode("Aprovado Análise");
$tipo="Correcao input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Correcao input";
$status=utf8_encode("Concluída");
$acao=utf8_encode("Aprovado análise");
}

if($_POST['substatus'] == 29)
{
$disc_status_cip=utf8_encode("Reprovado Análise");
$tipo="Correcao input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="Correcao input";
$status=utf8_encode("Pendente");
$acao=utf8_encode("Reprovado Análise");
}


$sub_status_ilha2= utf8_encode($sub_status_ilha);

$obs_correcao=arrumaString($_POST['obs_correcao']);

$motivodaacao= utf8_encode($_POST['motivodaacao']);

$sql_update="UPDATE tbl_correcao a
             SET a.status_cip_correcao='{$_POST['substatus']}',
                 a.obs_correcao='$obs_correcao',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_correcao='$disc_status_cip',
                 a.dt_tratamento_correcao='$dt_tratamento_correcao',
                 a.hora_tratamento_correcao='$hora_tratamento_correcao'
                 WHERE a.id_correcao='$id_correcao'";
$acao_update= mysql_query($sql_update) or die (mysql_error());





$sql_cota="SELECT * FROM tbl_correcao WHERE id_correcao='$id_correcao'";
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



if($_POST['substatus'] == 22 )
{
   $sql_inserir3 ="UPDATE tbl_input
                   SET status_correcao=24,
                       disc_status_correcao='Corrigir',
                       id_correcao= '$id_correcao'
                   WHERE id_cotacao='$id_cotacao2'";
                   
  $result3 = mysql_query($sql_inserir3) or die(mysql_error());

  
}   


if($_POST['substatus'] == 23 )
{
   $sql_inserir3 ="UPDATE tbl_analise
                   SET status_correcao=25,
                       disc_status_correcao='Corrigir',
                       id_correcao= '$id_correcao'
                   WHERE id_cotacao='$id_cotacao2'";
                   
             $result3 = mysql_query($sql_inserir3) or die(mysql_error());
             
         
             
}
if($_POST['substatus'] == 30 )
{
         $sql_inserir3 ="INSERT INTO tbl_chamado(id_cotacao,
                                                status_cip_chamado,
                                               disc_status_cip_chamado,
                                               setor_origem,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Correcao',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
} 

 
/*Seleciona o id da tabela serviço para update protocolo*/     
      
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_correcao.php');
      </script>
      ";                                        
    exit();
    
?>