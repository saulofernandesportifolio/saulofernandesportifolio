<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E - GTQ  - Gestão Tramite Qualidade</title>

<link href="../css/estilo.css" rel="stylesheet" type="text/css">

 <script>
    <!--
     
    function Carregado() {
      Msg_Carregando.style.display='none';
      pagina.style.display='block';
    }
    -->
    </script>


</head>

<body  background="../../tp/img/background.JPG" OnLoad="Carregado()">

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

  //$data_inclusao_bd = date("Y/m/d H:i:s");
  //$data_inclusao_bd2 = date("Y/m/d");

//inicia conexão com o banco de dados
include "../../tp/conexao.php";

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


  //Retira acentos e caracteres especias da strings

 /*//////////////////realiza tratamento nas palavras do campo (status_pedido) com acento antes de cadastrar no banco////////////////////////////////////////////////////////////
if($linha[4] =="")
{
	
}else
{
  $beta=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`"
   );
	 
    $linha[4]=str_replace($alfa,$beta,$linha[4]);
	//$omega=strtoupper($gama);
   //$omega=strip_tags($omega);
   //$omega=trim($omega);
  // print_r($gama);
//echo "<br>";


}*/

 //////////////////realiza tratamento nas palavras do campo (Nome Cliente)com acento antes de cadastrar no banco////////////////////////////////////////////////////////////
if($linha[5] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`"
   );
	 
    $linha[5]=str_replace($alfa2,$beta2,$linha[5]);
	$linha[5]=strtoupper($linha[5]);
   //$omega=strip_tags($omega);
   //$omega=trim($omega);
  // print_r($gama);
//echo "<br>";


}
       
            			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////			 
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano = "$linha[1]";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$linha[1] = $data;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
				 
if ($linha[16] <> 0){   
//VARIAVEL COM A DATA NO FORMATO AMERICANO
$data_americano2 = "$linha[16]";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data2 = explode(" ",$data_americano2);
$data2="$partes_da_data2[0]";
$datatransf2= explode("/",$data2);
$data2 = "$datatransf2[2]-$datatransf2[1]-$datatransf2[0]";
//$datacompleta = $data;

$linha[16] = $data2;

}
else
{
$linha[16] = "0000-00-00";
//echo $linha[16];
//echo "<br>";
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//echo $linha[4];
//echo "<br>"; 
	
//Verifica se atividades ja existente no sistema
include "../../tp/conexao.php";

                $sql_valida = "SELECT * FROM controle_pn_bko WHERE numero_pedido = '$linha[2]' and status_pedido = '$linha[4]'";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());

                 $linha_valida = mysql_num_rows($acao_valida);
			
				 $teste = "$linha_valida";	
							
                //echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                   
                }
               
                else
				{
                //Se não localizado, realiza a inclusão em banco de dados
                    				
						
                 $sql = "INSERT IGNORE INTO controle_pn_bko (regional,
				                                               data_inicial,
															   numero_pedido,
															   revisao,
															   status_pedido, 
															   nome_cliente, 
															   ultima_atualizacao_status, 
															   codigo_adabas, 
															   cpf_cnpj_cliente, 
															   cpf_cnpj_cliente_raiz, 
															   canal, 
															   nro_ordem, 
															   ordem_manual, 
															   pistolagem_leitura, 
															   data_tramite, 
															   tmo, 
															   data_janela, 
															   aprovacao_pedido, 
															   chamado, 
															   erro, 
															   plano_acao, 
															   status_atlys, 
															   status_spn,
															   falando,
															   tratamento, 
															   obs_erro, 
															   pn, 
															   status_tp,
															   fila
															   )
                                                               VALUES ('$linha[0]',
															           '$linha[1]',
																	   '$linha[2]',
																	   '$linha[3]', 
																	   '$linha[4]', 
																	   '$linha[5]',
																	   '$linha[6]', 
																	   '$linha[7]', 
																	   '$linha[8]',  
																	   '$linha[9]', 
																	   '$linha[10]', 
																	   '$linha[11]', 
																	   '$linha[12]', 
																	   '$linha[13]', 
																	   '$linha[14]', 
																	   '$linha[15]', 
																	   '$linha[16]', 
																	   '$linha[17]', 
																	   '$linha[18]', 
																	   '$linha[19]', 
																	   '$linha[20]', 
																	   '$linha[21]', 
																	   '$linha[22]', 
																	   '$linha[23]', 
																	   '$linha[24]', 
																	   '$linha[25]', 
																	   '$linha[26]',
																	   1,
																	   1
																	   )";

                   $result = mysql_query($sql) or die(mysql_error());
              }
         }
    }
}

echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";

include "../../tp/conexao.php";
	
   $sql_valida = "UPDATE controle_pn_bko SET 
                                          disc_status_tp = 'Aberta'
										  WHERE status_tp = 1";
   $acao_valida = mysql_query($sql_valida) or die (mysql_error());
 
   
 	
?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='../../tp/pn/adm_pn.php'">	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>
