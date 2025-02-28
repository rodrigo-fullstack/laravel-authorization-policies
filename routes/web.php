<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Livewire\Login;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route::get('/')

    Route::get('/', [PostController::class, 'posts']   
    )->name('home');

    Route::get('/posts/update/{id}', [PostController::class, 'update']   
    )->name('update');
    Route::get('/posts/delete/{id}', [PostController::class, 'delete']   
    )->name('delete');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/login/{id}', [AuthController::class, 'login'])->name('loginUser');

});
