<?php

use App\Livewire\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('home');
    Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

});

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/login/{id}', function ($id) {
        $user = User::find($id);
        Auth::login($user);
        return redirect()->route('home');
    })->name('loginUser');

});
