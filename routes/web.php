<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/campaign', function () {
    return view('campaign');
});

Route::get('/ziswaf', function () {
    return view('ziswaf');
});

Route::get('/detailCampaign', function () {
    return view('detailCampaign');
});
Route::get('/searchCampaign', function () {
    return view('searchCampaign');
});
Route::get('/pembayaran', function () {
    return view('pembayaran');
});
Route::get('/formPembayaran', function () {
    return view('formPembayaran');
});

// routes/web.php
use App\Http\Controllers\CampaignController;

Route::get('/api/campaigns', [CampaignController::class, 'getCampaigns']);


// =====
use Illuminate\Support\Facades\Session;

Route::post('/set-nominal', function (Illuminate\Http\Request $request) {
    $request->validate([
        'nominal' => 'required|integer|min:1000', // Validasi minimal 1.000
    ]);

    Session::put('nominalDonatur', $request->nominal);

    return response()->json(['message' => 'Nominal saved successfully.']);
});


Route::post('/payment/save', [PaymentController::class, 'save'])->name('payment.save');
// routes/web.php
Route::get('/qris', [PaymentController::class, 'qris'])->name('qris');


