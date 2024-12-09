<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserve_id',
        'first_name',
        'last_name',
        'age',
        'passport_number',
    ];

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
