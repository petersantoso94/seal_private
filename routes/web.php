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
Route::any('sendcash', array('as' => 'sendcash', 'uses' => 'AdminController@sendcash'));
Route::any('editpage', array('as' => 'editpage', 'uses' => 'AdminController@editpage'));
Route::any('logoutadmin', array('as' => 'logoutadmin', 'uses' => 'AdminController@logout'));
Route::any('postValid', array('as' => 'postValid', 'uses' => 'AdminController@postValid'));
Route::any('postDelete', array('as' => 'postDelete', 'uses' => 'AdminController@postDelete'));
Route::any('editEvent', array('as' => 'editEvent', 'uses' => 'AdminController@editEvent'));
Route::any('postDeleteEvent', array('as' => 'postDeleteEvent', 'uses' => 'AdminController@postDeleteEvent'));
Route::any('postCash', array('as' => 'postCash', 'uses' => 'AdminController@postCash'));
Route::any('postItems', array('as' => 'postItems', 'uses' => 'AdminController@postItems'));
Route::any('postItemsAdd', array('as' => 'postItemsAdd', 'uses' => 'AdminController@postItemsAdd'));
Route::get('/home', 'HomeController@index')->name('home');
Route::any('browse/{id}', array('as' => 'browse', 'uses' => 'HomeController@browse'));

Auth::routes();
