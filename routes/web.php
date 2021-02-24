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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Show API data */
Route::get('teamotleyapi', 'Api\ApiController@teamotleyApi');

/*Show csv raw data */
Route::get('teamotleycsv', 'CsvController@teamotleycsv');

Route::post('submitcsv', 'CsvController@submitcsvform')->name('submitcsv');