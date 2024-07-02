<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//pagina para testes
Route::get('/teste', 'OcorrenciaController@testelay');

//default
Route::get('/', 'LoginController@index');
//-----------------------------------------------------//

//usuario login
Route::get('/login', 'LoginController@login');
Route::post('/logar', 'LoginController@executarlogin');
//-----------------------------------------------------//

//usuario logout
Route::get('/logout', 'LoginController@logout');
//-----------------------------------------------------//

//acassar a pagina principal
Route::get('/home', 'HomeController@index');
//-----------------------------------------------------//

//realiza a busca na fila ocorrencia
Route::any('/home/busca', 'HomeController@busca');
//-----------------------------------------------------//

//acassar a pagina principal
Route::get('/dashboard', 'HomeController@dashboard');
//-----------------------------------------------------//


//acassar a pagina ocorrencia
Route::get('/ocorrencia', 'OcorrenciaController@show');
//-----------------------------------------------------//

//Salvar dados preenchidos em ocorrencia
Route::post('/ocorrencia/salvar', 'OcorrenciaController@salvar');
//-----------------------------------------------------//


//listar dados preenchidos em ocorrencia
Route::any('/ocorrencia/consulta', 'OcorrenciaController@consulta');
Route::any('/ocorrencia/lista', 'OcorrenciaController@lista');
//Route::get('/ocorrencia/lista', 'OcorrenciaController@index');
//-----------------------------------------------------//

//realiza a busca na fila ocorrencia
Route::post('/ocorrencia/busca', 'OcorrenciaController@busca');
//-----------------------------------------------------//

//rota para os select dinamico
Route::resource( '/ocorrencia/desgasterolamentos/','OcorrenciaController@index');
Route::get('/ocorrencia/desgasterolamentos/recomendacaos/{id}','OcorrenciaController@getRecomendacaos');


//rota para os select dinamico cliente modal na form cadastro
Route::resource( '/ocorrencia/SelectCliente/','OcorrenciaController@show');
Route::get('/ocorrencia/SelectCliente/SelectClienteresultado/{cliente}','OcorrenciaController@SelectClienteresultado');

//rota para busta pela tag do cliente/setor/equipamentos/potencia
Route::get('/ocorrencia/funcition/{tag}','OcorrenciaController@retornacliente');



//acassar a pagina feedback
//visualizar
Route::get('/ocorrencia/visualiza/{id}', 'OcorrenciaController@visualiza');
Route::get('/ocorrencia/download/{id}', 'OcorrenciaController@download');

//feedback
Route::get('/ocorrencia/feedback/{id}', 'OcorrenciaController@feedback');
Route::any('/ocorrencia/enviafeedback/{id}', 'OcorrenciaController@enviafeedback');
Route::any('/ocorrencia/viusualizafeedback/{id}', 'OcorrenciaController@vizualizafeed');
Route::any('/ocorrencia/consultafeed/', 'OcorrenciaController@consultaFeed');
Route::any('/ocorrencia/feedlist/', 'OcorrenciaController@feedList');
Route::any('/ocorrencia/deletar/{id}', 'OcorrenciaController@delRegister');


//Nova ocorrencia - atraves da TAGs da tela Home
Route::get('ocorrencia/new/{id}', 'OcorrenciaController@novaOcorrenciaHome');
Route::post('ocorrencia/new/save', 'OcorrenciaController@salvaNovaOcorrencia');

//------------------------------//
//clientes e equipamentos
Route::get('/cliente/cadastro', 'ClienteController@novo');
Route::post('/cliente/salvar', 'ClienteController@salvar');
Route::any('/cliente/lista/', 'ClienteController@lista');

Route::get('cliente /ocorrencia/visualiza/{id}', 'ClienteController@visualiza');

Route::get('/cliente/equipamentos', 'ClienteController@equipamento');
Route::get('/equipamento/cadastro', 'ClienteController@equinovo');
Route::post('/equipamento/salvar', 'ClienteController@equisalva');

//importar equipamentos
Route::get('/adm/importar', 'OcorrenciaController@importEqui');
Route::post('/adm/enviaimport', 'OcorrenciaController@enviaImport');


//Perfil cliente

Route::any('/cliente/home', 'HomecliController@index');
Route::any('/cliente/home/busca', 'HomecliController@busca');
Route::get('/cliente/analise/abertas', 'ClienteController@abertas');
Route::get('/cliente/ocorrencias', 'ClienteController@ocorrencias');
Route::any('/cliente/analise/visualiza/{id}', 'ClienteController@visualiza');

Route::get('/cliente/feedback/{id}', 'ClienteController@feedback');
Route::any('/cliente/analise/viusualizafeedback/{id}', 'ClienteController@visualizafeedback');
Route::any('/cliente/enviafeedback/{id}', 'ClienteController@enviafeedback');
Route::any('/cliente/resalvar/{id}', 'ClienteController@resalvar');

Route::get('/cliente/analise/consulta', 'ClienteController@consultaList');
Route::any('/cliente/analise/lista', 'ClienteController@listResult');
Route::get('cliente/analise/feed', 'ClienteController@consultaFeed');
Route::any('cliente/analise/feedlist', 'ClienteController@feedList');


//-----------------------------------------------------//
//Dashboards

//por cliente
Route::any('/ocorrencia/dash', 'OcorrenciaController@dashselcliente');
Route::any('/ocorrencia/enviadash', 'OcorrenciaController@enviadash');

//perfil cliente
Route::get('cliente/analise/dash', 'ClienteController@consultaDash');


//detalhados
Route::get('/ocorrencia/lista/abertas', 'OcorrenciaController@listaAbertas');
Route::get('/ocorrencia/lista/feedbacks', 'OcorrenciaController@listaFeed');
Route::get('/ocorrencia/lista/total', 'OcorrenciaController@listaTotal');
Route::get('/ocorrencia/lista/desrol', 'OcorrenciaController@listaDesrol');

//CARDS - Perfil Cliente
Route::get('cliente/analise/normais', 'ClienteController@listaNormais');
Route::get('cliente/analise/alarme1', 'ClienteController@listaAlarme1');
Route::get('cliente/analise/alarme2', 'ClienteController@listaAlarme2');
Route::get('cliente/analise/feedbacks', 'ClienteController@listaFeed');
Route::get('cliente/analise/abertas', 'ClienteController@listaAbertas');

//Form Nao monitorado
Route::get('/ocorrencia/atulnaomonit/{id}', 'OcorrenciaController@atulnaomonit');
Route::post('/ocorrencia/enviaatulnaomonit/{id}', 'OcorrenciaController@enviaatulnaomonit');

//Edicao de CLientes
Route::get('cliente/cad/visualiza/{id}', 'ClienteController@edit');
Route::any('cliente/cad/resalvar/{id}', 'ClienteController@resave');

//PDF
Route::get('/ocorrencia/pdf/{id}', 'OcorrenciaController@geraPdf');


//recuperar senha
Route::get('/resetar', 'ResetarController@resetar');
Route::post('/recuperar', 'ResetarController@recuperar');
//-----------------------------------------------------//

//usuario nova conta
Route::get('/registrar', 'RegistrarController@registrar');
Route::post('/registrar_validar', 'RegistrarController@verificarregistrar');
//-----------------------------------------------------------------------//


//usuario nova conta
Route::get('/editar', 'RegistrarController@editar');
Route::post('/editar_validar', 'RegistrarController@verificareditar');
//-----------------------------------------------------------------------//

//realiza a busca na fila usuario
Route::post('/editar/busca', 'RegistrarController@busca');
//-----------------------------------------------------//

//usuario alterar
Route::get('/editar/alterar_user/{id}', 'RegistrarController@alterar');
Route::post('/editar/alterado', 'RegistrarController@alterado');

//alteração de senha
Route::any('/alterarsenha', 'RegistrarController@novasenha');
Route::any('/alterar_senha/salvar', 'RegistrarController@alterarsenha');

//-----------------------------------------------------------------------//
//Routas para Lubrificao
Route::get('/lubrificacao', 'LubrificacaoController@cadastrar');
Route::post('/lubrificacao/salvar', 'LubrificacaoController@salvar');
Route::get('/lubrificacao/lista', 'LubrificacaoController@lista');
Route::get('/lubrificacao/visualiza/{id}', 'LubrificacaoController@visualiza');
Route::get('lubrificacao/reedit/{id}','LubrificacaoController@reedit');
Route::post('lubrificacao/resalva/{id}','LubrificacaoController@reSalva');
//Perfil Client
Route::get('cliente/lubrificacao/lista','ClienteController@listaLubrif');
Route::get('cliente/lubrificacao/visualiza/{id}', 'ClienteController@visualizaLubrif');

//Cadastos e consultas de lubrificantes e pontos
Route::get('/lubrificacao/lubrificantes/lista', 'LubrificacaoController@listaLubrif');
Route::get('/lubrificacao/lubrificantes/cadastro', 'LubrificacaoController@cadLubrif');
Route::post('/lubrificacao/lubrificantes/salvar', 'LubrificacaoController@salvaLubrif');
Route::get('/lubrificacao/pontos/lista', 'LubrificacaoController@listaPontos');
Route::get('/lubrificacao/pontos/cadastro', 'LubrificacaoController@cadPontos');
Route::post('/lubrificacao/pontos/salvar', 'LubrificacaoController@salvaPonto');

//Novo perfil - Contas

Route::get('/cliente/conta/home','HomeContaController@index');
Route::post('/cliente/conta/home/busca','HomeContaController@busca');
Route::get('/cliente/conta/analise/abertas','ContaController@listaAbertas');
Route::get('/cliente/conta/analise/consulta','ContaController@consultaList');
Route::get('/cliente/conta/analise/feed','ContaController@consultaFeed');
//Route::get('/cliente/conta/lubrificacao/lista','');
Route::get('/cliente/conta/analise/dash','ContaController@consultaDash');
Route::post('/cliente/contas/enviadash','ContaController@dashResult');


//PDFs (GERAL)
Route::any('/home/pdf/{id}','HomeController@geraPDF');

