<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\Result;
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
    $categories = Category::paginate(5);
    return view('userPages.allcategories', compact('categories'));
}
 function attemptQuiz($id){
    $quiz = Quiz::findOrFail($id);
    $questions = Mcq::where('quiz_id', $id)->get();
    return view('userPages.quiz', compact('questions'));
 }


public function submit(Request $request, $quizId)
{
    $questions = Mcq::where('quiz_id', $quizId)->get();

    $score = 0;
    $total = $questions->count();

    foreach ($questions as $question) {
        if (isset($request->answers[$question->id])) {
            $selected = $request->answers[$question->id];
            
            // Compare DB stored answer with selected value
            if ($question->answer === $selected) {
                $score++;
            }
        }
    }

    $percentage = ($score / $total) * 100;



 
            
   
    Result::create([
        'user_id' => Session::get('user_id'), // Assuming you have user authentication and store user_id in session
        'quiz_id' => $quizId,
        'score' => $score,
        'total' => $total,
        'percentage' => $percentage
    ]);

    return view('userPages.result', compact('score', 'total', 'percentage'));

}
}
