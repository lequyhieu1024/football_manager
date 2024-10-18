<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'winner_id',
        'winner_goal_numbers',
        'loser_goal_numbers',
    ];

    // Relationship with the Match model
    public function match()
    {
        return $this->belongsTo(FMatch::class, 'match_id');
    }

    public function winner()
    {
        return $this->belongsTo(Club::class, 'winner_id');
    }

}
