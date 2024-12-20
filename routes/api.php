<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\SpaceController;
use App\Http\Controllers\Api\IslandController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ModalityController;
use App\Http\Controllers\Api\SpaceTypeController;
use App\Http\Controllers\Api\MunicipalityController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('space/search/{value}', [SpaceController::class, 'search']);


Route::apiresource('island', IslandController::class)->except('create', 'edit');
Route::apiresource('municipality', MunicipalityController::class)->except('create', 'edit');
Route::apiresource('zone', ZoneController::class)->except('create', 'edit');
Route::apiresource('address', AddressController::class)->except('create', 'edit');
Route::apiresource('spacetype', SpaceTypeController::class)->except('create', 'edit');
Route::apiresource('modality', ModalityController::class)->except('create', 'edit');
Route::apiresource('service', ServiceController::class)->except('create', 'edit');
Route::apiresource('role', RoleController::class)->except('create', 'edit');
Route::apiresource('comment', CommentController::class)->except('create', 'edit');
Route::apiResource('space', SpaceController::class)->except('create', 'edit');
Route::apiresource('image', ImageController::class)->except('create', 'edit');