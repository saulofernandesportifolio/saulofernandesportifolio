<?php



function arrumadata($string) {
    if($string == ''){
    $data=substr($string,8,3)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data=substr($string,8,3)."/".substr($string,5,2)."/".substr($string,0,4);   
    }

 return $data;
}  



function arrumadatahora($string2) {
    
    if($string2 == ''){
    $data2=  substr($string2,8,2)."".substr($string2,5,2)."".substr($string2,0,4)." ".substr($string2,10,9);
       }else{
        
      $data2= substr($string2,8,2)."/".substr($string2,5,2)."/".substr($string2,0,4)." ".substr($string2,10,9);
        
       }
return $data2;
}





function arrumadatahora2($string3) {
    
    if($string3 == ''){
    $data3= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);
       }else{
        
      $data3= substr($string3,6,4)."-".substr($string3,3,2)."-".substr($string3,0,2);
        
       }
return $data3;
}

 include("../../bd.php");


$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_GET['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta);
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
       $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        $cpf                =$linha_operador["cpf"];
		}
                
                
      
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $idtbl_usuario != 256){
    
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

$data_1=$_POST['data_1'];
 
$data_2=$_POST['data_2'];

$turno=$_POST['turno'];

$setor=$_POST['setor'];

$_POST['pesquisa'];


$data = date("d-m-Y");


   ini_set ('mysql.connect_timeout', '222059000000'); 
   ini_set ('default_socket_timeout','222059000000'); 
   ini_set('memory_limit', '-1'); 


    

//include('../gala_gov/site/phpexcel/classes/PHPExcel.php');
//include('../gala_gov/site/phpexcel/classes/PHPExcel/IOFactory.php');

//require_once 'phpexcel/Classes/PHPExcel.php';
//require_once 'phpexcel/Classes/PHPExcel/IOFactory.php';


    


if(empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1){



  if($_POST['substatus'] == '%'){

     $lg="%";

     $lg2=$lg;

  }else{

     $lg2=$_POST['substatus'];

  }

  // Calcula uma data daqui 2 dias e 2 m�ses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');


 $sql_servico="CALL cip_nv.consolida1("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";


  }elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1 || $_POST['pesquisa'] == 4){

  $data_1=arrumadatahora2($_POST['data_1']);
 
  $data_2=arrumadatahora2($_POST['data_2']);

  if($_POST['substatus'] == '%'){

     $lg="%";

     $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

$sql_servico="CALL cip_nv.consolida1("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

}elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 5){

    $data_1=arrumadatahora2($_POST['data_1']);
 
    $data_2=arrumadatahora2($_POST['data_2']); 

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

$sql_servico="CALL cip_nv.consolida2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 5){

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

    // Calcula uma data daqui 2 dias e 2 m�ses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');


  $sql_servico="CALL cip_nv.consolida2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( !empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 3){

    $data_1=arrumadatahora2($_POST['data_1']);
 
    $data_2=arrumadatahora2($_POST['data_2']); 

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

 $sql_servico="CALL cip_nv.consolida3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 3){

    
  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

   // Calcula uma data daqui 2 dias e 2 m�ses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');

$sql_servico="CALL cip_nv.consolida3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }


       
     $consulta_servico = mysql_query($sql_servico,$conecta);


      $num_teste=mysql_num_rows($consulta_servico);
      
     
  if($num_teste == 0){
  
  echo"
      <script type=\"text/javascript\">
      alert('Sem dados nestes crit\u00e9rios de pesquisa');
      history.go(-1);
      </script>
      ";


  }





      //arquivo txt
       
     $arquivo = 'relatorio'.'_'.$data.'_'.$cpf.'.txt';

     $cabtxt='PRINCIPAL;COMPLEMENTAR;REGIONAL;UF;TIPO;REVISAO;CLIENTE;CRIADO EM;STATUS VIVOCORP;SUB-STATUS VIVOCORP;STATUS GALA;DISC STATUS GALA;OPERADOR;COMENTARIO OPERADOR;DATA INCLUSAO GALA;DATA DISTRIBUICAO GALA;DATA TRATAMENTO;HORA TRATAMENTO;TIPO SERVIÇOS;ALTAS;PORTAB.;MIGRACOES;TROCAS;TT;BACKUP;M_2_M;FIXA;PRE POS;MIGRACAO TROCA;TOTAL LINHAS;SETOR;TURNO;DIA;TEMPO;TIPO PROCESSO;TIPO DE LINHA;SLA DIAS;PRAZO_DIAS;VISAO;VENCIMENTO;TIPO_COTACAO;DATA_CONTRATO;DOCUMENTO;CLIENTE TIPO;CPF CNPJ;DATA QUANTIFICACAO;USUARIO QUANTIFICACAO;BASE CARREGADO POR;OFERTA SMARTVIVO CORPORATE';
     $cabtxt.="\n";  
echo $cabtxt;

while($linha = mysql_fetch_row($consulta_servico))
{

if(empty($linha[49])){

  $cliente_tipo="TOP";
  $cor = '#464646';
 
}else{

  $cliente_tipo=$linha[49];
   $cor = '#FF0000';

}


$conteudo ='"'.$linha[2].'"';
$conteudo.=";";
$conteudo.='"'.$linha[3].'"';
$conteudo.=";";
$conteudo.='"'.$linha[0].'"';
$conteudo.=";";
$conteudo.='"'.$linha[1].'"';
$conteudo.=";";
$conteudo.='"'.$linha[6].'"';
$conteudo.=";";
$conteudo.='"'.$linha[4].'"';
$conteudo.=";";
$conteudo.='"'.$linha[7].'"';
$conteudo.=";";
$conteudo.='"'.$linha[5].'"';
$conteudo.=";";
$conteudo.='"'.$linha[8].'"';
$conteudo.=";";
$conteudo.='"'.$linha[9].'"';
$conteudo.=";";
$conteudo.='"'.$linha[38].'"';
$conteudo.=";";
$conteudo.='"'.$linha[39].'"';
$conteudo.=";";
$conteudo.='"'.$linha[40].'"';
$conteudo.=";";
$conteudo.='"'.$linha[44].'"';
$conteudo.=";";
$conteudo.='"'.arrumadatahora($linha[23]).'"';
$conteudo.=";";
$conteudo.='"'.arrumadatahora($linha[37]).'"';
$conteudo.=";";
$conteudo.='"'.arrumadata($linha[41]).'"';
$conteudo.=";";
$conteudo.='"'.$linha[42].'"';
$conteudo.=";";
$conteudo.='"'.$linha[21].'"';
$conteudo.=";";
$conteudo.='"'.$linha[11].'"';
$conteudo.=";";
$conteudo.='"'.$linha[12].'"';
$conteudo.=";";
$conteudo.='"'.$linha[13].'"';
$conteudo.=";";
$conteudo.='"'.$linha[14].'"';
$conteudo.=";";
$conteudo.='"'.$linha[15].'"';
$conteudo.=";";
$conteudo.='"'.$linha[16].'"';
$conteudo.=";";
$conteudo.='"'.$linha[17].'"';
$conteudo.=";";
$conteudo.='"'.$linha[18].'"';
$conteudo.=";";
$conteudo.='"'.$linha[19].'"';
$conteudo.=";";
$conteudo.='"'.$linha[20].'"';
$conteudo.=";";
$conteudo.='"'.$linha[22].'"';
$conteudo.=";";
$conteudo.='"'.$linha[43].'"';
$conteudo.=";";
$conteudo.='"'.$linha[45].'"';
$conteudo.=";";
$conteudo.='"'.$linha[24].'"';
$conteudo.=";";
$conteudo.='"'.$linha[25].'"';
$conteudo.=";";
$conteudo.='"'.$linha[26].'"';
$conteudo.=";";
$conteudo.='"'.$linha[27].'"';
$conteudo.=";";
$conteudo.='"'.$linha[28].'"';
$conteudo.=";";
$conteudo.='"'.$linha[29].'"';
$conteudo.=";";
$conteudo.='"'.arrumadatahora($linha[30]).'"';
$conteudo.=";";
$conteudo.='"'.arrumadatahora($linha[31]).'"';
$conteudo.=";";
$conteudo.='"'.$linha[32].'"';
$conteudo.=";";
$conteudo.='"'.arrumadata($linha[46]).'"';
$conteudo.=";";
$conteudo.='"'.$linha[47].'"';
$conteudo.=";";
$conteudo.='"'.$cliente_tipo.'"';
$conteudo.=";";
$conteudo.='"'.$linha[33].'"';
$conteudo.=";";
$conteudo.='"'.arrumadata($linha[34]).'"';
$conteudo.=";";
$conteudo.='"'.$linha[35].'"';
$conteudo.=";";
$conteudo.='"'.$linha[36].'"';
$conteudo.=";";
$conteudo.='"'.$linha[48].'"';
//aqui defini só 2 campos...você pode definir quantos quizer...
$conteudo.="\n";

$sai = fopen($arquivo,"a+");
$result = fputs($sai,$conteudo);
echo $conteudo;
fclose($sai);
}



header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment');
header('Content-Disposition: attachment; filename="'.$arquivo);
 






























/*
echo $somefile="..//site/forms/relatorios/$arq";


error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);

   


    echo utf8_encode(
    "<hr>
      <div align='center'><font size='2' color='#666666'>
            <a  target=\"_blank\" href=\"..//site/forms/relatorios/relatorio_$data.$cpf.zip\">
                Abrir relatório em formato txt.
            </a>
        </font></div>
    <hr>");



  /*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
/*$data2 = date("Y-m-d");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data2 . "0 months -1 days");
// Exibe o resultado
 $data_1 =date('d-m-Y', $timestamp); // 



$somefile="..//site/forms/relatorios/relatorio_$data.$cpf.zip";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);*/

?>