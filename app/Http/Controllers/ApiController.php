<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getCampaignData(Request $request)
    {
        // Ambil parameter id dari query string
        $campaignId = $request->query('id');

        // Pastikan ID tidak kosong
        if (!$campaignId) {
            return response()->json(['error' => 'Campaign ID is required'], 400);
        }

        // URL API dengan ID campaign
        $url = "http://localhost/lazismuDIY/backendLazismuDIY/public/api/campaigns/{$campaignId}";

        

        // Mengambil data dari API
        $response = Http::get($url);
        
        // Periksa apakah respons sukses
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch campaign data'], 500);
        }

        $campaign = $response->json();

        // Kirim data ke view
        return view('detailCampaign', compact('campaign'));
    }
}
