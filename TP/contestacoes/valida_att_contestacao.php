<?php
/**
 * @author Lauro Pereira
 * @copyright 2014
 */
 date_default_timezone_set('Brazil/East');

function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}

include '../conexao.php';

$oferta=(!isset($_POST['ofertas']) || empty($_POST['ofertas']))?"NULL":$_POST['ofertas'];

$sql = "SELECT id FROM tp.usuarios WHERE nome = '".$_POST['analista_atv']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['id'];

$sql = "SELECT 
		CASE WHEN MAX(qtd_contestacoes) IS NULL 
		     THEN 0
		     ELSE MAX(qtd_contestacoes)
		END +1 as qtd_cont
	    FROM base_contestacoes 
	    WHERE n_pedido='".$_POST['n_pedido']."' AND revisao=".$_POST['revisao'].";";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $qtd_cont = $consulta['qtd_cont'];


$dt_entrada=$_POST['dt_entrada']=substr($_POST['dt_entrada'],6,4)."-".substr($_POST['dt_entrada'],3,2)."-".substr($_POST['dt_entrada'],0,2);

$sql = "UPDATE `tp`.`base_contestacoes` SET 
            n_pedido= '". $_POST['n_pedido']."', 
            revisao= '". $_POST['revisao']."', 
            qtd_contestacoes= '". $qtd_cont."', 
            dt_entrada= '$dt_entrada', 
        	regional= '". $_POST['regional']."', 
        	cd_adabas= '". $_POST['cd_adabas']."', 
        	contestacao= ". $_POST['contestacao'].", 
        	tp_ofensor= ". $_POST['tp_ofensor'].", 
        	usuario_tratamento= ". $_POST['operador'].", 
        	dt_atualizacao= '". date('Y/m/d H:i:s')."', 
        	motivo= ". $_POST['motivos_erro'].", 
        	sub_motivo= ". $_POST['dc_erro'].", 
        	oferta = ".$oferta.",
        	usuario_att= ". $id .", 
        	tp_pedido= ". $_POST['tipo_pedido'].", 
        	reanalize_completa= '". $_POST['cont_t_an']."', 
        	parecer= '". arrumaString($_POST['parecer'])."', 
            tipo_contestado= '". arrumaString($_POST['item_fdv'])."', 
        	texto= '". arrumaString($_POST['email'])."',
            canal= '".$_POST['canal']."'
             
            WHERE id_contestacao = ". $_POST['id_contestacao']."";

 mysql_query($sql) or die(mysql_error().$sql." erro #SQL_2");
 if(mysql_affected_rows() === 1){
    die("<script>
                alert('Contestação atualizada com sucesso pelo operador ".$_POST['analista_atv']."');
                window.location.assign('http://empreza.absbrasil.com/tp/home.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                window.location.assign('http://empreza.absbrasil.com/tp/home.php');
         </script>");
 }
?>