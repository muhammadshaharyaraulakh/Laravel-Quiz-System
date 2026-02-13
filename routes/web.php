<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/logout', function () {
    Session::forget('admin');
    Session::forget('admin_name');
    return redirect()->route('login');
})->name('logout');
Route::get('/categories', function () {
    return view('adminPages.categories');
})->name('categories');
Route::get('/categories', [AdminController::class, 'getCategories'])->name('categories');
Route::post('/categories', [AdminController::class, 'addCategory'])->name('addCategory');
Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
Route::get('/quiz', [AdminController::class, 'quiz'])->name('quiz');
Route::view('/quizUI', 'adminPages.quiz')->name('quizUi');  
Route::post('/quiz', [AdminController::class, 'addQuiz'])->name('addQuiz');
Route::post('/addQuestions', [AdminController::class, 'addQuestions'])->name('addQuestions');

Route::get('/allQuizzes/{id}', [AdminController::class, 'getQuiz'])
    ->name('allQuizzes');
Route::delete('/quiz/{id}', [AdminController::class, 'deleteQuiz'])->name('deleteQuiz');
    Route::get('/quiz/{id}', [AdminController::class, 'getdetails'])
    ->name('details');
Route::get('/editQuestion/{id}', [AdminController::class, 'questionEdit'])
    ->name('editQuestion'); 
Route::post('/editQuestion', [AdminController::class, 'EditQuestions'])
    ->name('EditQuestions');
    Route::delete('/questions/{id}', [AdminController::class, 'deleteQuestion'])->name('deleteQuestion');

Route::get('/home', [App\Http\Controllers\UserController::class, 'displayTopics'])->name('home');

Route::get('/quizzes/{id}', [App\Http\Controllers\UserController::class, 'displayQuizzes'])->name('quizzes');

Route::get('/allcategories', [App\Http\Controllers\UserController::class, 'displayCategories'])->name('categories');


Route::view('/userLogin','authentication.login');
Route::get('/Register',function(){
    return view('authentication.signup');
});
Route::post('/Register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
// Show forgot password form
Route::get('/forgot-password', function () {
    return view('authentication.forgotPassword');
})->name('password.request');

// Handle email submit
Route::post('/forgot-password', [App\Http\Controllers\UserController::class, 'sendResetLink'])
    ->name('password.email');

// Show reset form (IMPORTANT: token required)
Route::get('/reset-password/{token}', function ($token) {
    return view('authentication.resetPassword', ['token' => $token]);
})->name('password.reset');

// Handle reset submit
Route::post('/reset-password', [App\Http\Controllers\UserController::class, 'updatePassword'])
    ->name('password.update');
