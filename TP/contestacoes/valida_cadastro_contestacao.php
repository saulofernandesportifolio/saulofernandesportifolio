<?php
/**
 * @author Lauro Pereira
 * @copyright 2014
 */
 date_default_timezone_set('Brazil/East');

/*function arrumaString($string) {

    // matriz de entrada
    $str1 = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç','\'','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

    // matriz de saída
    $str2   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    return str_replace($str1, $str2, $string);
}*/


function arrumaString($string) {

 return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',$string)); 
}



include '../conexao.php';
$sql = "SELECT id FROM tp.usuarios WHERE nome = '".$_POST['analista_atv']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_1");
 $id = $consulta['id'];
 
    $tabela = array(
    'n_pedido'=> $_POST['n_pedido'], 
    'revisao'=> $_POST['revisao'], 
    'dt_entrada'=> 'DATE_FORMAT('.$_POST['dt_entrada'].', \'%Y-%m-%d\')',
	'regional'=> $_POST['regional'], 
	'cd_adabas'=> $_POST['cd_adabas'], 
	'contestacao'=> $_POST['contestacao'], 
	'tp_ofensor'=> $_POST['tp_ofensor'], 
	'usuario_tratamento'=> $_POST['operador'], 
	'dt_retorno'=> date('Y/m/d H:i:s'), 
	'motivo'=> $_POST['motivos_erro'],
	'sub_motivo'=> $_POST['dc_erro'], 
	'oferta'=>(isset($_POST['ofertas']))?$_POST['ofertas']:"NULL",
	'analista_atv'=> $id,
	'tp_pedido'=> $_POST['tipo_pedido'],
	'reanalize_completa'=> $_POST['cont_t_an'], 
	'parecer'=> arrumaString($_POST['parecer']),
    'tipo_contestado'=>arrumaString($_POST['item_fdv']),
	'texto'=> arrumaString($_POST['email']),
    'dt_retorno2'=> date('Y/m/d'),
    'canal'=> $_POST['canal']
    );
    
$sql = "SELECT 
		CASE WHEN MAX(qtd_contestacoes) IS NULL 
		     THEN 0
		     ELSE MAX(qtd_contestacoes)
		END +1 as qtd_cont
	    FROM base_contestacoes 
	    WHERE n_pedido='".$tabela['n_pedido']."' AND revisao=".$tabela['revisao'].";";
 $consulta = mysql_fetch_assoc(mysql_query($sql)) or die(mysql_error().$sql." erro #SQL_2");
 $tabela['qtd_contestacoes'] = $consulta['qtd_cont'];
 

$sql = "insert into `tp`.`base_contestacoes`(
            `n_pedido`, 
            `revisao`, 
            `qtd_contestacoes`,
            `dt_entrada`, 
            `regional`, 
            `cd_adabas`, 
            `contestacao`, 
            `tp_ofensor`, 
            `usuario_tratamento`, 
            `dt_retorno`, 
            `motivo`, 
            `sub_motivo`, 
            `oferta`, 
            `analista_atv`, 
            `tp_pedido`, 
            `reanalize_completa`, 
            `parecer`, 
            `texto`,
            `tipo_contestado`,
            `dt_retorno2`,
            `canal`)
     values( '".
            $tabela['n_pedido']."', ".
            $tabela['revisao'].", ".
            $tabela['qtd_contestacoes'].", ".
            "STR_TO_DATE('".$_POST['dt_entrada']."', '%d/%m/%Y')".", '".
            $tabela['regional']."', '".
            $tabela['cd_adabas']."', ".
            $tabela['contestacao'].", ".
            $tabela['tp_ofensor'].", ".
            $tabela['usuario_tratamento'].", '".
            $tabela['dt_retorno']."', ".
            $tabela['motivo'].", ".
            $tabela['sub_motivo'].", ".
            $tabela['oferta'].", '".
            $tabela['analista_atv']."', ".
            $tabela['tp_pedido'].", '".
            $tabela['reanalize_completa']."', '".
            arrumaString($tabela['parecer'])."', '".
            arrumaString($tabela['texto'])."','".
            arrumaString($tabela['tipo_contestado'])."','".
            $tabela['dt_retorno2']."','".
            $tabela['canal']."')";
 mysql_query($sql) or die(mysql_error().$sql." erro #SQL_2");
 if(mysql_affected_rows() === 1){
    die("<script>
                alert('Contestação inserida com sucesso para o pedido ".$tabela['n_pedido']."');
                window.location.assign('http://empreza.absbrasil.com/tp/home.php');
         </script>");
 }else{
    die("<script>
                alert('Não foi possivel inserir contestação, favor verificar os dados inseridos.');
                window.location.assign('http://empreza.absbrasil.com/tp/home.php');
         </script>");
 }
?>