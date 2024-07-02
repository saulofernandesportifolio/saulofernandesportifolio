

<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro]").change(function(){
            $("select[name=motivo]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_erros.php", 
                  {id_filtro:$(this).val()},
                  function(valor){
                     $("select[name=motivo]").html(valor);
           $teste=$ln['motivo'];  
          }
                  )
         })
      })
</script>



<script type="text/javascript">
      $(document).ready(function(){
         $("select[name=id_filtro_vivocorp]").change(function(){
            $("select[name=id_filtro]").html('<option value="0">Carregando...</option>');
            $.post("principal.php?t=forms/processa_erros2manual.php", 
                  {id_filtro_vivocorp:$(this).val()},
                  function(valor){
                     $("select[name=id_filtro]").html(valor);
           $teste=$ln['id_filtro'];  
          }
                  )
         })
      })
</script>



<?php





$tempo = 0;

  set_time_limit($tempo);
 
 date_default_timezone_set("Brazil/East");
 $data_dia= date("Y/m/d"); 
 

$sql_operador="SELECT * FROM cip_nv.tbl_usuarios WHERE idtbl_usuario='{$_COOKIE['idtbl_usuario']}'";
$acao_operador = mysql_query($sql_operador,$conecta) or die (mysql_error());
		
        while($linha_operador = mysql_fetch_assoc($acao_operador))
        {
        $idtbl_usuario      = $linha_operador["idtbl_usuario"];
        $perfil             =$linha_operador["perfil"];
        $nome               =$linha_operador["nome"];
        $logado             =$linha_operador["logado"];
        $canal             =$linha_operador["tramite"];
		}
  
  
  

  
 if($perfil!= 4 && $perfil != 17){
    
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




?> 
<br><br><br>
<div id="filtroservico bradius">
<p align="center" class="tituloformcontestacao bradius"><font size="5" style="text-align: center;">Erros cadastro manual</font></p>

<div class="divformservicocontestacao bradius">
<form action="principal.php?&t=controles/erros_valida_cadastro_top_tt.php"  method="POST">
<input type="hidden" value="0" id="conterro" />

<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Tipo no vivocorp:&nbsp;
 <select name="id_filtro_vivocorp" id="id_filtro_vivocorp" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <?php
                     
                     $sql = "SELECT * FROM bd_erros_pn.tipos_erros_vivocorp ORDER BY tipo";
                     $qr = mysql_query($sql,$conecta2) or die(mysql_error());
                     while($ln = mysql_fetch_assoc($qr)){
                     echo '<option value="'.$ln['id'].'">'.$ln['tipo'].'</option>';
                     }
                     ?>
              </select></label>        
<label style="padding-left: 5px;">Tipo de erro:&nbsp;
<select name="id_filtro" id="id_filtro" class="txt2comboboxpequeno bradius" onblur="ValidaEntrada(this,'combo');"/>
                <option value="">Selecione...</option>
        
                     </select></label>
            

</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Pedido/OV:&nbsp;
<input type="text" name="pedido" id="pedido" class="txtmedio bradius"  onblur="ValidaEntrada(this,'atividade_pedido');"></label>
<label style="padding-left: 5px;">Adabas:&nbsp;
<input type="text" name="adabas" id="adabas" class="txtpequeno2 bradius" onblur="ValidaEntrada(this,'textarea');"/></label>
<label style="padding-left: 5px;">Criado em:&nbsp;
    <input type="text" name="criado_em" id="criado_em"  maxlength="19" class="txt2datahora bradius" onblur="ValidaEntrada(this,'datetime');" onkeypress="DataHora(event,this);" /></label>
<label style="padding-left: 20px;">Revisão:&nbsp;
<input type="text" name="revisao" id="revisao" class="txt2num bradius" onblur="ValidaEntrada(this,'int');"/></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Cliente:&nbsp;
<input type="text" name="cliente" id="cliente" class="txtgrande bradius"  onblur="ValidaEntrada(this,'text');"></label>
<label style="padding-left: 5px;">Qtd linhas:&nbsp;
<input type="text" name="qtd_linhas" id="qtd_linhas" class="txtpequeno2 bradius"  onblur="ValidaEntrada(this,'int');"></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Nome do gestor:&nbsp;
<input type="text" name="nome_do_gestor" id="nome_do_gestor" class="txt bradius"  onblur=""></label>
<label style="padding-left: 5px;">Criado por:&nbsp;
<input type="text" name="criado_por" id="criado_por" class="txtpequeno2 bradius"  onblur="ValidaEntrada(this,'login');"></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Portabilidade:&nbsp;
 <select name="portabilidade" id="portabilidade" class="txt2comboboxpequeno bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
</label>
<label style="padding-left: 5px;">Status do Pedido:&nbsp;
 <select name="status_do_pedido" id="status_do_pedido" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <option value="Backoffice aprovado">Backoffice aprovado</option>
                <option value="Executado parcialmente">Executado parcialmente</option>
                <option value="Logistica concluída">Logistica concluída</option>
                <option value="Erro Criação Cliente Atlys">Erro Criação Cliente Atlys</option>
                <option value="Erro Criação Conta Atlys">Erro Criação Conta Atlys</option>
                <option value="Cancelado manualmente">Cancelado manualmente</option>
                <option value="Concluído Manualmente">Concluído Manualmente</option>
                <option value="Crédito Aprovado">Crédito Aprovado</option>
              </select></label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Regional:&nbsp;
   <select name="regional" id="regional" class="txt2comboboxpequenino bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
          
                <optgroup title="SP" label="SP">
                <option value="SP">SP</option>
                </optgroup>

                <optgroup title="GO" label="GO"></optgroup>
                <optgroup title="MT" label="MT"></optgroup>
                <optgroup title="MS" label="MS"></optgroup>
                <optgroup title="DF" label="DF">
                <option value="CO">CO</option>
                </optgroup>
             
                <optgroup title="PR" label="PR"></optgroup>                
                <optgroup title="RS" label="RS"></optgroup>                
                <optgroup title="SC" label="SC">
                <option value="SUL">SUL</option>
                </optgroup>
                
                <optgroup title="AL" label="AL"></optgroup>                
                <optgroup title="BA" label="BA"></optgroup>                
                <optgroup title="CE" label="CE"></optgroup>                
                <optgroup title="MA" label="MA"></optgroup>                
                <optgroup title="PB" label="PB"></optgroup>                
                <optgroup title="PE" label="PE"></optgroup>                
                <optgroup title="PI" label="PI"></optgroup>                
                <optgroup title="RN" label="RN"></optgroup>                
                <optgroup title="SE" label="SE"></optgroup>                
                <optgroup title="TO" label="TO">
                <option value="NE">NE</option>
                </optgroup>

                <optgroup title="AC" label="AC"></optgroup>
                <optgroup title="AP" label="AP"></optgroup>
                <optgroup title="AM" label="AM"></optgroup>
                <optgroup title="PA" label="PA"></optgroup>
                <optgroup title="RO" label="RO"></optgroup>
                <optgroup title="RR" label="RR"></optgroup> 
                <option value="NORTE">NORTE</option>  
                </optgroup>

                <optgroup title="MG" label="MG">
                <option value="MG">MG</option>
                </optgroup>

                <optgroup title="ES" label="ES"></optgroup>
                <optgroup title="RJ" label="RJ"></optgroup>
                <option value="LESTE">LESTE</option>
                </optgroup>

                <optgroup title="Todas as UF" label="Todas as UF" option value="Todas as UF">
                <option value="Todas as Regionais">Todas as Regionais</option>
                </optgroup>

              </select></label>
<label style="padding-left: 5px;">Tipo de serviço:&nbsp;
   <select name="tipo_de_servico" id="tipo_de_servico" class="txt2comboboxmedio bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <option value="Alta">Alta</option>
                <option value="Troca">Troca</option>
                <option value="Transferência de titularidade">Transferência de titularidade</option>
              </select></label> 
<label style="padding-left: 5px;">Cnpj:&nbsp;
<input type="text" name="cnpj" id="cnpj" class="txtmedio bradius"  onblur="ValidaEntrada(this,'login');"></label> 
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius" >
<label style="padding-left: 5px;">Ofensor:&nbsp; 
  <select name="ofensor" id="ofensor" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');">
                <option value="">Selecione...</option>
                <option value="Input">Input</option>
                <option value="BKO">BKO</option>
                <option value="Sistema">Sistema</option>
                <option value="Logística">Logística</option>
                <option value="Consultoria">Consultoria</option>
              </select>
</label>
</p>

<br/>
<p style="border: #FFFFFF  solid; padding: 3px 3px 3px 3px;" class="bradius" >
<label style="padding-left: 5px;">Motivo do Erro:&nbsp; 
 <select name="motivo" class="txt2comboboxgrande bradius" id="motivo" onblur="ValidaEntrada(this,'combo');">
                      <option value="">Selecione...</option>
                    </select>
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Operador:&nbsp; 

<select name="operador" id="operador" class="txt2comboboxpadrao bradius" onblur="ValidaEntrada(this,'combo');" >
     <option value="">Selecione...</option>   
     <option value="Sistemico">SISTEMICO</option>                 
            <?php

          //seleciona a base de dados para uso
         $query= "SELECT * FROM cip_nv.tbl_usuarios ORDER BY nome";
         $result = mysql_query($query,$conecta2) or die (mysql_error());
         while($dado= mysql_fetch_array($result)){
       $func=$dado["nome"];
         echo "<option value=\"$func\">
               $func</option>";
         }
        ?> 
     
        </select>
</label>
</p>
<br/>
<p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
<label style="padding-left: 5px;">Comentário:&nbsp; 
<textarea type="text" name="comentario" id="comentario" class="txt2textarea bradius" onblur="ValidaEntrada(this,'textarea');"></textarea>
</label>
</p>
<br/>

<?php 

mysql_free_result($acao_operador,$qr,$result);
mysql_close($conecta,$conecta2);

?>

 <input name="bt_enviar" id="bt_enviar" type="submit" value="Salvar" class="sb2 bradius" />
 <input type="reset" value="Limpar" class="sb2 bradius"/>
 <input name="cancelar" type="button" value="Cancelar" class="sb2 bradius" onclick="window.location='principal.php?t=forms/form_fila_cotacao_erros_top_tt.php'"/>
 
</form>

</div>

</div>

</body>
</html>

