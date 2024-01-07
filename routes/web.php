<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\KonsolController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn () => view('index'));
Route::get('/game', [GamesController::class, 'index']);

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'indexLogin')->middleware([\App\Http\Middleware\GuestMiddleware::class]);
    Route::post('/login', 'userLogin')->middleware([\App\Http\Middleware\GuestMiddleware::class]);
    Route::get('/register', 'indexRegister')->middleware([\App\Http\Middleware\GuestMiddleware::class]);
    Route::post('/register', 'createUser')->middleware([\App\Http\Middleware\GuestMiddleware::class]);
    Route::get('/logout', 'logout')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
});

Route::middleware(['checkAdmin'])->group(function() {
    Route::get('/admin', [RentalController::class, 'indexAdmin']);
    Route::get('/user', [UserController::class, 'getUsers']);
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/{id}', [PembayaranController::class, 'editPembayaran']);
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::post('/user/{id}', [UserController::class, 'editUser']);
    Route::post('/user/{id}/delete', [UserController::class, 'deleteUser']);
    Route::get('/konsol', [KonsolController::class, 'showKonsols']);
    Route::post('/konsol/add', [KonsolController::class, 'create']);
    Route::get('/konsol/{id}', [KonsolController::class, 'edit']);
    Route::post('/konsol/{id}', [KonsolController::class, 'editKonsol']);
    Route::post('/konsol/{id}/delete', [KonsolController::class, 'delete']);
    Route::get('/game/{id}/edit', [GamesController::class, 'edit']);
    Route::post('/game/{id}/edit', [GamesController::class, 'editGames']);
    Route::get('/game/{id}/delete', [GamesController::class, 'hapusGame']);
    Route::get('/game/add', [GamesController::class, 'indexAdd']);
    Route::post('/game/add', [GamesController::class, 'create']);
});

Route::get('/game/{id}', [GamesController::class, 'showGames']);

Route::controller(\App\Http\Controllers\RentalController::class)->group(function () {
    Route::get('/rental', 'index')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
    Route::get('/rental/sewa', 'indexSewa')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
    Route::post('/rental/sewa', 'create')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
    Route::get('/rental/{id}', 'edit')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
    Route::post('/rental/{id}', 'editRental')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
    Route::post('/rental/{id}/delete', 'delete')->middleware([\App\Http\Middleware\CustomerMiddleware::class]);
});


Route::fallback(fn () => view('404'));