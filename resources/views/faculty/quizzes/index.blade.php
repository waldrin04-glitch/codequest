<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Quizzes</h2>
            <a href="{{ route('faculty.quizzes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Quiz</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4">Title</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Time Limit</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quizzes as $quiz)
                        <tr class="border-t">
                            <td class="p-4">{{ $quiz->title }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-sm {{ $quiz->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($quiz->status) }}
                                </span>
                            </td>
                            <td class="p-4">{{ $quiz->time_limit }} mins</td>
                            <td class="p-4 flex gap-2">
                                <a href="{{ route('faculty.quizzes.show', $quiz) }}" class="text-blue-500">View</a>
                                <a href="{{ route('faculty.quizzes.edit', $quiz) }}" class="text-yellow-500">Edit</a>
                                <form method="POST" action="{{ route('faculty.quizzes.destroy', $quiz) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Delete this quiz?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="p-4 text-center text-gray-500">No quizzes yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>