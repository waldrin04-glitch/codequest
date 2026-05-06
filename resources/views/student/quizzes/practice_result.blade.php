<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📖 Practice Result: {{ $quiz->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Score Summary --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                <p class="text-gray-500 text-sm mb-1">Your Practice Score</p>
                <p class="text-5xl font-bold {{ $score === $totalPoints ? 'text-green-600' : 'text-blue-600' }}">
                    {{ $score }} / {{ $totalPoints }}
                </p>
                <p class="text-gray-400 text-sm mt-2">This score was not recorded.</p>
            </div>

            {{-- Per Question Results --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Question Review</h3>
                <div class="space-y-4">
                    @foreach($results as $i => $result)
                    <div class="p-4 border rounded {{ $result['is_correct'] ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                        <p class="font-semibold mb-2">{{ $i + 1 }}. {{ $result['question'] }}</p>
                        <p class="text-sm">
                            Your answer:
                            <span class="{{ $result['is_correct'] ? 'text-green-700 font-bold' : 'text-red-700 font-bold' }}">
                                {{ $result['selected'] }}
                            </span>
                        </p>
                        @if(!$result['is_correct'])
                        <p class="text-sm text-green-700 mt-1">
                            Correct answer: <span class="font-bold">{{ $result['correct'] }}</span>
                        </p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <a href="{{ route('student.quizzes.practice', $quiz) }}"
                   class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                    Try Again
                </a>
                <a href="{{ route('student.quizzes.index') }}"
                   class="px-6 py-2 rounded border hover:bg-gray-50 text-gray-600">
                    Back to Quizzes
                </a>
            </div>

        </div>
    </div>
</x-app-layout>