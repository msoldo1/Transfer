<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});



Auth::routes();

Route::get('contact', 'ContactsController@create')->name('contact.create');
Route::post('contact', 'ContactsController@store')->name('contact.store');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'HomeController@adminHome')->name('admin.index')->middleware('is_admin');

Route::get('/company/index', 'HomeController@companyHome')->name('company.index')->middleware('is_company');

/*Route::get('drivers', 'DriversController@index');
Route::get('drivers/create', 'DriversController@create');
Route::post('drivers','DriversController@store');
Route::get('drivers/{driver}', 'DriversController@show');
*/
Route::resource('drivers','DriversController');

/*Route::get('offers', 'OffersController@index');
Route::get('offers/create', 'OffersController@create');
Route::post('offers','OffersController@store');
Route::get('offers/{offer}', 'OffersController@show');
Route::get('offers/{offer}/edit', 'OffersController@edit');
Route::patch('offers/{offer}', 'OffersController@update');
Route::delete('offers/{offer}', 'OffersController@destroy');*/

Route::resource('offers','OffersController');
Route::patch('offers/{offer}/acceptOffer', 'OffersController@acceptOffer');
Route::get('offer/search','OffersController@search');

/*Route::get('orders', 'OrdersController@index');
Route::get('orders/create', 'OrdersController@create');
Route::post('orders','OrdersController@store');
Route::get('orders/{order}', 'OrdersController@show');
*/

Route::resource('orders', 'OrdersController');
Route::patch('orders/{order}/acceptOrder', 'OrdersController@acceptOrder');
Route::get('order/search','OrdersController@search');

/*
Route::get('trucks', 'TrucksController@index');
Route::get('trucks/create', 'TrucksController@create');
Route::post('trucks','TrucksController@store');
Route::get('trucks/{truck}', 'TrucksController@show');
*/

Route::resource('trucks', 'TrucksController');

Route::get('customers', 'CustomersController@index')->name('customers.index');
Route::get('customers/{user}', 'CustomersController@show')->name('customers.show');
Route::get('customers/{user}/edit', 'CustomersController@edit')->name('customers.edit');
Route::patch('customers/{user}', 'CustomersController@update')->name('customers.update');
Route::delete('customers/{user}', 'CustomersController@destroy')->name('customers.destroy');
/*
Route::resource('customers', 'CustomersController');
*/

Route::get('companies', 'CompaniesController@index')->name('companies.index');
Route::get('companies/{user}', 'CompaniesController@show')->name('companies.show');
Route::get('companies/{user}/edit', 'CompaniesController@edit')->name('companies.edit');
Route::patch('companies/{user}', 'CompaniesController@update')->name('companies.update');
Route::delete('companies/{user}', 'CompaniesController@destroy')->name('companies.destroy');

Route::get('inovices', 'InovicesController@index');
Route::get('inovices/{id}', 'InovicesController@show');
