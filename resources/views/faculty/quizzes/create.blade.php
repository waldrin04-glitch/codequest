<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Quiz</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('faculty.quizzes.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border rounded p-2" required>
                        @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full border rounded p-2">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Time Limit (minutes)</label>
                        <input type="number" name="time_limit" value="{{ old('time_limit', 30) }}"
                            class="w-full border rounded p-2" min="1" required>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Quiz</button>
                        <a href="{{ route('faculty.quizzes.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>