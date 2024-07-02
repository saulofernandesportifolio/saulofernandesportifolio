<?php if(!isset($_COOKIE['nome']))
	{$us_logado = "visitante";}
	else{$us_logado = $_COOKIE['nome'];}?>
  <div id="boas_vindas">
	<font style="font-size:14px; font-weight:600">
		Ol&aacute; <?php echo $us_logado; ?> ,</br>
		Hoje &eacute; <?php echo " $diasemana[$dia], $datadia de $mesano[$mes] de $dataano.";?>
	</font>
  </div>
  <div id="prev_tempo">
     <!-- Widget Previs&atilde;o de Tempo CPTEC/INPE -->
     <iframe allowtransparency="true"
             marginwidth="0"
             marginheight="0"
             hspace="0"
             vspace="0"
             frameborder="0"
             scrolling="no"
             src="http://www.cptec.inpe.br/widget/widget.php?p=237&w=h&c=8c7c54&f=ffffff"
             height="205px"
             width="215px">
	 </iframe>
     <noscript>Previs&atilde;o de 
	    <a href="http://www.cptec.inpe.br/cidades/tempo/237">Porto Alegre/RS</a> oferecido por 
        <a href="http://www.cptec.inpe.br">CPTEC/INPE</a>
     </noscript>
     <!-- Widget Previs&atilde;o de Tempo CPTEC/INPE -->
   </div>