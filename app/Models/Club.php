<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'total_members',
        'phone',
        'email',
        'founding_date',
        'description',
        'coach_id',
        'manager_id'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function manager()
    {
        return $this->belongsTo(Coach::class, 'manager_id');
    }
}
