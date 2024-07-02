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
      
      $('form').submit(function(e){ e.preventDefault(); });
      
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



<script language="JavaScript">
function abrir2(URL) {
 
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



  <?php


$tempo = 0;

set_time_limit($tempo);


/***INICIO DO BLOCO ACRESCENTA DIAS A DATA INICIAL DA VISAO TIRANDO SABADO/DOMINGO/FERIADOS E ADICIONANDO PARA FRENTE **/

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
            '01/01',
            '02/02', // Navegantes
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04',
            '01/05',
            date('d/m',$datas['corpus_cristi']),
            //'20/09', // Revolução Farroupilha \m/
            '07/09',
            '12/10',
            '02/11',
            '15/11',
            '25/12',
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
         for($ii=1; $ii<=$xSomarDias; $ii++){
            
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
                  if($xDataInicial==Feriados(date("Y"),$i)){
                     $xDataInicial=Soma1dia($xDataInicial);
                  }
               }
            }
         }
      return $xDataInicial;
      }
/*** FINAL DO BLOCO FUNÇÃO ACRESCENTA DIAS A DATA INICIAL DA VISAO TIRANDO SABADO/DOMINGO/FERIADOS E ADICIONANDO PARA FRENTE **/


/***INICIO DO BLOCO DE FUNÇÕES PARA PEGAR DIAS UTEIS ENTRE DUAS DATAS **/

//CALCULANDO DIAS NORMAIS
/*Abaixo vamos calcular a diferença entre duas datas. Fazemos uma reversão da maior sobre a menor 
para não termos um resultado negativo. */
function CalculaDias($xDataInicial, $xDataFinal){
   $time1 = dataToTimestamp($xDataInicial);  
   $time2 = dataToTimestamp($xDataFinal);  

   $tMaior = $time1>$time2 ? $time1 : $time2;  
   $tMenor = $time1<$time2 ? $time1 : $time2;  

   $diff = $tMaior-$tMenor;  
   $numDias = $diff/86400; //86400 é o número de segundos que 1 dia possui  
   return $numDias;
}

//CALCULA DIAS UTEIS
/*É nesta função que faremos o calculo. Abaixo podemos ver que faremos o cálculo normal de dias ($calculoDias), após este cálculo, faremos a comparação de dia a dia, verificando se este dia é um sábado, domingo ou feriado e em qualquer destas condições iremos incrementar 1*/

function DiasUteis($yDataInicial,$yDataFinal){

   $diaFDS = 0; //dias não úteis(Sábado=6 Domingo=0)
   $calculoDias = CalculaDias($yDataInicial, $yDataFinal); //número de dias entre a data inicial e a final
   $diasUteis = 0;
   
   while($yDataInicial!=$yDataFinal){
      $diaSemana = date("w", dataToTimestamp($yDataInicial));
      if($diaSemana==0 || $diaSemana==6){
         //se SABADO OU DOMINGO, SOMA 01
         $diaFDS++;
      }else{
      //senão vemos se este dia é FERIADO
         for($i=0; $i<=12; $i++){
            if($yDataInicial==Feriados(date("Y"),$i)){
               $diaFDS++;   
            }
         }
      }
      $yDataInicial = Soma1dia($yDataInicial); //dia + 1
   }
return $calculoDias - $diaFDS;
}

/***FINAL DO BLOCO DE FUNÇÕES PARA PEGAR DIAS UTEIS ENTRE DUAS DATAS **/


  
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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21){
    
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
  
 
 

//ini_set ( 'mysql.connect_timeout' ,  '500' ); 
//ini_set ( 'default_socket_timeout' ,  '500' );
//ini_set('memory_limit', '-1');






    $query= "SELECT * FROM cip_nv.tbl_usuarios WHERE perfil = '$perfil' and 
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

$sql_update="SELECT * FROM cip_nv.tbl_cotacao a INNER JOIN cip_nv.tbl_analise b ON a.id_cotacao=b.id_cotacao WHERE b.status_cip_analise=2";
$acao3 = mysql_query($sql_update,$conecta) or die (mysql_error());


while($linhatt=mysql_fetch_array($acao3)){

//data criado em vivocorp          
$datauteis=substr($linhatt["criado_em"],0,10);
//$datauteis='2016-08-22';

//data para calculo dias corridos
$data2=$calcula_datahorafutura= date("d/m/Y");

 //echo '<br>';
//tratamento data sem hora do criado em vivocorp
  $diav=substr($datauteis,8,2);
  $mesv=substr($datauteis,5,2);  
  $anov=substr($datauteis,0,4);

 
 //tratamento para pegar horario vivocorp  
  $datahora=$linhatt['criado_em'];
  $horafiltro=substr($datahora,10,10);

  $visao2=$diav."/".$mesv."/".$anov;

  $visao_ilha=$anov."-".$mesv."-".$diav." ".$horafiltro;


$DataInicial = $visao2; 
$QtdDia = 1;
$diasSomados = SomaDiasUteis($DataInicial,$QtdDia);



   //CHAMADA DA FUNCAO
   $diasUteis = DiasUteis($DataInicial,$data2);
   $diasNormal = CalculaDias($DataInicial,$data2);




if( $diasUteis > $QtdDia ){

 $criterio= "Fora do prazo";


}elseif( $diasUteis <= $QtdDia ){

    if($diasUteis < 0){

    $diasUteis=0;
  }else{

    $diasUteis=$diasUteis;
  }

 $criterio= "Dentro do prazo";

}



if($diasUteis == 0){

  //echo "igual";
  $Vence = "1.Vence Hoje";

}
if($diasUteis  == 1 ){

  //echo "nao é igual";

 $Vence="2.Vence D+1";
}

if($diasUteis  == 2){

  //echo "nao é igual";

  $Vence="3.Vence D+2";
}

if($diasUteis  >= 3 ){

  //echo "nao é igual";

  $Vence="4.Vence D>2";
}



//tratamento data sem hora do criado em vivocorp
  $diavc=substr($diasSomados ,0,2);
  $mesvc=substr($diasSomados ,3,2);  
  $anovc=substr($diasSomados ,6,4);

$vencimento_ilha=$anovc."-".$mesvc."-".$diavc." ".$horafiltro;


 $query_linha2="UPDATE cip_nv.tbl_cotacao a SET  
                                a.visao_ilha  ='$visao_ilha',
                                a.vencimento_ilha ='$vencimento_ilha',
                                a.dia           ='1',
                                a.TEMPO         ='Ate 1 dia utel',
                                a.TIPO_PROCESSO ='Quantificar',
                                a.TIPO_DE_LINHA ='Quantificar',
                                a.SLA_DIAS      ='$diasUteis',
                                a.PRAZO_DIAS    ='$criterio',
                                a.VENCIMENTODIAS ='$Vence'                                
                                WHERE a.id_cotacao  = '{$linhatt["id_cotacao"]}' and a.PRAZO_DIAS IS NULL ";

$resultteste=mysql_query($query_linha2,$conecta);

}




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






/*
 $update_quant="SELECT * FROM cip_nv.tbl_cotacao a  WHERE  a.cotacao_principal =a.n_da_cotacao
  and SUBSTRING(a.criado_em,1,10) >='$data_1' AND (a.total_linhas_cip <> '0' AND a.total_linhas_cip IS NOT NULL ) AND a.TIPO_COTACAO='Principal'  ORDER BY a.criado_em DESC ";
  
    $acao_update1 = mysql_query($update_quant) or die (mysql_error());
              
    while($linha_update = mysql_fetch_assoc($acao_update1))
    {
        
    $ALTAS                =$linha_update['ALTAS'];
    $PORTABILIDADE        =$linha_update['PORTABILIDADE2'];
    $MIGRACAO             =$linha_update['MIGRACAO'];
    $TROCAS               =$linha_update['TROCAS'];
    $TT                   =$linha_update['TT'];
    $BACKUP               =$linha_update['BACKUP'];
    $M_2_M                =$linha_update['M_2_M'];
    $FIXA                 =$linha_update['FIXA'];
    $PRE_POS              =$linha_update['PRE_POS']; 
    $MIGRACAO_TROCA       =$linha_update['MIGRACAO_TROCA'];   
    $total_linhas_cip      =$linha_update['total_linhas_cip'];
    $n_da_cotacao         =$linha_update['n_da_cotacao'];
    $TIPO_SERVICO         =$linha_update['TIPO_SERVICO'];
                   
   /* echo $update_atv2="UPDATE cip_nv.tbl_cotacao, cip_nv.tbl_analise  
                          SET                    
                              tbl_cotacao.ALTAS          ='$ALTAS',
                              tbl_cotacao.PORTABILIDADE2 ='$PORTABILIDADE',
                              tbl_cotacao.MIGRACAO       ='$MIGRACAO',
                              tbl_cotacao.TROCAS         ='$TROCAS',
                              tbl_cotacao.TT             ='$TT',
                              tbl_cotacao.BACKUP         ='$BACKUP',
                              tbl_cotacao.PRE_POS        ='$PRE_POS',
                              tbl_cotacao.MIGRACAO_TROCA ='$MIGRACAO_TROCA',
                              tbl_cotacao.M_2_M          = '$M_2_M', 
                              tbl_cotacao.FIXA           = '$FIXA',
                              tbl_cotacao.TIPO_SERVICO   = '$TIPO_SERVICO',
                              tbl_cotacao.total_linhas_cip ='$total_linhas_cip',
                              tbl_analise.status_cip_analise =3   
               WHERE  tbl_analise.status_cip_analise = 2 
                      AND tbl_cotacao.n_da_cotacao= '$n_da_cotacao' 
                      AND tbl_cotacao.TIPO_COTACAO='Principal'  
                      AND tbl_cotacao.total_linhas_cip IS NULL";
                         
        
        $acao_update2 = mysql_query($update_atv2) or die (mysql_error()); 
    }*/

    






    	
$statusfila=2;         

$sql="CALL cip_nv.fila_quantificacao("."'$statusfila'".")";


$acao = mysql_query($sql,$conecta) or die (mysql_error());
$num_ = mysql_num_rows($acao);


?>

<table class="tablepadrao" >
<td>

<div id="filtroservico2" class="form bradius">
<div class="divformdistribuicaoservico">

<p></p>
<p><p align="center"><b><font color="#337ab7" size="3" face="Gotham Light">Lista 
  de Cota&ccedil;&otilde;es Para Atualizar Servi&ccedil;o</font></p>
<br />
<p><font color="#000000" size="2" face="Gotham Light">Voc&ecirc; tem um total de <?php echo "$num_ cota&ccedil;&otilde;es"?> 
    na sua vis&atilde;o. Clique 
    em &quot;<strong>Abrir &quot; para atualizar o servi&ccedil;o :</font></p>
    <br />
    
    <p align="left"><font color="#000000" size="2" face="Gotham Light">Em caso de carregamento duplicado 
    clicar neste link para limpar a base e carregar novamente:<a href="principal.php?t=controles/sql_excluir_carregamento_duplicado.php">Limpar Base Duplicada</a>.</font></p>
    
 <br />
 
  <form method="POST" action="exemplo.html" id="frm-filtro">
  
      <p>
        
        <input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
      </p>
    </form>
   <br /><br /><br /><br />
   
    <table border="0"  class="lista-clientes">
   
    <thead> 
    <tr>
    <th>COTA&Ccedil;&Atilde;O</th>
    <th>CLIENTE TIPO</th>
    <th>REVISAO</th>
    <th>REGIONAL</th>
    <th>UF</th>
    <th>TIPO</th>
    <th>CLIENTE</th>
    <th>CRIADO EM</th>
    <th>STATUS VIOCORP</th>
    <th>SUB-STATUS VIOCORP</th>
    <th>CARTEIRA</th>
	  <th>STATUS CIP</th>	
    <th>ABRIR</th>
	  <th>EXCLUIR</th> 
    
  </tr>
    </thead>
     <tbody>
  <?php

//$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
  $id_cotacao			     = $linha_atv["id_cotacao"];
	$cotacao_principal	 = $linha_atv["cotacao_principal"];
  $revisao             = $linha_atv["revisao"];
  $regional			       = $linha_atv["regional_atribuida"];
	$uf 	     		       = $linha_atv["uf"];
	$criado_em      		 = $linha_atv["criado_em"];
 	$tipo					       = $linha_atv["tipo"];
	$cliente				     = $linha_atv["cliente"];
	$status_vivocorp		 = $linha_atv["status_da_cotacao"];
  $sub_status_vivocorp = $linha_atv["substatus_da_cotacao"];
	$TIPO_SERVICO		     = $linha_atv["TIPO_SERVICO"];
	$status_cip          = $linha_atv["status_cip_analise"];
  $disc_status_cip     = $linha_atv["disc_status_cip_analise"];
  $cpf_cnpj2           = $linha_atv["cpf_cnpj2"];
  $carteira            = $linha_atv["carteira"];
  //$raiz_grupo          = $linha_atv["raiz_grupo2"];
  //$grupo               = $linha_atv["grupo"];
  $cliente_tipo        = $linha_atv["cliente_tipo"];

  $criado_em=arrumadatahora($criado_em);



if(empty($cliente_tipo)){

  $cliente_tipo="TOP";
  $cor = '#464646';
 
}else{

  $cliente_tipo=$cliente_tipo;
   $cor = '#FF0000';

}




$query2="UPDATE cip_nv.tbl_cotacao a,cip_nv.carteira b 
SET a.carteira=SUBSTRING(b.carteira,6,255) 
WHERE a.cpf_cnpj=b.cpf_cnpj AND a.id_cotacao= '$id_cotacao' ";

(!mysql_query($query2,$conecta));



?>
  <tr> 
    <td class="tdconteudo"><?php echo "<a href='javascript:abrir2(\"site/forms/formdistribuir_filhas_visao_cotacao_input.php?cotacao_principal=$cotacao_principal\");'><font size='1' color='$cor' face='Arial'>$cotacao_principal</font></a>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente_tipo</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$revisao</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$regional</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$uf</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$tipo</font>"?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$cliente</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$criado_em</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$sub_status_vivocorp</font>" ?></td>
    <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$carteira</font>" ?></td>
	  <td class="tdconteudo"><?php echo "<font size='1' color='$cor' face='Arial'>$disc_status_cip</font>" ?></td>
    <td>
   
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=forms/formdistribuir_cotacao_servico1.php">ABRIR</a>
   
   
    </td>
	<td>
    <a href="principal.php?id_cotacao=<?php echo $id_cotacao ?>&t=controles/sql_excluir_distribuicao_cotacao_servico.php">EXCLUIR</a></td>	
  </tr>
  <?php

  
 //contagem sla
  include("sql.sla.php");


}


  ?>

</tbody>    
</table>

<br />

<?php 

  mysql_free_result($acao,$resultteste,$acao3,$acao_atv,$acao_operador);
  mysql_close($conecta); 

  ?>


<p align="left">
  <input type="hidden" name="canal" value="<?php echo $canal ?>" />
 

  <input type="button" name="Submit2" class="sb2 bradius" value="Voltar" onclick="window.location='principal.php?&filtro=%&filtro2=%&filtro3=%&t=forms/formhome_operacao.php'"/>
</p>
   </div>

    </div>
</div>

</td>
</table>

</body>
</html>
