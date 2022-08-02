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


    // API: TIMEOFF REQUESTS
    Route::get("timeoff_requests", 'ApiSaltResourcesController@index'); // get entire collection
    Route::post("timeoff_requests", 'ApiSaltResourcesController@store'); // create new collection

    Route::get("timeoff_requests/trash", 'ApiSaltResourcesController@trash'); // trash of collection

    Route::post("timeoff_requests/import", 'ApiSaltResourcesController@import'); // import collection from external
    Route::post("timeoff_requests/export", 'ApiSaltResourcesController@export'); // export entire collection
    Route::get("timeoff_requests/report", 'ApiSaltResourcesController@report'); // report collection

    Route::get("timeoff_requests/{id}/trashed", 'ApiSaltResourcesController@trashed')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoff_requests/{id}/restore", 'ApiSaltResourcesController@restore')->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_requests/{id}/delete", 'ApiSaltResourcesController@delete')->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("timeoff_requests/{id}", 'ApiSaltResourcesController@show')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("timeoff_requests/{id}", 'ApiSaltResourcesController@update')->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("timeoff_requests/{id}", 'ApiSaltResourcesController@patch')->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_requests/{id}", 'ApiSaltResourcesController@destroy')->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID


    // API: TIMEOFF EMPLOYEES
    Route::get("timeoff_employees", 'ApiSaltResourcesController@index'); // get entire collection
    Route::post("timeoff_employees", 'ApiSaltResourcesController@store'); // create new collection

    Route::get("timeoff_employees/trash", 'ApiSaltResourcesController@trash'); // trash of collection

    Route::post("timeoff_employees/import", 'ApiSaltResourcesController@import'); // import collection from external
    Route::post("timeoff_employees/export", 'ApiSaltResourcesController@export'); // export entire collection
    Route::get("timeoff_employees/report", 'ApiSaltResourcesController@report'); // report collection

    Route::get("timeoff_employees/{id}/trashed", 'ApiSaltResourcesController@trashed')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoff_employees/{id}/restore", 'ApiSaltResourcesController@restore')->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_employees/{id}/delete", 'ApiSaltResourcesController@delete')->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("timeoff_employees/{id}", 'ApiSaltResourcesController@show')->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("timeoff_employees/{id}", 'ApiSaltResourcesController@update')->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("timeoff_employees/{id}", 'ApiSaltResourcesController@patch')->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_employees/{id}", 'ApiSaltResourcesController@destroy')->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
