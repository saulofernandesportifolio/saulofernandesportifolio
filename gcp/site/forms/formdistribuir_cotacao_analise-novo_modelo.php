<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="css/bootstrap/bootstrap.min.js"></script>
<script src="css/bootstrap/jquery-1.11.1.min.js"></script>

 <link rel="StyleSheet" href="css/bootstrap/bootstrap.css" type="text/css" />

  
<script>
/**
*   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
*   but will likely encounter performance issues on larger tables.
*
*		<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
*		$(input-element).filterTable()
*		
*	The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
*/
(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
					if(search == '') {
						$rows.show(); 
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();
	
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
			$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
})
</script>

     <meta name="description" content="jquery"/>
     <meta name="keywords" content="jquery" />
		<meta name="robots" content="all, index, follow" />



<script language="JavaScript">
function abrir(URL) {
 
  var width = 780;
  var height = 250;
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>



<script language="JavaScript">
function abrirrevisao(URL) {
 
  var width = 1024;
  var height = 600;
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
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
}


</script>


  <?php

/*ini_set ( 'mysql.connect_timeout' ,  '60' ); 
ini_set ( 'default_socket_timeout' ,  '60' );  
ini_set('memory_limit', '-1'); */



$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta);
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21 ){
    
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
    $data= substr($string,6,4)."".substr($string,7,2)."".substr($string,0,2);   
        
    }else{
        
    $data= substr($string,6,4)."/".substr($string,7,2)."/".substr($string,0,2);   
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



function dif_datas($dt_inicial, $dt_final){ 

list($dia_i, $mes_i, $ano_i) = explode("/", $dt_inicial); //Data inicial 
list($dia_f, $mes_f, $ano_f) = explode("/", $dt_final); //Data final 
$mk_i = mktime(0, 0, 0, $mes_i, $dia_i, $ano_i); // obtem tempo unix no formato timestamp 
$mk_f = mktime(0, 0, 0, $mes_f, $dia_f, $ano_f); // obtem tempo unix no formato timestamp 

$diferenca = $mk_f - $mk_i; //Acha a diferença entre as datas 

if($diferenca == 0 ){ 
return 'É a mesma data'; 
}elseif($diferenca > 0 ){ 

return 1; 
}elseif($diferenca < 0 ){ 
return 0; 
} 
} 




$sqlvenc="SELECT 
a.id_cotacao,
a.TIPO_PROCESSO,
a.dia,
a.TEMPO,
a.SLA_DIAS,
a.VENCIMENTODIAS,
a.visao_ilha,
a.vencimento_ilha
FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b ON b.id_cotacao=a.id_cotacao AND (b.status_cip_analise= 2 OR b.status_cip_analise= 3 OR b.status_cip_analise= 4)";
$consulta_venc= mysql_query($sqlvenc,$conecta) or die (mysql_error());

while($tipovenc = mysql_fetch_array($consulta_venc)){ 

$diasUteis  = $tipovenc['SLA_DIAS'];
$QtdDia     = $tipovenc['dia'];
$id_cotacao = $tipovenc['id_cotacao'];
$PRAZO_DIAS  = $tipovenc['PRAZO_DIAS'];

$diasUteis  = $tipovenc['SLA_DIAS'];

$QtdDia     = $tipovenc['dia']; 

$filtrovc   = $QtdDia-$diasUteis;


$id_cotacao = $tipovenc['id_cotacao'];


  
$vencimento_ilha=substr($tipovenc['visao_ilha'],0,10);


$venci=substr($tipovenc['vencimento_ilha'],0,10);


               $diavc1=substr($venci,8,2);
               $mesvc1=substr($venci,5,2);  
               $anovc1=substr($venci,0,4);

 $venci1=$diavc1."/".$mesvc1."/".$anovc1;


$data1=$venci1;
$data2=date("d/m/Y");

$data1=explode("/",$data1);
$data2=explode("/",$data2);

$d1=strtotime("$data1[2]-$data1[1]-$data1[0]");
$d2=strtotime("$data2[2]-$data2[1]-$data2[0]");

$data_final=($d2-$d1)/86400;

if($data_final < 0){

  $data_final= $data_final * -1;
}

$data_final;


$datava=date("Y-m-d");
$semanavalida  = date('w', strtotime($datava));



if($$data_final == 0 ){

  //echo "igual";
  $Vence = "1.Vence Hoje";
  $criterio= "Dentro do prazo";

}
if($data_final == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
 $criterio= "Dentro do prazo"; 
}

if($data_final  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
  $criterio= "Dentro do prazo";
}

if($data_final > 2 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
  $criterio= "Dentro do prazo";
}



if($PRAZO_DIAS == 'Fora do Prazo'){
   
   $Vence="Backlog";
   $criterio= "Fora do prazo";

}

$datavetor=date("d/m/Y");

//Exemplo chamada função 
 $filtrovetor = dif_datas($venci1, $datavetor); 

 $testefora=$filtrovetor.$semanavalida; 
 //echo '<br>';


if($testefora == 16 || $testefora == 10 ){
    
     //echo $testefora;
   
     $Vence="Backlog";
     $criterio= "Fora do prazo";
  
}


$date1f=date("Y-m-d");
$date2f=$venci;

$semanavalida2  = date('w', strtotime($date1f));

if(strtotime($date1f) > strtotime($date2f) AND $semanavalida2 != 6 
        || strtotime($date1f) > strtotime($date2f) AND $semanavalida2 != 0 ){
//echo 'Fora do prazo';
$Vence="Backlog";
$criterio= "Fora do prazo";

}  



$query_linhav="UPDATE cip_nv.tbl_cotacao a 
              SET a.VENCIMENTODIAS ='".$Vence."',
                  a.PRAZO_DIAS    ='".$criterio."'                                
              WHERE a.id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2v = mysql_query($query_linhav,$conecta) or die (mysql_error());

}





//echo "este é o post ".$_POST['carteira'];

 if($_COOKIE['carteira'] <> $_POST['carteira'] && !empty($_POST['carteira'])){
    $_COOKIE['carteira']=$_POST['carteira'];

    //echo "ok";
    }

  setcookie('carteira',$_COOKIE['carteira'],time() + 28800);


/*echo "este é o cookie ".*/ $carteira=$_COOKIE['carteira'];


/*if(empty($_POST['carteira'])){
echo $carteira=$carteira;
}else{

echo $carteira=$_POST['carteira'];

}*/
//echo $_POST["status_ci"];

 //$sql="CALL visao_analise_distribuicao("."'3,27'".")";
 //$sql="CALL visao_analise_distribuicao("."'3'".","."'{$carteira}'".")";
 //$sql="CALL visao_analise_distribuicao("."'27'".")";


/*
* Calculando datas no futuro com o PHP a partir de datas definidas
* /
*/
// Pega a data que está salva no banco de dados
$data = date("Y-m-d H:i:s");

// Calcula uma data daqui 2 dias e 2 mêses
$timestamp = strtotime($data . "-4 months 0 days");
// Exibe o resultado
 $data_1 =date('Y-m-d', $timestamp); // 
 $data_2=date('Y-m-d');





if($carteira == '%'){
 $sql="CALL cip_nv.visao_analise_distribuicao_TODOS("."'3'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'GOV'){
 $sql="CALL cip_nv.visao_analise_distribuicao_GOV("."'3'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'TOP'){
 $sql="CALL cip_nv.visao_analise_distribuicao_TOP("."'3'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}elseif($carteira == 'VIP'){
 $sql="CALL cip_nv.visao_analise_distribuicao_VIP("."'3'".","."'{$carteira}'".","."'{$data_1}'".","."'{$data_2}'".")";
 //$sql="CALL visao_input_distribuicao("."'27'".")";
}




?>
</p>

<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">
<p></p>
<?php
$acao = mysql_query($sql,$conecta);
$num_ = mysql_num_rows($acao);
?>


<div class="container">
    <h1>Click the filter icon <small>(<i class="glyphicon glyphicon-filter"></i>)</small></h1>
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Developers</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Kilgore</td>
								<td>Trout</td>
								<td>kilgore</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Bob</td>
								<td>Loblaw</td>
								<td>boblahblah</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Holden</td>
								<td>Caulfield</td>
								<td>penceyreject</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
               </div>
     </div>
</div>
</div>

<?php
  mysql_free_result($acao_operador,$acao);
  mysql_close($conecta);  

  ?>

</body>
</html>

