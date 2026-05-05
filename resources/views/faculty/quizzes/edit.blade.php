<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Available Quizzes</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($quizzes as $quiz)
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-lg">{{ $quiz->title }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $quiz->description }}</p>
                    <p class="text-sm text-gray-500 mt-2">⏱ {{ $quiz->time_limit }} mins | {{ $quiz->questions->count() }} questions</p>
                    <a href="{{ route('student.quizzes.show', $quiz) }}"
                        class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Take Quiz</a>
                </div>
                @empty
                <p class="text-gray-500">No quizzes available yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>