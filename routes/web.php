<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FirstController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/bla', 'FirstController@show')->name('myfirstcontroller');

Route::post('/myform', 'FirstController@form');

Route::get('/posts/show', 'FirstController@showAll')->name('showAllPosts');

Route::any('/blaedit/{id}', 'FirstController@edit')->name('editcontroller');


//Administration
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@show')->name('admin');

    Route::prefix('clients')->group(function () {
        Route::get('/', 'Admin\Clients\ClientsController@showAll')->name('showClients');
        Route::get('/add', 'Admin\Clients\ClientCreationController@clientCreation')->name('addClient');
        Route::post('/add', 'Admin\Clients\ClientCreationController@addClient')->name('addClient');
        Route::get('/show/{slug}', 'Admin\Clients\ClientUpdateController@getOneClient')->name('showOne');
        Route::post('/clients/edit/{slug}', 'Admin\Clients\ClientsController@editBySlug')->name('updateClient');
        Route::post('/del/{slug}', 'Admin\Clients\ClientsController@deleteOne')->name('deleteClient');

        Route::prefix('contact')->group(function () {
            Route::get('/show', 'Admin\Contacts\ContactController@showOne')->name('showContact');
            Route::post('/edit', 'Admin\Contacts\ContactEditController@EditBySlug')->name('editContact');
        });
    });
});

//Exemple avec un controller
//Route::get('/user', 'UserController@index');

//Nommage d'une route
//Route::get('user/profile', 'UserProfileController@show')->name('profile');


//Exemple avec un controller et des classes
//Route::get('/user', 'UserController@index', function (\App\User $user) {
//
//});

