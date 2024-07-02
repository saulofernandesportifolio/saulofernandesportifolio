
<link rel="StyleSheet" href="../../css/padrao.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../js/funcoesJs.js"></script>
<link rel="shortcut icon" href="../../css/imagem/Icone_Empreza.jpg" type="image/x-icon" />



<?php
$tempo = 0;
set_time_limit($tempo);
date_default_timezone_set("Brazil/East");

$id_contestacao_cotacao = (int) $_GET['id_cont'];

include("../../bd.php");
    
$sql="SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.cotacao_principal,
a.n_da_cotacao,
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
a.cpf_cnpj as cpf_cnpj,
b.id_contestacao_cotacao,
b.id_cotacao,
b.revisao,
b.data_do_recebimento,
b.hora_do_recebimento,
b.data_retorno,
b.hora_retorno,
b.remetente,
b.adabas,
b.qtd_contestacoes as qtd,
i.ofensor,
i.tipo2,
i.tipo_apurado,
b.tmt,
b.retorno_do_email,
b.tipo_contestado_FDV,
j.status_cip_analise as ds_status_cip,
j.disc_status_cip_analise as ds_disc_status_cip,
j.obs_analise,
j.dt_tratamento_analise as ds_tratamento,
j.hora_tratamento_analise as ds_hora_tratamento, 
n.nome as operador,
i.contestacao,
i.analista_ofensor,
i.turno_ofensor,
i.data_tratamento,
i.hora_tratamento,
i.dt_atualizacao,
i.usuario_att,
i.setor,
c.item as desc_ofensor,
c.item as desc_tipo2, 
e.item as desc_tipo_apurado,
f.nome as nome_ofensor, 
g.turno as turno_ofensor,
h.item as contestacao_status 
FROM  cip_nv.base_contestacoes_cotacao b 
INNER JOIN cip_nv.tbl_cotacao a ON a.id_cotacao =b.id_cotacao

INNER JOIN cip_nv.tbl_analise j ON j.id_cotacao =b.id_cotacao 

LEFT JOIN cip_nv.tbl_usuarios n ON n.idtbl_usuario=j.idtbl_usuario_analise


INNER JOIN cip_nv.base_erros_cotacao_contestacao i ON i.id_cotacao =b.id_cotacao 
AND i.id_contestacao_cotacao='$id_contestacao_cotacao' and i.setor='Analise'

LEFT JOIN cip_nv.cont_ofensor_input c ON c.id=i.ofensor 
LEFT JOIN cip_nv.cont_motivos_erro_input d ON d.id=i.tipo2 
LEFT JOIN cip_nv.cont_sub_motivos_erro_input e ON e.id=i.tipo_apurado  
LEFT JOIN cip_nv.tbl_usuarios f ON f.idtbl_usuario=i.analista_ofensor
LEFT JOIN cip_nv.tbl_turno g ON g.id=i.turno_ofensor 
LEFT JOIN cip_nv.cont_contestacao h ON h.id=i.contestacao 

GROUP BY a.cotacao_principal,i.ofensor,b.id_contestacao_cotacao DESC
UNION 

SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.cotacao_principal,
a.n_da_cotacao,
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
a.cpf_cnpj as cpf_cnpj,
b.id_contestacao_cotacao,
b.id_cotacao,
b.revisao,
b.data_do_recebimento,
b.hora_do_recebimento,
b.data_retorno,
b.hora_retorno,
b.remetente,
b.adabas,
b.qtd_contestacoes as qtd,
i.ofensor,
i.tipo2,
i.tipo_apurado,
b.tmt,
b.retorno_do_email,
b.tipo_contestado_FDV,
k.status_cip_input as ds_status_cip,
k.disc_status_cip_input as ds_disc_status_cip,
k.obs_input,
k.dt_tratamento_input as ds_tratamento,
k.hora_tratamento_input as ds_hora_tratamento,
o.nome as operador,
i.contestacao,
i.analista_ofensor,
i.turno_ofensor,
i.data_tratamento,
i.hora_tratamento,
i.dt_atualizacao,
i.usuario_att,
i.setor,
c.item as desc_ofensor,
c.item as desc_tipo2, 
e.item as desc_tipo_apurado,
f.nome as nome_ofensor, 
g.turno as turno_ofensor,
h.item as contestacao_status 
FROM  cip_nv.base_contestacoes_cotacao b 
INNER JOIN cip_nv.tbl_cotacao a ON a.id_cotacao =b.id_cotacao


INNER JOIN cip_nv.tbl_input k ON k.id_cotacao =b.id_cotacao 

LEFT JOIN cip_nv.tbl_usuarios o ON o.idtbl_usuario=k.idtbl_usuario_input

INNER JOIN cip_nv.base_erros_cotacao_contestacao i ON i.id_cotacao =b.id_cotacao 
AND i.id_contestacao_cotacao='$id_contestacao_cotacao' and i.setor='Input'

LEFT JOIN cip_nv.cont_ofensor_input c ON c.id=i.ofensor 
LEFT JOIN cip_nv.cont_motivos_erro_input d ON d.id=i.tipo2 
LEFT JOIN cip_nv.cont_sub_motivos_erro_input e ON e.id=i.tipo_apurado  
LEFT JOIN cip_nv.tbl_usuarios f ON f.idtbl_usuario=i.analista_ofensor
LEFT JOIN cip_nv.tbl_turno g ON g.id=i.turno_ofensor 
LEFT JOIN cip_nv.cont_contestacao h ON h.id=i.contestacao 

GROUP BY a.cotacao_principal,i.ofensor,b.id_contestacao_cotacao DESC

UNION


SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.cotacao_principal,
a.n_da_cotacao,
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
a.cpf_cnpj as cpf_cnpj,
b.id_contestacao_cotacao,
b.id_cotacao,
b.revisao,
b.data_do_recebimento,
b.hora_do_recebimento,
b.data_retorno,
b.hora_retorno,
b.remetente,
b.adabas,
b.qtd_contestacoes as qtd,
i.ofensor,
i.tipo2,
i.tipo_apurado,
b.tmt,
b.retorno_do_email,
b.tipo_contestado_FDV,
l.status_cip_auditoria as ds_status_cip,
l.disc_status_cip_auditoria as ds_disc_status_cip,
l.obs_auditoria,
l.dt_tratamento_auditoria as ds_tratamento,
l.hora_tratamento_auditoria as ds_hora_tratamento,
p.nome as operador,
i.contestacao,
i.analista_ofensor,
i.turno_ofensor,
i.data_tratamento,
i.hora_tratamento,
i.dt_atualizacao,
i.usuario_att,
i.setor,
c.item as desc_ofensor,
c.item as desc_tipo2, 
e.item as desc_tipo_apurado,
f.nome as nome_ofensor, 
g.turno as turno_ofensor,
h.item as contestacao_status 
FROM  cip_nv.base_contestacoes_cotacao b 

INNER JOIN cip_nv.tbl_cotacao a ON a.id_cotacao =b.id_cotacao

INNER JOIN cip_nv.tbl_auditoria l ON l.id_cotacao =b.id_cotacao 

LEFT JOIN cip_nv.tbl_usuarios p ON p.idtbl_usuario=l.idtbl_usuario_auditoria 

INNER JOIN cip_nv.base_erros_cotacao_contestacao i ON i.id_cotacao =b.id_cotacao 
AND i.id_contestacao_cotacao='$id_contestacao_cotacao' and i.setor='Auditoria'

LEFT JOIN cip_nv.cont_ofensor_input c ON c.id=i.ofensor 
LEFT JOIN cip_nv.cont_motivos_erro_input d ON d.id=i.tipo2 
LEFT JOIN cip_nv.cont_sub_motivos_erro_input e ON e.id=i.tipo_apurado  
LEFT JOIN cip_nv.tbl_usuarios f ON f.idtbl_usuario=i.analista_ofensor
LEFT JOIN cip_nv.tbl_turno g ON g.id=i.turno_ofensor 
LEFT JOIN cip_nv.cont_contestacao h ON h.id=i.contestacao 

GROUP BY a.cotacao_principal,i.ofensor,b.id_contestacao_cotacao DESC

UNION

SELECT a.id_cotacao, 
a.regional_atribuida, 
a.uf, 
a.cotacao_principal,
a.n_da_cotacao,
a.criado_em, 
a.carteira, 
a.revisao, 
a.cliente, 
a.status_da_cotacao, 
a.substatus_da_cotacao, 
a.dt_inclusao_bd_cip, 
a.ALTAS, 
a.PORTABILIDADE2, 
a.MIGRACAO, 
a.TROCAS, 
a.TT, 
a.BACKUP, 
a.M_2_M, 
a.FIXA, 
a.PRE_POS, 
a.MIGRACAO_TROCA, 
a.TIPO_SERVICO, 
a.total_linhas_cip, 
a.dt_inclusao_bd_cip2,
a.dia,
a.TEMPO,
a.TIPO_PROCESSO,
a.TIPO_DE_LINHA,
a.SLA_DIAS,
a.PRAZO_DIAS,
a.visao_ilha,
a.vencimento_ilha,
a.TIPO_COTACAO, 
a.cpf_cnpj as cpf_cnpj,
b.id_contestacao_cotacao,
b.id_cotacao,
b.revisao,
b.data_do_recebimento,
b.hora_do_recebimento,
b.data_retorno,
b.hora_retorno,
b.remetente,
b.adabas,
b.qtd_contestacoes as qtd,
i.ofensor,
i.tipo2,
i.tipo_apurado,
b.tmt,
b.retorno_do_email,
b.tipo_contestado_FDV,
m.status_cip_correcao as ds_status_cip,
m.disc_status_cip_correcao as ds_disc_status_cip,
m.obs_correcao,
m.dt_tratamento_correcao as ds_tratamento,
m.hora_tratamento_correcao as ds_hora_tratamento,
q.nome as operador,
i.contestacao,
i.analista_ofensor,
i.turno_ofensor,
i.data_tratamento,
i.hora_tratamento,
i.dt_atualizacao,
i.usuario_att,
i.setor,
c.item as desc_ofensor,
c.item as desc_tipo2, 
e.item as desc_tipo_apurado,
f.nome as nome_ofensor, 
g.turno as turno_ofensor,
h.item as contestacao_status 
FROM  cip_nv.base_contestacoes_cotacao b 
INNER JOIN cip_nv.tbl_cotacao a ON a.id_cotacao =b.id_cotacao

INNER JOIN cip_nv.tbl_correcao m ON m.id_cotacao =b.id_cotacao 

LEFT JOIN cip_nv.tbl_usuarios q ON q.idtbl_usuario=m.idtbl_usuario_correcao

INNER JOIN cip_nv.base_erros_cotacao_contestacao i ON i.id_cotacao =b.id_cotacao 
AND i.id_contestacao_cotacao='$id_contestacao_cotacao' and i.setor='Correcao'

LEFT JOIN cip_nv.cont_ofensor_input c ON c.id=i.ofensor 
LEFT JOIN cip_nv.cont_motivos_erro_input d ON d.id=i.tipo2 
LEFT JOIN cip_nv.cont_sub_motivos_erro_input e ON e.id=i.tipo_apurado  
LEFT JOIN cip_nv.tbl_usuarios f ON f.idtbl_usuario=i.analista_ofensor
LEFT JOIN cip_nv.tbl_turno g ON g.id=i.turno_ofensor 
LEFT JOIN cip_nv.cont_contestacao h ON h.id=i.contestacao 


GROUP BY a.cotacao_principal,i.ofensor,b.id_contestacao_cotacao DESC ";
        $result = mysql_query($sql,$conecta) or die(mysql_error());
 
 
 
$cont = mysql_num_rows($result);
if ($cont > 0) {
    $tabela = "<table id=\"table_conteudo\" border=1>
                     <tr>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Principal</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Complementar</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Revisao</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>nº contestacao</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Adabas</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Data do Recebimento</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Data do Retorno</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Ofensor</font></td>
                      <td style='font-weight: 600; background-color: #a0873c;' align='center'>
                      <font color='#FFFFFF'>Regional</font></td>
                     </tr>";
    $return = "$tabela";
    while ($linha = mysql_fetch_array($result)) {
        
            if(empty($linha["obs_analise"])){
               
               $linha["obs_analise"]="";

            }
              if(empty($linha["obs_input"])){
               
               $linha["obs_input"]="";

            }
              if(empty($linha["obs_auditoria"])){
               
               $linha["obs_auditoria"]="";

            }
              if(empty($linha["obs_correcao"])){
               
               $linha["obs_correcao"]="";

            }


        $return .= "<tr>";
         $return .= "<td style='background-color: white;' align='center' width='20%'>
        <a href='#'>".$linha["cotacao_principal"]."</a></td>";
       $return .= "<td style='background-color: white;' align='center' width='10%'>
        <a href='#'>".$linha["n_da_cotacao"]."</a></td>";
       $return .= "<td style='background-color: white;' align='center'>" . $linha["revisao"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["qtd"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["adabas"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["data_do_recebimento"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["data_retorno"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["desc_ofensor"] .
            "</td>";
        $return .= "<td style='background-color: white;' align='center'>" . $linha["regional_atribuida"] .
            "</td>";
        $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>FDV</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["tipo_contestado_FDV"]) > 60) ? substr($linha["tipo_contestado_FDV"], 0,60) .
            "..." . "</td>" : $linha["tipo_contestado_FDV"] . "</td>";
        $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>E-MAIL</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["retorno_do_email"]) > 60) ? substr($linha["retorno_do_email"], 0,60) .
            "..." . "</td>" : $linha["retorno_do_email"] . "</td>";

         $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Analise</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["obs_analise"]) > 60) ? substr($linha["obs_analise"], 0,60) .
            "..." . "</td>" : $linha["obs_analise"] . "</td>";


         $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Input</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["obs_input"]) > 60) ? substr($linha["obs_input"], 0,60) .
            "..." . "</td>" : $linha["obs_input"] . "</td>";    


         $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Auditoria</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["obs_auditoria"]) > 60) ? substr($linha["obs_auditoria"], 0,60) .
            "..." . "</td>" : $linha["obs_auditoria"] . "</td>";    

        
         $return .= "</tr>
                            <tr>
                            <td style='font-size=13;font-weight: 600;' align='center'>Correcao</td>
                            <td colspan=9 style='font-size=13;background-color: white;'>";
        $return .= (strlen($linha["obs_correcao"]) > 60) ? substr($linha["obs_correcao"], 0,60) .
            "..." . "</td>" : $linha["obs_correcao"] . "</td>";



        $return .= "</tr><tr><td colspan=10 style='font-size=2;background-color=#BDBDBD;'>&nbsp</td></tr>";
    }
    $return .= "</table>";
    echo $return;
    } else {
    echo "Não foram encontrados registros!";
    }


mysql_free_result($result);
mysql_close($conecta);  

?>