    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                
                <div class="flex items-center cursor-pointer">
                        <span class="font-bold text-xl tracking-tight text-gray-900">Quiz<span class="text-indigo-600"> System</span></span>

                </div>

                <div class="hidden md:flex md:space-x-8 items-center">
                    <a href="{{ route('dashboard') }}" class="text-indigo-600 font-semibold border-b-2 border-indigo-600 px-1 pt-1 text-sm">
                        Dashboard
                    </a>
                    <a href="{{ route('categories') }}" class="text-gray-500 hover:text-indigo-600 hover:border-b-2 hover:border-indigo-300 px-1 pt-1 text-sm font-medium transition-all duration-300">
                        Categories
                    </a>
                    <a href="{{ route('quiz') }}" class="text-gray-500 hover:text-indigo-600 hover:border-b-2 hover:border-indigo-300 px-1 pt-1 text-sm font-medium transition-all duration-300">
                        Take Quiz
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Welcome</p>
                            <p class="text-sm font-bold text-gray-800">{{ Session::get('admin_name') }}</p>
                        </div>
                        <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 p-[2px]">
                            <div class="h-full w-full rounded-full bg-white flex items-center justify-center">
                                <span class="font-bold text-indigo-600">{{ substr(Session::get('admin_name'), 0, 1) }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('logout') }}" class="group flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-full transition-colors duration-200">
                        <span>Logout</span>
                        
                    </a>
                </div>

                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" onclick="toggleMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden md:hidden bg-white border-t border-gray-100" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1 px-4">
                <a href="{{ route('dashboard') }}" class="bg-indigo-50 border-l-4 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 text-base font-medium">Dashboard</a>
                <a href="{{ route('categories') }}" class="border-l-4 border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 text-base font-medium">Categories</a>
                <a href="{{ route('quiz') }}" class="border-l-4 border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 text-base font-medium">Take Quiz</a>
            </div>
            <div class="pt-4 pb-4 border-t border-gray-200">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">{{ substr(Session::get('admin_name'), 0, 1) }}</div>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{ Session::get('admin_name') }}</div>
                        
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{ route('logout') }}" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>