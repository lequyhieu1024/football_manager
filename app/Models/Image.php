<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'yard_id',
        'thumbnail',
        'is_active',
    ];

    public function yard()
    {
        return $this->belongsTo(Yard::class, 'yard_id');
    }
}
