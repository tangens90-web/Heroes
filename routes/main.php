<?php
// include_once base_path('app/helpers.php');

// dd('helpers.php подключен через include');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\BlogController;


// use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\CommentController;
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

Route::view('/', 'home.index')->name('home');
Route::redirect('/home', '/');


// test
// Route::get('/test',  TestController::class)->name('test')->middleware('token:secret,foosss');
Route::get('/test',  TestController::class)->name('test');
Route::middleware('guest')->group(function(){
    // register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->withoutMiddleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');




Route::resource('posts/{posts}/comments',CommentController::class);

Route::fallback(function ()  {
    abort(404);
    return "wrong url";
});