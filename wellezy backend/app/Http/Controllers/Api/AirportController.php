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
        Log::warning('Este es un mensaje de advertencia');

        $request->validate(['code' => 'required|string']);
        
        try {
            $airports = $this->apiService->getAirports($request->code);
            return response()->json($airports);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch airports: ' . $e->getMessage()], 500);
        }
    }
}
