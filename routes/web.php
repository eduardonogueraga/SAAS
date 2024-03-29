<?php


use App\Http\Controllers\AlarmController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\DataController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', [EntriesController::class, 'index'])->name('panel.index');
    Route::get('/panel/{entry}/show', [EntriesController::class, 'show'])->name('panel.show');
    Route::get('/history', [DataController::class, 'history'])->name('history.index');
    Route::get('/history/{package}/show', [DataController::class, 'showInHistory'])->name('history.show');
    Route::get('/data', [DataController::class, 'index'])->name('data.index');
    Route::get('/alarm', [AlarmController::class, 'index'])->name('alarm.index');
});




require __DIR__.'/auth.php';
