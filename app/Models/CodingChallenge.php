<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodingChallenge extends Model
{
    protected $fillable = [
        'faculty_id', 'title', 'description', 'sample_input', 'expected_output', 'points', 'status'
    ];

    public function faculty()
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function submissions()
    {
        return $this->hasMany(ChallengeSubmission::class);
    }
}