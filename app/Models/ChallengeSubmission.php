<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeSubmission extends Model
{
    protected $fillable = [
        'user_id', 'coding_challenge_id', 'code', 'output', 'score', 'is_correct'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function challenge()
    {
        return $this->belongsTo(CodingChallenge::class, 'coding_challenge_id');
    }
}