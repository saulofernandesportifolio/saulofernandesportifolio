<?php   
@session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body id="logar">

<?php
	if($_SESSION["supervisor_gestao"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
?>
  
<?php 

$id1 = $id_gestao;

//Pesquisa e retorna os campos declarado nas variáveis.
        include("../conexao.php");
		
		if($id1 = $id_gestao)
		{
                 $sql_pn = "select * from base_gestao WHERE id_gestao ='$id1'";
		         $result = mysql_query($sql_pn,$conecta);
				 while ($dado= mysql_fetch_array($result))
		         {
		         $id_gestao 		= $dado["id_gestao"];
		         $regional  		= $dado["regional"];
		         $pedido    		= $dado["pedido"];
				 $revisao   		= $dado["revisao"];
				 $canal     		= $dado["canal"];
				 $codigo_adabas 	= $dado["codigo_adabas"];
				 $cliente   		= $dado["cliente"];
				 $status_do_cliente = $dado["status_do_cliente"];
				 $acao 				= $dado["acao"];
				 $status 			= $dado["status"];
				 $email				= $dado["email_do_cliente"];
				 $gc 				= $dado["gc"];
				 $login_gestao		= $dado["login_gestao"];
				 $senha 			= $dado["senha"];
				 $comentario 		= $dado["comentario"];
				 $data_cadastro 	= $dado["termino_efetivo"];
				 }
		}
		else 
		{
			echo "id diferente";
		}
   
	$data_cadastro = explode('-', $data_cadastro);
	$data_cad = $data_cadastro[2].'/'.$data_cadastro[1].'/'.$data_cadastro[0];

 ?>  
  

    
        <div id="conteudo" >
        
            <p id="p_padrao">Gestão - Operador : <?php echo $_SESSION["nome"]; ?>.</p>
            
            <form action="gestao_update_cadastro.php" method="post">
                <table id="table_conteudo"  align="center" border="0">
               	 
              <tr>
              <td id="t_td">Pedido</td><td>
              <?php echo $pedido ?>
              <td id="t_td">Regional</td><td>
              <?php echo $regional ?>
		      </td>
              </tr>
                           
              <tr>
              <td id="t_td">Revisão</td>
              <td id="t_td"><?php echo $revisao ?></td>
              <td id="t_td">Canal</td>
              <td id="t_td"><?php echo $canal ?></td>
              </tr>
             
             <tr>
             <td id="t_td">Adabas</td>
             <td id="t_td"><?php echo $codigo_adabas ?></td>
             <td id="t_td">Cliente</td>
             <td id="t_td"><?php echo $cliente ?></td>
             </tr>
             
             <tr>
             <td id="t_td">Status Cliente</td>
             <td id="t_td"><?php echo $status_do_cliente ?></td>
             <td id="t_td">termino</td>
             <td id="t_td"><?php echo $data_cad ?></td>
             </tr>
              
             <tr>
             <td id="t_td">Ação</td>
             <td id="t_td"><?php echo $acao ?></td>
             <td id="t_td">Status</td>
             <td id="t_td"><?php echo $status ?></td>
             </tr>
             
             <tr>
             <td id="t_td">E-Mail</td>
             <td id="t_td">
			 <?php 
			 if ($email == ''){
                echo "<input name='email' type='text'  class='input' maxlength='1010'>";
			   }else echo "<input name='email' type='text' readonly='readonly' class='input' value='$email' maxlength='10'>";
			?>
             </td>             
             <td id="t_td">GC</td>
             <td id="t_td"><?php echo $gc ?></td>
             </tr>
             
             
             <tr>	
             <td id="t_td">Login</td>
             <td id="t_td">
			 <?php 
			if ($login_gestao == ''){
               echo "<input name='login_gestao' type='text'  class='input'>";
			   }else echo "<input name='login_gestao' type='text' readonly='readonly' class='input' value='$login_gestao' maxlength='10'>";
					   ?>
             </td>
             <td id="t_td">Senha</td>
             <td id="t_td">
			 <?php 
			 if ($senha == ''){
                echo "<input name='senha' type='text'  class='input' maxlength='10'>";
			    }else echo "<input name='senha' type='text' readonly='readonly' class='input' value='$senha' maxlength='10'>";
					   ?>
             </td>
             </tr>
             
             <tr>
             <td id="t_td" >Comentário</td>
             <td colspan="3"	>
			<textarea name="comentario_antigo" readonly readonlycols="56" style="width:470" rows="3">
			<?php echo $comentario; ?>
            </textarea>
            </td>
            </tr>
            
            <tr>
            <td id="t_td" >Novo Comentário</td>
            <td colspan="3"	>
            
  			<label for="text1"></label>
 			<input type="text" style='width:470' name="comentario_novo" id="comentario_novo">
 			
            </td>
           	</tr>
                        
            <tr>
            <td id="t_td">Status</td>
            <td>
            <select name="status_tp" class="combo_padrao" >
            <option value="2">Pendente</option>
            <option value="3">Corrigido</option>
            </select>
            </td>
            </tr>
            
           <tr>
           <td><br></td>
           <td><input name="id1" style="visibility:hidden" type="text"  class="input" value="<?php echo "$id1" ?>" maxlength="10">
           </td>
           </tr>
                	
           <tr align="center" >
           <td></td>
           <td colspan="1">
           <input name="salvar" type="button" value="Voltar" onClick="window.history.go(-1)" class="botao_padrao" >
           </td><td>
          <input name="limpar" type="reset" value="Limpar" class="botao_padrao">
          </td><td><?php $login = $_SESSION["login"]; $nome = $_SESSION["nome"];?></td>
          </tr>
          </table>
          
          <?php "$id1" ?>
          </form>
        
        </div>
        

</body>
</html>