 <x-header 
 title="Quiz Master"
/>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">
<x-navbar />

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="mb-3">
        <h1 class="text-3xl font-bold text-slate-800">Categories</h1>
    </div>


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

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</div>
<x-footer />