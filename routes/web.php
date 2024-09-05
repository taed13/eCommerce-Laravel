<?php

use App\Http\Controllers\auth\authController;
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::get('/login', function () {
    return view('auth/signIn');
});

Route::post('/login_user', [authController::class, 'loginUser']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});
