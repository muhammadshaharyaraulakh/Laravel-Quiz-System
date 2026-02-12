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
<section class="max-w-4xl mx-auto p-4 font-sans">
  
  <div class="mb-8 border-b border-gray-200 pb-4">
    <span class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Quiz Details</span>
    <h1 class="text-3xl font-bold text-gray-800 mt-1">{{ $quiz->name }}</h1>
    <p class="text-gray-500 mt-2 text-sm"> Questions : {{ $questions->count() }}</p>
  </div>

  <div class="space-y-6">
@foreach($questions as $index => $question)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-start gap-4">
        <div class="flex gap-4">
          <span class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold text-sm">
            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
          </span>
          <h3 class="text-lg font-medium text-gray-800 pt-0.5">
            {{ $question->question }}
          </h3>
        </div>
        
        <div class="flex items-center gap-2 flex-shrink-0">
                          <div class="flex items-center justify-center gap-3">
                <a href="{{ route('editQuestion', ['id' => $question->id]) }}" class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow-sm
                   hover:bg-blue-700 hover:shadow-md
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            Edit Question

                </a>
                    <form method="POST" action="{{ route('deleteQuestion', ['id' => $question->id]) }}" class="inline-block ml-2">
        @csrf
        @method('DELETE')

        <button
            class="bg-red-600 text-white px-4 py-1.5 rounded-lg shadow-sm
                   hover:bg-red-700 hover:shadow-md
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            Delete
        </button>
    </form>
              </div>
        </div>
      </div>

      <div class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div class="border border-gray-200 rounded-lg p-3 flex items-center gap-3 text-gray-600">
                <span class="text-xs font-bold text-gray-400">A</span> "{{ $question->option1 }}"
            </div>
            <div class="border border-gray-200 rounded-lg p-3 flex items-center gap-3 text-gray-600">
                <span class="text-xs font-bold text-gray-400">B</span> "{{ $question->option2 }}"
            </div>
            <div class="border border-gray-200 rounded-lg p-3 flex items-center gap-3 text-gray-600">
                <span class="text-xs font-bold text-gray-400">C</span> "{{ $question->option3 }}"
            </div>
            <div class="border border-gray-200 rounded-lg p-3 flex items-center gap-3 text-gray-600">
                <span class="text-xs font-bold text-gray-400">D</span> "{{ $question->option4 }}"
            </div>
        </div>

        <div class="bg-gray-50 rounded-md p-3 text-sm text-gray-700 flex gap-2">
            <span class="font-bold text-gray-900">Correct Answer:</span> 
            <span class="text-green-700 font-medium"> ("{{ $question->{$question->answer} }}")</span>
</div>
      </div>
    </div>
   @endforeach
</section>
</body>
</html>