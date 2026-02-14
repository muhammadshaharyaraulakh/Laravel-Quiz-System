 <x-header 
 title="SignUp"
/>
<body class="bg-slate-50 flex items-center justify-center min-h-screen px-4 py-8">

    <div class="w-full max-w-sm  overflow-hidden ">

        <div class="px-8 pt-8 pb-4">
            <h1 class="text-2xl font-bold text-slate-900 text-center">Create Account</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Sign up to get started</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"  autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="John Doe">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="name@gmail.com">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Create a password">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Confirm your password">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]">
                Sign Up
            </button>
        </form>

        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500">
                Already have an account? <a href="{{ route('UserLogin') }}" class="text-indigo-600 font-medium hover:underline">Sign In</a>
            </p>
        </div>

    </div>
</body>
</html>