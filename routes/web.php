<?php

use App\Http\Controllers\PlayerGameController;
use App\Http\Controllers\PlayersController;
use App\Http\Middleware\PlayerIsNotExpiredMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [PlayersController::class, 'create'])->name('players.create');
Route::post('/players', [PlayersController::class, 'store'])->name('players.store');
Route::get('/players/{player:uuid}', [PlayersController::class, 'show'])->name('players.show');
Route::get('/players/{player:uuid}/games', [PlayerGameController::class, 'index'])->name('players.game.index');

Route::middleware(PlayerIsNotExpiredMiddleware::class)->group(function () {
    Route::post('/players/{player:uuid}/refresh', [PlayersController::class, 'refresh'])->name('players.refresh');
    Route::delete('/players/{player:uuid}', [PlayersController::class, 'delete'])->name('players.delete');
    Route::post('/players/{player:uuid}/game', [PlayerGameController::class, 'store'])->name('players.game.store');
    Route::get('/players/{player:uuid}/game/{game:uuid}', [PlayerGameController::class, 'show'])
        ->name('players.game.show')
        ->scopeBindings();
});

