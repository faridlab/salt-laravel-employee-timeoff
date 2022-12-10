<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltEmployeeTimeoff\Controllers\ApiSaltResourcesController;
// use SaltEmployeeTimeoff\Controllers\ApiNestedResourcesController;

use SaltEmployeeTimeoff\Controllers\TimeoffsController;
use SaltEmployeeTimeoff\Controllers\TimeoffEmployeesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: TIMEOFFS
    Route::get("timeoffs", [TimeoffsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timeoffs", [TimeoffsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timeoffs/trash", [TimeoffsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timeoffs/import", [TimeoffsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timeoffs/export", [TimeoffsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timeoffs/report", [TimeoffsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timeoffs/{id}/trashed", [TimeoffsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoffs/{id}/restore", [TimeoffsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoffs/{id}/delete", [TimeoffsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timeoffs/{id}", [TimeoffsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timeoffs/{id}", [TimeoffsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timeoffs/{id}", [TimeoffsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoffs/{id}", [TimeoffsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: TIMEOFF REQUESTS
    Route::get("timeoff_requests", [ReligionsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timeoff_requests", [ReligionsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timeoff_requests/trash", [ReligionsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timeoff_requests/import", [ReligionsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timeoff_requests/export", [ReligionsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timeoff_requests/report", [ReligionsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timeoff_requests/{id}/trashed", [ReligionsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoff_requests/{id}/restore", [ReligionsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_requests/{id}/delete", [ReligionsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timeoff_requests/{id}", [ReligionsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timeoff_requests/{id}", [ReligionsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timeoff_requests/{id}", [ReligionsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_requests/{id}", [ReligionsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: TIMEOFF EMPLOYEES
    Route::get("timeoff_employees", [TimeoffEmployeesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timeoff_employees", [TimeoffEmployeesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timeoff_employees/trash", [TimeoffEmployeesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timeoff_employees/import", [TimeoffEmployeesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timeoff_employees/export", [TimeoffEmployeesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timeoff_employees/report", [TimeoffEmployeesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timeoff_employees/{id}/trashed", [TimeoffEmployeesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timeoff_employees/{id}/restore", [TimeoffEmployeesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_employees/{id}/delete", [TimeoffEmployeesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timeoff_employees/{id}", [TimeoffEmployeesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timeoff_employees/{id}", [TimeoffEmployeesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timeoff_employees/{id}", [TimeoffEmployeesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timeoff_employees/{id}", [TimeoffEmployeesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
