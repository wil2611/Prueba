<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Models\Itinerary;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
   protected $apiService;

   public function __construct(ApiService $apiService)
   {
       $this->apiService = $apiService;
   }

   public function searchFlights(Request $request)
   {
       $request->validate([
        'direct' => 'required|boolean',
        'currency' => 'required|string',
        'searchs' => 'required|integer',
        'class' => 'required|boolean',
        'qtyPassengers' => 'required|integer',
        'adult' => 'required|integer',
        'child' => 'required|integer',
        'baby' => 'required|integer',
        'seat' => 'required|integer',
        'itinerary' => 'required|array',
        'itinerary.*.departureCity' => 'required|string',
        'itinerary.*.arrivalCity' => 'required|string',
        'itinerary.*.hour' => 'required|date',
    ]);
   
       try {
          
   
           // Procesa los vuelos con el servicio
           $flights = $this->apiService->searchFlights($request->all());
   
           // Guardamos los itinerarios en la base de datos
           foreach ($request->itinerary as $itineraryData) {
               Itinerary::create([
                   'departure_city' => $itineraryData['departureCity'],
                   'arrival_city' => $itineraryData['arrivalCity'],
                   'departure_time' => $itineraryData['hour'], // Convertir directamente la hora al formato de timestamp
                   'arrival_time' => null, // Si no hay hora de llegada, puedes dejarlo como `null`
               ]);
           }
   
           return response()->json($flights);
       } catch (\Exception $e) {
           // Depuración: Log para errores
           Log::error('Error en searchFlights: ' . $e->getMessage());
   
           // Retorna el mensaje de error
           return response()->json(['error' => 'Unable to fetch flights: ' . $e->getMessage()], 500);
       }
   }
}
