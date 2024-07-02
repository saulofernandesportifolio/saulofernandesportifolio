<?php


$sql_operador="SELECT * FROM tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
if($perfil != 1 && $perfil != 4){
    
setcookie('salva',$_COOKIE['idtbl_usuario'],time() - 28800);
setcookie('idtbl_usuario',"");
    
echo "
       <script type=\"text/javascript\">
        alert('Usu\u00e1rio inv\u00e1lido!');
        document.location.replace('index.php');
	    </script>
 ";
  exit(); 
    
    
    
} 



$tempo = 0;

set_time_limit($tempo);

date_default_timezone_set("Brazil/East");

$hora2 = date("H:i:s");




$id_cotacao= (int) $_GET['id_cotacao'];
$sql_atv = "SELECT a.id_cotacao,
                   a.cotacao_principal,
                   a.regional_atribuida,
                   a.uf,
                   a.criado_em,
                   a.carteira,
                   a.cliente,
                   a.status_da_cotacao,
                   a.comentarios,
                   b.status_cip_analise,
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
                   a.informacoes
           FROM tbl_cotacao a,tbl_analise b 
           WHERE a.id_cotacao = $id_cotacao 
           GROUP BY a.id_cotacao";

$acao_atv=mysql_query($sql_atv,$conecta);

	while($linha= mysql_fetch_array($acao_atv))
	{	
    $id_cotacao      	 = $linha["id_cotacao"];
	  $cotacao_principal = $linha["cotacao_principal"];
    $regional				   = $linha["regional_atribuida"];
	  $uf				         = $linha["uf"];
	  $criado_em         = $linha["criado_em"];
	  $tipo					     = $linha["carteira"];
	  $cliente				   = $linha["cliente"];
	  $status_vivocorp   = $linha["status_da_cotacao"];
    $descricao    	   = $linha["comentarios"];
    $status_cip        = $linha["status_cip_analise"];
	
	//echo "$hora";
	//$visao_ilha     		= $linha["visao_ilha"];
	
 //VARIAVEL COM A DATA NO FORMATO AMERICANO
 $data_americano = "$criado_em";

 
//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
$partes_da_data = explode(" ",$data_americano);
$data="$partes_da_data[0]";
$hora="$partes_da_data[1]";

$datatransf = explode("-",$data);
$data = "$datatransf[2]/$datatransf[1]/$datatransf[0]";
//$datacompleta = $data;

$criado_em2 = $data." ".$hora;
//$linha['visao_ilha']=$visao_ilha2;
?>


 <div id="filtroservico2" class="form bradius"> 
<div class="divformdistribuicaoservico">
 

<form name="form1" method="post" action="principal.php?&t=controles/sql.distribuir_cotacao_servico1_analise.php">
  <input type="hidden" name="id_cotacao" value="<?php echo $linha['id_cotacao']?>" />
 
  <p><font color="#a0873c" size="5" face="Gotham Light">Lista 
    de Atividades para tratamento de tipo de servi&ccedil;o.</font></p>
    <br />

  <table width="100%">
    <tr> 
      <td class="trcabecalho">Cotacao Principal</td>
      <td class="trcabecalho">Regional</td>
      <td class="trcabecalho">Uf</td>
      <td class="trcabecalho">Criado em</td>
   	   <td class="trcabecalho">Status Vivocorp</td>
	   <td class="trcabecalho">Tipo</td>	  
	    </tr>
	    <tr> 
      <td class="tdconteudo"><?php echo "$cotacao_principal"?></td>
      <td class="tdconteudo"><?php echo "$regional"?></td>
      <td class="tdconteudo"><?php echo "$uf"?></td>
      <td class="tdconteudo"><?php echo "$criado_em2"?></td>
      <td class="tdconteudo"><?php echo "$status_vivocorp"?></td>
	  <td class="tdconteudo"><?php echo "$tipo"?></td>
	  </tr>
	    </table>
		<table width="100%">
       <tr> 

      <td class="trcabecalho">ALTAS</td>
      <td class="trcabecalho">PORTABILIDADE</td>
      <td class="trcabecalho">MIGRACAO</td>
      <td class="trcabecalho">TROCAS</td>
      <td class="trcabecalho">TT</td>
      <td class="trcabecalho">BACKUP</td>
      <td class="trcabecalho">M_2_M</td>
      <td class="trcabecalho">FIXA</td> 
      <td class="trcabecalho">PRE POS</td>
      <td class="trcabecalho">MIGRACAO TROCA</td>
      <td class="trcabecalho">INFORMAÇÃO</td>
	  </tr>
     <tr>
	  <td class="tdconteudo"> 
          <input name="ALTAS" type="text" id="ALTAS" size="4" maxlength="6" value="<?php if($linha['ALTAS'] == 0){ echo $linha['ALTAS']=""; }else{ echo $linha['ALTAS']; } ?> "/>
        </td>
      <td class="tdconteudo"> 
          <input name="PORTABILIDADE" type="text" id="PORTABILIDADE" size="4" maxlength="6" value="<?php if($linha['PORTABILIDADE2'] == 0){ echo $linha['PORTABILIDADE2']=""; }else{ echo $linha['PORTABILIDADE2']; }?> " />
        </td>
      <td class="tdconteudo">
          <input name="MIGRACAO" type="text" id="MIGRACAO" size="4" maxlength="6" value="<?php if($linha['MIGRACAO'] == 0){ echo $linha['MIGRACAO']=""; }else{ echo $linha['MIGRACAO']; }?> "/>
        </td>
      <td class="tdconteudo"> 
          <input name="TROCAS" type="text" id="TROCAS" size="4" maxlength="6" value="<?php if($linha['TROCAS']==0){ echo $linha['TROCAS']=""; }else{echo $linha['TROCAS'];}?> "/>
       </td>
      <td class="tdconteudo">
          <input name="TT" type="text" id="TT" size="4" maxlength="6" value="<?php if($linha['TT'] == 0){ echo $linha['TT']=""; }else{echo $linha['TT'];}?> "/>
        </td>
    
        <td class="tdconteudo">
          <input name="BACKUP" type="text" id="BACKUP" size="4" maxlength="6" value="<?php if($linha['BACKUP'] == 0){echo $linha['BACKUP']="";}else{echo $linha['BACKUP'];}?> "/>
        </td>
        <td class="tdconteudo">
          <input name="M_2_M" type="text" id="M_2_M" size="4" maxlength="6" value="<?php if($linha['M_2_M'] == 0){echo $linha['M_2_M']="";}else{echo $linha['M_2_M'];}?> "/>
        </td>
        
        <td class="tdconteudo">
          <input name="FIXA" type="text" id="FIXA" size="4" maxlength="6" value="<?php if($linha['FIXA'] == 0){echo $linha['FIXA']="";}else{echo $linha['FIXA'];}?> "/>
        </td>
               <td class="tdconteudo">
          <input name="PRE POS" type="text" id="PRE POS" size="4" maxlength="6" value="<?php if($linha['PRE_POS'] == 0){echo $linha['PRE_POS']="";}else{echo $linha['PRE_POS'];}?> "/>
        </td> 
      <td class="tdconteudo">
          <input name="MIGRACAO TROCA" type="text" id="MIGRACAO TROCA" size="4" maxlength="6" value="<?php if($linha['MIGRACAO_TROCA'] == 0){echo $linha['MIGRACAO_TROCA']="";}else{echo $linha['MIGRACAO_TROCA'];}?> "/>
        </td> 
       <td class="tdconteudo"><input name="informacoes" type="text" id="informacoes" size="4" maxlength="255" value="<?php if($linha['informacoes'] == 0){ echo $linha['informacoes']=""; }else{ echo $linha['informacoes']; } ?> "/>
       </td>  
    </tr>
       <tr>
      <td  colspan="11" class="trcabecalho">Comentários:</td>
	</tr>
    <tr>
     <td colspan="11" class="tdconteudo"><?php echo $descricao; ?></td>
     </tr>
    <?php
  	}
	?>
  </table>
  
  <br />
<p>
  <input type="button" name="Submit2" value="Voltar" onclick="history.back()" class="sb2 bradius" />
  <input type="submit" name="Submit" value="Avançar" class="sb2 bradius" />
  </p>
</form>

  </div>

    </div>
</div>

</body>
</html>

