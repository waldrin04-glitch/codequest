<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\CodingChallenge;
use App\Models\ChallengeSubmission;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Quiz performance — avg score per quiz
        $quizzes = Quiz::where('user_id', auth()->id())
            ->where('status', 'published')
            ->with('attempts')
            ->get();

        $quizLabels = $quizzes->pluck('title');
        $quizAvgScores = $quizzes->map(function ($quiz) {
            $attempts = $quiz->attempts;
            if ($attempts->isEmpty()) return 0;
            return round($attempts->avg(function ($a) {
                return $a->total_points > 0 ? ($a->score / $a->total_points) * 100 : 0;
            }), 1);
        });

        $quizAttemptCounts = $quizzes->map(fn($q) => $q->attempts->count());

        // Coding challenge stats
        $challenges = CodingChallenge::where('faculty_id', auth()->id())
            ->where('status', 'published')
            ->with('submissions')
            ->get();

        $challengeLabels = $challenges->pluck('title');
        $challengeCorrectRates = $challenges->map(function ($c) {
            $total = $c->submissions->count();
            if ($total === 0) return 0;
            return round(($c->submissions->where('is_correct', true)->count() / $total) * 100, 1);
        });

        // Total stats
        $totalStudents = QuizAttempt::whereIn('quiz_id', $quizzes->pluck('id'))
            ->distinct('user_id')->count();
        $totalAttempts = QuizAttempt::whereIn('quiz_id', $quizzes->pluck('id'))->count();
        $totalSubmissions = ChallengeSubmission::whereIn('coding_challenge_id', $challenges->pluck('id'))->count();

        return view('faculty.analytics', compact(
            'quizLabels', 'quizAvgScores', 'quizAttemptCounts',
            'challengeLabels', 'challengeCorrectRates',
            'totalStudents', 'totalAttempts', 'totalSubmissions'
        ));
    }
}