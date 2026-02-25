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
   public function displayQuizzes($categoryId)
{
    $userId = session('user_id'); 


    $quizzes = Quiz::with(['results' => function($query) use ($userId) {
        $query->where('user_id', $userId);
    }])
    ->where('category_id', $categoryId)
    ->get();

    return view('userPages.quizzes', [
        'quizzes' => $quizzes,
        'userId' => $userId
    ]);
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
    $userId = session('user_id');

    // Check if the result already exists
    $existingResult = Result::where('quiz_id', $quizId)
                            ->where('user_id', $userId)
                            ->first();

    if ($existingResult) {
        // User has already attempted → redirect to results page
        return redirect()->route('results', ['quiz' => $quizId]);
    }

    // Fetch questions
    $questions = Mcq::where('quiz_id', $quizId)->get();
    $score = 0;
    $total = $questions->count();

    foreach ($questions as $question) {
        if (isset($request->answers[$question->id])) {
            $selected = $request->answers[$question->id];
            if ($question->answer === $selected) {
                $score++;
            }
        }
    }

    $percentage = ($score / $total) * 100;

    // Save result
    Result::create([
        'user_id' => $userId,
        'quiz_id' => $quizId,
        'score' => $score,
        'total' => $total,
        'percentage' => $percentage
    ]);

    // Redirect to the results page instead of returning view
    return redirect()->route('results', ['quiz' => $quizId]);
}
public function showResult($quizId)
{
    $userId = session('user_id');

    $result = Result::where('quiz_id', $quizId)
                    ->where('user_id', $userId)
                    ->firstOrFail();

    return view('userPages.result', [
        'score' => $result->score,
        'total' => $result->total,
        'percentage' => $result->percentage
    ]);
}

}
