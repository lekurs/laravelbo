<?php

use Illuminate\Support\Facades\Route;

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
//
//Route::get('/test/seeders/client', function () {
//    return factory(\App\Http\Entity\Client::class, 50)->create();
//});
//
//Route::get('/test/seeders/contact', function () {
//    return factory(\App\Http\Entity\Contact::class, 50)->create();
//});
//
//Route::get('/test/seeders', function () {
//    return factory(\App\Http\Entity\Estimation::class, 50)->create();
//});
//
//Route::get('/test/seeders/invoices', function () {
//    return factory(\App\Http\Entity\Invoice::class, 50)->create();
//});



//Administration
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\AdminController@show')->name('admin');

    //Menus
    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', 'Admin\Navigation\NavigationCreationController@show')->name('showNavigation');
        Route::post('/save', 'Admin\Navigation\NavigationSaveController@save')->name('saveNavigation');
    });

    //Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
       Route::get('/', 'Admin\Dashboard\DashboardController@show')->name('dashboard');
    });

    //Clients
    Route::group(['prefix' => 'clients'], function () {
            Route::get('/', 'Admin\Clients\ClientsController@showAll')->name('showClients');
            Route::get('/add', 'Admin\Clients\ClientCreationController@clientCreation')->name('addClient');
            Route::get('/show/{slug}', 'Admin\Clients\ClientShowController@showOne')->name('showOne');
            Route::get('/edit/{slug}', 'Admin\Clients\ClientUpdateController@getOneClient')->name('editOne');
            Route::get('/del/{slug}', 'Admin\Clients\ClientDeleteController@deleteOne')->name('deleteClient');
            Route::post('/add', 'Admin\Clients\ClientCreationController@addClient')->name('addClient');
            Route::post('/clients/edit/{slug}', 'Admin\Clients\ClientsController@editBySlug')->name('updateClient');

        //Contacts
        Route::group(['prefix' => 'contact'], function () {
            Route::post('/show', 'Admin\Contacts\ContactController@showOne')->name('showContact');
            Route::post('/edit/{slug}', 'Admin\Contacts\ContactEditController@editBySlug')->name('editContact');
            Route::get('/del/{slug}', 'Admin\Contacts\ContactDeleteController@deleteOne')->name('deleteContact');
        });
    });

    //Estimations
    Route::group(['prefix' => 'devis'], function () {
        Route::get('/', 'Admin\Estimations\EstimationGetAllController@getAll')->name('showAllEstimations');
        Route::get('/client/{idClient}', 'Admin\Estimations\EstimationController@show')->name('showEstimations');
        Route::get('/{id}', 'Admin\Estimations\EstimationOneController@show')->name('showOneEstimation');
        Route::get('/{id}/pdf', 'Admin\Estimations\EstimationPDFController@create')->name('createPDFEstimation');
        Route::post('/creer', 'Admin\Estimations\EstimationCreationController@createEstimation')->name('createEstimation');
        Route::post('/{id}/validation', 'Admin\Estimations\EstimationValidateController@updateValidation')->name('valideEstimation');
    });

    Route::group(['prefix' => 'facture'], function () {
       Route::get('/{id}', 'Admin\Invoices\InvoiceCreationController@create')->name('createInvoice');
       Route::post('/{id}/add', 'Admin\Invoices\InvoiceSaveController@save')->name('saveInvoice');

       //Acompte
        Route::group(['prefix' => 'acompte'], function () {
            Route::get('/{idEstimation}', 'Admin\DownPaiementInvoices\DownPaiementInvoiceCreationController@show')->name('createDownPaiementInvoice');
            Route::post('/{idEstimation}/add', 'Admin\DownPaiementInvoices\DownPaiementInvoiceSaveController@save')->name('saveDownPaiementInvoice');
        });
    });

    Route::group(['prefix' => 'uploader'], function () {
       Route::post('/', 'Admin\Uploader\UploaderImageController@uploadImg')->name('uploaderImg');
       Route::post('/rotate', 'Admin\Uploader\UploaderImageController@rotateImg')->name('rotateImg');
       Route::post('/save', 'Admin\Uploader\UploaderImageController@saveImg')->name('saveImg');
    });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/google', 'Auth\Google\GoogleController@login')->name('auth.google.login');
Route::get('/auth/google/callback', 'Auth\Google\GoogleController@callback')->name('auth.google.callback');
Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
