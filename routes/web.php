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

