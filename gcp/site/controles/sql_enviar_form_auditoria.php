
<?php



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");

 $dt_tratamento_auditoria= date("Y/m/d"); 
 $hora_tratamento_auditoria=date("H:i:s");

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

$id_auditoria = (int) $_GET['id_auditoria'];

 $sql_filha="SELECT * FROM cip_nv.tbl_erros_cotacao a
INNER JOIN cip_nv.tbl_auditoria c
ON  c.id_cotacao=a.id_cotacao AND a.id_auditoria='$id_auditoria' 
INNER JOIN cip_nv.tbl_usuarios d
ON  d.idtbl_usuario='$idtbl_usuario'";

$acao_filha = mysql_query($sql_filha,$conecta) or die (mysql_error()); 
$num = mysql_num_rows($acao_filha);

if($num <= 0 ){
    
echo" <script> 
      alert('Obrigatorio cadastrar um motivo de erro !');
      history.back();
      </script>
      "; 
      exit();   
    
}


if($_POST['valida_complementar'] == 'Complementar'){

$sql_filha="SELECT * FROM cip_nv.tbl_input a WHERE a.id_cotacao='{$_POST['cotacao_principalf']}' ";

$acao_filha = mysql_query($sql_filha,$conecta) or die (mysql_error()); 

 $numf = mysql_num_rows($acao_filha);

if($numf <= 0 ){
    
echo utf8_encode("<script> 
      alert('É obrigatorio cadastrar o operador que fez as flhas no input clicar no botão (Cadastrar operador input clik aqui) !');
      history.back();
      </script>"); 
      exit();   
    
}

}


if(empty($_POST['substatus']) || empty($_POST['obs_auditoria'])){
    
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


if($_POST['motivodaacao']  == 3 ){
    
 $disc_motivo_da_acao ="Análise realizada auditoria"; 
    
}
if($_POST['motivodaacao']  == 5){
    
 $disc_motivo_da_acao ="Personalização incorreta auditoria"; 
    
}

if($_POST['motivodaacao']  == 9){
    
 $disc_motivo_da_acao ="Reprovado por inconsistência auditoria"; 
    
}

if($_POST['motivodaacao']  == 10){
    
 $disc_motivo_da_acao ="Erro de personalização auditoria"; 
    
}

if($_POST['motivodaacao']  == 12){
    
 $disc_motivo_da_acao ="Erro na(s) linha(s) auditoria"; 
    
}

if($_POST['motivodaacao']  == 13){
    
 $disc_motivo_da_acao ="Enviado para correção auditoria"; 
    
}

if($_POST['motivodaacao'] == 14){
    
 $disc_motivo_da_acao ="Falta de estoque auditoria"; 
    
}
if($_POST['motivodaacao'] == 15){
    
 $disc_motivo_da_acao ="Aguardando chamado auditoria"; 
    
}




if($_POST['substatus'] == 16 )
{
$disc_status_cip="Reprovado análise input";
$tipo="Analise de input";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="Análise de input";
$status="Pendente";
$acao="Reprovado Análise";
$termino_efetivo=date("y-m-d H:i:s");
}
if($_POST['substatus'] == 15  )
{
$disc_status_cip="Aprovado análise input";
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Análise de input";
$status="Concluida";
$acao="Aprovado análise";
$termino_efetivo=date("y-m-d H:i:s");
}

if($_POST['substatus'] == 17 )
{
$disc_status_cip="Aguardando chamado";
$tipo="Analise de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Análise de input";
$status="Pendente";
$acao="Pendente chamado";
$termino_efetivo=date("y-m-d H:i:s");


}

if($_POST['substatus'] == 19 )
{
$disc_status_cip="Aguardando Estoque";
$tipo="Analise de input";
$enviado_ilha = "Pré-viabilidade concluída";
$sub_status_ilha="Aguardando Estoque";
$status= "Pendente";
$acao="Aguardando Estoque"; 
$termino_efetivo=date("y-m-d H:i:s");  
}

if($_POST['substatus'] == 18 )
{
$disc_status_cip= "Correção input";
$tipo="Correcao input";
$enviado_ilha = "Enviado ilha de input";
$sub_status_ilha="Correção input"; 
$status="Pendente";
$acao="Correção input"; 
$termino_efetivo=date("y-m-d H:i:s");  
}



$sub_status_ilha2=$sub_status_ilha;

$_POST['obs_auditoria']=tiraaspasimples($_POST['obs_auditoria']);

$obs_auditoria=arrumaString($_POST['obs_auditoria']);

$motivodaacao= $_POST['motivodaacao'];

$renegociacao=$_POST['renegociacao'];


$sql_update="UPDATE cip_nv.tbl_auditoria a
             SET a.status_cip_auditoria='{$_POST['substatus']}',
                 a.obs_auditoria='$obs_auditoria',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_auditoria='$disc_status_cip',
                 a.dt_tratamento_auditoria='$dt_tratamento_auditoria',
                 a.hora_tratamento_auditoria='$hora_tratamento_auditoria'
                 WHERE a.id_auditoria='$id_auditoria'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


$sql_cota="SELECT * FROM cip_nv.tbl_auditoria WHERE id_auditoria='$id_auditoria'";
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


if($_POST['substatus'] == 18 )
{
        $sql_inserir3 ="INSERT INTO cip_nv.tbl_correcao(id_cotacao,
                                                status_cip_correcao,
                                               disc_status_cip_correcao,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '20',
                                                       'Distribuir',
                                                       'Correcao'
                                                       )";
   $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
}   
 
 
if($_POST['substatus'] == 17 )  
{

$sqlch="SELECT * FROM cip_nv.tbl_chamado WHERE id_cotacao='$id_cotacao2' AND setor_origem='Auditoria' AND (status_cip_chamado=30 OR status_cip_chamado=33 OR status_cip_chamado=31 )  ";
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
                                                       'Auditoria',
                                                       'chamado'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());

  }

}   


/* aguardando para iniciar*/
if($_POST['substatus'] == 16 ){

echo"<script>
  alert('Cadastrar Motivo Reprovação!');
  document.location.replace('principal.php?&id_auditoria={$id_auditoria}&t=forms/form_reprovacao_auditoria.php');

</script>";

}
elseif($_POST['substatus'] != 16 ){

 
/*Seleciona o id da tabela serviço para update protocolo*/     
      
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_auditoria.php');
      </script>
      ";                                        
    exit();


}


mysql_free_result($acao_operador,$acao_cota,$acao_cota2,$acao_update,$result22,$result3,$acao_filha);
mysql_close($conecta);
mysql_next_result($conecta);

    
?>