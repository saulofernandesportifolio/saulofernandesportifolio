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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 15 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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

$data_1=arrumadatahora2($_POST['data_1']);
 
$data_2=arrumadatahora2($_POST['data_2']);

$turno=$_POST['turno'];

 

$data = date("d-m-Y");
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("site/forms/relatorios/relatorio_diretoria_historico_atv_$data.$cpf.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array( 
       'cotacao_atividade',
       'regional',
       'uf',
       'criado_em',
       'segmento',
       'revisao',
       'criado_por',
       'responsavel',
       'cliente',
       'cpf_cnpj',
       'HP',
       'TA',
       'TT',
       'MT',
       'PN',
       'PP',
       'PTT',
       'MP',
       'TA_E_MP',
       'BACKUP',
       'total_linhas',
       'data_de_recebimento',
       'hora_de_recebimento',
       'acao',
       'solicitante_vivo_accenture', 
       'status_da_cotacao',
       'ofensor',
       'erro',
       'motivo_erro',
       'observacao',
       'nome_ofensor_ilha',
       'turno_ofensor_ilha',
       'remetente',
       'tmt',
       'operador_diretoria',
       'turno',
       'data_tratamento',
       'hora_tratamento',
       'statusdiretoria',
       'disc_statusdiretoria',
       'data_de_finalizacao_da_tratativa',
       'hora_de_finalizacao_da_tratativa'    
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../../bd.php");


if(empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1){

    // Calcula uma data daqui 2 dias e 2 mêses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');

 $sql_servico="CALL cip_nv.exportar_top_nv_diretoria_atv_historico("."'{$data_1}'".","."'{$data_2}'".")";


}elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1){


 $sql_servico="CALL cip_nv.exportar_top_nv_diretoria_atv_hidtorico("."'{$data_1}'".","."'{$data_2}'".")";

}elseif($_POST['pesquisa'] == 4){



$sql_servico="CALL cip_nv.exportar_top_nv_diretoria_atv_historico("."'{$data_1}'".","."'{$data_2}'".")";

}elseif($_POST['pesquisa'] == 5){

$sql_servico="CALL cip_nv.exportar_top_nv_diretoria2_atv_historico("."'{$data_1}'".","."'{$data_2}'".")";

}


  
    $consulta_servico = mysql_query($sql_servico,$conecta) or die (mysql_error());

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
                        
       
      $myArr=array( 
                   $linha['cotacao_atividade'],
                   $linha['regional'],
                   $linha['uf'],
                   arrumadatahora($linha['criado_em']),
                   $linha['segmento'],
                   $linha['revisao'],
                   $linha['criado_por'],
                   $linha['responsavel'],
                   $linha['cliente'], 
                   $linha['cpf_cnpj'],
                   $linha['HP'],
                   $linha['TA'],
                   $linha['TT'],
                   $linha['MT'],
                   $linha['PN'],
                   $linha['PP'],
                   $linha['PTT'],
                   $linha['MP'],
                   $linha['TA_E_MP'],
                   $linha['BACKUP'],
                   $linha['total_linhas'],
                   arrumadata($linha['data_de_recebimento']),
                   $linha['hora_de_recebimento'],
                   $linha['acao'],
                   $linha['ds_solicitante_vivo_accenture'],
                   $linha['status_da_cotacao'],
                   $linha['ofensor'],
                   $linha['tipo_erros'],
                   $linha['motivo'],
                   $linha['observacao'],
                   $linha['ds_nome_ofensor_ilha'],
                   $linha['turno_ofensor_ilha'],
                   $linha['ds_remetente'],
                   $linha['tmt'],
                   $linha['operador_diretoria'],
                   $linha['turno'],
                   arrumadata($linha['data_tratamento']),
                   $linha['hora_tratamento'], 
                   $linha['statusdiretoria'],
                   $linha['disc_statusdiretoria'], 
                   arrumadata($linha['data_de_finalizacao_da_tratativa']),
                   $linha['hora_de_finalizacao_da_tratativa']

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
            <a  target=\"_blank\" href=\"site/forms/relatorios/relatorio_diretoria_historico_atv_$data.$cpf.xls\">
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



$somefile="site/forms/relatorios/relatorio_diretoria_historico_atv_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

