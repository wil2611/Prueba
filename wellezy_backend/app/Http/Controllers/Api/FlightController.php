<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Models\Itinerary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
   protected $apiService;

   public function __construct(ApiService $apiService)
   {
       $this->apiService = $apiService;
   }

   public function searchFlights(Request $request)
   {
    $validated = $request->validate([
        'direct' => 'boolean',
        'currency' => 'required|string|size:3',
        'searchs' => 'required|integer|min:1',
        'class' => 'boolean',
        'qtyPassengers' => 'required|integer|min:1',
        'adult' => 'required|integer|min:1',
        'child' => 'integer|min:0',
        'baby' => 'integer|min:0',
        'seat' => 'integer|min:0',
        'itinerary' => 'required|array|min:1',
        'itinerary.*.departureCity' => 'required|string|size:3',
        'itinerary.*.arrivalCity' => 'required|string|size:3',
        'itinerary.*.hour' => 'required|date',
    ]);

    // Preparar el payload para el API externo
    $payload = [
        'direct' => $validated['direct'] ?? false,
        'currency' => $validated['currency'],
        'searchs' => $validated['searchs'],
        'class' => $validated['class'] ?? false,
        'qtyPassengers' => $validated['qtyPassengers'],
        'adult' => $validated['adult'],
        'child' => $validated['child'] ?? 0,
        'baby' => $validated['baby'] ?? 0,
        'seat' => $validated['seat'] ?? 0,
        'itinerary' => $validated['itinerary'],
    ];
   
    try {
        $flights = $this->apiService->searchFlightsService($validated);
        return response()->json($flights, 200);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'No se pudieron obtener los vuelos en este momento. Por favor, intenta nuevamente más tarde.'
        ], 500);
    }
   }
}
