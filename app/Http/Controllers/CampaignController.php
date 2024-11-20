<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CampaignController extends Controller
{
    public function getCampaigns(Request $request)
    {
        try {
            // Ganti URL dengan endpoint API Anda
            $response = Http::get('http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaigns', [
                'page' => $request->query('page', 1)
            ]);

            if ($response->successful()) {
                return response()->json($response->json(), 200);
            }

            return response()->json([
                'message' => 'Failed to fetch campaigns',
                'error' => $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching campaigns',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
