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
    return view('home')->with('page','home');
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
    return view('term')->with('page','term');
});
Route::get('/fanart', function () {
    return view('fanart')->with('page','fanart');
});
Route::get('/guildRank', function () {
    return view('guildrank');
});
Route::get('/coupleRank', function () {
    return view('couplerank');
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
Route::any('editfanart', array('as' => 'editfanart', 'uses' => 'AdminController@editfanart'));
Route::any('editnews', array('as' => 'editnews', 'uses' => 'AdminController@editnews'));
Route::any('logoutadmin', array('as' => 'logoutadmin', 'uses' => 'AdminController@logout'));
Route::any('loginmanual', array('as' => 'loginmanual', 'uses' => 'HomeController@loginmanual'));
Route::any('logoutmanual', array('as' => 'logoutmanual', 'uses' => 'HomeController@logoutmanual'));
Route::any('postValid', array('as' => 'postValid', 'uses' => 'AdminController@postValid'));
Route::any('postDelete', array('as' => 'postDelete', 'uses' => 'AdminController@postDelete'));
Route::any('editEvent', array('as' => 'editEvent', 'uses' => 'AdminController@editEvent'));
Route::any('postDeleteEvent', array('as' => 'postDeleteEvent', 'uses' => 'AdminController@postDeleteEvent'));
Route::any('postDeleteFanart', array('as' => 'postDeleteFanart', 'uses' => 'AdminController@postDeleteFanart'));
Route::any('postCash', array('as' => 'postCash', 'uses' => 'AdminController@postCash'));
Route::any('postItems', array('as' => 'postItems', 'uses' => 'AdminController@postItems'));
Route::any('postItemsAdd', array('as' => 'postItemsAdd', 'uses' => 'AdminController@postItemsAdd'));
Route::any('checkPIN', array('as' => 'checkPIN', 'uses' => 'HomeController@checkPIN'));
Route::any('forgetPass', array('as' => 'forgetPass', 'uses' => 'HomeController@forgetPass'));
Route::any('/home', 'HomeController@index')->name('home');
Route::any('account', array('as' => 'account', 'uses' => 'HomeController@account'));
Route::any('personalRank', array('as' => 'personalRank', 'uses' => 'HomeController@personalRank'));
Route::any('browse/{id}', array('as' => 'browse', 'uses' => 'HomeController@browse'));

Auth::routes();
