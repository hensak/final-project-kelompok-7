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

Route::group(['middleware' => ['auth']], function() {
    // Threads...
    Route::post('/thread/create', 'ThreadController@create');
    Route::post('/thread', 'ThreadController@store');
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
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
