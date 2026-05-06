<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\CodingChallenge;
use Illuminate\Http\Request;

class CodingChallengeController extends Controller
{
    public function index()
    {
        $challenges = CodingChallenge::where('faculty_id', auth()->id())->latest()->get();
        return view('faculty.challenges.index', compact('challenges'));
    }

    public function create()
    {
        return view('faculty.challenges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'sample_input'    => 'nullable|string',
            'expected_output' => 'required|string',
            'points'          => 'required|integer|min:1',
        ]);

        CodingChallenge::create([
            'faculty_id'      => auth()->id(),
            'title'           => $request->title,
            'description'     => $request->description,
            'sample_input'    => $request->sample_input,
            'expected_output' => $request->expected_output,
            'points'          => $request->points,
            'status'          => $request->has('publish') ? 'published' : 'draft',
        ]);

        return redirect()->route('faculty.challenges.index')->with('success', 'Challenge created!');
    }

    public function edit(CodingChallenge $challenge)
    {
        return view('faculty.challenges.edit', compact('challenge'));
    }

    public function update(Request $request, CodingChallenge $challenge)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'sample_input'    => 'nullable|string',
            'expected_output' => 'required|string',
            'points'          => 'required|integer|min:1',
        ]);

        $challenge->update([
            'title'           => $request->title,
            'description'     => $request->description,
            'sample_input'    => $request->sample_input,
            'expected_output' => $request->expected_output,
            'points'          => $request->points,
            'status'          => $request->has('publish') ? 'published' : 'draft',
        ]);

        return redirect()->route('faculty.challenges.index')->with('success', 'Challenge updated!');
    }

    public function destroy(CodingChallenge $challenge)
    {
        $challenge->delete();
        return redirect()->route('faculty.challenges.index')->with('success', 'Challenge deleted!');
    }
}