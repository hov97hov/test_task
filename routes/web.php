<?php

use App\Admin\Controllers\CarModelController;
use App\Http\Controllers\CarModelItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/car-model/{id}', [CarModelItemController::class, 'carModelPage'])->name('carModelPage');
Route::post('/get-marks', [MarkController::class, 'getMarks'])->name('getMarks');
