<?php

//Parceiro  perfilParceiro 
Route::get('parceiro-perfil', 'UserController@perfilParceiro')->name('parceiro-perfil')->middleware('auth');
Route::get('parceiro-perfil-criar-conta', 'UserController@perfilCriarConta')->name('parceiro-perfil-criar-conta')->middleware('auth');
Route::post('parceiro-perfil-criar-conta-confirmar', 'UserController@storeConta')->name('parceiro-perfil-criar-conta-confirmar')->middleware('auth');
Route::get('parceiro-perfil-editar-conta', 'UserController@perfilEditarConta')->name('parceiro-editar-criar-conta')->middleware('auth');
Route::post('perfil.actualizar.confirmar', 'UserController@updatePerfil')->middleware('auth');
Route::get('perfil.editar', 'UserController@perfilEditarDados')->name('parceiro-editar-criar-dados')->middleware('auth');
Route::post('shop.actualizar.confirmar', 'UserController@updateShop')->middleware('auth');


Route::get('produtos-cadatrar-categoria', 'ProdutoController@createCategoria')->name('produtos-cadatrar-categoria')->middleware('auth');
Route::get('meus-produtos', 'ProdutoController@index')->name('meus-produtos')->middleware('auth');
Route::post('produtos-confirmar-cadatro-categoria', 'ProdutoController@storeCategpria')->name('produtos-confirmar-cadatro-categoria')->middleware('auth');
Route::get('produtos-cadatrar-produto', 'ProdutoController@createProduto')->name('produtos-cadatrar-produto')->middleware('auth');
Route::post('produtos-confirmar-cadatro-produto', 'ProdutoController@storeProduto')->name('produtos-confirmar-cadatro-produto')->middleware('auth');
Route::get('produtos-deletar-produto', 'ProdutoController@confirmdelete')->name('produtos-deletar-produto')->middleware('auth');
Route::post('produtos-confirmar-apagar-produto', 'ProdutoController@destroyProduto')->name('produtos-confirmar-apagar-produto')->middleware('auth');
Route::get('produtos-deletar-categoria', 'ProdutoController@confirmdeleteCategoria')->name('produtos-deletar-categoria')->middleware('auth');
Route::post('produtos-confirmar-apagar-categoria', 'ProdutoController@destroyCategoria')->name('produtos-confirmar-apagar-categoria')->middleware('auth');
Route::get('produtos-editar-produto', 'ProdutoController@confirmEditarProdutos')->name('produtos-editar-produto')->middleware('auth');
Route::post('produtos-confirmar-editar-produto', 'ProdutoController@updateProduto')->name('produtos-confirmar-editar-produto')->middleware('auth');

Route::get('faturacao-controle', 'FaturacaoController@index')->name('faturacao-controle')->middleware('auth');
Route::get('plano-controle', 'PlanoController@index')->name('plano-controle')->middleware('auth');

// Profissinal
Route::get('perfil', 'UserController@perfil')->name('perfil')->middleware('auth');

// ADMIN
Route::get('admin.cliente.sidebar', 'AdminController@indexClientes')->name('perfil')->middleware('auth');
Route::get('admin.profissional.sidebar', 'AdminController@indexProfissionais')->name('perfil')->middleware('auth');
Route::get('admin.parceiro.sidebar', 'AdminController@indexParceiros')->name('perfil')->middleware('auth');
Route::get('admin.perfil', 'AdminController@indexMyPerfil')->name('perfil')->middleware('auth');
Route::get('admin.user.bloquear/{id_user_type}/{id_user}', 'AdminController@blockUser')->name('perfil')->middleware('auth');
Route::get('admin.user.deletar/{id_user_type}/{id_user}', 'AdminController@deleteUser')->name('perfil')->middleware('auth');

//NEWS
Route::get('news.modal.store', 'AdminController@modalStoreNews')->name('news')->middleware('auth');
Route::post('news.store', 'AdminController@storeNews')->name('news')->middleware('auth');
Route::get('news.modal.deletar/{id_news}', 'AdminController@modalDeleteNews')->name('news')->middleware('auth');
Route::get('news.modal.editar/{id_news}', 'AdminController@modalEditNews')->name('news')->middleware('auth');
Route::post('news.deletar/{id_news}', 'AdminController@deleteNews')->name('news')->middleware('auth');
Route::post('news.editar/{id_news}', 'AdminController@updateNews')->name('news')->middleware('auth');

//Indicacoes
Route::post('pro.indicar.store', 'IndicarController@storeIndicarManual')->name('pro.indicar.store')->middleware('auth');
Route::get('pro.indicar.index', 'IndicarController@index')->name('pro.indicar.index')->middleware('auth');
Route::get('pro.indicar.model_store', 'IndicarController@model_store')->name('pro.indicar.model_store')->middleware('auth');
Route::get('pro.indicar.model_edit/{id}', 'IndicarController@model_edit')->name('pro.indicar.model_edit')->middleware('auth');
Route::post('pro.indicar.edit', 'IndicarController@editIndicarStatus')->name('pro.indicar.edit')->middleware('auth');
Route::get('pro.indicar.model_delete/{id}', 'IndicarController@model_delete')->name('pro.indicar.model_delete')->middleware('auth');
Route::post('pro.indicar.delete', 'IndicarController@editIndicarDelete')->name('pro.indicar.delete')->middleware('auth');
Route::get('pro.indicar.model_store_index', 'IndicarController@model_store_index')->name('pro.indicar.model_store_index')->middleware('auth');

Route::get('cliente.indicar.index', 'IndicarController@index')->name('cliente.indicar.index')->middleware('auth');
Route::post('cliente.indicar.store', 'IndicarController@storeIndicarManual')->name('cliente.indicar.store')->middleware('auth');
Route::get('cliente.indicar.model_store', 'IndicarController@model_store')->name('cliente.indicar.model_store')->middleware('auth');
Route::get('cliente.indicar.model_edit/{id}', 'IndicarController@model_edit')->name('cliente.indicar.model_edit')->middleware('auth');
Route::post('cliente.indicar.edit', 'IndicarController@editIndicarStatus')->name('cliente.indicar.edit')->middleware('auth');
Route::get('cliente.indicar.model_delete/{id}', 'IndicarController@model_delete')->name('cliente.indicar.model_delete')->middleware('auth');
Route::post('cliente.indicar.delete', 'IndicarController@editIndicarDelete')->name('cliente.indicar.delete')->middleware('auth');
Route::get('cliente.indicar.model_store_index', 'IndicarController@model_store_index')->name('cliente.indicar.model_store_index')->middleware('auth');

// Profisional Favorito
Route::get('cliente.pro.favorito.index', 'ProfissionalFavoritoController@my_pro_index')->name('cliente.pro.favorito.index')->middleware('auth');
Route::get('cliente.pro.favorito.new', 'ProfissionalFavoritoController@add_new_pro_index')->name('cliente.pro.favorito.index')->middleware('auth');
Route::get('cliente.pro.favorito.new.add/{cliente_id}/{profissional_id}', 'ProfissionalFavoritoController@add_new_pro_store')->name('cliente.pro.favorito.index')->middleware('auth');
Route::get('cliente.pro.favorito.delete/{profissional_id}', 'ProfissionalFavoritoController@my_pro_delete')->name('cliente.pro.favorito.delete')->middleware('auth');
Route::get('cliente.indicar.model_store_inv/{professional_id}', 'ProfissionalFavoritoController@model_store_on_fav')->name('cliente.indicar.model_store')->middleware('auth');

// ADMIN
Route::get('admin.afiliados', 'AdminController@indexAfiliado')->name('admin.index')->middleware('auth');
Route::get('admin.profissional', 'AdminController@indexProfissionais')->name('admin.index')->middleware('auth');
Route::get('admin.indicacoes', 'AdminController@indexIndicacoes')->name('admin.index')->middleware('auth');


//Ofertas
Route::post('pro.oferta.store', 'OfertaController@storeOfertaManual')->name('pro.oferta.store')->middleware('auth');
Route::get('pro.oferta.index', 'OfertaController@index')->name('pro.oferta.index')->middleware('auth');
Route::get('pro.oferta.model_store', 'OfertaController@model_store')->name('pro.oferta.model_store')->middleware('auth');
Route::get('pro.oferta.model_edit/{id}', 'OfertaController@model_edit')->name('pro.oferta.model_edit')->middleware('auth');
Route::post('pro.oferta.edit', 'OfertaController@editOfertaStatus')->name('pro.oferta.edit')->middleware('auth');
Route::get('pro.oferta.model_delete/{id}', 'OfertaController@model_delete')->name('pro.oferta.model_delete')->middleware('auth');
Route::post('pro.oferta.delete', 'OfertaController@editOfertaDelete')->name('pro.oferta.delete')->middleware('auth');
Route::get('pro.indicar.model_store_index', 'IndicarController@model_store_index')->name('pro.indicar.model_store_index')->middleware('auth');



Route::get('/', function () {
   return view('main');
})->middleware('auth');

Route::get('_perfil', function () {
    return view('telas/perfil');
 })->middleware('auth');

 Route::get('tables', function () {
    return view('telas/tables');
 })->middleware('auth');

 Route::get('billing', function () {
    return view('telas/billing');
 })->middleware('auth');

 Route::get('notification', function () {
    return view('telas/notification');
 })->middleware('auth');

 Route::get('produtos', function () {
   return view('parceiro/produtos');
})->middleware('auth');





















Route::get('/', 'HomeController@index')->name('home');



Route::post('extrato.por_intervalo', 'ContaController@buscarPorData')->name('extrato.por_intervalo')->middleware('auth');

Route::get('users', 'UserController@index')->name('users')->middleware('auth');
Route::get('user.edit', 'UserController@edit')->name('user.edit')->middleware('auth');
Route::get('user1.edit', 'UserController1@edit')->name('user1.edit')->middleware('auth');
Route::get('user.editcliente', 'UserController@editcliente')->name('user.editcliente')->middleware('auth');
Route::post('user.update', 'UserController@update')->name('user.update')->middleware('auth');
Route::post('user1.update', 'UserController1@update')->name('user1.update')->middleware('auth');
Route::post('user1.updatecliente', 'UserController@updatecliente')->name('user1.updatecliente')->middleware('auth');
Route::get('createuser', 'UserController@create')->name('createuser')->middleware('auth');
Route::post('storeuser', 'UserController@store')->name('storeuser')->middleware('auth');
Route::post('user.destroy', 'UserController@destroy')->name('user.destroy')->middleware('auth');
Route::post('search.user', 'UserController@search')->name('search.user')->middleware('auth');
Route::get('confirmdelete', 'UserController@confirmdelete')->name('confirmdelete')->middleware('auth');



Route::get('report.examlist', 'CheckingAccountController@accountSitauation')->name('report.examlist')->middleware('auth');
Route::get('generate.receipt', 'DynamicPDFController@pdf')->name('generate.receipt')->middleware('auth');


Route::get('conta.indexDebito', 'ContaController@indexDebito')->name('conta.indexDebito')->middleware('auth');
Route::get('conta.indexAjuste', 'ContaController@indexAjuste')->name('conta.indexAjuste')->middleware('auth');
Route::get('conta.indexCredito', 'ContaController@indexCredito')->name('conta.indexCredito')->middleware('auth');
Route::get('conta.indexGanho', 'ContaController@indexGanho')->name('conta.indexGanho')->middleware('auth');
Route::get('contas', 'ContaController@index')->name('contas')->middleware('auth');
Route::get('conta.show/{iduser}', 'ContaController@show')->name('conta.show')->middleware('auth');
Route::get('conta.indexx', 'HistoricoController@indexx')->name('conta.indexx')->middleware('auth');
Route::get('conta.extratopdf', 'HistoricoController@extratopdf')->name('conta.extratopdf')->middleware('auth');



Route::get('createcredito', 'CreditoController@create')->name('createcredito')->middleware('auth');
Route::post('storecredito', 'CreditoController@store')->name('storecredito')->middleware('auth');
Route::get('historicoalocar', 'CreditoController@historicoalocar')->name('historicoalocar')->middleware('auth');

Route::get('createdebito', 'DebitoController@create')->name('createdebito')->middleware('auth');
Route::post('storedebito', 'DebitoController@store')->name('storedebito')->middleware('auth');
Route::get('historicosaque', 'DebitoController@historicosaque')->name('historicosaque')->middleware('auth');

Route::get('createganho', 'GanhoController@create')->name('createganho')->middleware('auth');
Route::post('storeganho', 'GanhoController@store')->name('storeganho')->middleware('auth');
Route::get('historicoganho', 'GanhoController@historicoganho')->name('historicoganho')->middleware('auth');

Route::get('createAjuste', 'DebitoController@createAjuste')->name('createAjuste')->middleware('auth');
Route::post('storeAjuste', 'DebitoController@storeAjuste')->name('storeAjuste')->middleware('auth');
Route::get('historiconegativo', 'DebitoController@historiconegativo')->name('historiconegativo')->middleware('auth');

Route::get('notication', 'UserController@saque')->name('notication')->middleware('auth');
Route::post('noticationpost', 'UserController@saquePost')->name('noticationpost')->middleware('auth');
Route::get('storeconta', 'UserController@carregamento')->name('storeconta')->middleware('auth');
Route::post('storecontapost', 'UserController@carregarConta')->name('storecontapost')->middleware('auth');
Route::get('notelist', 'NotificationController@index')->name('notelist')->middleware('auth');
Route::post('changenotication', 'NotificationController@changenote')->name('changenotication')->middleware('auth');


Route::get('generate.receipt', 'DynamicPDFController@pdf')->name('generate.receipt')->middleware('auth');
Route::get('generate.receiptdb', 'DynamicPDFController@pdfdb')->name('generate.receiptdb')->middleware('auth');
Route::get('arquivos', 'ArquivoController@index')->name('arquivos')->middleware('auth');
Route::get('arquivosuser/{iduser}', 'ArquivoController@show')->name('arquivosuser')->middleware('auth');
Route::get('arquivosuserpdf/{id}', 'ArquivoController@verPdf')->name('arquivosuserpdf')->middleware('auth');
Route::post('file.destroy', 'ArquivoController@destroy')->name('file.destroy')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
