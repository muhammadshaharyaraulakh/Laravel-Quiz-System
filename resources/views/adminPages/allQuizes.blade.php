<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen">

<x-navigation-bar />
<section class="max-w-6xl mx-auto p-4 font-sans">

  <div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Available Quizzes</h2>
  </div>
@session('success')
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endsession
 @if($allquizes->isEmpty())
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
        <h3 class="text-lg font-medium text-gray-800">No quizzes found</h3>
        <p class="text-gray-500 mt-2">Please create a quiz to see it listed here.</p>
    </div>
@else
  <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
          <tr>
            <th scope="col" class="px-6 py-3 w-16 text-center">Sr.</th>
            <th scope="col" class="px-6 py-3">Quiz Title</th>
            <th scope="col" class="px-6 py-3 text-center w-32">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($allquizes as $index => $quiz)
          <tr class="bg-white hover:bg-gray-50 transition">
            <td class="px-6 py-4 font-medium text-gray-900 text-center">{{ $index + 1 }}</td>
            <td class="px-6 py-4 font-semibold text-gray-800">
              {{ $quiz->name }}
              <span class="block text-xs text-gray-500 font-normal mt-1">Created: {{ $quiz->created_at->format('d M Y') }}</span>
            </td>
            <td class="px-6 py-4 text-center">
              <div class="flex items-center justify-center gap-3">
                <a href="{{ route('details', ['id' => $quiz->id]) }}" class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow-sm
                   hover:bg-blue-700 hover:shadow-md
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            View

                </a>
                    <form method="POST" action="{{ route('deleteQuiz', ['id' => $quiz->id]) }}" class="inline-block ml-2">
        @csrf
        @method('DELETE')

        <button
            class="bg-red-600 text-white px-4 py-1.5 rounded-lg shadow-sm
                   hover:bg-red-700 hover:shadow-md
                   transition duration-200 ease-in-out cursor-pointer text-sm font-medium">
            Delete
        </button>
    </form>
              </div>
            </td>
          </tr>

          @endforeach
@endif
        </tbody>
      </table>
    </div>
  </div>
</section>
</body>
</html>
