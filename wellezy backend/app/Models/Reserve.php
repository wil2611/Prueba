<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'departure_city',
        'arrival_city',
        'departure_time',
    ];
    public function itinerary()
    {
        return $this->hasOne(Itinerary::class);
    }
}
