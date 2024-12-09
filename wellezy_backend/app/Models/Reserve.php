<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id',
        'departure_city',
        'arrival_city',
        'departure_time',
        // Agrega otros campos si es necesario
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'reserve_id');
    }

    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'reserve_id');
    }
}
