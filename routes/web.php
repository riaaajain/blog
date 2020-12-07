<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'feed'])->name('home');

Route::middleware(['auth'])->prefix('post')->group(function(){
    Route::get('/create', [App\Http\Controllers\PostController::class, 'index'])->name('post.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/myposts', [App\Http\Controllers\PostController::class, 'myposts'])->name('post.myposts');
    Route::get('/delete/{post_id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
    Route::get('/edit/{post_id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/update/{post_id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

});


