<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$version = config('app.API_VERSION', 'v1');

Route::namespace('SaltEmployeeTimeoff\Controllers')
    ->middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: TIMEOFFS
    Route::get("timeoffs", 'ApiSaltResourcesController@index'); // get entire collection
    Route::post("timeoffs", 'ApiSaltResourcesController@store'); // create new collection

    Route::get("timeoffs/trash", 'ApiSaltResourcesController@trash'); // trash of collection

    Route::post("timeoffs/import", 'ApiSaltResourcesController@import'); // import collection from external
    Route::post("timeoffs/export", 'ApiSaltResourcesController@export'); // export entire collection
    Route::get("timeoffs/report", 'ApiSaltResourcesController@report'); // report collection

    Route::get("timeoffs/{id}/trashed", 'ApiSaltResourcesController@trashed')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoffs/{id}/restore", 'ApiSaltResourcesController@restore')->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoffs/{id}/delete", 'ApiSaltResourcesController@delete')->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("timeoffs/{id}", 'ApiSaltResourcesController@show')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("timeoffs/{id}", 'ApiSaltResourcesController@update')->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("timeoffs/{id}", 'ApiSaltResourcesController@patch')->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoffs/{id}", 'ApiSaltResourcesController@destroy')->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
