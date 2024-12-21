<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CampaignController extends Controller
{
  public function getCampaign($id)
{
    $campaign = Campaign::with('category')->find($id);

    if (!$campaign) {
        return response()->json(['error' => 'Campaign not found'], 404);
    }

    return response()->json($campaign);
}

public function showCampaign(Request $request)
{
    $campaignId = $request->query('id'); // Ambil ID dari query string
    if (!$campaignId) {
        abort(400, 'Campaign ID is missing'); // Jika ID tidak ada
    }

    $campaign = Campaign::with('category')->find($campaignId); // Ambil data campaign
    if (!$campaign) {
        abort(404, 'Campaign not found'); // Jika campaign tidak ditemukan
    }

    return view('detailCampaign', [
        'campaign' => $campaign // Kirim data campaign ke view
    ]);
}

}
