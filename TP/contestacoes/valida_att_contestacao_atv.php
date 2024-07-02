<?php   
@session_start();

include '../../tp/funcoes.php';

?>

<?php
/**
 * @author saulo de assis
 * @copyright 2014
 */
 date_default_timezone_set('Brazil/East');
 
 
 

function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}

function arrumadata($string) {
    if($string == ''){
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
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

$calcula_data = date("d/m/Y");

include '../conexao.php';

$login = $_SESSION["login"];






 $sql = "SELECT id,login,nome FROM tp.usuarios WHERE login = '".$login."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['id'];
 $nome1= $consulta['nome'];

$sql = "SELECT 
		CASE WHEN MAX(qtd_contestacoes) IS NULL 
		     THEN 0
		     ELSE MAX(qtd_contestacoes)
		END +1 as qtd_cont
	    FROM base_contestacoes_atividades 
	    WHERE n_pedido='".$_POST['pedido']."' AND revisao=".$_POST['revisao']." OR n_atividade='".$_POST['n_atividade']."' AND revisao=".$_POST['revisao']." ;";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $qtd_cont = $consulta['qtd_cont'];



$data_do_recebimentof=$_POST['data_do_recebimento'];
$data =$data_do_recebimentof;
$data_exp_v1 = explode ('/',$data);
$dia = $data_exp_v1[0];
		switch (date('w',mktime(0,0,0,$data_exp_v1[1],$dia,$data_exp_v1[2]))) {
				case 6:
				$teste = 'sabado';
				break;
				default:
			echo	$teste = 'ok';
				break;
		}
							   
$data_modificada_dma = explode('/', $data_do_recebimentof);
$data_do_recebimento = $data_modificada_dma[0].'/'.$data_modificada_dma[1].'/'.$data_modificada_dma[2];
$teste1 =calcula_data_sla($data_do_recebimento,$calcula_data);


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
$data_modificada_dma = explode('/', $data_do_recebimentof);
$data_do_recebimento1 = $data_modificada_dma[2].'-'.$data_modificada_dma[1].'-'.$data_modificada_dma[0];
//echo '<BR> total um =' . $total;
if ($data_do_recebimento == $calcula_data){
	$total = diminui_hora($hora_do_recebimento,$hora_atual);
}




$pula = "\n";
$parecertotal = $_POST['parecer'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".arrumaString($_POST['parecer2'])." "."-"." ".$nome;


$pula = "\n";
$emailtotal = $_POST['email'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".arrumaString($_POST['email2'])." "."-"." ".$nome;


$pula = "\n";
$item_fdvtotal = $_POST['item_fdv'].$pula.$data_cadastro_obs=date("d/m/Y H:i:s")." : ".arrumaString($_POST['item_fdv2'])." "."-"." ".$nome;

//$data_do_recebimento=$_POST['data_do_recebimento']=substr($_POST['data_entrada'],6,4)."-".substr($_POST['data_entrada'],3,2)."-".substr($_POST['data_entrada'],0,2);

$sql = "UPDATE `tp`.`base_contestacoes_atividades` SET 
            regional= '".$_POST['regional']."',
            data_do_recebimento= '".arrumadata($_POST['data_do_recebimento'])."',
            hora_do_recebimento= '".$_POST['hora_do_recebimento']."',
            remetente= '". $_POST['remetente']."',
            n_atividade= '". $_POST['n_atividade']."',
            tipo = '". $_POST['tipo_atividade']."',
            n_pedido= '". $_POST['pedido']."',
            qtd_linhas =  '". $_POST['qtd_linhas']."',
            criado_em =  '".arrumadata($_POST['criado_em'])."',
            revisao= '". $_POST['revisao']."', 
            qtd_contestacoes= '". $qtd_cont."', 
            adabas= '". $_POST['adabas']."', 
        	cnpj= '". $_POST['cnpj']."',
            cliente =  '". $_POST['cliente']."',
            inicio_da_tratativa='".arrumadata($_POST['inicio_da_tratativa'])."',
            analista = '". $_POST['operador_input']."',
            ofensor= ". $_POST['tp_ofensor_input'].", 
            data_retorno = '".arrumadatahora($_POST['data_retorno'])."',
            tmt     = '".$total."',
            tipo2   =  '". $_POST['motivos_erro_input']."', 
            tipo_apurado =  '". $_POST['dc_erro']."', 
            observacoes_colaborador = '".$parecertotal."',
            retorno_do_email = '".$emailtotal."',
            tipo_contestado_FDV = '".$item_fdvtotal
            ."',  
            qtd_contestacoes = '".$qtd_cont."', 
            usuario_att = '". $id ."', 
            dt_atualizacao = '".date('Y/m/d H:i:s')."',
            dt_retorno2 = '".arrumadata($_POST['data_retorno'])."',  
            cotacao ='".$_POST['cotacao']."' 
                    
            WHERE id_contestacao_atv = ". $_POST['id_contestacao_atv']."";

 mysql_query($sql) or die(mysql_error().$sql." erro #SQL_2");
 if(mysql_affected_rows() === 1){
    die("<script>
                alert('Contestação atualizada com sucesso pelo operador ".$login."');
                window.location.assign('../../tp/contestacoes/pesquisa_contestacoes_atv.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                window.location.assign('../../tp/contestacoes/pesquisa_contestacoes_atv.php');
         </script>");
 }
?>