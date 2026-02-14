<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthentication;

Route::get('/home',function(){
    return view('home'); 
});

Route::get('/Register',function(){
    return view('authentication.signup');
});
Route::post('/Register', [UserAuthentication::class, 'register'])->name('register');


Route::get('/UserLogin',function(){
    return view('authentication.login');
})->name('UserLogin');
Route::post('/Login', [UserAuthentication::class, 'login'])->name('Login');

Route::get('/ForgotPassword',function(){
    return view('authentication.forgotPassword');
})->name('ForgotPassword');
Route::get('/resetPassword/{token}/{email}',function($token, $email){
    return view('authentication.resetPassword', compact('token', 'email'));
})->name('resetPassword');
Route::post('/resetPassword', [UserAuthentication::class, 'resetPassword'])->name('reset');
 Route::post('/ForgotPassword', [UserAuthentication::class, 'forgotPassword'])->name('ForgotPassword');
Route::get('/UserLogout',[UserAuthentication::class,'logout'])->name('userLogout');