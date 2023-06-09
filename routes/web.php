<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('posts')->middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');
});

require __DIR__.'/auth.php';
