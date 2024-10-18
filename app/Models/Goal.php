<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'player_id',
        'time',
        'is_own_goal',
    ];

    public function match()
    {
        return $this->belongsTo(FMatch::class, 'match_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
