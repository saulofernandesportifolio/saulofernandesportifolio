<?php   
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<title>E-GTQ - Gestão  Tramite Qualidade</title>
<link href="../../tp/css/padrao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="fContestacoes.js"></script>
</head>
<body id="logar">
<?php
function mostraMenu($tipo){

    if ($tipo == 'operador')
	{
    $sql = "SELECT id,item,validacao FROM cont_$tipo WHERE  validacao IS NULL ORDER BY item";
    $consulta = mysql_query($sql);
    }else{
        
    $sql = "SELECT id, item FROM cont_$tipo ORDER BY item";
    $consulta = mysql_query($sql);    
    }
    echo "<select onblur=\"valida(this,'select')\" id='$tipo' name='$tipo' >
            <option value=''>Selecione</option>";
    
    while($item = mysql_fetch_assoc($consulta)){
        echo "<option value='".$item['id']."'>".$item['item']."</option>";
    }
    
    echo "</select>";
}
if($_SESSION["contestacoes"] == 0 && $_SESSION["contestacoes_sup"] == 0){    	
    echo"
        <script type=\"text/javascript\">
        alert('Você não tem permissão para acessar esta página!');
        document.location.replace('../logout.php');
        </script>
    ";
}

include("../../tp/conexao.php");
$sql_user="SELECT * FROM usuarios WHERE login = '$login'";
$acao_op=mysql_query($sql_user,$conecta);
while($dado= mysql_fetch_array($acao_op)){					    
    $login = $dado["login"];
}
?>
<div id="principal">
    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">Contestações - <?php echo $_SESSION["nome"]; ?>.</p>
            <form action="valida_cadastro_contestacao.php" method="post">
            <input type="hidden" name="analista_atv" value="<?php echo $_SESSION["nome"]; ?>"/>
                <table id="table_conteudo"  align="center" border="0">
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td>
                            <span id="pedido">
                                <?php echo $_POST['n_pedido']; ?><br />
                                <input id="n_pedido" type="hidden" name="n_pedido" value="<?php echo $_POST['n_pedido']; ?>"/>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td" >Data de entrada:</td>
                        <td>
                            <input onblur="valida(this,'date')" id="dt_entrada" name="dt_entrada" />
                        </td>
                        <td id="t_td"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Revisão                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'int');validaQtdCont();" id="revisao" name="revisao" size="1" />                        
                        </td>
                        <td id="t_td">
                            Cod. Adabas
                        </td>
                        <td id="t_td" >
                            <input  onblur="valida(this,'text')" id="cd_adabas" name="cd_adabas" />                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Regional                        
                        </td>
                        <td id="t_td">
                            <select onblur="valida(this,'select')" id='regional' name='regional' >
                            <option value=''>Selecione</option>
								<optgroup title="SP" label="SP">
                                	<option value="SP">SP</option>
                                </optgroup>
								<optgroup title="CO" label="CO">
                                    <option value="GO">GO</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="DF">DF</option>
                                </optgroup>
                                <optgroup title="Sul" label="Sul">
                                	<option value="PR">PR</option>
                                	<option value="RS">RS</option>
                                	<option value="SC">SC</option>
                                </optgroup>
                                <optgroup title="Nordeste" label="Nordeste">
                                	<option value="AL">AL</option>
                                	<option value="BA">BA</option>
                                	<option value="CE">CE</option>
                                	<option value="MA">MA</option>
                                	<option value="PB">PB</option>
                                	<option value="PE">PE</option>
                                	<option value="PI">PI</option>
                                	<option value="RN">RN</option>
                                	<option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </optgroup>
                                <optgroup title="Norte" label="Norte">
                                	<option value="AC">AC</option>
                                	<option value="AP">AP</option>
                                	<option value="AM">AM</option>
                                	<option value="PA">PA</option>
                                	<option value="RO">RO</option>
                                	<option value="RR">RR</option>	
                                </optgroup>
                                <optgroup title="MG" label="MG">
                                    <option value="MG">MG</option>
                                </optgroup>
                                <optgroup title="Leste" label="Leste">
                                	<option value="ES">ES</option>
                                	<option value="RJ">RJ</option>
                                </optgroup>
                            </select>
                        </td>
                        <td id="t_td">
                            Contestação
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('contestacao');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Ofensor                        
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('tp_ofensor');
                            ?>                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Operador da Reprovação                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php 
                                mostraMenu('operador');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">turno: </td>
                        <td colspan="3">
                            <div id="turno"><text><strong>Selecione o operador...</strong></text></div>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Motivo                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php
                                mostraMenu('motivos_erro');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">oferta</td>
                        <td colspan="3">
                            <select name="ofertas" class="combobox_padrao_grande">
                                <option value="">Selecione...</option>
                    </tr>
                    <tr>
                        <td id="t_td">Descrição do erro</td>
                        <td colspan="3" class="combobox_padrao_grande">
                            <select name="dc_erro" >
                                <option value="">Selecione...</option>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Tipo de Pedido                       
                        </td>
                        <td id="t_td">
                            <?php
                                mostraMenu('tipo_pedido');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Pedido foi totalmente reanalizado?                       
                        </td>
                        <td id="t_td">
                            <select onblur="valida(this,'select')" id="cont_t_an" name="cont_t_an">
                                <option value='0'>Selecione</option>
                                <option value='SIM'>Sim</option>
                                <option value='NAO'>Não</option>
                            </select>
                        </td>
                        
                         <td id="t_td">
                            Canal                       
                        </td>
                        <td id="t_td">
                            <select onblur="valida(this,'select')" id="canal" name="canal">
                                <option value='0'>Selecione</option>
                                <option value='Massivo'>Massivo</option>
                                <option value='Televendas'>Televendas</option>
                            </select>
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td id="t_td">
                            Item contestado pela FDV                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" onblur="valida(this, 'text')" name="item_fdv" class="combobox_padrao_grande"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Parecer do colaborador                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" onblur="valida(this, 'text')" name="parecer" class="combobox_padrao_grande"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Retorno do e-mail                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" onblur="valida(this, 'text')" name="email" class="combobox_padrao_grande"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <button onclick="window.location.assign('http://empreza.absbrasil.com/tp/home.php')"> Voltar </button>
                        </td>
                        <td align="center" colspan="2">
                            <input type="reset" name="reset" value="Limpar dados" />
                        </td>
                        <td align="center">
                            <input type="submit" name="bt_enviar" value="Cadastrar" />
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
</div>
</body>
</html>