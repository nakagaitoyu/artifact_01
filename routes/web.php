<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LikeController;

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


Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::get('/posts/{post}',[PostController::class, 'review']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/search_anime',[SearchController::class, 'search_anime'])->name('search_anime');
Route::get('/search_user' ,[SearchController::class, 'search_user'])->name('search_user');
Route::get('anime/{anime}' ,[SearchController::class, 'category_anime']);
Route::get('user/{user}',[SearchController::class, 'category_user']);
Route::get('/review/like/{post}',[LikeController::class, 'like'])->name('like');
Route::get('/review/unlike/{post}',[LikeController::class, 'unlike'])->name('unlike');
Route::get('/result_anime',[SearchController::class, 'result_anime']);
Route::get('/result_user',[SearchController::class, 'result_user']);

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::post('/posts/create', [PostController::class, 'post']);
    Route::post('/posts/{post}',[PostController::class, 'store']);
    Route::delete('/posts/{review_comment}', [PostController::class,'delete_review']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/{post}', [PostController::class, 'delete_post']);    
});

require __DIR__.'/auth.php';
