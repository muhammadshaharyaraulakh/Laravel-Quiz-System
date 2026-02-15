<x-header title="Quiz"/>

<body class="bg-gradient-to-br from-slate-50 via-indigo-50 to-purple-50 min-h-screen font-sans">
<x-navbar />

<div class="fixed top-20 right-6 z-50">
    <div id="timerBox"
        class="flex items-center gap-3 bg-white/80 backdrop-blur-lg px-6 py-3 rounded-2xl shadow-xl border border-indigo-100">
        <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
        <span id="timer" class="text-xl font-bold text-indigo-700 tracking-widest">15:00</span>
    </div>
</div>

<main class="max-w-4xl mx-auto px-4 py-12 space-y-10">

    <div class="text-center space-y-3">
        <p class="text-gray-500">
            Answer all questions before the timer runs out.
        </p>
    </div>

    {{-- IMPORTANT: Correct Action --}}
<form id="quizForm" method="POST" 
      action="{{ route('quiz.submit', $questions->first()->quiz_id) }}">
    @csrf



        @foreach($questions as $index => $question)
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10 space-y-6">

            <div class="flex items-start gap-4">
                <span class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold">
                    {{ $index + 1 }}
                </span>

                <div class="w-full">
                    <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-6">
                        {{ $question->question }}
                    </h2>

                    <div class="grid gap-4">

                        {{-- OPTION 1 --}}
                        <label class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
                            <input type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="option1"
                                   required
                                   class="w-5 h-5 text-indigo-600">
                            <span>{{ $question->option1 }}</span>
                        </label>

                        {{-- OPTION 2 --}}
                        <label class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
                            <input type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="option2"
                                   class="w-5 h-5 text-indigo-600">
                            <span>{{ $question->option2 }}</span>
                        </label>

                        {{-- OPTION 3 --}}
                        <label class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
                            <input type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="option3"
                                   class="w-5 h-5 text-indigo-600">
                            <span>{{ $question->option3 }}</span>
                        </label>

                        {{-- OPTION 4 --}}
                        <label class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition">
                            <input type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="option4"
                                   class="w-5 h-5 text-indigo-600">
                            <span>{{ $question->option4 }}</span>
                        </label>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-center pt-6">
            <button type="button"
                    onclick="confirmSubmit()"
                    class="px-10 py-4 bg-indigo-600 text-white font-semibold rounded-2xl shadow-lg hover:bg-indigo-700 transition transform hover:scale-105 active:scale-95">
                Submit Quiz
            </button>
        </div>

    </form>
</main>

<script>
    let timeRemaining = 15 * 60;
    const timer = document.getElementById("timer");
    const timerBox = document.getElementById("timerBox");
    const form = document.getElementById("quizForm");
    let submitted = false;

    const countdown = setInterval(() => {

        const minutes = Math.floor(timeRemaining / 60);
        let seconds = timeRemaining % 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        timer.innerText = `${minutes}:${seconds}`;

        if (timeRemaining <= 60) {
            timer.classList.remove("text-indigo-700");
            timer.classList.add("text-red-600");
            timerBox.classList.add("border-red-200");
        }

        if (timeRemaining === 0) {
            clearInterval(countdown);
            if (!submitted) {
                submitted = true;
                form.submit();
            }
        }

        timeRemaining--;

    }, 1000);

function confirmSubmit() {
    if(confirm("Are you sure you want to submit your answers?")) {
        // Submit the form
        document.getElementById('quizForm').submit();
    }
}


</script>

</body>
</html>
