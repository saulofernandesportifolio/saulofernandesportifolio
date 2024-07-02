
 <script language="JavaScript">   
     function b(){
     
      var i = document.f.tpcadastro.selectedIndex;
     // alert(document.f.portabilidade[i].text);
          
      if(i == '1'){
         $('#1').show();
         $('.divs2').hide();
         $('.divs3').hide();       
       }else 
       if(i == '2'){
         $('#2').show();
         $('.divs1').hide(); 
         $('.divs3').hide();  
       }else 
       if(i == '3'){
         $('#3').show();
         $('.divs1').hide();
         $('.divs2').hide();
       }else{
       $('.divs2').hide();
       $('.divs1').hide();
        }
      
    }


</script> 


<div class="divformcarrega">
  <?php

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
  
    if($perfil != 1 && $perfil != 15){
    
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

  <div id="resolucao">
      
    <div id="filtro" class="form bradius">
            
         <form name="f" action="#" method="post">
         <p style="border: #FFFFFF solid; padding: 3px 3px 3px 3px;" class="bradius">
         <label style="padding-left: 110px;">SELECIONE</label>    
         <label style="padding-left: 5px;">Cadastrar por:&nbsp;
         <select name="tpcadastro" id="tpcadastro" class="txt2comboboxmedio bradius" 
         onblur="ValidaEntrada(this,'combo');" onchange="b()">
                <option value="" selected="selected">Selecione....</option>
                <option value="1">Cotação</option>
                <option value="2">Documentação</option>
              </select>
           </label>
         </p>    
        </form>      
    
     <div id="1" class="divs1" style="padding-left: 20px; display:none">  
         <br>  
       <form action="principal.php?t=forms/formconsulta_cotacoes_diretoria2.php" method="POST">
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">Pesquisar Cota&ccedil;&eth;es</font></h3><br />
       <div class="acomodar">
        <p>Cotação:</p><br />
         <p>
         <input type="text" name="n_da_cotacao" id="n_da_cotacao"  class="txt bradius"/>
        </p>
        <br/>
         
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Pesquisar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

            </form>
        <!--principal-->
        </div>
     </div>        

     <div id="2" class="divs2" style="padding-left: 20px; display:none"> 
         <br>
         <form action="principal.php?t=forms/formconsulta_cotacoes_diretoria2doc.php" method="POST">
             <input type="hidden" name="tpcadastro2" value="<?php echo '3' ?>" >  
               
        <h3 align="center" style="background: #735D25"><font color="#FFFFFF">Documentação</font></h3><br />
       <div class="acomodar">
           <p>Nº protocolo:</p><br />
         <p>
         <input type="text" name="protocolo" id="protocolo"  class="txt bradius"/>
        </p>
        <br/>
         
            <input type="submit" class="sb2 bradius" name="entrar" id="entrar" value="Pesquisar"  />
            <input type="button" class="sb2 bradius" name="Submit2" value="Cancelar" onclick="window.location='principal.php'" />

            </form>
        <!--principal-->
         
         
        </div>
     </div>        
        
               
    </div>
</div>


<?php

 mysql_free_result($acao_operador);
 mysql_close($conecta);

?>

</body>
</html>