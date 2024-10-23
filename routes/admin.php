<?php

use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\YardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\ClubController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('players', PlayerController::class);

Route::resource('matches', MatchController::class);

Route::put('matches/{match}/cancel', [MatchController::class, 'cancelMatch'])->name('matches.cancelMatch');

Route::resource('clubs', ClubController::class);

Route::resource('yards', YardController::class);

Route::resource('coaches', CoachController::class);

Route::resource('roles', RoleController::class);

Route::get('chat', [ChatController::class, 'index'])->name('chat');

Route::post('send-message', [ChatController::class, 'sendMessage'])->name('send.message');

Route::get('get-message', [ChatController::class, 'getMessage'])->name('get.message');
