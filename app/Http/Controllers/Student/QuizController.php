<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('status', 'published')->latest()->get();
        return view('student.quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.choices');
        return view('student.quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $quiz->load('questions.choices');
        $score = 0;
        $totalPoints = 0;

        foreach ($quiz->questions as $question) {
            $totalPoints += $question->points;
            $selectedChoiceId = $request->input('question_' . $question->id);
            if ($selectedChoiceId) {
                $correct = $question->choices->where('id', $selectedChoiceId)->where('is_correct', true)->first();
                if ($correct) {
                    $score += $question->points;
                }
            }
        }

        QuizAttempt::create([
            'user_id'      => auth()->id(),
            'quiz_id'      => $quiz->id,
            'score'        => $score,
            'total_points' => $totalPoints,
            'submitted_at' => now(),
        ]);

        return redirect()->route('student.quizzes.index')->with('success', "You scored $score out of $totalPoints!");
    }

    public function practice(Quiz $quiz)
    {
        $quiz->load('questions.choices');
        return view('student.quizzes.practice', compact('quiz'));
    }

    public function practiceSubmit(Request $request, Quiz $quiz)
    {
        $quiz->load('questions.choices');
        $score = 0;
        $totalPoints = 0;
        $results = [];

        foreach ($quiz->questions as $question) {
            $totalPoints += $question->points;
            $selectedChoiceId = $request->input('question_' . $question->id);
            $correct = $question->choices->firstWhere('is_correct', true);
            $selected = $selectedChoiceId ? $question->choices->firstWhere('id', $selectedChoiceId) : null;
            $isCorrect = $selected && $selected->is_correct;

            if ($isCorrect) {
                $score += $question->points;
            }

            $results[] = [
                'question'   => $question->content,
                'selected'   => $selected?->content ?? 'No answer',
                'correct'    => $correct?->content,
                'is_correct' => $isCorrect,
            ];
        }

        return view('student.quizzes.practice_result', compact('quiz', 'score', 'totalPoints', 'results'));
    }
}