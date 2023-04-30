<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RegionController;
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
    return view('welcome');
});

Route::post('/admin/createMultipleRegions', [RegionController::class, 'parseRegionsFile'])->name('RegionMultipleCreate');
Route::post('/admin/exportCities', [CitiesController::class, 'exportCities'])->name('ExportCities');
