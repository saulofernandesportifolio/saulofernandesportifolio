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

<body  background="../../tp/img/background.JPG" onload="Carregado()">

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
  
ini_set ( 'mysql.connect_timeout' ,  '300' ); 
ini_set ( 'default_socket_timeout' ,  '300' );
ini_set('memory_limit', '-1');  

date_default_timezone_set("Brazil/East");


$data_base2=date("Y-m-d H:i:s");


include "../../tp/conexao.php";

$nome_temporario=$_FILES["file"]["tmp_name"]; 
$nome_arquivo = $nome_temporario;
$abraArq = fopen("$nome_arquivo", "r");

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

if($linha[5] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`",'"'
   );
	 
    $linha[5]=str_replace($alfa2,$beta2,$linha[5]);
	$linha[5]=strtoupper($linha[5]);
}

if($linha[9] =="")
{
	
}else
{
  $beta2=array(
     "a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u","c","A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","C","_","_","_","_","_","_","_","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_"
   );
   
   
   $alfa2=array(
      "á","à","ã","â","ä","é","è","ê","ë","í","ì","î","ï","ó","ò","õ","ô","ö","ú","ù","û","ü","ç","Á","À","Ã","Â","Ä","É","È","Ê","Ë","Í","Ì","Î","Ï","Ó","Ò","Õ","Ô","Ö","Ú","Ù","Û","Ü","Ç","\"","'","!","@","#","$","%","&","*","(",")","+","}","]","=","º","§","{","[","ª","?","/","°","<",">","\\","|",",",";",":","~","^","´","`",'"'
   );
	 
    $linha[9]=str_replace($alfa2,$beta2,$linha[9]);
	$linha[9]=strtoupper($linha[9]);
}
           			
$data_americano = "$linha[7]";
$data_termino_efetivo = $data_americano;
//$datacompleta = $data;
$data_modificada_amd = explode('/', $data_americano);
$data_termino_efetivo = $data_modificada_amd[2].'-'.$data_modificada_amd[1].'-'.$data_modificada_amd[0];	
$data_tramite = date("Y-m-d");
include "../../tp/conexao.php";
//echo $data_termino_efetivo .'<br>';

                $sql_valida = "SELECT * FROM base_gestao WHERE pedido ='$linha[1]'";
                $acao_valida = mysql_query($sql_valida) or die (mysql_error());
                $linha_valida = mysql_num_rows($acao_valida);
                $teste = "$linha_valida";	
							
                //echo $linha_valida;
			
                //Se localizar atividades no banco de dados, não é realizada nenhuma ação
                if($linha_valida > 0)
                {
                }
                else
				{
             $sql = "INSERT IGNORE INTO base_gestao(regional,
				 										pedido,
														revisao,
														canal,
														codigo_adabas,
														cliente,
														status_do_cliente,
                                                        termino_efetivo,
														acao,
														comentario,
														data_tramite,
														fila,
														status_tp,
														disc_status_tp,
														tramite,
														usuario,
														turno,
														nome2,
                                                        data_base
														)
                                                 VALUES ('$linha[0]',
														'$linha[1]',
														'$linha[2]',
														'$linha[3]',
														'$linha[4]',
														'$linha[5]',
														'$linha[6]',
														'$data_termino_efetivo',
														'$linha[8]',
														'$linha[9]',
														'$data_tramite',
														'1',
														'1',
														'Aberto',
														'Aguardando',
														'Aguardando Operador',
														'ND',
														'Aguardando Operador',
                                                        '$data_base2'
														)";

                   $result = mysql_query($sql) or die(mysql_error());
				  //echo "<br>".$result;
   }
  }
 }
}

$sql_teste="SELECT * FROM base_gestao, gc_gestao 
WHERE base_gestao.codigo_adabas = gc_gestao.codigo_adabas 
AND (base_gestao.gc IS NULL ) AND base_gestao.codigo_adabas = '-'";
$acao_valida2 = mysql_query($sql_teste) or die (mysql_error());
$sql_valida = mysql_num_rows($acao_valida2);

 if($sql_valida  > 0)
                {

$sql_atualiza="UPDATE base_gestao, gc_gestao SET base_gestao.gc = gc_gestao.nome 
WHERE base_gestao.codigo_adabas = gc_gestao.codigo_adabas 
and (base_gestao.gc IS NULL) AND base_gestao.codigo_adabas = '-'";
$sql_atu = "$sql_atualiza";
//echo $sql_atu;
$acao_vpe = mysql_query($sql_atu) or die (mysql_error()); 
}
echo "<br><font color='#999999' face='arial' size='2'>Base atualizada com sucesso!</font>";
?>
<p><input type="button" name="Submit2" value="Voltar" onClick="window.location='adm_gestao.php'">	
     <script>
    <!--
    document.write('</div>')
    -->
    </script>
</body>
</html>