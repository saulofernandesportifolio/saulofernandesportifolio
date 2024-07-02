<?php
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>

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

 ini_set('memory_limit', '-1'); 

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




$data_americano = "$linha[1]";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";

$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;

$linha[1] = $data;


if($linha[5] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );
	 
    $linha[5]=str_replace($alfa2,$beta2,$linha[5]);
	$linha[5]=strtoupper($linha[5]);
   //$omega=strip_tags($omega);
   //$omega=trim($omega);
  // print_r($gama);
//echo "<br>";


}
 
if($linha[3] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","-"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`","–"
   );
	 
    $linha[3]=str_replace($alfa2,$beta2,$linha[3]);
	$linha[3]=strtoupper($linha[3]);
   //$omega=strip_tags($omega);
   //$omega=trim($omega);
  // print_r($gama);
//echo "<br>";


}       
            			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////			 

$data_americano = "$linha[1]";
//$data_t = date("Y-m-d");
 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode("/",$data_americano);
$datatransf="$partes_da_data[0]";

//$datatransf = explode("/",$data);
$data = "$datatransf[2]-$datatransf[1]-$datatransf[0]";
//$datacompleta = $data;
$nome_cadastro = $_SESSION["nome"];
$hora_atual = date ('H:i');
$data_atual = date ('Y-m-d');
	
//Verifica se atividades ja existente no sistema
include "../../tp/conexao.php";

 $sql_valida = "SELECT * FROM ilha_reversao_direto_bko WHERE pedido ='$linha[2]'and revisao ='$linha[4]'";
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
                  $sql = "INSERT IGNORE INTO ilha_reversao_direto_bko(regional,
				  													   criado_em,
																	   pedido,
																	   cliente,
																	   revisao,
																	   comentario,
																	   ilha_gc,
																	   status_tp,
																	   fila,
																	   hora_base,
																	   data_base,
																	   operador_base,
																	   disc_status_tp,
																	   tramite,
																	   usuario,
																	   nome2,
																	   data_tramite,
																	   turno,
																	   cadastro_manual
															          )
                                                               VALUES ('$linha[0]',
															   		   '$linha[1]',
																	   '$linha[2]',
																	   '$linha[3]',
																	   '$linha[4]',
																	   '$linha[5]',
																	   '$linha[6]',
																	   1,
																	   1,
																	   '$hora_atual',
																	   '$data_atual',
																	   '$nome_cadastro',
																	   'Aberta',
																	   'Aguardando',
																	   'Aguardando Operador',
																	   'Aguardando Operador',
																	   '$data_atual',
																	   'ND',
																	   'Nao'
																	   )";

                   $result = mysql_query($sql) or die(mysql_error());
				   
           }
       }
   }
}

echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";

?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_reversao_direto.php'">	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>
