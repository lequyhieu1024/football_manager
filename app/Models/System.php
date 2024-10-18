<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'email',
        'address_text',
        'address_embedded',
        'opening_hour',
        'closing_hour',
        'opening_day_id',
        'primary_color',
        'manager',
        'description',
    ];

    public function openingDay()
    {
        return $this->belongsTo(OpeningDay::class, 'opening_day_id');
    }
}
