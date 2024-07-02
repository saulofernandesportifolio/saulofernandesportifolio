
<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_chamado= date("Y/m/d"); 
 $hora_tratamento_chamado=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 


if(empty($_POST['substatus']) || empty($_POST['obs_chamado'])){
    
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


if($_POST['motivodaacao']  == 24 ){
    
 $disc_motivo_da_acao =utf8_encode("Aguardando chamado"); 
    
}

if($_POST['motivodaacao']  == 25){
    
 $disc_motivo_da_acao =utf8_encode("Chamado solucionado"); 
    
}

if($_POST['motivodaacao']  == 26){
    
 $disc_motivo_da_acao =utf8_encode("Erro de personalização"); 
    
}

if($_POST['motivodaacao']  == 27){
    
 $disc_motivo_da_acao =utf8_encode("Erro na(s) linha(s)"); 
    
}

if($_POST['motivodaacao']  == 28){
    
 $disc_motivo_da_acao =utf8_encode("Falta de estoque"); 
    
}


if($_POST['substatus'] == 31 )
{
$disc_status_cip="Aguardando chamado";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
}

if($_POST['substatus'] == 32 )
{
$disc_status_cip="Chamado solucionado";
$status=utf8_encode("Pendente");
$acao="Chamado solucionado";    
}
if($_POST['substatus'] == 33 )
{
$disc_status_cip="Chamado em tratativa";
$status=utf8_encode("Pendente");
$acao="Pendente chamado";
}


$obs_input=arrumaString($_POST['obs_chamado']);

$motivodaacao= utf8_encode($_POST['motivodaacao']);

$sql_update="UPDATE tbl_chamado a
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_tratamento_chamado',
                 a.hora_tratamento_chamado='$hora_tratamento_chamado'
                 WHERE a.id_chamado='$id_chamado'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


$sql_cota="SELECT * FROM tbl_chamado WHERE id_chamado='$id_chamado' ";
$acao_cota = mysql_query($sql_cota) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
	     $id_cotacao2      = $linha_cota["id_cotacao"];
		}

$sql_update="UPDATE tbl_cotacao b
             SET b.acao='$acao',
                 b.motivo_da_acao='$motivodaacao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


if($_POST['substatus'] == 32 && $_POST['setor_origem']  == 'Input' )
{
        $sql_inserir3 ="INSERT INTO tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '7',
                                                       'Retorno chamado',
                                                       'Input'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   

if($_POST['substatus'] == 32 && $_POST['setor_origem']  == 'Auditoria' )
{
         $sql_inserir3 ="INSERT INTO tbl_auditoria(id_cotacao,
                                                status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '13',
                                                       'Retorno chamado',
                                                       'Auditoria'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   
 
if($_POST['substatus'] == 32 && $_POST['setor_origem']  == 'Correcao' )
{
         $sql_inserir3 ="INSERT INTO tbl_input(id_cotacao,
                                                status_cip_correcao,
                                                disc_status_cip_auditoria,
                                                setor)
                                                VALUES('$id_cotacao2',
                                                       '20',
                                                       'Retorno chamado',
                                                       'Correcao'
                                                       )";
          $result3 = mysql_query($sql_inserir3) or die(mysql_error());
}   
/*Seleciona o id da tabela serviço para update protocolo*/     
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_chamado.php');
      </script>
      ";                                        
    exit();
    
?>