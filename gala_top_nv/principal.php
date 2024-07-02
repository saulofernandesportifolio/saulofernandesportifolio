<?php
//habilita controle de erros
error_reporting(0);
ini_set(“display_errors”, 0 );
include("bd.php");


if(!isset($_COOKIE['salva']) && !isset($_COOKIE['idtbl_usuario']))
{
 $_COOKIE['salva']='';
 $_COOKIE['idtbl_usuario']='';
 $logado='';
//die ('teste');
}


if(empty($_COOKIE['idtbl_usuario'])){
    
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

 if(!isset($_COOKIE['idtbl_usuario'])){

 
    
     
     setcookie('idtbl_usuario',$_COOKIE['salva'],time() + 28800);
     
     $queryupdate=mysql_query("UPDATE tbl_usuarios SET logado='0' WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'");
      
 }




setcookie('idtbl_usuario',$_COOKIE['idtbl_usuario'],time() + 28800);

 
  
$queryupdate=mysql_query("UPDATE tbl_usuarios SET logado='0' WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'");
      

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
if($perfil == 1 )
{
    $page="GALA - VPG: Supervisor";
    $menu="Supervisor";
    $page2="GALA - VPG: Supervisor";
}
elseif($perfil == 2 )
{
    $page="GALA - VPG: Análise"; 
    $menu="Análise"; 
    $page2="GALA - VPG: Análise";      
}
elseif($perfil == 3 )
{
    $page="GALA - VPG: Input";
    $menu="Input"; 
    $page2="GALA - VPG: Input";

}
elseif($perfil == 4 )
{
    $page="GALA - VPG: Administrador";
    $menu="Administrador";
    $page2= "GALA - VPG: Administrador";  
}
elseif($perfil == 5 )
{
    $page="GALA - VPG: Análise de input";
    $menu="Análise de input";
    $page2="GALA - VPG: Análise de input"; 
}
elseif($perfil == 6 )
{
    $page="GALA - VPG: Correção";
    $menu="Correção";
    $page2="GALA - VPG: Correção"; 
}

elseif($perfil == 12 )
{
    $page="GALA - VPG: Analise/Análise de input";
    $menu="Analise/Auditoria";
    $page2= "GALA - VPG: Analise/Análise de input";
}
elseif($perfil == 13 )
{
    $page="GALA - VPG: Chamado";
    $menu="Chamado";
    $page2= "GALA - VPG: Chamado";
}
/*elseif($perfil == 8 )
{
    $page="GALA - VPE: Operador Análise"; 
    $menu="Operador Análise";      
}
elseif($perfil == 9 )
{
    $page="GALA - VPE: Operador Input";
    $menu="Administrador"; 
}
elseif($perfil == 10 )
{
    $page="GALA - VPE: Operador Auditoria";
    $menu="Administrador"; 
}
elseif($perfil == 11)
{
    $page="GALA - VPG: Operador Correção";
    $menu="Administrador"; 
}*/

else{
    $perfil=0;
  echo "<script type=\"text/javascript\">
  alet('Erro perfil não encontrado!');
     document.location.replace('index.php');";
}



$tempo = 0;

set_time_limit($tempo);
  date_default_timezone_set("Brazil/East");


$hora2=date("H:i:s");


// echo $_COOKIE['idtbl_usuario'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>

<head>
	<title><?php echo $page; ?> </title>
   
    <link rel="StyleSheet" href="css/padrao.css" type="text/css" />
    
     <link href= "dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css">      

    <script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></script> 
   
    <meta http-equiv="Content-Type" content="text/html; charset= utf-8" />
    
    <script type="text/javascript" src="js/funcoesJs.js"></script>
    
    <link rel="stylesheet" href="menu/css/style.css" media="screen" type="text/css" />
    <link rel="shortcut icon" href="css/imagem/Icone_Empreza.jpg" type="image/x-icon"  />
    
 <script> 
  function resizePage() {
        document.getElementById("resolucao").style.height = (document.body.clientHeight - 100) * 0.9;
        document.getElementById("resolucao").style.width = (document.body.clientWidth - 100) * 0.9;
      }

</script> 

<script type="text/javascript" src="js/jquery2.js"></script>

 <script> 
 /*filtro operador input por turno*/
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_input]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_input.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_input]").html(valor);
					 $teste=$ln['login_operador_input'];	
				  }
                  )
         })
      }) 
 
 
 /*filtro operador auditoria por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_auditoria]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_auditoria.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_auditoria]").html(valor);
					 $teste=$ln['login_operador_auditoria'];	
				  }
                  )
         })
      }) 
 
 /*filtro operador analise por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_analise]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_analise.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_analise]").html(valor);
					 $teste=$ln['login_operador_analise'];	
				  }
                  )
         })
      }) 
 

 /*filtro operador correção por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_correcao]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_correcao.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_correcao]").html(valor);
					 $teste=$ln['login_operador_correcao'];	
				  }
                  )
         })
      }) 
 

 /*filtro operador chamado por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_chamado]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_chamado.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operador_chamado]").html(valor);
           $teste=$ln['login_operador_chamado']; 
          }
                  )
         })
      })


 /*filtro operador form auditoria por turno*/
$(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=login_operador_analise]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_operadores.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=login_operadores]").html(valor);
					 $teste=$ln['login_operadores'];	
				  }
                  )
         })
      }) 
 


     $(document).ready(function(){
         $("select[name=id_filtro2]").change(function(){
            $("select[name=descricao_erro]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa.php", 
                  {id_filtro2:$(this).val()},
                  function(valor){
                     $("select[name=descricao_erro]").html(valor);
					 $teste=$ln['descricao_erro'];	
				  }
                  )
         })
      }) 


</script> 
 

</head>

<body onload="startTime();" class="divctl">
<div id="resolucao">
<fieldset id="fieldset" class="bradius">
<table class="barratopo bradius">
<td width="20%">
<table>
<td class="logo2 bradius"><img src="css/imagem/Logo_Empreza_12.jpg" width="200" height="80" /></td>
</table>
</td>
<td width="80%">
<table class="tablenomehora bradius">
<td class="spannome bradius">Usu&aacute;rio: <?php echo $nome; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setor: <?php echo $menu ?></td>
<td  id="hora" class="spanhora bradius"></td>
</table> 
</td>
</table>

  </fieldset>
  
  
 

  <?php 
  

 include ("menu.php"); 




?>



 <?php

 if(isset($_GET['t'])){
  include("site/{$_GET['t']}");
 }
 
 ?>
 
</div>
</div>
</body>

</html>