<?php
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css">
 <script>
    <!--
    function Carregado() {
      Msg_Carregando.style.display='none';
      pagina.style.display='block';
    }
    -->
    </script>
</head>
<body OnLoad="Carregado()" background="../../tp/img/background.JPG">
    <div id="Msg_Carregando">
      <script>
      <!--
      document.write('<img src = "../img/carregando.gif"> Carregando...')
      -->
      </script>
      </div>
      <script>
      <!--
      document.write('<div id="pagina" style="display: none;">')
      -->
      </script>
<?php

$tempo = 0;

set_time_limit($tempo);

  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");
  $mes=date("Y-m-");

//inicia conexão com o banco de dados
include "../conexao.php";


$sql_valida2 ="delete from base_erros_linhas";
$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	

//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//Abre o arquivo CSV


$abraArq = fopen("$nome_arquivo", "r");

//Realiza o if caso não tenha arquivo
if (!$abraArq)
	{
    	echo ("<p>Arquivo n&atilde;o encontrado</p>");
	}

else
	{
    //Ignora os cabeçalhos do arquivo
    $headerLine = true;

    //Abre o arquivo e coloca o número máximo de caracteres
    	while ($linha = fgetcsv ($abraArq, 4096, ";"))
    	{
        	if($headerLine)
        	{
            $headerLine = false;
        	}
        	else
        	{
if($linha[3] =="")
{
	
}else
{
  $beta=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );
	 
    $linha[3]=str_replace($alfa,$beta,$linha[3]);
	$linha[3]=trim(strtoupper($linha[3]));
 }

if($linha[5] =="")
{
	
}else
{
  $beta=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );
	 
    $linha[5]=str_replace($alfa,$beta,$linha[5]);
	$linha[5]=strtoupper($linha[5]);
 }


if($linha[7] =="")
{
	
}else
{
  $beta=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );


	 
    $linha[7]=str_replace($alfa,$beta,$linha[7]);
	$linha[7]=strtoupper($linha[7]);
 }


//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = $linha[31];
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";
$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;
$linha[31] = $data;
$data_atual = date('Y-m-d');
$valida_erro = "ok";
$tipo_erro = $linha[4];
$tipo_erro2 = $linha[4];

//Atualização: dia 23/09/2013 - por Lauro - chamado nº 79
$erro_vivocorp = $tipo_erro2;


if ($tipo_erro == "Erro ativação de serviços"){
	$tipo_erro = "Erro de Serviço";
}
else if($tipo_erro == "Erro Ativação Linha Atlys"){
	$tipo_erro = "Linha";
}
else if($tipo_erro == "Erro Criação Cliente Atlys"){
	$tipo_erro = "Cliente Conta";
}
else if($tipo_erro == "Erro Criação Conta Atlys"){
	$tipo_erro = "Cliente Conta";
}
else if($tipo_erro == "Erro Geração OV"){
	$tipo_erro = "OV";
}
else if ($tipo_erro == "Erro na troca de serviços"){
	$tipo_erro = "Erro de Serviço";
}
else if($tipo_erro == "Erro Transferência Tit."){
	$tipo_erro = "Erro de Serviço";
}



if ($linha[34] == 'CO/N'){
	$linha[34] = 'CO';
	}
if ($linha[34] == ''){
	$linha[34] = 'ND';
	}

$cnpj=$linha[46];

$cnpj33=$cnpj[0].$cnpj[1].$cnpj[2].$cnpj[3].$cnpj[4].$cnpj[5].$cnpj[6].$cnpj[7];



$nome_cadastro = $_SESSION["nome"];
$hora_atual = date ('H:i');
$data_atual = date ('Y-m-d');

	//	echo $cnpj33;
	//	echo "<br>";
	
	
	        $sql = "INSERT IGNORE INTO base_erros_linhas ( pedido,
														   revisao)VALUES ('$linha[6]',
															               '$linha[9]'
															                          )";

                 $result = mysql_query($sql) or die(mysql_error());
			
                $sql_valida = "select * from base_erros where pedido = '$linha[6]' and revisao = '$linha[9]' and tipo ='$tipo_erro'";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                $linha_valida = mysql_num_rows($acao_valida);
			
				$teste = "$linha_valida";	
				
				if($linha_valida != 0)
                {
               
                }
               
                else
				{

				     	 $sql = "INSERT IGNORE INTO base_erros (	
				   											   pedido,
															   comentario,
															   tipo,
															   portabilidade,
															   cliente,
															   status,
															   status_do_pedido,
															   revisao,
															   regional,
															   criado_em,
															   alta,
															   troca,
															   transferencia_titularidade,
                                                               adabas,
															   usuario,
															   fila,
															   nome2,
															   tramite,
															   data_tramite,
															   turno,
															   cnpj,
															   status_tp,
															   disc_status_tp,
															   vpe,
															   cnpj_raiz,
															   operador,
															   cadastro_manual,
															   hora_base,
															   data_base,
															   operador_base,
															   tipo_vivocorp
															   )
                                                               VALUES (
															   '$linha[6]',
															   '$linha[3]',	
															   '$tipo_erro',	
															   '$linha[37]',	
															   '$linha[5]',
															   '$linha[23]',
															   '$linha[8]',
															   '$linha[9]',
															   '$linha[34]',
															   '$linha[31]',
															   '$linha[35]',
															   '$linha[38]',
															   '$linha[39]',
                                                               ' ',
															   'Aguardando Operador',
															   '1',
															   'Aguardando Operador',
															   'Aguardando',
															   '$data_atual',
															   'ND',
															   '$linha[46]',
															   '1',
															   'Aberto',
															   'Nao',
															   '$cnpj33',
															   'Aguardando Operador',
															   'Não',
															   '$hora_atual',
															   '$data_atual',
															   '$nome_cadastro',
															   '$erro_vivocorp'
															   	)";

                   $result = mysql_query($sql) or die(mysql_error());
				   
				 }
				 
$sql_valida2 ="SELECT pedido,revisao from base_erros_linhas where pedido='$linha[6]' and revisao = '$linha[9]'";
			$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	
								
				$dado= mysql_fetch_array($acao_valida2);
				{
				$pedido = $dado["pedido"];
				}
				$contlinhas=mysql_num_rows($acao_valida2);	 
   				 
          
			/*	echo $pedido."=".$contlinhas;
				echo "<br>";
                echo $mes;*/				 
			 
$sql_valida4 ="UPDATE base_erros_linhas set linhas = '$contlinhas' where pedido='$linha[6]' and revisao = '$linha[9]'";
$acao_valida4 = mysql_query($sql_valida4) or die (mysql_error());	

			 
$sql_valida6 ="UPDATE base_erros set linhas = '$contlinhas' where pedido='$linha[6]' and revisao = '$linha[9]'";
$acao_valida6 = mysql_query($sql_valida6) or die (mysql_error());	


}
}
}

 $sql_valida = "SELECT base_vpe.cnpj_raiz,base_erros.cnpj_raiz,base_erros.data_tramite FROM base_vpe,base_erros WHERE base_vpe.cnpj_raiz = base_erros.cnpj_raiz and base_erros.data_tramite LIKE '%$mes%'";
 $acao_valida = mysql_query($sql_valida) or die (mysql_error());

 while($linha_valida = mysql_fetch_array($acao_valida))
			         {
				     $raiz = $linha_valida["cnpj_raiz"];	
				
					
$sql_atualiza="UPDATE base_erros SET vpe = 'sim' WHERE cnpj_raiz = '$raiz'";
//$sql_atu = "$sql_atualiza";
//echo $sql_atu;

					 
$acao_vpe = mysql_query($sql_atualiza) or die (mysql_error());  

					   
					 }

	


echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";

 

?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_erros.php'">	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>