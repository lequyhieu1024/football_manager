<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'student_code',
        'avatar',
        'phone',
        'gender',
        'birthday',
        'address',
        'status',
        'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Club::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Coach::class)->withPivot('id', 'score')->withTimestamps();
    }
}