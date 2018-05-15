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
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/term', function () {
    return view('term');
});
Route::get('/adminpanelcos', function () {
    return view('admin.login');
});

//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout');
Route::any('loginadmin', array('as' => 'loginadmin', 'uses' => 'AdminController@index'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');