<?php 

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


if(empty($_POST["operador"]) || $_POST["operador"] == 'Aguardando Operador'){
    
    
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


$ofensor=$_POST["ofensor"];
$id=$_POST["id1"];
$adabas=$_POST["adabas"];
$motivo=$_POST["motivo"];
$status_tp=$_POST["status_tp"];
$comentario_antigo=trim($_POST["comentario_antigo"]);
$comentario_novo=$_POST["comentario_novo"];
$data_cadastro_comentario = date('d/m/Y');
$operador =  $_POST["operador"];

if($operador == 'SISTEMICO' || $operador == 'Sistemico'){

	$crit='sim';
}else{

	$crit='nao';
}
				 


$pula = "\n";
$comentario = trim($comentario_antigo.$pula.$data_cadastro_comentario." : ".$comentario_novo." "."-"." ".$nome2);

$data_cadastro = date("Y-m-d");


$sql_update1 = "UPDATE bd_erros_pn.base_erros_pn 
                   SET
				     nome2 = '$nome2'									
					WHERE  id ='$id'";
 $update1 = mysql_query($sql_update1,$conecta2) or die (mysql_error());


$sql="SELECT * FROM bd_erros_pn.base_erros_pn WHERE id='{$_POST['id1']}'";
        
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
				 $nome2 = $nome2;
				 $tramite = $dado["tramite"];
				 $data_tramite = $dado["data_tramite"];
				 $turno = $dado["turno"];
				 $id= $dado['id'];
				// $primeiro_operador = $dado["primeiro_operador"];
				 }
				 


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
	$status='Concluido';
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


if($crit == 'nao'){

 $sql2 = "SELECT idtbl_usuario,nome,turno,cpf FROM cip_nv.tbl_usuarios WHERE nome = '$operador' ";
 $consulta2 = mysql_fetch_assoc(mysql_query($sql2,$conecta)) or die(mysql_error().$sql2." erro #SQL_2");
 $id_user2 = $consulta2['idtbl_usuario'];

 if($consulta2['turno'] == 1)
                    { 
                        $turnoop="Diurno";
                    }
                    elseif($consulta2['turno'] == 2)
                        { 
                        $turnoop=utf8_encode("Intermediário");
                        } 
                    elseif($consulta2['turno'] == 3)
                        { 
                        $turnoop="Noturno";
                        }

}elseif($crit == 'sim'){

	$turnoop=$turno;
	$operador='SISTEMICO';

}

$data_tratamento=date('Y-m_d');
$hora_tratamento=date('H:i:s');

 $sql_update = "UPDATE bd_erros_pn.base_erros_pn SET
				    pedido = '$pedido',
					comentario = '$comentario',
					tipo = '$tipo',
					motivo_erro = '$motivo',
					portabilidade = '$portabilidade',
					cliente = '$cliente',
					status = '$status',
					status_do_pedido = '$status_do_pedido',
					revisao = '$revisao',
					regional = '$regional',
					criado_em = '$criado_em',
					alta = '$alta',
					troca = '$troca',
					transferencia_titularidade = '$transferencia_titularidade',
					data_correcao = '$data_correcao',
					ofensor = '$ofensor',
					adabas = '$adabas',										
					usuario = '$login',
			     	fila = '$fila',
					nome2 = '$nome2',
					tramite = '$tramite',
					data_tramite = '$data_tramite',
					turno = '$turno',
					status_tp = '$status_tp',
					disc_status_tp = '$disc_status_tp',
					operador = '$operador',
					turno_ofensor='$turnoop',
					data_tratamento='$data_tratamento',
					hora_tratamento='$hora_tratamento'									
					WHERE  id ='$id'";
	
 $update = mysql_query($sql_update,$conecta2) or die (mysql_error());



    $sql_insert = "CALL bd_erros_pn.carrega_base_erros_historico_pn("."'{$id}'".")";
	
    $insert = mysql_query($sql_insert,$conecta2) or die (mysql_error());





	 echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?t=forms/form_fila_cotacao_erros_pn.php');
		</script>
 		";


 mysql_free_result($insert,$update);
 mysql_close($conecta,$conecta2);		

?>
    
