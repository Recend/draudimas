<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ShortCodeController;
use \App\Http\Controllers\ImageController;
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



Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::middleware(['auth', 'role'])->group(function (){
Route::resource('cars',CarController::class)->except(['index']);

});

Route::get('owners', [OwnerController::class, 'index'])->name('owners.index');
Route::middleware( ['auth', 'role', 'shortcode'])->group(function () {
    Route::resource('owners', OwnerController::class)->except(['index']);

});

Route::get('images', [ImageController::class, 'index'])->name('images.index');
Route::middleware( ['auth', 'shortcode'])->group(function () {
    Route::resource('images', ImageController::class)->except(['index']);

});

Route::get('/setLang/{lang}', [LangController::class, 'setLanguage'])->name('setLang');

Route::get('/image/{name}',[CarController::class, 'display'])
    ->name('image.cars')
    ->middleware('auth');

Route::resource('shortcodes', ShortCodeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

