<?php

use App\Http\Controllers\Admin\ChatController;
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

Route::get('players/{student}/subject', [PlayerController::class, 'getSubjects'])->name('players.subject');

Route::get('players/{student}/{subject}/edit-score', [PlayerController::class, 'editScore'])->name('players.edit-score');

Route::get('players/{student}/register-subject', [PlayerController::class, 'registerSubject'])->name('players.register-subject');

Route::post('players/{student}/register-subject', [PlayerController::class, 'storeRegisterSubject'])->name('players.store-register-subject');

Route::put('players/{student}/update-scores', [PlayerController::class, 'updateScores'])->name('players.update-scores');

Route::post('excel/import-student', [PlayerController::class, 'import'])->name('players.import');

Route::get('excel/export-template', [PlayerController::class, 'getTemplate'])->name('players.get-template');

Route::get('list-subject-ajax', [PlayerController::class, 'getListSubjectAjax']);

Route::resource('clubs', ClubController::class);

Route::resource('coaches', CoachController::class);

Route::resource('roles', RoleController::class);

Route::get('chat', [ChatController::class, 'index'])->name('chat');

Route::post('send-message', [ChatController::class, 'sendMessage'])->name('send.message');

Route::get('get-message', [ChatController::class, 'getMessage'])->name('get.message');
