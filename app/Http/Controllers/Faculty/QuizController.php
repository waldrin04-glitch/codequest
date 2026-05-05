<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('user_id', auth()->id())->latest()->get();
        return view('faculty.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('faculty.quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer|min:1',
        ]);

        $quiz = Quiz::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'time_limit' => $request->time_limit,
            'status' => 'draft',
        ]);

        return redirect()->route('faculty.quizzes.show', $quiz)->with('success', 'Quiz created!');
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.choices');
        return view('faculty.quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('faculty.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer|min:1',
            'status' => 'required|in:draft,published',
        ]);

        $quiz->update($request->only('title', 'description', 'time_limit', 'status'));

        return redirect()->route('faculty.quizzes.show', $quiz)->with('success', 'Quiz updated!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('faculty.quizzes.index')->with('success', 'Quiz deleted!');
    }
}