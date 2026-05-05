<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'content' => 'required|string',
            'type' => 'required|in:multiple_choice,true_false',
            'points' => 'required|integer|min:1',
            'choices' => 'required|array|min:2',
            'choices.*' => 'required|string',
            'correct' => 'required|integer',
        ]);

        $question = Question::create([
            'quiz_id' => $quiz->id,
            'content' => $request->content,
            'type' => $request->type,
            'points' => $request->points,
        ]);

        foreach ($request->choices as $index => $choiceContent) {
            Choice::create([
                'question_id' => $question->id,
                'content' => $choiceContent,
                'is_correct' => ($index == $request->correct),
            ]);
        }

        return redirect()->route('faculty.quizzes.show', $quiz)->with('success', 'Question added!');
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        return redirect()->route('faculty.quizzes.show', $quiz)->with('success', 'Question deleted!');
    }
}