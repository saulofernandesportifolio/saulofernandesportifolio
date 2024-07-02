<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<?php
/**
 * @author saulo de assis
 * @copyright 2016
 */

 date_default_timezone_set('Brazil/East');
 
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
        
    $data= substr($string,6,4)."/".substr($string,3,2)."/".substr($string,0,2);   
    } 

 return $data;
}


function arrumadatahora($string2) {
      $dt_dia = date("Y-m-d");
  $hora_dia=date("H:i:s"); 
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


function arrumadata1($string3) {
    if($string3 == ''){
    $data2=substr($string3,8,2)."".substr($string3,5,2)."".substr($string3,0,4);   
        
    }else{
        
    $data2= substr($string3,8,2)."/".substr($string3,5,2)."/".substr($string3,0,4);   
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





$calcula_data = date("Y-m-d");

$data2=date('d/m/Y H:i:s');

$data3=date('d/m/Y H:i');

$dt_dia = date("Y-m-d");

$hora_dia=date("H:i:s"); 



 if(empty($_POST['substatus'])){

  echo"
      <script type=\"text/javascript\">
      alert('faltou definir o status cip atual');
      history.go(-1);
      </script>
      ";

 }
 
 

 $sql = "SELECT idtbl_usuario,nome FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['idtbl_usuario'];
 $nome1= $consulta['nome'];
 
 $sql1 = "SELECT * FROM cip_nv.tbl_swap   
        WHERE id_swap='".$_POST['id_swap']."' ";
 $consulta1 = mysql_fetch_assoc(mysql_query($sql1)) or die(mysql_error().$sql1." erro #SQL_2A");
 
$cotacaopedido=$consulta1['cotacaopedido']; 
$data_da_solicitacao=$consulta1['data_da_solicitacao'];
$hora_da_solicitacao=$consulta1['hora_da_solicitacao'];
$regional=$consulta1['regional'];
$uf=$consulta1['uf'];
$status=$consulta1['status'];
$data_da_tratativa_do_swap=$consulta1['data_tratativa_swap'];
$solicitante=$consulta1['solicitante'];
$gerente_de_contas=$consulta1['remetente'];
$total_de_linhas=$consulta1['tllinhas'];
$total_de_linhas_swap=$consulta1['tlswap'];
$de_aparelho_inicial=$consulta1['de_aparelho_inicial'];
$de_qtd =$consulta1['de_qtd'];
$para_aparelho_final=$consulta1['para_aparelho_final'];
$para_qtd =$consulta1['para_qtd'];
$carteira=$consulta1['carteira'];
$adabas=$consulta1['adabas'];
$hora_tratativa_swap=$consulta1['hora_tratativa_swap']; 
$login_operadores_swap=$consulta1['login_operadores_swap'];
$turno=$consulta1['turno'];
$remetente=$consulta1['remetente'];
$swap=$consulta1['swap'];
$sp2=$consulta1['sp2'];
$statuscip=5;
$revisao_swap=$consulta1['revisao_swap'];
$emailsolicitacao=$consulta1['emailsolicitacao'];
$retornoemail=$consulta1['retornoemail'];
 



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

if($_POST['motivodaacao']  == 34){
    
 $disc_motivo_da_acao ="Chamado geral"; 
    
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



//atualiza status do chamado
 $sql_update="UPDATE cip_nv.tbl_chamado a,cip_nv.tbl_chamado b 
             SET a.status_cip_chamado='{$_POST['substatus']}',
                 a.obs_chamado='$obs_input',
                 a.motivo_da_acao='$motivodaacao',
                 a.disc_motivo_da_acao='$disc_motivo_da_acao',
                 a.disc_status_cip_chamado='$disc_status_cip',
                 a.dt_tratamento_chamado='$dt_dia',
                 a.hora_tratamento_chamado='$hora_dia'
                 WHERE a.id_chamado='{$_POST['id_chamado']}' 
                        AND b.status_cip_chamado NOT IN (32) 
                        AND b.setor_origem='Swap' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error()); 



//      echo '<br>';


if( $_POST['substatus'] == 32 ){
//atualiza status do swap
 $sql_update="UPDATE cip_nv.tbl_swap a 
             SET a.statuscip=5
             WHERE a.id_swap='{$_POST['id_swap']}' ";
$acao_update= mysql_query($sql_update,$conecta) or die (mysql_error());



  $query="INSERT INTO cip_nv.tbl_swap_historico (cotacaopedido,
                             data_da_solicitacao,
                             hora_da_solicitacao, 
                             regional,
                             status,
                             data_da_tratativa_do_swap,
                             gerente_de_contas,
                             total_de_linhas,
                             total_de_linhas_swap,
                             de_aparelho_inicial,
                             de_qtd,
                             para_aparelho_final,
                             para_qtd,
                             uf,
                             carteira,
                             adabas, 
                             hora_da_tratativa_swap, 
                             login_operadores_swap,
                             turno,
                             solicitante,     
                             remetente,
                             swap,
                             sp2,
                             emailsolicitacao,
                             retornoemail,
                             operador_swap,
                             TMT,
                             statuscip,
                             revisao_swap,
                             data_tratamento_swap_cip,
                             hora_tratamento_swap_cip)VALUES(
				  '$cotacaopedido',
                                  '$data_da_solicitacao',
                                  '$hora_da_solicitacao', 
                                  '$regional',
                                  '$status',
                                  '$data_da_tratativa_do_swap',
                                  '$gerente_de_contas',
                                  '$total_de_linhas',
                                  '$total_de_linhas_swap',
                                  '$de_aparelho_inicial',
                                  '$de_qtd',
                                  '$para_aparelho_final',
                                  '$para_qtd',
                                  '$uf',
                                  '$carteira',
                                  '$adabas', 
                                  '$hora_tratativa_swap', 
                                  '$login_operadores_swap',
                                  '$turno',
                                  '$solicitante',
                                  '$remetente',
                                  '$swap',
                                  '$sp2',
                                  '$emailsolicitacao',
                                  '$retornoemail',
                                  '$id',   
				  '$total2',
                                  '$statuscip',
                                  '$revisao_swap',
                                  '$dt_dia',
                                  '$hora_dia')";


 $result=mysql_query($query,$conecta) or die(mysql_error().$sql." erro #SQL_3");
}



if(mysql_affected_rows() === 1){

    die("<script>
                alert('Cadastro efetuado comsucesso!');
                document.location.replace('principal.php?&t=forms/form_fila_cotacao_chamado.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                history.back();
         </script>");
 }

mysql_free_result($consulta,$result);
mysql_close($conecta);
mysql_next_result($conecta); 


?>