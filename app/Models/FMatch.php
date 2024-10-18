<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'club1_id',
        'banner_club1',
        'club2_id',
        'banner_club2',
        'match_type',
        'at_day',
        'at_time',
        'match_duration',
        'status',
        'description',
        'yard_id'
    ];

    public function club1()
    {
        return $this->belongsTo(Club::class, 'club1_id');
    }

    public function club2()
    {
        return $this->belongsTo(Club::class, 'club2_id');
    }

    public function yard()
    {
        return $this->belongsTo(Yard::class, 'yard_id');
    }
}
