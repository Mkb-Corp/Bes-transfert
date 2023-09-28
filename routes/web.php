<?php

use App\Http\Controllers\CounterController;
use App\Http\Controllers\TicketingController;
use App\Http\Controllers\OperationController;
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
    return redirect('login');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [OperationController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/ticketing/', [TicketingController::class, 'index'])
    ->name('ticketing.declare');
    Route::get('/dashboard/ticketing/dispatch', [TicketingController::class, 'dispatching'])
    ->name('ticketing.dispatching');
    Route::post('/dashboard/ticketing/dispatch', [TicketingController::class, 'dispatch'])
    ->name('ticketing.dispatching');
    Route::post('/dashboard/ticketing/', [TicketingController::class, 'ticketing_declaration'])
    ->name('ticketing.declare');
    Route::post('/transaction/new/', [OperationController::class, 'new'])
    ->name('transaction.new');

    Route::get('/dashboard/counters', [CounterController::class, 'index'])
    ->name('counters.index');
    Route::post('/dashboard/counters/assign', [CounterController::class, 'assign_user'])
    ->name('assign_user');

    // API

    Route::get('/currenceies/billets', [OperationController::class, 'get_currencies_billet'])
    ->name('get_currencies_billet');
});
