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

include("../../tp/conexao.php");

if(($_SESSION["contestacoes_atv_sup"] != 1 && $_SESSION["contestacoes_atv"] != 1)){
        $block =" disabled ";
    }
    else{
        $block ='';
    }
 
function mostraMenu($tipo, $contestacao){
    if(($_SESSION["contestacoes_atv_sup"] != 1 && $_SESSION["contestacoes_atv"] != 1)){
        $block =" disabled ";
    }
    else{
        $block ='';
    }
    $cd = $contestacao['cd_'.$tipo];
    $ds = $contestacao['ds_'.$tipo];
    $sql = "SELECT id, item FROM cont_$tipo ORDER BY item ASC";
    $consulta = mysql_query($sql);
    
    echo "<select onblur=\"valida(this,'select')\" id='$tipo' name='$tipo' $block >
            <option value='$cd'>$ds</option>";
    
    while($item = mysql_fetch_assoc($consulta)){
        echo "<option value='".$item['id']."'>".$item['item']."</option>";
    }
    
    echo "</select>";
}

 $sql = "SELECT  bc.id_contestacao_atv, 
                bc.n_atividade,
                bc.n_pedido,
                bc.cotacao, 
                bc.revisao,
                bc.remetente,
                bc.qtd_linhas,
                DATE_FORMAT(bc.criado_em, '%d/%m/%Y') as criado_em,
                DATE_FORMAT(bc.data_do_recebimento, '%d/%m/%Y') as data_do_recebimento,
                bc.hora_do_recebimento,
                DATE_FORMAT(bc.data_retorno, '%d/%m/%Y %H:%i%:%s') as data_retorno,
                DATE_FORMAT(bc.inicio_da_tratativa, '%d/%m/%Y') as inicio_da_tratativa,
                bc.tmt,
                bc.cliente,
                bc.cnpj, 
                bc.regional, 
                bc.tipo as cd_tipo_atividade,
                u.nome,
                u.turno,
                cop.turno as ds_turno,
                bc.adabas, 
                bc.ofensor as cd_tp_ofensor_input, 
                bc.tipo as cd_motivos_erro_input, 
                bc.tipo2 as cd_sub_motivos_erro_input,
                bc.analista as cd_operador_input,
                bc.analista_contestacao, 
                bc.tipo_contestado_FDV, 
                bc.observacoes_colaborador,
                bc.retorno_do_email,
                tpa.item as ds_tipo_atividade,
                cto.item as ds_tp_ofensor_input, 
                cop.item as ds_operador_input, 
                cme.item as ds_motivos_erro_input,
                csme.item as ds_sub_motivos_erro_input
                FROM base_contestacoes_atividades bc,
                     cont_tp_ofensor_input cto,
                     cont_operador_input cop,
                     cont_motivos_erro_input cme,
                     cont_sub_motivos_erro_input csme,
                     cont_tipo_atividade tpa,
                     usuarios u
                WHERE cto.id  = bc.ofensor
                  AND cop.id  = bc.analista
                  AND cme.id  = bc.tipo
                  AND csme.id = bc.tipo2
                  AND u.id    = bc.analista_contestacao
                  AND id_contestacao_atv  =".$_GET['idv'].";";
             

$contestacao = mysql_fetch_assoc(mysql_query($sql))or die(mysql_error().$sql);


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
            <form name="form1" action="valida_att_contestacao_atv.php" method="post" onsubmit="return enviardados();" >
            <input <?php echo $block; ?> id="id_contestacao_atv" type="hidden" name="id_contestacao_atv" value="<?php echo $contestacao['id_contestacao_atv']; ?>"/>
            <input type="hidden" name="analista_atv" value="<?php echo $_SESSION["nome"]; ?>"/>
                <table id="table_conteudo"  align="center" border="0">
                    <tr>
                        <td id="t_td">Cotação principal</td>
                        <td>
                            <span id="n_atividade">
                                <?php                                 
                                    if($contestacao['n_atividade']!=''){
                                    echo $contestacao['n_atividade'];
                                 ?><br />
                                <input id="n_atividade" type="hidden" name="n_atividade" value="<?php echo $contestacao['n_atividade']; ?>" <?php echo $block; ?> />
                            <?php }
                                else
                                { ?>
                                 <input onblur="" id='n_atividade' type='text' name='n_atividade' />    
                            <?php }
                                ?>
                            
                            
                            </span>
                        </td>
                    </tr>
                   
                   
                    <tr>
                        <td id="t_td">
                            Regional                        
                        </td>
                        <td id="t_td">
                            <select onblur="valida(this,'select')" id='regional' name='regional' <?php echo $block; ?> >
                            <option value='<?php echo $contestacao['regional']; ?>'><?php echo $contestacao['regional']; ?></option>
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
                                <optgroup title="Leste" label="Leste" >
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
                                mostraMenu('tipo_atividade',$contestacao);
                            ?>
                        </td>
                    </tr>
                     <tr>
                        <td id="t_td" >Data do recebimento:</td>
                        <td>
                            <input onblur="valida(this,'text');" onkeypress="Formatadata(this,event);"  id="data_do_recebimento" name="data_do_recebimento" value="<?php echo $contestacao['data_do_recebimento']; ?>" <?php echo $block; ?> />
                        </td>
                         <td id="t_td" >Hora do recebimento:</td>
                        <td>
                            <input onblur="valida(this,'text');" onkeypress="Formatahora(this,event);"  id="hora_do_recebimento" name="hora_do_recebimento" value="<?php echo $contestacao['hora_do_recebimento']; ?>" <?php echo $block; ?> />
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
                            <input  onblur="valida(this,'text')" id="remetente" name="remetente" value="<?php echo $contestacao['remetente']; ?>" <?php echo $block; ?> />                        
                        </td>
                        <td id="t_td">Pedido</td>
                        <td>
                            <span id="n_pedido">
                            
                             <?php
                                 
                                if($contestacao['n_pedido']!=''){
                                    echo $contestacao['n_pedido'];?>
                                
                               <input id="pedido" type="hidden" name="pedido" value="<?php echo $contestacao['n_pedido']; ?>" <?php echo $block; ?> />
                            <?php }
                                else
                                { ?>
                                 <input onblur="" id='pedido' type='text' name='pedido' />    
                            <?php }
                                ?>
                            
                      
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td id="t_td">
                            Quantidade de linhas                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'int');validaQtdCont();" id="qtd_linhas" name="qtd_linhas" size="1" value="<?php echo $contestacao['qtd_linhas']; ?>" <?php echo $block; ?> />                        
                        </td>
                        
                           <td id="t_td">
                            Cotação filha                      
                        </td>
                        <td id="t_td">
                         <?php
                                 
                                if($contestacao['cotacao']!=''){
                                    echo $contestacao['cotacao'];?>
                            <input onblur="" id="cotacao" name="cotacao"  value="<?php echo $contestacao['cotacao']; ?>" <?php echo $block; ?> />                        
                          <?php }
                                else
                                { ?>
                                 <input onblur="" id='cotacao' type='text' name='cotacao' />    
                            <?php }
                                ?>
                        
                        </td>
                      
                      
                    </tr>
                     <tr>
                        <td id="t_td">
                            Revisão                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'int');validaQtdCont();" value="<?php echo $contestacao['revisao']; ?>" id="revisao" name="revisao" size="1" <?php echo $block; ?> />                        
                        </td>
                        <td id="t_td">
                            Cod. Adabas
                        </td>
                        <td id="t_td" >
                            <input onblur="valida(this,'text')" value="<?php echo $contestacao['adabas']; ?>" id="cd_adabas" name="adabas" <?php echo $block; ?> />                        
                        </td>
                    </tr>
                    
                       <tr>
                        <td id="t_td">
                            Cliente
                        </td>
                        <td id="t_td" colspan="3">
                            <input  onblur="valida(this,'text')" id="cliente" name="cliente" class="textbox_padrao_razaosocial" value="<?php echo $contestacao['cliente']; ?>" <?php echo $block; ?>/>                        
                        </td>
                    </tr>
                    
                    <tr>
                        <td id="t_td">
                            Cnpj                        
                        </td>
                        <td id="t_td">
                            <input onblur="valida(this,'cnpj');validaQtdCont();" id="cnpj" name="cnpj" value="<?php echo $contestacao['cnpj']; ?>" <?php echo $block; ?> />                        
                        </td>
                          <td id="t_td" >Criado em:</td>
                        <td>
                            <input onblur="valida(this,'date')" onkeypress="Formatadata(this,event);" id="criado_em" name="criado_em"  maxlength="10" value="<?php echo $contestacao['criado_em']; ?>" <?php echo $block; ?>/>
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
                            <input onblur="valida(this,'date');" onkeypress="Formatadata(this,event);" id="inicio_da_tratativa" name="inicio_da_tratativa" maxlength="10" value="<?php echo $contestacao['inicio_da_tratativa']; ?>" <?php echo $block; ?> />                        
                        </td>
                        <td id="t_td">
                            Data Retorno
                        </td>
                        <td id="t_td" >
                            <input  onblur="valida(this,'text');" onkeypress="DataHora(event,this);" id="data_retorno" name="data_retorno" maxlength="19" value="<?php echo $contestacao['data_retorno']; ?>" <?php echo $block; ?> />                        
                        </td>
                    </tr>
                    
                    <tr>
                        <td id="t_td">
                            Ofensor                        
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('tp_ofensor_input', $contestacao);
                            ?>                        
                        </td>
                          <td id="t_td">
                            <b>TMT</b>
                        </td>
                        <td id="t_td" >
                         <b><?php echo $contestacao['tmt']; ?><?php echo $block; ?></b>                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Operador da Reprovação                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php 
                                mostraMenu('operador_input', $contestacao);
                            ?>
                        </td>
                    </tr>
                    
                       <tr>
                        <td id="t_td">turno: </td>
                        <td colspan="3">
                            <div id="turno"><?php echo $contestacao['ds_turno']; ?></div>
                            
                    </tr>
                    
                    <tr>
                        <td id="t_td">
                            Tipo2                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php
                                mostraMenu('motivos_erro_input', $contestacao);
                            ?>
                        </td>
                    </tr>
                    
                                      
                    <tr>
                        <td id="t_td">Tipo Apurado</td>
                        <td colspan="3" class="combobox_padrao_grande">
                            <select <?php echo $block; ?> name="dc_erro" >
                                <option value="<?php echo $contestacao['cd_sub_motivos_erro_input']; ?>"><?php echo $contestacao['ds_sub_motivos_erro_input']; ?></option>
                    </tr>
                 
                      <tr>
                        <td id="t_td">
                            Item contestado pela FDV                       
                        </td>
                        <td colspan="3">
                            <input <?php echo $block; ?>  onblur="valida(this, 'text')" id="item_fdv2"  name="item_fdv2" class="combobox_padrao_grande"/>
                        </td>
                    </tr>
                 
                     <tr>
                        <td id="t_td">
                            FDV Historico                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" <?php echo $block; ?> style="background-color: #EBEBEB;" onblur="valida(this, 'text')" readonly="" name="item_fdv" class="combobox_padrao_grande"><?php echo $contestacao['tipo_contestado_FDV']; ?></textarea>
                        </td>
                    </tr>
                       <tr>
                        <td id="t_td">
                            Parecer do colaborador                      
                        </td>
                        <td colspan="3">
                            <input <?php echo $block; ?>  onblur="valida(this, 'text')" id="parecer2"  name="parecer2" class="combobox_padrao_grande" />
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Parecer Historico                      
                        </td>
                        <td colspan="3">
                            <textarea rows="5" <?php echo $block; ?> style="background-color: #EBEBEB;" onblur="valida(this, 'text')" readonly="" name="parecer" class="combobox_padrao_grande"><?php echo $contestacao['observacoes_colaborador']; ?></textarea>
                        </td>
                    </tr>
                      <tr>
                        <td id="t_td">
                            Retorno do e-mail                       
                        </td>
                        <td colspan="3">
                            <input <?php echo $block; ?> onblur="valida(this, 'text')"  id="email2" name="email2" class="combobox_padrao_grande"/>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Retorno Historico                      
                        </td>
                        <td colspan="3">
                            <textarea style="background-color: #EBEBEB;" rows="5" <?php echo $block; ?> onblur="valida(this, 'text')" readonly="" name="email" class="combobox_padrao_grande"><?php echo $contestacao['retorno_do_email']; ?></textarea>
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
                            <input <?php echo $block; ?> type="submit" name="bt_enviar"  value="Atualizar" />
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
</div>
</body>
</html>