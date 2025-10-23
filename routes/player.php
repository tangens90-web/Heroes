<?php 
use App\Http\Controllers\Players\PlayerController;
use Illuminate\Support\Facades\Route;
// player 

// Route::get('/player', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
     Route::prefix('players/{id}')->group(function(){
          // Route::prefix('player')->as('player.')->middleware('auth','active')->group(function(){
Route::redirect('/', '/players')->name('players');

Route::post('/', [PlayerController::class, 'store'])->name('players.store');
Route::get('/{player}', [PlayerController::class, 'show'])->name('players.show');

});