<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
        public function save(Request $request)
    {
        // Store values in the session
        Session::put('namaDonatur', $request->input('namaDonatur'));
        Session::put('noHp', $request->input('noHp'));
        Session::put('pesan', $request->input('pesan'));

        // Redirect to the payment details page
        return redirect()->route('qris');
    }

    public function details()
    {
        // Get the session values
        $namaDonatur = Session::get('namaDonatur');
        $noHp = Session::get('noHp');
        $pesan = Session::get('pesan');

        // Pass the data to the view
        return view('payment.details', compact('namaDonatur', 'noHp', 'pesan'));
    }
    public function qris()
{
    // Logic untuk proses QRIS atau tampilan terkait QRIS
    return view('qris'); // Sesuaikan dengan nama view yang Anda buat
}
}
