
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
 
 //echo $_POST['substatus'];
// echo '<br>';
 
 //echo $id_analise;


if(empty($_POST['substatus']) || empty($_POST['obs_analise'])){
    
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





if($_POST['motivodaacao']  == 2){
    
  $disc_motivo_da_acao =utf8_encode("Documentação aprovada"); 
  
}

if($_POST['motivodaacao']  == 3){
    
 $disc_motivo_da_acao =utf8_encode("Reprovado por inconsistência  analise"); 
    
}

if($_POST['motivodaacao']  == 18){
    
 $disc_motivo_da_acao =utf8_encode("Correção realizada  analise"); 
    
}



if($_POST['substatus'] == 5 )
{
$disc_status_cip=utf8_encode("Reprovado análise");
$tipo="Analise documentacao";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="Analise documentacao";
$status=utf8_encode("Pendente");
$acao="Reprovado";
}
if($_POST['substatus'] == 6 )
{
$disc_status_cip=utf8_encode("Aprovado análise");
$tipo="Ilha de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status=utf8_encode("Pendente");
$acao="Aprovado";
}

$sub_status_ilha2= utf8_encode($sub_status_ilha);

$obs_analise=arrumaString($_POST['obs_analise']);

$motivodaacao= utf8_encode($_POST['motivodaacao']);

$sql_update="UPDATE tbl_analise a
             SET a.status_cip_analise='{$_POST['substatus']}',
                 a.obs_analise='$obs_analise',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_analise='$disc_status_cip',
                 a.dt_tratamento_analise='$dt_tratamento_analise',
                 a.hora_tratamento_analise='$hora_tratamento_analise'
                 WHERE a.id_analise=$id_analise ";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 


//$sql_cota="SELECT * FROM tbl_analise WHERE id_analise=$id_analise";


 $sql_cota="SELECT 
           b.id_cotacao,
           a.cotacao_principal,
           a.revisao,
           a.n_da_cotacao,
           a.TIPO_COTACAO
           FROM tbl_cotacao a
           INNER JOIN tbl_analise b 
           ON b.id_cotacao=a.id_cotacao 
           WHERE b.id_analise=$id_analise
           GROUP BY a.n_da_cotacao";
$acao_cota = mysql_query($sql_cota) or die (mysql_error());
		
		while($linha_cota = mysql_fetch_assoc($acao_cota))
		{
		//$id_cotacao2   = $linha_cota["id_cotacao"];
        $cotacao_principal  = $linha_cota["cotacao_principal"];
        $revisao    = $linha_cota["revisao"];
		}
        
$sql_cota2="SELECT 
          a.id_cotacao,
          a.cotacao_principal,
          a.n_da_cotacao,
          a.TIPO_COTACAO
       FROM tbl_cotacao a
       WHERE a.cotacao_principal='$cotacao_principal' and a.TIPO_COTACAO='Principal' 
              GROUP BY a.n_da_cotacao";  
$acao_cota2 = mysql_query($sql_cota2) or die (mysql_error());
		
		while($linha_cota2 = mysql_fetch_assoc($acao_cota2)){
		  
          	$id_cotacao3      = $linha_cota2["id_cotacao"];
		        

$sql_update="UPDATE tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao3' ";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 

}

if($_POST['substatus'] == 6 )
{
    
 $sql_cota2="SELECT 
          a.id_cotacao,
          a.cotacao_principal,
          a.n_da_cotacao,
          a.TIPO_COTACAO
       FROM tbl_cotacao a
       WHERE a.cotacao_principal='$cotacao_principal'  and a.TIPO_COTACAO='Principal' 
       GROUP BY a.n_da_cotacao";  
$acao_cota2 = mysql_query($sql_cota2) or die (mysql_error());
		
		while($linha_cota2 = mysql_fetch_assoc($acao_cota2)){
		  
        	$id_cotacao3      = $linha_cota2["id_cotacao"];
		        

$sql_update="UPDATE tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao3'";
$acao_update= mysql_query($sql_update) or die (mysql_error()); 
   
    
    
    
    
   $sql_inserir3 ="INSERT INTO tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao3',
                                                       '7',
                                                       'Distribuir',
                                                       'Input'
                                                       )";
             $result3 = mysql_query($sql_inserir3) or die(mysql_error());
             
             
  }  
  
  
  
           
} 


 
/*Seleciona o id da tabela serviço para update protocolo*/     
        
echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_analise.php');
      </script>
      ";                                        
    exit();
    
?>