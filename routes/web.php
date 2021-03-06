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
Route::get('/costume', function () {
    return view('costume')->with('page','costume');
});
Route::get('/guildRank', function () {
    return view('guildrank');
});
Route::get('/6th-Grade-Pet', function () {
    return view('6th-grade-pet');
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
Route::any('addadmin', array('as' => 'addadmin', 'uses' => 'AdminController@addadmin'));
Route::any('editfanart', array('as' => 'editfanart', 'uses' => 'AdminController@editfanart'));
Route::any('editcostume', array('as' => 'editcostume', 'uses' => 'AdminController@editcostume'));
Route::any('editnews', array('as' => 'editnews', 'uses' => 'AdminController@editnews'));
Route::any('editcharacter', array('as' => 'editcharacter', 'uses' => 'AdminController@editcharacter'));
Route::any('logoutadmin', array('as' => 'logoutadmin', 'uses' => 'AdminController@logout'));
Route::any('loginmanual', array('as' => 'loginmanual', 'uses' => 'HomeController@loginmanual'));
Route::any('logoutmanual', array('as' => 'logoutmanual', 'uses' => 'HomeController@logoutmanual'));
Route::any('postValid', array('as' => 'postValid', 'uses' => 'AdminController@postValid'));
Route::any('postPending', array('as' => 'postPending', 'uses' => 'AdminController@postPending'));
Route::any('postDelete', array('as' => 'postDelete', 'uses' => 'AdminController@postDelete'));
Route::any('editEvent', array('as' => 'editEvent', 'uses' => 'AdminController@editEvent'));
Route::any('postDeleteEvent', array('as' => 'postDeleteEvent', 'uses' => 'AdminController@postDeleteEvent'));
Route::any('postDeleteFanart', array('as' => 'postDeleteFanart', 'uses' => 'AdminController@postDeleteFanart'));
Route::any('postDeleteCostume', array('as' => 'postDeleteCostume', 'uses' => 'AdminController@postDeleteCostume'));
Route::any('postDeleteNews', array('as' => 'postDeleteNews', 'uses' => 'AdminController@postDeleteNews'));
Route::any('postDeleteAdmin', array('as' => 'postDeleteAdmin', 'uses' => 'AdminController@postDeleteAdmin'));
Route::any('postCash', array('as' => 'postCash', 'uses' => 'AdminController@postCash'));
Route::any('postItems', array('as' => 'postItems', 'uses' => 'AdminController@postItems'));
Route::any('postItemsAdd', array('as' => 'postItemsAdd', 'uses' => 'AdminController@postItemsAdd'));
Route::any('getUserData', array('as' => 'getUserData', 'uses' => 'AdminController@getUserData'));
Route::any('checkPIN', array('as' => 'checkPIN', 'uses' => 'HomeController@checkPIN'));
Route::any('forgetPass', array('as' => 'forgetPass', 'uses' => 'HomeController@forgetPass'));
Route::any('/home', 'HomeController@index')->name('home');
Route::any('account', array('as' => 'account', 'uses' => 'HomeController@account'));
Route::any('personalRank', array('as' => 'personalRank', 'uses' => 'HomeController@personalRank'));
Route::any('browse/{id}', array('as' => 'browse', 'uses' => 'HomeController@browse'));
Route::any('postConfirmFanart', array('as' => 'postConfirmFanart', 'uses' => 'AdminController@postConfirmFanart'));
Route::any('postConfirmNews', array('as' => 'postConfirmNews', 'uses' => 'AdminController@postConfirmNews'));
Route::any('postConfirmPage', array('as' => 'postConfirmPage', 'uses' => 'AdminController@postConfirmPage'));
Route::any('postConfirmCostume', array('as' => 'postConfirmCostume', 'uses' => 'AdminController@postConfirmCostume'));
Route::any('postConfirmCash', array('as' => 'postConfirmCash', 'uses' => 'AdminController@postConfirmCash'));
Route::any('confirmCash', array('as' => 'confirmCash', 'uses' => 'AdminController@confirmCash'));
Route::any('confirmEditChar', array('as' => 'confirmEditChar', 'uses' => 'AdminController@confirmEditChar'));
Route::any('postDeleteCash', array('as' => 'postDeleteCash', 'uses' => 'AdminController@postDeleteCash'));
Route::any('postConfirmItem', array('as' => 'postConfirmItem', 'uses' => 'AdminController@postConfirmItem'));
Route::any('postDeleteItem', array('as' => 'postDeleteItem', 'uses' => 'AdminController@postDeleteItem'));
Route::any('postConfirmItemAdd', array('as' => 'postConfirmItemAdd', 'uses' => 'AdminController@postConfirmItemAdd'));
Route::any('postDeleteItemAdd', array('as' => 'postDeleteItemAdd', 'uses' => 'AdminController@postDeleteItemAdd'));
Route::any('postConfirmChar', array('as' => 'postConfirmChar', 'uses' => 'AdminController@postConfirmChar'));
Route::any('postDeleteChar', array('as' => 'postDeleteChar', 'uses' => 'AdminController@postDeleteChar'));
Route::any('postConfirmBan', array('as' => 'postConfirmBan', 'uses' => 'AdminController@postConfirmBan'));
Route::any('postDeleteBan', array('as' => 'postDeleteBan', 'uses' => 'AdminController@postDeleteBan'));

Auth::routes();
