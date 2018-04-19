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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  Route::get('/administracion', 'Admin\\AdminController@index')->name('administracion');
  Route::resource('/almacen', 'Admin\\AlmacenController');
  Route::resource('/categoria', 'Admin\\CategoriaController');
  Route::resource('/marca', 'Admin\\MarcaController');
  Route::resource('/subcategoria', 'Admin\\SubcategoriaController');
  Route::resource('/producto', 'Admin\\ProductoController');
  Route::resource('/descuento', 'Admin\\DescuentoController');
  Route::resource('/cliente', 'Admin\\ClienteController');
  Route::resource('/perfil', 'Admin\\PerfilController');
  Route::get('/cuenta_perfil', 'Admin\\PerfilController@cuenta_perfil');
  Route::resource('/proforma', 'Admin\\ProformaController');
  Route::get('/extraerdatoscli/','Admin\\ProformaController@extraerdatoscliente');
  Route::post('/saveprod/', 'ComponentController@saveproducto');
  Route::get('/listcartitems/', 'ComponentController@listallitems');
  Route::post('/trashItem/','ComponentController@trashItem');
  Route::post('/deleteItem/','ComponentController@deleteItem');
  Route::get('/proforma/verproforma/{id}','Admin\\ProformaController@verproforma');
  Route::get('/proforma/downloadproforma/{id}','Admin\\ProformaController@downloadproforma');
  Route::get('/proforma/send_proforma/{id}','Admin\\ProformaController@send_mail');
  Route::resource('/iva', 'Admin\\IvaController');
  Route::resource('/clausula', 'Admin\\ClausulaController');
});


