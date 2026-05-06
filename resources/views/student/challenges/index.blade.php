<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">💻 Coding Challenges</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($challenges as $challenge)
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-lg text-gray-800">{{ $challenge->title }}</h3>
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded">
                            {{ $challenge->points }} pts
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $challenge->description }}</p>
                    <a href="{{ route('student.challenges.show', $challenge) }}"
                       class="block text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                        View Challenge
                    </a>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-500 py-12">
                    No challenges available yet.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>