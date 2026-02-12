<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()
                ->withErrors(['email' => 'Email not found'])
                ->withInput();
        }
        if($request->password != $admin->password){
            return back()
                ->withErrors(['password' => 'Incorrect password'])
                ->withInput();
        }
        Session::put('admin', $admin->id);
        Session::put('admin_name', $admin->name);


        return redirect()->route('dashboard');
    }
    function addCategory(Request $request){
        $request->validate([
            'category' => 'required|string|max:255'
        ]);
        if(Category::where('name', $request->category)->exists()){
            return back()
                ->withErrors(['category' => 'Category already exists'])
                ->withInput();
        }
        $category = new Category();
        $category->name = $request->category;
        $category->created_by = Session::get('admin_name');
        $category->save();
        if($category->save()){
            Session::flash('success', 'Category added successfully');
            return redirect()->route('categories');
        }
        
    }
    function getCategories(){
        $categories = Category::all();
        return view('adminPages.categories',[
            "categories" => $categories
        ]);
    }
    function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('categories');
    }
    function quiz(){
        $category = Category::all();
        return view('adminPages.quiz',[
            "categories" => $category
        ]);
    }
    function addQuiz(Request $request){
       $request->validate([
        'quiz' => 'required|string|max:255',
        'category' => 'required|exists:categories,id',
       ]);
       if(Quiz::where('name', $request->quiz)->exists()){
        return back()
            ->withErrors(['quiz' => 'Quiz already exists'])
            ->withInput();
       }
       if(!Category::where('id', $request->category)->exists()){
        return back()
            ->withErrors(['category' => 'Category not found'])
            ->withInput();
       }
       $name = $request->quiz;
       $category_id = $request->category;
       if($name && $category_id && !Session::has('quiz')){
        $quiz = new Quiz();
        $quiz->name = $name;
        $quiz->category_id = $category_id;
        $quiz->save();
        if($quiz->save()){
           Session::put('quiz',$quiz);
           return redirect()->route('quizUi');
        }
       }

    }
function addQuestions(Request $request)
{
    if (!Session::has('quiz')) {
        return back()
            ->withErrors(['quiz' => 'Quiz not found'])
            ->withInput();
    }

    $quiz = Session::get('quiz');
    $quiz_id = $quiz->id;
    $category_id = $quiz->category_id;
    $admin_id = Session::get('admin');
    if ($request->has('addQuestion')) {

        $request->validate([
            'question' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'answer' => 'required|in:option1,option2,option3,option4'
        ]);

        $question = $request->question;
        $option1 = $request->option1;
        $option2 = $request->option2;
        $option3 = $request->option3;
        $option4 = $request->option4;
        $answer = $request->answer;
        if (Mcq::where('question', $question)
            ->where('quiz_id', $quiz_id)
            ->exists()) {

            return back()
                ->withErrors(['question' => 'Question already exists in this quiz'])
                ->withInput();
        }
        if (
            $option1 == $option2 || $option1 == $option3 || $option1 == $option4 ||
            $option2 == $option3 || $option2 == $option4 ||
            $option3 == $option4
        ) {
            return back()
                ->withErrors(['options' => 'Options must be unique'])
                ->withInput();
        }

        $mcq = new Mcq();
        $mcq->question = $question;
        $mcq->option1 = $option1;
        $mcq->option2 = $option2;
        $mcq->option3 = $option3;
        $mcq->option4 = $option4;
        $mcq->answer = $answer;
        $mcq->quiz_id = $quiz_id;
        $mcq->category_id = $category_id;
        $mcq->admin_id = $admin_id;

        $mcq->save();

        return redirect()->route('quizUi');
    }
    if ($request->has('completeQuiz')) {
        Session::forget('quiz');   
        return redirect()->route('dashboard');
    }
}
function getQuiz($id){
    $allquizes = Quiz::where('category_id', $id)->get();
    return view('adminPages.allQuizes',[
        "allquizes" => $allquizes
    ]);
}
function getdetails($id){
    $quiz = Quiz::find($id);
    $questions = Mcq::where('quiz_id', $id)->get();
    return view('adminPages.singleQuiz',[
        "quiz" => $quiz,
        "questions" => $questions
    ]);

}
function deleteQuiz($id){
    $quiz = Quiz::find($id);
    $quiz->delete();
    Session::flash('success', 'Quiz deleted successfully');
    return redirect()->route('allQuizzes', ['id' => $quiz->category_id]);
}
function questionEdit($id){
    $question = Mcq::find($id);
    return view('adminPages.editQuestion',[
        "question" => $question
    ]);


}
function EditQuestions(Request $request){
    $request->validate([
        'question_id' => 'required|exists:mcqs,id',
        'question' => 'required|string|max:255',
        'option1' => 'required|string|max:255',
        'option2' => 'required|string|max:255',
        'option3' => 'required|string|max:255',
        'option4' => 'required|string|max:255',
        'answer' => 'required|in:option1,option2,option3,option4'
    ]);
    if(Mcq::where('question', $request->question)
        ->where('id', '!=', $request->question_id)
        ->exists()){
        return back()
            ->withErrors(['question' => 'Question already exists in this quiz'])
            ->withInput();
    }
    if (
        $request->option1 == $request->option2 || $request->option1 == $request->option3 || $request->option1 == $request->option4 ||
        $request->option2 == $request->option3 || $request->option2 == $request->  option4 || 
        $request->option3 == $request->option4
    ) {
        return back()
            ->withErrors(['options' => 'Options must be unique'])       
            ->withInput();
    } 
    $question_id = $request->question_id;
    $question = Mcq::find($question_id);
    $question->question = $request->question;
    $question->option1 = $request->option1;
    $question->option2 = $request->option2;
    $question->option3 = $request->option3;
    $question->option4 = $request->option4;
    $question->answer = $request->answer;
    $question->save();
    return redirect()->route('details', ['id' => $question->quiz_id]);
}

function deleteQuestion($id){
    $question = Mcq::find($id);
    $quiz_id = $question->quiz_id;
    $question->delete();
    return redirect()->route('details', ['id' => $quiz_id]);

}
}
