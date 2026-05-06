<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">💻 Edit Coding Challenge</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('faculty.challenges.update', $challenge) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title', $challenge->title) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $challenge->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sample Input <span class="text-gray-400 text-xs">(optional)</span></label>
                        <textarea name="sample_input" rows="2"
                                  class="w-full border rounded px-3 py-2 font-mono text-sm focus:outline-none focus:ring focus:border-blue-300">{{ old('sample_input', $challenge->sample_input) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expected Output</label>
                        <textarea name="expected_output" rows="2"
                                  class="w-full border rounded px-3 py-2 font-mono text-sm focus:outline-none focus:ring focus:border-blue-300">{{ old('expected_output', $challenge->expected_output) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Points</label>
                        <input type="number" name="points" value="{{ old('points', $challenge->points) }}" min="1"
                               class="w-32 border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
                            Save as Draft
                        </button>
                        <button type="submit" name="publish" value="1"
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Save & Publish
                        </button>
                        <a href="{{ route('faculty.challenges.index') }}"
                           class="px-6 py-2 rounded border hover:bg-gray-50 text-gray-600">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>