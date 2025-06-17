<?php 
use App\Http\Controllers\Player\PlayerController;
use Illuminate\Support\Facades\Route;
// player 

// Route::get('/player', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/players', [PlayerController::class, 'index'])->name('players');
     Route::prefix('player/{player}')->group(function(){
          // Route::prefix('player')->as('player.')->middleware('auth','active')->group(function(){
Route::redirect('/', '/players')->name('player');
     // posts
// Route::get('/', [PlayerController::class, 'index'])->name('player');
Route::get('/create', [PlayerController::class, 'create'])->name('player.create');
Route::post('/', [PlayerController::class, 'store'])->name('player.store');
Route::get('/', [PlayerController::class, 'show'])->name('player.show');
Route::get('/{post}/edit', [PlayerController::class, 'edit'])->name('player.edit');
Route::put('/{post}', [PlayerController::class, 'update'])->name('player.update');
Route::delete('/posts/{post}', [PlayerController::class, 'delete'])->name('player.delete');
// Route::put('/posts/{post}/likes', [PlayerController::class, 'like'])->name('player.like');
});