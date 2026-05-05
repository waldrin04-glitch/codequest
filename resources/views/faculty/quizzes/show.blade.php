<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $quiz->title }}</h2>
            <a href="{{ route('faculty.quizzes.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-600">{{ $quiz->description }}</p>
                <p class="mt-2 text-sm text-gray-500">Time Limit: {{ $quiz->time_limit }} mins | Status: {{ ucfirst($quiz->status) }}</p>
                <a href="{{ route('faculty.quizzes.edit', $quiz) }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit Quiz</a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Questions ({{ $quiz->questions->count() }})</h3>
                @forelse($quiz->questions as $i => $question)
                <div class="mb-4 p-4 border rounded">
                    <p class="font-semibold">{{ $i+1 }}. {{ $question->content }}</p>
                    <ul class="mt-2 space-y-1">
                        @foreach($question->choices as $choice)
                        <li class="text-sm {{ $choice->is_correct ? 'text-green-600 font-bold' : 'text-gray-600' }}">
                            {{ $choice->is_correct ? '✓' : '○' }} {{ $choice->content }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @empty
                <p class="text-gray-500">No questions yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>