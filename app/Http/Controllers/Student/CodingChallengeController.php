<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CodingChallenge;
use App\Models\ChallengeSubmission;
use Illuminate\Http\Request;

class CodingChallengeController extends Controller
{
    public function index()
    {
        $challenges = CodingChallenge::where('status', 'published')->latest()->get();
        return view('student.challenges.index', compact('challenges'));
    }

    public function show(CodingChallenge $challenge)
    {
        $submission = ChallengeSubmission::where('user_id', auth()->id())
            ->where('coding_challenge_id', $challenge->id)
            ->latest()->first();

        return view('student.challenges.show', compact('challenge', 'submission'));
    }

    public function submit(Request $request, CodingChallenge $challenge)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $output = trim($request->code);
        $expected = trim($challenge->expected_output);
        $is_correct = $output === $expected;

        ChallengeSubmission::create([
            'user_id'             => auth()->id(),
            'coding_challenge_id' => $challenge->id,
            'code'                => $request->code,
            'output'              => $output,
            'score'               => $is_correct ? $challenge->points : 0,
            'is_correct'          => $is_correct,
        ]);

        return redirect()->route('student.challenges.show', $challenge)
            ->with('result', $is_correct ? 'correct' : 'wrong');
    }
}