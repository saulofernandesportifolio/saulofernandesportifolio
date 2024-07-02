<?php   

 if($perfil != 17){
    
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


if(empty($_POST["ofensor"]) || empty($_POST["motivo"])){

echo "
       <script type=\"text/javascript\">
        alert('Verificar se foi selecionado o tipo de erro e ofensor!');
        history.back();
	    </script>
 ";
  exit(); 
    
	
}


function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,6,4)."".substr($string2,3,2)."".substr($string2,0,2)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,6,4)."/".substr($string2,3,2)."/".substr($string2,0,2)." ".substr($string2,10,9);
        
       }
return $data2;
}


	$tempo = 0;

  set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
  $hr_dia = date("H:i:s");






	$id_filtro        =	$_POST["id_filtro"];
	$pedido           =	$_POST["pedido"];
	$adabas           = $_POST["adabas"];
	$criado_em        =	$_POST["criado_em"];
	$revisao          =	$_POST["revisao"];
	$cliente          = $_POST["cliente"];
	$portabilidade    = $_POST["portabilidade"];
	$status_do_pedido =	$_POST["status_do_pedido"];
	$regional         =	$_POST["regional"];
	$tipo_de_servico  = $_POST["tipo_de_servico"];
	$ofensor          =	$_POST["ofensor"];
	$cnpj             = $_POST["cnpj"];
	$operador         =	$_POST["operador"];
	$linhas           = $_POST["linhas"];
	$motivo_erro      = $_POST["motivo"];	
	$comentario       = $_POST["comentario"];
	$nome_do_gestor   = $_POST["nome_do_gestor"]; 
	$criado_por          = $_POST["criado_por"]; 
	$id_filtro_vivocorp  = $_POST["id_filtro_vivocorp"];
	$linhas              = $_POST["qtd_linhas"];
	
$data_cadastro = date("Y-m-d");	
$data_cadastro_comentario = date('d/m/Y');

echo $criado_em2=arrumadatahora($criado_em);

/*
//VARIAVEL COM A DATA NO FORMATO AMERICANO
				$data_americano = "$criado_em";

				//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
				$partes_da_data = explode(" ",$data_americano);
				$data="$partes_da_data[0]";
				
				$datatransf = explode("/",$data);
				$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
				//$datacompleta = $data;
				
				$criado_em2 = $data;*/

  $sql = "SELECT idtbl_usuario,nome,turno,cpf FROM cip_nv.tbl_usuarios WHERE idtbl_usuario = '".$_COOKIE['idtbl_usuario']."';";
 $consulta = mysql_fetch_assoc(mysql_query($sql,$conecta)) or die(mysql_error().$sql." erro #SQL_1");
 $id_user = $consulta['idtbl_usuario'];
 $login= $consulta['cpf'];
 $nome1=$consulta['nome'];
 $turno = $_SESSION["turno"];				

//$comentario = $data_cadastro_comentario." : ".trim($comentario)." "."-"." ".$nome1;
$variavel1oe = $comentario;
$variavel2oe=  $data_cadastro_comentario;
$variavel3oe = $nome1;
$comentario =$variavel2oe." "."-"." ".$variavel1oe." "."-"." ".$variavel3oe;



$raiz1=$cnpj[0].$cnpj[1].$cnpj[2].$cnpj[3].$cnpj[4].$cnpj[5].$cnpj[6].$cnpj[7];

if ($id_filtro == '1'){
		$tipo = 'Erro de Serviço';
	}
if ($id_filtro == '2'){
		$tipo = 'OV';
	}
if ($id_filtro == '3'){
		$tipo = 'Linhas';
	}
if ($id_filtro == '4'){
		$tipo = 'Cliente conta';
	}

if ($id_filtro == '5'){
		$tipo = 'Falha de comunicação';
	}

if ($id_filtro == '6'){
		$tipo = 'Pendente de Prosseguir';
	}


/*
if ($id_filtro_vivocorp == '1'){
		$tipo_vivocorp = 'Erro ativação de servicos';
	}
if ($id_filtro_vivocorp == '2'){
		$tipo_vivocorp = 'Erro na troca de serviços';
	}
if ($id_filtro_vivocorp == '3'){
		$tipo_vivocorp = 'Erro Transferência Tit.';
	}
if ($id_filtro_vivocorp == '4'){
		$tipo_vivocorp = 'Erro Ativação Linha Atlys';
	}
if ($id_filtro_vivocorp == '5'){
		$tipo_vivocorp = 'Erro Criação Cliente Atlys';
	}
if ($id_filtro_vivocorp == '6'){
		$tipo_vivocorp = 'Erro Criação Conta Atlys';
	}
if ($id_filtro_vivocorp == '7'){
		$tipo_vivocorp = 'Erro de cancelamento de numero';
	}
if ($id_filtro_vivocorp == '8'){
		$tipo_vivocorp = 'Erro Geração OV';
	}
if ($id_filtro_vivocorp == '9'){
		$tipo_vivocorp = 'Falha Geral de Comunicação';
	}
if ($id_filtro_vivocorp == '10'){
		$tipo_vivocorp = 'Pendente de Prosseguir';
	}*/


if ($id_filtro_vivocorp == '1'){
		$tipo_vivocorp = 'Erro ativação de servicos';
		$tipo = 'Erro de serviço';
	}
if ($id_filtro_vivocorp == '2'){
		$tipo_vivocorp = 'Erro na troca de serviços';
		$tipo = 'Erro de serviço';
	}
if ($id_filtro_vivocorp == '3'){
		$tipo_vivocorp = 'Erro Transferência Tit.';
		$tipo = 'Erro de serviço';
	}
if ($id_filtro_vivocorp == '4'){
		$tipo_vivocorp = 'Erro Ativação Linha Atlys';
		$tipo = 'Linhas';
	}
if ($id_filtro_vivocorp == '5'){
		$tipo_vivocorp = 'Erro Criação Cliente Atlys';
		$tipo = 'Cliente conta';
	}
if ($id_filtro_vivocorp == '6'){
		$tipo_vivocorp = 'Erro Criação Conta Atlys';
		$tipo = 'Cliente conta';
	}
if ($id_filtro_vivocorp == '7'){
		$tipo_vivocorp = 'Erro de cancelamento de numero';
		$tipo = 'Linhas';
	}
if ($id_filtro_vivocorp == '8'){
		$tipo_vivocorp = 'Erro Geração OV';
		$tipo = 'OV';
	}
if ($id_filtro_vivocorp == '9'){
		$tipo_vivocorp = 'Falha Geral de Comunicação';
		$tipo = 'Falha de comunicação';

	}
if ($id_filtro_vivocorp == '10'){
		$tipo_vivocorp = 'Pendente de Prosseguir';
		$tipo = 'Pendente de Prosseguir';
	}



	
if ($portabilidade== 'Sim'){
	$portabilidade='Y';
	}else $portabilidade='N';

if ($tipo_de_servico=='Alta'){
	$alta = 'Y';
	$troca = 'N';
	$transferencia_titularidade = 'N';
	}

if($tipo_de_servico=='Troca'){
	$alta = 'N';
	$troca = 'Y';
	$transferencia_titularidade = 'N';
	}
if($tipo_de_servico == 'Transferência de titularidade'){	
	$alta = 'N';
	$troca = 'N';
	$transferencia_titularidade = 'Y';
}
$data_atual = date('Y-m-d');
//echo $status_do_pedido;
 $query="INSERT INTO bd_erros_pn.base_erros_top_tt(
                   pedido,
				   comentario,
				   tipo,
				   portabilidade,
				   cliente,
				   status,
				   motivo_erro,
				   status_do_pedido,
				   revisao,
				   regional,
				   criado_em,
				   alta,
				   troca,
				   transferencia_titularidade,
				   ofensor,
				   adabas,
				   usuario,
				   fila,
				   nome2,
				   tramite,
				   data_tramite,
				   cnpj,
				   cnpj_raiz,
				   status_tp,
			       disc_status_tp,
				   operador,
				   linhas,
				   cadastro_manual,
				   nome_do_gestor,
				   criado_por,
				   tipo_vivocorp,
				   vpe,
				   operador_base,
				   data_base,
				   hora_base,
				   turno
				    ) 
				   VALUES				   
				   ('$pedido',
				   '$comentario',
				   '$tipo',
				   '$portabilidade',
				   '$cliente',
				   'Pendente',
				   '$motivo_erro',
				   '$status_do_pedido',
				   '$revisao',
				   '$regional',
				   '$criado_em2',
				   '$alta',
				   '$troca',
				   '$transferencia_titularidade',
				   '$ofensor',
				   '$adabas',
                   'Aguardando Operador',
                   '1',
                   'Aguardando Operador',
                   'Aguardando',
                   '$data_atual',
                   '$cnpj',
				   '$raiz1',
				   '1',
                   'Aberto',
				   '$operador',
				   '$linhas',
				   'Sim',
				   '$nome_do_gestor',
				   '$criado_por',
				   '$tipo_vivocorp',
				   'SIM',
				   '$nome1',
				   '$data_dia',
				   '$hora_dia',
				   '$turno'
				   )";
           (!mysql_query($query,$conecta2)); 


		
							
		/*
				$sql_atualiza="UPDATE bd_erros_pn.base_erros SET vpe = 'SIM' WHERE nome_do_gestor LIKE '%Accenture - %' AND  pedido='$pedido' ";
                $acao_vpe = mysql_query($sql_atualiza,$conecta2) or die (mysql_error()); */
				
		


	  echo"
		<script type=\"text/javascript\">
		alert('Cadastro efetuado!');
		document.location.replace('principal.php?&pedido={$pedido}&t=forms/formatualizar_base_erros_linhas_top_tt.php');
		</script>
 		";



 mysql_free_result($acao_vpe);
 mysql_close($conecta,$conecta2);		

?>
    
</div>
</body>
</html>