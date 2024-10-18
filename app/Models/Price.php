<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'yard_id',
        'amount',
        'deposit',
        'time_start',
        'time_end'
    ];

    public function yard()
    {
        return $this->belongsTo(Yard::class);
    }
}
