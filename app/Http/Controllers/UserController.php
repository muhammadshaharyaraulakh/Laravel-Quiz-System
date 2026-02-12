<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function displayTopics(){
       $categroies = Category::all();
       return view('home', ['categories' => $categroies]);
    }
    function displayQuizzes($id){
        $quizzes = Quiz::where('category_id', $id)->get();
        return view('userPages.quizzes', ['quizzes' => $quizzes]);
    }
    function displayCategories(){
    $categories = Category::paginate(6);
    return view('userPages.categories', compact('categories'));
}

    
}
