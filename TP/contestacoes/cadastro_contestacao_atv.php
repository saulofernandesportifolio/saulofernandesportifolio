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
/*if($_POST['tipodata'] == 3 and $_POST['atividade'] == '' or $_POST['tipodata'] == 3 and $_POST['pedido'] == '')
{
  echo"
        <script type=\"text/javascript\">
        alert('Nesta opção deve estare obrigatorio preencher as informações de atividade e pedido !');
        document.location.replace('../logout.php');
        </script>
    ";    
    
    
}*/


function mostraMenu($tipo){
    
 $sql = "SELECT id, item FROM cont_$tipo  ORDER BY item";
    $consulta = mysql_query($sql);
    
    echo "<select onblur=\"valida(this,'select')\" id='$tipo' name='$tipo' >
            <option value=''>Selecione</option>";
    
    while($item = mysql_fetch_assoc($consulta)){
        echo "<option value='".$item['id']."'>".$item['item']."</option>";
    }
    
    echo "</select>";
 
 }
if($_SESSION["contestacoes_atv"] == 0 && $_SESSION["contestacoes_atv_sup"] == 0){    	
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

/*echo $_POST['atividade'];

echo '<br>';

echo $_POST['pedido'];


echo '<br>';*/

//echo $_POST['tipodata'];

$login = $_SESSION["login"];

?>
<div id="principal">
    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">Contestações - <?php echo $_SESSION["nome"]; ?>.</p>
            <form action="valida_cadastro_contestacao_atv.php" method="post">
            <input type="hidden" name="analista_atv" value="<?php echo $_SESSION["nome"]; ?>"/>
                <table id="table_conteudo"  align="center" border="0">
                    <tr>
                        <td id="t_td">Cotação principal</td>
                        <td>
                            <span id="n_atividade">
                            
                                <?php if(strlen($_POST['n_pesquisa'])<= 10){
                                    
                                    echo $n_atividade=$_POST['n_pesquisa']; 
                                    }
                                    ?><br />
                                
                                <?php
                                if(strlen($_POST['n_pesquisa'])<= 10){ ?>
                               <input onblur="" id="n_atividade" type="hidden" name="n_atividade" value="<?php echo $n_atividade; ?>" />
                              <?php  }
                                else
                                {
                                ?>
                               <input onblur="" id='n_atividade' type="text" name="n_atividade" /> 
                               <?php }  ?>
                            </span>
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
                            Tipo
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('tipo_atividade');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td" >Data de Recebimento:</td>
                        <td>
                       <input  onblur="valida(this,'text');" onkeypress="Formatadata(this,event);" id="data_do_recebimento" name="data_do_recebimento" maxlength="10"/> 
                                              
                        </td>
                        <td id="t_td" >Hora de Recebimento:</td>
                        <td>
                       <input  onblur="valida(this,'text');" onkeypress="Formatahora(this,event);" id="hora_do_recebimento" name="hora_do_recebimento" maxlength="5"/> 
                                              
                        </td>
                        <td id="t_td"></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Remetente
                        </td>
                        <td id="t_td" >
                            <input  onblur="valida(this,'text')" id="remetente" name="remetente" />                        
                        </td>
                        <td id="t_td">
                            Pedido
                        </td>
                        <td id="t_td" >
                        
                        <?php if(strlen($_POST['n_pesquisa']) > 10){ 
                            echo $pedido= $_POST['n_pesquisa']; 
                            }
                            ?><br />
                                            
                            <?php
                                if(strlen($_POST['n_pesquisa']) > 10){ ?>
                               <input onblur=""  id='pedido' type='hidden' name='pedido' value="<?php echo $pedido; ?>" />
                            <?php }
                                else
                                { ?>
                                 <input onblur="" id='pedido' type='text' name='pedido' />    
                            <?php }
                                ?>
                                                   
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Quantidade de linhas                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'int');validaQtdCont();" id="qtd_linhas" name="qtd_linhas" size="1" />                        
                        </td>
                   
                          <td id="t_td">
                            Cotação filha                      
                        </td>
                        <td id="t_td">
                            <input onblur="" id="cotacao" name="cotacao" />                        
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
                            <input  onblur="valida(this,'text')" id="cd_adabas" name="adabas" />                        
                        </td>
                    </tr>
                    <tr>
                       <td id="t_td">
                            Cliente
                        </td>
                        <td id="t_td" colspan="4" >
                            <input  onblur="valida(this,'text')" id="cliente" name="cliente" class="textbox_padrao_razaosocial" />                        
                        </td>
                    
                    </tr>
                    
                    <tr>
                        <td id="t_td">
                            Cnpj                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'cnpj');validaQtdCont();" id="cnpj" name="cnpj" />                        
                        </td>
                     
                          <td id="t_td" >Criado em:</td>
                        <td>
                            <input onblur="valida(this,'date')" onkeypress="Formatadata(this,event);" id="criado_em" name="criado_em"  maxlength="10" />
                        </td>
                        <td id="t_td"></td>
                        <td>
                        </td>
                    </tr>
                        <tr>
                        <td id="t_td">
                            Inicio da Tratativa                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'date');" onkeypress="Formatadata(this,event);" id="inicio_da_tratativa" name="inicio_da_tratativa" maxlength="10" />                        
                        </td>
                        <td id="t_td">
                            Data Retorno
                        </td>
                        <td id="t_td" >
                            <input  onblur="" onkeypress="DataHora(event,this);" id="data_retorno" name="data_retorno" maxlength="19"/>                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Ofensor                        
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('tp_ofensor_input');
                            ?>                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Operador da Reprovação                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php 
                                mostraMenu('operador_input');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">turno: </td>
                        <td colspan="3">
                            <div id="turno"><strong>Selecione o operador...</strong></div>
                    </tr>
                       <tr>
                    <td id="t_td">
                         Tipo2                       
                        </td>
                    <td colspan="3" class="combobox_padrao_grande">
                            <select name="motivos_erro_input"  onblur="valida(this,'select')">
                                <option value="">Selecione</option>
                    </tr>
                               
                    <tr>
                        <td id="t_td">Tipo Apurado</td>
                        <td colspan="3" class="combobox_padrao_grande">
                            <select name="dc_erro"  onblur="valida(this,'select')">
                                <option value="">Selecione</option>
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
                            <textarea rows="5" onblur="valida(this, 'text')" name="email" class="combobox_padrao_grande" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <button onclick="window.location.assign('../../tp/contestacoes/pesquisa_contestacoes_atv.php')"> Voltar </button>
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