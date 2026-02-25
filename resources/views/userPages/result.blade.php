<x-header title="Quiz Result" />

<body class="bg-gradient-to-br from-slate-50 via-indigo-50 to-purple-50 min-h-screen font-sans">
<x-navbar />

<main class="max-w-4xl mx-auto px-4 py-20">

    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-10 text-center space-y-6">

        <h1 class="text-3xl md:text-4xl font-bold text-indigo-600">
            Quiz Completed!
        </h1>

        <p class="text-gray-600 text-lg">
            Here's your result:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

            <div class="bg-indigo-50 p-6 rounded-xl shadow-md border border-indigo-100">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Score</h2>
                <p class="text-3xl font-bold text-indigo-700">{{ $score }}</p>
            </div>

            <div class="bg-indigo-50 p-6 rounded-xl shadow-md border border-indigo-100">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Questions</h2>
                <p class="text-3xl font-bold text-indigo-700">{{ $total }}</p>
            </div>

            <div class="bg-indigo-50 p-6 rounded-xl shadow-md border border-indigo-100">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Percentage</h2>
                <p class="text-3xl font-bold text-indigo-700">{{ number_format($percentage, 2) }}%</p>
            </div>

        </div>

        <div class="mt-8">
            @php
                $passPercentage = 50; // Set your passing threshold
            @endphp

            @if($percentage >= $passPercentage)
                <p class="text-green-600 text-lg font-semibold"> Congratulations! You passed the quiz.</p>
            @else
                <p class="text-red-600 text-lg font-semibold"> You did not pass. Better luck next time!</p>
            @endif
        </div>



    </div>

</main>
</body>
