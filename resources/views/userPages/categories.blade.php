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
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Page Header -->
    <div class="mb-3">
        <h1 class="text-3xl font-bold text-slate-800">Categories</h1>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-slate-600 uppercase tracking-wider">Sr.</th>
                        <th class="px-6 py-4 text-left font-semibold text-slate-600 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left font-semibold text-slate-600 uppercase tracking-wider">Total Quizes</th>
                        <th class="px-6 py-4 text-center font-semibold text-slate-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 bg-white">
                    
                    @forelse($categories as $index => $category)
                    <tr class="hover:bg-slate-50 transition duration-200">

                        <td class="px-6 py-4 font-medium text-slate-700">
                            {{ $categories->firstItem() + $index }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-800">
                                {{ $category->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">
                            {{ $category->quizzes->count() }}
                        </td>

                        

                        <td class="px-6 py-4 text-center space-x-2">

                            <a href="{{ route('quizzes', ['id' => $category->id]) }}"
                               class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-sm
                                      hover:bg-indigo-700 hover:shadow-md
                                      transition duration-200 text-xs font-semibold">
                                View
                            </a>

                            

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                            No categories found.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</div>
</body>
</html>
