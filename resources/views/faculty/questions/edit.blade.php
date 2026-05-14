<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800/50 backdrop-blur-lg border border-gray-700/50 shadow-2xl sm:rounded-2xl overflow-hidden">
                <form method="POST" action="{{ route('faculty.questions.update', [$quiz, $question]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 sm:p-8">
                        <div class="space-y-6">
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-300">Question</label>
                                <div class="mt-1">
                                    <textarea name="content" id="content" rows="3" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" required>{{ old('content', $question->content) }}</textarea>
                                </div>
                            </div>

                            <div>
                                <label for="points" class="block text-sm font-medium text-gray-300">Points</label>
                                <div class="mt-1">
                                    <input type="number" name="points" id="points" value="{{ old('points', $question->points) }}" min="1" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                </div>
                            </div>

                            <div id="choicesContainer">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Choices</label>
                                <div class="space-y-2" id="choicesList">
                                    @foreach($question->choices as $i => $choice)
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="correct" value="{{ $i }}" class="focus:ring-sky-500 h-4 w-4 text-sky-600 bg-gray-700 border-gray-600" {{ $choice->is_correct ? 'checked' : '' }}>
                                        <input type="text" name="choices[]" value="{{ $choice->content }}" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" required>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-800/60 border-t border-gray-700/50 flex justify-end gap-4">
                        <a href="{{ route('faculty.quizzes.show', $quiz) }}" class="px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700/50 border border-gray-600 rounded-md shadow-sm hover:bg-gray-600/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-sky-500">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-sky-600 border border-transparent rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-sky-500">
                            Update Question
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
