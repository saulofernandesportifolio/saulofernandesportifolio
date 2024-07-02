<?php   
@session_start();
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
</head>
<body id="logar">

<?php

	if($_SESSION["treinamento_sup"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../../tp/logout.php');
			</script>
 		";
	}

?>


<?php
$id1 = $id;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id)
		{
                 $sql_pn = "select * from controle_de_questionamentos WHERE id ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id            = $dado["id"];
				 $comentario    = $dado["comentario"];
				 $destinatario  = $dado["destinatario"];
				 $status        = $dado["status"];
				 $orientador    = $dado["orientador"];
				 $data_cadastro = $dado["data_cadastro"];
				 $hora_cadastro = $dado["hora_cadastro"];
				 $data_conclusao= $dado["data_conclusao"];
				 }
		}
		else 
		{
			echo "Erro id diferente";
		}



$datatransf2 = explode("-",$data_cadastro);
				$data_cadastro = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";

$datatransf2 = explode("-",$data_conclusao);
				$data_conclusao = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";


?>

            <div id="conteudo">        
            <p id="p_padrao">Treinamento -  <?php echo $_SESSION["nome"]; ?>.</p>

              <form name="formulario" action="*" method="post">
                
              <table id="table_conteudo"  align="center" border="0">
               		
                  <tr>
                  <td id="t_td">Comentário</td>
                   <td id="t_td" colspan="3">
                     <label for="comentario"></label>
                     <textarea name="comentario" id="comentario" readonly cols="56" rows="5"><?php echo $comentario; ?></textarea>
                   </td>
                 </tr> 
                   <tr>
                   <td id="t_td">Destinatario</td>
                   <td id="t_td" colspan="3">
                     <label for="destinatario"></label>
                     <input type="text" readonly value="<?php echo $destinatario; ?>" name="destinatario" id="destinatario" class="combobox_padrao_grande">
                    </td>
                   </tr> 
                   <tr>
                   <td id="t_td">Orientador</td>
                   <td id="t_td" colspan="3">
                     <label for="destinatario"></label>
                     <input type="text" readonly value="<?php echo $orientador; ?>" name="destinatario" id="destinatario" class="combobox_padrao_grande">
                    </td>
                   </tr> 
                   
                   <tr>
                   <td id="t_td">Data de cadastro</td>
                   <td id="t_td"><input type="text" readonly value="<?php echo $data_cadastro; ?>" name="destinatario" id="destinatario" class="combobox_padrao">
                   <td id="t_td">Hora de cadastro</td>
                   <td id="t_td"><input type="text" readonly value="<?php echo $hora_cadastro; ?>" name="destinatario" id="destinatario" class="combobox_padrao">
                   </tr>
                   
                   <tr>
                   <td id="t_td">Status</td>
                   <td id="t_td">
                     <input type="text" readonly value="<?php echo $status; ?>" name="destinatario" id="destinatario" class="combobox_padrao">
                    </td>
                    <td id="t_td">Data da conclusão</td>
                   <td id="t_td">
                     <input type="text" readonly value="<?php echo $data_conclusao; ?>" name="destinatario" id="destinatario" class="combobox_padrao">
                    </td>
                    
                </tr>
                   
				<tr align="center" >
                    	<td></td>
                    	<td colspan="1">
                    	
                 		</td>
                        <td>
                    	
                    	</td>
                        <td>
                        <input type="button" name="Submit2" value="Fechar" class="botao_padrao" onClick="javascript:window.close();">
                      </td>
                    </tr>
           	  </table>
                    
            </form>
       </div>

</body>
</html>