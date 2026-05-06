<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">💻 Coding Challenges</h2>
            <a href="{{ route('faculty.challenges.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + New Challenge
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4">Title</th>
                            <th class="p-4">Points</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($challenges as $challenge)
                        <tr class="border-t">
                            <td class="p-4">{{ $challenge->title }}</td>
                            <td class="p-4">{{ $challenge->points }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-xs font-bold
                                    {{ $challenge->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst($challenge->status) }}
                                </span>
                            </td>
                            <td class="p-4 flex gap-2">
                                <a href="{{ route('faculty.challenges.edit', $challenge) }}"
                                   class="text-blue-600 hover:underline text-sm">Edit</a>
                                <form action="{{ route('faculty.challenges.destroy', $challenge) }}" method="POST"
                                      onsubmit="return confirm('Delete this challenge?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">No challenges yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>