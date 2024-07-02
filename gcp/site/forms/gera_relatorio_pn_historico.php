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
  
if($perfil != 1 && $perfil != 4 && $perfil != 16 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23){
    
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

 

$data = date("d-m-Y");
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("site/forms/relatorios/relatorio_pn_$data.$cpf.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array('regional',
                'fornecedor',
                'data_inicial',
                'numero_pedido',
                'revisao',
                'status_pedido', 
                'nome_cliente', 
                'ultima_atualizacao_status', 
                'codigo_adabas', 
                'cpf_cnpj_cliente', 
                'cpf_cnpj_cliente_raiz',
                'canal', 
                'nro_ordem', 
                'ordem_manual', 
                'pistolagem_leitura',
                'data_tramite',
                'tmo',
                'data_janela',
                'aprovacao_pedido',
                'chamado', 
                'erro', 
                'plano_acao', 
                'status_atlys', 
                'status_spn',
                'falando',
                'tratamento', 
                'obs_erro', 
                'pn', 
                'status_cip',
                'disc_status_cip',
                'fila',
                'login',
                'nome2',
                'tramite',
                'turno',
                'data_tramite2',
                'data_tratamento',
                'tramitou'             
    
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala_top/bd.php");


if(empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1){

    // Calcula uma data daqui 2 dias e 2 mêses
  $timestamp = strtotime($data . "-3 months 0 days");
  // Exibe o resultado
  $data_1 =date('Y-m-d', $timestamp); // 
  $data_2=date('Y-m-d');

  $sql_servico="CALL bd_erros_pn.exportar_top_nv_pn_historico("."'{$data_1}'".","."'{$data_2}'".")";


}elseif(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1){

    $data_1=arrumadatahora2($_POST['data_1']);
 
  $data_2=arrumadatahora2($_POST['data_2']);


 $sql_servico="CALL bd_erros_pn.exportar_top_nv_pn_historico("."'{$data_1}'".","."'{$data_2}'".")";

}elseif($_POST['pesquisa'] == 4){

  $data_1=arrumadatahora2($_POST['data_1']);
 
  $data_2=arrumadatahora2($_POST['data_2']);

$sql_servico="CALL bd_erros_pn.exportar_top_nv_pn_historico("."'{$data_1}'".","."'{$data_2}'".")";

}elseif($_POST['pesquisa'] == 5){

    $data_1=arrumadatahora2($_POST['data_1']);
 
  $data_2=arrumadatahora2($_POST['data_2']);

 $sql_servico="CALL bd_erros_pn.exportar_top_nv_pn2_historico("."'{$data_1}'".","."'{$data_2}'".")";

}


  
    $consulta_servico = mysql_query($sql_servico,$conecta2);

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
       
                             
       
      $myArr=array(
                   $linha['regional'],
                   $linha['fornecedor'],
                   arrumadata($linha['data_inicial']),
                   $linha['numero_pedido'],
                   $linha['revisao'],
                   $linha['status_pedido'], 
                   $linha['nome_cliente'], 
                   arrumadata($linha['ultima_atualizacao_status']), 
                   $linha['codigo_adabas'], 
                   $linha['cpf_cnpj_cliente'], 
                   $linha['cpf_cnpj_cliente_raiz'],
                   $linha['canal'], 
                   $linha['nro_ordem'], 
                   $linha['ordem_manual'], 
                   $linha['pistolagem_leitura'],
                   arrumadata($linha['data_tramite']),
                   $linha['tmo'],
                   arrumadata($linha['data_janela']),
                   arrumadata($linha['aprovacao_pedido']),
                   $linha['chamado'], 
                   $linha['erro'], 
                   $linha['plano_acao'], 
                   $linha['status_atlys'], 
                   $linha['status_spn'],
                   $linha['falando'],
                   $linha['tratamento'], 
                   $linha['obs_erro'], 
                   $linha['pn'], 
                   $linha['status_tp'],
                   $linha['disc_status_tp'],
                   $linha['fila'],
                   $linha['login'],
                   $linha['nome2'],
                   $linha['tramite'],
                   $linha['turno'],
                   arrumadata($linha['data_tramite2']),
                   arrumadatahora($linha['data_tratamento']),
                   $linha['tramitou']          
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
            <a  target=\"_blank\" href=\"site/forms/relatorios/relatorio_pn_$data.$cpf.xls\">
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



$somefile="site/forms/relatorios/relatorio_pn_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

