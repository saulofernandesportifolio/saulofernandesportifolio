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

ini_set ( 'mysql.connect_timeout' ,  '100' ); 
ini_set ( 'default_socket_timeout' ,  '100' );		
ini_set('memory_limit', '-1'); 

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
        $canal             =$linha_operador["tramite"];
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

$lg="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio=" AND b.status_cip_analise IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio1=" AND b.status_cip_input IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor'  ";

$criterio2=" AND b.status_cip_auditoria IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio3=" AND b.status_cip_correcao IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio4=" AND b.status_cip_chamado IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

}if(!empty($data_1) && !empty($data_2) && $_POST['pesquisa'] == 1){

  if($_POST['substatus'] == '%'){

$lg="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_analise IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio1=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_input IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor'  ";

$criterio2=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio3=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_correcao IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio4=" AND b.dt_tratamento_chamado BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_chamado IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";


}


if($_POST['pesquisa'] == 4){


if($_POST['substatus'] == '%'){

$lg="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_analise IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio1=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_input IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor'  ";

$criterio2=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio3=" AND SUBSTRING(a.criado_em,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_correcao IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio4=" AND b.dt_tratamento_chamado BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_chamado IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

}

if($_POST['pesquisa'] == 5){

if($_POST['substatus'] == '%'){

$lg="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}

$criterio=" AND SUBSTRING(a.dt_inclusao_bd_cip,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_analise IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio1=" AND SUBSTRING(a.dt_inclusao_bd_cip,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_input IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio2=" AND SUBSTRING(a.dt_inclusao_bd_cip,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio3=" AND SUBSTRING(a.dt_inclusao_bd_cip,1,10) BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_correcao IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio4=" AND b.dt_tratamento_chamado BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_chamado IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

}

if($_POST['pesquisa'] == 3){

if($_POST['substatus'] == '%'){

$lg="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32";

$lg2=$lg;

}else{

$lg2=$_POST['substatus'];

}


$criterio=" AND b.dt_tratamento_analise BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_analise IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio1=" AND b.dt_tratamento_input BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_input IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio2=" AND b.dt_tratamento_auditoria BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_auditoria IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio3=" AND b.dt_tratamento_correcao BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_correcao IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";

$criterio4=" AND b.dt_tratamento_chamado BETWEEN '".arrumadatahora2($data_1)."' AND '".arrumadatahora2($data_2)."' AND b.status_cip_chamado IN ($lg2) AND turno LIKE '$turno' AND b.setor LIKE '$setor' ";


}



$data = date("d-m-Y");
 

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("../gala_top/site/forms/relatorios/relatorio_$data.$cpf.xls");

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
      'COMENTARIO OPERADOR',	
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
      'VENCIMENTO'
       );
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   include("../gala_top/bd.php");
    
$sql_servico ="SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
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
                a.dt_inclusao_bd_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
				a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_analise as ds_status_cip,
                b.disc_status_cip_analise as ds_disc_status_cip,
                CASE WHEN b.idtbl_usuario_analise IS NULL THEN ' ' WHEN b.idtbl_usuario_analise THEN c.nome END as nome,
                b.dt_tratamento_analise as ds_tratamento,
                b.hora_tratamento_analise as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                b.obs_analise as obs,
                c.usuario,
                CASE WHEN c.turno IS NULL THEN ' ' WHEN c.turno THEN c.turno END as turno,
                c.idtbl_usuario
               FROM tbl_usuarios c,tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               WHERE (c.idtbl_usuario= b.idtbl_usuario_analise  OR b.idtbl_usuario_analise IS NULL) $criterio
               GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC 
          UNION
          SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
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
                a.dt_inclusao_bd_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
				a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_input as ds_status_cip,
                b.disc_status_cip_input as ds_disc_status_cip,
                CASE WHEN b.idtbl_usuario_input IS NULL THEN ' ' WHEN b.idtbl_usuario_input THEN c.nome END as nome,
                b.dt_tratamento_input as ds_tratamento,
                b.hora_tratamento_input as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                b.obs_input as obs,
                c.usuario,
                CASE WHEN c.turno IS NULL THEN ' ' WHEN c.turno THEN c.turno END as turno,
                c.idtbl_usuario
               FROM tbl_usuarios c,tbl_cotacao a INNER JOIN tbl_input b 
               ON a.id_cotacao=b.id_cotacao
               WHERE (c.idtbl_usuario= b.idtbl_usuario_input  OR b.idtbl_usuario_input IS NULL) $criterio1
               GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC 
         UNION
          SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
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
                a.dt_inclusao_bd_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
				a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_auditoria as ds_status_cip,
                b.disc_status_cip_auditoria as ds_disc_status_cip,
                CASE WHEN b.idtbl_usuario_auditoria IS NULL THEN ' ' WHEN b.idtbl_usuario_auditoria THEN c.nome END as nome,
                b.dt_tratamento_auditoria as ds_tratamento,
                b.hora_tratamento_auditoria as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                b.obs_auditoria as obs,
                c.usuario,
                CASE WHEN c.turno IS NULL THEN ' ' WHEN c.turno THEN c.turno END as turno,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario=b.idtbl_usuario_auditoria                            
              WHERE (c.idtbl_usuario= b.idtbl_usuario_auditoria  OR b.idtbl_usuario_auditoria IS NULL) $criterio2
               GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC  
         UNION
         SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
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
                a.dt_inclusao_bd_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
				a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_correcao as ds_status_cip,
                b.disc_status_cip_correcao as ds_disc_status_cip,
               CASE WHEN b.idtbl_usuario_correcao IS NULL THEN ' ' WHEN b.idtbl_usuario_correcao THEN c.nome END as nome,
                b.dt_tratamento_correcao ds_tratamento,
                b.hora_tratamento_correcao as ds_hora_tratamento,
                b.setor,
                b.id_cotacao,
                b.obs_correcao as obs,
                c.usuario,
                CASE WHEN c.turno IS NULL THEN ' ' WHEN c.turno THEN c.turno END as turno,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_correcao b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario=b.idtbl_usuario_correcao                        
               WHERE (c.idtbl_usuario= b.idtbl_usuario_correcao OR b.idtbl_usuario_correcao IS NULL) $criterio3  
               GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC
               
                UNION
         SELECT a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.revisao,
                a.criado_em,
                a.carteira,
                a.cliente,
                a.status_da_cotacao,
                a.substatus_da_cotacao,
                a.status,
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
                a.dt_inclusao_bd_cip,
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
				a.TIPO_COTACAO,
                b.dt_distribuicao,
                b.status_cip_chamado as ds_status_cip,
                b.disc_status_cip_chamado as ds_disc_status_cip,
               CASE WHEN b.idtbl_usuario_chamado IS NULL THEN ' ' WHEN b.idtbl_usuario_chamado THEN c.nome END as nome,
                b.dt_tratamento_chamado ds_tratamento,
                b.hora_tratamento_chamado as ds_hora_tratamento,
                b.setor,
                b.id_chamado,
                b.obs_chamado as obs,
                c.usuario,
                CASE WHEN c.turno IS NULL THEN ' ' WHEN c.turno THEN c.turno END as turno,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_chamado b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario=b.idtbl_usuario_chamado                        
               WHERE (c.idtbl_usuario= b.idtbl_usuario_chamado OR b.idtbl_usuario_chamado IS NULL) $criterio4  
               GROUP BY a.cotacao_principal,a.id_cotacao,a.dt_inclusao_bd_cip DESC ";
    
         
    
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
                    
                    
                  if($linha['setor'] == "Auditoria")
                        { 
                        $linha['setor']="Analise de input";
                        }
                        elseif($linha['setor'] == "Análise/Auditoria")
                        { 
                        $linha['setor']="Analise/Analise de input";
                        }
       
      $myArr=array( $linha['cotacao_principal'],
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
                    $linha['obs'],
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
				            $linha['TIPO_COTACAO']            
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
            <a  target=\"_blank\" href=\"../gala_top/site/forms/relatorios/relatorio_$data.$cpf.xls\">
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



$somefile="../gala_top/forms/relatorios/relatorio_$data_1.$cpf.xls";

error_reporting(0);
ini_set("display_errors", 0 );
  
  unlink($somefile);



    ?>

