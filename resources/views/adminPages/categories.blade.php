<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
    </style>
</head>
<body class="min-h-screen">

<x-navigation-bar />

@if(session('success'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
</div>
@endif

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">

    <!-- Add Category Form -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden max-w-md mx-auto">
        <div class="px-8 pt-8 pb-6">
            <h1 class="text-2xl font-bold text-slate-900 text-center">Add Category</h1>
            <p class="text-center text-slate-500 text-sm mt-2">Enter your details to add a new category</p>
        </div>

        <form method="POST" class="px-8 pb-8 space-y-5">
            @csrf

            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-1.5">Category Name</label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    value="{{ old('category') }}"
                    autofocus
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 ease-in-out placeholder-slate-400"
                    placeholder="Enter category name"
                >
                @error('category')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg cursor-pointer shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]"
            >
                Add Category
            </button>
        </form>
    </div>

    <!-- Categories Table -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-800">All Categories</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-slate-600 uppercase tracking-wider">Sr.</th>
                        <th class="px-4 py-3 text-left font-medium text-slate-600 uppercase tracking-wider">Category Name</th>
                        <th class="px-4 py-3 text-left font-medium text-slate-600 uppercase tracking-wider">Creator</th>
                        <th class="px-4 py-3 text-center font-medium text-slate-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-slate-100">
                    @forelse($categories as $index => $category)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-4 py-3 whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 whitespace-nowrap font-medium text-slate-800">{{ $category->name }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-slate-600">{{ $category->created_by ?? 'N/A' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">

        
        <a href="{{ route('allQuizzes', ['id' => $category->id]) }}"
            class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow-sm 
                   hover:bg-blue-700 hover:shadow-md 
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            View 
        </a>

    <form method="POST" action="{{ route('deleteCategory', ['id' => $category->id]) }}" class="inline-block ml-2">
        @csrf
        @method('DELETE')

        <button 
            class="bg-red-600 text-white px-4 py-1.5 rounded-lg shadow-sm 
                   hover:bg-red-700 hover:shadow-md 
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            Delete
        </button>
    </form>
</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-slate-500">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
