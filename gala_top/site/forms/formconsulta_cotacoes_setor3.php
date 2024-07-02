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
    var frm = document.form1;
    for(i = 0; i < frm.length; i++) {        
        if(frm.elements[i].type == "checkbox") {
            frm.elements[i].checked = retorno;
        }
     }
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
  
 

ini_set ( 'mysql.connect_timeout' ,  '500' ); 
ini_set ( 'default_socket_timeout' ,  '500' );







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


<fieldset id="filtroservico2" class="bradius">
<div class="divformdistribuicaoservico">

<p></p>

<form name="form1" method="post" action="principal.php?&t=controles/sql_retornardistribuicao_cotacao_correcao4.php" id="frm-filtro">

<p align="center"><b><font color="#a0873c" size="5" face="Gotham Light">Resumo Por Setor</font></b></p>
<br />

<p><font color="#a0873c" size="4" face="Gotham Light"><strong>Lista de Cotações</strong></font></p>
<br />


      
<input type="text" id="pesquisar" name="pesquisar" size="30" class="input-search bradius"  placeholder="Buscar nesta lista"  />
</p>

<br /><br /><br /><br />
   
<p>
Selecione o setor de retorno para distribuicao:
Análise
<input type="radio" value="1" align="LEFT" checked="checked" name="filtro" id="1" title="Analise" />
Input
<input type="radio" value="2" align="LEFT"  name="filtro" id="2" title="input" />
Auditoria
<input type="radio" value="3" align="LEFT"  name="filtro" id="3" title="auditoria" />
Correção
<input type="radio" value="4" align="LEFT"  name="filtro" id="4" title="auditoria" />
<br />  

<br /><br />

    <table border="0" class="lista-clientes" >
    <thead> 
    <tr> 
    <th>
    <input type="checkbox" name="checkbox" id="checkbox" value="2" onclick="return selecionar_todas(this.checked);" /></th>
    <th>COTA&Ccedil;&Atilde;O</th>
    <th>REGIONAL</th>
    <th>UF</th>
    <th>TIPO</th>
    <th>REVISAO</th>
    <th>CLIENTE</th>
    <th>CRIADO EM</th>
    <th>STATUS VIOCORP</th>
    <th>SUB-STATUS VIOCORP</th>
	<th>STATUS CIP</th>
    <th>OPERADOR</th>
    <th>DATA INCLUSÃO GALA</th>
    <th>DATA TRATAMENTO</th>  
 	<th>TIPO SERVIÇOS</th> 
    <th>ALTAS</th>
    <th>PORTAB.</th>
    <th>MIGRACAO</th>
    <th>TROCAS</th>
    <th>TT</th>
    <th>BACKUP</th>
    <th>M_2_M</th>
    <th>FIXA</th> 
    <th>TOTAL LINHAS</th>
    <th>SETOR</th>
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

$sql = "SELECT DISTINCT a.id_cotacao,
                a.regional,
                a.uf,
                a.cotacao_principal,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.segmento,
                a.conta_cliente,
                a.status,
                a.substatus,
                a.dt_inclusao_bd_cip,
                a.ALTAS,
                a.PORTABILIDADE,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,  
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip2,
                b.status_cip_analise as status_cip2,
                b.disc_status_cip_analise as disc_status_cip2,
                b.idtbl_usuario_analise as idtbl_usuario2,
                b.dt_tratamento_analise as ds_tratamento,
                b.hora_tratamento_analise as ds_hora_tratamento,
                b.setor
                FROM tbl_cotacao a INNER JOIN tbl_analise b 
                ON a.id_cotacao=b.id_cotacao 
WHERE a.id_cotacao='$id_cotacao'              
            UNION
SELECT DISTINCT a.id_cotacao,
                a.regional,
                a.uf,
                a.cotacao_principal,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.segmento,
                a.conta_cliente,
                a.status,
                a.substatus,
                a.dt_inclusao_bd_cip,
                a.ALTAS,
                a.PORTABILIDADE,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA,  
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip2,
                b.status_cip_input as status_cip2,
                b.disc_status_cip_input as disc_status_cip2,
                b.idtbl_usuario_input as idtbl_usuario2,
                b.dt_tratamento_input as ds_tratamento,
                b.hora_tratamento_input as ds_hora_tratamento,
                b.setor
                FROM tbl_cotacao a INNER JOIN tbl_input b 
                ON a.id_cotacao=b.id_cotacao               
                WHERE a.id_cotacao='$id_cotacao'
            UNION
SELECT DISTINCT a.id_cotacao,
                a.regional,
                a.uf,
                a.cotacao_principal,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.segmento,
                a.conta_cliente,
                a.status,
                a.substatus,
                a.dt_inclusao_bd_cip,
                a.ALTAS,
                a.PORTABILIDADE,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA, 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip2,
                b.status_cip_auditoria as status_cip2,
                b.disc_status_cip_auditoria as disc_status_cip2,
                b.idtbl_usuario_auditoria as idtbl_usuario2,
                b.dt_tratamento_auditoria as ds_tratamento,
                b.hora_tratamento_auditoria as ds_hora_tratamento,
                b.setor
                FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
                ON a.id_cotacao=b.id_cotacao               
                WHERE a.id_cotacao='$id_cotacao'  
              
            UNION
SELECT DISTINCT a.id_cotacao,
                a.regional,
                a.uf,
                a.cotacao_principal,
                a.criado_em,
                a.carteira,
                a.revisao,
                a.segmento,
                a.conta_cliente,
                a.status,
                a.substatus,
                a.dt_inclusao_bd_cip,
                a.ALTAS,
                a.PORTABILIDADE,
                a.MIGRACAO,
                a.TROCAS,
                a.TT,
                a.BACKUP,
                a.M_2_M,
                a.FIXA, 
                a.TIPO_SERVICO,
                a.total_linhas_cip,
                a.dt_inclusao_bd_cip2,
                b.status_cip_correcao as status_cip2,
                b.disc_status_cip_correcao as disc_status_cip2,
                b.idtbl_usuario_correcao as idtbl_usuario2,
                b.dt_tratamento_correcao as ds_tratamento,
                b.hora_tratamento_correcao as ds_hora_tratamento,
                b.setor
                FROM tbl_cotacao a INNER JOIN tbl_correcao b 
                ON a.id_cotacao=b.id_cotacao               
                WHERE a.id_cotacao='$id_cotacao'
               GROUP BY a.cotacao_principal,a.revisao,a.dt_inclusao_bd_cip2 DESC LIMIT 0,20000 ";


$acao = mysql_query($sql) or die (mysql_error());

while($linha_atv = mysql_fetch_assoc($acao))
{
$id_cotacao			= $linha_atv["id_cotacao"];
	$cotacao_principal	= $linha_atv["cotacao_principal"];
    $regional			= $linha_atv["regional"];
	$uf 	     		= $linha_atv["uf"];
	$criado_em      		= $linha_atv["criado_em"];
 	$tipo					= $linha_atv["carteira"];
    $revisao                = $linha_atv["revisao"];
	$cliente				= $linha_atv["conta_cliente"];
	$status_vivocorp		= $linha_atv["status"];
    $sub_status_vivocorp	=$linha_atv["substatus"];
    $dt_inclusao_bd_cip 	=$linha_atv["dt_inclusao_bd_cip"];
    $ALTAS                  =$linha_atv['ALTAS'];
    $PORTABILIDADE          =$linha_atv['PORTABILIDADE'];
    $MIGRACAO               =$linha_atv['MIGRACAO'];
    $TROCAS                 =$linha_atv['TROCAS'];
    $TT                     =$linha_atv['TT'];
    $BACKUP                 =$linha_atv['BACKUP'];
    $M_2_M                  =$linha_atv['M_2_M'];
    $FIXA                   =$linha_atv['FIXA'];
	$TIPO_SERVICO		    = $linha_atv["TIPO_SERVICO"];
	$status_cip             = $linha_atv["status_cip2"];
    $disc_status_cip        = $linha_atv["disc_status_cip2"];
    $total_linhas_cip       = $linha_atv["total_linhas_cip"];
    $usuario_analise        = $linha_atv["idtbl_usuario2"];
    $setor                  = $linha_atv["setor"];
    $dt_tratamento          = $linha_atv["ds_tratamento"];
    $hora_tratamento        = $linha_atv["ds_hora_tratamento"];
    
$criado_em          =arrumadatahora($criado_em);
$dt_inclusao_bd_cip =arrumadatahora($dt_inclusao_bd_cip);
$dt_tratamento      =arrumadatahora($dt_tratamento);


if($status_cip =='2'){

$cor = '#FF0000';
}
else
{
$cor = '#464646';
}
	


 $sql = "SELECT a.id_cotacao,
                a.cotacao_principal,
                a.dt_inclusao_bd_cip,
                b.id_cotacao,
                b.status_cip_analise,
                b.idtbl_usuario_analise,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_analise b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= '$usuario_analise'                           
               WHERE a.id_cotacao='$id_cotacao'
          UNION
         SELECT a.id_cotacao,
                a.cotacao_principal,
                a.dt_inclusao_bd_cip,
                b.id_cotacao,
                b.status_cip_input,
                b.idtbl_usuario_input,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_input b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= '$usuario_analise'                           
               WHERE a.id_cotacao='$id_cotacao'
           UNION
         SELECT a.id_cotacao,
                a.cotacao_principal,
                a.dt_inclusao_bd_cip,
                b.id_cotacao,
                b.status_cip_auditoria,
                b.idtbl_usuario_auditoria,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_auditoria b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= '$usuario_analise'                           
               WHERE a.id_cotacao='$id_cotacao'  
          UNION
         SELECT a.id_cotacao,
                a.cotacao_principal,
                a.dt_inclusao_bd_cip,
                b.id_cotacao,
                b.status_cip_correcao,
                b.idtbl_usuario_correcao,
                c.usuario,
                c.nome,
                c.idtbl_usuario
               FROM tbl_cotacao a INNER JOIN tbl_correcao b 
               ON a.id_cotacao=b.id_cotacao
               INNER JOIN tbl_usuarios c 
               ON c.idtbl_usuario= '$usuario_analise'                           
               WHERE a.id_cotacao='$id_cotacao' 
               GROUP BY a.cotacao_principal,a.revisao,a.dt_inclusao_bd_cip2 DESC LIMIT 0,20000 ";
$acao2 = mysql_query($sql) or die (mysql_error());
$linha_atv = mysql_fetch_assoc($acao2);


?>
  <tr >
     
    </tr> 
     <tr> 
     <td>
      <input name="ling[]" type="checkbox" id="ling[]" value="<?php echo "$id_cotacao" ?>" checked readonly="True"/></td>
    <td><?php echo "$cotacao_principal"?></td>
    <td><?php echo "$regional"?></td>
    <td><?php echo "$uf"?></td>
    <td><?php echo "$tipo"?></td>
    <td><?php echo "$revisao" ?></td>
    <td><?php echo "$cliente" ?></td>
    <td><?php echo "$criado_em" ?></td>
    <td><?php echo "$status_vivocorp" ?></td>
    <td><?php echo "$sub_status_vivocorp" ?></td>
    <td><?php echo "$disc_status_cip" ?></td>
    <td><?php echo $linha_atv['nome']; ?></td>
    <td><?php echo "$dt_inclusao_bd_cip" ?></td>
    <td><?php echo $dt_tratamento." ".$hora_tratamento  ?></td>
    <td><?php echo "$TIPO_SERVICO" ?></td> 
    <td><?php echo "$ALTAS" ?></td> 
    <td><?php echo "$PORTABILIDADE" ?></td> 
    <td><?php echo "$MIGRACAO" ?></td> 
    <td><?php echo "$TROCAS" ?></td>
    <td><?php echo "$TT" ?></td> 
    <td><?php echo "$BACKUP" ?></td>
    <td><?php echo "$M_2_M" ?></td> 
    <td><?php echo "$FIXA" ?></td> 
    <td><?php echo "$total_linhas_cip" ?></td> 
    <td><?php echo $setor ?></td>   

    </tr>
    <?php
  	}
       }
	?>
    </tbody>
  </table>
 
  <br />
<p>
  <input type="button" name="Submit2" value="Voltar" onclick="history.back();" class="sb2 bradius" />

  <input type="submit" name="Submit" value="Retornar" class="sb2 bradius" />
 </p>
</form>
</div>
</div>


