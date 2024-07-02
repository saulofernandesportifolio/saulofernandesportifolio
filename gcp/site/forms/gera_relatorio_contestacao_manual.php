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
$acao_operador = mysql_query($sql_operador,$conecta);
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal              =$linha_operador["tramite"];
        $cpf                =$linha_operador["cpf"];
		}
  
if($perfil != 1 && $perfil != 4 && $idtbl_usuario != 518 && $idtbl_usuario != 428 && $idtbl_usuario != 432 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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


if($_POST['pesquisa'] == 4 && empty($_POST['data_1']) && empty($_POST['data_2']) 
  || $_POST['pesquisa'] == 3 && empty($_POST['data_1']) && empty($_POST['data_2']) 
  || $_POST['pesquisa'] == 5 && empty($_POST['data_1']) && empty($_POST['data_2']) ){
    

    
  echo"
      <script type=\"text/javascript\">
      alert('Sem dados nestes crit\u00e9rios de pesquisa');
      history.go(-1);
      </script>
      ";

   exit();    
    
    
}




$data_1=$_POST['data_1'];
 
$data_2=$_POST['data_2'];

$turno=$_POST['turno2'];

 

$data = date("d-m-Y");
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("site/forms/relatorios/relatorio_contestacao_manual_$data.$cpf.xls");

    if($excel==false){
        echo $excel->error;
   }
   
//Escreve o nome dos campos de uma tabela
   $myArr=array( 
      'COTACAO ATIVIDADE PEDIDO',
      'REGIONAL',
      'UF',
      'TIPO',
      'REVIS&Atilde;O',
      'CLIENTE',
      'CRIADO EM',
      'STATUS VIVOCORP',
      'OPERADOR CONTESTACAO',	
      'INICIO TRATATIVA',
      'DATA DO RECEBIMENTO',
      'HORA DO RECEBIMENTO',
      'DATA RETORNO',
      'HORA RETORNO',
      'DATA TRATAMENTO', 
      'HORA TRATAMENTO', 
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
      'TOTAL LINHAS',
      'SETOR',
      'TURNO',
      'REMETENTE',
      'ADABAS',
      'OFENSOR',
      'COLABORADOR',
      'TURNO_OP',
      'TIPO DE ERRO',
      'DESCRI&Ccedil;&Atilde;O ERRO',
      'QTD ERROS',
      'TMT',
      'RETORNO DO EMAIL',
      'EMAIL FDV',
      'CONTESTACAO',
      'DATA ENVIO E-MAIL',
      'HORA ENVIO E-MAIL',
      'CONTESTACAO STATUS CIP',
      'DATA DA CORRECAO',
      'HORA DA CORRECAO',
      'DATA RET. CORRECAO',
      'HORA RET. CORRECAO',
      'DATA ENVIO QUALIDADE',
      'HORA ENVIO QUALIDADE',
      'DATA RET. QUALIDADE',
      'HORA RET. QUALIDADE'  
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala_vpev2/bd.php");




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

 $sql_servico="CALL cip_nv.exportar_top_nv_contestacao_manual("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".")";


}elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1){


 $data_1=arrumadatahora2($_POST['data_1']);
 
 $data_2=arrumadatahora2($_POST['data_2']); 


  if($_POST['substatus'] == '%'){

$lg="%";

$lg2=$lg;


}else{

$lg2=$_POST['substatus'];

}

$sql_servico="CALL cip_nv.exportar_top_nv_contestacao_manual("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".")";

}elseif($_POST['pesquisa'] == 4 && !empty($data_1) && !empty($data_2)){

 $data_1=arrumadatahora2($_POST['data_1']);
 
 $data_2=arrumadatahora2($_POST['data_2']);  


if($_POST['substatus'] == '%'){

$lg="%";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$sql_servico="CALL cip_nv.exportar_top_nv_contestacao_manual("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".")";


}elseif($_POST['pesquisa'] == 5 && !empty($data_1) && !empty($data_2) ){

 $data_1=arrumadatahora2($_POST['data_1']);
 
 $data_2=arrumadatahora2($_POST['data_2']);  


if($_POST['substatus'] == '%'){

$lg="%";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}

$sql_servico="CALL cip_nv.exportar_top_nv_contestacao_manual2("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".")";

}elseif($_POST['pesquisa'] == 3 && !empty($data_1) && !empty($data_2)){

 $data_1=arrumadatahora2($_POST['data_1']);
 
 $data_2=arrumadatahora2($_POST['data_2']);  


if($_POST['substatus'] == '%'){

$lg="%";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}

 $sql_servico="CALL cip_nv.exportar_top_nv_contestacao_manual3("."'{$data_1}'".","."'{$data_2}'".","."'{$lg2}'".","."'{$turno}'".")";

}


  
    $consulta_servico = mysql_query($sql_servico,$conecta);

   $num_teste=mysql_num_rows($consulta_servico);

 if( $num_teste == 0){
  
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
                        
          if($linha['turno_op'] == 1)
                    { 
                        $linha['turno_op']="Diurno";
                    }
                    elseif($linha['turno_op'] == 2)
                        { 
                        $linha['turno_op']=utf8_encode("Intermediário");
                        } 
                    elseif($linha['turno_op'] == 3)
                        { 
                        $linha['turno_op']="Noturno";
                        }                
                       
                  if($linha['setor'] == "Auditoria")
                        { 
                        $linha['setor']="Analise de input";
                        }
                        elseif($linha['setor'] == "Análise/Auditoria")
                        { 
                        $linha['setor']="Analise/Analise de input";
                        }


   
                  if($linha['contestacao'] == 1){

                    $linha['contestacao']='Improcedente';
                  } 
                  if($linha['contestacao'] == 2){

                    $linha['contestacao']='Procedente';
                  } 
                  if($linha['contestacao'] == 3){

                    $linha['contestacao']='Indevido';
                  }



                  if($linha['contestacao_status_cip'] == 1){

                    $linha['contestacao_status_cip'] ='Pendente de correção';
                  } 
                  if($linha['contestacao_status_cip']  == 2){

                    $linha['contestacao_status_cip'] ='Tratando';
                  } 
                  if($linha['contestacao_status_cip']  == 3){

                    $linha['contestacao_status_cip'] ='Tratado';
                  }

                  if($linha['contestacao_status_cip']  == 4){

                    $linha['contestacao_status_cip'] ='Pendente qualidade';
                  }





if(arrumadata($linha['data_envio_email']) == '00/00/0000' && $linha['hora_envio_email'] == '00:00:00'){

    $linha['data_envio_email']='';
    $linha['hora_envio_email']='';

}if($linha['contestacao_status_cip'] == '0'){

   $linha['contestacao_status_cip']='';

 }if(arrumadata($linha['data_da_correcao']) == '00/00/0000' && $linha['hora_da_correcao'] == '00:00:00'){

     $linha['data_da_correcao']='';  
     $linha['hora_da_correcao']='';  

  }if(arrumadata($linha['data_ret_correcao']) == '00/00/0000' && $linha['hora_ret_correcao'] == '00:00:00'){

      $linha['data_ret_correcao']='';
      $linha['hora_ret_correcao']='';

   }if(arrumadata($linha['data_do_enviovivo']) == '00/00/0000' && $linha['hora_do_enviovivo'] == '00:00:00'){

       $linha['data_do_enviovivo']='';  
       $linha['hora_do_enviovivo']=''; 

    }if(arrumadata($linha['data_do_retornovivo']) == '00/00/0000' && $linha['hora_do_retornovivo'] == '00:00:00'){

        $linha['data_do_retornovivo']='';
        $linha['hora_do_retornovivo']='';
      }
                    


    if(arrumadatahora($linha['dt_atualizacao']) == '00/00/0000 00:00:00' || $linha['dt_atualizacao'] == '0000-00-00 00:00:00'){
        $linha['dt_atualizacao'] ='';
    }

      if(arrumadata($linha['data_tratamento']) == '00/00/0000' && $linha['hora_tratamento'] == '00:00:00'){
        $linha['data_tratamento'] ='';
        $linha['hora_tratamento'] ='';
      }
          if(arrumadata($linha['ds_tratamento']) == '00/00/0000' && $linha['ds_hora_tratamento'] == '00:00:00'){
             $linha['data_tratamento'] ='';
             $linha['ds_hora_tratamento'] ='';
           }
    
            if(arrumadata($linha['data_retorno']) == '00/00/0000' && $linha['hora_retorno'] == '00:00:00'){
             $linha['data_retorno'] ='';
             $linha['hora_retorno'] ='';
            }



if(empty($linha['colaborador'])){

  $linha['colaborador']="NAO HOUVE";
}

if(empty($linha['turno_ofensor'])){

  $linha['turno_ofensor']="-";
}


     
      $myArr=array( $linha['cotacao_atividade_pedido'],
                    $linha['regional_atribuida'],
	                $linha['uf'],
                    $linha['segmento'],
                    $linha['revisao'],
                    $linha['cliente'],
	                arrumadatahora($linha['criado_em']),
 	                $linha['status'],
                    $linha['analista_contestacao'],
                    arrumadatahora($linha['inicio_da_tratativa']),
                    arrumadata($linha['data_do_recebimento']),
                    $linha['hora_do_recebimento'],
                    arrumadata($linha['data_retorno']),
                    $linha['hora_retorno'],
                    arrumadata($linha['ds_tratamento']),
                    $linha['ds_hora_tratamento'],
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
                    $linha['TOTAL_LINHAS'],
                    $linha['setor'], 
                    $linha['turno'],
                    $linha['remetente'],
                    $linha['adabas'],
                    $linha['desc_ofensor'],
                    $linha['nome_ofensor'],
                    $linha['turno_ofensor'],
                    $linha['desc_tipo2'],
                    $linha['desc_tipo_apurado'],
                    $linha['Qtd_erros'],  
                    $linha['tmt'],
                    $linha['retorno_do_email'],
                    $linha['tipo_contestado_FDV'],
                    $linha['contestacao'],
                    arrumadata($linha['data_envio_email']),
                    $linha['hora_envio_email'],
                    $linha['contestacao_status_cip'],
                    arrumadata($linha['data_da_correcao']),
                    $linha['hora_da_correcao'],
                    arrumadata($linha['data_ret_correcao']),
                    $linha['hora_ret_correcao'],
                    arrumadata($linha['data_do_enviovivo']),
                    $linha['hora_do_enviovivo'],
                    arrumadata($linha['data_do_retornovivo']),
                    $linha['hora_do_retornovivo']           
                    );
         $excel->writeLine($myArr);
      
      }
    }
    $excel->close();

	?>
   
     
</tbody>
</table>

  <?php
    echo 
    "<hr>
      <div align='center'>
      
            <a  target=\"_blank\" href=\"site/forms/relatorios/relatorio_contestacao_manual_$data.$cpf.xls\">
            <font size='2' color='#FFFFFF'>
                Abrir relatório em formato Excel.
                </font>
            </a>
        </div>
    <hr>";

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



$somefile="site/forms/relatorios/relatorio_contestacao_manual_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

