<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
      public function save(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'campaignId' => 'required|integer',
        ], [
            'nominal.required' => 'Nominal wajib diisi.',
            'nominal.numeric' => 'Nominal harus berupa angka.',
            'nominal.min' => 'Nominal harus lebih dari 0.',
            'campaignId.required' => 'ID campaign wajib diisi.',
            'campaignId.integer' => 'ID campaign harus berupa angka.',
        ]);

        // Simpan nominal dan campaignId ke dalam sesi
        Session::put('nominal', $request->nominal);
        Session::put('idDonasi', $request->campaignId);

        return response()->json([
            'message' => 'Nominal dan ID campaign berhasil disimpan.',
        ], 200);
    }

}
