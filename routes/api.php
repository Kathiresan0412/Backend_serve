<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/providers', [ProviderController::class, 'index']);
// API Routes for Customers
//Route::get('/customers', 'App\Http\Controllers\NewCustomersController@index');

Route::get('/customers', 'App\Http\Controllers\CustomerController@index');
Route::get('/providers', 'App\Http\Controllers\ProviderController@index');
Route::get('/requests', 'App\Http\Controllers\SRequestController@index');
Route::get('/services', 'App\Http\Controllers\ServiceController@index');
Route::get('/service-types', 'App\Http\Controllers\ServiceTypeController@index');


Route::post('/customers', 'CustomersController@store'); // Create customer
//Route::get('/customers', 'CustomersController@index'); // Get all customers
Route::get('/customers/{id}', 'CustomersController@show'); // Get single customer
Route::put('/customers/{id}', 'CustomersController@update'); // Update customer
Route::delete('/customers/{id}', 'CustomersController@delete'); // Delete customer

// API Routes for Providers

// Route::get('/providers', 'ProviderController@index');
Route::get('/providers/{id}', 'ProviderController@show');
Route::put('/providers/{id}', 'ProviderController@update');
Route::delete('/providers/{id}', 'ProviderController@delete');

// API Routes for Services
 Route::post('/services', 'ServiceController@store');
//Route::get('/services', 'ServiceController@index');
Route::get('/services/{id}', 'ServiceController@show');
Route::put('/services/{id}', 'ServiceController@update');
Route::delete('/services/{id}', 'ServiceController@delete');

// API Routes for service_types
// Route::post('/service_types', 'ServiceTypeController@store');
Route::get('/service_types', 'ServiceTypeController@index');
Route::get('/service_types/{id}', 'ServiceTypeController@show');
Route::put('/service_types/{id}', 'ServiceTypeController@update');
Route::delete('/service_types/{id}', 'ServiceTypeController@delete');

// API Routes for request
// Route::post('/request', 'SRequestController@store');
Route::get('/request', 'SRequestController@index');
Route::get('/request/{id}', 'SRequestController@show');
Route::put('/request/{id}', 'SRequestController@update');
Route::delete('/request/{id}', 'SRequestController@delete');

// API Routes for Services
Route::post('/rating', 'RatingController@store');
Route::get('/rating', 'RatingController@index');
Route::get('/rating/{id}', 'RatingController@show');
Route::put('/rating/{id}', 'RatingController@update');
Route::delete('/rating/{id}', 'RatingController@delete');

// API Routes for Provider Service
Route::post('/provider-service', 'ProviderServiceController@store');
Route::get('/provider-service', 'ProviderServiceController@index');
Route::get('/provider-service/{id}', 'ProviderServiceController@show');
Route::put('/provider-service/{id}', 'ProviderServiceController@update');
Route::delete('/provider-service/{id}', 'ProviderServiceController@delete');
