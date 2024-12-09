<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserve; // Asegúrate de importar el modelo Reserve

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_city',
        'arrival_city',
        'departure_time',
        'arrival_time',
        'marketing_carrier',
        'flight_number',
        'price',
        'currency',
        // Añade otros campos según tu base de datos
    ];

    // Relación con Reservas
    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
