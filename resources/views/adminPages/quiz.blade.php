<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
    </style>
</head>
<body class="min-h-screen">

<x-navigation-bar />
@if(!Session::has('quiz'))
    <div class="bg-white rounded-2xl shadow-md overflow-hidden max-w-md mx-auto">
        <div class="px-8 pt-8 pb-6">
            <h1 class="text-2xl font-bold text-slate-900 text-center">Add quiz</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Enter your details to add a new quiz</p>
        </div>

        <form method="POST" action="{{ route('addQuiz') }}" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="quiz" class="block text-sm font-medium text-slate-700 mb-1.5">Quiz Name</label>
                <input
                    type="text"
                    id="quiz"
                    name="quiz"
                    value="{{ old('quiz') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter quiz name"
                >
                @error('quiz')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-1.5">Category</label>
                <select name="category" id="category" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]"
            >
                Add Quiz
            </button>
        </form>
    </div>
    @else
        <div class="bg-white rounded-2xl shadow-md overflow-hidden max-w-md mx-auto">
        <div class="px-8 pt-8 pb-6">
            <h1 class="text-2xl font-bold text-green-900 text-center">{{ Session::get('quiz')->name }}</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Enter Questions and Thier Answers</p>
        </div>

        <form method="POST" action="{{ route('addQuestions') }}" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="question" class="block text-sm font-medium text-slate-700 mb-1.5">Question</label>
                <input
                    type="text"
                    id="question"
                    name="question"
                    value="{{ old('question') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter question"
                >
                @error('question')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="option1" class="block text-sm font-medium text-slate-700 mb-1.5">Option</label>
                <input
                    type="text"
                    id="option1"
                    name="option1"
                    value="{{ old('option1') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter option"
                >
                @error('option1')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div>
                <label for="option2" class="block text-sm font-medium text-slate-700 mb-1.5">Option</label>
                <input
                    type="text"
                    id="option2"
                    name="option2"
                    value="{{ old('option2') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter option"
                >
                @error('option2')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div>
                <label for="option3" class="block text-sm font-medium text-slate-700 mb-1.5">Option</label>
                <input
                    type="text"
                    id="option3"
                    name="option3"
                    value="{{ old('option3') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter option"
                >
                @error('option3')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div>
                <label for="option4" class="block text-sm font-medium text-slate-700 mb-1.5">Option</label>
                <input
                    type="text"
                    id="option4"
                    name="option4"
                    value="{{ old('option4') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter option"
                >
                @error('option4')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div>
                <label for="answer" class="block text-sm font-medium text-slate-700 mb-1.5">Answer</label>
                <select name="answer" id="answer" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out">
                    <option value="option1">A</option>
                    <option value="option2">B</option>
                    <option value="option3">C</option>
                    <option value="option4">D</option>
                </select>
                @error('answer')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
             
             
            <button
                type="submit"
                value="addQuestion"
                name="addQuestion"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]"
            >
                Add Question
            </button>
            <button name="completeQuiz" type="submit" value="completeQuiz" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]">
                Complete Quiz
            </button>
        </form>
    </div>
@endif