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

if(($_SESSION["contestacoes_sup"] != 1)){
        $block =" disabled ";
    }
    else{
        $block ='';
    }
 
function mostraMenu($tipo, $contestacao){
    if(($_SESSION["contestacoes_sup"] != 1)){
        $block =" disabled ";
    }
    else{
        $block ='';
    }
    $cd = $contestacao['cd_'.$tipo];
    $ds = $contestacao['ds_'.$tipo];
    
    if ($tipo == 'operador')
	{
	$sql = "SELECT id,item,validacao FROM cont_$tipo WHERE  validacao IS NULL ORDER BY item";
    $consulta = mysql_query($sql);
    }else{   
       
    $sql = "SELECT id, item FROM cont_$tipo ORDER BY item";
    $consulta = mysql_query($sql);
    }
    echo "<select onblur=\"valida(this,'select')\" id='$tipo' name='$tipo' $block >
            <option value='$cd'>$ds</option>";
    
    while($item = mysql_fetch_assoc($consulta)){
        echo "<option value='".$item['id']."'>".$item['item']."</option>";
    }
    
    echo "</select>";
}

$sql = "SELECT  bc.id_contestacao, 
                bc.n_pedido, 
                bc.revisao, 
                DATE_FORMAT(bc.dt_entrada, '%d/%m/%Y') as dt_entrada, 
                bc.regional, 
                u.nome,
                u.turno,
                bc.cd_adabas, 
                bc.contestacao as cd_contestacao, 
                bc.tp_ofensor as cd_tp_ofensor, 
                bc.dt_retorno, 
                bc.motivo as cd_motivos_erro, 
                bc.sub_motivo as cd_sub_motivos_erro,
                bc.oferta as cd_ofertas,
                bc.analista_atv as cd_operador, 
                bc.tp_pedido as cd_tipo_pedido, 
                bc.reanalize_completa as analise, 
                bc.parecer, 
                bc.texto,
                bc.canal,
                bc.tipo_contestado, 
                cc.item as ds_contestacao, 
                cto.item as ds_tp_ofensor, 
                cop.item as ds_operador, 
                cme.item as ds_motivos_erro,
                csme.item as ds_sub_motivos_erro,
                CASE WHEN cof.item IS NULL THEN 'Sem oferta' ELSE cof.item END as ds_ofertas,  
                ctp.item as ds_tipo_pedido
                FROM base_contestacoes bc LEFT JOIN cont_ofertas cof ON cof.id  = bc.oferta, 
                     cont_qtd_contestacoes cqc,
                     cont_contestacao cc,
                     cont_tp_ofensor cto,
                     cont_operador cop,
                     cont_motivos_erro cme,
                     cont_sub_motivos_erro csme,
                     cont_tipo_pedido ctp,
             usuarios u
                WHERE cqc.id  = bc.qtd_contestacoes
                  AND cc.id   = bc.contestacao 
                  AND cto.id  = bc.tp_ofensor
                  AND cop.id  = bc.usuario_tratamento
                  AND cme.id  = bc.motivo
                  AND csme.id = bc.sub_motivo
                  AND ctp.id  = bc.tp_pedido
          AND u.id    = bc.analista_atv
                  AND id_contestacao  =".$_GET['idc'].";";



$contestacao = mysql_fetch_assoc(mysql_query($sql))or die(mysql_error().$sql);

?>
<div id="principal">
    <div id="menu">
   <?php 
    include("../menu.php") ?>
    </div>
    <div id="caixa" style="height:460px;">
        <div id="conteudo">
            <p id="p_padrao">Contestações - <?php echo $_SESSION["nome"]; ?>.</p>
            <form action="valida_att_contestacao.php" method="post">
            <input <?php echo $block; ?> id="id_contestacao" type="hidden" name="id_contestacao" value="<?php echo $contestacao['id_contestacao']; ?>"/>
            <input type="hidden" name="analista_atv" value="<?php echo $_SESSION["nome"]; ?>"/>
                <table id="table_conteudo"  align="center" border="0">
                    <tr>
                        <td id="t_td">Pedido</td>
                        <td>
                            <span id="pedido">
                                <?php echo $contestacao['n_pedido']; ?><br />
                                <input id="n_pedido" type="hidden" name="n_pedido" value="<?php echo $contestacao['n_pedido']; ?>" <?php echo $block; ?> />
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td" >Data de entrada:</td>
                        <td>
                            <input onblur="valida(this,'date')" id="dt_entrada" name="dt_entrada" value="<?php echo $contestacao['dt_entrada']; ?>" <?php echo $block; ?> />
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
                            <input onblur="valida(this,'int');validaQtdCont();" value="<?php echo $contestacao['revisao']; ?>" id="revisao" name="revisao" size="1" <?php echo $block; ?> />                        
                        </td>
                        <td id="t_td">
                            Cod. Adabas
                        </td>
                        <td id="t_td" >
                            <input onblur="valida(this,'text')" value="<?php echo $contestacao['cd_adabas']; ?>" id="cd_adabas" name="cd_adabas" <?php echo $block; ?> />                        
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
                            Contestação 
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('contestacao', $contestacao);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Ofensor                        
                        </td>
                        <td id="t_td">
                            <?php 
                                mostraMenu('tp_ofensor', $contestacao);
                            ?>                        
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Operador da Reprovação                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php 
                                mostraMenu('operador', $contestacao);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Motivo                       
                        </td>
                        <td id="t_td" colspan="3">
                            <?php
                                mostraMenu('motivos_erro', $contestacao);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">oferta</td>
                        <td colspan="3">
                            <select <?php echo $block; ?> name="ofertas" class="combobox_padrao_grande">
                                <option value="<?php echo $contestacao['cd_ofertas']; ?>"><?php echo $contestacao['ds_ofertas']; ?></option>
                    </tr>
                    <tr>
                        <td id="t_td">Descrição do erro</td>
                        <td colspan="3" class="combobox_padrao_grande">
                            <select <?php echo $block; ?> name="dc_erro" >
                                <option value="<?php echo $contestacao['cd_sub_motivos_erro']; ?>"><?php echo $contestacao['ds_sub_motivos_erro']; ?></option>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Tipo de Pedido                       
                        </td>
                        <td id="t_td">
                            <?php
                                mostraMenu('tipo_pedido', $contestacao);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Pedido foi totalmente reanalizado?                       
                        </td>
                        <td id="t_td">
                            <select <?php echo $block; ?> onblur="valida(this,'select')" id="cont_t_an" name="cont_t_an">
                                <option value='<?php echo $contestacao['analise']; ?>'><?php echo $contestacao['analise']; ?></option>
                                <option value='SIM'>Sim</option>
                                <option value='NAO'>Não</option>
                            </select>
                        </td>
                        
                        
                          <td id="t_td">
                            Canal                       
                        </td>
                        <td id="t_td">
                            <select <?php echo $block; ?> onblur="valida(this,'select')" id="canal" name="canal">
                            <?php if($contestacao['canal'] == ''){?>
                                    <option value='0'>Selecione</option>
                                    <option value='Massivo'>Massivo</option>
                                    <option value='Televendas'>Televendas</option>
                               <?php }?>
                               <?php if( $contestacao['canal'] == 'Massivo' || $contestacao['canal'] == 'Televendas'){?>
                                <option value='Massivo'>Massivo</option>
                                <option value='Televendas'>Televendas</option>
                                <?php }?>
                              
                            </select>
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td id="t_td">
                            Item contestado pela FDV                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" <?php echo $block; ?> onblur="valida(this, 'text')" name="item_fdv" class="combobox_padrao_grande"><?php echo $contestacao['tipo_contestado']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Parecer do colaborador                      
                        </td>
                        <td colspan="3">
                            <textarea rows="5" <?php echo $block; ?> onblur="valida(this, 'text')" name="parecer" class="combobox_padrao_grande"><?php echo $contestacao['parecer']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="t_td">
                            Retorno do e-mail                       
                        </td>
                        <td colspan="3">
                            <textarea rows="5" <?php echo $block; ?> onblur="valida(this, 'text')" name="email" class="combobox_padrao_grande"><?php echo $contestacao['texto']; ?></textarea>
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