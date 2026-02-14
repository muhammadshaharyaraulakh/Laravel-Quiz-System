<x-header title="Reset Password" />

<body class="bg-slate-50 flex items-center justify-center min-h-screen px-4 py-8">

<div class="w-full max-w-sm bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100">

    <div class="px-8 pt-8 pb-6">
        <h1 class="text-2xl font-bold text-slate-900 text-center">Reset Password</h1>
        <p class="text-center text-slate-500 text-sm mt-2">
            Enter your new password
        </p>
    </div>

    <form method="POST" action="{{ route('reset') }}" class="px-8 pb-8 space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                New Password
            </label>
            <input type="password" name="password" required
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Confirm Password
            </label>
            <input type="password" name="password_confirmation" required
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg">
            Update Password
        </button>
    </form>

</div>
</body>
