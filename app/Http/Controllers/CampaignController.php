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
public function showCampaign($id)
{
    $apiUrl = url('/api/campaigns/' . $id);
    return view('campaign-detail', compact('id', 'apiUrl'));
}
}
