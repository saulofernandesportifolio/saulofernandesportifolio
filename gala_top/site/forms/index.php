<!DOCTYPE html>
<html>
<head>
	<title>Testes do Blog</title>
	<script type="text/javascript" src="funcao.js"></script>
</head>


 <head> 
    <meta http-equiv="refresh" content="5;url=principal.php?&filtro=<?php echo $_Session['filtro']  ?>&filtro2=<?php echo $_Session['filtro2']  ?>&filtro3=<?php echo $_Session['filtro3']  ?>&t=forms/formhome_operacao.php"/>
    </head>

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

$datalog=date("Y-m-d");
$situacao=utf8_encode("Sem Cotações");

$sql_operadorlog="UPDATE tbl_usuarios SET situacao2='$situacao' WHERE SUBSTRING(data_log_ent,1,10) <> '$datalog' ";
$acao_operadorlog = mysql_query($sql_operadorlog) or die (mysql_error());

?>


<br /><br />

<body>
	Digite seu Nome:
	<input id="txtnome" name="txtnome" type="text" />
	<br/>
	<button onclick="AlteraConteudo()">Enviar Nome</button>
	<br />
	
	<div id="conteudo">
		Olá anônimo, seja bem-vindo!!!
	
<p align="center">Selecione para pesquisa:
Setor:
<select name="filtro" onchange="AlteraConteudo()" class="txt2comboboxpequeno bradius">
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
            echo "Auditoria"; 
            }elseif($filtro == '6'){ 
            echo "Corre&ccedil;&atilde;o"; 
            }elseif($filtro == '13'){ 
            echo "Chamado"; 
            }   ?></option>
    <?php } ?>
    <option value="%">Todos</option>
	<option value="2" >An&aacute;lise</option>
    <option value="3" >Input</option>
    <option value="5" >Auditoria</option>
    <option value="6" >Corre&ccedil;&atilde;o</option>
    <option value="13" >Chamado</option>
</select>


Turno:
<select name="filtro2" onchange="AlteraConteudo()" class="txt2comboboxpequeno bradius">
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
<select name="filtro3" onchange="AlteraConteudo()" class="txt2comboboxpequeno bradius">
<?php if(empty($filtro3)){ ?>
    <option selected="%">Todos</option>
    <?php }else{    ?>
    <option value="<?php echo $filtro3 ?>">
    <?php
   
       
     if($filtro3 == '%'){ 
        echo "Todos"; 
        }elseif($filtro3 == utf8_encode("Sem Cotações")){ 
            echo utf8_encode("Sem Cotações");
            }elseif($filtro3 == utf8_encode("Com Cotações")){ 
            echo utf8_encode("Com Cotações");
            }
             ?></option>
    <?php } ?>
    <option value="%">Todos</option>
    <option value="<?php echo utf8_encode("Sem Cotações"); ?>"><?php echo utf8_encode("Sem Cotações"); ?></option>
    <option value="<?php echo utf8_encode("Com Cotações"); ?>"><?php echo utf8_encode("Com Cotações"); ?></option>
    

</select>

</p><br />

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
              CASE 
                  WHEN perfil = 2 
                  THEN 'Analise VPG'
                  WHEN perfil = 3
                  THEN 'Input VPG'
                  WHEN perfil = 5
                  THEN 'Auditoria VPG'
                  WHEN perfil = 6
                  THEN 'Correção VPG'
                   WHEN perfil = 13
                  THEN 'Chamado VPG'
                  ELSE 'Todos VPG' 
                  END AS perfil 
              FROM tbl_usuarios a
            WHERE  a.perfil NOT IN(1,4) and a.perfil LIKE '%$filtro%' and a.situacao2 IS NOT NULL and a.turno LIKE '$filtro2%' and a.situacao2 LIKE '$filtro3%'  
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
<br/><br/><br/><br/><br/><br/><br/><br/>
<div id="filtroservico bradius">
<div class="divformservico bradius">
<br/><br/>
<table width="100%">
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
            $perfil = "Auditoria"; 
            }elseif($filtro == '6'){ 
            $perfil = "Corre&ccedil;&atilde;o"; 
            }elseif($filtro == '13'){ 
            $perfil = "Chamado"; 
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
              CASE
                  WHEN perfil = 2 
                  THEN 'Analise VPG'
                  WHEN perfil = 3
                  THEN 'Input VPG'
                  WHEN perfil = 5
                  THEN 'Auditoria VPG'
                  WHEN perfil = 6
                  THEN 'Correção VPG'
                  WHEN perfil = 13
                  THEN 'Chamado VPG'
                  ELSE 'Todos VPG' 
                  END AS perfil 
              FROM tbl_usuarios a
            WHERE  a.perfil NOT IN(1,4) and a.perfil LIKE '%$filtro%' and a.situacao2 IS NOT NULL and a.turno LIKE '$filtro2%' and a.situacao2 LIKE '$filtro3%' 
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

  <a href="javascript:abrir('../../gala/site/forms/formdetalhes_visao_cotacao_operacao.php?id_user=<?php echo $idtbl_usuario; ?>&canal=<?php echo '%' ?>');">
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
 
 
 
   <br/>

 </div>
 </div>
 </div>
</body>
</html>