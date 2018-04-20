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

Route::get('/', function (){
   return redirect('/az');
});
Route::get('{lang}', 'HomeController@index')->where('lang', 'ru|az');
Route::get('/{lang}/section/{section_id}', 'SectionController@index');
Route::get('/{lang}/news_details/{id}', 'NewsDetailsController@index');
Route::get('/{lang}/photogallery/', 'PhotogalleryController@index');
Route::get('/{lang}/photogallery_details/{id}', 'PhotogalleryController@details');

Route::get('/search/{lang}/{ss}', 'SearchController@index');

Route::get('/{lang}/video/', 'VideoController@index');
Route::get('/{lang}/video_details/{id}', 'VideoController@details');

Route::get('/{lang}/newsArchive/{timestamp}', 'SectionController@newsArchive');

Auth::routes();

Route::get('storage/images/{filename}', function ($filename)
{
    $path = storage_path('app/public/images/' . $filename);

    if (!File::exists($path)) {
        //abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

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
    //Route::get('content-news', 'Admin\Content\NewsController@index');

    Route::get('/content-news/{lang}/{section?}', 'Admin\Content\NewsController@index')->where('section', '[0-9]+');
    Route::get('/content-news/{lang}/create', 'Admin\Content\NewsController@create');
    Route::post('/content-news/{lang}', 'Admin\Content\NewsController@store');
    Route::get('/content-news/{lang}/{news_id}/edit', 'Admin\Content\NewsController@edit');
    Route::put('/content-news/{lang}/{news_id}', 'Admin\Content\NewsController@update');
    Route::delete('/content-news/{lang}/{news_id}', 'Admin\Content\NewsController@destroy');

    Route::get('/content-photogallery', 'Admin\Content\PhotogalleryController@index');
    Route::get('/content-photogallery/create', 'Admin\Content\PhotogalleryController@create');
    Route::post('/content-photogallery', 'Admin\Content\PhotogalleryController@store');
    Route::get('/content-photogallery/{photogallery_id}/edit', 'Admin\Content\PhotogalleryController@edit');
    Route::put('/content-photogallery/{photogallery_id}', 'Admin\Content\PhotogalleryController@update');
    Route::delete('/content-photogallery/{gallery_id}', 'Admin\Content\PhotogalleryController@destroy');

});