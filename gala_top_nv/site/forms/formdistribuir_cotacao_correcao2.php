
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
  var height = 250;
 
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

<script>
function resizePage() {
        document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
        document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
      }

</script>

  <?php
  

$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4 && $perfil != 7){
    
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
  

/**
*Calcula a quantidade de dias úteis entre duas datas (sem contar feriados)*/

function dias_uteis($datainicial,$datafinal=null){
  if (!isset($datainicial)) return false;
  if (!isset($datafinal)) $datafinal=time();

$segundos_datainicial = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datainicial));
$segundos_datafinal = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datafinal));
$dias = abs(floor(floor(($segundos_datafinal-$segundos_datainicial)/3600)/24 ) );
$uteis=0;
$dd=0;
$dd1=0;
$dd2=0;
for($i=1;$i <= $dias;$i++){
$diai = $segundos_datainicial+($i*3600*24);
$w = date('w',$diai);

if($w==0){

 date('d/m/Y',$diai)." e Domingo<br />";

//echo '<br>';
}elseif($w==6){
  
 
 date('d/m/Y',$diai)." e Sabado<br />";

//echo '<br>';

}else{
 date('d/m/Y',$diai)." e dia util<br />";
$uteis++;

}

}

return $uteis;

}

/**
*Calcula a quantidade de dias úteis entre duas datas (sem contar feriados)*/

function diasfinalsemana($datainicial,$datafinal=null,$diavenc,$diasprazo){
  if (!isset($datainicial)) return false;
  if (!isset($datafinal)) $datafinal=time();
  
  
 

$segundos_datainicial = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datainicial));
$segundos_datafinal = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$datafinal));
//$segundos_$feriados = strtotime(preg_replace("#(\d{2})/(\d{2})/(\d{4})#","$3/$2/$1",$feriados));
$dias = abs(floor(floor(($segundos_datafinal-$segundos_datainicial)/3600)/24 ) );
$finalsemana=0;
$finalsemana1=0;
$finalsemana2=0;
$finalsemana3=0;

    if( $diavenc < $diasprazo){
    $contdias= $diavenc-3;
    }else
    if( $diasprazo == 1 ){
    $contdias= $diasprazo-2;
    }else{
    $contdias= $diasprazo;
    }
for($i=0;$i <= $contdias;$i++){
$diai = $segundos_datainicial+($i*3600*24);
$w = date('w',$diai);


if($w == 6 || $w == 0  ){
 $finalsemana=2;


}elseif($w == 5  ){
 $finalsemana=0;

}else{
date('d/m/Y',$diai)." uteis<br />";
 $finalsemana++;
 

 
}
 
}
$vencimento=date('Y/m/d', strtotime("+$finalsemana  days",strtotime($datafinal))); 

//echo '<br>';
return $vencimento;
//echo '<br>';
//return $finalsemana;

}


function diasemana($datafiltro){
   $ano =  substr("$datafiltro", 0, 4);
   $mes =  substr("$datafiltro", 5, -3);
   $dia =  substr("$datafiltro", 8, 9);

  $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

  switch($diasemana) {
    
    case"0": $diasemana = utf8_encode("Domingo");
                 $DDTL=1;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));      
                          break;
    case"1": $diasemana = utf8_encode("Segunda-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                             break;
    case"2": $diasemana = utf8_encode("Terça-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));   
                                break;
    case"3": $diasemana = utf8_encode("Quarta-Feira"); 
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro))); 
                                   break;
    case"4": $diasemana = utf8_encode("Quinta-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));  
                                       break;
    case"5": $diasemana = utf8_encode("Sexta-Feira");
                 $DDTL=0;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                  
                                           break;
    case"6": $diasemana = utf8_encode("Sábado"); 
                 $DDTL=2;
                 $visao= date('d/m/Y', strtotime("+$DDTL  days",strtotime($datafiltro)));
                       
                                                 break;
  }
   
      
   
    //echo '<br>';
    //echo "visao:".$visao;
    //echo '<br>';
    return $visao;
    
 
}

function diasemana1($vencimento){
   $ano =  substr("$vencimento", 0, 4);
   $mes =  substr("$vencimento", 5, -3);
   $dia =  substr("$vencimento", 8, 9);

  $diasemana2 = date("w", mktime(0,0,0,$mes,$dia,$ano) );


  switch($diasemana2) {
     
       
       
    case"0": $diasemana2 = utf8_encode("Domingo");
                 $DDTL2=1;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';      
                          break;
    case"1": $diasemana2 = utf8_encode("Segunda-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';
                             break;
    case"2": $diasemana2 = utf8_encode("Terça-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';   
                                break;
    case"3": $diasemana2 = utf8_encode("Quarta-Feira"); 
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33=''; 
                                   break;
    case"4": $diasemana2 = utf8_encode("Quinta-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));
                 $criterio33='';  
                                       break;
    case"5": $diasemana2 = utf8_encode("Sexta-Feira");
                 $DDTL2=0;
                 $vencimento2= date('d/m/Y', strtotime("-$DDTL2  days",strtotime($vencimento)));
                 $criterio33="Dentro do prazo"; 
                    
                                           break;
    case"6": $diasemana2 = utf8_encode("Sábado"); 
                 $DDTL2=2;
                 $vencimento2= date('d/m/Y', strtotime("+$DDTL2  days",strtotime($vencimento)));       
                 $criterio33=''; 
                  
                                                 break;

         }

        $vencimento3=$vencimento2." ".$criterio33." ".$diasemana2;
   //echo '<br>';
   //echo '<br>';
  // echo "Vencimento: ".$vencimento2;
   //echo '<br>';
  
  return $vencimento3;  
   }

function diasemana1venc($semanavenc){
   $ano =  substr("$semanavenc", 6,4);
   $mes =  substr("$semanavenc", 3, 2);
   $dia =  substr("$semanavenc", 0, 2);

  $semanavenc = date("w", mktime(0,0,0,$mes,$dia,$ano) );


  switch($semanavenc) {
     
       
       
    case"0": $semanavenc = utf8_encode("Domingo");
                     
                          break;
    case"1": $semanavenc = utf8_encode("Segunda-Feira");
                
                             break;
    case"2": $semanavenc = utf8_encode("Terça-Feira");
                    
                                break;
    case"3": $semanavenc = utf8_encode("Quarta-Feira"); 
                 
                                   break;
    case"4": $semanavenc = utf8_encode("Quinta-Feira");
                  
                                       break;
    case"5": $semanavenc = utf8_encode("Sexta-Feira");
                 
                    
                                           break;
    case"6": $semanavenc = utf8_encode("Sábado"); 
                  
                  
                                                 break;

         }


  return $semanavenc;  
   }


//CALCULANDO DIAS NORMAIS
      //LISTA DE FERIADOS NO ANO
      function Feriados($ano,$posicao){
         $dia = 86400;
         $datas = array();
         $datas['pascoa'] = easter_date($ano);
         $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
         $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
         $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
                           
         $feriados = array (
            '01/01', //sexta-feira  Confraternização Universal
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04', //quinta-feira Tiradentes
            '01/05', //segunda-feira  Dia do Trabalho
             date('d/m',$datas['corpus_cristi']),
            '07/09', //quarta-feira Independência do Brasil
            '20/09', //terça-feira  Verificar O 20 de Setembro. Feriado Regional
            '12/10', //quarta-feira Nossa Senhora Aparecida/Dia das Crianças
            '02/11', //quarta-feira Finados
            '15/11', //terça-feira  Proclamação da República
            '25/12', //natal           
         );                    
        
      return $feriados[$posicao]."/".$ano;
      }      

      //FORMATA COMO TIMESTAMP
      function dataToTimestamp($data){
         $ano = substr($data, 6,4);
         $mes = substr($data, 3,2);
         $dia = substr($data, 0,2);
      return mktime(0, 0, 0, $mes, $dia, $ano);  
      }

      //SOMA 01 DIA
      function Soma1dia($data){
         $ano = substr($data, 6,4);
         $mes = substr($data, 3,2);
         $dia = substr($data, 0,2);
      return   date("d/m/Y", mktime(0, 0, 0, $mes, $dia+1, $ano));
      }
      
      function SomaDiasUteis($xDataInicial,$xSomarDias){
         for($ii=0; $ii<=$xSomarDias; $ii++){
            
            $xDataInicial=Soma1dia($xDataInicial); //SOMA DIA NORMAL
            
            //VERIFICANDO SE EH DIA DE TRABALHO
            if(date("w", dataToTimestamp($xDataInicial))=="0"){
               //SE DIA FOR DOMINGO OU FERIADO, SOMA +1
               $xDataInicial=Soma1dia($xDataInicial);
              
            }else if(date("w", dataToTimestamp($xDataInicial))=="6"){
               //SE DIA FOR SABADO, SOMA +2
               $xDataInicial=Soma1dia($xDataInicial);
               $xDataInicial=Soma1dia($xDataInicial);
              
            }else{
               //senaum vemos se este dia eh FERIADO
               for($i=0; $i<=12; $i++){
                  if($xDataInicial == Feriados(date("Y"),$i)){
                     $xDataInicial=Soma1dia($xDataInicial);
                    
                  }
               }
            }
         }
      return $xDataInicial;
      }

function diferencadata($YSomarDias,$Ydata2){
 $diav2=substr($YSomarDias,0,2);
 $mesv2=substr($YSomarDias,3,2);  
 $anov2=substr($YSomarDias,6,4);

 $diasSomados2 =$anov2."/".$mesv2."/".$diav2; 
 $data_inicial =$diasSomados2;
 $data_final =$Ydata2;

// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($data_inicial) - strtotime($data_final);

//Calcula a diferença em dias
$dias = floor($diferenca / (60 * 60 * 24));



return $dias;

}  
/*********fim funções sla******/ 
  


ini_set ( 'mysql.connect_timeout' ,  '60' ); 
ini_set ( 'default_socket_timeout' ,  '60' );






if(empty($_POST["ling"])){
    
 echo "
       <script type=\"text/javascript\">
        alert('Selecione alguma cotação !');
        history.back();
	    </script>
 ";   
    
    
 exit();   
}



?>
</p>
<div id="resolucao">
<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">


<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_distribuir_cotacao_correcao4.php" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Correção</font></b></p>
<br />

<p><font color="#a0873c" size="4" face="Gotham Light"><strong>Lista de Cotações a distribuir</strong></font></p>
<br />





      
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>

   <br /><br /><br /><br />
   
   
   
   <p><font color="#000000" size="3" face="Gotham Light">
    Selecione o operador <?php echo "$canal";?>:</font> 
    <select class="txt2comboboxgrande" class="sb" name="login_operador_correcao" id="login_operador_correcao">
      <option value="0" selected="selected">Selecione</option>
    </select>

   <font color="#000000" size="3" face="Gotham Light">
    Turno:</font> 
   		<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno">
          		    <option value="0" selected="selected">Selecione</option>
					<?php
                   

					 
                     $sql = "SELECT * FROM tbl_turno ORDER BY id DESC ";
                     $qr = mysql_query($sql) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id_filtro'].'">'.$ln['turno'].'</option>';
                     }
                     ?>
                     </select>


</p>
<br /><br />
   
    <table border="0" class="lista-clientes">
    <thead> 
    <tr>
    <th>
   </th>
    <th>PRINCIPAL</th>
    <th>COMPLEMENTAR</th>
    <th>REVISAO</th>
    <th>VISAO ILHA</th>
    <th>VENCIMENTO</th>
    <th>STATUS SLA</th>
    <th>SLA DIAS</th>
    <th>SUB-STATUS COTAÇÃO</th>
    <th>STATUS CIP</th> 
    <th>TIPO LINHA</th>
    <th>TOTAL LINHAS</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>TIPO COTAÇÃO</th>
  </tr>
    </thead>
         <tbody>
    
    <?php
foreach($_POST["ling"] as $id_cotacao)
{



    $query= "SELECT * FROM tbl_usuarios WHERE perfil = 1 and 
                   idtbl_usuario = '$idtbl_usuario '";
    $acao_atv=mysql_query($query,$conecta);
    
    while($linha_user = mysql_fetch_assoc($acao_atv))
    {
    $login	=	$linha_user["usuario"];
    $nome   =	$linha_user["nome"];
    $canal =  $linha_user["tramite"]; 
    //$situacao = $linha_op["situacao"];
    $usuario="$login";
    //$regional2 = $linha_user["regional"];	
    }


//echo $_POST["status_ci"];

$sql = "SELECT  a.id_cotacao,
                a.regional_atribuida,
                a.uf,
                a.cotacao_principal,
                a.n_da_cotacao,
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
                a.dia,
                a.TEMPO,
                a.TIPO_PROCESSO,
                a.TIPO_DE_LINHA,
                a.SLA_DIAS,
                a.PRAZO_DIAS,
                a.visao_ilha,
                a.vencimento_ilha,
                a.TIPO_COTACAO,
                b.status_cip_correcao,
                b.disc_status_cip_correcao
                FROM tbl_cotacao a INNER JOIN tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao                 
                WHERE carteira LIKE '$canal' and 
                      b.status_cip_correcao IN (20,27) and a.id_cotacao='$id_cotacao' 
         GROUP BY a.id_cotacao,a.criado_em ASC LIMIT 0,20000 ";




$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
	$id_cotacao            = $linha_atv["id_cotacao"];
  $cotacao_principal    = $linha_atv["cotacao_principal"];
  $n_da_cotacao        = $linha_atv["n_da_cotacao"];
  $revisao2              = $linha_atv["revisao"];
  $regional             = $linha_atv["regional_atribuida"];
  $uf                   = $linha_atv["uf"];
  $criado_em            = $linha_atv["criado_em"];
  $tipo                 = $linha_atv["carteira"];
  $cliente              = $linha_atv["cliente"];
  $status_cota_vivocorp = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp  =$linha_atv["substatus_da_cotacao"];
  $status_vivocorp      =$linha_atv["status"];
  $ALTAS                =$linha_atv['ALTAS'];
  $PORTABILIDADE        =$linha_atv['PORTABILIDADE2'];
  $MIGRACAO             =$linha_atv['MIGRACAO'];
  $TROCAS               =$linha_atv['TROCAS'];
  $TT                   =$linha_atv['TT'];
  $BACKUP               =$linha_atv['BACKUP'];
  $M_2_M                =$linha_atv['M_2_M'];
  $FIXA                 =$linha_atv['FIXA'];
  $PRE_POS              = $linha_atv["PRE_POS"]; 
  $MIGRACAO_TROCA       = $linha_atv["MIGRACAO_TROCA"];     
  $TIPO_SERVICO         = $linha_atv["TIPO_SERVICO"];
  $status_cip           = $linha_atv["status_cip_correcao"];
  $disc_status_cip      = $linha_atv["disc_status_cip_correcao"];
  $total_linhas_cip     = $linha_atv["total_linhas_cip"];
  $dia                  = $linha_atv["dia"];
  $TEMPO                = $linha_atv["TEMPO"];
  $TIPO_PROCESSO        = $linha_atv["TIPO_PROCESSO"];
  $TIPO_LINHA           = $linha_atv["TIPO_DE_LINHA"];
  $SLA_DIAS             = $linha_atv["SLA_DIAS"];
  $PRAZO_DIAS           = $linha_atv["PRAZO_DIAS"];
  $visao_ilha           = $linha_atv["visao_ilha"];
  $vencimento           = $linha_atv["vencimento_ilha"];
  $TIPO_COTACAO         = $linha_atv["TIPO_COTACAO"];
  $revisao              = $linha_atv["revisao"];

$criado_em=arrumadatahora($criado_em);


if($status_cip =='2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}
	
$ALTAS= $linha_atv['ALTAS']+$linha_atv['BACKUP']+$linha_atv['PORTABILIDADE2']+$linha_atv['M_2_M']+$linha_atv['FIXA'];

         $TROCAS=$linha_atv['TROCAS'];

         $TT=$linha_atv['TT']+$linha_atv['PRE_POS'];

         $MIGACAO= $linha_atv["MIGRACAO_TROCA"]+$linha_atv["MIGRACAO"];


             
             if($ALTAS != 0 && $TROCAS == 0 && $TT == 0 && $MIGACAO == 0 ){
                  $linha_atv['tipo_de_linha']="ALTA";
                  $linha_atv['total_linhas_cip']=$ALTAS;

              
              }else
                  if($TROCAS != 0 && $TT == 0 && $MIGACAO == 0){
                     $linha_atv['tipo_de_linha']="TROCA"; 
                     $linha_atv['total_linhas_cip']= $TROCAS;  
                   

                    }else
                        if($TT != 0 && $MIGACAO == 0){
                           $linha_atv['tipo_de_linha']="TT";
                            $linha_atv['total_linhas_cip']= $TT;    


                           }else
                           if($MIGACAO != 0){
                             $linha_atv['tipo_de_linha']="TROCA + MIGRAÇÃO";
                             $linha_atv['total_linhas_cip']=$MIGACAO; 
                             
                                                 }
                                
         /* inicio bloco altapura*/   

        $sql_tipolinhas="SELECT * FROM tbl_sla WHERE tipo='".$linha_atv['tipo_de_linha']."' ";
        $consulta_linhas = mysql_query($sql_tipolinhas) or die (mysql_error());
        while($tipolinhas = mysql_fetch_array($consulta_linhas)){  
         
           if($linha_atv['tipo_de_linha'] == $tipolinhas['tipo'] and $linha_atv['total_linhas_cip'] >= $tipolinhas['linhas'] and $linha_atv['tipo_de_linha'] == $tipolinhas['tipo'] and $linha_atv['total_linhas_cip'] <= $tipolinhas['linhas2']){
            $linha_atv['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha_atv['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha_atv['dias']=$tipolinhas['sla_total'];
           

           }else

            if($linha_atv['tipo_de_linha'] == $tipolinhas['tipo'] and $linha_atv['total_linhas_cip'] >= $tipolinhas['linhas'] and $tipolinhas['linhas2'] == 0){
            $linha_atv['tipo_processo']=$tipolinhas['qtd_linhas'];
            $linha_atv['criterio']="Ate ".$tipolinhas['sla_total']." dias uteis"; 
            $linha_atv['dias']=$tipolinhas['sla_total'];


            } 

        }    
       /* fimbloco altapura*/  
           
      
$data1=$linha_atv['criado_em'];

$datafiltro1=$data1;
$datauteis=substr($datafiltro1,0,10);

$data2=$calcula_datahorafutura= date("Y-m-d");
//$data2=$calcula_datahorafutura= date("Y-m-d");
//$data2=$calcula_datahorafutura= '2016-04-04';
/*echo '<br>';
echo "Existem ".dias_uteis($datauteis,$data2)." dias ".utf8_encode("úteis")."entre $data1 e hoje $data2";*/
$dias1=dias_uteis($datauteis,$data2);
//echo '<br>';

//echo '<br>';
/*echo "criado em: ".*/$data1;
//echo '<br>';

//echo '<br>';
/*echo "Dias prazo: ".*/$DD2=$linha_atv["dias"];
//echo '<br>';
$dias2=$DD2;
//função

//$DataInicial = "01/02/2016";
$datafiltro1=$data1;
$datafiltro=substr($datafiltro1,0,10);
$horafiltro=substr($datafiltro1,10,10);

 $diav=substr(diasemana($datafiltro),0,2);
 $mesv=substr(diasemana($datafiltro),3,2);  
 $anov=substr(diasemana($datafiltro),6,4);

 $visao2=$diav."/".$mesv."/".$anov; 

 $visaoteste=$anov."-".$mesv."-".$diav; 

$DataInicial =$visao2;
$QtdDia = $DD2;
$diasSomados = SomaDiasUteis($DataInicial,$QtdDia);

 $diav1=substr($diasSomados,0,2);
 $mesv1=substr($diasSomados,3,2);  
 $anov1=substr($diasSomados,6,4);


$vencimento1=$anov1."/".$mesv1."/".$diav1;



/*echo '<br>';
  
echo "Somar ".$QtdDia." dia(s) de ".utf8_encode("visão é")." inicial: ".$DataInicial.". Vencimento : ".diasemana1($vencimento1); 


echo '<br>';*/



if(strlen(diferencadata($diasSomados,$data2)) == 3){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}elseif(strlen(diferencadata($diasSomados,$data2)) == 2){
    $diasdff = substr(diferencadata($diasSomados,$data2),1,2);
}else
{
   $diasdff = diferencadata($diasSomados,$data2);  
}

/*echo "A diferenca e de ".$diasdff." entre as datas";
echo '<br>';

echo '<hr>';*/

$diasteste=$diasdff-$dias1;


if(strlen($diasteste) == 3){
    $diasteste = substr($diasteste,1,2);
}elseif(strlen($diasteste) == 2){
    $diasteste = substr($diasteste,1,2);
}else
{
   $diasteste = $diasteste;  
}


 
if($dias1 <= $linha_atv["dias"]){
   
  $criterio= "Dentro do prazo";
 
  
}
elseif($dias1 > $linha_atv["dias"]){
    
   if(!empty($prazo2)) {   
  $criterio= "Dentro do prazo";
  }
 $criterio= "Fora do prazo";
 
}

/* fim calculo de sla */

 $diav1=substr($DataInicial,0,2);
 $mesv1=substr($DataInicial,3,2);  
 $anov1=substr($DataInicial,6,4);
 $DataInicial= $anov1."-".$mesv1."-".$diav1." ".$horafiltro;

 $DataInicial2= $anov1."-".$mesv1."-".$diav1;

 $diav2=substr(substr(diasemana1($vencimento1),0,10),0,2);
 $mesv2=substr(substr(diasemana1($vencimento1),0,10),3,2);  
 $anov2=substr(substr(diasemana1($vencimento1),0,10),6,4);
$vencimento=$anov2."-".$mesv2."-".$diav2." ".$horafiltro;


if($visaoteste == $data2){
  $dias1=0;

//echo "sim";

}



$query_linha="UPDATE tbl_cotacao a SET 
                                a.visao_ilha  ='".$DataInicial."',
                                a.vencimento_ilha ='".$vencimento."',
                                a.dia           ='".$linha_atv['dias']."',
                                a.TEMPO         ='".$linha_atv['criterio']."',
                                a.TIPO_PROCESSO ='".$linha_atv['tipo_processo']."',
                                a.TIPO_DE_LINHA ='".$linha_atv['tipo_de_linha']."',
                                a.SLA_DIAS      ='".$dias1."',
                                a.PRAZO_DIAS    ='".$criterio."'                                
                                WHERE id_cotacao  = '".$id_cotacao."' ";

                                //a.setor          ='analise'
$consulta_servico2 = mysql_query($query_linha) or die (mysql_error());



$query1= "SELECT * FROM tbl_cotacao  WHERE id_cotacao  = '$id_cotacao' "; 
                                
  $acao_cota2 = mysql_query($query1) or die (mysql_error());
    
    while($linha_query1 = mysql_fetch_assoc($acao_cota2))
    {
        $id_cotacao2   = $linha_query1["id_cotacao"];
        $cotacao_principal  = $linha_query1["cotacao_principal"];
        $revisao              = $linha_query1["REVISAO_PRINCIPAL"];
        $ALTAS                = $linha_query1['ALTAS'];
        $PORTABILIDADE        = $linha_query1['PORTABILIDADE2'];
        $MIGRACAO             = $linha_query1['MIGRACAO'];
        $TROCAS               = $linha_query1['TROCAS'];
        $TT                   = $linha_query1['TT'];
        $BACKUP               = $linha_query1['BACKUP'];
        $M_2_M                = $linha_query1['M_2_M'];
        $FIXA                 = $linha_query1['FIXA'];
        $PRE_POS              = $linha_query1["PRE_POS"]; 
        $MIGRACAO_TROCA       = $linha_query1["MIGRACAO_TROCA"];
        $visao_lha            = $linha_query1["visao_ilha"];
        $dia                  = $linha_query1["dia"];
        $vencimento_ilha      = $linha_query1["vencimento_ilha"];
        $TEMPO                = $linha_query1["TEMPO"]; 
        $TIPO_PROCESSO        = $linha_query1["TIPO_PROCESSO"];
        $TIPO_DE_LINHA        = $linha_query1["TIPO_DE_LINHA"]; 
        $SLA_DIAS             = $linha_query1["SLA_DIAS"];
        $PRAZO_DIAS           = $linha_query1["PRAZO_DIAS"];
        $total_linhas_cip     = $linha_query1["total_linhas_cip"];
        
                                                              

                                
   $query2="UPDATE tbl_cotacao a SET 
                         a.ALTAS          ='$ALTAS',
                         a.PORTABILIDADE2 ='$PORTABILIDADE',
                         a.MIGRACAO       ='$MIGRACAO',
                         a.TROCAS         ='$TROCAS',
                         a.TT             ='$TT',
                         a.BACKUP         ='$BACKUP',
                         a.M_2_M          ='$M_2_M',
                         a.FIXA           ='$FIXA',
                         a.PRE_POS        ='$PRE_POS', 
                         a.MIGRACAO_TROCA ='$MIGRACAO_TROCA',
                         a.total_linhas_cip ='$total_linhas_cip',
                         a.visao_ilha      ='$visao_lha',
                         a.vencimento_ilha ='$vencimento_ilha',
                         a.dia             ='$dia',
                         a.TEMPO           ='$TEMPO',
                         a.TIPO_PROCESSO   ='$TIPO_PROCESSO',
                         a.TIPO_DE_LINHA   ='$TIPO_DE_LINHA',
                         a.SLA_DIAS        ='$SLA_DIAS',
                         a.PRAZO_DIAS      ='$PRAZO_DIAS'              
          WHERE a.cotacao_principal  = '$cotacao_principal' and a.REVISAO_PRINCIPAL='$revisao'  ";


$result3= mysql_query($query2,$conecta);
}





?>

     <tr> 
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_cotacao" ?>" checked readonly="True"/></td>
    <td class="tdconteudo"><?php echo "$cotacao_principal"?></td>
    <td class="tdconteudo"><?php echo "$n_da_cotacao"?></td>
     <td class="tdconteudo"><?php echo "$revisao2"?></td>
    <td class="tdconteudo"><?php echo arrumadatahora($visao_ilha); ?></td> 
    <td class="tdconteudo"><?php echo  arrumadatahora($vencimento); ?></td>
    <td class="tdconteudo"><?php echo "$PRAZO_DIAS" ?></td>
    <td class="tdconteudo"><?php echo "$SLA_DIAS" ?></td>
    <td class="tdconteudo"><?php echo "$sub_status_vivocorp" ?></td>
    <td class="tdconteudo"><?php echo "$disc_status_cip" ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_LINHA" ?></td>
    <td class="tdconteudo">
    <a href="javascript:abrir('site/forms/formdetalhes_linhas_cotacao.php?id_cotacao=<?php echo $id_cotacao; ?>');">
    <?php echo "$total_linhas_cip" ?></a></td> 
    <td class="tdconteudo"><?php echo "$tipo"?></td>
    <td class="tdconteudo"><?php echo "$cliente" ?></td>
    <td class="tdconteudo"><?php echo "$TIPO_COTACAO" ?></td>
       

    </tr>
    <?php
  	}
       }
	?>
    </tbody>
  </table>
  <br />
<p>
  <input type="button" name="Submit2" value="Voltar" onclick="window.location='principal.php?t=forms/formdistribuir_cotacao_correcao.php'"  class="sb2 bradius" />

  <input type="submit" name="Submit" value="Distribuir" class="sb2 bradius" />
 </p>
</form>
</div>
</div>
</div>
</body>
</html>

