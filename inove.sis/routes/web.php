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


Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Novas Rotas Rodrigo
//Eventos
Route::get('/listaevento', 'EventoController@index');
Route::get('/listaeventopendentes', 'EventoController@pendentes');
Route::get('/listaeventofechado', 'EventoController@fechado');
Route::get('/listaeventorealizado/{id}', 'EventoController@realizado');
Route::get('/listaeventoreabrir/{id}', 'EventoController@reabrir');
Route::get('/evento/cadastro', 'EventoController@new');

Route::any('/addevento', 'EventoController@store');

Route::get('/evento/vizualiza/{id}', 'EventoController@visualiza');

Route::any('/updateevento', 'EventoController@update');

Route::post('/updateeventobar', 'EventoController@updatebar');

Route::post('/evento/busca', 'EventoController@busca');

Route::get('/evento/gerabart', 'EventoController@gerabart');

Route::get('/evento/excluir/{id}', 'EventoController@excluir');

Route::get('/listaeventobar', 'EventoController@listaev');

Route::post('/eventos/imprimilibera','EventoController@listarevbart');


//rota para os select dinamico bartenders modal na form edita visua_evento
Route::resource( '/evento/SelectBartenders/','EventoController@visualiza');
Route::get('/evento/SelectBartenders/SelectBartendersresultado/{id}','EventoController@SelectBartendersresultado');
Route::get('/evento/SelectBartenders/SelectBartendersresultado1/{id}','EventoController@SelectBartendersresultado1');
Route::get('/evento/SelectBartenders/SelectBartendersresultado2/{id}','EventoController@SelectBartendersresultado2');
//eventos

//bartenderes
Route::get('/listabartenders', 'BartenderController@index');
Route::get('/bartenders/cadastro', 'BartenderController@new');
Route::post('/bartenders/libera','BartenderController@libera');

Route::post('/addbartenders', 'BartenderController@store');

Route::get('/bartenders/vizualiza/{id}', 'BartenderController@visualiza');

Route::any('/updatebartenders', 'BartenderController@update');

Route::post('/bartenders/busca', 'BartenderController@busca');

Route::get('/bartenders/excluir/{id}', 'BartenderController@excluir');

Route::get('/bartenders/desativar/{id}', 'BartenderController@desativar');

Route::get('/bartenders/reativacao', 'BartenderController@reativacao');

Route::get('/bartenders/reativar/{id}', 'BartenderController@reativar');

//cliente
Route::get('/listaclientes', 'ClienteController@index');
Route::get('/clientes/cadastro', 'ClienteController@new');
Route::post('/addclientes', 'ClienteController@store');

Route::get('/clientes/vizualiza/{id}', 'ClienteController@visualiza');

Route::any('/updateclientes', 'ClienteController@update');

Route::post('/clientes/busca', 'ClienteController@busca');

Route::get('/clientes/excluir/{id}', 'ClienteController@excluir');


//recuperar senha
Route::get('/resetar', 'ResetarController@resetar');
Route::post('/recuperar', 'ResetarController@recuperar');
//-----------------------------------------------------//



//usuario nova conta telefonica
Route::get('/registrar', 'RegistrarController@registrar');
Route::post('/registrar_validar', 'RegistrarController@verificarregistrar');
//-----------------------------------------------------------------------//


//abre formulário para alteração do email do telefonica
Route::get('/email_alterar/', 'RegistrarController@formemail');
Route::post('/email_alterar/salvar', 'RegistrarController@salvaremail');
//-----------------------------------------------------//


//altera senha
Route::get('/alterar_senha', 'AlterarSenhaController@index');
Route::post('/alterar_senha/salvar', 'AlterarSenhaController@salvar');
//---------------------------------------------------------------------//
