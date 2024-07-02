// JavaScript Document
//autor: Lauro Pereira

//Inclui dojo.io e IframeIO
dojo.require("dojo.io.*");
dojo.require("dojo.io.IframeIO");

//Método que inicializa ao carregar a página
function init( ){
	//captura o botão
	var btEnviar = dojo.byId("enviar");
	//adiciona o evento ao onclick ao botão
	//através de dojo.event.connect
	//incluindo o metodo enviarArq()
	dojo.event.connect(btEnviar, "onclick", "enviarArq");
}

//método que submete o formulário
function enviarArq( ){
	//captura o local onde aparecerá o texto Enviando...
	var saida = dojo.byId("output");
	//o exibe enquanto é enviado o arquivo
	saida.style.visibility="visible";
	var ctr = 0;
	//captura o formulario
	var form = dojo.byId("uploadForm");
	//o local onde aparecerá a mensagem do servidor
	var resultado = dojo.byId("msg");
	//monta os argumentos
	var bindArgs = {
		formNode: form,
		mimetype: "text/html",
		content: {
			increment: ctr++,
			fileFields: "arq"
		},
		load: function(type, data, evt) {
			//limpa o formulário
			//beste casi bçai se pode atribuir
			//value="" no campo file
			//pois funciona no firefox e nao no IE
			form.reset( );
			//oculta o Enviando...
			saida.style.visibility="hiden";
			//captura o corpo da pagina
			var r = data.getElementsByTagName("body")[0];
			//move a leitura para o seu primeiro filho
			//que no caso é o texto encontrado dentro de body
			r=r.firstChild;
			//exibe o testo encontrado
			//desde que não hajaoutras tags
			resultado.innerHTML = r.nodeValue;
		}
	};
	//transmite os argumentos em dojo.io.bind()
	dojo.io.bind(bindArgs);
}
//inicializa o método init ()
//em um evento onload
dojo.addOnLoad(init);