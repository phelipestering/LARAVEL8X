<?php

use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index') ->middleware(['auth']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::POST('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::Delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';



