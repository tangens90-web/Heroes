<?php
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PlayerController;
use Illuminate\Support\Facades\Route;


// admin 
Route::prefix('admin')->middleware('auth','active','admin')->group(function(){
     Route::redirect('/', '/admin/posts')->name('admin');
     // posts
Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('admin.posts.delete');
Route::put('/posts/{post}/likes', [PostController::class, 'like'])->name('admin.posts.like');
});



// ->middleware('auth','active','admin')
Route::prefix('admin')->middleware('auth','active','admin')->group(function(){
     Route::redirect('/', '/admin')->name('admin');
     // posts
Route::get('/players', [PlayerController::class, 'index'])->name('admin.players');
Route::get('/player/create', [PlayerController::class, 'create'])->name('admin.player.create');
Route::post('/player', [PlayerController::class, 'store'])->name('admin.player.store');
Route::get('/player/{player}', [PlayerController::class, 'show'])->name('admin.player.show');
Route::get('/player/{player}/edit', [PlayerController::class, 'edit'])->name('admin.player.edit');
Route::put('/player/{player}', [PlayerController::class, 'update'])->name('admin.player.update');
Route::delete('/player/{player}', [PlayerController::class, 'delete'])->name('admin.player.delete');
Route::put('/player/{player}/likes', [PlayerController::class, 'like'])->name('admin.player.like');
});