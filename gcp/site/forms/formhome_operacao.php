
 <head> 
    <meta http-equiv="refresh" content="30;url=principal.php?&t=forms/formhome_operacao.php"/>
    </head>
<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>

<script language="JavaScript">
function abrir(URL) {
 
  var width = 10760;
  var height = 800;
 
  var left = 99;
  var top = 99;
 
    window.open(URL,"janela","scrollbars=yes, height=" + height +", width=" +width);
 
}
</script>


<?php 
/*
$datalog=date("Y-m-d");
$situacao=utf8_encode("Sem Cotações");

$sql_operadorlog="UPDATE cip_nv.tbl_usuarios SET situacao2='$situacao' WHERE SUBSTRING(data_log_ent,1,10) <> '$datalog' ";
$acao_operadorlog = mysql_query($sql_operadorlog,$conecta) or die (mysql_error());*/


$selectvalidauser="SELECT a.idtbl_usuario,b.idtbl_usuario_analise as idtbl_usuario2 ,b.status_cip_analise FROM cip_nv.tbl_usuarios a 
                   INNER JOIN cip_nv.tbl_analise b 
                   ON b.idtbl_usuario_analise=a.idtbl_usuario AND b.status_cip_analise= 4 
                   UNION 
                   SELECT a.idtbl_usuario,c.idtbl_usuario_input as idtbl_usuario2,c.status_cip_input FROM cip_nv.tbl_usuarios a 
                   INNER JOIN cip_nv.tbl_input c 
                   ON c.idtbl_usuario_input=a.idtbl_usuario AND c.status_cip_input= 8 
                   UNION 
                   SELECT a.idtbl_usuario,d.idtbl_usuario_auditoria as idtbl_usuario2,d.status_cip_auditoria FROM cip_nv.tbl_usuarios a 
                   INNER JOIN cip_nv.tbl_auditoria d  
                   ON d.idtbl_usuario_auditoria=a.idtbl_usuario AND d.status_cip_auditoria= 14 
                    UNION 
                   SELECT a.idtbl_usuario,e.idtbl_usuario_correcao as idtbl_usuario2,e.status_cip_correcao FROM cip_nv.tbl_usuarios a 
                   INNER JOIN cip_nv.tbl_correcao e 
                   ON e.idtbl_usuario_correcao=a.idtbl_usuario AND e.status_cip_correcao = 21  
                   ";
$acaovalidauser = mysql_query($selectvalidauser,$conecta) or die (mysql_error());
$countuser = mysql_fetch_array($acaovalidauser);
$numuser =$countuser['total']; 
 
$situacao2="Sem Cotações";
$situacaofiltro="Com Cotações";
$sql_operadorlog="UPDATE cip_nv.tbl_usuarios a SET a.situacao2='$situacao2'  
                  WHERE a.situacao2='$situacaofiltro' ";
$acao_operadorlog = mysql_query($sql_operadorlog,$conecta) or die (mysql_error());


while($linha_opvali = mysql_fetch_assoc($acaovalidauser)){

$datalog=date("Y-m-d");
$situacao="Com Cotações";
$sql_operadorlog="UPDATE cip_nv.tbl_usuarios a SET a.situacao2='$situacao' 
                  WHERE a.idtbl_usuario = '{$linha_opvali['idtbl_usuario2']}' ";
$acao_operadorlog = mysql_query($sql_operadorlog,$conecta) or die (mysql_error());


}


if($_POST['filtro']== 'Todos'){
  $_POST['filtro']='%';
}
if($_POST['filtro2']== 'Todos'){
  $_POST['filtro2']='%';
}
if($_POST['filtro3'] == 'Todos'){
  $_POST['filtro3']='%';
}

$filtro=$_POST['filtro']; 

$filtro2=$_POST['filtro2'];

$filtro3=$_POST['filtro3'];

if(empty($_COOKIE['filtro']) && !empty($_POST['filtro']) 
  || empty($_COOKIE['filtro2']) && !empty($_POST['filtro2']) 
  || empty($_COOKIE['filtro3']) && !empty($_POST['filtro3'])){


setcookie('filtro',$_POST['filtro']);

setcookie('filtro2',$_POST['filtro2']);

setcookie('filtro3',$_POST['filtro3']);

}elseif(!empty($_COOKIE['filtro']) && !empty($_POST['filtro']) 
  || !empty($_COOKIE['filtro2']) && !empty($_POST['filtro2']) 
  || !empty($_COOKIE['filtro3']) && !empty($_POST['filtro3'])){


setcookie('filtro',$_POST['filtro']);

setcookie('filtro2',$_POST['filtro2']);

setcookie('filtro3',$_POST['filtro3']);



}else{

  $filtro=$_COOKIE['filtro']; 

  $filtro2=$_COOKIE['filtro2']; 

  $filtro3=$_COOKIE['filtro3']; 



}





?>



<div id="filtroservico bradius">
<div class="divformservico bradius">

<form name="myform" method="POST" action="principal.php?&t=forms/formhome_operacao.php">

<p align="center"><b style="color: #000000">Selecione para pesquisa:
Setor:
<select name="filtro" onchange="this.form.submit();" class="txt2comboboxpequeno bradius">
<?php if(empty($filtro)){ ?>
    <option selected="%">Todos</option>
    <?php }else{ ?>
    <option value="<?php echo $filtro ?>">
    <?php if($filtro == '%'){ 
        echo "Todos"; 
        }elseif($filtro == '2'){ 
            echo "An&aacute;lise"; 
            }elseif($filtro == '3'){ 
            echo "Input"; 
            }elseif($filtro == '5'){ 
            echo "An&aacute;lise de input"; 
            }elseif($filtro == '6'){ 
            echo "Corre&ccedil;&atilde;o"; 
            }elseif($filtro == '13'){ 
            echo "Chamado"; 
            }elseif($filtro == '14'){ 
            echo "Contesta&ccedil;&atilde;o"; 
            }elseif($filtro == '15'){ 
            echo "Diretoria"; 
            }elseif($filtro == '12'){ 
            echo "An&aacute;lise - CO"; 
            }   ?></option>
    <?php } ?>
    <option value="%">Todos</option>
  <option value="2" >An&aacute;lise</option>
    <option value="3" >Input</option>
    <option value="5" >An&aacute;lise de input</option>
    <option value="6" >Corre&ccedil;&atilde;o</option>
    <option value="13" >Chamado</option>
    <option value="14" >Contesta&ccedil;&atilde;o</option>
    <option value="15" >Diretoria</option>
    <option value="12" >An&aacute;lise - CO</option>
</select>


Turno:
<select name="filtro2" onchange="this.form.submit();" class="txt2comboboxpequeno bradius">
<?php if(empty($filtro2)){ ?>
    <option selected="%">Todos</option>
    <?php }else{ ?>
    <option value="<?php echo $filtro2 ?>">
    <?php if($filtro2 == '%'){ 
        echo "Todos"; 
        }elseif($filtro2 == '1'){ 
            echo "Diurno";
            }elseif($filtro2 == '2'){ 
            echo "Intermedi&aacute;rio";
            }elseif($filtro2 == '3'){ 
            echo "Noturno"; 
            } ?></option>
    <?php } ?>
    <option value="%">Todos</option>
    <option value="1" >Diurno</option>
    <option value="2" >Intermediario</option>
    <option value="3" >Noturno</option>
   
</select>


Situa&ccedil;&atilde;o:
<select name="filtro3" onchange="this.form.submit();" class="txt2comboboxpequeno bradius">
<?php if(empty($filtro3)){ ?>
    <option selected="%">Todos</option>
    <?php }else{    ?>
    <option value="<?php echo $filtro3 ?>">
    <?php
   
       
     if($filtro3 == '%'){ 
        echo "Todos"; 
        }elseif($filtro3 == "Sem Cotações"){ 
            echo utf8_encode("Sem Cotações");
            }elseif($filtro3 == "Com Cotações"){ 
            echo "Com Cotações";
            }
             ?></option>
    <?php } ?>
    <option value="%">Todos</option>
    <option value="<?php echo "Sem Cotações"; ?>">Sem Cotações</option>
    <option value="<?php echo "Com Cotações"; ?>">Com Cotações</option>
    

</select>

</b></p>

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
  
if($perfil != 1 && $perfil != 4 && $perfil != 7 && $perfil != 18 && $perfil != 21 && $perfil != 22 && $perfil != 23 ){
    
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



$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y-m-d"); 
 

//echo $canal;

if($canal == '%' ){

 $usuario_op="SELECT a.idtbl_usuario,
                    a.usuario,
                    a.nome,
                    a.situacao2,
                    a.status,
              CASE 
                  WHEN perfil = 2 
                  THEN 'An&aacute;lise VPG'
                  WHEN perfil = 3
                  THEN 'Input VPG'
                  WHEN perfil = 5
                  THEN 'An&aacute;lise de input VPG'
                  WHEN perfil = 6
                  THEN 'Correção VPG'
                   WHEN perfil = 13
                  THEN 'Chamado VPG'
                  WHEN perfil = 14
                  THEN 'Contesta&ccedil;&atilde;o VPG' 
                  WHEN perfil = 15
                  THEN 'Diretoria VPG' 
                  WHEN perfil = 12 
                  THEN 'An&aacute;lise - CO' 
                  ELSE 'Todos VPG' 
                  END AS perfil 
              FROM cip_nv.tbl_usuarios a
            WHERE  a.perfil NOT IN(1,4) 
                  and a.perfil LIKE '%$filtro%' 
                 and a.situacao2 IS NOT NULL and a.turno LIKE '$filtro2%' 
                 and a.situacao2 LIKE '$filtro3%' and  a.status = 1   
            ORDER BY a.nome,a.situacao";
$acao_op=mysql_query($usuario_op,$conecta);
$linha_op = mysql_fetch_assoc($acao_op); 
{
$login	=	$linha_op["usuario"];
$nome   =	$linha_op["nome"];
$perfil  =	$linha_op["perfil"];
}

$num = mysql_num_rows($acao_op);

?>
<br>
<table width="100%" >
<thead>
<tr>
<th colspan="8" class="trcabecalho2 bradius">Controle Usu&aacute;rios</th>
</tr>
<tr><?php
if($filtro == '%'){ 
        $perfil = "Todos"; 
        }elseif($filtro == '2'){ 
           $perfil ="An&aacute;lise"; 
            }elseif($filtro == '3'){ 
           $perfil = "Input"; 
            }elseif($filtro == '5'){ 
            $perfil = "An&aacute;lise de input"; 
            }elseif($filtro == '6'){ 
            $perfil = "Corre&ccedil;&atilde;o"; 
            }elseif($filtro == '13'){ 
            $perfil = "Chamado"; 
            }elseif($filtro == '14'){ 
            $perfil = "Contesta&ccedil;&atilde;o"; 
            }elseif($filtro == '15'){ 
            $perfil = "Diretoria"; 
            }elseif($filtro == '12'){ 
            $perfil = "An&aacute;lise - CO"; 
            }   
    
?>

 <th class="trcabecalho2 bradius">Usuario: <?php echo "$perfil"?></th>
 <th class="trcabecalho2 bradius">Total: <?php echo "$num"?></th>
 
</tr>
 
<tr>
    <th class="trcabecalho2 bradius">Usu&aacute;rios</th>
	<th class="trcabecalho2 bradius">situa&ccedil;&atilde;o:</th>
  </tr>
   </thead> 

<?php



 $usuario_op="SELECT a.idtbl_usuario,
                    a.usuario,
                    a.nome,
                    a.situacao2,
                    a.status,
              CASE
                  WHEN perfil = 2 
                  THEN 'An&aacute;lise VPG'
                  WHEN perfil = 3
                  THEN 'Input VPG'
                  WHEN perfil = 5
                  THEN 'An&aacute;lise de input VPG'
                  WHEN perfil = 6
                  THEN 'Correção VPG'
                  WHEN perfil = 13
                  THEN 'Chamado VPG'
                  WHEN perfil = 14
                  THEN 'Contesta&ccedil;&atilde;o VPG' 
                   WHEN perfil = 15
                  THEN 'Diretoria VPG'
                   WHEN perfil = 12 
                  THEN 'An&aacute;lise - CO'
                  ELSE 'Todos VPG' 
                  END AS perfil 
              FROM cip_nv.tbl_usuarios a
            WHERE  a.perfil NOT IN(1,4) 
            and a.perfil LIKE '%$filtro%' 
            and a.situacao2 IS NOT NULL and a.turno LIKE '$filtro2%' 
          and a.situacao2 LIKE '$filtro3%' and a.status = 1  
            ORDER BY a.nome,a.situacao";
$acao_op=mysql_query($usuario_op,$conecta);
while($linha_op = mysql_fetch_assoc($acao_op)) 
{
$usuario	=	$linha_op["usuario"];
$nome   =	$linha_op["nome"];
$situacao2  =	$linha_op["situacao2"];
$idtbl_usuario	=	$linha_op["idtbl_usuario"];

$num = mysql_num_rows($acao_op);


?>

<tbody>
  <tr>
  <td class="trcabecalho2 bradius">

  <a href="javascript:abrir('site/forms/formdetalhes_visao_cotacao_operacao.php?id_user=<?php echo $idtbl_usuario; ?>&canal=<?php echo '%' ?>');">
    <?php echo "$nome"?></a></td>
  
  <td class="trcabecalho2 bradius">
  <?php echo "$situacao2 "?></td>
</tr>

</tbody>
 <?php
  }
  ?>
</table>

<?php }?>
 
 
 <?php

  mysql_free_result($acao_op,$acao_operadorlog,$acao_operador);
  mysql_close($conecta);  

  ?>


 
   <br/>
</form>
 </div>
 </div>
</body>
</html>
