<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'AuthController@index');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware(['session.auth'])->group(function () {
    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');
    Route::get('/integration/log', 'IntegrationController@logIntegration')->name('log-integration');
    Route::get('/integration/typget', 'IntegrationController@integrationGet')->name('get-integration');
    Route::get('/integration/typpost', 'IntegrationController@integrationPost')->name('post-integration');
    Route::resource('integration', 'IntegrationController');
});
