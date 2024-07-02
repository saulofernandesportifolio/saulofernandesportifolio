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




$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal              =$linha_operador["tramite"];
        $cpf                =$linha_operador["cpf"];
		}
  
if($perfil != 1 && $perfil != 4){
    
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

 

if(empty($data_1) && empty($data_2) && $_POST['pesquisa'] == 1){

  if($_POST['substatus'] == '%'){

$lg="13,14,15,16,17,18,19";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio="b.status_cip_auditoria IN ($lg2) AND c.turno LIKE '$turno'  ";


}if(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1){

  if($_POST['substatus'] == '%'){

$lg="13,14,15,16,17,18,19";

$lg2=$lg;


}else{

$lg2=$_POST['substatus'];

}


$criterio=" SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND c.turno LIKE '$turno'  ";

}


if($_POST['pesquisa'] == 4){


if($_POST['substatus'] == '%'){

$lg="13,14,15,16,17,18,19";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio=" SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND c.turno LIKE '$turno'  ";

}

if($_POST['pesquisa'] == 5){

if($_POST['substatus'] == '%'){

$lg="13,14,15,16,17,18,19";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}

$criterio=" SUBSTRING(a.dt_inclusao_bd_cip,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND c.turno LIKE '$turno'  ";

}

if($_POST['pesquisa'] == 3){

if($_POST['substatus'] == '%'){

$lg="13,14,15,16,17,18,19";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}

$criterio=" b.dt_tratamento_auditoria BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND c.turno LIKE '$turno' ";

}


$data = date("d-m-Y");
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("../gala_top/site/forms/relatorios/relatorio_auditoria_$data.$cpf.xls");

    if($excel==false){
        echo $excel->error;
   }
   

//Escreve o nome dos campos de uma tabela
   $myArr=array( 
      'COTA&Ccedil;&Atilde;O',
      'REGIONAL',
      'UF',
      'TIPO',
      'REVIS&Atilde;O',
      'CLIENTE',
      'CRIADO EM',
      'STATUS VIVOCORP',
      'SUB-STATUS VIVOCORP',
	    'STATUS GALA',
      'DISC STATUS GALA',
      'OPERADOR',	
      'DATA INCLUS&Atilde;O GALA',
      'DATA TRATAMENTO', 
      'HORA TRATAMENTO', 
 	    'TIPO SERVI&Ccedil;OS', 
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
      'DIA',
      'TEMPO',
      'TIPO PROCESSO',
      'TIPO DE LINHA',
      'SLA DIAS',
      'PRAZO_DIAS',
      'CRIADO EM2',
      'VISAO',
      'VENCIMENTO',
      'OFENSOR',
      'COLABORADOR',
      'TURNO_OP',
      'TIPO DE ERRO',
      'DESCRI&Ccedil;&Atilde;O ERRO'
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala_top/bd.php");
  
    
$sql_servico="SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.n_da_cotacao,
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
b.status_cip_auditoria as ds_status_cip, 
b.disc_status_cip_auditoria as ds_disc_status_cip, 
c.nome as nome, 
b.dt_tratamento_auditoria as ds_tratamento, 
b.hora_tratamento_auditoria as ds_hora_tratamento, 
b.setor,
i.id_cotacao, 
i.ofensor, 
i.colaborador, 
i.tipo_erro, 
i.descricao_erro, 
c.usuario, 
c.turno as turno, 
c.idtbl_usuario, 
d.usuario, 
d.turno as turno_op, 
d.idtbl_usuario, 
d.nome as colaborador, 
e.ofensor as ofensor,
f.tipo_erro as tipo_erro,
g.acao as acao,
h.tipo_erro2 as descricao_erro 
FROM tbl_cotacao a 
INNER JOIN tbl_auditoria b 
ON a.id_cotacao=b.id_cotacao
INNER JOIN tbl_erros_cotacao i
ON a.id_cotacao=i.id_cotacao
LEFT JOIN tbl_usuarios c 
ON c.idtbl_usuario=b.idtbl_usuario_auditoria 
LEFT JOIN tbl_usuarios d 
ON d.idtbl_usuario=i.colaborador 
LEFT JOIN tbl_ofensores_auditoria e 
ON e.id=i.ofensor 
LEFT JOIN tbl_tipo_de_erro_auditoria f 
ON f.id=i.tipo_erro
INNER JOIN tbl_acao_auditoria g 
ON g.id=i.acao_auditoria 
LEFT JOIN tbl_tipo_de_erro_auditoria2 h 
ON h.id=i.descricao_erro

WHERE $criterio 


GROUP BY a.cotacao_principal,i.id DESC";



    
    /*$sql_servico .= $criterios; 
    $sql_servico .="ORDER BY s.idtbl_driver DESC";*/
    //Executa SQL para consulta dos serviços
    $consulta_servico = mysql_query($sql_servico) or die (mysql_error());

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
       
      $myArr=array( $linha['n_da_cotacao'],
                    $linha['regional_atribuida'],
	                $linha['uf'],
                    $linha['carteira'],
                    $linha['revisao'],
                    $linha['cliente'],
	                arrumadatahora($linha['criado_em']),
 	                $linha['status_da_cotacao'],
                 	$linha['substatus_da_cotacao'],
                    $linha['ds_status_cip'],
                    $linha['ds_disc_status_cip'],
                    $linha['nome'],
                    arrumadatahora($linha['dt_inclusao_bd_cip']),
                    arrumadata($linha['ds_tratamento']),
                    $linha['ds_hora_tratamento'],
                    $linha['TIPO_SERVICO'],
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
                    $linha['total_linhas_cip'],
                    $linha['setor'], 
                    $linha['turno'],
                    $linha['dia'],
                    $linha['TEMPO'],
                    $linha['TIPO_PROCESSO'],
                    $linha['TIPO_DE_LINHA'],
                    $linha['SLA_DIAS'],
                    $linha['PRAZO_DIAS'],
                    arrumadatahora($linha['visao_ilha']),
                    arrumadatahora($linha['vencimento_ilha']),
				            $linha['TIPO_COTACAO'],
                    $linha['ofensor'],
                    $linha['colaborador'],
                    $linha['turno_op'],
                    $linha['tipo_erro'],
                    $linha['descricao_erro']            
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
      <div align='center'><font size='2' color='#666666'>
            <a  target=\"_blank\" href=\"../gala_top/site/forms/relatorios/relatorio_auditoria_$data.$cpf.xls\">
                Abrir relatório em formato Excel.
            </a>
        </font></div>
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



$somefile="../gala_top/site/forms/relatorios/relatorio_auditoria_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

