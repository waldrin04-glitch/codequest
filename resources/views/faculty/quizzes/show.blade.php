<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-200 leading-tight">{{ $quiz->title }}</h2>
                <p class="text-sm text-gray-400 mt-1">{{ $quiz->description }}</p>
            </div>
            <div class="mt-4 md:mt-0 flex gap-2">
                <a href="{{ route('faculty.quizzes.edit', $quiz) }}" class="bg-amber-500/20 text-amber-400 hover:bg-amber-500/30 font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">
                    Edit Quiz
                </a>
                <a href="{{ route('faculty.quizzes.index') }}" class="bg-gray-700/50 text-gray-300 hover:bg-gray-600/50 font-bold py-2 px-4 rounded-lg transition duration-300 text-sm">
                    Back to Quizzes
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Column: Questions List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-gray-800/50 backdrop-blur-lg border border-gray-700/50 shadow-2xl sm:rounded-2xl">
                    <div class="p-6 border-b border-gray-700/50">
                        <h3 class="text-lg font-semibold text-white">Questions ({{ $quiz->questions->count() }})</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        @forelse($quiz->questions as $i => $question)
                        <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/50">
                            <div class="flex justify-between items-start">
                                <p class="font-semibold text-gray-200">{{ $i + 1 }}. {{ $question->content }} <span class="text-xs text-sky-400">({{ $question->points }} pts)</span></p>
                                <div class="flex gap-3">
                                    <a href="{{ route('faculty.questions.edit', [$quiz, $question]) }}" class="text-amber-400 hover:text-amber-300 text-sm">Edit</a>
                                    <form method="POST" action="{{ route('faculty.questions.destroy', [$quiz, $question]) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm" onclick="return confirm('Delete this question?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <ul class="mt-3 space-y-2">
                                @foreach($question->choices as $choice)
                                <li class="text-sm flex items-center gap-2 {{ $choice->is_correct ? 'text-green-400 font-semibold' : 'text-gray-300' }}">
                                    @if($choice->is_correct)
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    @else
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    @endif
                                    <span>{{ $choice->content }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @empty
                        <div class="text-center py-12 text-gray-400">
                            <svg class="mx-auto h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-white">No questions yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Add a question using the form.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Column: Add Question Form -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800/50 backdrop-blur-lg border border-gray-700/50 shadow-2xl sm:rounded-2xl sticky top-24">
                    <form method="POST" action="{{ route('faculty.questions.store', $quiz) }}">
                        @csrf
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-white mb-4">Add New Question</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300">Question</label>
                                    <textarea name="content" rows="3" class="mt-1 block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" required></textarea>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300">Type</label>
                                        <select name="type" id="questionType" class="mt-1 block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="true_false">True/False</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300">Points</label>
                                        <input type="number" name="points" value="10" min="1" class="mt-1 block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                    </div>
                                </div>
                                <div id="choicesContainer">
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Choices</label>
                                    <div class="space-y-2" id="choicesList">
                                        @foreach(range(0, 3) as $i)
                                        <div class="flex items-center gap-2">
                                            <input type="radio" name="is_correct" value="{{ $i }}" class="focus:ring-sky-500 h-4 w-4 text-sky-600 bg-gray-700 border-gray-600" {{ $i == 0 ? 'checked' : '' }}>
                                            <input type="text" name="choices[]" placeholder="Choice {{ $i + 1 }}" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" required>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-800/60 border-t border-gray-700/50">
                            <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-white bg-sky-600 border border-transparent rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-sky-500">
                                Add Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questionType = document.getElementById('questionType');
            const choicesList = document.getElementById('choicesList');
            const choicesContainer = document.getElementById('choicesContainer');

            function toggleChoices() {
                if (questionType.value === 'true_false') {
                    choicesContainer.querySelector('label').textContent = 'Correct Answer';
                    choicesList.innerHTML = `
                        <div class="flex items-center gap-4">
                            <div class="flex items-center">
                                <input type="radio" name="is_correct" value="0" id="true_choice" class="focus:ring-sky-500 h-4 w-4 text-sky-600 bg-gray-700 border-gray-600" checked>
                                <label for="true_choice" class="ml-2 block text-sm text-gray-300">True</label>
                                <input type="hidden" name="choices[]" value="True">
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="is_correct" value="1" id="false_choice" class="focus:ring-sky-500 h-4 w-4 text-sky-600 bg-gray-700 border-gray-600">
                                <label for="false_choice" class="ml-2 block text-sm text-gray-300">False</label>
                                <input type="hidden" name="choices[]" value="False">
                            </div>
                        </div>
                    `;
                } else {
                    choicesContainer.querySelector('label').textContent = 'Choices';
                    choicesList.innerHTML = `
                        ${[...Array(4).keys()].map(i => `
                        <div class="flex items-center gap-2">
                            <input type="radio" name="is_correct" value="${i}" class="focus:ring-sky-500 h-4 w-4 text-sky-600 bg-gray-700 border-gray-600" ${i === 0 ? 'checked' : ''}>
                            <input type="text" name="choices[]" placeholder="Choice ${i + 1}" class="block w-full bg-gray-700/50 border-gray-600 rounded-md shadow-sm text-white focus:ring-sky-500 focus:border-sky-500 sm:text-sm" required>
                        </div>
                        `).join('')}
                    `;
                }
            }

            questionType.addEventListener('change', toggleChoices);
            // Initial call
            // toggleChoices(); 
        });
    </script>
</x-app-layout>