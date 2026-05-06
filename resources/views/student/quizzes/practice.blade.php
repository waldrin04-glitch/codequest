<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📖 Practice: {{ $quiz->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-yellow-50 border border-yellow-200 rounded p-4 mb-6 text-yellow-800 text-sm">
                ⚠️ This is <strong>practice mode</strong> — your answers won't be recorded or affect your score.
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-600 mb-2">{{ $quiz->description }}</p>
                <p class="text-sm text-gray-500 mb-6">⏱ Time Limit: {{ $quiz->time_limit }} minutes</p>

                <form method="POST" action="{{ route('student.quizzes.practice.submit', $quiz) }}">
                    @csrf

                    @foreach($quiz->questions as $i => $question)
                    <div class="mb-6 p-4 border rounded">
                        <p class="font-semibold mb-3">{{ $i + 1 }}. {{ $question->content }}</p>
                        <div class="space-y-2">
                            @foreach($question->choices as $choice)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $choice->id }}">
                                <span>{{ $choice->content }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600"
                                onclick="return confirm('Submit practice answers?')">
                            Submit Practice
                        </button>
                        <a href="{{ route('student.quizzes.index') }}"
                           class="px-6 py-2 rounded border hover:bg-gray-50 text-gray-600">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>