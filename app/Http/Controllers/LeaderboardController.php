<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = QuizAttempt::with('user', 'quiz')
            ->selectRaw('user_id, SUM(score) as total_score, COUNT(*) as quizzes_taken')
            ->groupBy('user_id')
            ->orderByDesc('total_score')
            ->get();

        return view('leaderboard', compact('leaderboard'));
    }
}