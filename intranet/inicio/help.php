<?php if(!isset($help)){$help = "";} ?>
<div id="help" class="esq">
<h2>Ajuda</h2>
<ul>
	<li>Feeds<br /><br /></li>
		<a href="index.php?set=HP&func=HP&help=1">- Localizando Feeds</a><br />
		<a href="index.php?set=HP&func=HP&help=2">- Inserindo Feeds</a><br />
		<a href="index.php?set=HP&func=HP&help=3">- Editando Feeds</a><br />
		<a href="index.php?set=HP&func=HP&help=4">- Excluindo Feeds</a><br /><br />
    
    <li>Eventos<br /><br /></li>
		<a href="index.php?set=HP&func=HP&help=5">- Inserindo Eventos</a><br />
		<a href="index.php?set=HP&func=HP&help=6">- Tipos de Evento</a><br />
        <a href="index.php?set=HP&func=HP&help=7">- Editando Eventos</a><br />
		<a href="index.php?set=HP&func=HP&help=8">- Excluindo Eventos</a><br /><br />
    
    <li>Perfil<br /><br />
		<a href="index.php?set=HP&func=HP&help=9">- Alterando meus dados</a><br />
		<a href="index.php?set=HP&func=HP&help=10">- Alterando minha senha</a><br /><br />
    </li>
    <li>Usuários<br /><br /></li>
		<a href="index.php?set=HP&func=HP&help=11">- Inserindo novos usuários</a><br />
		<a href="index.php?set=HP&func=HP&help=12">- Editando usuários</a><br />
		<a href="index.php?set=HP&func=HP&help=13">- Excluindo usuários</a><br />
	
    <br />
    <li><a href="index.php?set=HP&func=HP&help=14">Contato</a></li>
</ul>
</div>
<div id="help" class="dir">
	<?php switch ($help){
		
		//Caso 1: Localização de feeds	
			case "1": ?>
            <h3>Localização de Feeds</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Para localizar os feeds mais facilmente basta digitar o conteúdo no campo de pesquisa à direita 
            e clicar em <strong>"buscar"</strong> para localizar a expressão solicitada no corpo ou no titulo do feed.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Caso seja necessário uma pesquisa mais detalhada, basta clicar no link abaixo do campo de pesquisa,
            onde diz <strong>"pesquisa detalhada"</strong>, para realizar uma pesquisa pelo assunto interno do feed.</p>
			<p>Os ultimos feeds postados de cada sessão (Procedimentos, RH, Liderança e Todos) estão localizados na tela inicial 
            que pode ser acessada pelo botão <strong>"Início"</strong>.</p>
        <?php break; 
       
	   //Caso 2: Inserindo feeds	
			  case "2": ?>
            <h3>Inserindo Feeds</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Para inserir novos feeds você precisa estar logado no sistema. Após efetuar o login, basta clicar 
            no botão <strong>"Adicionar Feed"</strong> no campo Ferramentas de navegação, que está localizado no topo da tela.</p>
        <?php break; 
       
	   //Caso 3: Editando feeds	
			   case "3": ?>
            <h3>Editando Feeds</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Você só pode editar os feeds criados por você mesmo. Para fazer isto, basta fazer login, localizar o feed ao qual você deseja
             editar, abrí-lo clicando no link <strong>"Leia mais..."</strong>, e após clicar no link <strong>Editar</strong>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Após realizar as alterações, basta clicar no link <strong>Alterar feed</strong>. Após isso ficará registrado no corpo do feed a 
             data em que você editou seu feed em vermelho.</p>
        <?php break; 
       
	   //Caso 4: Excluindo feeds	
			   case "4": ?>
            <h3>Excluindo Feeds</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Você só pode excluir os feeds criados por você mesmo. Para fazer isto, basta fazer login, localizar o feed ao qual você deseja
             excluir, abrí-lo clicando no link <strong>"Leia mais..."</strong>, e após clicar no link <strong>Excluir</strong>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Após isso será exibida uma tela de confirmação, basta clicar em <strong>sim</strong> e o seu feed será excluído.</p>
	   <?php break;
	   
	   //Caso 5: Inserindo eventos	
			   case "5": ?>
            <h3>Inserindo Eventos</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Para inserir eventos na intranet você precisa estar logado no sistema. Existem duas formas de inserir eventos: Clicando no 
             próprio calendario (localizado à direita do site) na data desejada, ou abrindo o menu <strong>"Gerenciar Eventos"</strong> no 
             campo Ferramentas de navegação, que está localizado no topo da tela.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Ao clicar em uma data do calendário, irá aparecer a tela de inserção de evento, já preenchido com a data solicitada. Caso você 
             seja coordenador ou administrador, deverá escolher o <a href="index.php?set=HP&func=HP&help=6">tipo de evento</a>: Pessoal, 
             Global ou Aniversário. Também é necessário preencher o campo de descrição de evento, com um limite de 20 caracteres.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Eventos também podem ser inseridos acessando o menu <strong>"Gerenciar Eventos"</strong> no campo Ferramentas de navegação, 
             que está localizado no topo da tela.</p>
	   <?php break;
	   
	   //Caso 6: Tipos de eventos	
			   case "6": ?>
            <h3>Tipos de Evento</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Os eventos do tipo pessoal só podem ser vistos pelo usuário autor do evento, e são exibidos no calendário na cor 
             <font style="color:#3C0; font-size:15px;">verde</font>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Os eventos do tipo global estão sempre visíveis, inclusive quando não for realizado login no sistema. Estes eventos só 
             podem ser inseridos por coordenadores e administradores e são exibidos no calendário na cor 
             <font style="color:#03F; font-size:15px;">azul</font>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Os eventos do tipo aniversáro estão sempre visíveis, inclusive quando não for realizado login no sistema. Estes eventos 
             só podem ser inseridos por coordenadores e administradores e também são inseridos automaticamente quando inserido um novo 
             usuário (independente do perfil). Eles são exibidos no calendário na cor <font style="color:#C60; font-size:15px;">laranja
             </font>.</p>
	   <?php break;
	  
	   //Caso 7: Editando Eventos	
			   case "7": ?>
            <h3>Editando Eventos</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Você só pode editar os eventos criados por você mesmo. Para fazer isto, basta fazer login e acessar o menu <strong>
             "Gerenciar Eventos"</strong> no campo Ferramentas de navegação, e clicar no link <strong>"Meus Eventos"</strong>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Após será exibida uma lista com os eventos inseridos por você. Para editá-los, basta clicar no link <strong>"Editar"</strong>
             ao lado do evento desejado.</p>
	   <?php break;
	   
	   //Caso 8: Excluindo Eventos	
			   case "8": ?>
            <h3>Excluindo Eventos</h3>
    		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Você só pode excluir os eventos criados por você mesmo. Para fazer isto, basta fazer login e acessar o menu <strong>
             "Gerenciar Eventos"</strong> no campo Ferramentas de navegação, e clicar no link <strong>"Meus Eventos"</strong>.</p>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Após será exibida uma lista com os eventos inseridos por você. Para excluí-los, basta clicar no link <strong>"Excluir"</strong>
             ao lado do evento desejado. Após isso será exibida uma tela de confirmação, basta clicar em <strong>sim</strong> e o seu evento 
             será excluído.</p>
	   <?php break;
	   
	   //Caso 9: Alterando meus dados	
			   case "9": ?>
            <h3>Alterando meus dados</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		Para alterar seus dados você precisa estar logado no sistema. Após efetuar o login, basta clicar no botão <strong>"Editar Perfil"
            </strong> no campo Ferramentas de navegação, que está localizado no topo da tela.</p>
	   <?php break;
	   
	   //Caso 10: Alterando minha senha	
			   case "10": ?>
            <h3>Alterando meus dados</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		Caso você queira trocar sua senha basta, após efetuar o login, clicar no botão <strong>"Editar Perfil"</strong> no campo 
            Ferramentas de navegação, que está localizado no topo da tela e após isso clicar no link <strong>"Alterar senha"</strong>, após 
            isso sera solicitada uma confirmação da senha anterior e uma nova senha.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Caso você esqueça a sua senha, ao lado do campo para realizar login existe o link <strong>"Esqueceu sua senha?"</strong>, que 
            também possibilita realizar a alteração de senha para a senha padrão ("empreza"), solicitando apenas a confirmação da data de 
            nascimento e e-mail para que seja realizado o reset da senha.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Se ainda assim você não conseguir efetuar o login, entre em contato com o seu Administrador.</p>
	   <?php break;
	   
	   //Caso 11: Inserindo Usuários	
			   case "11": ?>
            <h3>Inserindo novos usuários</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Somente Coordenadores e Administradores podem inserir novos usuários.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Para inserir um novo usuário, basta, após efetuar o login, clicar no botão "Gerenciar Usuários" no campo 
            Ferramentas de navegação, que está localizado no topo da tela, e após clicar no link "Adicionar novo usuario", 
            lembrando que todos os campos (<strong>Perfil*</strong>, <strong>setor*</strong>, nome, data de nascimento, e-mail) são de 
            preenchimento obrigatório</p>
            </br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            obs: Ao inserir um novo usuário a data de aniversário dele já será inserida no calendário nos proximos anos.</p>
            </br>
            <p><strong style="font-size:25px;">*</strong>Cada coordenador poderá inserir somente usuários com perfil de 'usuario' e do seu próprio setor, enquanto administradores 
            terão a opção de inserir novos Coordenadores e/ou Usuários em qualquer setor.</p>
	   <?php break;
	   
	   //Caso 12: Editando Usuários	
			   case "12": ?>
            <h3>Editando usuários</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Somente Coordenadores e Administradores podem editar perfis de outros usuários.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Para editar o perfil de um usuário, basta, após efetuar o login, clicar no botão <strong>"Gerenciar Usuários"</strong> no campo 
            Ferramentas de navegação, que está localizado no topo da tela, e após localizar o usuário desejado, clicar no link <strong>
            "Editar"</strong>, ao lado da descrição do setor do usuário.</p>
            </br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            obs: Ao editar a data de nascimento de um usuário a data de aniversário dele será alterada no calendário nos proximos anos.</p>
	   <?php break;
	   
	   //Caso 13: Editando Usuários	
			   case "13": ?>
            <h3>Excluindo usuários</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Somente Coordenadores e Administradores podem excluir usuários.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Para excluir um usuário, basta, após efetuar o login, clicar no botão <strong>"Gerenciar Usuários"</strong> no campo 
            Ferramentas de navegação, que está localizado no topo da tela, e após localizar o usuário desejado, clicar no link <strong>
            "Excluir"</strong>, ao lado da descrição do setor do usuário. Após isso será exibida uma tela de confirmação, basta clicar em 
            <strong>sim</strong> e o usuário será excluído.</p>
            </br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            obs: Ao excluir um usuario a data de aniversário dele será excluída no calendário nos proximos anos.</p>
	   <?php break;
	    
	   //Caso 14: Contato	
			   case "14": ?>
            <h3>E-mails para contato</h3>
            <ul>Área de Business Inteligence
                <li style="margin-left:20px; margin-top:15px;">
                Análise<br />
                Rodrigo Machado da Rosa - Coordenador<br />
                <a href="mailto:rodrigo.rosa@empreza.com.br">rodrigo.rosa@empreza.com.br</a></br></br></li>
                <li style="margin-left:20px;">
                Desenvolvimento<br />
                Saulo de Assis Ruas Fernandes - Supervisor<br />
                <a href="mailto:saulo.fernandes@empreza.com.br">saulo.fernandes@empreza.com.br</a><br /><br />
                Lauro Filipe Silveira Pereira - Assistente <br />
                <a href="mailto:lauro.pereira@empreza.com.br">lauro.pereira@empreza.com.br</a><br /><br /></li>
             </ul>
	   <?php break;
	   
	   default: ?>
	       	<h3>Bem vindos a intranet</h3>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            A Intranet tem por objetivo tornar a divulgação da informação mais eficaz através de todos os 
            setores da empresa, 
            contribuindo com o acesso rápido às informações necessárias para as diferentes áreas de trabalho: tais como RH, 
            Procedimentos e Assuntos Referentes à Liderança (como anúncios, ou divulgações em geral).</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            A Intranet é um sistema de interface parcialmente aberta, ou seja, sem que o usuário efetue 
            login ele terá acesso 
            à basicamente todas as informações necessárias. Existem algumas ferramentas que necessitam de login para que sejam 
            utilizadas, essas ferramentas são liberadas conforme o perfil do usuário.
            </p>
       <?php break; ?>    
    <?php }?>
</div>