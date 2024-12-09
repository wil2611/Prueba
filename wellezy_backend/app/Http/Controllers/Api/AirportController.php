<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;

class AirportController extends Controller
{
    
    protected $apiService;
    public function __construct(ApiService $apiService)
    {
        
        $this->apiService = $apiService;
    }
    
    public function getAirportsByCity(Request $request)
{
    $request->validate(['code' => 'required|string']);

    try {
        $airports = $this->apiService->getAirports($request->code);
        return response()->json($airports, 200);
    } catch (\Exception $e) {
        Log::error('Error fetching airports: ' . $e->getMessage());
        return response()->json([
            'error' => 'No se pudieron obtener los aeropuertos en este momento. Por favor, intenta nuevamente más tarde.'
        ], 500);
    }
}
}
