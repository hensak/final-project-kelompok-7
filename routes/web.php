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

Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::post('/thread/create', 'ThreadController@create');
    Route::post('/thread', 'ThreadController@store');
    Route::get('/profile/{user}', 'ProfileController@index');
    Route::get('/profile/{user}/edit', 'ProfileController@edit');
    Route::put('/profile/{user}', 'ProfileController@update');
    Route::get('/like/{thread_id}', 'ThreadController@like');
    Route::get('/like2/{thread_id}', 'ThreadController@like2');
    Route::post('/thread/{thread_id}/comment', 'ThreadController@comment');
    Route::get('/thread/{thread_id}/comment/{comment_id}/edit', 'ThreadController@comment_edit');
    Route::post('/thread/{thread_id}/comment/{comment_id}/update', 'ThreadController@comment_update');
    Route::get('/thread/{thread_id}/comment/{comment_id}/delete', 'ThreadController@comment_delete');
});
Route::get('/thread/{thread_id}', 'ThreadController@page');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
