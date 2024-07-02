<?php
Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', 'Auth\LoginController@login')->name('admin.home');

Route::get('admin', 'Admin\BalancoController@index')->name('admin.balance');
Route::get('admin/balance', 'Admin\BalancoController@index')->name('admin.balance');

Route::get('admin/depositar-filtro', 'Admin\BalancoController@depositarfiltro')->name('balance.depositar_filtro');
Route::get('admin/depositar', 'Admin\BalancoController@depositar')->name('balance.depositar');
Route::post('admin/depositar/salvar', 'Admin\BalancoController@depositarStore')->name('depositar.store');

Route::get('admin/saque', 'Admin\BalancoController@withdraw')->name('balance.withdraw');
Route::post('admin/sacar', 'Admin\BalancoController@withdrawStore')->name('withdraw.store');

Route::get('admin/transfer-filtro', 'Admin\BalancoController@transferifiltro')->name('balance.transfer_filtro');
Route::get('admin/transfer', 'Admin\BalancoController@transfer')->name('transfer');
Route::post('admin/transferir', 'Admin\BalancoController@transferStore')->name('transfer.store');
//Route::post('admin/confirm-transfer', 'Admin\BalancoController@confirmTransfer')->name('confirm.transfer');


Route::post('admin/pagar', 'Admin\BalancoController@pagarStore')->name('pagamento.store');
Route::get('admin/pagamento', 'Admin\BalancoController@pagamento')->name('pagamento.withdraw');

Route::any('admin/historic-search', 'Admin\BalancoController@searchHistoric')->name('historic.search');
Route::get('admin/historic', 'Admin\BalancoController@historic')->name('admin.historic');

Route::get('/', 'Admin\AdminController@index')->name('admin.home');

Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
Route::get('perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

Route::get('registrar','Admin\UserController@registrar');
Route::post('salvar','Admin\UserController@salvar');

Route::get('alterar_senha','Admin\UserController@alterarsenha');
Route::post('alterar_senha-salvar','Admin\UserController@alterarsenhasalvar');

Route::any('historic-search-user', 'Admin\UserController@searchHistoricuser')->name('historic_user.search');
Route::get('historic-user','Admin\UserController@historicuser')->name('auth.historic_user');
Route::get('ativar/{id}','Admin\UserController@ativar')->name('ativar');
Route::get('desativar/{id}','Admin\UserController@desativar')->name('desativar');
Route::get('resetar/{id}','Admin\UserController@resetar')->name('ativar');

Route::get('admin/cliente','Admin\ClienteController@index');
Route::post('admin/salvar','Admin\ClienteController@clisalvar');

Route::any('historic-search-cliente', 'Admin\ClienteController@searchHistoriccliente')->name('historic_cliente.search');
Route::get('historic-cliente','Admin\ClienteController@historiccliente')->name('historic_cliente');
Route::get('excluir_cliente/{id}','Admin\ClienteController@excluircliente')->name('excluir_cliente');

Route::get('cadastro-tarifa-cartao','Admin\CartaoController@atualizar');
Route::post('cadastro-tarifa-cartao-salvar','Admin\CartaoController@tarifasalvar');

Route::get('Zerar_banco','Admin\BalancoController@zerarbd');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('lougot');




