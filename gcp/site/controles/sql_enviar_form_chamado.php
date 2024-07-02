
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
 
 $id_chamado= (int) $_GET['id_chamado'];

 


if(empty($_POST['substatus']) || empty($_POST['obs_chamado'])){
    
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


if($_POST['motivodaacao']  == 24 ){
    
 $disc_motivo_da_acao ="Aguardando chamado"; 
    
}

if($_POST['motivodaacao']  == 25){
    
 $disc_motivo_da_acao ="Chamado solucionado"; 
    
}

if($_POST['motivodaacao']  == 26){
    
 $disc_motivo_da_acao ="Erro de personalização"; 
    
}

if($_POST['motivodaacao']  == 27){
    
 $disc_motivo_da_acao ="Erro na(s) linha(s)"; 
    
}

if($_POST['motivodaacao']  == 28){
    
 $disc_motivo_da_acao ="Falta de estoque"; 
    
}


if($_POST['substatus'] == 31 )
{
$disc_status_cip="Aguardando chamado";
$status="Pendente";
$acao="Pendente chamado";
}

if($_POST['substatus'] == 32 )
{
$disc_status_cip="Chamado solucionado";
$status="Pendente";
$acao="Chamado solucionado";    
}
if($_POST['substatus'] == 33 )
{
$disc_status_cip="Chamado em tratativa";
$status="Pendente";
$acao="Pendente chamado";
}


$obs_input=$_POST['obs_chamado'];

$motivodaacao= $_POST['motivodaacao'];



 $sql_teste="SELECT DISTINCT a.id_chamado,a.id_cotacao,a.setor_origem 
FROM cip_nv.tbl_chamado a 
WHERE a.id_cotacao='{$_POST['id_cotacaoteste']}' AND a.status_cip_chamado NOT IN (32) ORDER BY a.id_chamado";
$acao_teste= mysql_query($sql_teste,$conecta) or die (mysql_error());
 while($linha_cota = mysql_fetch_assoc($acao_teste)){
//  echo '<br>';

   $id_cota_teste=$linha_cota["id_chamado"]."-".$setor_origem_teste=$linha_cota["setor_origem"];
 // echo '<br>';

  $setores = $linha_cota["setor_origem"];
  $filtrosetores.=$setores;

 //     echo '<br>';
  
 }



$sql_cota="SELECT * FROM cip_nv.tbl_chamado WHERE id_chamado='$id_chamado' ";
$acao_cota = mysql_query($sql_cota,$conecta) or die (mysql_error());
    
    while($linha_cota = mysql_fetch_assoc($acao_cota))
    {
       $id_cotacao2      = $linha_cota["id_cotacao"];
    }

$sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.acao='$acao',
                 b.motivo_da_acao='$motivodaacao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao2'  ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 



if($filtrosetores == 'Analise')
{

$sql_filtrar1="SELECT * FROM cip_nv.tbl_input 
              WHERE status_cip_input=7 
              AND disc_status_cip_input='Retorno chamado' 
              AND id_cotacao='$id_cotacao2' ";
$acao_sql_filtrar1 = mysql_query($sql_filtrar1,$conecta) or die (mysql_error());
$num_chamado1=mysql_num_rows($acao_sql_filtrar1);

if($num_chamado1 == 0){


  $sql_teste2="SELECT DISTINCT a.id_chamado,a.id_cotacao,a.setor_origem 
FROM cip_nv.tbl_chamado a 
WHERE a.id_cotacao='{$_POST['id_cotacaoteste']}' AND a.setor_origem='Analise' ";
$acao_teste2= mysql_query($sql_teste2,$conecta) or die (mysql_error());

 $linha_cota2 = mysql_fetch_assoc($acao_teste2);
  

//atualiza status do chamado
 $sql_update="UPDATE cip_nv.tbl_chamado a,cip_nv.tbl_chamado b 
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_tratamento_chamado',
                 a.hora_tratamento_chamado='$hora_tratamento_chamado'
                 WHERE a.id_chamado='{$linha_cota2['id_chamado']}' 
                        AND b.status_cip_chamado NOT IN (32) 
                        AND b.setor_origem='{$linha_cota2['setor_origem']}' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


      ///echo '<br>';

  ///echo "retonada para a Input";
    if($_POST['substatus'] == 32 ){ 
      //echo "Input inserir input concluir input no chamado";
        $sql_inserir3 ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '7',
                                                       'Retorno chamado',
                                                       'Input'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());

    }      

 }         

}
elseif($filtrosetores == 'AnaliseInput'|| $filtrosetores == 'Input')
{

$sql_filtrar1="SELECT * FROM cip_nv.tbl_input 
              WHERE status_cip_input=7 
              AND disc_status_cip_input='Retorno chamado' 
              AND id_cotacao='$id_cotacao2' ";
$acao_sql_filtrar1 = mysql_query($sql_filtrar1,$conecta) or die (mysql_error());
$num_chamado1=mysql_num_rows($acao_sql_filtrar1);

if($num_chamado1 == 0){


  $sql_teste2="SELECT DISTINCT a.id_chamado,a.id_cotacao,a.setor_origem 
FROM cip_nv.tbl_chamado a 
WHERE a.id_cotacao='{$_POST['id_cotacaoteste']}' AND a.setor_origem='Input' ";
$acao_teste2= mysql_query($sql_teste2,$conecta) or die (mysql_error());

 $linha_cota2 = mysql_fetch_assoc($acao_teste2);
  

//atualiza status do chamado
 $sql_update="UPDATE cip_nv.tbl_chamado a,cip_nv.tbl_chamado b 
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_tratamento_chamado',
                 a.hora_tratamento_chamado='$hora_tratamento_chamado'
                 WHERE a.id_chamado='{$linha_cota2['id_chamado']}' 
                        AND b.status_cip_chamado NOT IN (32) 
                        AND b.setor_origem='{$linha_cota2['setor_origem']}' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


      ///echo '<br>';

  ///echo "retonada para a Input";
    if($_POST['substatus'] == 32 ){ 
      //echo "Input inserir input concluir input no chamado";
        $sql_inserir3 ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '7',
                                                       'Retorno chamado',
                                                       'Input'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());

    }      

 }         

}
elseif($filtrosetores == 'AnaliseInputAuditoria' || $filtrosetores == 'InputAuditoria' || $filtrosetores == 'Auditoria' )
{
 

$sql_filtrar2="SELECT * FROM cip_nv.tbl_auditoria 
              WHERE status_cip_auditoria=13 
              AND disc_status_cip_auditoria='Retorno chamado' 
              AND id_cotacao='$id_cotacao2' ";
$acao_sql_filtrar2 = mysql_query($sql_filtrar2,$conecta) or die (mysql_error());
$num_chamado2=mysql_num_rows($acao_sql_filtrar2);
if($num_chamado2 == 0){


$sql_teste2="SELECT DISTINCT a.id_chamado,a.id_cotacao,a.setor_origem 
FROM cip_nv.tbl_chamado a 
WHERE a.id_cotacao='{$_POST['id_cotacaoteste']}' AND a.setor_origem='Auditoria' ";
$acao_teste2= mysql_query($sql_teste2,$conecta) or die (mysql_error());

 $linha_cota2 = mysql_fetch_assoc($acao_teste2);
  

//atualiza status do chamado
 $sql_update="UPDATE cip_nv.tbl_chamado a,cip_nv.tbl_chamado b 
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_tratamento_chamado',
                 a.hora_tratamento_chamado='$hora_tratamento_chamado'
                 WHERE a.id_chamado='{$linha_cota2['id_chamado']}' 
                        AND b.status_cip_chamado NOT IN (32) 
                        AND b.setor_origem='{$linha_cota2['setor_origem']}' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 

  //    echo '<br>';
        
//echo "retonada para a Auditoria";
      
     if($_POST['substatus'] == 32 ){
        // echo "Auditoria inserir auditoria concluir input/auditoria no chamado"; 
        $sql_inserir3 ="INSERT INTO cip_nv.tbl_auditoria(id_cotacao,
                                                status_cip_auditoria,
                                               disc_status_cip_auditoria,
                                               setor)
                                                VALUES('$id_cotacao2',
                                                       '13',
                                                       'Retorno chamado',
                                                       'Auditoria'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());

      }     

}
     

}elseif($filtrosetores  == 'AnaliseInputAuditoriaCorrecao' || $filtrosetores  == 'InputAuditoriaCorrecao' || $filtrosetores  == 'AuditoriaCorrecao' || $filtrosetores == 'Correcao')
{
 

$sql_filtrar3="SELECT * FROM cip_nv.tbl_correcao 
              WHERE status_cip_correcao=20 
              AND disc_status_cip_correcao='Retorno chamado' 
              AND id_cotacao='$id_cotacao2' ";
$acao_sql_filtrar3 = mysql_query($sql_filtrar3,$conecta) or die (mysql_error());
$num_chamado3=mysql_num_rows($acao_sql_filtrar3);


if($num_chamado3 == 0){

$sql_teste2="SELECT DISTINCT a.id_chamado,a.id_cotacao,a.setor_origem 
FROM cip_nv.tbl_chamado a 
WHERE a.id_cotacao='{$_POST['id_cotacaoteste']}' AND a.setor_origem='Correcao' ";
$acao_teste2= mysql_query($sql_teste2,$conecta) or die (mysql_error());

 $linha_cota2 = mysql_fetch_assoc($acao_teste2);
  

//atualiza status do chamado
 $sql_update="UPDATE cip_nv.tbl_chamado a,cip_nv.tbl_chamado b 
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_tratamento_chamado',
                 a.hora_tratamento_chamado='$hora_tratamento_chamado'
                 WHERE a.id_chamado='{$linha_cota2['id_chamado']}' 
                        AND b.status_cip_chamado NOT IN (32) 
                        AND b.setor_origem='{$linha_cota2['setor_origem']}' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 



//      echo '<br>';

//echo "retonada para a correcao"; 
     if( $_POST['substatus'] == 32 ){
       //echo "Correcao inserir correcao concluir input/auditoria/correcao no chamado";
         $sql_inserir3 ="INSERT INTO cip_nv.tbl_correcao(id_cotacao,
                                                status_cip_correcao,
                                                disc_status_cip_correcao,
                                                setor)
                                                VALUES('$id_cotacao2',
                                                       '20',
                                                       'Retorno chamado',
                                                       'Correcao'
                                                       )";
          $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());

     }     
}


}

$id_cotacao=$id_cotacao2;
 
include('sql.sla.php');


/*Seleciona o id da tabela serviço para update protocolo*/     


echo" <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_chamado.php');
      </script>
      ";                                        
    exit();


mysql_free_result($acao_update,$acao_cota,$acao_operador,$acao_sql_filtrar3,$acao_sql_filtrar2,$acao_sql_filtrar1,$acao_sql_verifica,$result3);
mysql_close($conecta);
mysql_next_result($conecta);    

?>