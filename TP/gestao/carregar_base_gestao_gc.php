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
                $sql_valida = "DELETE FROM gc_gestao";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());
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


if($linha[2] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`"
   );
	 
    $linha[2]=str_replace($alfa2,$beta2,$linha[2]);
	$linha[2]=strtoupper($linha[2]);
}

include "../../tp/conexao.php";


//                $linha_valida = mysql_num_rows($acao_valida);
			
//				 $teste = "$linha_valida";	
							
//                echo $teste;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                 $sql = "INSERT IGNORE INTO gc_gestao(regional,
				 										codigo_adabas,
														nome
														)
                                                 VALUES ('$linha[0]',
														'$linha[1]',
														'$linha[2]'
														)";

                   $result = mysql_query($sql) or die(mysql_error());
				   //echo $result;
   }
  }
 }



echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";
	
?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_gestao_gc.php'">	

     <script>
    <!--
    document.write('</div>')
    -->
    </script>

</body>
</html>
