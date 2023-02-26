<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\DestinationController;

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

Route::get('/', [TravelController::class, 'index'])->middleware(['auth'])->name('index');
Route::post('/travels/create',[TravelController::class, 'create']);
Route::post('/travels/edit', [TravelController::class, 'update']);
Route::post('/travels/delete', [TravelController::class, 'remove']);
Route::get('/destinations/{travel_id}', 
[DestinationController::class, 'index'])->name('destination.index');
Route::get('/destinations/{travel_id}/add', [DestinationController::class, 'add'])->name('destination.add');
Route::post('/destinations/create', [DestinationController::class, 'create']);
Route::post('/destinations/edit', [DestinationController::class, 'update']);
Route::post('/destinations/delete/{id}', [DestinationController::class, 'remove']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

