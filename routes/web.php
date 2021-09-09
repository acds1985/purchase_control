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
/*/
Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin'], function(){
    Route::get('/','AuthController@showLoginForm')->name('login');
});*/

/** Login e Autenticação */
Route::get('/','AuthController@showLoginForm')->name('login');
Route::post('login','AuthController@login')->name('login.do');

/** Rotas protegidas */
Route::group(['middleware' => ['auth']], function(){
    /** Dashboard home */
    Route::get('home','AuthController@home')->name('home');

    /** Users */
    Route::resource('users', 'UserController');

    /** company */
    Route::resource('config','ConfigController');

    /** Branches - Filiais */
    Route::resource('branches','BranchesController');

    /** Clients */
    Route::resource('clients', 'ClientsController');

    /** Autorizations */
    Route::any('autorization/inative/{id}', 'AutorizationController@inative')->name('autorization.inative');
    Route::any('autorization/autorize/{id}', 'AutorizationController@autorize')->name('autorization.autorize');
    Route::any('autorization/autorize/form/{id}', 'AutorizationController@autorize_form')->name('autorization.autorize_form');
    Route::post('autorization/confirm', 'AutorizationController@confirm')->name('autorization.confirm');
    Route::resource('autorization', 'AutorizationController');
    

    /** providers */
    Route::resource('providers', 'ProvidersController');
    

});
/** Logout */
Route::get('logout','AuthController@logout')->name('logout');

