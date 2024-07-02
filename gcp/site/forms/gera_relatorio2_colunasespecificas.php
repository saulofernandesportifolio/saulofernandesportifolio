<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/jquery.tablesorter.min.js"></script>
<script src="js/jquery.tablesorter.pager.js"></script>

<script>
    $(function(){
      
      $('table > tbody > tr:odd').addClass('odd');
      
      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });
      
      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });
      
      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });
      
      //$('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
      
      $("table") 
        .tablesorter({
          dateFormat: 'uk',
          headers: {
            0: {
              sorter: false
            },
            5: {
              sorter: false
            }
          }
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd').addClass('odd');
        });
      
    });
    </script>


        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />



<script language="JavaScript">
function abrir(URL) {
 
  var width = 1024;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>

<script>
var actionButton = document.querySelector('.action');
actionButton.addEventListener('click', myFunction);

/* Usando jQuery */
$('.action').on('click', myFunction);

</script>


<script>

<!-- Função Checkbox selecionar todos -->

function selecionar_todas(retorno) {
    var frm = document.myform;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>

<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>
<br /><br />
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







$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
        $cpf                =$linha_operador["cpf"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("site/forms/relatorios/relatorio_$data.$cpf.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array( 
      'PRINCIPAL',
	    'COMPLEMENTAR',
      'REVIS&Atilde;O',
      'DATA INCLUS&Atilde;O GALA',
      'ALTAS',
      'PORTAB.',
      'MIGRACOES',
      'TROCAS',
      'TT',
      'BACKUP',
      'M_2_M',
      'FIXA',
      'PRE POS',
      'MIGRACAO TROCA',
      'TOTAL LINHAS'      
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala_vpev2/bd.php");

   ini_set ('mysql.connect_timeout','19600000'); 
   ini_set ('default_socket_timeout','19600000'); 
   ini_set('memory_limit', '-1'); 


if(empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1){



  if($_POST['substatus'] == '%'){

     $lg="%";

     $lg2=$lg;

  }else{

     $lg2=$_POST['substatus'];

  }

  // Calcula uma data daqui 2 dias e 2 mêses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');


  $sql_servico="CALL exportar_top_nv("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";


  }elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1 || $_POST['pesquisa'] == 4){

  $data_1=arrumadatahora2($_POST['data_1']);
 
  $data_2=arrumadatahora2($_POST['data_2']);

  if($_POST['substatus'] == '%'){

     $lg="%";

     $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

$sql_servico="CALL exportar_top_nv("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

}elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 5){

    $data_1=arrumadatahora2($_POST['data_1']);
 
    $data_2=arrumadatahora2($_POST['data_2']); 

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

$sql_servico="CALL exportar_top_nv2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 5){

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

    // Calcula uma data daqui 2 dias e 2 mêses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');


  $sql_servico="CALL exportar_top_nv2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( !empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 3){

    $data_1=arrumadatahora2($_POST['data_1']);
 
    $data_2=arrumadatahora2($_POST['data_2']); 

  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

 $sql_servico="CALL exportar_top_nv3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }elseif( empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 3){

    
  if($_POST['substatus'] == '%'){

  $lg="%";

  $lg2=$lg;

  }else{

  $lg2=$_POST['substatus'];

  }

   // Calcula uma data daqui 2 dias e 2 mêses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');

$sql_servico="CALL exportar_top_nv3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

 }

 /*
if(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1 
  || empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1 
  || $_POST['pesquisa'] == 4){

  $sql_servico="CALL exporta_top_total("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

}elseif($_POST['pesquisa'] == 5){

 $sql_servico="CALL exporta_top_total2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

}elseif($_POST['pesquisa'] == 3){

  $sql_servico="CALL exporta_top3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".","."'{$setor}'".")";

}*/

       
     $consulta_servico = mysql_query($sql_servico) or die (mysql_error());


      $num_teste=mysql_num_rows($consulta_servico);

 if($num_teste == 0){
  
  echo"
      <script type=\"text/javascript\">
      alert('Sem dados nestes crit\u00e9rios de pesquisa');
      history.go(-1);
      </script>
      ";


  }



     if($consulta_servico ==true){
    
   
      while($linha = mysql_fetch_array($consulta_servico)){
       
        if($linha['turno'] == 1)
                    { 
                        $linha['turno']="Diurno";
                    }
                    elseif($linha['turno'] == 2)
                        { 
                        $linha['turno']=utf8_encode("Intermediário");
                        } 
                    elseif($linha['turno'] == 3)
                        { 
                        $linha['turno']="Noturno";
                        }
                    
                    
                  if($linha['setor'] == "Auditoria")
                        { 
                        $linha['setor']="Analise de input";
                        }
                        elseif($linha['setor'] == "Análise/Auditoria")
                        { 
                        $linha['setor']="Analise/Analise de input";
                        }

   /*   $sqlraiz ="SELECT * FROM empresa_especial c

            WHERE c.raiz_grupo='{$linha['cpf_cnpj']}' ";


$acaoraiz =mysql_query($sqlraiz)or die(mysql_error());

$acaoraiz2 = mysql_fetch_assoc($acaoraiz);

  //$acaoraiz2["raiz_grupo"];
  //echo '<br>';

 // echo $acaoraiz["cpf_cnpj"];
if($acaoraiz2["raiz_grupo"] == $linha['cpf_cnpj']){

      $CLIENTE TIPO=$acaoraiz2["grupo"];
     $cor = '#FF0000';

     //echo $cpf_cnpj;
  
    }else{ 
      $CLIENTE TIPO="-"; 
      $cor = '#464646';

     // echo $cpf_cnpj;
    }*/

if(empty($linha['cliente_tipo'])){

  $cliente_tipo="TOP";
  $cor = '#464646';
 
}else{

  $cliente_tipo=$linha['cliente_tipo'];
   $cor = '#FF0000';

}
        

       
      $myArr=array( $linha['cotacao_principal'],
	                  $linha['n_da_cotacao'],
                    $linha['revisao'],
                    arrumadatahora($linha['dt_inclusao_bd_cip']),
                    $linha['ALTAS'],
                    $linha['PORTABILIDADE2'],
                    $linha['MIGRACAO'],
                    $linha['TROCAS'],
                    $linha['TT'],
                    $linha['BACKUP'],
                    $linha['M_2_M'],
                    $linha['FIXA'],
                    $linha['PRE_POS'],
                    $linha['MIGRACAO_TROCA'], 
                    $linha['total_linhas_cip']
                          
                    );
         $excel->writeLine($myArr);
      
      }
    }
    $excel->close();

	?>
   
     
</tbody>
</table>

  <?php
    echo utf8_encode(
    "<hr>
      <div align='center'>
            <a  target=\"_blank\" href=\"site/forms/relatorios/relatorio_$data.$cpf.xls\">
            <font size='2' color='#FFFFFF'>
                Abrir relatório em formato Excel.
            </font>    
            </a>
        </div>
    <hr>");


  /*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data2 = date("Y-m-d");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data2 . "0 months -1 days");
// Exibe o resultado
 $data_1 =date('d-m-Y', $timestamp); // 



$somefile="site/forms/relatorios/relatorio_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

