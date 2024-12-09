<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AirportController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\ReservationController;

Route::get('/status', function () {
    return response()->json(['status' => 'ok']);
});
Route::post('/airports', [AirportController::class, 'getAirportsByCity']);
Route::post('/flights', [FlightController::class, 'searchFlights']);
Route::post('/reservations', [ReservationController::class, 'store']);

