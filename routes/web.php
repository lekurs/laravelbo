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
    Route::any('/clients', 'Admin\Clients\ClientsController@showAll')->name('showClients');
    Route::post('/clients/del/{slug}', 'Admin\Clients\ClientsController@deleteOne')->name('deleteClient');
    Route::get('/clients/show/{slug}', 'Admin\Clients\ClientsController@showOne')->name('showOne');
    Route::post('/clients/edit/{slug}', 'Admin\Clients\ClientsController@editBySlug')->name('updateClient');
});

//Exemple avec un controller
//Route::get('/user', 'UserController@index');

//Nommage d'une route
//Route::get('user/profile', 'UserProfileController@show')->name('profile');


//Exemple avec un controller et des classes
//Route::get('/user', 'UserController@index', function (\App\User $user) {
//
//});

