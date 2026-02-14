<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center cursor-pointer">
                <span class="font-bold text-xl tracking-tight text-gray-900">
                    Quiz <span class="text-indigo-600">Master</span>
                </span>
            </div>

            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                <a href="{{ route('allcategories') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Quiz Categories</a>
                <a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Result</a>

                @if(!session()->has('user_id'))
                    <a href="{{ route('UserLogin') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Login</a>
                    <a href="{{ route('register') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors duration-200">Register</a>
                @endif

                @if(session()->has('user_id'))
                    <button class="flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-full transition-all duration-300 hover:shadow-md group">
                        <span class="text-sm font-semibold">{{ session('user_name') }}</span>
                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 group-hover:bg-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </button>
                    <a href="{{ route('userLogout') }}" class="text-red-500 hover:text-red-600 font-medium transition-colors duration-200">Logout</a>
                @endif
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-slate-600 hover:text-indigo-600 focus:outline-none transition-transform active:scale-95">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<div id="mobile-menu" class="md:hidden bg-white border-t border-slate-200 shadow-sm overflow-hidden transition-all duration-300 ease-in-out max-h-0">
    <div class="px-4 py-4 space-y-3">
        <a href="{{ route('home') }}" class="block text-slate-600 hover:text-indigo-600">Home</a>
        <a href="{{ route('allcategories') }}" class="block text-slate-600 hover:text-indigo-600">Quiz Categories</a>
        <a href="#" class="block text-slate-600 hover:text-indigo-600">Result</a>
        @if(!session()->has('user_id'))
            <a href="{{ route('UserLogin') }}" class="block text-slate-600 hover:text-indigo-600">Login</a>
            <a href="{{ route('register') }}" class="block text-slate-600 hover:text-indigo-600">Register</a>
        @endif
        @if(session()->has('user_id'))
            <a href="{{ route('userLogout') }}" class="block text-red-500 hover:text-red-600">Logout</a>
        @endif
    </div>
</div>

