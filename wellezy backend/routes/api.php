<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AirportController;
use App\Http\Controllers\Api\FlightController;

Route::get('/students', function(){return 'Student list';});

Route::post('/airports', [AirportController::class, 'getAirportsByCity']);
Route::post('/flights', [FlightController::class, 'searchFlights']);
