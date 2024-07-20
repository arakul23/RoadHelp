<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PublicOfferController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/agree', function () {
    return view('AssistantAuto_public-offer-2023');
})->name('agreementCooperation');

Route::get('/ref/{employee}', [EmployeesController::class, 'handleRefLink']);

Route::post('/admin/createMultipleRegions', [RegionController::class, 'parseRegionsFile'])->name('RegionMultipleCreate');
Route::post('/admin/exportCities', [CitiesController::class, 'exportCities'])->name('ExportCities');
Route::post('/review', [ReviewController::class, 'create'])->name('createReview');
Route::post('/language', [LanguageController::class, 'set'])->name('language');
Route::post('/pay', [PayController::class, 'pay'])->name('pay');
Route::post('/addClient', [PayController::class, 'addClient'])->name('addClient');
