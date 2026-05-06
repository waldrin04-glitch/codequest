<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">💻 {{ $challenge->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Result Alert --}}
            @if(session('result') === 'correct')
                <div class="p-4 bg-green-100 text-green-700 rounded font-semibold">
                    ✅ Correct! You earned {{ $challenge->points }} points.
                </div>
            @elseif(session('result') === 'wrong')
                <div class="p-4 bg-red-100 text-red-700 rounded font-semibold">
                    ❌ Wrong answer. Try again!
                </div>
            @endif

            {{-- Challenge Details --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-2">Problem Description</h3>
                <p class="text-gray-700 whitespace-pre-line">{{ $challenge->description }}</p>

                @if($challenge->sample_input)
                <div class="mt-4">
                    <h4 class="font-semibold text-sm text-gray-600 mb-1">Sample Input:</h4>
                    <pre class="bg-gray-100 rounded p-3 text-sm font-mono">{{ $challenge->sample_input }}</pre>
                </div>
                @endif

                <div class="mt-4">
                    <span class="inline-block bg-blue-100 text-blue-700 text-sm font-bold px-3 py-1 rounded">
                        {{ $challenge->points }} points
                    </span>
                </div>
            </div>

            {{-- Code Editor --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Your Answer</h3>

                <form action="{{ route('student.challenges.submit', $challenge) }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Type your output below (what your code would print):
                        </label>
                        <textarea id="code" name="code" rows="10"
                                  class="w-full border rounded font-mono text-sm">{{ $submission?->code ?? '' }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Submit Answer
                        </button>
                        <a href="{{ route('student.challenges.index') }}"
                           class="px-6 py-2 rounded border hover:bg-gray-50 text-gray-600">
                            Back
                        </a>
                    </div>
                </form>
            </div>

            {{-- Previous Submission --}}
            @if($submission)
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-2">Last Submission</h3>
                <div class="flex gap-4 text-sm mb-2">
                    <span class="{{ $submission->is_correct ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                        {{ $submission->is_correct ? '✅ Correct' : '❌ Wrong' }}
                    </span>
                    <span class="text-gray-500">Score: {{ $submission->score }} pts</span>
                </div>
                <pre class="bg-gray-100 rounded p-3 text-sm font-mono">{{ $submission->code }}</pre>
            </div>
            @endif

        </div>
    </div>

    {{-- CodeMirror --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>
    <script>
        const editor = CodeMirror.fromTextArea(document.getElementById('code'), {
            lineNumbers: true,
            mode: 'php',
            theme: 'default',
            lineWrapping: true,
        });

        // Make sure CodeMirror value is submitted with the form
        document.querySelector('form').addEventListener('submit', function () {
            editor.save();
        });
    </script>
</x-app-layout>