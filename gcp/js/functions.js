/**
Nome: functions.js


/**
Fun��o: Toda codifica��o respons�vel pela manipula��o dos dados no lado Cliente e funcionalidades AJAX � feita aqui.
*/

/** 
Aqui informamos ao navegador que, assim que o site for carregado, ele executar� as instru��es que est�o neste bloco.
Igual o onload() que coloca-se na tag body do html 
*/

$(document).ready(function(){
	
	//abaixo usamos o seletor da jQuery para acessar o bot�o, e em seguida atribuir � ele um evento de click
	$("#entrar").click(function(){
	
		//Aqui chamamos a fun��o validaLogin(), e passamos a ela o que foi digitado no campo com id='login' e no campo com id='senha'
		validaLogin($("#usuario"), $("#senha"));
	
	});

});

/** Fun��o respons�vel por validar os dados do formul�rio no lado Cliente, e enviar para a cama Controller (que est� no Servidor) os dados informados pelo usu�rio para serem autenticados */
function validaLogin(usuario, senha){
	
	if(usuario.val() == ""){
       alert("Informe o usu\u00e1rio!"); //Exibe um alerta 
		usuario.focus(); //Adiciona foco ao campo com id='usuario'
		return; //retorna nulo
	}
	else if(senha.val() == ""){
		alert("Informe a senha!");
		senha.focus();
		return;
	}
	//Se o usu�rio informou login e senha, ent�o � hora do Ajax entrar em a��o
	else{
	 //Adicionamos um texto na DIV #resultado para alertar o usu�rio que o sistema est� autenticando os dados
		$("#resultado").html("Autenticando...");
		
		/**Fun��o ajax nativa da jQuery, onde passamos como par�metro o endere�o do arquivo que queremos chamar, os dados que ir� receber, e criamos de forma encadeada a fun��o que ir� armazenar o que foi retornado pelo servidor, para poder se trabalhar com o mesmo */
		           
           $.post("valida.usuario.php", {usuario: usuario.val(), senha: senha.val()},
           
			function(retorno){
				
				//Insere na DIV #resultado o que foi retornado pelas classes de manipula��o do Usu�rio (Se os dados est�o corretos ou n�o)
				$("#resultado").html(retorno);
				
			} //function(retorno)
		); //$.post()
	
	}
	
} //validaLogin()