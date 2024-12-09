<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Itinerary;
use App\Models\Reserve;

class ApiService {
    public function getAirports($code)
    {
        // Realizamos la solicitud HTTP GET con el código de la ciudad
        $response = Http::post(config('services.travel_flight.api_airports_url'), ['code' => $code]);

        if (!$response->successful()) {
            throw new \Exception('Unable to fetch airports');
        }

        return $response->json(); 
    }

    public function searchFlightsService($payload)
    {
        //DB::beginTransaction();
        $validated = $payload; // Assuming $payload is already validated
        $response = Http::post(config('services.travel_flight.api_flights_url'), $payload);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Crear una reserva
            $reserve = Reserve::create([
                'departure_city' => $validated['itinerary'][0]['departureCity'],
                'arrival_city' => $validated['itinerary'][0]['arrivalCity'],
                'departure_time' => $validated['itinerary'][0]['hour'],
                // Agrega otros campos necesarios si los hay
            ]);

            // Guardar los itinerarios en la base de datos asociados a la reserva
            foreach ($validated['itinerary'] as $itineraryData) {
                Itinerary::create([
                    'departure_city' => $itineraryData['departureCity'],
                    'arrival_city' => $itineraryData['arrivalCity'],
                    'departure_time' => $itineraryData['hour'],
                    'arrival_time' => null, // Puedes ajustar esto según tus necesidades
                    'reserve_id' => $reserve->id, // Asociar el itinerario a la reserva
                ]);
            }

            // Confirmar la transacción
            //DB::commit();
            return response()->json([
                'success' => true,
                'data' => $response->json(),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Falllo al comunicarse con el API de vuelos.',
                'details' => $response->json(),
            ], $response->status());
        }
       
    }
}
