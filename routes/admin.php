<?php

use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;


// admin

// Route::prefix('admin')->middleware('auth', 'active', 'admin')->group(function () {
     
// //     Route::redirect('/', '/admin/posts')->name('admin');
//     // posts
//     // Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
//     // Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
//     // Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
//     // Route::get('/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
//     // Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
//     // Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
//     // Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('admin.posts.delete');
//     // Route::put('/posts/{post}/likes', [PostController::class, 'like'])->name('admin.posts.like');
// });

// ->middleware('auth','active','admin')


Route::prefix('admin')->middleware('auth', 'active', 'admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    // Route::redirect('/', '/admin')->name('admin');
    // players
    Route::get('/players', [PlayerController::class, 'index'])->name('admin.players');
    Route::get('/player/create', [PlayerController::class, 'create'])->name('admin.player.create');
    Route::post('/player', [PlayerController::class, 'store'])->name('admin.player.store');
    // one player
    Route::prefix('player/{id}/{player}')->group(function(){
    Route::get('/', [PlayerController::class, 'show'])->name('admin.player.show');
    Route::get('edit', [PlayerController::class, 'edit'])->name('admin.player.edit');
    Route::put('/', [PlayerController::class, 'update'])->name('admin.player.update');
    Route::delete('/', [PlayerController::class, 'delete'])->name('admin.player.delete');
      });
   


     // tournaments
     Route::get('/tournaments', [TournamentController::class, 'index'])->name('admin.tournaments');
    Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('admin.tournaments.create');
    Route::post('/tournaments', [TournamentController::class, 'store'])->name('admin.tournaments.store');
    Route::prefix('tournaments/{id}/{tournament}')->group(function(){
    Route::get('/', [TournamentController::class, 'show'])->name('admin.tournaments.show');
    Route::get('/edit/{section?}', [TournamentController::class, 'edit'])->name('admin.tournaments.edit');
    Route::put('/', [TournamentController::class, 'update'])->name('admin.tournaments.update');
    Route::delete('/', [TournamentController::class, 'delete'])->name('admin.tournaments.delete');
    });


//     matches



});
