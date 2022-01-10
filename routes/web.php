<?php

use App\Http\Controllers\CsvController;
use App\Http\Controllers\HomeController;
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

Route::resource('/', HomeController::class);
Route::get('/single/character/{id}', [HomeController::class, 'show']);
Route::resource('csv', CsvController::class);
Route::get('/progress', [CsvController::class, 'progress']);
Route::get('/progress/data', [CsvController::class, 'progress_for_csv_upload']);