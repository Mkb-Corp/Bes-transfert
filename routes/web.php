<?php

use App\Http\Controllers\CounterController;
use App\Http\Controllers\TicketingController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/ticketing/', [TicketingController::class, 'index'])
    ->name('ticketing.declare');
    Route::post('/dashboard/ticketing/', [TicketingController::class, 'ticketing_declaration'])
    ->name('ticketing.declare');

    Route::get('/dashboard/counters', [CounterController::class, 'index'])
    ->name('counters.index');
    Route::post('/dashboard/counters/assign', [CounterController::class, 'assign_user'])
    ->name('assign_user');
});
