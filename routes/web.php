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


Route::get('/', function () {
    return redirect()->route('admin.trips.index');
});

Route::group(['prefix' => '/', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    // Trip
    Route::delete('trips/destroy', 'TripController@massDestroy')->name('trips.massDestroy');
    Route::post('trips/parse-csv-import', 'TripController@parseCsvImport')->name('trips.parseCsvImport');
    Route::post('trips/process-csv-import', 'TripController@processCsvImport')->name('trips.processCsvImport');
    Route::resource('trips', 'TripController');

    // Trip Reports
    Route::get('trip-reports/', 'TripReportController@index')->name('trip-reports.index');
});
