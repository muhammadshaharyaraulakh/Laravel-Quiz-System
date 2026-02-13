<x-header title="Forgot Password" />

<body class="bg-slate-50 flex items-center justify-center min-h-screen px-4 py-8">

<div class="w-full max-w-sm bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100">

    <div class="px-8 pt-8 pb-6">
        <h1 class="text-2xl font-bold text-slate-900 text-center">Forgot Password</h1>
        <p class="text-center text-slate-500 text-sm mt-2">
            Enter your email to receive reset link
        </p>
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="px-8 pb-8 space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Email
            </label>
            <input type="email" name="email" required
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                placeholder="name@gmail.com">

            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg">
            Send Reset Link
        </button>
    </form>

</div>
</body>
