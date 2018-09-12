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

//rota criada para a view de edição e apresentação receberem o GET. Alterar o DashboardController a função "edita"
Route::get('ficha/edit/{id}/{apresenta}', array('uses' => 'DashboardController@edita', 'as' => 'ficha.edita'));
//route to get the log in form
Route::get('/', array('uses' => 'HomeController@index', 'as' => 'inicio'));

//route to process the log in form
Route::post('/', 'LogInController@doLogin');

Route::get('/account/sign-out', array(
  'as' => 'account-sign-out',
  'uses' => 'LogInController@getSignOut'
));

Route::resource('ficha', 'DashboardController');

Route::get('/dashboard', array(
  'as' => 'dashboard',
  'uses' => 'DashboardController@dash'
));

Route::get('/aprova', array(
  'as' => 'aprova',
  'uses' => 'DashboardController@aprova'
));

Route::post('/outro', array(
  'as' => 'outro',
  'uses' => 'LogInController@outro'
));

Route::get('/tcu', array(
  'as' => 'tcu',
  'uses' => 'DashboardController@tcu'
));

Route::get('ficha/{ficha}/print', array(
  'as' => 'ficha.impressao',
  'uses' => 'DashboardController@print'
));

Route::get('ficha/{ficha}/print_verso', array(
  'as' => 'ficha.impressao_verso',
  'uses' => 'DashboardController@print_verso'
));

Route::get('voltarPerfil', array(
  'as' => 'voltarPerfil',
  'uses' => 'LogInController@volta_perfil'
));

Route::get('verTodasOs', array(
  'as' => 'verTodasOs',
  'uses' => 'DashboardController@admin'
));
