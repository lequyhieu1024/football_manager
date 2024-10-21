<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'avatar',
        'phone',
        'email',
        'gender',
        'yob',
        'weight',
        'height',
        'position',
        'address',
        'description',
        'club_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
