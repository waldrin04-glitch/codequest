<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">🏆 Leaderboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4">Rank</th>
                            <th class="p-4">Student</th>
                            <th class="p-4">Quizzes Taken</th>
                            <th class="p-4">Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leaderboard as $i => $entry)
                        <tr class="border-t {{ $entry->user_id === auth()->id() ? 'bg-blue-50' : '' }}">
                            <td class="p-4 font-bold">
                                @if($i === 0) 🥇
                                @elseif($i === 1) 🥈
                                @elseif($i === 2) 🥉
                                @else {{ $i + 1 }}
                                @endif
                            </td>
                            <td class="p-4">{{ $entry->user->name }}</td>
                            <td class="p-4">{{ $entry->quizzes_taken }}</td>
                            <td class="p-4 font-bold text-blue-600">{{ $entry->total_score }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="p-4 text-center text-gray-500">No entries yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>