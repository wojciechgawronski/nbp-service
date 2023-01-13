<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\web\DarkThemeController;
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

Route::view('/', 'start')->name('start_view');
Route::get('/darkTheme', DarkThemeController::class)->name('web.dark_theme');
Route::get('/currencies', [CurrencyController::class, 'index'])->name('currencies.index');
Route::get('/currencies/testAdd', [CurrencyController::class, 'testAdd']);
Route::get('/currencies/wgService', [CurrencyController::class, 'wgService']);
Route::get('/currencies/deleteAll', [CurrencyController::class, 'deleteAll'])->name('web.currencies.deleteAll');
