<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800/50 backdrop-blur-lg border border-gray-700/50 shadow-2xl sm:rounded-2xl overflow-hidden">
                <form method="POST" action="{{ route('faculty.quizzes.update', $quiz) }}">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 sm:p-8">
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                                <div class="mt-1">
                                    <input type="text" name="title" id="title" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" value="{{ old('title', $quiz->title) }}" required>
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                                <div class="mt-1">
                                    <textarea name="description" id="description" rows="4" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm">{{ old('description', $quiz->description) }}</textarea>
                                </div>
                            </div>

                            <div>
                                <label for="time_limit" class="block text-sm font-medium text-gray-300">Time Limit (minutes)</label>
                                <div class="mt-1">
                                    <input type="number" name="time_limit" id="time_limit" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" value="{{ old('time_limit', $quiz->time_limit) }}" min="1" required>
                                </div>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
                                <div class="mt-1">
                                    <select name="status" id="status" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                        <option value="draft" @if(old('status', $quiz->status) == 'draft') selected @endif>Draft</option>
                                        <option value="published" @if(old('status', $quiz->status) == 'published') selected @endif>Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-800/60 border-t border-gray-700/50 flex justify-end gap-4">
                        <a href="{{ route('faculty.quizzes.show', $quiz) }}" class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700/50 border border-gray-600 rounded-md shadow-sm hover:bg-gray-600/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-sky-500">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-sky-600 border border-transparent rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-sky-500">
                            Update Quiz
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>