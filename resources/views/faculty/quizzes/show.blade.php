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

            {{-- Quiz Info --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-600">{{ $quiz->description }}</p>
                <p class="mt-2 text-sm text-gray-500">Time Limit: {{ $quiz->time_limit }} mins | Status: {{ ucfirst($quiz->status) }}</p>
                <a href="{{ route('faculty.quizzes.edit', $quiz) }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit Quiz</a>
            </div>

            {{-- Add Question Form --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Add Question</h3>
                <form method="POST" action="{{ route('faculty.questions.store', $quiz) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Question</label>
                        <textarea name="content" rows="2" class="w-full border rounded p-2" required></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Type</label>
                            <select name="type" class="w-full border rounded p-2" id="questionType" onchange="updateChoices()">
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="true_false">True/False</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Points</label>
                            <input type="number" name="points" value="1" min="1" class="w-full border rounded p-2">
                        </div>
                    </div>

                    <div id="choicesContainer" class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Choices (select the correct one)</label>
                        <div class="space-y-2" id="choicesList">
                            @foreach(['A', 'B', 'C', 'D'] as $i => $letter)
                            <div class="flex items-center gap-2">
                                <input type="radio" name="correct" value="{{ $i }}" {{ $i == 0 ? 'checked' : '' }}>
                                <input type="text" name="choices[]" placeholder="Choice {{ $letter }}" class="w-full border rounded p-2" required>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Question</button>
                </form>
            </div>

            {{-- Questions List --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Questions ({{ $quiz->questions->count() }})</h3>
                @forelse($quiz->questions as $i => $question)
                <div class="mb-4 p-4 border rounded">
                    <div class="flex justify-between">
                        <p class="font-semibold">{{ $i+1 }}. {{ $question->content }}</p>
                        <form method="POST" action="{{ route('faculty.questions.destroy', [$quiz, $question]) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm" onclick="return confirm('Delete this question?')">Delete</button>
                        </form>
                    </div>
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

    <script>
        function updateChoices() {
            const type = document.getElementById('questionType').value;
            const list = document.getElementById('choicesList');
            if (type === 'true_false') {
                list.innerHTML = `
                    <div class="flex items-center gap-2">
                        <input type="radio" name="correct" value="0" checked>
                        <input type="text" name="choices[]" value="True" class="w-full border rounded p-2" required>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="correct" value="1">
                        <input type="text" name="choices[]" value="False" class="w-full border rounded p-2" required>
                    </div>`;
            } else {
                list.innerHTML = `
                    ${['A','B','C','D'].map((l,i) => `
                    <div class="flex items-center gap-2">
                        <input type="radio" name="correct" value="${i}" ${i==0?'checked':''}>
                        <input type="text" name="choices[]" placeholder="Choice ${l}" class="w-full border rounded p-2" required>
                    </div>`).join('')}`;
            }
        }
    </script>
</x-app-layout>