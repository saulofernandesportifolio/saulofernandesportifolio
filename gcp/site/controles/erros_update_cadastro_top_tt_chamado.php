<?php 

 if($perfil!= 13){
    
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



if(empty($_POST["substatus"]) || empty($_POST["motivodaacao"]) || empty($_POST['obs_chamado'])){
    
    
echo "
       <script type=\"text/javascript\">
        alert('Selecionar a Ação, Motivo da ação e Observação !');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}

$tempo = 0;

set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

$dt_dia = date("Y-m-d");
  
$data_tratamento=date('Y-m_d');
$hora_tratamento=date('H:i:s');

$data_cadastro_comentario=date("d/m/Y H:i:s");

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

 if($_POST['substatus'] == 31 )
{
$disc_status_cip="Aguardando chamado";
$status="Pendente";
$acao="Pendente chamado";
$fila =31;
$tramite="Chamado";
}

if($_POST['substatus'] == 32 )
{
$disc_status_cip="Chamado solucionado";
$status="Pendente";
$acao="Chamado solucionado"; 
$fila=32;
$tramite="Chamado";
}
if($_POST['substatus'] == 33 )
{
$disc_status_cip="Chamado em tratativa";
$status="Pendente";
$acao="Pendente chamado";
$fila=33;
$tramite="Chamado";
}

                        
$comentario_novo=$_POST['obs_chamado'];  
$comentario_antigo=$_POST['comentarioantigo'];

$pula = "\n";
$comentario = trim($comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome2);
         

                        
 $sql_update = "UPDATE bd_erros_pn.base_erros_top_tt_chamado SET
					comentario = '$comentario',
					fila = '$fila',
				      	status_tp = '$fila',
					disc_status_tp = '$disc_status_cip',
                                        idtbl_usuario_chamado= '$id_user',
                                        data_tratamento='$data_tratamento',
                                        hora_tratamento='$hora_tratamento'
									
					WHERE  idch ='{$_POST['id1']}'";
	
 $update = mysql_query($sql_update,$conecta2) or die (mysql_error());
                        
$sql_update = "UPDATE bd_erros_pn.base_erros_top_tt SET
					comentario = '$comentario'					
									
					WHERE  id ='{$_POST['id2']}'";
	
 $update = mysql_query($sql_update,$conecta2) or die (mysql_error());                       
              

if($_POST['substatus'] == 32){


   $sql_update = "UPDATE bd_erros_pn.base_erros_top_tt SET
					comentario = '$comentario',
					fila = '1',
				        tramite = '$tramite',
					data_tramite = '$dt_dia',
			         	status_tp = '1',
					disc_status_tp = 'Retorno chamado'
                                        
									
					WHERE  id ='{$_POST['id2']}'";
	
    $update = mysql_query($sql_update,$conecta2) or die (mysql_error());
 
 
 
 
 
 

  $sql="SELECT * FROM bd_erros_pn.base_erros_top_tt_chamado WHERE id='{$_POST['id1']}'";
  $result = mysql_query($sql,$conecta2);
				 while ($dado= mysql_fetch_array($result))
		         {
				 $pedido = $dado["pedido"];
				 $tipo = $dado["tipo"];
				 $portabilidade = $dado["portabilidade"];
				 $cliente = $dado["cliente"];
				 $status_do_pedido = $dado["status_do_pedido"];
				 $revisao = $dado["revisao"];
				 $regional = $dado["regional"];
				 $criado_em = $dado["criado_em"];
				 $alta = $dado["alta"];
				 $troca = $dado["troca"];
				 $transferencia_titularidade = $dado["transferencia_titularidade"];
				 $data_correcao = $dado["data_correcao"];
				 $id_tabelao = $dado["id_tabelao"];
				 $fila = $dado["fila"];
				 $status = $dado["status"];
				 $nome2 = $dado["nome2"];
				 $tramite = $dado["tramite"];
				 $data_tramite = $dado["data_tramite"];
				 $turno = $dado["turno"];
				 $id= $dado['id'];
				// $primeiro_operador = $dado["primeiro_operador"];
				 }

    $sql_insert = "CALL bd_erros_pn.carrega_base_erros_historico_top_tt("."'{$id}'".")";
	
    $insert = mysql_query($sql_insert,$conecta2) or die (mysql_error());

 }



	 echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/form_fila_cotacao_top_tt_chamado.php');
		</script>
 		";


 mysql_free_result($insert,$update);
 mysql_close($conecta,$conecta2);		

?>
    
