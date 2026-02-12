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
    <a href="{{ route('quizUi') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out active:scale-[0.98]">
      Add New Quiz
    </a>
  </div>

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
                <a href="{{ route('details', ['id' => $quiz->id]) }}" class="text-blue-600 hover:text-blue-900" title="View">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </a>
                <button class="text-red-600 hover:text-red-900" title="Delete">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</section>
</body>
</html>