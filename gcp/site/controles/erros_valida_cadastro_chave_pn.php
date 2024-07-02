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



if(empty($_POST["pedido"]))
{
    
   
echo "
       <script type=\"text/javascript\">
        alert('Preencher todos os campos do formulario!');
        history.back();
	    </script>
 ";
  exit(); 
    
    
    
}


if(empty($_POST["pedido"]) || empty($_POST["submotivos"])){

echo "
       <script type=\"text/javascript\">
        alert('Verificar se foi selecionado o tipo de erro e ofensor!');
        history.back();
	    </script>
 ";
  exit(); 
    
	
}



	$tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
  $hr_dia = date("H:i:s");




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

        
        
        
$data_cadastro = date("Y-m-d");	
$data_cadastro_comentario = date('d/m/Y');	
//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$criado_em";

				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("/",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$criado_em2 = $data;

  $sql = "SELECT idtbl_usuario,nome,turno,cpf FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id_user = $consulta['idtbl_usuario'];
 $login= $consulta['cpf'];
 $nome1=$consulta['nome'];
 $turno = $_SESSION["turno"];				

//$comentario = $data_cadastro_comentario." : ".trim($comentario)." "."-"." ".$nome1;
$variavel1oe =  $emailretorno ;
$variavel2oe=  $data_cadastro_comentario;
$variavel3oe = $nome1;
$emailretorno  =$variavel2oe." "."-"." ".$variavel1oe." "."-"." ".$variavel3oe;


$variavel1oa =  $emailsolicitante;
$variavel2oa=  $data_cadastro_comentario;
$variavel3oa = $nome1;
$emailretorno  =$variavel2oa." "."-"." ".$variavel1oa." "."-"." ".$variavel3oa;


$data_atual = date('Y-m-d');
//echo $status_do_pedido;
 $query="INSERT INTO bd_erros_pn.tbl_chave_pn(
                                      protocolo,
                                      pedido,
                                      status_pedido,
                                      data_janela,
                                      segmento,
                                      solicitante,
                                      qtd_linha,
                                      motivo_tratativa,
                                      submotivo_tratativa,
                                      data_da_nova_janela, 
                                      email_solicitante,
                                      email_retorno,
                                      data_recebimento,
                                      data_retorno,
                                      fila,
                                      disc_status_fila,
                                      usuario,
                                      cpf
				    ) 
				   VALUES				   
				   (
                                    '$protocolo',
	                            '$pedido',
	                            '$status_pedido',
                                    '$data_janela',
                                    '$segmento',
                                    '$solicitante',
	                            '$qtd_linhas',
                                    '$portabilidade',
                                    '$submotivos',
                                    '$dtjanela',
                                    '$emailsolicitante',
                                    '$emailretorno',
                                    '$datarecebimento',
                                    '$dataretorno',
                                    '1',
                                    'Aberto',
                                    'Aguardando Operador',
                                    'Aguardando Operador'
				   )";
  (!mysql_query($query,$conecta2)); 


		
							
		/*
				$sql_atualiza="UPDATE bd_erros_pn.base_erros SET vpe = 'SIM' WHERE nome_do_gestor LIKE '%Accenture - %' AND  pedido='$pedido' ";
                $acao_vpe = mysql_query($sql_atualiza,$conecta2) or die (mysql_error()); */
				
		


	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
                alert('Gerado o protocolo $protocolo !');
		document.location.replace('principal.php?t=forms/form_fila_cotacao_chave_pn.php');
		</script>
 		";



 mysql_free_result($acao_vpe);
 mysql_close($conecta,$conecta2);		

?>
    
</div>
</body>
</html>