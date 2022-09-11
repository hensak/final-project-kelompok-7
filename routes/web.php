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
    // Threads...
    Route::post('/thread/create', 'ThreadController@create');
    Route::post('/thread', 'ThreadController@store');
    Route::get('/myThread/{user_id}', 'ThreadController@myThread');
    Route::get('/myThread/{thread_id}/edit', 'ThreadController@myThread_edit');
    Route::put('/myThread/{thread_id}', 'ThreadController@myThread_update');
    Route::delete('/myThread/{thread_id}', 'ThreadController@myThread_delete');
    // Profiles...
    Route::get('/profile/{user}', 'ProfileController@index');
    Route::get('/profile/{user}/edit', 'ProfileController@edit');
    Route::put('/profile/{user}', 'ProfileController@update');
    // Categories...
    Route::get('/category', 'CategoryController@index');
    Route::post('/category', 'CategoryController@store');
    Route::get('/category/{categoryEdit}/edit', 'CategoryController@edit');
    Route::put('/category/{categoryEdit}', 'CategoryController@update');
    Route::delete('/category/{category}', 'CategoryController@destroy');
    //Likes...
    Route::get('/like/{thread_id}', 'ThreadController@like');
    Route::get('/like2/{thread_id}', 'ThreadController@like2');
    //Comments...
    Route::post('/thread/{thread_id}/comment', 'ThreadController@comment');
    Route::get('/thread/{thread_id}/comment/{comment_id}/edit', 'ThreadController@comment_edit');
    Route::post('/thread/{thread_id}/comment/{comment_id}/update', 'ThreadController@comment_update');
    Route::get('/thread/{thread_id}/comment/{comment_id}/delete', 'ThreadController@comment_delete');
});
Route::get('/thread/{thread_id}', 'ThreadController@page');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
