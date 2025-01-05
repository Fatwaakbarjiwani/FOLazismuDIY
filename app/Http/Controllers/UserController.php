<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function fetchUserData(Request $request)
    {
        $token = $request->session()->get('TK');

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ])->get('http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/get-me');

            if ($response->ok()) {
                $data = $response->json();

                // Simpan data pengguna ke session
                $request->session()->put('nm', $data['name']);
                $request->session()->put('pn', $data['phone_number']);

                return response()->json($data);
            } else {
                return response()->json(['error' => 'Failed to fetch user data'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
