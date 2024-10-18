<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'avatar',
        'phone',
        'email',
        'gender',
        'yob',
        'address',
        'description'
    ];

    public function club()
    {
        return $this->hasOne(Club::class);
    }

    public function manager()
    {
        return $this->hasOne(Club::class, 'manager_id');
    }
}
