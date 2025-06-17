<?php
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


// admin 
Route::prefix('admin')->as('admin.')->middleware('auth','active','admin')->group(function(){
     Route::redirect('/', '/admin/posts')->name('admin');
     // posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
Route::put('/posts/{post}/likes', [PostController::class, 'like'])->name('posts.like');
});