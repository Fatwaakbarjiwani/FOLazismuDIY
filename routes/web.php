<?php

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
