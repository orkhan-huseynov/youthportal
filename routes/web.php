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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('admin', function(){
    return redirect('/admin/dashboard');
});

Route::group(['middleware' => ['web', 'auth', 'isadmin'], 'prefix' => 'admin'], function () {
    //Dashboard Route
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    });

    //Structure
    Route::resource('structure-sections', 'Admin\Structure\SectionController');
    Route::resource('structure-pages', 'Admin\Structure\PageController');

    //System
    Route::resource('system-users', 'Admin\System\UsersController');

    //Content
    //Route::resource('content-news', 'Admin\Content\NewsController');

    Route::get('/content-news/{lang}', 'Admin\Content\NewsController@index');
    Route::get('/content-news/create/{lang}', 'Admin\Content\NewsController@create');
    Route::post('/content-news/{lang}', 'Admin\Content\NewsController@store');
});