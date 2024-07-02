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
//Testa se o perfil está correto.

	if($_SESSION["carrega_base_erros"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
        
<?php

$tempo = 0;

set_time_limit($tempo);

  date_default_timezone_set("Brazil/East");

  $dt_dia = date("Y-m-d");

//inicia conexão com o banco de dados
include "../conexao.php";

 ini_set('memory_limit', '-1'); 

$sql_valida2 ="delete from base_erros_linhas";
$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	

//Recebe o nome do arquivo enviado
$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
//Abre o arquivo CSV


//$abraArq = fopen("$nome_arquivo", "r");
$row = 1;
 $abraArq = $handle = fopen ("$nome_arquivo","r");

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
    	/*while ($linha = fgetcsv ($abraArq, 4096, ";"))
    	{
        	if($headerLine)
        	{
            $headerLine = false;
        	}*/
            
        //$row = 1;
        //$handle = fopen ("teste.csv","r");
        while (($linha= fgetcsv($handle, 4096, ";")) !== FALSE) {
          
              if($headerLine)
        	  {
              $headerLine = false;
        	  } 
            else
            { 
        $num = count ($linha);
        //echo "<p> $num campos na linha $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
        /*echo*/ $linha[$c] . "<br />\n";
        }
   
                	   
    
         
                  
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
	                 
	                      
	             
               
          			
                $sql_valida = "select * from base_erros where pedido = '$linha[6]' and revisao = '$linha[9]' and tipo_vivocorp ='$erro_vivocorp'";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                $linha_valida = mysql_num_rows($acao_valida);
			
				$teste = "$linha_valida";	
				
				if($linha_valida != 0)
                {
               
                }
               
                else
				{
               //Atualiza tipo cliente
              $update_cnpj = "SELECT * FROM base_vpe WHERE cnpj_raiz = '$cnpj33'";
              $acao = mysql_query($update_cnpj) or die (mysql_error());
              $valida=mysql_num_rows($acao);
              if($valida != 0)
              {
	          $tipo_cliente	= 'Sim';
              }
              else
              {
                   $tipo_cliente = 'Nao';
              }

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
															   '$linha[22]',
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
															   '$tipo_cliente',
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
                 

        if($num > 0){                                     
        //for($i=0;$i < $num;$i++){
                  
       $sql = "INSERT IGNORE INTO base_erros_linhas ( pedido,
                                                     revisao)VALUES('$linha[6]',
															        '$linha[9]')";
      $result = mysql_query($sql) or die(mysql_error());
    
      //}
       }           
                 
				 
$sql_valida2 ="SELECT pedido,revisao from base_erros_linhas where pedido='$linha[6]' and revisao = '$linha[9]'";
			$acao_valida2 = mysql_query($sql_valida2) or die (mysql_error());	
								
				$dado= mysql_fetch_array($acao_valida2);
				{
				$pedido = $dado["pedido"];
                $revisao= $dado["revisao"]; 
				
				$contlinhas=mysql_num_rows($acao_valida2);	 
   				 
          
				/*echo $pedido."=".$contlinhas;
				echo "<br>";*/				 
		 
$sql_valida4 ="UPDATE base_erros_linhas set linhas = '$contlinhas' where pedido='$pedido' and revisao = '$revisao'";
$acao_valida4 = mysql_query($sql_valida4) or die (mysql_error());	

			 
$sql_valida6 ="UPDATE base_erros set linhas = '$contlinhas' where pedido='$pedido' and revisao = '$revisao'";
$acao_valida6 = mysql_query($sql_valida6) or die (mysql_error());	
                
               }

/**
 * $sql_valida3 ="SELECT base_erros.pedido,base_erros.revisao,base_erros.cnpj_raiz,base_vpe.cnpj_raiz FROM base_erros,base_vpe WHERE base_erros.pedido='$linha[6]' and base_erros.revisao = '$linha[9]' and base_erros.cnpj_raiz=base_vpe.cnpj_raiz";
 * 			$acao_valida3 = mysql_query($sql_valida3) or die (mysql_error());	
 * 								
 * 			while($dado= mysql_fetch_array($acao_valida3))
 * 				{
 * 				//$pedido = $dado["pedido"];
 *                  $raiz = $dado["cnpj_raiz"];
 *                  
 *            
 *                   
 *                     $sql_atualiza="UPDATE base_erros SET vpe = 'sim' WHERE cnpj_raiz = '$raiz'";
 *                     $acao_vpe = mysql_query($sql_atualiza) or die (mysql_error());  
 *                     
 *                     
 *                 
 *                 }
 */
                       
}
}
}
fclose ($handle); 
 
                 	


echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";


/*
echo"
		<script type=\"text/javascript\">
		alert('Base Carregada efetuado!');
		document.location.replace('../../tp/home.php');
		</script>
 		";*/

 $_SESSION["carrega_base_erros"];

//$aut=$_SESSION["carrega_base_erros"];

//echo $aut;

?>
	



<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_erros.php?aut2=<?php echo $_SESSION["carrega_base_erros"];?>'" /></p>


     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>