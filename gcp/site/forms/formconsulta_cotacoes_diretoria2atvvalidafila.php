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
 
  var width = 780;
  var height = 300;
 
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

  <?php
  

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 15){
    
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

 
  
  function arrumadata($string) {
    if($string == ''){
    $data= substr($string,8,2)."".substr($string,5,2)."".substr($string,0,4);   
        
    }else{
        
    $data= substr($string,8,2)."/".substr($string,5,2)."/".substr($string,0,4);   
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
  
     function arrumadata2($string3) {
    if($string3 == ''){
    $data= substr($string3,6,4)."".substr($string3,3,2)."".substr($string3,0,2);   
        
    }else{
        
    $data= substr($string3,6,4)."/".substr($string3,3,2)."/".substr($string3,0,2);   
    }

 return $data;
} 

  function corrigedatas($date){


  $dia=substr($date,0,2) ;
  $mes=substr($date,3,2);
  $ano=substr($date,6,4);

  /*data correta estiver correta */
  if(strlen($date) == 18)
  {
     
      $dia=substr($date,0,2);
      $mes=substr($date,2,2);
      $ano=substr($date,5,4);
      $hora=substr($date,10,9);
  } 
  /*data correta estiver correta */
  if(strlen($date) == 19)
  {
      $hora=substr($date,10,9);
  } 

  /*se a data não estivber correta*/ 
   if(strlen($date) == 17)
    {
        $dia=substr($date,0,2);
        $mes=substr($date,2,2);
        $ano=substr($date,4,4);
        $hora=substr($date,9,9);
    }

     /*realiza o tratamento do dia e mes*/
       if(substr($dia,1,1) == "/")
        {
          $dia='0'.substr($dia,0,1);
        }

 
        if(substr($mes,1,1) == "/" )
        {
          $mes='0'.substr($mes,0,1);
        }

        if(substr($mes,0,1) == "/" )
        {
          $mes='0'.substr($mes,1,1);
        }
        

   $date=$ano."-".$mes."-".$dia." ".$hora;

///echo '<br>';



 return $date;

}


if(empty($_POST['n_da_atv']) ){ 
   
echo "
       <script type=\"text/javascript\">
        alert('É nescessário digitar uma atividade !');
       document.location.replace('principal.php?t=forms/formconsulta_cotacoes_diretoria.php');
      </script>
 ";
  exit();

}




$servidor = "10.119.243.217:3306";//Geralmente é localhost mesmo
$nome_usuario = "root";//Nome do usuário do mysql
$senha_usuario = "atento"; //Senha do usuário do mysql
$nome_do_banco = "input_piloto"; //Nome do banco de dados
$conecta2serv02 = mysql_connect("$servidor", "$nome_usuario", "$senha_usuario", TRUE) or die (mysql_error());
$banco2 = mysql_select_db("$nome_do_banco",$conecta2serv02) or die (mysql_error());

$sqlatv="SELECT a.id,
                a.nu_atividade,
                a.regional_atribuida,
                a.criado_em,
                a.tipo,
                a.revisao,
                a.criado_por,
                a.responsavel,
                a.cliente,
                a.cpf_cnpj,
                a.HP,
                a.TA,
                a.TT,
                a.MT,
                a.PN,
                a.PP,
                a.PTT,
                a.MP,
                a.TA_E_MP,
                a.BAKUP,
                a.total_linhas_ci FROM input_piloto.tbl_atividades a 
WHERE a.nu_atividade='{$_POST['n_da_atv']}' 
AND (a.status_ci=19 
     OR a.status_ci=20 
     OR a.status_ci=26 
     OR a.status_ci=27 
     OR a.status_ci=28 
     OR a.status_ci=2 
     OR a.status_ci=3 
     OR a.status_ci=4 
     OR a.status_ci=10 
     OR a.status_ci=15 
     OR a.status_ci=16 
     OR a.status_ci=9 
     OR a.status_ci=31 
     OR a.status_ci=39 
     OR a.status_ci=32 
     OR a.status_ci=37 
     OR a.status_ci=36 
     OR a.status_ci=38 ) ";
$acaoatv = mysql_query($sqlatv,$conecta2serv02) or die (mysql_error());
$linha_tt = mysql_fetch_array($acaoatv);       

if(!empty($linha_tt["nu_atividade"])){

$sql32="CALL cip_nv.visao_pesquisa_diretoria_atv("."'{$linha_tt["nu_atividade"]}'".","."'{$linha_tt["id"]}'".",
"."'{$linha_tt["nu_atividade"]}'".",
"."'{$linha_tt["regional_atribuida"]}'".",
"."'{$linha_tt["criado_em"]}'".",
"."'{$linha_tt["tipo"]}'".",
"."'{$linha_tt["revisao"]}'".",
"."'{$linha_tt["criado_por"]}'".",
"."'{$linha_tt["responsavel"]}'".",
"."'{$linha_tt["cliente"]}'".",
"."'{$linha_tt["cpf_cnpj"]}'".",
"."'{$linha_tt["HP"]}'".",
"."'{$linha_tt["TA"]}'".",
"."'{$linha_tt["TT"]}'".",
"."'{$linha_tt["MT"]}'".",
"."'{$linha_tt["PN"]}'".",
"."'{$linha_tt["PP"]}'".",
"."'{$linha_tt["PTT"]}'".",
"."'{$linha_tt["MP"]}'".",
"."'{$linha_tt["TA_E_MP"]}'".",
"."'{$linha_tt["BAKUP"]}'".",
"."'{$linha_tt["total_linhas_ci"]}'".")";
}else{
$sql32="CALL cip_nv.visao_pesquisa_diretoria_atv_filtro("."'{$_POST["n_da_atv"]}'".")";	
}

$acao32 = mysql_query($sql32,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao32);


/*echo '<br>';

echo '<br>';*/

 $id_atv=$linha_tt["id"];


if(empty($id_atv)){

echo "<script>
            alert('Esta atividade não encontra-se tramitando na base do gcp atividades TT.');
            document.location.replace('principal.php?t=forms/formconsulta_cotacoes_diretoria.php');
         </script>";


}


echo "<script>
         document.location.replace('principal.php?&num_=$num_&id_atv=$id_atv&t=forms/formconsulta_cotacoes_diretoria2atv.php');
         </script>";



?>

