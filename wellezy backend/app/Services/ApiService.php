<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService {
    public function getAirports($code)
    {
        // Realizamos la solicitud HTTP GET con el código de la ciudad
        $response = Http::post(env('API_AIRPORTS_URL'), ['code' => $code]);

        if (!$response->successful()) {
            throw new \Exception('Unable to fetch airports');
        }

        return $response->json();  // Devuelve la respuesta en formato JSON
    }

    public function searchFlights($data)
    {
        // Realizamos la solicitud HTTP POST con los datos de búsqueda de vuelos
        $response = Http::post(env('API_FLIGHTS_URL'), $data);

        if (!$response->successful()) {
            throw new \Exception('Unable to fetch flights');
        }

        return $response->json();  // Devuelve la respuesta en formato JSON
    }
}
