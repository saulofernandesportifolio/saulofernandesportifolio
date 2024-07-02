<?php
include("../fixa/bd.php");
$data_cadastro=date("d-m-y H:i:s");
require_once '../fixa/site/classes/Chamados.php';
?>
<?php
//parametros
$protocolo       = $_POST['protocolo_chamado'];
$usuario_chamado = $_POST['usuario_chamado'];
$revisao         = $_POST['revisao'];
$situacao        = $_POST['situacao'];
$nro_chamado     = $_POST['nro_chamado'];

?>
<?php
 if($situacao == "Ag. TI")
 {
    //cria objeto do chamado ja preenchido
    $chamadoExistente = new Chamados();
    $chamadoExistente = $chamadoExistente->buscaChamadoExistente($chamadoExistente, $protocolo, $nro_chamado, $revisao);
 }
 else if($situacao == "Devolvido para Pré-Tramitação")
{
    require_once 'v_chamados_historico.php';
}
?>

<body onload="carregaHistoricoComentarios('<?php echo $nro_chamado ?>', '<?php echo $protocolo ?>', '<?php echo $revisao?>');">
<div id="div_form_chamados" class="bradius wrapper" style="margin-right: 42%;">
    <form 
        action="principal.php?t=controles/sql_form_chamados.php" 
        method="POST"
    >
        <fieldset id="fieldset_style" style="width: 120%;">
            <h2>Chamados</h2> 
            <table id="form_chamados">
                <input type="hidden" value="<?php echo $protocolo; ?>" name="protocolo" id="protocolo"></input>
                <input type="hidden" value="<?php echo $usuario_chamado;?>" name="usuario_chamado" id="usuario_chamado"></input>
                <input type="hidden" value="<?php echo $data_cadastro;?>" name="data_cadastro" id="data_cadastro"></input>
                <input type="hidden" value="<?php echo $revisao;?>" name="revisao" id="revisao"></input>
                <input type="hidden" value="<?php echo $situacao;?>" name="situacao" id="situacao"></input>
                <input type="hidden" value="<?php echo $nro_chamado;?>" name="nro_chamado" id="nro_chamado"></input>
                <tr>
                    <td>
                        <div class="div_forms">
                            <label>Protocolo da solicitação</label>
                            <input 
                                type="text"
                                id="protocolo_solicitacao_chamados"
                                name="protocolo_solicitacao_chamados"
                                class="campos_desabilitados" 
                                required
                                value= "<?php echo $protocolo;?>"
                                disabled="true"
                            >
                        </div>
                    </td>
                    <td>
                        <div class="div_forms">
                            <label>Data</label>
                            <input 
                                type="text"
                                id="data_solicitacao"
                                name="data_solicitacao"
                                class="campos_desabilitados" 
                                onblur = "validaData(this)";
                                required
                                value= "<?php echo $data_cadastro;?>"
                                disabled="true"
                            >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="div_forms">
                            <?php if($situacao == "Pendente de Ação"){?>
                            <label>Status*</label>
                            <select 
                                name="status_solicitacao" 
                                id="status_solicitacao_chamados" 
                                class="txt2comboboxpadraoChamados bradius"
                                required
                                onchange="atualizaCamposChamado(this);" 
                                >
                                <option></option>
                                <?php 
                                                                   
                                    $statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(16,17)");
                            
                                    while($rowss=mysql_fetch_array($statuss)){
                                         
                                ?>
                                <option value="<?php echo $rowss['id_status_solicitacao']; ?>">
                                    <?php echo $rowss['descricao']; ?>
                                </option>
                                <?php 
                                    }
                                ?>
                            </select>
                            <?php }else if($situacao == "Ag. TI"){?>
                                <label>Status*</label>
                                <select 
                                    name="status_solicitacao" 
                                    id="status_solicitacao_chamados" 
                                    class="campos_desabilitados bradius"
                                    required
                                    >
                                    <?php 
                                                                       
                                       $statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN($chamadoExistente->status)");
                                
                                        while($rowss=mysql_fetch_array($statuss)){
                                             
                                    ?>
                                    <option value="<?php echo $rowss['id_status_solicitacao']; ?>">
                                        <?php echo $rowss['descricao']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                             <?php }?>
                        </div>
                    </td>
                    <td>
                        <div class="div_forms">
                            <label>Nº Chamado*</label>
                             <?php if($situacao == "Pendente de Ação"){?>
                             <input 
                                type="text"
                                id="numero_chamado"
                                name="numero_chamado"
                                required
                                class="txt2comboboxpadraoChamados" 
                            >
                             <?php }else if($situacao == "Ag. TI"){?>
                             <input 
                                type="text"
                                id="numero_chamado"
                                name="numero_chamado"
                                class="campos_desabilitados"
                                value="<?php echo $chamadoExistente->nro_chamado?>"
                                disabled 
                            >
                             <?php } ?>
                        </div>
                    </td>         
                </tr>
                <tr>
                    <td>
                        <div class="div_forms">
                            <label>Sistema*</label>
                            <?php if($situacao == "Pendente de Ação"){?>
                             <select 
                                name="sistema_chamado" 
                                id="sistema_chamado"  
                                class="txt2comboboxpadraoChamados bradius"
                                required
                                style="margin-right: 3px;"
                                >
                                <option></option>
                                <option value="REMEDY">REMEDY</option>
                                <option value="REQ">REQ</option>
                            </select>
                            <?php }else if($situacao == "Ag. TI"){?>
                            <select 
                                name="sistema_chamado" 
                                id="sistema_chamado"  
                                class="campos_desabilitados"
                                style="margin-right: 3px;"
                                >
                                <option value="<?php echo $chamadoExistente->sistema?>"><?php echo $chamadoExistente->sistema?></option>
                            </select>
                            <?php }?>
                        </div>
                    </td>  
                    <td>
                        <div class="div_forms">
                            <label>Área devolução</label>
                            <select name="area_devolucao_chamado" id="area_devolucao_chamado" class="campos_desabilitados" required="true">
                                <option value="Sistemas">SISTEMAS</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                     <td>
                        <div class="div_forms">
                            <label>Motivo devolução</label>
                             <?php if($situacao == "Pendente de Ação"){?>
                            <select 
                                name="motivo_devolucao_chamado" 
                                id="motivo_devolucao_chamado" 
                                class="txt2comboboxpadraoChamados bradius"
                                onchange="atualizaDescricaoMotivoDevolucaoChamados(this);" 
                                required="true" 
                                >
                                <option></option>
                                <option value="REMEDY">REMEDY</option>
                                <option value="PROBLEMAS NO CATALOGO DO VANTIVE">PROBLEMAS NO CATALOGO DO VANTIVE</option>
                            </select>
                             <?php }else if($situacao == "Ag. TI"){?>
                             <select 
                                name="motivo_devolucao_chamado" 
                                id="motivo_devolucao_chamado" 
                                class="campos_desabilitados"
                                required="true" 
                                >
                                <option value="<?php echo $chamadoExistente->motivo_devolucao?>"><?php echo $chamadoExistente->motivo_devolucao?></option>
                            </select>
                             <?php } ?>
                        </div>
                    </td>
                     <td>
                        <div class="div_forms">
                            <label>Descrição motivo devolução</label>
                            <?php if($situacao == "Pendente de Ação"){?>
                            <select 
                                name="descricao_motivo_devolucao_chamados" 
                                id="descricao_motivo_devolucao_chamados" 
                                class="txt2comboboxpadraoChamados bradius"
                                required="true" 
                                >
                            </select>
                            <?php }else if($situacao == "Ag. TI"){?>
                            <select 
                                name="descricao_motivo_devolucao_chamados" 
                                id="descricao_motivo_devolucao_chamados" 
                                class="campos_desabilitados"
                                required="true" 
                                >
                               <option value="<?php echo $chamadoExistente->descricao_motivo_devolucao?>"><?php echo $chamadoExistente->descricao_motivo_devolucao?></option>
                            </select>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="div_forms">
                            <label>Observações</label>
                            <?php if($situacao == "Pendente de Ação"){?>
                            <input 
                                type="text" 
                                id="obs"  
                                class="txt2comboboxpadraoChamados" 
                                name="obs"
                            />
                             <?php }else if($situacao == "Ag. TI"){?>
                              <input 
                                type="text" 
                                id="obs"  
                                class="campos_desabilitados" 
                                name="obs"
                                value="<?php echo $chamadoExistente->obs?>" 
                                disabled
                            />
                            <?php } ?> 
                        </div>
                    </td>
                </tr>
                <?php if($situacao == "Pendente de Ação"){?>
                <tr>
                    <td id="comentario_chamado_input">
                        <div class="div_forms">
                            <label>Comentário</label>
                            <input type="text"  name="comentario_chamado"/>
                        </div>
                    </td>      
                </tr>
                <?php }?>
                <?php if($situacao == "Ag. TI"){?>
                    <tr></tr>
                    <tr> 
                         <td>
                            <div class="div_forms">
                                <label>Data Retorno TI</label>
                                <input 
                                    type="text" 
                                    id="dataRetornoTI"  
                                    class="txt2comboboxpadraoChamados campoData" 
                                    name="dataRetornoTI"
                                    onblur = "validaData(this)";
                                    required 
                                /> 
                            </div>
                        </td>      
                        <td>
                            <div class="div_forms">
                                <label>Parecer TI</label>
                                <input 
                                    type="text" 
                                    id="parecerTI"  
                                    class="txt2comboboxpadraoChamados" 
                                    name="parecerTI"
                                    required 
                                /> 
                            </div>
                        </td>     
                    </tr>
                    <tr>
                        <td>
                            <div class="div_forms">
                                <label>Status*</label>
                                <select 
                                    name="status_solicitacao_retorno" 
                                    id="status_solicitacao_retorno" 
                                    class="txt2comboboxpadraoChamados bradius"
                                    required
                                    
                                    >
                                    <option></option>
                                    <?php 
                                        
                                        
                                        $statuss=mysql_query("SELECT * FROM status_solicitacao WHERE id_status_solicitacao IN(16,17)");
                                        

                                        while($rowss=mysql_fetch_array($statuss)){
                                             
                                    ?>
                                    <option value="<?php echo $rowss['id_status_solicitacao']; ?>">
                                        <?php echo $rowss['descricao']; ?>
                                    </option>
                                    <?php 
                                        }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <?php }?>    
            </table>
            <br/>
            <input name="bt_enviar_form" id="bt_enviar_form" type="submit" value="Salvar" class="sb2 bradius" />
            <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" id="cancelar" onclick="history.back();" />
        </fieldset>
    </form>
</div>
</body>
