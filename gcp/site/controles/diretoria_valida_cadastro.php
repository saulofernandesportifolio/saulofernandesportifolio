<?php   
 

include 'funcoes.php';


function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}

function tiraaspasimples($valor){
  $result = addslashes($valor);
  $virgula = "\'";
  $result2 = str_replace($virgula, ".", $result);
  return $result2;

  //echo $result;

}



function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,3,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."-".substr($string,3,2)."-".substr($string,0,2);   
    }

 return $data;
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."-".substr($string2,3,2)."-".substr($string2,0,2)." ".substr($string2,10,9);

       }
return $data2;
}



function arrumadatateste($string3) {
    if($string3 == ''){
    $data2=substr($string3,0,4)."".substr($string3,5,2)."".substr($string3,8,2);   
        
    }else{
        
    $data2=substr($string3,0,4)."-".substr($string3,5,2)."-".substr($string3,8,2);   
    }

 return $data2;
}


function arrumadata1($string4) {
    if($string4 == ''){
    $data2=substr($string4,8,2)."".substr($string4,5,2)."".substr($string4,0,4);   
        
    }else{
        
    $data2= substr($string4,8,2)."/".substr($string4,5,2)."/".substr($string4,0,4);   
    }

 return $data2;
}



Function entre($data1, $data2="",$tipo=""){
if($data2==""){
$data2 = date("d/m/Y H:i");
}
if($tipo==""){
$tipo = "h";
}
for($i=1;$i<=2;$i++){
${"dia".$i} = substr(${"data".$i},0,2);
${"mes".$i} = substr(${"data".$i},3,2);
${"ano".$i} = substr(${"data".$i},6,4);
${"horas".$i} = substr(${"data".$i},11,2);
${"minutos".$i} = substr(${"data".$i},14,2);
}
$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2)-mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);
switch($tipo){
case "m":
$difere = $segundos/60;
break;
case "H":
$difere = $segundos/3600;
break;
case "h":
$difere = round($segundos/3600);
break;
case "D":
$difere = $segundos/86400;
break;
case "d":
$difere = round($segundos/86400);
break;
}
return $difere;
}
 



$tempo = 0;

set_time_limit($tempo);
 
date_default_timezone_set("Brazil/East");

$calcula_data = date("d/m/Y");	
$dttrata = date("Y-m-d");
$horatrata = date("H:i:s");
$data3 = date("d/m/Y H:i");

if($_POST['tpcadastro2'] == 3){
    $_POST['cotacaop']='sem';
    $protocolo=$_POST['protocolo'];
}





 if(empty($_POST['cotacaop']) 
  || empty($_POST['regional']) 
  || empty($_POST['uf']) 
  || empty($_POST['criado_em']) 
  || empty($_POST['segmento']) 
  || empty($_POST['criado_por']) 
  || empty($_POST['responsavel']) 
  || empty($_POST['cliente']) 
  || empty($_POST['total_linhas'])  
  || empty($_POST['data_de_recebimento']) 
  || empty($_POST['hora_de_recebimento'])
  || empty($_POST['acao']) 
  || empty($_POST['solicitanteva']) 
  || empty($_POST['status_da_cotacao']) 
  || empty($_POST['observacao'])
  || empty($_POST['remetente']) 
  || empty($_POST['statusdiretoria'])){
      
      
   echo"
       <script type=\"text/javascript\">
  alert('Verificar se todos os campos foram preenchidos!');
  history.back();
  </script>
  ";  
      
      exit();
  }

  
$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());

     
     while($linha_operador = mysql_fetch_assoc($acao_operador))
     {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        $turnooper         =$linha_operador["turno"]; 
     }


  
      if($turnooper == 1){
          
         $turnooper ='Diurno';
      }else if($turnooper == 2){
          
         $turnooper ='Intermediário';
      }else if($turnooper == 3){
          
         $turnooper ='Noturno';
      }
     
     
      if($_POST['statusdiretoria'] == 1){
          
         $discstatusdir ='Tratando';
         
      }else if($_POST['statusdiretoria'] == 2){
          
         $discstatusdir ='Tratado';
         
      }
   
     


//mtrepro

//usuario_ci

//disc_status_ci


//obs_corre


  $cotacao_atividade=$_POST['cotacaop'];
  $regional=$_POST['regional'];
  $uf=$_POST['uf'];
  $criado_em= arrumadatahora($_POST['criado_em']);
  $segmento=$_POST['segmento'];
  $revisao=$_POST['revisao'];
  $criado_por=$_POST['criado_por'];
  $responsavel=$_POST['responsavel'];
  $cliente=$_POST['cliente'];
  $cpf_cnpj=$_POST['cpf_cnpj'];
  $altas=$_POST['altas'];
  $portabilidade=$_POST['portabilidade']; 
  $migracao=$_POST['migracao'];
  $trocas=$_POST['trocas'];
  $tt=$_POST['tt'];
  $backup=$_POST['backup']; 
  $m2m=$_POST['m2m'];
  $fixa=$_POST['fixa'];
  $pre_pos=$_POST['pre_pos'];
  $migracao_troca=$_POST['migracao_troca'];
  $total_linhas=$_POST['total_linhas'];
  $data_de_recebimento=arrumadata($_POST['data_de_recebimento']);
  $hora_de_recebimento=$_POST['hora_de_recebimento'];
  $acao=$_POST['acao'];
  $solicitante_vivo_accenture=$_POST['solicitanteva'];
  $status_da_cotacao=$_POST['status_da_cotacao'];
  $ofensor=$_POST['ofensor'];
  $erro=$_POST['tipo_erro'];
  $motivo_erro=$_POST['mtrepro'];
  $observacao=tiraaspasimples($_POST['observacao']);
  $nome_ofensor_ilha=$_POST['usuario_ci'];
  $remetente=$_POST['remetente'];
  $data_de_finalizacao_da_tratativa=$dttrata;
  $hora_de_finalizacao_da_tratativa=$horatrata;
  $data_tratamento=$dttrata;
  $hora_tratamento=$horatrata;
  $operador_diretoria=$nome;
  $turno=$turnooper;
  $statusdiretoria=$_POST['statusdiretoria'];
  $disc_statusdiretoria=$discstatusdir;
  $obs_auditoria = tiraaspasimples($_POST['obs_corre']);  
  $disc_status_cip=$_POST['disc_status_ci'];
  $usuario_ciop = $_POST['usuario_ciop'];
  $tipo_servicos= $_POST['tipo_servicos'];

$contagem = strlen($data_de_recebimento);
if ($contagem <> 10)
{
echo "<script>alert('Data inválida.'); javascript: history.go(-1); </script>\n";

exit();
}



$data1=arrumadata1($data_de_recebimento)." ".$hora_de_recebimento;


$diasemana_numero = date('w', strtotime($calcula_data));


if($diasemana_numero >= 1 && $diasemana_numero <= 5){

//echo '<br>';

$h2=entre($data1,$data3,"H");

$h=floor($h2);


/*echo "hora final ".*/$hfinal=substr($data3,11,16);

//echo '<br>';

//echo "hora inicial ".*/$hinicial=substr($data1,11,16);

//echo '<br>';

 $hfinal=substr($data3,10,3);

//echo '<br>';

 $hinicial=substr($data1,10,3);

//echo '<br>';

 $mfinal=substr($data3,14,3);

//echo '<br>';

 $minicial=substr($data1,14,2);


$m=($mfinal - $minicial);

//echo '<br>';

if($h >= 0 && $h <= 9){
  $h='0'.$h;
}
if($m >= 0 && $m <= 9){
  $m='0'.$m;
}


 $m2=substr($data3,14,16);


/*echo "este e o calculo ".*/$total=$h.":".$m2;

//echo '<br>';

}


 $query="INSERT INTO cip_nv.base_diretoria(
                                  cotacao_atividade,
                                  protocolo,
                                  regional,
                                  uf,
                                  criado_em,
                                  segmento,
                                  revisao,
                                  criado_por,
                                  responsavel,
                                  cliente,
                                  cpf_cnpj,
                                  altas,
                                  portabilidade, 
                                  migracao,
                                  trocas,
                                  tt,
                                  backup, 
                                  m2m,
                                  fixa,
                                  pre_pos,
                                  migracao_troca,
                                  total_linhas,
                                  data_de_recebimento,
                                  hora_de_recebimento,
                                  acao,
                                  solicitante_vivo_accenture,
                                  status_da_cotacao,
                                  ofensor,
                                  erro,
                                  motivo_erro,
                                  observacao,
                                  nome_ofensor_ilha,
                                  remetente,
                                  data_de_finalizacao_da_tratativa,
                                  hora_de_finalizacao_da_tratativa,
                                  tmt,
                                  data_tratamento,
                                  hora_tratamento,
                                  operador_diretoria,
                                  turno,
                                  statusdiretoria,
                                  disc_statusdiretoria,
                                  obs_auditoria,
                                  disc_status_cip,
                                  operador_cota,
                                  tipo_servicos  
				    ) 
				   VALUES  (
				  '$cotacao_atividade',
                                  '$protocolo',
                                  '$regional',
                                  '$uf',
                                  '$criado_em',
                                  '$segmento',
                                  '$revisao',
                                  '$criado_por',
                                  '$responsavel',
                                  '$cliente',
                                  '$cpf_cnpj',
                                  '$altas',
                                  '$portabilidade', 
                                  '$migracao',
                                  '$trocas',
                                  '$tt',
                                  '$backup', 
                                  '$m2m',
                                  '$fixa',
                                  '$pre_pos',
                                  '$migracao_troca',
                                  '$total_linhas',
                                  '$data_de_recebimento',
                                  '$hora_de_recebimento',
                                  '$acao',
                                  '$solicitante_vivo_accenture',
                                  '$status_da_cotacao',
                                  '$ofensor',
                                  '$erro',
                                  '$motivo_erro',
                                  '$observacao',
                                  '$nome_ofensor_ilha',
                                  '$remetente',
                                  '$data_de_finalizacao_da_tratativa',
                                  '$hora_de_finalizacao_da_tratativa',    
                                  '$total',
                                  '$data_tratamento',
                                  '$hora_tratamento',
                                  '$operador_diretoria',
                                  '$turno',
                                  '$statusdiretoria',
                                  '$disc_statusdiretoria',
                                  '$obs_auditoria',
                                  '$disc_status_ci',
                                  '$usuario_ciop',
                                  '$tipo_servicos'				   
				   )";
(!mysql_query($query,$conecta)); 

$oppri="PRIORIDADE ".$operador_diretoria;
echo '<br>';
echo '<br>';echo '<br>';echo '<br>';
echo $sqlproridade="UPDATE cip_nv.tbl_cotacao a 
               SET a.informacoes = '$oppri'
               WHERE a.id_cotacao='{$_POST['id_cotacao']}' ";
$acao_operador = mysql_query($sqlproridade) or die (mysql_error());




/*$query="INSERT INTO cip_nv.base_diretoria_historico(
                                  cotacao_atividade,
                                  protocolo,
                                  regional,
                                  uf,
                                  criado_em,
                                  segmento,
                                  revisao,
                                  criado_por,
                                  responsavel,
                                  cliente,
                                  cpf_cnpj,
                                  altas,
                                  portabilidade, 
                                  migracao,
                                  trocas,
                                  tt,
                                  backup, 
                                  m2m,
                                  fixa,
                                  pre_pos,
                                  migracao_troca,
                                  total_linhas,
                                  data_de_recebimento,
                                  hora_de_recebimento,
                                  acao,
                                  solicitante_vivo_accenture,
                                  status_da_cotacao,
                                  ofensor,
                                  erro,
                                  motivo_erro,
                                  observacao,
                                  nome_ofensor_ilha,
                                  remetente,
                                  data_de_finalizacao_da_tratativa,
                                  hora_de_finalizacao_da_tratativa,
                                  tmt,
                                  data_tratamento,
                                  hora_tratamento,
                                  operador_diretoria,
                                  turno,
                                  statusdiretoria,
                                  disc_statusdiretoria
				    ) 
				   VALUES  (
				  '$cotacao_atividade',
                                  '$protocolo',
                                  '$regional',
                                  '$uf',
                                  '$criado_em',
                                  '$segmento',
                                  '$revisao',
                                  '$criado_por',
                                  '$responsavel',
                                  '$cliente',
                                  '$cpf_cnpj',
                                  '$altas',
                                  '$portabilidade', 
                                  '$migracao',
                                  '$trocas',
                                  '$tt',
                                  '$backup', 
                                  '$m2m',
                                  '$fixa',
                                  '$pre_pos',
                                  '$migracao_troca',
                                  '$total_linhas',
                                  '$data_de_recebimento',
                                  '$hora_de_recebimento',
                                  '$acao',
                                  '$solicitante_vivo_accenture',
                                  '$status_da_cotacao',
                                  '$ofensor',
                                  '$erro',
                                  '$motivo_erro',
                                  '$observacao',
                                  '$nome_ofensor_ilha',
                                  '$remetente',
                                  '$data_de_finalizacao_da_tratativa',
                                  '$hora_de_finalizacao_da_tratativa',    
                                  '$total',
                                  '$data_tratamento',
                                  '$hora_tratamento',
                                  '$operador_diretoria',
                                  '$turno',
                                  '$statusdiretoria',
                                  '$disc_statusdiretoria'				   
				   )";
(!mysql_query($query,$conecta)); */




  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/formconsulta_cotacoes_diretoria.php');
		</script>
		";


 mysql_free_result($acao_operador,$qr);
 mysql_close($conecta);
		
?>    
