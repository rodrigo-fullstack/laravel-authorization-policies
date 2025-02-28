<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login($id){
        $user = User::with('permissions')->find($id);
        Auth::login($user);

        dd(Auth()->user()->toArray());

        return redirect()->route('home');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
