<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    public function matches()
    {
        return $this->hasMany(FMatch::class, 'yard_id');
    }
    public function images() {
        return $this->hasMany(Image::class, 'yard_id');
    }
}
