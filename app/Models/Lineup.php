<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'match_id',
        'player_id',
        'position',
        'is_substitute',
        'is_captain',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function match()
    {
        return $this->belongsTo(FMatch::class, 'match_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
