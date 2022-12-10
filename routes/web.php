<?php

use App\Http\Controllers\DetectionsController;
use App\Http\Controllers\EntriesController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [EntriesController::class, 'index'])->name('manage.index');
Route::get('/detecciones', [DetectionsController::class, 'index'])->name('detections.index');

require __DIR__.'/auth.php';
