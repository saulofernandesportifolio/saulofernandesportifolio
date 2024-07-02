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
            <div id="conteudo">        
            <form name="formulario" action="" method="post">

<?php

$id1 = $id;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id)
		{
                 $sql_pn = "select * from plano_de_acao WHERE id ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id            = $dado["id"];
				 $atividade     = $dado["atividade"];
				 $data_cadastro = $dado["data_cadastro"];
				 $comentario    = $dado["comentario"];
				 $operador      = $dado["operador"];
				 $parecer       = $dado["parecer"];
				 $reincidente   = $dado["reincidente"];
				 $ilha_bko      = $dado["ilha_bko"];
				 $data_cadastro = $dado["data_cadastro"];
				 $hora_cadastro = $dado["hora_cadastro"];
				 $orientador    = $dado["orientador"];
				 }
		}
		else 
		{
			echo "id diferente";
		}



$datatransf2 = explode("-",$data_cadastro);
				$data_cadastro = "$datatransf2[2]/$datatransf2[1]/$datatransf2[0]";


 ?>               
           <table id="table_conteudo"  align="center" border="0">
               		
                    <tr>
                        <td id="t_td">Ilha/BKO</td>
                        <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $ilha_bko ?>"></td>
                        
                      <td id="t_td">Parecer/assimilação</td>
                          <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $parecer ?>">
                            </td>
				</tr>
                   <td id="t_td">Comentário</td>
                   <td id="t_td" colspan="3"><textarea name="COMENTARIO" cols="58" rows="5" readonly>	<?php echo $comentario ?></textarea></td>
                   </tr> 
                   </tr>
                   <td id="t_td">Operador</td>
                   <td id="t_td" colspan="3"><input name="ilha" type="text" readonly class="combobox_padrao_grande" value="<?php echo $operador ?>"></td>
                   </tr> 
                   <tr>
                   <td id="t_td">Reincidente</td>
                   <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $reincidente ?>"></td>
                     <td id="t_td">Atividade</td>
                     <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $atividade ?>"></td>
                   </tr>
                   
                   <tr>
                   <td id="t_td">Orientador</td>
                   <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $orientador ?>"></td>
                     <td id="t_td">Data Cadastro</td>
                     <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $data_cadastro ?>"></td>
                   </tr>
                   
                   <tr>
                   <td id="t_td">Hora Cadastro</td>
                   <td id="t_td"><input name="ilha" type="text" readonly class="textbox_padrao" value="<?php echo $hora_cadastro ?>"></td>
                     <td id="t_td"></td>
                     <td id="t_td"></td>
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