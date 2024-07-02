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
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}

$calcula_data = date("d/m/Y");


 if(empty($_POST['contestacao_status_cip'])){

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
 
/*
$sql = "SELECT 
        CASE WHEN MAX(qtd_contestacoes) IS NULL 
             THEN 0
             ELSE MAX(qtd_contestacoes)
        END +1 as qtd_cont
        FROM base_contestacoes_cotacao  
        WHERE id_cotacao='".$tabela['id_cotacao']."' AND revisao='".$tabela['revisao']."'";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $tabela['qtd_contestacoes'] = $consulta['qtd_cont'];
 $tabela['n_da_cotacao'] = $consulta['n_da_cotacao'];




$data_do_recebimentof=$_POST['data_do_recebimento'];
$hora_do_recebimento=$tabela['hora_do_recebimento'];
$data =$data_do_recebimentof;
$data_exp_v1 = explode ('-',$data);
$dia = $data_exp_v1[0];
		switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
				case 6:
				$teste = 'sabado';
				break;
				default:
			echo	$teste = 'ok';
				break;
		}
							   
$data_modificada_dma = explode('-', $data_do_recebimentof);
$data_do_recebimento = $data_modificada_dma[0].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[2];
$teste1 =calcula_data_sla2($data_do_recebimento,$calcula_data);


if($teste == 'sabado'){
	$hora1 = diminui_hora($hora_do_recebimento ,'12:00');
	}else $hora1 = diminui_hora($hora_do_recebimento ,'18:00');
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
$data_modificada_dma = explode('-', $data_do_recebimentof);
$data_do_recebimento1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_do_recebimento == $calcula_data){
	$total = diminui_hora($hora_do_recebimento,$hora_atual);
}*/


$pula = "\n";
 $emailtotal = $_POST['email'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".$_POST['email2']." "."-"." ".$nome1;


$pula = "\n";
$item_fdvtotal = $_POST['item_fdv'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".$_POST['item_fdv2']." "."-"." ".$nome1;


//$data_do_recebimento=$_POST['data_do_recebimento']=substr($_POST['data_entrada'],6,4)."-".substr($_POST['data_entrada'],3,2)."-".substr($_POST['data_entrada'],0,2);



 $sql = "UPDATE cip_nv.base_contestacoes_cotacao_manual SET 
               data_do_recebimento= '".arrumadata($_POST['data_do_recebimento'])."',
               hora_do_recebimento= '".$_POST['hora_do_recebimento']."', 
               remetente = '".$_POST['remetente']."', 
               adabas = '".$_POST['adabas']."', 
               data_retorno = '".arrumadata($_POST['data_retorno'])."',
               hora_retorno = '".$_POST['hora_retorno']."',
               data_do_retornovivo= '".arrumadata($_POST['data_do_retornovivo'])."',
               hora_do_retornovivo= '".$_POST['hora_do_retornovivo']."', 
               data_envio_email =  '".arrumadata($_POST['data_envio_email'])."',
               hora_envio_email =  '".$_POST['hora_envio_email']."', 
               data_da_correcao =  '".arrumadata($_POST['data_da_correcao'])."',
               hora_da_correcao =  '".$_POST['hora_da_correcao']."',
               data_ret_correcao =  '".arrumadata($_POST['data_ret_correcao'])."',
               hora_ret_correcao =  '".$_POST['hora_ret_correcao']."',
               contestacao_status_cip = '".$_POST['contestacao_status_cip']."',
               retorno_do_email = '".$emailtotal."',
               tipo_contestado_FDV = '".$item_fdvtotal."' 
        WHERE id_contestacao_cotacao='".$_POST['id_contestacao_cotacao']."'  ";


 $result=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_2");

 
  if($_POST['contestacao_status_cip'] == 1
     || $_POST['contestacao_status_cip'] == 2 
     || $_POST['contestacao_status_cip'] == 3 
     || $_POST['contestacao_status_cip'] == 4 ){
      
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
                             turno,
                             data_envio_email,
                             hora_envio_email,
                             data_do_enviovivo,
                             hora_do_enviovivo, 
                             data_do_retornovivo,
                             hora_do_retornovivo, 
                             contestacao_status_cip,
                             data_da_correcao,
                             hora_da_correcao,
                             data_ret_correcao,
                             hora_ret_correcao
                     FROM cip_nv.base_contestacoes_cotacao_manual 
     WHERE id_contestacao_cotacao='{$_POST['id_contestacao_cotacao']}' ";
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
               turno,
               data_envio_email,
               hora_envio_email,
               data_do_enviovivo,
               hora_do_enviovivo, 
               data_do_retornovivo,
               hora_do_retornovivo, 
               contestacao_status_cip,
               data_da_correcao,
               hora_da_correcao,
               data_ret_correcao,
               hora_ret_correcao)
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
            $consulta_id_contes['tmt']."','".
            $consulta_id_contes['qtd_contestacoes']."','".
            $consulta_id_contes['turno']."','".
            $consulta_id_contes['data_envio_email']."','".
            $consulta_id_contes['hora_envio_email']."','".
            $consulta_id_contes['data_do_enviovivo']."','".
            $consulta_id_contes['hora_do_enviovivo']."','".
            $consulta_id_contes['data_do_retornovivo']."','".
            $consulta_id_contes['hora_do_retornovivo']."','".
            $consulta_id_contes['contestacao_status_cip']."','".
            $consulta_id_contes['data_da_correcao']."','".
            $consulta_id_contes['hora_da_correcao']."','".
            $consulta_id_contes['data_ret_correcao']."','".
            $consulta_id_contes['hora_ret_correcao']."'  )";

 $resultinsert=mysql_query($sql,$conecta) or die(mysql_error().$sql." erro #SQL_3");


     }
 
 
 
if(mysql_affected_rows() === 1){


    die("<script>
                alert('Contestacao atualizada com sucesso para a cotacao ".$tabela['n_da_cotacao']."');
                document.location.replace('principal.php?&t=forms/formconsulta_cotacoes_contestacao_manual.php');
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
