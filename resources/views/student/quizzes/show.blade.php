<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $quiz->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-600 mb-2">{{ $quiz->description }}</p>
                <p class="text-sm text-gray-500 mb-6">⏱ Time Limit: {{ $quiz->time_limit }} minutes</p>

                <form method="POST" action="{{ route('student.quizzes.submit', $quiz) }}">
                    @csrf
                    @foreach($quiz->questions as $i => $question)
                    <div class="mb-6 p-4 border rounded">
                        <p class="font-semibold mb-3">{{ $i+1 }}. {{ $question->content }}</p>
                        <div class="space-y-2">
                            @foreach($question->choices as $choice)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $choice->id }}" required>
                                <span>{{ $choice->content }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded"
                        onclick="return confirm('Submit your answers?')">
                        Submit Quiz
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>