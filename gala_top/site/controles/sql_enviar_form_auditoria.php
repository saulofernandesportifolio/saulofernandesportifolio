
<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");

 $dt_tratamento_auditoria= date("Y/m/d"); 
 $hora_tratamento_auditoria=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 



if(empty($_POST['substatus']) || empty($_POST['obs_auditoria'])){
    
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


if($_POST['motivodaacao']  == 3 ){
    
 $disc_motivo_da_acao =utf8_encode("An�lise realizada auditoria"); 
    
}
if($_POST['motivodaacao']  == 5){
    
 $disc_motivo_da_acao =utf8_encode("Personaliza��o incorreta auditoria"); 
    
}

if($_POST['motivodaacao']  == 9){
    
 $disc_motivo_da_acao =utf8_encode("Reprovado por inconsist�ncia auditoria"); 
    
}

if($_POST['motivodaacao']  == 10){
    
 $disc_motivo_da_acao =utf8_encode("Erro de personaliza��o auditoria"); 
    
}

if($_POST['motivodaacao']  == 12){
    
 $disc_motivo_da_acao =utf8_encode("Erro na(s) linha(s) auditoria"); 
    
}

if($_POST['motivodaacao']  == 13){
    
 $disc_motivo_da_acao =utf8_encode("Enviado para corre��o auditoria"); 
    
}

if($_POST['motivodaacao'] == 14){
    
 $disc_motivo_da_acao ="Falta de estoque auditoria"; 
    
}
if($_POST['motivodaacao'] == 15){
    
 $disc_motivo_da_acao ="Aguardando chamado auditoria"; 
    
}




if($_POST['substatus'] == 16 )
{
$disc_status_cip=utf8_encode("Reprovado an�lise input");
$tipo="Analise de input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="An�lise de input";
$status=utf8_encode("Pendente");
$acao=utf8_encode("Reprovado An�lise");
$termino_efetivo=date("y-m-d H:i:s");
}
if($_POST['substatus'] == 15  )
{
$disc_status_cip=utf8_encode("Aprovado an�lise input");
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="An�lise de input";
$status=utf8_encode("Concluida");
$acao=utf8_encode("Aprovado an�lise");
$termino_efetivo=date("y-m-d H:i:s");
}

if($_POST['substatus'] == 17 )
{
$disc_status_cip="Pendente chamado";
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="An�lise de input";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
$termino_efetivo=date("y-m-d H:i:s");


}

if($_POST['substatus'] == 19 )
{
$disc_status_cip="Aguardando Estoque";
$tipo="Analise de input";
$enviado_ilha = utf8_encode("Pr�-viabilidade conclu�da");
$sub_status_ilha="Aguardando Estoque";
$status=utf8_encode("Pendente");
$acao="Aguardando Estoque"; 
$termino_efetivo=date("y-m-d H:i:s");  
}

if($_POST['substatus'] == 18 )
{
$disc_status_cip=utf8_encode("Corre��o input");
$tipo="Correcao input";
$enviado_ilha = "Enviado ilha de input";
$sub_status_ilha="Corre��o input"; 
$status=utf8_encode("Pendente");
$acao=utf8_encode("Corre��o input"); 
$termino_efetivo=date("y-m-d H:i:s");  
}



$sub_status_ilha2= utf8_encode($sub_status_ilha);

$obs_auditoria=arrumaString($_POST['obs_auditoria']);

$motivodaacao= utf8_encode($_POST['motivodaacao']);

$sql_update="UPDATE tbl_auditoria a
             SET a.status_cip_auditoria='{$_POST['substatus']}',
                 a.obs_auditoria='$obs_auditoria',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_auditoria='$disc_status_cip',
                 a.dt_tratamento_auditoria='$dt_tratamento_auditoria',
                 a.hora_tratamento_auditoria='$hora_tratamento_auditoria'
                 WHERE a.id_auditoria='$id_auditoria'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


$sql_cota="SELECT * FROM tbl_auditoria WHERE id_auditoria='$id_auditoria'";
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


if($_POST['substatus'] == 18 )
{
        $sql_inserir3 ="INSERT INTO tbl_correcao(id_cotacao,
                                                status_cip_correcao,
                                               disc_status_cip_correcao,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '20',
                                                       'Distribuir',
                                                       'Correcao'
                                                       )";
   $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   
 
 
if($_POST['substatus'] == 17 )
{
         $sql_inserir3 ="INSERT INTO tbl_chamado(id_cotacao,
                                                status_cip_chamado,
                                               disc_status_cip_chamado,
                                               setor_origem,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '30',
                                                       'Aguardando chamado',
                                                       'Auditoria',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   


 
/*Seleciona o id da tabela servi�o para update protocolo*/     
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_auditoria.php');
      </script>
      ";                                        
    exit();
    
?>