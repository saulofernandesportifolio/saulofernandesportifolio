
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
 
 $id_analise= (int) $_GET['id_analise'];


if(empty($_POST['substatus']) || empty($_POST['obs_analise']) || empty($_POST['ofertasmartvivo'])){
    
echo" <script> 
      alert('Por favor preencher o formulario com todos os dados !');
      history.back();
      </script>
      "; 
      exit();   
    
}



if(empty($_POST['data_assinaturacontrato1']) && empty($_POST['data_assinaturacontrato3']) 
  || $_POST['data_assinaturacontrato1'] == "00/00/0000" && $_POST['data_assinaturacontrato3'] == "00/00/0000")
{
echo" <script> 
      alert('Por favor é obrigatorio preencher a data da assinatura do documento!');
      history.back();
      </script>
      "; 
      exit();  

}



$data_assinaturacontrato2 =$_POST['data_assinaturacontrato1'];
$data_assinaturacontrato3 =$_POST['data_assinaturacontrato3'];
$pesquisa=$_POST['pesquisa'];
$prazo_contrato=$_POST['prazo_contrato'];






if(empty($pesquisa)){
	$pesquisa='';
     }

if(!empty($data_assinaturacontrato2) && $pesquisa == 1 || $data_assinaturacontrato2 <> "00/00/0000" && $pesquisa == 1)
{
$tratadocumento="CGC";	
$tratadata=$data_assinaturacontrato2;
}
if(!empty($data_assinaturacontrato3) && $pesquisa == 2 || $data_assinaturacontrato3 <> "00/00/0000" && $pesquisa == 2)
{
$tratadata=$data_assinaturacontrato3;
$tratadocumento="SMP";
}

if(empty($data_assinaturacontrato3) && empty($data_assinaturacontrato2) || $data_assinaturacontrato3 == "00/00/0000" && $data_assinaturacontrato1 == "00/00/0000")
{
$tratadata="00/00/0000";
$tratadocumento="";
}	

//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = $tratadata;

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";
//$hora="$partes_da_data[1]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$data_assinaturacontrato4 = $data;
$documento=$tratadocumento;



//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = $_POST['criadoem'];

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";
//$hora="$partes_da_data[1]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$criadoem = $data;

//valida se a dada contrato é maior que a data da cotação
$dt_atual   = $data_assinaturacontrato4; // data atual
$timestamp_dt_atual   = strtotime($dt_atual); // converte para timestamp Unix
 
$dt_expira    = $criadoem; // data de expiração do anúncio
$timestamp_dt_expira  = strtotime($dt_expira); // converte para timestamp Unix
 
// data atual é maior que a data de expiração
if ($timestamp_dt_atual > $timestamp_dt_expira){ // true

echo" <script> 
      alert('A data de assinatura contrato valida deve ser menor ou igual que a data da cotacao');
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





if($_POST['motivodaacao']  == 2){
    
  $disc_motivo_da_acao ="Documentação aprovada"; 
  
}

if($_POST['motivodaacao']  == 3){
    
 $disc_motivo_da_acao ="Reprovado por inconsistência  analise"; 
    
}

if($_POST['motivodaacao']  == 18){
    
 $disc_motivo_da_acao ="Correção realizada  analise"; 
    
}



if($_POST['substatus'] == 5 )
{
$disc_status_cip="Reprovado análise";
$tipo="Analise documentacao";
$enviado_ilha ="Reprovado ilha de input";
$sub_status_ilha="Analise documentacao";
$status="Pendente";
$acao="Reprovado";
}
if($_POST['substatus'] == 6 )
{
$disc_status_cip="Aprovado análise";
$tipo="Ilha de input";
$enviado_ilha ="Enviado ilha de input";
$sub_status_ilha="Input";
$status="Pendente";
$acao="Aprovado";
}

$sub_status_ilha2= $sub_status_ilha;

$obs_analise=$_POST['obs_analise'];

$motivodaacao= $_POST['motivodaacao'];


$sql_update="UPDATE cip_nv.tbl_analise a
             SET a.status_cip_analise='{$_POST['substatus']}',
                 a.obs_analise='$obs_analise',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_analise='$disc_status_cip',
                 a.dt_tratamento_analise='$dt_tratamento_analise',
                 a.hora_tratamento_analise='$hora_tratamento_analise',
				         a.data_assinaturacontrato ='$data_assinaturacontrato4',
				         a.documento         ='$documento',
				         a.prazo_contrato ='$prazo_contrato'
                 WHERE a.id_analise=$id_analise ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


//$sql_cota="SELECT * FROM tbl_analise WHERE id_analise=$id_analise";


 $sql_cota="SELECT 
           b.id_cotacao,
           a.cotacao_principal,
           a.revisao,
           a.n_da_cotacao,
           a.TIPO_COTACAO
           FROM cip_nv.tbl_cotacao a
           INNER JOIN cip_nv.tbl_analise b 
           ON b.id_cotacao=a.id_cotacao 
           WHERE b.id_analise=$id_analise
           GROUP BY a.n_da_cotacao,a.revisao DESC ";
$acao_cota = mysql_query($sql_cota,$conecta) or die (mysql_error());
		
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
       FROM cip_nv.tbl_cotacao a
       WHERE a.cotacao_principal='$cotacao_principal' and a.revisao='$revisao' and a.TIPO_COTACAO='Principal' 
              GROUP BY a.n_da_cotacao";  
$acao_cota2 = mysql_query($sql_cota2,$conecta) or die (mysql_error());
		
		while($linha_cota2 = mysql_fetch_assoc($acao_cota2)){
		  
          	$id_cotacao3      = $linha_cota2["id_cotacao"];
		        

$sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status',
                 b.analise_principal ='OK',
                 b.oferta_smart_vivo='{$_POST['ofertasmartvivo']}' 
                 WHERE b.id_cotacao='$id_cotacao3' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 


$query22="UPDATE cip_nv.tbl_cotacao a SET  
                         a.id_complementar_da_principal='$id_cotacao3',
                         a.analise_principal ='OK', 
                         a.oferta_smart_vivo='{$_POST['ofertasmartvivo']}'
                         WHERE  a.TIPO_COTACAO='Complementar' AND a.id_complementar_da_principal='$id_cotacao3' ";

$result22= mysql_query($query22,$conecta);

}

if($_POST['substatus'] == 6 )
{
    
 $sql_cota2="SELECT 
          a.id_cotacao,
          a.cotacao_principal,
          a.n_da_cotacao,
          a.TIPO_COTACAO
       FROM cip_nv.tbl_cotacao a
       WHERE a.cotacao_principal='$cotacao_principal' and a.revisao='$revisao' and a.TIPO_COTACAO='Principal' 
       GROUP BY a.n_da_cotacao,a.revisao DESC ";  
$acao_cota2 = mysql_query($sql_cota2,$conecta) or die (mysql_error());
		
		while($linha_cota2 = mysql_fetch_assoc($acao_cota2)){
		  
        	$id_cotacao3      = $linha_cota2["id_cotacao"];
		        

$sql_update="UPDATE cip_nv.tbl_cotacao b
             SET b.tipo='$tipo',
                 b.status_da_cotacao='$enviado_ilha',
                 b.substatus_da_cotacao='$sub_status_ilha2',
                 b.acao='$acao',
                 b.status='$status'
                 WHERE b.id_cotacao='$id_cotacao3'";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 
   
    
    
    
    
   $sql_inserir3 ="INSERT INTO cip_nv.tbl_input(id_cotacao,
                                                status_cip_input,
                                               disc_status_cip_input,
                                               setor)
                                                VALUES('$id_cotacao3',
                                                       '7',
                                                       'Distribuir',
                                                       'Input'
                                                       )";
             $result3 = mysql_query($sql_inserir3,$conecta) or die(mysql_error());
             
             
  include("sql.vincular_filha.php");



$query22="UPDATE cip_nv.tbl_cotacao a SET  
                         a.id_complementar_da_principal='$id_cotacao3',
                         a.analise_principal ='OK',
                         a.oferta_smart_vivo='{$_POST['ofertasmartvivo']}'  
                         WHERE  a.TIPO_COTACAO='Complementar' AND a.id_complementar_da_principal='$id_cotacao3' ";

$result22= mysql_query($query22,$conecta);


    }  
  
           
} 

/* aguardando para iniciar*/
if($_POST['substatus'] == 5 ){

echo"<script>
  alert('Cadastrar Motivo Reprovação!');
  document.location.replace('principal.php?&id_analise={$id_analise}&t=forms/form_reprovacao_analise.php');

</script>";

}
elseif($_POST['substatus'] != 5 ){



/*Seleciona o id da tabela serviço para update protocolo*/     
        
echo " <script> 
      alert('Cadastro efetuado comsucesso!');
      document.location.replace('principal.php?&t=forms/form_fila_cotacao_analise.php');
      </script>
      ";                                        
    exit();

}

mysql_free_result($acao_operador,$acao_cota,$acao_cota2,$acao_update,$result22,$result3);
mysql_close($conecta);
mysql_next_result($conecta);    


?>