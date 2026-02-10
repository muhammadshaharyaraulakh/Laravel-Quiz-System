<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 flex items-center justify-center h-screen">

    <div class="w-full max-w-sm  rounded-2xl  overflow-hidden ">

        <div class="px-8 pt-8 pb-6">
            <h1 class="text-2xl font-bold text-slate-900 text-center">Welcome Back</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Enter your details to sign in</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="name@gmail.com"
                >
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                </div>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter your password"
                >
            </div>
<div class="text-right mt-1.5">
    <a href="#"
       class="text-xs font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
        Forgot password?
    </a>
</div>

            <button
                type="submit"
                class="w-full  bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer
shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]"
            >
                Sign In
            </button>
        </form>

        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500">
                Don't have an account? <a href="#" class="text-indigo-600 font-medium hover:underline">Sign up</a>
            </p>
        </div>

    </div>

</body>
</html>
