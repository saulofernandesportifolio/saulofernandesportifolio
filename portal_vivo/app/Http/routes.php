<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//caso tenten executar o post direto pela url
Route::get('/registrar_validar', function () {

  return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/logar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/alterar_senha/salvar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/recuperar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/busca', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/novo', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/salvar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/visualiza', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/busca_fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/visualiza_fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/reabrir', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/form_reaberto', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/salvar_reaberto', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/parceiro/email_alterar/', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});



Route::get('/contestacao', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/busca', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/novo', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/salvar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/visualiza', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/busca_fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/visualiza_fechado', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/reabrir', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/form_reaberto', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/salvar_reaberto', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/fechado_sup', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});


Route::get('/contestacao/busca_fechado_sup', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/form_editar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/contestacao/salvar_editar', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

Route::get('/email_alterar/', function () {

    return redirect('/login')->with('erros','Usuário não autorizado, entrar em contato com o administrador do sistema !');
});

//----------------------------------------------------------//


//------------------links sistema--------------------------//

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


   //altera senha
    Route::get('/alterar_senha', 'AlterarSenhaController@index');
    Route::post('/alterar_senha/salvar', 'AlterarSenhaController@salvar');
   //---------------------------------------------------------------------//

    //recuperar senha
    Route::get('/resetar', 'ResetarController@resetar');
    Route::post('/recuperar', 'ResetarController@recuperar');
    //-----------------------------------------------------//


   //usuario nova conta parceiro
    Route::get('/registrar_parceiro', 'RegistrarParceiroController@registrar');
    Route::post('/registrar_validar_parceiro', 'RegistrarParceiroController@verificarregistrar');
   //-----------------------------------------------------------------------//

   //usuario nova conta telefonica
   Route::get('/registrar_telefonica', 'RegistrarTelefonicaController@registrar');
   Route::post('/registrar_validar_telefonica', 'RegistrarTelefonicaController@verificarregistrar');
   //-----------------------------------------------------------------------//


   //usuario nova conta contestacao
   Route::get('/registrar_contestacao', 'RegistrarContestacaoController@registrar');
   Route::post('/registrar_validar_contestacao', 'RegistrarContestacaoController@verificarregistrar');
   //-----------------------------------------------------------------------//


   //acassar a pagina principal
    Route::get('/home', 'HomeController@index');
   //-----------------------------------------------------//


   //acassar fila parceiro
    Route::get('/parceiro', 'ParceiroController@index');
   //-----------------------------------------------------//

   //realiza a busca na fila parceiro
   Route::post('/parceiro/busca', 'ParceiroController@busca');
   //-----------------------------------------------------//

   //abrir o fom do parceiro
   Route::get('/parceiro/novo', 'ParceiroController@novo');
   Route::post('/parceiro/salvar', 'ParceiroController@salvar');
   //-----------------------------------------------------//

   //visualizar
   Route::get('/parceiro/visualiza/{id}', 'ParceiroController@visualiza');
   //-----------------------------------------------------//


   //acassar fila parceiro fechado
   Route::get('/parceiro/fechado', 'ParceiroController@fechado');
  //-----------------------------------------------------//

  //realiza a busca na fila parceiro fechado
  Route::post('/parceiro/busca_fechado', 'ParceiroController@busca_fechado');
  //-----------------------------------------------------//

  //visualizar fechado
  Route::get('/parceiro/visualiza_fechado/{id}', 'ParceiroController@visualiza_fechado');
  //-----------------------------------------------------//

  //reabrir
  Route::post('/parceiro/reabrir', 'ParceiroController@reabrir');
  //-----------------------------------------------------//

  //reabrir abre formulário
  Route::get('/parceiro/form_reaberto', 'ParceiroController@abrirform');
  Route::post('/parceiro/salvar_reaberto', 'ParceiroController@salvarreaberto');
  //-----------------------------------------------------//

  //acassar fila contestacao
  Route::get('/contestacao', 'ContestacoesController@index');
  //-----------------------------------------------------//

  //realiza a busca na fila contestacoes
  Route::post('/contestacao/busca', 'ContestacoesController@busca');
  //-----------------------------------------------------//

  //visualizar
  Route::get('/contestacao/visualiza/{id}', 'ContestacoesController@visualiza');
  //-----------------------------------------------------//

  //abrir o form da contestacao
  Route::get('/contestacao/form/{id}', 'ContestacoesController@novo');
  Route::post('/contestacao/salvar', 'ContestacoesController@salvarcontestacao');
  //-----------------------------------------------------//
  //rota para os select dinamico
  Route::resource( '/contestacao/motivos/','MotivosController@index');
  Route::get('/contestacao/motivos/submotivos/{id}','MotivosController@getSubmotivos');

   //acassar fila parceiro fechado
   Route::get('/contestacao/fechado', 'ContestacoesController@fechado');
   //-----------------------------------------------------//

   //realiza a busca na fila parceiro fechado
   Route::post('/contestacao/busca_fechado', 'ContestacoesController@busca_fechado');
   //-----------------------------------------------------//

   //acassar fila parceiro fechado supervisor
   Route::get('/contestacao/fechado_sup', 'ContestacoesController@fechadosup');
   //-----------------------------------------------------//

   //realiza a busca na fila parceiro fechado
   Route::post('/contestacao/busca_fechado_sup', 'ContestacoesController@busca_fechadosup');
   //-----------------------------------------------------//

  //visualizar fechado
  Route::get('/contestacao/visualiza_fechado/{id}', 'ContestacoesController@visualiza_fechado');
  //-----------------------------------------------------//

   //acassar fila contestacao supervisor editar
   Route::get('/contestacao/form_editar/{id}', 'ContestacoesController@editarsup');
   Route::post('/contestacao/salvar_editar', 'ContestacoesController@salvareditarsup');
   //-----------------------------------------------------//


  //reabrir
  //Route::post('/contestacao/reabrir', 'ParceiroController@reabrir');
  //-----------------------------------------------------//

  //abre formulário para alteração do email do parceiro
  Route::get('/parceiro/email_alterar/', 'RegistrarParceiroController@formemail');
  Route::post('/parceiro/email_alterar/salvar', 'RegistrarParceiroController@salvaremail');
 //-----------------------------------------------------//


  //abre formulário para alteração do email do telefonica
  Route::get('/email_alterar/', 'RegistrarTelefonicaController@formemail');
  Route::post('/email_alterar/salvar', 'RegistrarTelefonicaController@salvaremail');
  //-----------------------------------------------------//


  //exportação da base
  Route::get('/exportar', 'Exportar_baseController@index');
  Route::post('/exportar/gerar', 'Exportar_baseController@abrirexcel');
  Route::post('/exportar/excel', 'Exportar_baseController@gerar');
  //-----------------------------------------------------//

//reabrir abre formulário


//---------------------------fim links sistema-----------------------------//