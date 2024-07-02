
<meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
<?php
/**
 * @author saulo de assis
 * @copyright 2016
 */

include 'funcoes.php';

 date_default_timezone_set('Brazil/East');


function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
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
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,7,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,7,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


//echo $_POST['cotacao_atividade_pedido'];


if(empty($_POST['cotacao_atividade_pedido'])){

echo "<script>
            alert('Não encontra-se mais para cadastro somente para atualização.');
            document.location.replace('principal.php?t=forms/formconsulta_cotacoes_contestacao.php');
         </script>";

}


 $calcula_data = date("d/m/Y");



 $sql = "SELECT idtbl_usuario,nome,turno FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['idtbl_usuario'];
 $nome1= $consulta['nome'];
 $turno1= $consulta['turno'];
 
if($_POST['setor'] == 'Analise')
{

$_POST['id_setor']=2;

}elseif($_POST['setor']== 'Input'){

$_POST['id_setor']=3;

}elseif($_POST['setor'] == "Auditoria" ){

$_POST['id_setor']=5;

}elseif($_POST['setor'] == "Correcao" ){

$_POST['id_setor']=6;

}elseif($_POST['setor'] == "Chamado" ){

$_POST['id_setor']=13;

}

if($_POST['regional'] == 'SP'){

  $regional2='SP';

}elseif($_POST['regional'] == 'GO' || 
  $_POST['regional'] == 'MT' || 
  $_POST['regional'] == 'MS' || 
  $_POST['regional'] == 'DF' ){

$regional2='CO';

}elseif($_POST['regional'] == 'PR' || 
  $_POST['regional'] == 'RS' || 
  $_POST['regional'] == 'SC'){


$regional2='SUL';


}elseif($_POST['regional'] == 'AL' || 
  $_POST['regional'] == 'BA' || 
  $_POST['regional'] == 'CE' || 
  $_POST['regional'] == 'MA' || 
  $_POST['regoinal'] == 'PB' || 
  $_POST['regional'] == 'PE' || 
  $_POST['regional'] == 'PI' || 
  $_POST['regional'] == 'RN' || 
  $_POST['regional'] == 'SE' || 
  $_POST['regional'] == 'TO' ){


$regional2='NE';


}elseif($_POST['regional'] == 'AC' || 
  $_POST['regional'] == 'AP' || 
  $_POST['regional'] == 'CE' || 
  $_POST['regional'] == 'AM' || 
  $_POST['regoinal'] == 'PA' || 
  $_POST['regional'] == 'RO' || 
  $_POST['regional'] == 'RR' ){

$regional2='NORTE';


}elseif($_POST['regional'] == 'MG'){

$regional2='MG';


}elseif($_POST['regional'] == 'MG'){

$regional2='MG';


}elseif($_POST['regional'] == 'ES' || $_POST['regional'] == 'RJ' ){

$regional2='LESTE';


}

if(empty($_POST['altas'])){

  $_POST['altas']=0;

}elseif(empty($_POST['portabilidade'])){

 $_POST['portabilidade']=0;

}elseif(empty($_POST['migracao'])){

$_POST['migracao']=0;

}elseif(empty($_POST['trocas'])){

 $_POST['trocas']=0;

}elseif(empty($_POST['tt'])){

$_POST['tt']=0;


}elseif(empty($_POST['backup'])){

$_POST['backup']=0;

}elseif(empty($_POST['m2m'])){

$_POST['m2m']=0;

}elseif(empty($_POST['fixa'])){

$_POST['fixa']=0;

}elseif(empty($_POST['pre_pos'])){

$_POST['pre_pos']=0;

}elseif(empty($_POST['migracao_troca'])){

$_POST['migracao_troca']=0;

}


 
 $tl_linhas= $_POST['altas']+$_POST['portabilidade']+$_POST['migracao']+$_POST['trocas']+$_POST['tt']+$_POST['backup']+$_POST['m2m']+$_POST['fixa']+$_POST['pre_pos']+$_POST['migracao_troca'];


   $tabela = array(
    'cotacao_atividade_pedido'=> $_POST['cotacao_atividade_pedido'], 
    'regional'=> $regional2,
    'uf' => $_POST['regional'],
    'criado_em'=> arrumadatahora($_POST['criado_em']),
    'segmento'=> $_POST['segmento'],
    'revisao'=> $_POST['revisao'], 
    'criado_por'=> $_POST['criado_por'],
    'responsavel'=> $_POST['responsavel'],
    'status' => $_POST['status'],
    'cliente'=> $_POST['cliente'],
    'cnpj_cpf'=> $_POST['cnpj_cpf'],
    'altas' => $_POST['altas'],
    'portabilidade'=> $_POST['portabilidade'],
    'migracao'=> $_POST['migracao'],
    'trocas'=> $_POST['trocas'],
    'tt'=> $_POST['tt'],
    'backup'=> $_POST['backup'],
    'm2m' => $_POST['m2m'],
    'fixa' => $_POST['fixa'],
    'pre_pos' => $_POST['pre_pos'],
    'migracao_troca' => $_POST['migracao_troca'],
    'total_linhas' => $tl_linhas,
    'data_do_recebimento'=> $_POST['data_do_recebimento'],
	  'hora_do_recebimento'=> $_POST['hora_do_recebimento'], 
	  'remetente'=> $_POST['remetente'], 
	  'adabas'=> $_POST['adabas'], 
	  'inicio_da_tratativa'=> date('Y-m-d H:i:s'), 
	  'analista_contestacao'=> $id, 
	  'data_retorno'=>'NULL',
    'hora_retorno'=> 'NULL',
	  'ofensor'=> $_POST['ofensor'],
    'tipo2'=> $_POST['tipo2'],
	  'tipo_apurado'=> $_POST['tipo_apurado'], 
    'tipo_contestado_FDV'=> $fdv= $data_cadastro_email=date("d/m/Y H:i:s")." : ".trim($_POST['item_fdv'])." "."-"." ".$nome1,
    'retorno_do_email'=>$retorno = $data_cadastro_retorno=date("d/m/Y H:i:s")." : ".trim($_POST['email'])." "."-"." ".$nome1,
    'analista_ofensor'=> $_POST['login_operadores_cont'],
    'perfil_ofensor'=>'NULL',
    'turno_ofensor'=>$_POST['turno'], 
    'usuario_att'=> 'NULL', 
    'dt_atualizacao'=> 'NULL',
    'contestacao'=> $_POST['contestacao'],
    'data_tratamento'=> date('Y-m-d'),
    'hora_tratamento'=> date('H:i:s'), 
    'id_setor' => $_POST['id_setor'],
    'setor' => $_POST['setor'],
    'turno' => $turno1
    );

    
$sql = "SELECT 
		CASE WHEN MAX(qtd_contestacoes) IS NULL 
		     THEN 0
		     ELSE MAX(qtd_contestacoes)
		END +1 as qtd_cont
	    FROM cip_nv.base_contestacoes_cotacao_manual  
	    WHERE cotacao_atividade_pedido='".$tabela['cotacao_atividade_pedido']."' AND revisao='".$tabela['revisao']."'";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_2");
 $tabela['qtd_contestacoes'] = $consulta['qtd_cont'];

 $data_cadastro=$tabela['data_do_recebimento'];
 $hora_cadastro=$tabela['hora_do_recebimento'];

$data = $data_cadastro;
$data_exp_v1 = explode ('/',$data);
$dia = $data_exp_v1[0];
    switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
        case 6:
        $teste = 'sabado';
        break;
        default:
        $teste = 'ok';
        break;
    }
                 
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro = $data_modificada_dma[0].'/'.$data_modificada_dma[1].'/'.$data_modificada_dma[2];
$teste1 = calcula_data_sla($data_cadastro,$calcula_data);

if($teste == 'sabado'){
  $hora1 = diminui_hora($hora_cadastro ,'12:00');
  }else $hora1 = diminui_hora($hora_cadastro ,'18:00');
//echo '<BR> hora um =' . $hora1;
$hora_atual = date ('H:i');
$hora2 = diminui_hora('09:00',$hora_atual);
//echo $hora2 . '<br>';
if($hora2 < '00:01'){
  $teste = explode (':' , $hora2);
  $teste2 = $teste[1] * -1;
    $hora2 = '00:' . $teste2;
  }
//echo '<BR> hora um =' . $hora1;
$total_um = soma_hora($hora1,$hora2);
//echo '<BR> total um =' . $total_um;
$total = soma_hora($total_um,$teste1);
$data_modificada_dma = explode('/', $data_cadastro);
$data_cadastro1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_cadastro == $calcula_data){
  $total = diminui_hora($hora_cadastro,$hora_atual);
}


 $sql = "INSERT INTO cip_nv.base_contestacoes_cotacao_manual(
               cotacao_atividade_pedido, 
               regional,
               uf,
               criado_em,
               segmento,
               revisao, 
               criado_por,
               responsavel,
               status,
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
               data_do_recebimento,
               hora_do_recebimento, 
               remetente, 
               adabas, 
               inicio_da_tratativa, 
               analista_contestacao, 
               data_retorno,
               hora_retorno,
               ofensor,
               tipo2,
               tipo_apurado, 
               tipo_contestado_FDV,
               retorno_do_email,
               analista_ofensor,
               perfil_ofensor,
               turno_ofensor, 
               usuario_att, 
               dt_atualizacao,
               contestacao,
               data_tratamento,
               hora_tratamento, 
               id_setor,
               setor,
               tmt,
               qtd_contestacoes,
               turno )
     VALUES( '".$tabela['cotacao_atividade_pedido']."','".
            $tabela['regional']."','".
            $tabela['uf']."','".
            $tabela['criado_em']."','".
            $tabela['segmento']."','".
            $tabela['revisao']."','".
            $tabela['criado_por']."','".
            $tabela['responsavel']."','".
            $tabela['status']."','".
            $tabela['cliente']."','".
            $tabela['cnpj_cpf']."','".
            $tabela['altas']."','".
            $tabela['portabilidade']."','".
            $tabela['migracao']."','".
            $tabela['trocas']."','".
            $tabela['tt']."','".
            $tabela['backup']."','".
            $tabela['m2m']."','".
            $tabela['fixa']."','".
            $tabela['pre_pos']."','".
            $tabela['migracao_troca']."','".
            $tabela['total_linhas']."','".
            arrumadata($tabela['data_do_recebimento'])."','".
            $tabela['hora_do_recebimento']."','".
            $tabela['remetente']."','".
            $tabela['adabas']."','".
            $tabela['inicio_da_tratativa']."','".
            $tabela['analista_contestacao']."','".
            arrumadata($tabela['data_retorno'])."','".
            $tabela['hora_retorno']."','".
            $tabela['ofensor']."','".
            $tabela['tipo2']."','".
            $tabela['tipo_apurado']."','".
            $tabela['tipo_contestado_FDV']."','".
            $tabela['retorno_do_email']."','".
            $tabela['analista_ofensor']."','".
            $tabela['perfil_ofensor']."','".
            $tabela['turno_ofensor']."','".
            $tabela['usuario_att']."','".
            $tabela['dt_atualizacao']."','".
            $tabela['contestacao']."','".
            $tabela['data_tratamento']."','".
            $tabela['hora_tratamento']."','".
            $tabela['id_setor']."','".
            $tabela['setor']."','".
            $total."','".
            $tabela['qtd_contestacoes']."','".
            $tabela['turno']."')";

$resultinsert1=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_2");



if(mysql_affected_rows() === 1){

  $select_id_contes="SELECT  id_contestacao_cotacao, 
                             ofensor,
                             analista_contestacao, 
                             tipo2, 
                             tipo_apurado, 
                             analista_ofensor,
                             perfil_ofensor,
                             turno_ofensor, 
                             usuario_att, 
                             dt_atualizacao,
                             contestacao,
                             data_tratamento,
                             hora_tratamento, 
                             id_setor,
                             setor,
                             tmt,
                             qtd_contestacoes,
                             turno
                     FROM cip_nv.base_contestacoes_cotacao_manual 
                     WHERE cotacao_atividade_pedido='{$tabela['cotacao_atividade_pedido']}' AND id_setor='{$tabela['id_setor']}' ";
  $consulta_id_contes= mysql_fetch_assoc(mysql_query($select_id_contes,$conecta)) or die(mysql_error().$sql." erro #SQL_4");
  $id = $consulta_id_contes['id_contestacao_cotacao'];        



  
$sql="INSERT INTO cip_nv.base_erros_cotacao_contestacao_manual(
               id_contestacao_cotacao, 
               ofensor,
               analista_contestacao, 
               tipo2, 
               tipo_apurado, 
               analista_ofensor,
               perfil_ofensor,
               turno_ofensor, 
               usuario_att, 
               dt_atualizacao,
               contestacao,
               data_tratamento,
               hora_tratamento, 
               id_setor,
               setor,
               tmt,
               qtd_contestacoes,
               turno)
     VALUES( '".$id."','".
            $consulta_id_contes['ofensor']."','".
            $consulta_id_contes['analista_contestacao']."','".
            $consulta_id_contes['tipo2']."','".            
            $consulta_id_contes['tipo_apurado']."','".
            $consulta_id_contes['analista_ofensor']."','".
            $consulta_id_contes['perfil_ofensor']."','".
            $consulta_id_contes['turno_ofensor']."','".
            $consulta_id_contes['usuario_att']."','".
            $consulta_id_contes['dt_atualizacao']."','".
            $consulta_id_contes['contestacao']."','".
            $consulta_id_contes['data_tratamento']."','".
            $consulta_id_contes['hora_tratamento']."','".
            $consulta_id_contes['id_setor']."','".
            $consulta_id_contes['setor']."','".
            $consulta_id_contes['qtd_contestacoes']."','".
            $consulta_id_contes['qtd_contestacoes']."','".
            $consulta_id_contes['turno']."')";

 $resultinsert=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_3");



    die("<script>
                alert('Contestacao inserida com sucesso para a cotacao ".$tabela['cotacao_atividade_pedido']."');
                document.location.replace('principal.php?&idcont={$id}&t=forms/formcadastromanual_cotacoes_contestacao_att.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                history.back();
         </script>");
 }


mysql_free_result($consulta,$resultinsert,$resultinsert1);
mysql_close($conecta);
mysql_next_result($conecta); 

?>
