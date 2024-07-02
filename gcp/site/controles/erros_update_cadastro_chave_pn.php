<?php 


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
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


 if($perfil != 16){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
}


if(empty($_POST["protocolo"])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar o operador!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}

$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");

 $sql = "SELECT idtbl_usuario,nome,turno,cpf FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id_user = $consulta['idtbl_usuario'];
 $login= $consulta['cpf'];
 $nome2=$consulta['nome'];

 if($consulta['turno'] == 1)
                    { 
                        $turno="Diurno";
                    }
                    elseif($consulta['turno'] == 2)
                        { 
                        $turno=utf8_encode("Intermediário");
                        } 
                    elseif($consulta['turno'] == 3)
                        { 
                        $turno="Noturno";
                        }


	      $protocolo        = $_POST["protocolo"];
	      $pedido           = $_POST["pedido"];
	      $status_pedido    = $_POST["status_pedido"];
        $data_janela      = arrumadata($_POST["data_janela"]);
        $segmento         = $_POST["segmento"];
        $solicitante      = $_POST["solicitante"];
        $qtd_linhas       = $_POST["qtd_linhas"];
        $portabilidade    = $_POST["portabilidade"];
        $submotivos       = $_POST["submotivos"];
        $dtjanela         = arrumadata($_POST["data_jan1"]);
        $emailsolicitante = $_POST["emailsolicitante"];
        $emailretorno     = $_POST["emailretorno"];
        $emailsolicitante2 = $_POST["emailsolicitante"];
        $emailretorno2     = $_POST["emailretorno"];
        $status_tp         = $_POST['status_tp'];
        $datarecebimento  = arrumadatahora($_POST["datarecebimento"]." ".$_POST["horarecebimento"]); 
        $dataretorno  = arrumadatahora($_POST["dataretorno"]." ".$_POST["horaretorno"]);  
 
        if( $portabilidade == 1){            
             $portabilidade='Agendamento';
        }elseif( $portabilidade == 2){
            
             $portabilidade='Reagendamento';
        }elseif( $portabilidade == 3){
            $portabilidade='Cancelamento';
        }elseif( $portabilidade == 4){
            $portabilidade='Substituição de Linha';
        }elseif( $portabilidade == 5){
            $portabilidade='Agendamento Parcial do Pedido';
        }elseif( $portabilidade == 6){
            $portabilidade='Agendamento Total do Pedido';
        }elseif( $portabilidade == 7){
            $portabilidade='Portabilidade Negada';
        }elseif( $portabilidade == 8){
            $portabilidade='Correção de adabas';
        }elseif( $portabilidade == 9){
            $portabilidade='Atualização de status';
        }elseif( $portabilidade == 10){
            $portabilidade='Reenvio de pedido';
        }elseif( $portabilidade == 11){
            $portabilidade='Duvidas';
        }elseif( $portabilidade == 12){
            $portabilidade='Portabilidade negada';
        }


$data_cadastro_comentario = date("d/m/Y H:i:s");				 

$pula = "\n";
$emailsolicitante = trim($emailsolicitante.$pula.$data_cadastro_comentario." : ".$emailsolicitante2." "."-"." ".$nome2);


$pula = "\n";
$emailretorno= trim($emailretorno.$pula.$data_cadastro_comentario." : ".$emailretorno2." "."-"." ".$nome2);


$data_cadastro = date("Y-m-d");


 
 
 $data_tratamento=date('Y-m_d');
$hora_tratamento=date('H:i:s');

$data_tramite= date("Y-m-d");

if ($status_tp	== 2){
	$disc_status_tp = "Em Tratamento";
	$fila = 2;
	$tramite = "Em Tratamento";
	$data_correcao = date("Y-m-d");
}
if ($status_tp	== 3){
	$disc_status_tp = "Concluido";
	$fila = 3;
	$tramite = "Concluido";
	$data_correcao = date("Y-m-d");
 
}
if ($status_tp	== 4){
	$disc_status_tp = "Chamado TI";
	$fila = 4;
	$tramite = "Chamado TI";
	$data_correcao = date("Y-m-d");
}
if ($status_tp	== 5){
	$disc_status_tp = "Aguardando Comercial";
	$fila = 5;
	$tramite = "Aguardando Comercial";
	$data_correcao = date("Y-m-d");
}


 $sql_update = "UPDATE bd_erros_pn.tbl_chave_pn SET 
                                      protocolo='$protocolo',
                                      pedido='$pedido', 
                                      status_pedido='$status_pedido',
                                      data_janela='$data_janela',
                                      segmento='$segmento',
                                      solicitante='$solicitante',
                                      qtd_linha='$qtd_linhas',
                                      motivo_tratativa='$portabilidade',
                                      submotivo_tratativa='$submotivos',
                                      data_da_nova_janela='$dtjanela',
                                      email_solicitante='$emailsolicitante',
                                      email_retorno='$emailretorno',
                                      data_recebimento='$datarecebimento',
                                      data_retorno='$dataretorno',
                                      fila='$fila',
                                      disc_status_fila='$disc_status_tp',
                                      usuario='$nome2',
                                      data_tratativa='$data_tratamento',
				      hora_tratativa='$hora_tratamento',
                                      cpf='$login'    
	   	WHERE id_pn_chave ='{$_POST['id']}' ";
	
 $update = mysql_query($sql_update,$conecta2) or die (mysql_error());
 
 
 


    $sql_insert = "CALL bd_erros_pn.carrega_base_chave_historico_pn("."'{$_POST['id']}'".")";
	
    $insert = mysql_query($sql_insert,$conecta2) or die (mysql_error());


	 echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/form_fila_cotacao_chave_pn.php');
		</script>
 		";

 mysql_close($conecta,$conecta2);		

?>
    
