 <x-header
 title="Login"
/>
<body class="bg-slate-50 flex items-center justify-center min-h-screen px-4 py-8">


    <div class="w-full max-w-sm bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100">

        <div class="px-8 pt-8 pb-6">
            <h1 class="text-2xl font-bold text-slate-900 text-center">Welcome Back</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Enter your details to sign in</p>
        </div>

        <form method="POST" action="{{ route('Login') }}" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="name@gmail.com">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter your password">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="text-right mt-1">
                <a href="{{ route('ForgotPassword') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                    Forgot password?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]">
                Sign In
            </button>
        </form>

        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500">
                Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">Sign up</a>
            </p>
        </div>

    </div>
</body>
</html>
