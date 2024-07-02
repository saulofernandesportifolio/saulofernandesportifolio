<?php   
@session_start();
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>

<script type="text/javascript" src="../../tp/jquery.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("../../tp/indireto/processa_reversao_ind.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
					 $teste=$ln['motivo'];	
				  }
                  )
         })
      })
</script>


</head>
<body id="logar">

<?php

	if($_SESSION["diretoria_sup"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}

?>
            <div id="conteudo">        
            <form name="formulario" action="" method="post">

<?php

$id1 = $id;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id)
		{
                 $sql_pn = "select * from base_diretoria WHERE id ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id            = $dado["id"];
				 $pedido        = $dado["pedido"];
				 $data_cadastro = $dado["data_cadastro"];
				 $hora_cadastro = $dado["hora_cadastro"];
				 $ofensor       = $dado["ofensor"];
				 $operador      = $dado["operador"];
				 $erro          = $dado["erro"];
				 $motivo_erro   = $dado["motivo_erro"];
				 $remetente     = $dado["remetente"];
				 $diretoria     = $dado["diretoria"];
				 $comentario    = $dado["comentario"];
				 }
		}
		else 
		{
			echo "id diferente";
		}


$data_cadastro = transforme_data_dma2($data_cadastro);


$hora_cadastro = explode(':', $hora_cadastro);
$hora_cadastro = $hora_cadastro[0].':'.$hora_cadastro[1];	


 ?>               
              <table id="table_conteudo"  align="center" border="0">
               		
                    <tr>
                        <td id="t_td" >Pedido/Atividade</td>
                        <td id="t_td" ><?php echo"<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$pedido' class='textbox_padrao'>"; ?></td>
                        
                        <td id="t_td" >Data Cadastro</td>
                      <td id="t_td" ><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$data_cadastro' class='textbox_padrao'>"; ?></td>
                    </tr>
                    
                    <tr>
                        <td id="t_td" >Hora Cadastro</td>
                      <td id="t_td" ><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$hora_cadastro' class='textbox_padrao'>"; ?></td>
                      
                      
                      <td id="t_td" >Ofensor</td>
                        <td id="t_td" ><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$ofensor' class='textbox_padrao'>"; ?></td>
                    </tr>
                    
                    <tr>
                        <td id="t_td" >Comentário:</td>
                        <td colspan="3"	id="t_td"><?php  echo "<textarea name='comentarios' cols='56' rows='10' readonly id='comentarios'> $comentario</textarea>"; ?></td>
                	</tr> 
                    <tr>
                        <td id="t_td" >Operador</td>
						<td colspan="3"><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$operador' class='combobox_padrao_grande'>"; ?></td>
                        </td>
                	</tr>
                    
                    <tr>
                        <td id="t_td" >Tipo do erro</td>
						<td colspan="3"><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$erro' class='combobox_padrao_grande'>"; ?></td>
                        </td>
                	</tr>
                    
                    <tr>
                        <td id="t_td" >Descrição erro</td>
						<td colspan="3"><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$motivo_erro' class='combobox_padrao_grande'>"; ?></td>
                        </td>
                	</tr>
                    
                    <tr>
                        <td id="t_td" >Remetente</td>
						<td id="t_td" ><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$remetente' class='textbox_padrao'>"; ?></td>
                     
                     <td id="t_td" >Diretoria</td>
						<td id="t_td" ><?php  echo "<input name='imputado_por_ultima'id='imputado_por_ultima' type='text'readonly='readonly' value='$diretoria' class='textbox_padrao'>"; ?></td>
                	</tr>
                   <tr>
                   <td><br></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   
                   </tr> 
				<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    	
                 		</td>
                        <td>
                    	
                    	</td>
                        <td>
                        <input type="button" name="Submit2" value="Voltar" class="botao_padrao" onClick="javascript: history.go(-1);">
                      </td>
                    </tr>
           	  </table>
                    
            </form>
        </div>

</body>
</html>