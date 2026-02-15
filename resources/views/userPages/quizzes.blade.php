<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster - User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                 <div class="flex items-center cursor-pointer">
                        <span class="font-bold text-xl tracking-tight text-gray-900">Quiz<span class="text-indigo-600"> System</span></span>

                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">home</a>
                    <a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Leaderboard</a>
                    <a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">History</a>
                    <button class="flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-full transition-all duration-300 hover:shadow-md group">
                        <span class="text-sm font-semibold">Shaharyar</span>
                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 group-hover:bg-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </button>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-600 hover:text-indigo-600 focus:outline-none transition-transform active:scale-95">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 animate-fade-in-down">
            <div class="px-4 pt-2 pb-4 space-y-1 shadow-lg">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">Dashboard</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">Leaderboard</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">History</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-600 bg-indigo-50 mt-2">My Profile</a>
            </div>
        </div>
    </nav>

<section class="max-w-6xl mx-auto p-4 font-sans">

  <div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Available Quizzes</h2>
  </div>

 @if($quizzes->isEmpty())
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
        <h3 class="text-lg font-medium text-gray-800">Currently No Quiz is Available</h3>
    </div>
@else
  <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
          <tr>
            <th scope="col" class="px-6 py-3 w-16 text-center">Sr.</th>
            <th scope="col" class="px-6 py-3">Quiz Title</th>
            <th scope="col" class="px-6 py-3 text-center w-32">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($quizzes as $index => $quiz)
          <tr class="bg-white hover:bg-gray-50 transition">
            <td class="px-6 py-4 font-medium text-gray-900 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 font-semibold text-gray-800">
              {{ $quiz->name }}
              <span class="block text-xs text-gray-500 font-normal mt-1">Created: {{ $quiz->created_at->format('d M Y') }}</span>
            </td>
            <td class="px-6 py-4 text-center">
        <a href="{{ route('quiz.attempt', ['quiz' => $quiz->id]) }}" class="text-blue-600 hover:text-blue-800">
        <button
            class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow-sm
                   hover:bg-blue-700 hover:shadow-md
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            Attempt
        </button>
        </a>

</td>

          </tr>

          @endforeach
@endif
        </tbody>
      </table>
    </div>
  </div>
</section>
</body>
</html>
