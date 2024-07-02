<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $dt_tratamento_input= date("Y/m/d"); 
 $hora_tratamento_input=date("H:i:s");

  function arrumaString($string) {

 return preg_replace( '/[`^\\~\'"]/', null,iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}


function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

}


 $idtbl_usuario=$_COOKIE['idtbl_usuario'];
 
$id_input= (int) $_GET['id_input'];

if(empty($_POST['substatus']) || empty($_POST['obs_input'])){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}



if(!empty($_POST['MIGRACAO']) && empty($_POST['renegociacao']) || !empty($_POST['MIGRACAO_TROCA']) && empty($_POST['renegociacao'])){
    
echo" <script> 
      alert('Por favor preencher o formulario o campo encaminhado para renegociação!');
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
if($_POST['motivodaacao']  == 4){
    
 $disc_motivo_da_acao ="Erro de personalização"; 
    
}
if($_POST['motivodaacao']  == 8){
    
 $disc_motivo_da_acao ="Reprovado por inconsistência"; 
    
}
if($_POST['motivodaacao'] == 7){
    
 $disc_motivo_da_acao ="Input realizado"; 
    
}
if($_POST['motivodaacao']  == 11){
    
 $disc_motivo_da_acao ="Erro na(s) linha(s)"; 
    
}
if($_POST['motivodaacao']  == 16){
    
 $disc_motivo_da_acao ="Aguardando chamado"; 
    
}







if($_POST['substatus'] == 10)
{
$disc_status_cip="Reprovado input";
$tipo="Ilha de Input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="input";
$status="Pendente";
$acao="Reprovado input";
}
if($_POST['substatus'] == 9 )
{
$disc_status_cip="Enviar para Análise Input";
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Analise de input";
$status="Pendente";
$acao="Análise input";
}

if($_POST['substatus'] == 11 )
{
$disc_status_cip="Aguardando chamado";
$tipo="Ilha de Input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status="Pendente";
$acao="Pendente chamado";
}

if($_POST['substatus'] == 12 )
{
$disc_status_cip="Aguardando Estoque";
$tipo="Ilha de Input";
$enviado_ilha ="Pré-viabilidade concluída";
$sub_status_ilha="Aguardando Estoque";  
$status="Pendente";
$acao="Aguardando Estoque";    
}

if($_POST['substatus'] == 36 )
{
$disc_status_cip_input="Cancelada";
$tipo="Ilha de Input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status="Cancelada";
$acao="Cancelada";
}


$sub_status_ilha2= $sub_status_ilha;

$obs_input=tiraaspasimples($_POST['obs_input']);

$motivodaacao= $_POST['motivodaacao'];

$renegociacao=$_POST['renegociacao'];

$sql_update="UPDATE cip_nv.tbl_input a
             SET a.status_cip_input='{$_POST['substatus']}',
                 a.obs_input='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_input='$disc_status_cip',
                 a.dt_tratamento_input='$dt_tratamento_input',
                 a.hora_tratamento_input='$hora_tratamento_input'
                 WHERE a.id_input='$id_input'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


$sql_cota="SELECT * FROM cip_nv.tbl_input WHERE id_input='$id_input'";
$acao_cota = mysql_query($sql_cota,$conecta) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
		$id_cotacao2      = $linha_cota["id_cotacao"];
		}

  $sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status',
                 b.renegociacao='$renegociacao'    
                 WHERE b.id_cotacao='$id_cotacao2'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


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

$sqlch="SELECT * FROM cip_nv.tbl_chamado WHERE id_cotacao='$id_cotacao2' AND setor_origem='Input' AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
$resultch = mysql_query($sqlch,$conecta) or die(mysql_error());
$numch= mysql_num_rows($resultch);

if($numch == 0){


         $sql_inserir3 ="INSERT INTO cip_nv.tbl_chamado(id_cotacao,
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
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
  }
}   


/* aguardando para iniciar*/
if($_POST['substatus'] == 10 ){

echo"<script>
  alert('Cadastrar Motivo Reprovação!');
  document.location.replace('principal.php?&id_input={$id_input}&t=forms/form_reprovacao_input.php');

</script>";

}
elseif($_POST['substatus'] != 10 ){


 
/*Seleciona o id da tabela serviço para update protocolo*/     
       
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_input.php');
      </script>
      ";                                        
    exit();

}

mysql_free_result($acao_update,$acao,$acao_cota,$acao_operador,$result3,$resultch);
mysql_close($conecta);
mysql_next_result($conecta);    


    
?>