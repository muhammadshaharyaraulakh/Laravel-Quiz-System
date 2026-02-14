 <x-header 
 title="Quiz Master"
/>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

<x-navbar />


    <section class="relative bg-white pt-24 pb-28 px-4 sm:px-6 lg:px-8 border-b border-slate-200 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl pointer-events-none opacity-40">
            <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
            <div class="absolute top-10 right-10 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative max-w-4xl mx-auto text-center animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                Find your next <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Challenge</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-500 mb-10">
                Explore thousands of quizzes across various categories and boost your knowledge.
            </p>

            <div class="relative max-w-2xl mx-auto group z-10">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-slate-400 group-focus-within:text-indigo-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" 
                    class="block w-full pl-12 pr-4 py-4 border-2 border-slate-200 rounded-2xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 sm:text-lg shadow-lg transition-all duration-300 hover:border-slate-300" 
                    placeholder="Search for Coding Related Quiz">
                <div class="absolute inset-y-0 right-3 flex items-center">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-xl transition-transform hover:scale-105 active:scale-95 shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>
            
            <div class="mt-9 flex flex-wrap justify-center gap-2">
                <span class="text-sm text-slate-500 mr-2 py-1">Trending:</span>
               <a href="{{route('quizzes', $categories[0]->id)}}"><button class="cursor-pointer px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600 hover:bg-indigo-100 hover:text-indigo-700 transition-colors">#Python</button></a> 
             <a href="{{route('quizzes', $categories[1]->id)}}"><button class="cursor-pointer
 px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600 hover:bg-purple-100 hover:text-purple-700 transition-colors">#JavaScript</button></a>
                <a href="{{route('quizzes', $categories[2]->id)}}"><button class="cursor-pointer
 px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600 hover:bg-pink-100 hover:text-pink-700 transition-colors">#Java</button></a>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-slate-900 border-l-4 border-indigo-500 pl-3">Browse Categories</h2>
            <a href="{{route('allcategories')}}" class="text-indigo-600 font-medium hover:text-indigo-800 flex items-center gap-1 transition-colors group">
                View All 
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">


    <a href="{{route('quizzes', $categories[0]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-blue-50 text-blue-600 text-xs font-bold px-2 py-1 rounded">{{$categories[0]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-400 to-yellow-400 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <i class="fa-brands fa-python text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">{{$categories[0]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Data Science, AI, Automation and Backend Development.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-blue-500 h-1.5 rounded-full w-5/6"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Very High</p>
    </a>

   
    <a href="{{route('quizzes', $categories[1]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-yellow-50 text-yellow-600 text-xs font-bold px-2 py-1 rounded">{{$categories[1]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <i class="fa-brands fa-js text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-yellow-600 transition-colors">{{$categories[1]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Frontend, Backend, Node.js and Full Stack Development.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-yellow-500 h-1.5 rounded-full w-full"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Extremely High</p>
    </a>

    <a href="{{route('quizzes', $categories[2]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-red-50 text-red-600 text-xs font-bold px-2 py-1 rounded">{{$categories[2]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <i class="fa-brands fa-java text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-red-600 transition-colors">{{$categories[2]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Enterprise Apps, Android Development and Backend Systems.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-red-500 h-1.5 rounded-full w-4/5"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: High</p>
    </a>


    <a href="{{route('quizzes', $categories[3]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-indigo-50 text-indigo-600 text-xs font-bold px-2 py-1 rounded">{{$categories[3]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-400 to-blue-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <span class="text-xl font-bold">C++</span>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors">{{$categories[3]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Game Development, System Programming and Performance Apps.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-indigo-500 h-1.5 rounded-full w-3/4"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: High</p>
    </a>

    
    <a href="{{route('quizzes', $categories[4]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-purple-50 text-purple-600 text-xs font-bold px-2 py-1 rounded">{{$categories[4]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <span class="text-xl font-bold">C#</span>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-purple-600 transition-colors">{{$categories[4]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">.NET Development, Unity Games and Enterprise Apps.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-purple-500 h-1.5 rounded-full w-2/3"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Medium</p>
    </a>

    
    <a href="{{route('quizzes', $categories[5]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-slate-50 text-slate-600 text-xs font-bold px-2 py-1 rounded">{{$categories[5]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-slate-400 to-slate-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <i class="fa-brands fa-php text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-slate-600 transition-colors">{{$categories[5]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Laravel, WordPress and Backend Web Development.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-slate-500 h-1.5 rounded-full w-3/4"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Stable</p>
    </a>

    
    <a href="{{route('quizzes', $categories[6]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-cyan-50 text-cyan-600 text-xs font-bold px-2 py-1 rounded">{{$categories[6]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-cyan-400 to-blue-400 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <span class="text-xl font-bold">Go</span>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors">{{$categories[6]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">Cloud Computing, Microservices and DevOps Tools.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-cyan-500 h-1.5 rounded-full w-1/2"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Growing</p>
    </a>

    
    <a href="{{route('quizzes', $categories[7]->id)}}" class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="absolute top-6 right-6 bg-orange-50 text-orange-600 text-xs font-bold px-2 py-1 rounded">{{$categories[7]->quizzes->count()}} Quizzes</div>
        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-400 to-amber-600 flex items-center justify-center text-white mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <span class="text-xl font-bold">Rust</span>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">{{$categories[7]->name}}</h3>
        <p class="text-sm text-slate-500 mb-4 line-clamp-2">System Programming, Performance and Memory Safety.</p>
        <div class="w-full bg-slate-100 rounded-full h-1.5 mb-2 overflow-hidden">
            <div class="bg-orange-500 h-1.5 rounded-full w-1/2"></div>
        </div>
        <p class="text-xs text-slate-400">Popularity: Rising</p>
    </a>

</div>

    </main>
<x-footer />