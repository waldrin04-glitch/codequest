<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('My Quizzes') }}
            </h2>
            <a href="{{ route('faculty.quizzes.create') }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                {{ __('Create Quiz') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-500/10 text-green-400 border border-green-500/20 p-4 rounded-lg mb-6">{{ session('success') }}</div>
            @endif

            <div class="bg-gray-800/50 backdrop-blur-lg border border-gray-700/50 shadow-2xl sm:rounded-2xl overflow-hidden">
                <div class="p-6 bg-gray-800/60 border-b border-gray-700/50">
                    <h3 class="text-lg font-semibold text-white">Your Quizzes</h3>
                    <p class="text-gray-400 mt-1">A list of all the quizzes you have created.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700/50">
                        <thead class="bg-gray-800/40">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Time Limit</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800/50 divide-y divide-gray-700/50">
                            @forelse($quizzes as $quiz)
                            <tr class="hover:bg-gray-700/50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-white">{{ $quiz->title }}</div>
                                    <div class="text-sm text-gray-400">{{ $quiz->questions->count() }} Questions</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $quiz->status === 'published' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                                        {{ ucfirst($quiz->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $quiz->time_limit }} mins</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-4">
                                    <a href="{{ route('faculty.quizzes.show', $quiz) }}" class="text-sky-400 hover:text-sky-300">View</a>
                                    <a href="{{ route('faculty.quizzes.edit', $quiz) }}" class="text-amber-400 hover:text-amber-300">Edit</a>
                                    <form method="POST" action="{{ route('faculty.quizzes.destroy', $quiz) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure you want to delete this quiz? This action cannot be undone.')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-white">No quizzes</h3>
                                        <p class="mt-1 text-sm text-gray-400">Get started by creating a new quiz.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>