<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/var', function (Request $request) {

    return response()->json([
        'status' => 'success',
    ], 200);

});

Route::get('/connection', function (Request $request) {
    return response()->json([
        'status' => 'connected',
    ]);
});

Route::post('/license/login', function (Request $request) {
    $clientRequest = $request->json()->all();

    if (!isset($clientRequest['LicenseKey'])) {
        return response()->json(['error' => 'LicenseKey is required'], 400);
    }


    return response()->json([
        'login' => \App\Models\License::checkLicenseApi($clientRequest['LicenseKey'], $clientRequest['Hwid'], $clientRequest['Discord'], $clientRequest['App_ID']),
    ]);
});





Route::get('/license', function (Request $request) {
    return response()->json([
        'valid' => 'MIT',
    ]);
});
