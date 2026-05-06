<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📊 Performance Analytics</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-gray-500 text-sm">Total Students</p>
                    <p class="text-4xl font-bold text-blue-600">{{ $totalStudents }}</p>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-gray-500 text-sm">Total Quiz Attempts</p>
                    <p class="text-4xl font-bold text-green-600">{{ $totalAttempts }}</p>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-gray-500 text-sm">Challenge Submissions</p>
                    <p class="text-4xl font-bold text-yellow-600">{{ $totalSubmissions }}</p>
                </div>
            </div>

            {{-- Quiz Avg Score Chart --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Average Score per Quiz (%)</h3>
                @if($quizLabels->isEmpty())
                    <p class="text-gray-500 text-sm">No quiz data yet.</p>
                @else
                    <canvas id="quizAvgChart" height="100"></canvas>
                @endif
            </div>

            {{-- Quiz Attempt Count Chart --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Quiz Attempt Counts</h3>
                @if($quizLabels->isEmpty())
                    <p class="text-gray-500 text-sm">No quiz data yet.</p>
                @else
                    <canvas id="quizAttemptChart" height="100"></canvas>
                @endif
            </div>

            {{-- Challenge Correct Rate Chart --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">Coding Challenge Correct Rate (%)</h3>
                @if($challengeLabels->isEmpty())
                    <p class="text-gray-500 text-sm">No challenge data yet.</p>
                @else
                    <canvas id="challengeChart" height="100"></canvas>
                @endif
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if(!$quizLabels->isEmpty())
        const quizLabels = @json($quizLabels);
        const quizAvgScores = @json($quizAvgScores);
        const quizAttemptCounts = @json($quizAttemptCounts);

        new Chart(document.getElementById('quizAvgChart'), {
            type: 'bar',
            data: {
                labels: quizLabels,
                datasets: [{
                    label: 'Avg Score (%)',
                    data: quizAvgScores,
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: { beginAtZero: true, max: 100 } }
            }
        });

        new Chart(document.getElementById('quizAttemptChart'), {
            type: 'bar',
            data: {
                labels: quizLabels,
                datasets: [{
                    label: 'Attempts',
                    data: quizAttemptCounts,
                    backgroundColor: 'rgba(16, 185, 129, 0.6)',
                    borderColor: 'rgba(16, 185, 129, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });
        @endif

        @if(!$challengeLabels->isEmpty())
        new Chart(document.getElementById('challengeChart'), {
            type: 'bar',
            data: {
                labels: @json($challengeLabels),
                datasets: [{
                    label: 'Correct Rate (%)',
                    data: @json($challengeCorrectRates),
                    backgroundColor: 'rgba(245, 158, 11, 0.6)',
                    borderColor: 'rgba(245, 158, 11, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: { beginAtZero: true, max: 100 } }
            }
        });
        @endif
    </script>
</x-app-layout>