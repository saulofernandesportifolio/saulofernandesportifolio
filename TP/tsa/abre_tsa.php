<?php   
@session_start();
include '../funcoes.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../tp/css/padrao.css" rel="stylesheet" style="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<title>E-GTQ - Gestão  Tramite Qualidade</title>

<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
    function valida(element, tipo){
        switch (tipo)
        {
            case 'dateTime':
                regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9] ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/;
                break;
            
            case 'pedido':
                regex = /^1-[0-9]{10}$/;
                break;
            
            case 'date':
                regex = /^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1,3,5,7,8]|1[0,2])|(0[1-9]|[1-2][0-9]|30)\/(0[4,6,9]|11)|(0[1-9]|[1][0-9]|2[0-8])\/(02))\/20[0-1][0-9]$/;
                break;
            case 'text':
                regex = /^(.|\s)+$/;
                break;
        }
        resultado = regex.exec(element.value);
        
        if(!resultado) {
            element.style.backgroundColor = "#FFAA99";
            document.getElementById("bt_enviar").disabled = 1;
        }
        else {
            element.style.backgroundColor = "#FFF";
            document.getElementById("bt_enviar").disabled = 0;
        }
     }
</script>
</head>
<body id="logar">
<?php
	if($_SESSION["tsa"] == 0){  
    	
		echo"
			<script type=\"text/javascript\">
			alert('Você não tem permissão para acessar esta página!');
			document.location.replace('../logout.php');
			</script>
 		";
	}
	
	include("../../tp/conexao.php");

$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$ex_sql=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($ex_sql)){					    
    $login = $dado["login"];
}
//echo $login;

;
?>
  
<div id="principal">

    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <?php 
        $sql="SELECT * FROM base_tsa WHERE codigo = '".$_GET["id"]."';";
        $consulta = mysql_query($sql);

        if(mysql_num_rows($consulta) == 0)
        {
             echo "<script type=\"text/javascript\">
            		alert('Nenhuma TSA encontrada!');
            		document.location.replace('../../tp/tsa/pesquisa_tsa.php');
            		</script>
             		";
        }else
        {
            while ($dado= mysql_fetch_array($consulta))
            {
                $n_monitoria = $dado['n_monitoria'];
                $dt_auditoria = $dado['data_hora_auditoria'];
                $us_cadastro = $dado['us_cadastro'];
                $acao        = $dado['acao'];
                $pedido = $dado['pedido'];
                $q_revisoes = $dado['qtde de revisões'];
                $i_qualidade = $dado['indice qualidade'];
                $operacao = $dado['operacao'];
                $parecer = $dado['parecer auditoria'];
                $erro = $dado['erro'];
                $desc_erro = $dado['descricao do erro'];
                $dt_correcao = $dado['data_correcao'];
                $desc_oferta = $dado['ofertas'];
                $analise_bko = $dado['analise bko'];
                $manifestacao = $dado['manifestacao bko'];
                $ofensor = $dado['operador ofensor'];
                $op_correcao = $dado['us_correcao'];
                $correcao = $dado['necessario correcao'];
                $area_correcao = $dado['area de correcao'];
                $acao_correcao = $dado['acao de correcao'];
                $status_correcao = $dado['status da correcao'];
                $subStatus_correcao = $dado['sub-status da correcao'];
            }
         }
    ?>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">TSA - <?php echo $_SESSION["nome"]; ?>.</p>
                <table id="table_conteudo"  align="center" border="0">
               		<tr>
                        <td id="t_td">Número da monitoria</td>
                        <td colspan="1">
                            <strong><?php echo "$n_monitoria"; ?></strong>
                        </td>
                        <td id="t_td">Usuário cadastro</td>
                        <td >
                            <strong><?php echo "$us_cadastro"; ?></strong>
                        </td>
                	</tr>
                    <tr>
                        <td><br /></td>
                        <td><br /></td>
                    </tr><td colspan='4'><hr /></td>
                    <tr>
                    <td id="t_td" colspan="">Ação:</td>
                        <td colspan="">
                            <strong><?php echo $acao; ?></strong>
                        </td>
                        <td id="t_td" colspan="">DataHora - Auditoria:</td>
                        <td colspan="2">
                            <strong><?php echo transforme_data_hora_dma($dt_auditoria); ?></strong>
                        </td>
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Pedido:</td>
                        <td>
                            <strong><?php echo "$pedido"; ?></strong>
                        </td>
                        <td id="t_td">Quantidade de revisões:</td>
                        <td>
                            <strong><?php echo "$q_revisoes"; ?></strong>                            
                        </td>
                    </tr><td colspan='4'><hr /></td>
                    <tr>
                    	<td id="t_td">Indice de qualidade:</td>	
                    	<td>
                            <strong><?php echo "$i_qualidade"; ?></strong>
                    	</td>
                         <td id="t_td">Operação:</td>	
                    	<td>
                            <strong><?php echo "$operacao"; ?></strong>
                    	</td>
                    </tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td" >Parecer Auditoria:</td>
                        <td colspan="3"	>
                                <strong><?php echo "$parecer"; ?></strong>
                        </td>
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Erro:</td>
                        <td colspan="3">
                            <strong><?php echo "$erro"; ?></strong>
                        </td>
                    </tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Descrição do erro:</td>
                        <td colspan="3">
                            <strong><?php echo "$desc_erro"; ?></strong>
                        </td>
                    </tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Descrição da oferta:</td>
                        <td colspan="3">
                            <strong><?php echo "$desc_oferta"; ?></strong>
                        </td>
                    </tr><td colspan='4'><hr /></td>
               		<tr>
                        <td id="t_td">Análise BKO:</td>
                        <td colspan="3">
                            <strong><?php echo "$analise_bko"; ?></strong>
                        </td>
                        <td></td>
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td" >Manifestação BKO:</td>
                        <td colspan="3"	>
                            <strong><?php echo "$manifestacao"; ?></strong>
                        </td>
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Ofensor:</td>
						<td  colspan="3">
                            <strong><?php echo "$ofensor"; ?></strong>
                    	</td>
                	</tr><td colspan='4'><hr /></td>  
                    <tr>
                        <td id="t_td">Necessário correção:</td>
						<td><strong><?php echo "$correcao"; ?></strong>
                    	</td>
      <?php if($subStatus_correcao == "concluido"){ ?>
                        <td id="t_td">Área da correção:</td>
						<td>
                            <strong><?php echo "$area_correcao"; ?></strong>
                    	</td>
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Ação da correção:</td>
                        <td colspan="3">
                            <strong><?php echo "$acao_correcao"; ?></strong>
                    	</td>                        
                	</tr><td colspan='4'><hr /></td>
                    <tr>
                        <td id="t_td">Status da correção:</td>
                        <td colspan="3">
                            <strong><?php echo "$status_correcao"; ?></strong>
                    	</td>
        <?php }else if($subStatus_correcao == "pendente"){ ?>
                    </tr>
                <form action="tsa_valida_cadastro.php" method="post">
                    <tr>
                        <td id="t_td">Ação da correção</td>
                        <td colspan="3">
                            <textarea  onblur="valida(this, 'text');" name="acao_correcao" id="acao_correcao" cols="56" rows="3"></textarea>
                    	</td>                        
                	</tr>
                    <tr>
                        <td id="t_td">Status da correção</td>
                        <td>
                            <span id="status_correcao">
                    		  <input name="input_status_correcao" type="text" size="25" maxlength="20" class="textbox_padrao" />
                            </span>
                    	</td>
                        <td id="t_td">Área da correção</td>
						<td><span id="spryselect3">
                            <select name="area_correcao" class="combobox_padrao_medio" >
                              <option value="0">Selecione...</option>
                                <?php
                        		 include '../conexao.php';
                                 $sql = "SELECT opcao FROM tp.tsa_menu WHERE indice = 'Área correção';";
                                 $qr = mysql_query($sql) or die(mysql_error());
                                 while($ln = mysql_fetch_assoc($qr)){
                                 echo '<option value="'.$ln['opcao'].'">'.$ln['opcao'].'</option>';
                                 }
                             	 ?>
                            </select>
                            <span class="selectInvalidMsg">Selecione um analista válido.</span></span>
                    	</td>
                        <input type="hidden" name="n_monitoria" value="<?php echo $n_monitoria; ?>" />
                        <input type="hidden" name="tp_acao" value="update" />
                	</tr><td colspan='4'><hr /></td><td colspan='4'><hr /></td>
                    <tr align="center" >
                        <td>
                    		<input type="button" name="Submit2" value="Voltar" onClick="window.location='tsa_pendente.php'" />
                    	</td>
                        <td colspan="2">
                    		<input name="limpar" type="reset" value="Limpar" class="botao_padrao" />
                    	</td>
                        <td>
                    		<input id="bt_enviar" name="enviar" type="submit" value="Enviar" class="botao_padrao" />
                 		</td>
                	</tr>
                </form>
        <?php } ?>
     	  </table>
        </div>
    </div>
</div>
<script type="text/javascript">
new Spry.Widget.ValidationTextField("status_correcao", "custom", 
    {validateOn:["blur", "change"], characterMasking: /[A-Za-z ]/, useCharacterMasking:true, isRequired:false});
</script>
</body>
</html>